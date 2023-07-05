<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\RedirectResponse;


class UserController extends Controller
{
    //post register 
        public function store(Request $request) {
            $validateData = $request-> validate([
                'name' => 'required|min:3|max:255',
                'username' => 'required|min:3|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|max:255',
                'confirm_password' => 'required|same:password',
                'is_admin' => 'required'
            ]);

            //untuk hashing password
            // $validateData['pasword'] = bcrypt($validateData['password']); 
            $validateData['password'] = Hash::make($validateData['password']);
            $validateData['confirm_password'] = Hash::make($validateData['password']);

            User::create($validateData);

            $request->session()->flash('success', 'register berhasil');

            return redirect('/user/login');
        }


    //get page register
        public function register() {

            return view('users.register');
        }

    //get page register admin
        public function register_admin() {
            return view('users.register_admin');
        }


    //get page login
        public function login() {

            return view('users.login');
        }
    
    //post login
        public function  authenticate(Request $request) {
            
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if(Auth::attempt($credentials)) {

                $request->session()->regenerate();
                return redirect()->intended('/tiketing');
            }

            return back()->with('loginError', 'login fail');
        }

        
    //logout
        public function logout(Request $request): RedirectResponse
        {
            Auth::logout();
        
            $request->session()->invalidate();
        
            $request->session()->regenerateToken();
        
            return redirect('/tiketing');
        }


    //get profile
        public function profile()
        {
            return view('users.profile');
        }

    //edit profile
    public function edit_profile(Request $request, $id) {

            $validateData = $request->validate([
                'name' => 'min:3|max:255',
                'username' => 'min:3|max:255',
                'email' => 'email',
                'password' => 'min:8|max:255',
                'confirm_password' => 'same:password',
                'photo' => 'file|max:1024'
            ]);

            $validateData['photo'] = $request->file('photo')->store('post-image');
            $validateData['password'] = Hash::make($validateData['password']);
            $validateData['confirm_password'] = Hash::make($validateData['password']);
            
            User::where('id',$id)->update($validateData);

            return back()->with('success', 'Update profile success');
            
        }
}

