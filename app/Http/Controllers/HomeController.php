<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Flash;
use Response;
use Hash;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['login', 'processLogin', 'adminLogin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function login()
    {
        $data['companies'] = Company::get();
        return view('auth.company_login', $data);
    }

    public function adminLogin()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
       
        $user = User::where('company_id', $request->company_id)->first();
        if(!$user) {
            Flash::error('User not found');

            return redirect(route('login'));
        }


        $passed = Hash::check($request->get('password'), $user->password);
        if($passed) {
            Auth::login($user);
            return redirect(route('home'));
        }
        if(!$user) {
            Flash::error('User not found');

            return redirect(route('login'));
        }

    }

    


}
