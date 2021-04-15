<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Customer;

use App\User;

use App\Order;

use App\OrderDetail;

use App\Province;

use App\District;

use App\Role;

use Session;

use Hash;
use Illuminate\Support\Facades\Input;
use Auth;
use URL;
use Redirect;



class CustomerController extends Controller

{

    public function getLogin()

    {
        if (Auth::check()) {
            return redirect()->route('trang-chu');
        }
        Session::put('url.intended', URL::previous());
        return view('customers.login');
    }

    public function postLogin(Request $req)

    {

        $this->validate(
            $req,
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'password.required' => 'Vui lòng nhập password'
            ]
        );

        $remember = false;
        if (is_numeric($req->email)) {
            $credentials = array('phone' => $req->email, 'password' => $req->password);
        } else {
            $credentials = array('email' => $req->email, 'password' => $req->password);
        }

        if (isset($req->remember_me)) {
            $remember = true;
        }

        if (Auth::attempt($credentials, $remember)) {
            if (URL::previous() == Session::get('url.intended')) {
                return redirect()->route('trang-chu');
            } elseif (URL::previous() == route('dang-ky')) {
                return redirect()->route('trang-chu');
            } else {
                return Redirect::to(Session::get('url.intended'));
            }
        } else {
            return redirect()->back()->with('error', 'Đăng nhập không thành công');
        }
    }



    public function getRegister()

    {
        if (Auth::check()) {
            return redirect()->route('trang-chu');
        }
        Session::put('url.intended', URL::previous());
        return view('customers.register');
    }



    public function postRegister(Request $req)

    {
        $this->validate(

            $req,

            [
                'cusname' => 'required|min:2|max:50',

                'phone' => 'required|numeric|unique:users',

                'email' => 'required|email|unique:users',

                'password' => 'required|min:3',

                're_password' => 'required|min:3|max:20|same:password',
            ],

            [
                'cusname.required' => 'Vui lòng nhập tên hiển thị',
                'email.unique' => 'Email đã được sử dụng',
                'email.email' => 'Vui lòng nhập đúng định dạng email',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Vui lòng nhập đúng định dạng',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'phone.unique' => 'Số điện thoại đã được sử dụng',
                'password.required' => 'Vui lòng nhập password',
                're_password.required' => 'Vui lòng nhập lại password',
                're_password.same' => 'Xác nhận lại mật khẩu chưa chính xác',
            ]

        );

        $user = new User();

        $user->email = $req->email;

        $user->password = Hash::make($req->password);

        $user->role_id = 3;

        $user->username = $req->cusname;

        $user->phone = $req->phone;

        $user->name = "Guest";

        $user->save();


        $customer = new Customer();

        $customer->name_customer = $req->cusname;

        $customer->phone = $req->phone;

        $customer->email = $req->email;

        $customer->user_id = $user->id;

        $customer->save();

        if ($user->save()) {
            return redirect()->route('dang-nhap')->with('success', 'Tạo tài khoản thành công');
        }
    }

    public function editCustomer(Request $req)
    {
        $cus = Customer::where('user_id', Auth::id())->firstOrFail();

        $cus->last_name = $req->fullname;

        $cus->phone = $req->phone;

        $cus->save();

        if ($cus->save()) {
            return redirect()->back()->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->back()->with('success', 'Chưa cập nhật được thông tin tài khoản');
        }
    }

    public function editAddress(Request $req)
    {
        $this->validate($req, [
            'province' => 'required',
            'district' => 'required',
            'address' => 'required',
        ]);

        $cus = Customer::where('user_id', Auth::id())->firstOrFail();

        $cus->province = $req->province;

        $cus->district = $req->district;

        $cus->address = $req->address;

        $cus->save();

        if ($cus->save()) {
            return redirect()->back()->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->back()->with('success', 'Chưa cập nhật được thông tin tài khoản');
        }
    }

    public function passwordChange(Request $req)
    {
        $this->validate($req, [
            'cur_pass' => 'required',
            'new_pass' => 'required',
            'conf_new_pass' => 'required|same:new_pass'
        ]);

        $user = User::find(Auth::id());

        if (Hash::check($req->cur_pass, $user->password)) {
            $user->password = Hash::make($req->new_pass);
            $user->save();
            return redirect()->back()->with(['success' => 'Cập nhật thành công ! ']);
        } else {
            return redirect()->back()->with(['error' => 'Tài khoản chưa được cập nhật !']);
        }
    }


    public function detailCustomer(Request $req)

    {
        if (Auth::user()->role_id == 1) { } else {
            $cus = Customer::where('user_id', Auth::id())->first()->toArray();

            $order = Order::where('id_customer', $cus['id_customer'])->get();

            $province = Province::all();
        }

        return view('customers.myaccount', compact('cus', 'order', 'province'));
    }

    public function orderDetail($id)
    {
        $detail = OrderDetail::where('id_order', $id)->orderBy('id', 'DESC')->get();
        return view('customers.orderdetail', compact('detail'));
    }
}
