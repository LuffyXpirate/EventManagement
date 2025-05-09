<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ForgetEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
      return view('auth.register');
    }
    public function authregister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'user_type' => 'required|in:organizer,attendee',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type' => $request->user_type,
        ]);
    
        return view('auth.register')->with('sucess',"User Registered Successfully");
    }
    // Show the login page
    public function login()
    {
        if (Auth::check()) {
            return redirect('admin/dashboard');
        }
        return view('auth.login');
    }

    // Handle login request
   // Handle login request
   public function Authlogin(Request $request)
   {
       // Convert email to lowercase
       $email = strtolower($request->email);
   
       // Validate the request
       $request->validate([
           'email' => 'required|email|exists:users,email',
           'password' => 'required|min:6',
       ], [
           'email.required' => 'Email is required.',
           'email.email' => 'Please enter a valid email address.',
           'email.exists' => 'No account found with this email.',
           'password.required' => 'Password is required.',
           'password.min' => 'Password must be at least 6 characters long.',
       ]);
   
       $remember = !empty($request->remember);
   
       // Attempt authentication with lowercase email
       if (Auth::attempt(['email' => $email, 'password' => $request->password], $remember)) {
           $user = Auth::user();
   
           if ($user->user_type == 'admin') {
               return redirect('admin/dashboard');
           } elseif ($user->user_type == 'organizer') {
               return redirect('organizer/dashboard');
           }elseif($user->user_type=='attendee'){
            return redirect('attendee/dashboard');
           } 
           else {
               Auth::logout();
               return redirect()->back()->with('error', 'Unauthorized user type.');
           }
       } else {
           return redirect()->back()->with('error', 'Invalid email or password.');
       }
   }
   

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }

    // Show forget password page
    public function forget()
    {
        return view('auth.forget');
    }

    

    
    
    public function list(){
        return view('admin/admin/list');
    }
}
