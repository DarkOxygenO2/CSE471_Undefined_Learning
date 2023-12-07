<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;




class AuthManager extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }
    public function resetPassword()
    {
        return view('resetPassword');
    }
    
    
    
    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'current_password' => 'required',
            'new_password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Invalid current password.']);
        }

        $user->update(['password' => bcrypt($request->new_password)]);

        return back()->with(['status' => 'Password updated successfully.']);
    }



    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'))->with('success', 'Login successful');
        }

        return redirect(route('login'))->with('error', 'Login details are not valid');
    }

    public function registrationPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if (!$user) {
            return redirect(route('registration'))->with('error', 'Registration failed, try again');
        }

        return redirect(route('login'))->with('success', 'Registration successful, you can login now');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect(route('home'));
    }
    public function courses()
    {
        $courses = course::all();
        return view('courses', compact('courses'));
    }
    public function enrolledCourses()
    {
    return view('enrolledCourses');
    }

    public function processPayment()
    {
        return view('processPayment');
    }
    

}

