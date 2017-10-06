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

Route::get('/dummy',							'LoginController@dummy');

Route::group( [ 'middleware' => 'web' ], function(){
	Route::get('/',											'LoginController@showLogin')->name('login');
	Route::post('login',									'LoginController@doLogin');
	Route::get('logout',									'LoginController@doLogout');

	Route::group( ['prefix' => 'admin/manage' , 'middleware' => 'auth:web'], function(){

		Route::get('/dashboard', 							'Admin\DashboardController@index');

		Route::group( ['prefix' => 'feedback'], function(){

			Route::group( ['middleware' => 'opb'], function(){
				Route::get('/',									'Admin\FeedbackController@index');
				Route::get('/destroy/{id}',						'Admin\FeedbackController@destroy');
			});

			Route::get('/create',							'Admin\FeedbackController@create');
			Route::post('/store',							'Admin\FeedbackController@store');
		});

		Route::group( ['prefix' => 'transaction', 'middleware' => 'opb'], function(){
			Route::get('/',									'Admin\TransactionController@index');
			Route::get('/getdata',							'Admin\TransactionController@getdata');
			Route::post('/edit/{id}/{gid}',					'Admin\TransactionController@edit');
			Route::get('/delete/{id}/{gid}',				'Admin\TransactionController@delete');
			Route::get('/export/{type}',					'Admin\TransactionController@export');
			Route::get('/pdfall',							'Admin\TransactionController@pdfall');
		});

		Route::group( ['prefix' => 'statstudent'], function(){
			Route::get('/getdata',							'Admin\StatstudentController@index');
			Route::get('/pdf/{gid}/{pid}',					'Admin\StatstudentController@pdf');
			Route::get('/', function () {return view('pages.statstudents.list');});
		});

		Route::group( ['prefix' => 'admin'], function(){
			Route::get('/useredit',							'Admin\AdminController@useredit');
			Route::post('/userupdate',						'Admin\AdminController@userupdate');
			Route::group( ['middleware' => 'sal'], function(){
				Route::get('/',									'Admin\AdminController@index')->name('admin');
				Route::get('/create',							'Admin\AdminController@create')->name('admin.create');
				Route::post('/store',							'Admin\AdminController@store');
				Route::post('/update/{id}',						'Admin\AdminController@update');
				Route::get('/edit/{id}',						'Admin\AdminController@edit');
				Route::get('/destroy/{id}',						'Admin\AdminController@destroy');
			});
		});

		Route::group( ['prefix' => 'operator', 'middleware' => 'opb'], function(){
			Route::get('/',									'Admin\OperatorController@index');
			Route::get('/create',							'Admin\OperatorController@create');
			Route::post('/store',							'Admin\OperatorController@store');
			Route::post('/update/{id}',						'Admin\OperatorController@update');
			Route::get('/edit/{id}',						'Admin\OperatorController@edit');
			Route::get('/destroy/{id}',						'Admin\OperatorController@destroy');
		});

		Route::group( ['prefix' => 'student'], function(){
			Route::get('/',									'Admin\StudentController@index');
			Route::get('/{courseId}',						'Admin\StudentController@division')->middleware('cp');
			Route::get('/{courseId}/{gradeId}',				'Admin\StudentController@grade')->middleware('gp');
			Route::get('/create',							'Admin\StudentController@create');
			Route::post('/store',							'Admin\StudentController@store');
			Route::post('/import',							'Admin\StudentController@import');
			Route::get('/export/{gid}/{type}',				'Admin\StudentController@export');
			Route::post('/{courseId}/{gradeId}/update/{id}','Admin\StudentController@update');
			Route::get('/{courseId}/{gradeId}/edit/{id}',	'Admin\StudentController@edit');
			Route::get('/{courseId}/{gradeId}/destroy/{id}','Admin\StudentController@destroy');
		});

		Route::group( ['prefix' => 'course', 'middleware' => 'opb'], function(){
			Route::get('/',									'Admin\CourseController@index');
			Route::get('/create',							'Admin\CourseController@create');
			Route::post('/store',							'Admin\CourseController@store');
			Route::post('/update/{id}',						'Admin\CourseController@update');
			Route::get('/edit/{id}',						'Admin\CourseController@edit');
			Route::get('/destroy/{id}',						'Admin\CourseController@destroy');
		});

		Route::group( ['prefix' => 'division', 'middleware' => 'opb'], function(){
			Route::get('/',									'Admin\DivisionController@index');
			Route::get('/create',							'Admin\DivisionController@create');
			Route::post('/store',							'Admin\DivisionController@store');
			Route::post('/update/{id}',						'Admin\DivisionController@update');
			Route::get('/edit/{id}',						'Admin\DivisionController@edit');
			Route::get('/destroy/{id}',						'Admin\DivisionController@destroy');
		});

		Route::group( ['prefix' => 'grade', 'middleware' => 'opb'], function(){
			Route::get('/',									'Admin\GradeController@index');
			Route::get('/create',							'Admin\GradeController@create');
			Route::post('/store',							'Admin\GradeController@store');
			Route::post('/update/{id}',						'Admin\GradeController@update');
			Route::get('/edit/{id}',						'Admin\GradeController@edit');
			Route::get('/destroy/{id}',						'Admin\GradeController@destroy');
		});

		Route::group( ['prefix' => 'step', 'middleware' => 'opb'], function(){
			Route::get('/',									'Admin\StepController@index');
			Route::get('/create',							'Admin\StepController@create');
			Route::post('/store',							'Admin\StepController@store');
			Route::post('/update/{id}',						'Admin\StepController@update');
			Route::get('/edit/{id}',						'Admin\StepController@edit');
			Route::get('/destroy/{id}',						'Admin\StepController@destroy');
		});

		Route::group( ['prefix' => 'price', 'middleware' => 'opb'], function(){
			Route::get('/',									'Admin\PriceController@index');
			Route::get('/create',							'Admin\PriceController@create');
			Route::post('/store',							'Admin\PriceController@store');
			Route::post('/update',							'Admin\PriceController@update');
			Route::get('/edit/{id}',						'Admin\PriceController@edit');
			Route::get('/destroy/{id}',						'Admin\PriceController@destroy');
		});

		Route::group( ['prefix' => 'pay'], function(){
			Route::get('/getdata',							'Admin\PayController@index');
			Route::get('/', function () {return view('pages.pays.test');});
			Route::post('/pay/{id}',						'Admin\PayController@store');
			Route::get('/detail/{id}',						'Admin\PayController@detail');
			Route::get('/destroy/{id}',						'Admin\PayController@destroy');
		});

		Route::group( ['prefix' => 'guide'], function(){
			Route::get('/',									'Admin\GuideController@index');
		});

		Route::group( ['prefix' => 'about'], function(){
			Route::get('/',									'Admin\AboutController@index');
		});

	});
});
