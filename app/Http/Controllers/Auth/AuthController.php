<?php namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\LoginadminRequest;
use App\Http\Requests\Auth\RegisterRequest;
use DB;
class AuthController extends Controller {

    /**
     * User model instance
     * @var User
     */
    protected $user;

    /**
     * For Guard
     *
     * @var Authenticator
     */
    protected $auth;


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth, User $user)
    {
        $this->user = $user;
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id' => 'required',
            'status' => '1',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /* Login get post methods */
    protected function getLogin() {
        return View('users.login');
    }

    protected function postLogin(LoginRequest $request) {
	//	print_r($_POST);exit;
        $query=DB::table('company')->where('company_id',$_POST['company_id'])->first();
       if(empty($query))
       {
		   return redirect('/')->withErrors([
            'company' => 'Please Enter Valid Company Name!.',
        ]);
	   }
     //print_r($query->status);
        if($query->status==1)
        {
		//	print_r('hi');
						

        if (Auth::attempt(['company_id' =>$query->id,'email' => $_POST['email'], 'password' => $_POST['password']])) {

//        if (Auth::attempt(['company_id'="$query->id"],['email'="$_POST['email']"],['password'="$_POST['password']"]))) {
						

        $user = Auth::getLastAttempted(); 

        if ($user->status==1) {
         return redirect('home');
        }
else
{ Auth::logout();
	 Session::flush();
$errors="Your account not activated!";
	return Redirect::to('/')->withErrors([
            'email' => 'Your account has been Deactivated!',
        ]);
}
}

        return redirect('/')->withErrors([
            'email' => 'The email or the password is invalid. Please try again.',
        ]);
    }
}
    protected function adminLogin(LoginadminRequest $request) {
	    if ($this->auth->attempt($request->only('id', 'password'))) {
        $user = Auth::getLastAttempted(); 

        if ($user->status==1) {
            return view::make('home');
        }
else
{ Auth::logout();
	 Session::flush();
$errors="Your account not activated!";
	return Redirect::to('/admin/cpanel')->with('status','success')->with('message','Your account not activated!');;
}
}

        return redirect('/admin/cpanel')->withErrors([
            'email' => 'The firstname or the password is invalid. Please try again.',
        ]);
    }


    /* Register get post methods */
    protected function getRegister() {
        return View('users.register');
    }

    protected function postRegister(RegisterRequest $request) {
        $this->user->name = $request->name;
        $this->user->email = $request->email;
        $this->user->password = bcrypt($request->password);
        $this->user->save();
        return redirect('users/login');
    }

    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    protected function getLogout()
    {
        $this->auth->logout();
        return redirect('users/login');
    }
}
	
