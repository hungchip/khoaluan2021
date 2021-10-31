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

// Route::get('/admin', function () {
//     return view('admin.index');
// });

Auth::routes();
// guest
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@showPageAbout')->name('showPageAbout');
Route::get('/all-room', 'HomeController@showPageRoom')->name('showPageRoom');
// Route::get('/booking', 'HomeController@showPageBooking')->name('showPageBooking');
Route::get('/booking-step-1', 'BookingController@showStepOne')->name('showStepOne');
Route::get('/booking-step-2', 'BookingController@showStepTwo')->name('showStepTwo');
Route::get('/booking-step-3', 'BookingController@showStepThree')->name('showStepThree');
Route::get('/booking-step-4', 'BookingController@showStepFour')->name('showStepFour');
Route::get('/booking-final', 'BookingController@showFinalStep')->name('showFinalStep');
Route::get('/gallery', 'HomeController@showPageGallery')->name('showPageGallery');
Route::get('/blog', 'HomeController@showPageBlog')->name('showPageBlog');
Route::get('/contact', 'HomeController@showPageContact')->name('showPageContact');
Route::get('/detail-room/{id}', 'HomeController@showDetailRoom')->name('showDetailRoom');

//admin

Route::get('admin-dang-nhap', 'AdminController@getLogin')->name('getLogin')->middleware('checklogout'); //kiểm tra đăng xuất
Route::post('admin-dang-nhap', 'AdminController@postLogin')->name('postLogin');

Route::get('logout', 'AdminController@postLogout')->name('postLogout');

Route::group(['prefix' => '/', 'middleware' => 'checklogin'], function () {
    // auto enter admin dashboard 
    Route::resource('admin', 'AdminController');
    Route::get('showListAdmin','AdminController@showListAdmin')->name('showListAdmin');
    Route::get('findAdmin','AdminController@findAdmin')->name('findAdmin');
    Route::get('changePassword','AdminController@getChangePassword')->name('getChangePassword');
    Route::post('changePassword','AdminController@postChangePassword')->name('postChangePassword');

    // service
    Route::resource('service', 'ServiceController');
    Route::resource('roomType', 'RoomTypeController');
    Route::resource('room', 'RoomController');
    Route::resource('gallerys', 'GalleryController');
    Route::resource('booking', 'BookingController');
    Route::resource('bookingDetail', 'BookingDetailController');
});
