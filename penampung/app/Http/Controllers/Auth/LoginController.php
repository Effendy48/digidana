<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use App\Model\Account;

use Auth;
use Session;
use DB;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function showLoginForm()
    {
        return view('dashboard.account.login');
    }

    function loginAccount(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $administrator = Account::where('email', $email)->where('password', $password)->where('is_deleted', 'N')->first();

        // return $email;
        $count_administrator = Account::where('email', $email)->where('password', $password)->where('is_deleted', 'N')->get();
        
        // return $administrator;

        if($administrator)
        {
            Auth::guard('account')->login($administrator);
            return redirect()->intended(route('dashboard.index'));
        }else if(count($count_administrator) < 1){

            return "<script>alert('Username atau Password Salah');
            document.location='".route('login')."'</script>";
        }

        return "Test";

    }
}
