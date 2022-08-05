<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\ManagementDashboard;
use App\Models\Profile;
use App\Models\TipPerawatan;
use Illuminate\Support\Facades\DB;

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
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        // if (auth()->user()->level == 'customer') {
        //     return '/customer';
        // }
        // return '/home';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showLoginForm()
    {
        return view('page.login');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'username';
    }
    public function show_dashboard_user(){
        $data = ManagementDashboard::all();
        $profile = Profile::all();
        $tips = TipPerawatan::all();
        $list = TipPerawatan::all();
        $count = DB::table('tip_perawatans')->count();
        return view('customer-dashboard', compact('data','profile','tips','list','count'));
    }
}
