<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\UserRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function confirmEmail(Request $request, $token)
    {
        User::whereToken($token)->firstOrFail()->confirmEmail();
        $request->session()->flash('message', 'The account is verified. Log in with your name.');
        return redirect('login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = User::create($request->all());
        Mail::to($user->email)->send(new UserRegistered($user));
        $request->session()->flash('message', 'The registration confirmation letter was sent to your address.');
        return redirect()->back();
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, ['email' => 'required|email', 'password' => 'required']);
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            if(!Auth::user()->verified){
                Auth::logout();
                $request->session()->flash('message', 'The registration confirmation letter was sent to your address.');
                return redirect()->back();
            }

            return redirect('/');
        }

        $request->session()->flash('message', 'No entry!');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flash('message', 'You are logged in.');
        return redirect('login');
    }

    protected function signIn(Request $request)
    {
        return Auth::attempt($this->getCredentials($request), $request->has('remember'));
    }

    protected function getCredentials(Request $request)
    {
        return [
            'email'    => $request->input('email'),
            'password' => $request->input('password'),
            'verified' => true
        ];
    }
}
