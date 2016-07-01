<?php
namespace App\Http\Controllers;
use \DB as DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\User;
use App\companyreg;

class UserController extends Controller 
{
  public function doLogin()
{
       // print_r($_POST);exit;
// validate the info, create rules for the inputs
$rules = array(
    'email'    => 'required', 
   //// 'company_id'=>'required',
// make sure the email is an actual email
    'password' => 'required' // password can only be alphanumeric and has to be greater than 3 characters
);

// run the validation rules on the inputs from the form
$validator = Validator::make(Input::all(), $rules);

// if the validator fails, redirect back to the form
if ($validator->fails()) {
    return View::make('login')
        ->withErrors($validator) // send back all errors to the login form
        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
} else {

    // create our user data for the authentication
    $userdata = array(
        'email'=>Input::get('email'),
       // 'company_id' => Input::get('company_id'),
        'password'  => Input::get('password')
    );

    // attempt to do the login
    if (Auth::attempt($userdata)) {

        // validation successful!
        // redirect them to the secure section or whatever
        // return Redirect::to('secure');
        // for now we'll just echo success (even though echoing in a controller is bad)
        return View::make('home');

    } else {        

        // validation not successful, send back to form 
        return View::make('login');

    }

}
}    
public function saveuser(request $request)
{
	//print_r($_POST);
$user=new user();
$data=$request->input('user'); // print_r($data);exit;
$user->firstname=$data['firstname'];
$route=$data['route'];
//print_r($route);exit;
$que=DB::table('users')->where('firstname',$user->firstname)->get();
if(!empty($que))
{
$request->session()->flash('alert-warning', 'User Name Already Exisi!');
return redirect($route)->withInput();}
$user->lastname=$data['lastname'];
$user->mobileno=$data['mobileno'];
$user->email=$data['email'];
$user->gender=$data['gender'];
$user->password=bcrypt($data['password']);
$user->address=$data['address'];
$user->created_by=Auth::user()->id;
$user->role_id=$data['role'];
$user->status=1;
$user->company_id=$data['company_id'];
$user->save();
$request->session()->flash('alert-warning', 'User Created Successfully!');
return Redirect::to($route);
}
public function Updateuser(request $request)
{
    //print_r($_POST);exit;
$data=$_POST['user'];
$route=$_POST['route'];
$query=DB::table('users')->where('id',$_POST['id'])->update($data);

$request->session()->flash('alert-success', 'User Details Updated Successfully');
return redirect($route)->withInput();

}

public function delUser(request $request,$id)
{
   //$currentPath= Route::getFacadeRoot()->current()->uri();
 //   $routeName = $request->route()->getName();print_r($path);exit;

$query=DB::table('users')->where('id',$id)->delete(); //print_r($query);exit;
if($query==1)
{
$request->session()->flash('alert-warning', 'User Deleted Successfully!');
return redirect('userlist')->withInput();}
}
public function deladminUser(request $request,$id)
{
   //$currentPath= Route::getFacadeRoot()->current()->uri();
 //   $routeName = $request->route()->getName();print_r($path);exit;

$query=DB::table('users')->where('id',$id)->delete(); //print_r($query);exit;
$request->session()->flash('alert-success', 'User Deleted Successfully');
return redirect('adminuserlist')->withInput();

}

public function saveSignup(request $request)
{
    $companyreg=new companyreg();
    $companyreg->company_name=$request->input('company_name');
    $query=companyreg::where('company_name',$companyreg->company_name)->first();
    if(!empty($query))
    {
    $request->session()->flash('alert-warning', 'Company Name Already available  Please select another name');
    return redirect('signup')->withInput();
    }
    $companyreg->company_id=$request->input('company_id');
    $query=companyreg::where('company_id',$companyreg->company_id)->first();
    if(!empty($query))
    {
    $request->session()->flash('alert-warning', 'Company Short Name Already available  Please select another name');
    return redirect('signup')->withInput();
    }
    $companyreg->email=$request->input('email');
    $companyreg->smscredit=$request->input('sms_quantity');
    $companyreg->password=$request->input('password');
    $companyreg->status=1;
    $companyreg->created_at   =date('Y-m-d H:i:s');
    $companyreg->save();
   // $request->session()->flash('alert-success', 'Admin will Process Your Request');
	 		return view('company.thank-you');//->withInput();

}
public function adminUserlist()
{
   //print_r(Auth::user()->company_id);
//$query=User::where('company_id','=',Auth::user()->company_id)->where('role_id','3')->get();
//return View('user.adminuserlist',compact('query'));
      $user_data=  User::leftJoin('company', function($join) {
      $join->on('users.company_id', '=', 'company.id');
    })
   //->where('role_id','!=',1)
    ->where('users.company_id',Auth::user()->company_id)
    ->get([
        'users.id',
        'users.firstname',
        'users.lastname',
        'users.mobileno',
        'users.role_id',
        'users.status',
        'users.email',         
        'company.company_name'
    ]);
return View('user.adminuserlist',compact('user_data'));
}
public function Userlist()
{
   
    
  $user_data=  User::leftJoin('company', function($join) {
      $join->on('users.company_id', '=', 'company.id');
    })
    ->where('role_id','!=',1)
    ->get([
        'users.id',
        'users.firstname',
        'users.lastname',
        'users.mobileno',
        'users.role_id',
        'users.status',
        'users.email',         
        'company.company_name'
    ]);
    
    
    
   // print_r($user_data);exit;
return View('user.userlist',compact('user_data'));
}
public function editProfile()
{
    $val=User::where('id',Auth::user()->id)->first(); //print_r($val);exit;
    return view('user.editprofile',compact('val'));
}
public function updateProfile(request $request)
{
   // print_r($_POST);exit;
$user=new user();
$data=$request->input();// print_r($data) ;exit;
$route=$_POST['route'];
$user=$user->find($_POST['id']);
// print_r($data);exit;
$user->firstname=$data['firstname'];
//print_r($route);
$user->lastname=$data['lastname'];
$user->mobileno=$data['mobileno'];
//$user->email=$data['email'];
$user->password=bcrypt($data['password']);
$user->address=$data['address'];
$user->updated_at=date('Y-m-d H:i:s');
if(Input::file()) {
	//print_r('hello');
$file = Input::file('image');
$filename  = time() . '.' . $file->getClientOriginalExtension(); //print_r($filename); exit;
$user->profile_img = $filename; 
$file->move(public_path().'/profilepics/', $filename);
}
        
$user->save(); 
$request->session()->flash('alert-warning', 'Profile Updated Successfully');
return Redirect::to('/');
}
public function adminActive(requset $requset)
{
   $user=new Usert();
   $user=$user->find($_POST['id']);
   $companyreg->status=1;
   $user->save(); 
    $request->session()->flash('alert-success', 'Profile Updated Successfully');
   return Redirect::to('adminuserlist');
   
}
}

