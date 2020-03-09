<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Customer;
use Illuminate\Support\Facades\Input;
use Auth;
use Hash;

use App\Http\Resources\Customer as CustomerResource;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate(15);
        return CustomerResource::collection($customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        
        $customer = $request->isMethod('put') ? Customer::findOrFail($request->id) : new Customer;
    
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->email = $request->input('email');
        // $custoemr->email_verfified_at  = $request->input('email_verified_at');        
        $customer->password = $request->input('password');
        $customer->phone = $request->input('phone');
        $customer->status = $request->input('status');
        
        if($customer->save()){
            return new CustomerResource($customer);
        }
    }

    public function register(Request $request)
    {        
        
        $customer = new Customer;

        $customer->first_name   = $request->input('first_name');
        $customer->last_name    = $request->input('last_name');
        $customer->email        = $request->input('email');
        $customer->phone        = $request->input('phone');
        $customer->password     = hash::make('password'); //Setting Password As Password

        if($customer->save()){            
            return redirect()->intended('register/setpassword/'.$customer->id);            
        }
        else{
            return "Registeration Failed";
        }     
    }

    public function setPassword(Request $request){
        $customer = Customer::find($request->input('customer_id'));

        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');

        if($password == $confirm_password){
            $customer->password = hash::make($password); //Setting New Password
            $customer->updated_on = now();
            if($customer->save()){
                return redirect()->intended('login');
            }            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return new CustomerResource($customer);
    }
    
    public function login(Request $request){
        $auth = Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        if($auth){
            return redirect()->intended('dashboard');
        }
        else{
            return view('dashboard.error')->with('message','Invalid Email or Password');
        }
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        if($customer->delete()){
            return new CustomerResource($customer);
        }
    }
}
