<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Auth;
use Session;
use URL;
use Redirect;
use App\Product;
use App\Customer;
use App\Order;
use App\OrderDetail;
use App\District;
use App\Mail\MailOrder;
use App\Mail\OrderNoti;
use App\Province;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index()
    {
        Cart::setGlobalTax(0);
        $cart = Cart::content();
        $provinces = Province::all();
        Session::put('url.intended', URL::previous());
        return view('pages.cart', compact('provinces'));
    }

    public function addToQCart($id)
    {
        $pro = Product::find($id);
        if ($pro->product_type == "Sữa") {
            Cart::add(['id' => $pro->id_product, 'name' => $pro->name, 'qty' => 1, 'price' => $pro->cost / 2, 'weight' => 1, 'options' => ['size' => 2]])->associate('App\Product');
        } else {
            Cart::add(['id' => $pro->id_product, 'name' => $pro->name, 'qty' => 1, 'price' => $pro->cost, 'weight' => 1, 'options' => ['size' => 3]])->associate('App\Product');
        }
        return redirect()->back();
    }

    //Thay weight bằng style
    public function addToCart(Request $req, $id)
    {
        $pro = Product::find($id);
        if ($req->weight == "") {
            return redirect()->back()->with('success', 'Chưa chọn số lượng!');
        } elseif ($req->weight == 1) {
            Cart::add(['id' => $pro->id_product, 'name' => $pro->name, 'qty' => $req->qty, 'price' => $pro->cost / 4, 'weight' => 1, 'options' => ['size' => $req->weight]])->associate('App\Product');
        } elseif ($req->weight == 2) {
            Cart::add(['id' => $pro->id_product, 'name' => $pro->name, 'qty' => $req->qty, 'price' => $pro->cost / 2, 'weight' => 1, 'options' => ['size' => $req->weight]])->associate('App\Product');
        } else {
            Cart::add(['id' => $pro->id_product, 'name' => $pro->name, 'qty' => $req->qty, 'price' => $pro->cost, 'weight' => 1, 'options' => ['size' => $req->weight]])->associate('App\Product');
        }
        return redirect()->back();
    }

    public function updateQty(Request $req, $id)
    {
        $rowId = $req->rowId;
        $qty = $req->qty;
        Cart::update($rowId, $qty);
    }

    public function updateStyle(Request $req, $rowId)
    {
        $weight = intval($req->style);
        Cart::update($rowId, ['weight' => $weight]);
        return redirect()->back();
    }

    // public function increase($rowId)
    // {
    //     Cart::update($rowId, Cart::get($rowId)->qty + 1);
    //     return redirect()->back();
    // }
    // public function decrease($rowId)
    // {
    //     Cart::update($rowId, Cart::get($rowId)->qty - 1);
    //     return redirect()->back();
    // }

    public function removeItem($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function getCheckout()
    {
        if (Auth::check() && Auth::user()->role_id == 1) {
            abort(404);
        } else {
            if (Auth::check()) {
                $user = Auth::user();
                $cus = Customer::where('name_customer', $user->username)->first();
            } else { }

            Cart::setGlobalTax(0);
            $cart = Cart::content();
            $provinces = Province::all();
            return view('pages.checkout', compact('cart', 'provinces', 'cus', 'user'));
        }
    }

    public function district($id)
    {
        $districts = District::where('provinceid', $id)->get();
        return response()->json($districts);
    }

    public function ward()
    {
        $district_id = Input::get('districtid');
        $ward = Ward::where('districtid', '=', $district_id)->get();
        return response()->json($ward);
    }

    public function postCheckout(Request $req)
    {
        $this->validate(
            $req,
            [
                'name' => 'min:4',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'address' => 'required',
                'billing_provinces' => 'required',
                'billing_districts' => 'required',
            ],
            [
                'name.min' => 'Tên quá ngắn',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Vui lòng nhập đúng định dạng',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'phone.numeric' => 'Vui lòng nhập số điện thoại',
                'address.required' => 'Vui lòng nhập địa chỉ',
                'billing_provinces.required' => 'Vui lòng chọn thành phố',
                'billing_districts.required' => 'Vui lòng chọn quận/huyện',
            ]
        );

        if (Auth::check()) {
            $cus = Customer::where('user_id', Auth::user()->id)->first();
            $order = new Order;
            $order->id_customer = $cus->id_customer;
            $order->name = $req->name;
            $order->payment = $req->payment_method;
            $order->phone = $req->phone;
            $order->status = "Chờ Xử Lý";
            $order->description = $req->description;
            $order->cost = Cart::total(0, '', '');
            $order->save();
        } else {
            $customer = new Customer;
            $customer->name_customer = "Vãng Lai";
            $customer->email = $req->email;
            $customer->last_name = $req->name;
            $customer->province = $req->billing_provinces;
            $customer->district = $req->billing_districts;
            $customer->address = $req->address;
            $customer->phone = $req->phone;
            $customer->save();

            $order = new Order;
            $order->id_customer = $customer->id_customer;
            $order->name = $req->name;
            $order->payment = $req->payment_method;
            $order->phone = $req->phone;
            $order->status = "Chờ Xử Lý";
            $order->description = $req->description;
            $order->cost = Cart::total(0, '', '');
            $order->save();

            $cus = Customer::where('id_customer', $customer->id_customer)->first();
        }

        $bill_detail = null;

        foreach (Cart::content() as $key) {
            $bill_detail = new OrderDetail;
            $bill_detail->id_order = $order->id_order;
            $bill_detail->id_product = $key->id;
            $bill_detail->quantity = $key->qty;
            $bill_detail->weight = $key->options->size;
            $bill_detail->style = $key->weight;
            $bill_detail->unit_price = $key->price;
            $bill_detail->save();
        }

        Mail::to($req->email)->send(new MailOrder($bill_detail));
        Mail::to('marketing@kobevietnam.com.vn')->send(new OrderNoti($cus));
        Cart::destroy();
    }

    public function orderSuccess()
    {
        return view('pages.order-success');
    }

    // public function saveCart($rowId)
    // {
    //     $pro = Cart::get($rowId);
    //     Cart::instance('saveCart')->add(['id' => $pro->id_product, 'name' => $pro->name, 'qty' => 1, 'price' => $pro->cost, 'weight' => $pro->weight])->associate('App\Product');

    //     Cart::remove($rowId);
    //     return redirect()->back();
    // }

    // public function removeSave($rowId)
    // {
    //     $pro = Cart::instance('saveCart')->get($rowId);
    //     Cart::add(['id' => $pro->id_product, 'name' => $pro->name, 'qty' => 1, 'price' => $pro->cost, 'weight' => $pro->weight])->associate('App\Product');
    //     Cart::instance('saveCart')->remove($rowId);
    //     return redirect()->back();
    // }
}
