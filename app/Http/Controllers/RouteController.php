<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Auth;

class RouteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        if(Auth::check()){
            return redirect()->intended('dashboard');
        }
        else{
            return view('home');
        }
    }

    public function projects(){     
        return view('projects');
    }

    public function login(){
        return view('customer.login');
    }

    public function register(){
        return view('customer.register');
    }

    public function setPassword($id){
        //Redirect to View for setting Password for the customer id that's passed.
        $customer = Customer::find($id);        
        return view('customer.setpassword')->with('customer',$customer);
    }

    public function dashboard(){
        if(Auth::check()){
            return view('dashboard.index');
        }
        else{
            return view('customer.login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
