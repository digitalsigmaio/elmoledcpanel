<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['register', 'loginForm', 'store', 'signin']]);
    }

    public function index()
    {
        return view('index');
    }

    public function loginForm()
    {
        return view('login');
    }

    public function register()
    {
        if (Auth::check()){
            return redirect()->route('home');
        }
        return view('registration');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required | min:4 | max:50',
            'email'    => 'required | email',
            'password' => 'required | confirmed | min:6',
        ]);
		$username = User::where('name', $request->username)->get();
		$useremail = User::where('email', $request->email)->get();
        if ($username->count() > 0){
            return redirect()->back()->withErrors('Username already exists.');
        } elseif($useremail->count() > 0) {
            return redirect()->back()->withErrors('Email already exists.');
        }

        $user = new User;
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();
        Auth::login($user);

        return redirect()->route('home');
    }

    public function signin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt([
            'name'      => $request->username,
            'password'  => $request->password
        ]))
        {
            return redirect()->route('home');
        } else {
            return redirect()->back()->withErrors('Username & Password combination is not valid.');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
