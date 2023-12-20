<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function login(){
        return view('customer.auth.login');
    }

    public function authenticate(Request $request){
        $request->validate([
            'email'=>'required|email|exists:customers,email',
            'password'=>'required|min:8'
        ]);

        if(Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('customer.dashboard');
        }
        return back();
    }


    public function register(){
        return view('customer.auth.register');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->save();
        return redirect()->route('customer.login');
    }
}
