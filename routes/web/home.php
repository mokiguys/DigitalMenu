<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'MainController@Home')->name('home');
Route::get('/home', 'MainController@Home');
Route::get('Plans', 'MainController@Plans')->name('plans');
Route::get('Categories/{category}', 'MainController@Categories')->name('categories');
Route::get('Categories/{category}/{detail}', 'MainController@Detail')->name('detail');
Route::get('Categories/{category}/{detail}/Menu', 'MainController@Menu')->name('shop.menu');
Route::post('GetMenuDetail','MainController@MenuGetDetail')->name('menu.detail');
Route::get('Sign', 'MainController@Sign')->name('sign');
Route::get('Contact-us', 'MainController@contact')->name('contact');
Route::get('About-us', 'MainController@about')->name('about');
Route::get('User-panel', 'MainController@UserPanel')->name('userPanel');
Route::get('Qr-code/{shop}', 'MainController@Qr_view')->name('Qr.index');
Route::get('Marketer-panel', 'MainController@MarketerPanel')->name('marketerPanel');
Route::get('Language/{lang}', 'MainController@Language')->name('Language');
Route::resource('/user_menu', 'MenuController')->except(['show','create']);
Route::post('/user_menu/check_ingredients', 'MenuController@check_exist_ingredients')->name('menu_check');
Route::post('/user_menu/check_food', 'MenuController@check_food')->name('menu_exist_food');
// register
Route::post('SignUp', 'MainController@Register')->name('user.register')->middleware('guest');
Route::post('SignIn', 'MainController@Login')->name('user.login')->middleware('guest');

// Business
Route::get('business/{business}', 'BusinessController@business_create')->name('Business.create');
Route::post('business', 'BusinessController@business_store')->name('Business.store');
Route::get('business/{business}/edit', 'BusinessController@business_edit')->name('Business.edit');
Route::patch('business/{business}', 'BusinessController@business_update')->name('Business.update');
Route::put('business/{business}/update', 'BusinessController@Deactive_shop')->name('Business.stop');
Route::post('businessGenerateQrCode', 'BusinessController@Qrcode_generator')->name('Business.qrCode');
//ticket
Route::post('ticket', 'TicketController@store')->name('ticketSite.store');
Route::post('ticket_answer', 'TicketController@answer')->name('ticketSite.answer');
Route::get('ticket/{ticket}', 'TicketController@show')->name('ticketSite.show');
Route::put('closeTicketUser', 'TicketController@closeTicket');
// user
Route::put('user', 'UserController@Update_User')->name('user.update.user')->middleware('auth');
Route::put('user/password', 'UserController@ChangePassword')->name('user.update.password')->middleware('auth');
// marketer
Route::put('marketer', 'UserController@update_marketer')->name('marketer.update.user')->middleware('auth');
Route::put('marketer/password', 'UserController@ChangePassword')->name('marketer.update.password')->middleware('auth');
// card
Route::get('cart','CartController@index')->name('cart.index');
Route::post('cart','CartController@store')->name('cart.store');
Route::post('cart/changeCount','CartController@changeCount')->name('cart.changeCount');
Route::delete('cart/{cart}/destroy','CartController@destroy')->name('cart.destroy');
// bills
Route::get('bills','PaymentCartController@index')->name('bills.index');
Route::post('bills','PaymentCartController@store')->name('bills.store');

Route::post('/address/province', 'MainController@GetProvince')->name('main.GetProvince');
Route::post('/address/city', 'MainController@GetCity')->name('main.GetCity');

Route::get('orders/{shop}','PaymentCartController@list')->name('order.list');
Route::get('orders/{shop}/{list}','PaymentCartController@DetailList')->name('order.detailList');

Route::post('enableTax','BusinessController@enable_tax')->name('business.tax');
Route::post('service_charge','BusinessController@service_charge')->name('business.service_charge');

Route::get('search','MainController@SearchCategories')->name('search.cat');
// comments
Route::post('FoodCommentSave','FoodComemnt@store')->name('commentFood.store');
Route::post('SubmitCommentFood','FoodComemnt@submit')->name('submitComment.Food');
Route::post('GetFoodComemnt','FoodComemnt@GetComemnt')->name('commentFood.get');

Route::post('ShopComemntStore','ShopCommentController@store')->name('shopComemnt.store');

Route::get('property/{property}','MainController@property')->name('property.search');

Route::get('/auth/google','Auth\GoogleAuthController@redirect')->name('auth.google');
Route::get('/auth/google/callback','Auth\GoogleAuthController@callback');


Route::get('/blog',[\App\Http\Controllers\MainController::class,'Blog'])->name('blog.view');
Route::get('/blog/{article:slug}',[\App\Http\Controllers\MainController::class,'BlogArticle'])->name('blog.detail');


