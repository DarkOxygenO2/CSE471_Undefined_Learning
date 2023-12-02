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
    public function forgotPassword()
    {
        return view('forgotPassword');
    }
    
    
    
    public function forgotPasswordPost(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    if ($status === Password::RESET_LINK_SENT) {
        return back()->with(['status' => 'Password reset link has been sent to the provided email address.']);
    }

    if (str_contains($status, 'seconds')) {
        return back()->withErrors(['email' => 'Please wait before retrying.']);
    }

    return back()->withErrors(['email' => __($status)]);
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




}

