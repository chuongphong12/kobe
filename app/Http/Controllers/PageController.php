<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Product;

use App\Product_type;

use App\Cooking;

use App\Slide;

use App\Blog;

use Auth;

use Cart;

use DB;

use Tag;

class PageController extends Controller

{

  public function index()
  {
    $products = Product::where('status', 'LIKE', 'PUBLISHED')->get();

    $slide = Slide::all();

    $new_post = Blog::where('status', 'LIKE', 'PUBLISHED')->orderBy('id', 'DESC')->take(4)->get();

    $posts = Blog::all();

    return view('pages.index', compact('slide', 'products', 'new_post', 'posts'));
  }

  public function Contact()

  {

    return view('pages.contact');
  }
  public function About()

  {
    $page = DB::table('pages')->where('slug', 'LIKE', 'lich-su-hinh-thanh-va-phat-trien')->first();
    return view('pages.page', compact('page'));
  }
  //Page Con
  public function PageMeat()
  {
    $page = DB::table('pages')->where('slug', 'LIKE', 'quy-trinh-san-xuat-thit')->first();
    return view('pages.page', compact('page'));
  }
  public function PageMilk()
  {
    $page = DB::table('pages')->where('slug', 'LIKE', 'quy-trinh-san-xuat-sua')->first();
    return view('pages.page', compact('page'));
  }
  public function PageTerm()
  {
    $pages = DB::table('pages')->where('type', 'Term')->paginate(6);
    return view('pages.archivePage', compact('pages'));
  }
  public function PageCompany()
  {
    $page = DB::table('pages')->where('slug', 'LIKE', 'hoat-dong-cong-ty')->first();
    return view('pages.page', compact('page'));
  }
  //
  public function getPage(Request $req)
  {
    $page = DB::table('pages')->where('type', 'Term')->where('slug', $req->id)->first();
    return view('pages.page', compact('page'));
  }
  public function search(Request $req)
  {
    $products = Product::where('name', 'LIKE', "%$req->search%")->where('status', 'LIKE', 'PUBLISHED')->orderBy('name', 'ASC')->paginate(9);

    $product_type = Product_type::all();

    $cook = Cooking::all();
    return view('products.search-result', compact('products', 'product_type', 'cook'));
  }

  //Logout

  public function getLogout()

  {

    Auth::logout();

    Cart::destroy();

    return redirect()->route('trang-chu');
  }
}
