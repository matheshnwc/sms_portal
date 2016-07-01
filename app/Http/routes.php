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
//print_r($_POST);exit;




Route::get('/admin/login', 'WelcomeController@login');
Route::get('/', 'WelcomeController@index');
Route::post('postlogin', 'Auth\AuthController@postLogin');
Route::post('login', array('uses' => 'UserController@doLogin'));
//Route::post('adminlogin', 'Auth\AuthController@adminLogin');
Route::get('home/logout', function(){

  $id = Auth::user()->id;
	$name="OFF";
	$query=DB::table('users')->where("id",$id)->update(array("login_status"=>$name));

	 Auth::logout();
	 Session::flush();
	return Redirect::to('/');
});
Route::get('/logout', function(){

         $id = Auth::user()->id;
	$name="OFF";
	  

	 Auth::logout();
	 Session::flush();
	return Redirect::to('/');
});
Route::get('home', 'HomeController@index');
Route::get('admin/home', function()
{
return View::make('admin.home');
});
Route::get('userlist','UserController@userList');
Route::get('adduser', function () {
    return view('user.adduser');
});
Route::post('saveuser','UserController@saveUser');
Route::get('deluser/{id}','UserController@delUser');
Route::get('editprofile/{id}','UserController@editProfile');
Route::post('updateprofile','UserController@updateProfile');
Route::get('deladminuser/{id}','UserController@deladminUser');
Route::post('Updateuser','UserController@updateUser');
Route::get('adminuserlist','UserController@adminUserlist');
Route::get('addadminuser',function()
{
    return view('user.addadminuser');
});
Route::get('admindeactive/{id}','UserController@adminActive');
Route::get('importcontacts',function()
{
    return view('admin.import');
});
Route::post('importExcel','Admin\AdminController@Importdata');
Route::get('companylist', 'Admin\AdminController@showCompany');
Route::get('smsurl','Admin\AdminController@smsUrl');
Route::post('savesmsurl','Admin\AdminController@savesmsUrl');
Route::get('smsurl/{id}', 'Admin\AdminController@editsmsUrl');
Route::get('delsmsurl/{id}','Admin\AdminController@delsmsUrl');
Route::post('savecompany','Admin\AdminController@saveCompany');
Route::get('companylist/{id}', 'Admin\AdminController@editCompany');
Route::get('movecompany/{id}', 'Admin\AdminController@moveCompany');
Route::get('delcompany/{id}','Admin\AdminController@delCompany');
Route::get('contactlist', 'Admin\AdminController@ContactList');
Route::post('savecontact','Admin\AdminController@saveContact');
Route::get('contactlist/{id}', 'Admin\AdminController@editContact');
Route::get('delcontact/{id}','Admin\AdminController@delContact');
Route::get('settings', function () {
    return view('admin.settings');
}); 
Route::post('savesmsettings','Admin\AdminController@savesmSettings');
Route::any('sendsms', 'Admin\AdminController@index');
Route::post('postsms', 'Admin\AdminController@postsms');
Route::get('addrecipient','Admin\AdminController@addrecipient');
Route::get('smsreports','Admin\AdminController@smsReports');
Route::get('overallsms','Admin\AdminController@overallSms');
Route::get('userwisesms','Admin\AdminController@userwiseSms');
Route::post('userwisesms', 'Admin\AdminController@getuseReport');
Route::get('signup', function () {
    return view('company.signup');
});
Route::post('savesignup', 'UserController@saveSignup');






	
