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







Auth::routes();




Route::get('/',function(){


	return redirect('login');

});



Route::group(['middleware' => 'auth'],function(){

	Route::get('/admin/dashboard', 'HomeController@index')->name('home');
	
	Route::prefix('/profile')->group(function(){

		Route::get('/view','Admin\ProfileController@view')->name('profile.view');
		Route::get('/edit/{slug}','Admin\ProfileController@edit')->name('profile.edit');
		Route::post('/update/{id}','Admin\ProfileController@update')->name('profile.update');
		Route::get('/password/change','Admin\ProfileController@changePasswordForm')->name('password.change');
		Route::post('/password/change','Admin\ProfileController@PasswordStore')->name('password.store');



	});

	Route::prefix('/user')->group(function(){

		Route::get('/list','Admin\UserController@all_user')->name('user.view');
		Route::get('/create','Admin\UserController@create')->name('user.create');
		Route::post('/store','Admin\UserController@store')->name('user.store');
		Route::get('/delete/{id}','Admin\UserController@delete')->name('user.destroy');

	});

	Route::prefix('/doctor')->group(function(){

		Route::get('/list','Admin\DoctorContoller@all_doctor')->name('doctor.view');
		Route::get('/create','Admin\DoctorContoller@create')->name('doctor.create');
		Route::post('/store','Admin\DoctorContoller@store')->name('doctor.store');
		Route::get('/delete/{id}','Admin\DoctorContoller@delete')->name('doctor.destroy');

	});

	Route::prefix('/patient')->group(function(){

		Route::get('/list','Admin\PatientController@all_patient')->name('patient.view');
		Route::get('/create','Admin\PatientController@create')->name('patient.create');
		Route::post('/store','Admin\PatientController@store')->name('patient.store');
		Route::get('/delete/{id}','Admin\PatientController@delete')->name('patient.destroy');

	});

	Route::prefix('/service')->group(function(){

		Route::get('/list','Admin\ServiceController@all_service')->name('service.view');
		Route::post('/store','Admin\ServiceController@store')->name('service.store');
		Route::get('/delete/{id}','Admin\ServiceController@delete')->name('service.destroy');

	});

	Route::prefix('/invoice')->group(function(){

		Route::get('/list','Admin\InvoiceController@all_invoice')->name('invoice.view');
		Route::get('/create','Admin\InvoiceController@create')->name('invoice.create');
		Route::post('/store','Admin\InvoiceController@store')->name('invoice.store');
		Route::get('/delete/{id}','Admin\InvoiceController@delete')->name('invoice.destroy');
		Route::get('/details/{id}','Admin\InvoiceController@details')->name('invoice.details');
		Route::get('/invoice/pdf/{id}','Admin\InvoiceController@invoicePDF')->name('invoice.pdf');
		Route::get('/test/create','Admin\ServiceController@create')->name('service.create');

	});

	Route::prefix('/setting')->group(function(){

		Route::get('/create','Admin\SettingController@create')->name('setting.create');
		Route::post('/store','Admin\SettingController@store')->name('setting.store');



	});

	








});


