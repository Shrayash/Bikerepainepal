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
Route::get('verifyEmail', 'Auth\RegisterController@verify')->name('verifyEmail');
Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@emailsent')->name('sendEmail');

// Route::get('/manageusers','UserController@create')->name('admin.manageusers')->middleware('role:superadmin');
Route::post('/manageusers/store/{id}','UserController@store')->name('user.store')->middleware('role:superadmin');

// Route::get('/manageusers','UserController@create')->name('admin.manageusers');
Route::post('/manageusers/store/{id}','UserController@store')->name('user.store');

//.........................GENERAL SECTION..............................................//
// Route::get('error',function(){
//     return view('error');
// });
Route::get('/', 'CategoryController@home')->name('index');
// Route::get('/categories/all','CategoryController@allname')->name('allname');
// Route::get('/categories','CategoryController@index')->name('category.menu');
// Route::get('/category/{id}','CategoryController@category')->name('category');
// Route::get('/categories/search', 'CategoryController@search')->name('video.search');
// Route::get('/video/show/{id}','ShowController@show_video')->name('video.show');
// Route::get('/doctor/video/show/{id}','ShowController@showall_video')->name('allvideo.show');
// Route::get('/publication/show/{id}','ShowController@show_pub')->name('pub.show');
// Route::get('/doctor/publication/show/{id}','ShowController@showall_pub')->name('allpub.show');
// Route::get('/doctor/bio/show/{id}','ShowController@show_bio')->name('bio.show');
// Route::get('/pub','ShowController@pub_index')->name('pub');
// Route::get('/pub/speciality/{id}','ShowController@speciality')->name('pub.speciality');


//.........................ADMIN SECTION..............................................//

//index of video and publication 
Route::get('/admin/index','ServiceController@index')->name('admin.index')->middleware('role:admin|superadmin');

//user deletion
// Route::get('manageusers/delete/{id}', 'UserController@destroy')->name('user.delete')->middleware('role:superadmin');

//customer CRUD
Route::get('/customer/register_cust','CustomerController@create')->name('customer.register_cust')->middleware('role:superadmin');
Route::post('/customer/store','CustomerController@store')->name('customer.store')->middleware('role:superadmin');
Route::get('/customer/show/{id}','CustomerController@show')->name('customer.show')->middleware('role:superadmin');
Route::get('/customer/edit/{id}','CustomerController@edit')->name('customer.edit')->middleware('role:superadmin');
Route::post('/customer/update/{id}', 'CustomerController@update')->name('customer.update')->middleware('role:superadmin');
Route::get('/customer/search','CustomerController@search')->name('customer.search')->middleware('role:superadmin');
Route::get('/customer/check','CustomerController@check')->name('customer.check')->middleware('role:superadmin');

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

//booking

Route::get('/customer/book','BookingController@book')->name('customer.book');
Route::get('/customer/newbook','BookingController@newbook')->name('customer.newbook');
Route::get('/customer/newbook/success','BookingController@booked')->name('book.success');
Route::post('/customer/newbook/store','BookingController@book_store')->name('book.newstore');
Route::get('/customer/oldmobile','BookingController@oldmobile')->name('customer.oldmobile');
Route::get('/customer/oldbook','BookingController@oldbook')->name('customer.oldbook');

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


