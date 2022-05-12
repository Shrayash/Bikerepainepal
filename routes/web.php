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

Route::get('/manageusers','UserController@create')->name('admin.manageusers')->middleware('role:superadmin');
Route::post('/manageusers/store/{id}','UserController@store')->name('user.store')->middleware('role:superadmin');

Route::get('/manageusers','UserController@create')->name('admin.manageusers');
Route::post('/manageusers/store/{id}','UserController@store')->name('user.store');

//.........................GENERAL SECTION..............................................//
Route::get('error',function(){
    return view('error');
});
Route::get('/', 'CategoryController@home')->name('index');
Route::get('/categories/all','CategoryController@allname')->name('allname');
Route::get('/categories','CategoryController@index')->name('category.menu');
Route::get('/category/{id}','CategoryController@category')->name('category');
Route::get('/categories/search', 'CategoryController@search')->name('video.search');
Route::get('/video/show/{id}','ShowController@show_video')->name('video.show');
Route::get('/doctor/video/show/{id}','ShowController@showall_video')->name('allvideo.show');
Route::get('/publication/show/{id}','ShowController@show_pub')->name('pub.show');
Route::get('/doctor/publication/show/{id}','ShowController@showall_pub')->name('allpub.show');
Route::get('/doctor/bio/show/{id}','ShowController@show_bio')->name('bio.show');
Route::get('/pub','ShowController@pub_index')->name('pub');
Route::get('/pub/speciality/{id}','ShowController@speciality')->name('pub.speciality');


//.........................ADMIN SECTION..............................................//

//index of video and publication 
Route::get('/admin/index','VideoController@index')->name('admin.index')->middleware('role:admin|superadmin');

//user deletion
Route::get('manageusers/delete/{id}', 'UserController@destroy')->name('user.delete')->middleware('role:superadmin');


//video CRUD
Route::get('/video/create','VideoController@create')->name('video.create')->middleware('role:admin');
Route::post('/video/store','VideoController@store')->name('video.store')->middleware('role:admin');
Route::get('video/edit/{id}', 'VideoController@edit')->name('video.edit')->middleware('role:admin');
Route::post('video/update/{id}', 'VideoController@update')->name('video.update')->middleware('role:admin');
Route::get('video/delete/{id}', 'VideoController@destroy')->name('video.delete')->middleware('role:admin');
Route::get('video_content/delete/{id}', 'VideoController@destroy_content')->name('video_content.delete')->middleware('role:admin');
Route::get('video/publish/{id}', 'PublishController@video')->name('video.publish')->middleware('role:superadmin');
Route::post('video/publish/value/{id}', 'PublishController@store')->name('publish.store')->middleware('role:superadmin');

//publication CRUD
Route::get('/publication/create','PublicationController@create')->name('pub.create')->middleware('role:admin');
// Route::get('/publication/show/{id}','PublicationController@show')->name('pub.show')->middleware('role:admin');
Route::post('/publication/store','PublicationController@store')->name('pub.store')->middleware('role:admin');
Route::get('/publication/edit/{id}', 'PublicationController@edit')->name('pub.edit')->middleware('role:admin');
Route::post('/publication/update/{id}', 'PublicationController@update')->name('pub.update')->middleware('role:admin');
Route::get('/publication/delete/{id}', 'PublicationController@destroy')->name('pub.delete')->middleware('role:admin');
Route::get('publication/publish/{id}', 'PublishController@publication')->name('pub.publish')->middleware('role:superadmin');
Route::post('publication/publish/value/{id}', 'PublishController@storepub')->name('publish.storepub')->middleware('role:superadmin');

//doctor bio CRUD
Route::get('/doctor/bio','DoctorController@index')->name('doctor.bio')->middleware('role:admin|superadmin');
Route::post('/doctor/bio/store','DoctorController@store')->name('bio.store')->middleware('role:admin|superadmin');
Route::post('/doctor/bio/updateimg','DoctorController@storeimage')->name('bio.updateimage')->middleware('role:admin|superadmin');
Route::post('/doctor/bio/upate','DoctorController@update')->name('bio.update')->middleware('role:admin|superadmin');

//doctor social media CRUD
Route::get('/doctor/social_media','SiteController@index')->name('doctor_media')->middleware('role:admin|superadmin');
Route::post('/doctor/social_media/store','SiteController@store')->name('doctor_media.store')->middleware('role:admin|superadmin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('facebook', function () {
    return view('facebook');
});
Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

