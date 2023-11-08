<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function register(Request $request)
    {
        
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        $user = new User;
    $user->username = $validatedData['username'];
    $user->email = $validatedData['email'];
    $user->password = Hash::make($validatedData['password']); 
    $user->role = 'user';  // defuilt value as always

    
    $user->save();

   
    return redirect('/login')->with('success', 'User registered successfully.');

    }
    
    public function Login(Request $request){
        // dd($request);
        $user = $request->validate([ 
            'password' => 'required',
            'email' => 'required|string|email',
            
           
        ]);
        
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = auth()->user(); 
            return redirect('/');
        }
        else {
            return redirect("/login")->with('error', 'Invalid email or password.');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/')->with('success','Loged out Succeffuly');
    }
}
