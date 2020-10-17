<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
// ----------------admin-------------------------------
Route::get('quan-tri-website','AdminController@get_signIn')->name('get_signIn.admin');
Route::post('quan-tri-website','UserController@postSignIn')->name('post_signIn.admin');

//Slider
Route::resource('slider','SliderController');


Route::get('home-admin','AdminController@index')->name('homeAdmin');

Route::resource('danh-muc-san-pham','CategoryProductController');

Route::resource('thuong-hieu-san-pham','BrandProductController');
//phan san pham
Route::resource('san-pham','ProductController');
Route::get('khong-hien-thi/{id}','ProductController@unActive')->name('unActive');
Route::get('hien-thi/{id}','ProductController@active')->name('active');

//quan ly thong tin khach hang va don hang
Route::get('khach-hang','CustomerController@index')->name('customer.index');
Route::get('don-hang/{id}','CustomerController@showBill')->name('customer.showBill');
Route::post('cap-nhap-trang-thai-don-hang/{id}','BillController@update')->name('bill.update');
Route::get('don-hang-chi-tiet/{id}','BillDetailController@show')->name('bill.detail');
//quan ly nguoi dung 

Route::get('nguoi-dung','UserController@index')->name('users.index');

Route::post('nguoi-dung/{id}','UserController@update')->name('user.update');
//

//phan quan tri bai viet website


//quan ly the loai bai viet

Route::resource('the-loai-bai-viet','NewsCategoryController');

//quan ly bai viet

Route::resource('bai-viet','NewsController');
// -------------------end admin--------------------------------

//--------------------star frontend------------------------------
Route::get('trang-chu','HomeController@index')->name('home');
Route::get('gian-hang','HomeController@shop')->name('shop.index');
Route::get('thuong-hieu/{id}.php','HomeController@brand')->name('shop.brand');
Route::get('danh-muc/{id}.php','HomeController@cate')->name('shop.cate');
Route::get('chi-tiet/{id}.php','HomeController@detail')->name('shop.detail');
//tim kiem
Route::get('ket-qua-tim-kiem','HomeController@search')->name('search');
//phan dang ky
Route::view('dang-ky-dang-nhap','homeView.pages.signUp')->name('signUp');

Route::post('dang-ky-dang-nhap','UserController@postSingUp')->name('postSignUp');
//phan dang nhap
Route::view('dang-nhap-dang-ky','homeView.pages.signUp');
Route::post('dang-nhap-dang-ky','UserController@postSignIn')->name('postSignIn');
Route::get('dang-xuat-user','UserController@signOut')->name('signOut');

//xu ly phan gio hang
Route::post('gio-hang','CartController@addToCart')->name('addToCart');
Route::get('gio-hang','CartController@indexCart')->name('showCart');
Route::DELETE('xoa-gio-hang','CartController@deleteCart')->name('cart.delete');
Route::get('thanh-toan-don-hang','CartController@getCheckout')->name('cart.getCheckout');
Route::post('thanh-toan-don-hang','CartController@postCheckout')->name('cart.postCheckout');
//ket thuc phan xu ly don hang
Route::get('kiem-tra-don-hang','CartController@cartCheck')->name('cart.check');
Route::get('chi-tiet-don-hang/{id}.html','CartController@cartShow')->name('cart.show');
//--------------------------phan trang thong tin - tin tuc--------------
Route::get('tin-chi-tiet/{slug}.html','HomeController@blogDetail')->name('blog.detail');
Route::get('tin-tuc','HomeController@blog')->name('blog.index');

