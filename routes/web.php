<?php

use Laravel\Socialite\Facades\Socialite;
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
// Route::get('/clear-cache', function() {
//     Artisan::call('config:clear');
//     Artisan::call('view:clear');
//     Artisan::call('cache:clear');
// });

Route::get('link','StorageController@store_link');

Route::get('seed','SeedController@autoSeed');

Route::get('/forget-password','ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');
Route::post('/forget-password','ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post'); 
Route::get('/reset-password/{token}', 'ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');
Route::post('/reset-password', 'ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');
// Route::get('verifyEmail', 'Auth\RegisterController@verify')->name('verifyEmail');
// Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@emailsent')->name('sendEmail');

// // Route::get('/manageusers','UserController@create')->name('admin.manageusers')->middleware('role:superadmin');
// Route::post('/manageusers/store/{id}','UserController@store')->name('user.store')->middleware('role:superadmin');

// // Route::get('/manageusers','UserController@create')->name('admin.manageusers');
// Route::post('/manageusers/store/{id}','UserController@store')->name('user.store');

//.........................GENERAL SECTION..............................................//
// Route::get('error',function(){
//     return view('error');
// });
Route::get('/', 'CategoryController@home')->name('index');
Route::get('/signup/new','BookingController@signup_brn')->name('signup');
Route::post('/signup/store','BookingController@signup_store')->name('signup.store');
Route::get('/change_data', 'BookingController@change_data')->name('change.data');
Route::get('/sms_all', 'BookingController@send_sms_all')->name('sms.all');
Route::get('/qr_gen', 'BookingController@qr_gen')->name('qr_gen');


//.........................ADMIN SECTION..............................................//

//index of video and publication 
Route::get('/admin/index','ServiceController@index')->name('admin.index')->middleware('role:admin|superadmin');

//user deletion
// Route::get('manageusers/delete/{id}', 'UserController@destroy')->name('user.delete')->middleware('role:superadmin');

//search
Route::get('/customer/service/booked/check','AdminBookController@check')->name('book.check')->middleware('role:superadmin'); 
Route::get('/customer/service/booked','AdminBookController@search')->name('book.search')->middleware('role:superadmin');


//customer CRUD
Route::get('/customer/register_cust','UserController@create')->name('customer.register_cust')->middleware('role:superadmin');
Route::post('/customer/store','UserController@store')->name('customer.store')->middleware('role:superadmin');
Route::get('/customer/show/{id}','UserController@show')->name('customer.show')->middleware('role:superadmin');
Route::get('/customer/edit/{id}','UserController@edit')->name('customer.edit')->middleware('role:superadmin');
Route::post('/customer/update/{id}', 'UserController@update')->name('customer.update')->middleware('role:superadmin');
Route::get('/customer/search','UserController@search')->name('customer.search')->middleware('role:superadmin');
Route::get('/customer/check','UserController@check')->name('customer.check')->middleware('role:superadmin');


//inventory CRUD

Route::get('/inventory/category/all','BookingController@show_category')->name('inventory.show');
Route::get('/inventory/category/{slug}','BookingController@category_items')->name('inventory.category_items');
Route::post('/inventory/category/','BookingController@search_cat')->name('inventory.search_cat');
Route::get('/inventory/category/details/{slug}','BookingController@items_details')->name('inventory.item_details');

Route::get('/inventory/create','InventoryController@create')->name('inventory.create')->middleware('role:superadmin');
Route::post('/inventory/store','InventoryController@store')->name('inventory.store')->middleware('role:superadmin');
Route::get('/inventory/edit/{id}','InventoryController@edit')->name('inventory.edit')->middleware('role:superadmin');
Route::post('/inventory/update/{id}', 'InventoryController@update')->name('inventory.update')->middleware('role:superadmin');
Route::get('/inventory/delete/{id}', 'InventoryController@delete')->name('inventory.delete')->middleware('role:superadmin');
Route::get('/inventory/search','InventoryController@search')->name('inventory.search')->middleware('role:superadmin');
Route::get('/inventory/index','InventoryController@index')->name('inventory.index')->middleware('role:superadmin');

//category CRUD
Route::get('/category/create','CategoryController@create')->name('category.create')->middleware('role:superadmin');
Route::post('/category/store','CategoryController@store')->name('category.store')->middleware('role:superadmin');
Route::get('/category/show/{id}','CategoryController@show')->name('category.show')->middleware('role:superadmin');
Route::get('/category/edit/{id}','CategoryController@edit')->name('category.edit')->middleware('role:superadmin');
Route::get('/category/delete/{id}','CategoryController@delete')->name('category.delete')->middleware('role:superadmin');
Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update')->middleware('role:superadmin');
Route::get('/category/search','CategoryController@search')->name('category.search')->middleware('role:superadmin');
// Route::get('/category/index','CategoryController@index')->name('category.index')->middleware('role:superadmin');

//Order CRUD
Route::get('/product/order_confirmation/{slug}','OrderController@index')->name('order.confirm')->middleware('role:admin|superadmin');
Route::post('/product/confirmed/{slug}','OrderController@store')->name('order.confirmed')->middleware('role:admin|superadmin');
Route::get('/product/show','OrderController@show')->name('order.show')->middleware('role:admin|superadmin');
Route::get('/order/dashboard','OrderController@showall')->name('order.showall')->middleware('role:superadmin');
Route::get('/order/manage/{id}','OrderController@order_admin_edit')->name('orderadmin.edit')->middleware('role:superadmin');
Route::post('/order/update/{id}', 'OrderController@order_admin_update')->name('order.adminupdate')->middleware('role:superadmin');
Route::get('/category/search','CategoryController@search')->name('category.search')->middleware('role:superadmin');


//servicing CRUD
Route::any('/customer/service/update/{id}','ServiceController@update')->name('service.start')->middleware('role:superadmin');
Route::get('/customer/service/detail/{id}','ServiceController@edit')->name('service.edit')->middleware('role:superadmin');
Route::post('/customer/service/resolve/{id}','ServiceController@resolve')->name('service.resolve')->middleware('role:superadmin');
Route::get('/customer/service/ongoings/','ServiceController@ongoing')->name('service.ongoing')->middleware('role:superadmin');
Route::get('/customer/service/resolved/','ServiceController@resolved')->name('service.resolved')->middleware('role:superadmin');


//Booking Service Admin
Route::get('/customer/service/booking/requests/','AdminBookController@show')->name('book.request')->middleware('role:superadmin');
Route::get('/customer/service/booking/edit/{id}','AdminBookController@edit')->name('book.edit')->middleware('role:superadmin');
Route::get('/customer/service/book/{id}','AdminBookController@update_book')->name('book.update')->middleware('role:superadmin');
Route::post('/customer/service/booking/update/{id}','AdminBookController@update_to_vehicles')->name('book.noupdate')->middleware('role:superadmin');
// Route::get('/customer/service/booked','AdminBookController@show_book')->name('booked.show')->middleware('role:superadmin');
Route::post('/customer/service/booking/cancel/{id}','AdminBookController@cancel_book')->name('book.cancel')->middleware('role:superadmin');
//booking

Route::get('/customer/bill/','ServiceController@sms_bill')->name('sms.bill')->middleware('role:admin');


Route::get('/customer/book','BookingController@book')->name('customer.book');
Route::get('/customer/newbook','BookingController@newbook')->name('customer.newbook');
Route::get('/customer/newbook/success','BookingController@booked')->name('book.success');
Route::post('/customer/newbook/store','BookingController@book_store')->name('book.newstore');
Route::get('/customer/oldmobile','AdminBookController@check_oldmobile')->name('customer.oldmobile')->middleware('role:admin|superadmin');
Route::get('/customer/search/oldmobile','AdminBookController@oldmobile')->name('search.oldmobile')->middleware('role:admin|superadmin');
Route::get('/customer/oldbook/{id}','AdminBookController@oldbook')->name('customer.oldbook')->middleware('role:admin|superadmin');
Route::post('/customer/oldbook/store/{id}','AdminBookController@book_old_store')->name('customer.oldbook_store')->middleware('role:admin|superadmin');
//video CRUD
Route::get('/video/create','VideoController@create')->name('video.create')->middleware('role:admin');
// Route::post('/video/store','VideoController@store')->name('video.store')->middleware('role:admin');
// Route::get('video/edit/{id}', 'VideoController@edit')->name('video.edit')->middleware('role:admin');
// Route::post('video/update/{id}', 'VideoController@update')->name('video.update')->middleware('role:admin');
// Route::get('video/delete/{id}', 'VideoController@destroy')->name('video.delete')->middleware('role:admin');
// Route::get('video_content/delete/{id}', 'VideoController@destroy_content')->name('video_content.delete')->middleware('role:admin');
// Route::get('video/publish/{id}', 'PublishController@video')->name('video.publish')->middleware('role:superadmin');
// Route::post('video/publish/value/{id}', 'PublishController@store')->name('publish.store')->middleware('role:superadmin');


//doctor social media CRUD
Route::get('/doctor/social_media','SiteController@index')->name('doctor_media')->middleware('role:admin|superadmin');
Route::post('/doctor/social_media/store','SiteController@store')->name('doctor_media.store')->middleware('role:admin|superadmin');

// Route::get('/', 'BookingController@about')->name('about');
Route::get('/about', 'BookingController@about')->name('about');
Route::get('/service', 'BookingController@service')->name('service');
Route::get('/downloads', 'BookingController@downloads')->name('downloads');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


