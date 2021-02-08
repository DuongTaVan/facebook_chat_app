<?php
/*
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Authorization, X-CSRF-Token, x-test-header, Origin, X-Requested-With, Content-Type, Accept' );
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
*/
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

//Proxy
Route::get('/proxy', 'AppProxyController@index')->middleware('auth.proxy');
Route::get('/proxy/facebook', 'AppProxyController@facebook')->middleware('auth.proxy');
//Route::group(['middleware' => 'auth'], function () {
Route::group(['middleware' => ['web']], function () {
    Route::post('/webhook/shop-redact', 'ProductreviewsController@shopRedact');
    Route::post('/webhook/customers-redact', 'ProductreviewsController@customersRedact');
    Route::post('/webhook/customers-data-request', 'ProductreviewsController@customersDataRequest');
    //payment declined.
    Route::get(
        '/declined',
        'ProductreviewsController@declined'
    )
        ->name('declined');
    //Plan controller
    Route::get('plan', 'PlanController@index')->name('plan');

    //User Guide
    Route::get(
        '/userguide',
        'ProductreviewsController@userguide'
    )
        ->name('userguide');

    Route::post('/publishToTheme', 'ProductreviewsController@publishToTheme')->name('publishToTheme');
    Route::get('/publishToTheme', function () {
        abort(404, 'Page not found');
    });

    //backend
    Route::get(
        '/',
        'ProductreviewsController@index'
    )
        ->middleware(['auth.shop', 'billable'])
        ->name('home');
    Route::get('setting','SettingController@index')->name('setting.index');
    Route::get('save_setting','SettingController@update')->name('setting.update');
    Route::get('login_facebook','SettingController@loginFB')->name('setting.loginFB');
    Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
    Route::get('/callback/{provider}', 'SocialController@callback');
});
