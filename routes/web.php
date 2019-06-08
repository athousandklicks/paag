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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//only logged in users can view the below
Route::group(['middleware'=>'auth'], function(){

    
    Route::resource('addresses', 'AddressController');

    Route::resource('artists', 'ArtistController');

    Route::resource('countries', 'CountryController');

    Route::resource('frames', 'FrameController');

    Route::resource('hangs', 'HangController');

    Route::resource('media', 'MediumController');

    Route::resource('products', 'ProductController');

    Route::resource('signs', 'SignController');

    Route::resource('signLocations', 'Sign_LocationController');

    Route::resource('styles', 'StyleController');

    Route::resource('subjects', 'SubjectController');

    Route::resource('supports', 'SupportController');

    Route::resource('tags', 'TagController');

    Route::resource('types', 'TypeController');

    Route::resource('accounts', 'AccountController');

    Route::resource('users', 'UserController');

    Route::resource('transactions', 'TransactionController');

    Route::resource('accountHistories', 'AccountHistoryController');

    Route::resource('vendors', 'VendorController');


    //only moderators and admins can view user index
    Route::group(['middleware'=>'moderatorgate'], function(){
        Route::get('/users', 'UserController@index')->name('users.index');
    });

    Route::post('/accounts/apply_for_payout', 'AccountController@apply_for_payout')->name('accounts.apply_for_payout');

    Route::post('/accounts/mark_as_paid', 'AccountController@mark_as_paid')
        ->name('accounts.mark_as_paid')
        ->middleware('moderatorgate');

    //only admins can access this
    Route::resource('roles', 'RoleController')->middleware('admingate');

    Route::get('/accounts/create', 'AccountController@create')
    ->name('accounts.create')->middleware('admingate');


    Route::get('/accounts/edit', 'AccountController@edit')
    ->name('accounts.edit')->middleware('admingate');

    Route::get('/accountHistories/create', 'AccountHistoryController@create')
    ->name('accountHistories.create')->middleware('admingate');

    Route::post('/accountHistories/edit', 'AccountHistoryController@edit')
    ->name('accountHistories.edit')->middleware('admingate');

    Route::get('/transactions/create', 'TransactionController@create')
    ->name('transactions.create')->middleware('admingate');

    Route::get('/edit/{transactions}', 'TransactionController@edit')
    ->name('transactions.edit')->middleware('admingate');






});



