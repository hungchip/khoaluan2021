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
// Route::get('/room-search', 'HomeController@showRoomRessult')->name('showPageSeacrh');
Route::get('/list-blog', 'HomeController@showPageBlog')->name('showPageBlog');
Route::get('/blog-detail/{id}', 'HomeController@showBlogDetail')->name('showBlogDetail');
Route::get('/contact', 'HomeController@showPageContact')->name('showPageContact');
Route::post('/contact', 'HomeController@postContact')->name('postContact');
Route::get('/detail-room/{id}', 'HomeController@showDetailRoom')->name('showDetailRoom');
Route::post('/storeBooking','BookingController@storeBooking')->name('storeBooking');
// Route::get('/finish','HomeController@finish')->name('finish');
//admin

Route::get('admin-dang-nhap', 'AdminController@getLogin')->name('getLogin')->middleware('checklogout'); //kiểm tra đăng xuất
Route::post('admin-dang-nhap', 'AdminController@postLogin')->name('postLogin');

Route::get('logout', 'AdminController@postLogout')->name('postLogout');

Route::group(['prefix' => '/', 'middleware' => ['checklogin','roles:basic']], function () {

    // auto enter admin dashboard
    Route::resource('admin', 'AdminController');
    Route::get('showListAdmin', 'AdminController@showListAdmin')->name('showListAdmin');
    Route::get('findAdmin', 'AdminController@findAdmin')->name('findAdmin');
    Route::get('changePassword', 'AdminController@getChangePassword')->name('getChangePassword');
    Route::post('changePassword', 'AdminController@postChangePassword')->name('postChangePassword');

    //chỉ quyền admin
    Route::group(['middleware' => 'roles:admin'], function () {
        Route::post('assign-role', 'AdminController@assignRole')->name('assignRole');
        Route::get('booking-filter','AdminController@bookingFilter')->name('bookingFilter');
        Route::get('booking-statistic','AdminController@bookingStatistic')->name('bookingStatistic');
        Route::get('this-month','AdminController@thisMonth')->name('thisMonth');
    });
    // admin,tiếp tân
    Route::group(['middleware' => 'roles:admin;receptionist'], function () {
        Route::resource('booking', 'BookingController');
        Route::post('assign-role', 'AdminController@assignRole')->name('assignRole');
        Route::resource('roomDelivery', 'roomDeliveryController');
        Route::get('create-room-delivery/{id}', 'RoomDeliveryController@createRoomDelivery')->name('createRoomDelivery');
        Route::get('checkBooking/{id}', 'BookingController@checkBooking')->name('checkBooking');
        Route::get('checkBookingDetail/{id}', 'BookingController@checkBookingDetail')->name('checkBookingDetail');
        Route::resource('bookingDetail', 'BookingDetailController');
        Route::get('approve-booking/{id}','BookingController@approveBooking')->name('approveBooking');
        Route::get('approve-booking-detail/{id}','BookingController@approveBookingDetail')->name('approveBookingDetail');
        Route::get('check/{id}', 'BookingController@check')->name('check');
        Route::get('checkout/{id}', 'BookingController@checkout')->name('checkout');
    });

    //admin, tác giả
    Route::group(['middleware' => 'roles:admin;author'], function () {
        Route::resource('blog', 'BlogController');
    });

    // service
    Route::resource('service', 'ServiceController');
    Route::resource('roomType', 'RoomTypeController');
    Route::resource('room', 'RoomController');
    Route::resource('adcontact', 'ContactController');
    Route::get('show-map-room', 'RoomController@showMapRoom')->name('showMapRoom');
    Route::resource('gallerys', 'GalleryController');
    
    Route::get('showChart','adminController@showChart')->name('showChart');
});
