

<?php





/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/


//Pages
Route::get('/', 'PageController@index')->name('trang-chu');
Route::get('/tim-kiem', 'PageController@search')->name('search');
Route::get('/lien-he', 'PageController@Contact')->name('pages.contact');
Route::post('/contact', 'ContactController@postContact')->name('contact');
Route::post('/newletter', 'ContactController@postNewLetter')->name('newletter');

//About Us
Route::get('/about-us', 'PageController@About')->name('pages.about');
Route::get('/quy-trinh-san-xuat-thit', 'PageController@PageMeat')->name('pages.meat');
Route::get('/quy-trinh-san-xuat-sua', 'PageController@PageMilk')->name('pages.milk');
Route::get('/dieu-khoan-va-chinh-sach', 'PageController@PageTerm')->name('pages.term');
Route::get('/cong-ty', 'PageController@PageCompany')->name('pages.company');
Route::get('/page/{id}', 'PageController@getPage')->name('pages.show');

//Cart
Route::get('/gio-hang', 'CartController@index')->name('cart.index');

Route::post('/cart/add/{id}', 'CartController@addToCart')->name('cart.add');

Route::get('/cart/add/{id}', 'CartController@addToQCart')->name('cart.Qadd');

Route::get('/cart/remove/{rowId}', 'CartController@removeItem')->name('cart.remove');

Route::get('/cart/update/{id}', 'CartController@updateQty')->name('cart.update');

Route::post('/cart/style/{rowId}', 'CartController@updateStyle')->name('cart.upStyle');

Route::get('/cart/increase/{rowId}', 'CartController@increase')->name('cart.increase');

Route::get('/cart/decrease/{rowId}', 'CartController@decrease')->name('cart.decrease');

//Checkout

Route::get('/thanh-toan', 'CartController@getCheckout')->name('thanh-toan');
Route::get('/districts/{id}', 'CartController@district');
Route::get('/wards', 'CartController@ward');
Route::post('/thanh-toan', 'CartController@postCheckout')->name('checkout');
Route::get('/thanh-cong', 'CartController@orderSuccess')->name('thanh-cong');

//Product

Route::get('/cao-cap', [

    'as' => 'cao-cap',

    'uses' => 'ProductController@High_product'

]);

Route::get('/san-pham/{id}', [

    'as' => 'product',

    'uses' => 'ProductController@getProduct'

]);

Route::get('/trung-cap', [

    'as' => 'trung-cap',

    'uses' => 'ProductController@Medium_product'



]);

Route::get('/pho-thong', [

    'as' => 'pho-thong',

    'uses' => 'ProductController@Low_product'

]);

Route::get('/sua', [

    'as' => 'sua',

    'uses' => 'ProductController@Milk_product'

]);

Route::get('shop/{id}', [

    'as' => 'product_type',

    'uses' => 'ProductController@Filter_product'

]);

Route::get('shop', [

    'as' => 'shop',

    'uses' => 'ProductController@showProduct'

]);



//Blog

Route::get('/bai-viet', [

    'as' => 'danhmucbaiviet',

    'uses' => 'BlogController@showPost'

]);
Route::get('/danh-muc-bai-viet/{id}', [

    'as' => 'danh-muc',

    'uses' => 'BlogController@showCategory'

]);

Route::get('/bai-viet/{id}', [

    'as' => 'bai-viet',

    'uses' => 'BlogController@getPost'

]);

Route::get('/tag/{id}', [

    'as' => 'tag',

    'uses' => 'BlogController@getTag'

]);

Route::post('/rating', 'ProductController@ratingProduct')->name('rating');

//

Auth::routes();



//External Login
Route::get('auth/{provider}', 'FacebookAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'FacebookAuthController@handleProviderCallback');



//Customer

Route::get('logout', 'PageController@getLogout')->name('logout');

Route::get('dang-nhap', 'CustomerController@getLogin')->name('dang-nhap');

Route::post('login', 'CustomerController@postLogin')->name('login');

Route::get('dang-ky', 'CustomerController@getRegister')->name('dang-ky');

Route::post('register', 'CustomerController@postRegister')->name('register');

Route::get('chi-tiet/{id}', 'CustomerController@detailCustomer')->name('cus.detail')->middleware('auth');

Route::get('/order/detail/{id}', 'CustomerController@orderDetail')->name('order.detail')->middleware('auth');

Route::post('edit/{id}', 'CustomerController@editCustomer')->name('cus.edit')->middleware('auth');

Route::post('address/{id}', 'CustomerController@editAddress')->name('cus.address')->middleware('auth');

Route::post('change-password/{id}', 'CustomerController@passwordChange')->name('cus.password')->middleware('auth');



//Address

Route::get('province', 'CustomerController@province');
//Ajax
Route::get('/ajaxData', [

    'as' => 'product-ajax',

    'uses' => 'ProductController@ajaxData'

]);

Route::group(['prefix' => 'admin'], function () {

    Voyager::routes();
});
