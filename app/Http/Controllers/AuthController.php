<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    //show login page 

    public  function showLogin() {
        return response()->json([
            'message' => 'This is the login endpoint. Use POST /api/login to authenticate.'
        ]);
    }

    //show register page
    public  function showRegister() {
        return response()->json([
            'message' => 'This is the register endpoint. Use POST /api/register to create an account.'
        ]);
    }



    //register user
      public function postRegister(Request $request) {
        //validation
       $request->validate([
            'name' => 'required|min:3|max:255',
            'email'=> 'required|email|max:2555|unique:users',
            'password' => 'required|min:8|confirmed'


       ]);
        //registration
       $user  = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($request->password),

       ]);

       //login
       Auth::login($user);
       
       return back()->with('success','successfully logged in');

   }
    //login user
   
    
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed
            $user = Auth::user();
            
            // Generate a token (using Sanctum or Passport, here assuming Sanctum)
            $token = $user->createToken('auth_token')->plainTextToken;
    
            // Return the token and user info as a JSON response
            return response()->json([
                'token' => $token,
                'user' => $user,
            ], 200);
        }
    
        // Authentication failed
        return response()->json(['error' => 'Invalid credentials'], 401);
    }
    



    //reset password

    //logout

    public function logout() {
        Auth::logout();
        return back();
    }


}
