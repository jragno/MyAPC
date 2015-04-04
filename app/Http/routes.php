<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('/bus', 'HomeController@bus');
Route::get('/directory', 'HomeController@directory');
Route::get('/account', 'HomeController@account');
Route::post('/account/update', 'HomeController@userupdate');
Route::get('/account/update', 'HomeController@update');
Route::get('/applications', ['middleware' => 'auth', 'uses' => 'HomeController@applications']);

Route::get('/news', 'NewsController@index');
Route::post('/news/details/{id}', 'NewsController@newscomment');	
Route::get('/news/details/{id}', 'NewsController@show');

Route::post('/events/details/{id}', 'EventsController@eventcomment');
Route::post('/events/details/{id}/attend', 'EventsController@attend');
Route::get('/events', 'EventsController@index');
Route::get('/events/details/{id}', 'EventsController@show');

Route::get('/announcements', 'AnnouncementsController@index');
Route::post('/announcements/details/{id}', 'AnnouncementsController@acomment');	
Route::get('/announcements/details/{id}', 'AnnouncementsController@show');

Route::get('/organizations', 'OrgController@index');
Route::post('/organizations/details/{id}', 'OrgController@register');
Route::get('/organizations/details/{id}', 'OrgController@show');


Route::group(['middleware' => 'creator'], function()
{
	Route::get('/dashboard', 'AdminController@index');

	Route::get('/news/create', 'AdminController@newscreate');
	Route::post('/news/create', 'AdminController@newsstore');
	Route::post('/news/update/{id}', 'AdminController@newspost');
	Route::get('/news/update/{id}', 'AdminController@newsupdate');
	Route::get('/news/posted', 'AdminController@newspos');
	Route::get('/news/pending', 'AdminController@newspen');
	Route::get('/news/{id}', 'AdminController@newsarticle');	

	Route::get('/events/create', 'AdminController@eventcreate');
	Route::post('/events/create', 'AdminController@eventstore');
	Route::post('/events/update/{id}', 'AdminController@eventpost');
	Route::get('/events/update/{id}', 'AdminController@eventupdate');
	Route::get('/events/posted', 'AdminController@eventpos');
	Route::get('/events/pending', 'AdminController@eventpen');
	Route::get('/events/{id}', 'AdminController@eventarticle');

	Route::get('/org', 'OrgController@org');
	Route::post('/org/update/{id}', 'AdminController@orgpost');
	Route::get('/org/update/{id}', 'AdminController@orgupdate');
	Route::get('/org/approved', 'OrgController@approved');
	Route::get('/org/applicants', 'OrgController@applicants');
	Route::put('/org/applicants', 'OrgController@approve');
});


Route::group(['middleware' => 'admin'], function()
{
	Route::get('/announcements/create', 'AdminController@acreate');
	Route::post('/announcements/create', 'AdminController@astore');
	Route::post('/announcements/update/{id}', 'AdminController@apost');
	Route::get('/announcements/update/{id}', 'AdminController@aupdate');	
	Route::get('/announcements/list', 'AdminController@alist');
	Route::get('/announcements/{id}', 'AdminController@aarticle');


	Route::post('/org/create', 'AdminController@orgstore');
	Route::get('/org/create', 'AdminController@orgcreate');
	Route::get('/org/list', 'AdminController@orglist');
	Route::get('/org/{id}', 'AdminController@orgarticle'); 

	Route::get('/users', 'AdminController@current');
	Route::get('/users/pending', 'AdminController@pending');
	Route::put('/users/pending', 'AdminController@approve');
	Route::get('/user/details', 'AdminController@user');  
});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
