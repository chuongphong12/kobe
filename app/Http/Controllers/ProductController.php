<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Product;

use App\Product_type;

use App\Cooking;

use Auth;

use Cart;

use DB;

class ProductController extends Controller

{

  //Product

  public function showProduct()
  {
    $products = Product::where('status', 'LIKE', 'PUBLISHED')->get();

    $high = Product::where('status', 'LIKE', 'PUBLISHED')->where('product_type', 'Cao cấp')->take(6)->get();

    $mid = Product::where('status', 'LIKE', 'PUBLISHED')->where('product_type', 'Trung cấp')->take(6)->get();

    $low = Product::where('status', 'LIKE', 'PUBLISHED')->where('product_type', 'Phổ thông')->take(6)->get();

    $milk = Product::where('status', 'LIKE', 'PUBLISHED')->where('product_type', 'Sữa')->take(6)->get();

    return view('products.archiveProduct', compact('products', 'high', 'mid', 'low', 'milk'));
  }

  public function getProduct(Request $req)
  {

    $product = Product::where('slug', 'LIKE', '%' . $req->id . '%')->first();

    // $products = Product::where('product_type', 'LIKE', $product->product_type)->take(5)->get();

    $products = Product::where('product_type', $product->product_type)->where('id_product', '!=', $product->id_product)->take(5)->get();

    return view('products.product_detail', compact('product', 'products'));
  }

  public function High_Product()

  {

    $cook = Cooking::all();

    $product_type = Product_type::all();

    $products = Product::where('status', 'LIKE', 'PUBLISHED')->where('product_type', 'LIKE', 'Cao cấp')->paginate(9);

    return view('products.high_product_all', compact('products', 'product_type', 'cook'));
  }

  public function Medium_Product()

  {

    $cook = Cooking::all();

    $product_type = Product_type::all();

    $products = Product::where('status', 'LIKE', 'PUBLISHED')->where('product_type', 'LIKE', 'Trung cấp')->paginate(9);

    return view('products.medium_product', compact('products', 'product_type', 'cook'));
  }

  public function Low_Product()

  {

    $cook = Cooking::all();

    $product_type = Product_type::all();

    $products = Product::where('status', 'LIKE', 'PUBLISHED')->where('product_type', 'LIKE', 'Phổ thông')->paginate(9);

    return view('products.low_product', compact('products', 'product_type', 'cook'));
  }

  public function Milk_Product()

  {

    $cook = Cooking::all()->toArray();

    $product_type = Product_type::all();

    $product = Product::where('status', 'LIKE', 'PUBLISHED')->where('product_type', 'LIKE', 'Sữa')->first();

    $products = Product::where('id_product', '!=', $product->id_product)->get();

    return view('products.milk', compact('products', 'product', 'product_type', 'cook'));
  }

  public function Filter_Product(Request $req)

  {

    $cook = Cooking::all();

    $product_type = Product_type::all();

    if ($req->id == 2) {

      $products = Product::where('status', 'LIKE', 'PUBLISHED')

        ->where('cost', '<', 2000000)

        ->paginate(9);

      return view(
        'products.archiveProduct',

        compact('products', 'product_type', 'cook')
      );
    } else if ($req->id == 3) {

      $products = Product::where('status', 'LIKE', 'PUBLISHED')

        ->where('cost', '>=', 2000000)->orWhere('cost', '<=', 4000000)

        ->paginate(9);

      return view(
        'products.archiveProduct',

        compact('products', 'product_type', 'cook')
      );
    } else if ($req->id == 4) {

      $products = Product::where('status', 'LIKE', 'PUBLISHED')

        ->where('cost', '>=', 4000000)

        ->paginate(9);

      return view(
        'products.archiveProduct',

        compact('products', 'product_type', 'cook')
      );
    } else {

      $products = Product::where('cooking', 'LIKE', '%' . $req->id . '%')->paginate(9);

      return view(
        'products.archiveProduct',

        compact('products', 'product_type', 'cook')
      );
    }
  }

  // xử lý rating
  public function ratingProduct(Request $request)
  {
    if (Auth::check()) {
      // request()->validate(['rate' => 'required']);
      $pro = Product::find($request->id);

      $rating = new \willvincent\Rateable\Rating;
      $rating->rating = $request->rate;
      $rating->user_id = Auth::id();
      $pro->ratings()->save($rating);

      return redirect()->back();
    } else {
      return redirect()->route('dang-nhap');
    }
  }

  public function ajaxData(Request $request)
  {
    $weight = $request->weight;
    $unit_price = $request->unit_price;
    $number = $request->number;
    if ($weight == 1) {
      $result = ($unit_price / 1000 * $number) * 250;
    } else if ($weight == 2) {
      $result = ($unit_price / 1000 * $number) * 500;
    } else {
      $result =  $unit_price * $number;
    }
    $kq = number_format($result, 0);
    echo '<span class="money">Tổng giá : ' . $kq . '₫</span>';
  }
}
