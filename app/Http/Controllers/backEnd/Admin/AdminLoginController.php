<?php

namespace App\Http\Controllers\backEnd\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\TablePermission;

class AdminLoginController extends Controller
{

 

    use AuthenticatesUsers;

 

    protected $guard = 'admin';

 

    /**

     * Where to redirect users after login.

     *

     * @var string

     */

    protected $redirectTo = '/dashboard';

 

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('guest')->except('logout');

    }

 

    public function showLoginForm()

    {

        return view('Inbackground.admin.login');

    }

 

    public function login(Request $request)

    {
        //  if(Auth::guard('admin')->check()){
        //      echo 'yes you are login ';
        //  }else{
        //      echo 'not login';
        //  }

        // if(Auth::guard('admin')->check()){

        //     return view('admin.dashboard');
           
        // }else{

            if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember)) {

                
               
                return view('Inbackground.admin.dashboard');

            }
            return back()->withInput(['email' => $request->email,'remember'=>$request->remember])->withError(['password'=>"Error with Email or password"]);

        // }// else

        
    }
    
}
