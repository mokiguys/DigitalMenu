<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false
]);
//marketer
Route::resource('/marketer', 'admin\MarketerController')->except(['show']);
Route::get('wallet_view', 'admin\MarketerController@wallet_view')->name('wallet.index');
Route::put('/wallet_update/{wallet}','admin\MarketerController@wallet_update')->name('wallet.update');
Route::put('/UpdateConfirmMarketer', 'admin\MarketerController@UpdateConfirmAdmin')->name('marketer.confirm');
Route::put('marketer/{user}/update', 'admin\MarketerController@UpdateBanUser')->name('marketer.ban');

// user business
Route::resource('/user_business', 'admin\UserController')->except(['show']);
Route::get('user_business/wallet_view', 'admin\UserController@wallet_view')->name('user_business.wallet.index');
Route::put('user_business/wallet_update/{wallet}','admin\UserController@wallet_update')->name('user_business.wallet.update');
Route::put('user_business/{user}/update', 'admin\UserController@UpdateBanUser')->name('user_business.ban');
Route::put('/UpdateConfirmUserBusiness', 'admin\UserController@UpdateConfirmAdmin')->name('user_business.confirm');
// wallet

//home
Route::get('/', 'admin\HomeController@index')->name('Admin.home');
// banner
Route::get('/Banner/{banner}', 'admin\BannerController@edit')->name('Banner.edit');
Route::put('/Banner/{banner}', 'admin\BannerController@update')->name('Banner.update');
//     province Route
Route::resource('/province', 'admin\ProvinceController')->except(['show', 'create']);
//     country Route
Route::resource('/country', 'admin\CountryController')->except(['show', 'create']);
//     Cities Route
Route::resource('/cities', 'admin\CitiesController')->except(['show', 'create']);
Route::post('/cities/province', 'admin\CitiesController@GetProvince')->name('cities.GetProvince');
Route::post('/cities/city', 'admin\CitiesController@GetCity')->name('cities.GetCity');
Route::post('/cities/show_one','admin\CitiesController@ShowOne')->name('cities.ShowOne');
//     Amenities Route
Route::resource('/amenities', 'admin\AmenitiesController')->except(['show', 'create']);
//     CategoryStore Route
Route::resource('/categoryStore', 'admin\CategoryStoreController')->except(['show', 'create']);
//     CategoryFood Route
Route::resource('/categoryFood', 'admin\CategoryFoodController')->except(['show', 'create']);
//     foods Route
Route::resource('/food', 'admin\FoodController')->except(['show', 'create']);
Route::post('/categoryFood/shop', 'admin\FoodController@menuGet')->name('categoryFood.shop');
//     menu Route
Route::resource('/menu', 'admin\MenuController')->except(['show', 'create']);
Route::get('/menu/{shop}', 'admin\MenuController@index')->name('menu.index');
//     ingredient Route
Route::resource('/ingredient', 'admin\IngredientController')->except(['show', 'create']);
//     shop Route
Route::resource('/shop', 'admin\ShopController')->except(['show']);
Route::put('/UpdateConfirmShop', 'admin\ShopController@UpdateConfirmAdmin');
//     Plan Route
Route::resource('/plan', 'admin\PlanController')->except(['show','create','store','destroy']);
//      currency
Route::resource('/currency', 'admin\CurrencyController')->except(['show','destroy','index','create','store']);
Route::get('/currency/currencyUpdate', 'admin\CurrencyController@UpdateCurrencyAuto')->name('autoUpdateCurrency');
//      ticket
Route::resource('/ticket', 'admin\TicketController')->except(['destroy','create','edit','update']);
Route::put('/CloseTicket', 'admin\TicketController@UpdateClose');
Route::get('ticket_subject', 'admin\TicketController@index_subject')->name('ticket.subject.index');
Route::post('ticket_subject', 'admin\TicketController@store_subject')->name('ticket.subject.store');
Route::get('ticket_subject/{ticket_subject}', 'admin\TicketController@edit_subject')->name('ticket.subject.edit');
Route::put('/ticket_subject/{ticket_subject}','admin\TicketController@update_subject')->name('ticket.subject.update');
//  setting
Route::resource('/setting', 'admin\SettingController')->except(['show','destroy','create','store']);
//  permission
Route::resource('/permission', 'admin\PermissionController');
//  role
Route::resource('/roles', 'admin\RoleController');
//  manager
Route::resource('/manager', 'admin\user\ManagerController');
Route::get('/{manager}/UpdatePasswordUser', 'admin\user\ManagerController@editPasswordUser')->name('manager.editPassword');
Route::put('/UpdatePasswordUser/{manager}', 'admin\user\ManagerController@UpdatePasswordUser')->name('manager.updatePassword');
Route::put('/UpdateBanUser', 'admin\user\ManagerController@UpdateBanManager')->name('manager.updateBan');
Route::get('/manager/{manager}/permissions', 'admin\user\PermissionController@create')->name('manager.permission');
Route::post('/manager/{manager}/permissions', 'admin\user\PermissionController@store')->name('manager.permission.store');
////      About Route
Route::get('/about/edit', 'admin\AboutController@edit')->name('about.edit');
Route::put('/about', 'admin\AboutController@update')->name('about.update');
//     Property Site Route
Route::resource('/propertes', 'admin\PropertyController')->except(['show', 'create','store','destroy']);
//     Article Site Route
Route::resource('/CategoryArticle', 'admin\CategoryArticleController')->except(['show', 'create']);
Route::resource('/tags', 'admin\TagController')->except(['show', 'create']);
Route::resource('/article', 'admin\ArticleController')->except(['show', 'create']);
Route::post('/article/show_index','admin\ArticleController@ShowIndex')->name('article.ShowIndex');







////    Service Route
//Route::resource('/service', 'admin\ServiceController')->except(['show', 'create']);
//Route::get('/translateser/{translateser}/edit','admin\ServiceController@edit')->name('translateser.edit');
//Route::put('/translateser/{translateser}','admin\ServiceController@update')->name('translateser.update');
////    Info Route
//Route::resource('/info', 'admin\InfoController')->except(['show', 'create', 'store', 'destroy', 'index']);
////      Employ
//Route::resource('/employe', 'admin\EmployeController')->except(['show', 'create', 'store', 'destroy', 'index']);
////    Project Route
//Route::resource('/project', 'admin\ProjectController')->except(['show']);
//Route::get('/translatepro/{translatepro}/edit','admin\ProjectController@edit')->name('translatepro.edit');
//Route::put('/translatepro/{translatepro}','admin\ProjectController@update')->name('translatepro.update');

//
////      Contact Route
//Route::get('Contact', 'admin\ContactController@index')->name('Contact.index');
//Route::put('/UpdateSubmitContact', 'admin\ContactController@UpdateStatusContact');
//Route::delete('Contact/{contact}', 'admin\ContactController@destroy');

////      Personal Route
//Route::resource('/personal', 'admin\PersonalController')->except(['show', 'create']);
//Route::put('/UpdateSortPersonal', 'admin\PersonalController@UpdateSort');
//Route::get('/translateper/{translateper}/edit','admin\PersonalController@edit')->name('translateper.edit');
//Route::put('/translateper/{translateper}','admin\PersonalController@update')->name('translateper.update');
////      Create Site Map
//Route::get('createSiteMap', 'admin\HomeController@SiteMap');
////      Seo route
//Route::resource('/seo', 'admin\SeoController')->except(['show','create']);
////      Page Route
//Route::get("page",'admin\PageController@index')->name('page.index');
//Route::get("page/{page}/edit",'admin\PageController@edit')->name('page.edit');
//Route::put("page/{page}",'admin\PageController@update')->name('page.update');
//
////      Uploader Route
//Route::resource('/uploader', 'admin\UploaderFile')->except(['show','create','edit','upload']);
//
