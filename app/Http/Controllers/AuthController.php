<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Session as FacadesSession;

class AuthController extends Controller
{
        public function index()
        {
            return view('login');
        }  
        public function registration()
        {
            return view('register');
        }
          
        public function login(Request $request)
        {
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);
            $controller = new AuthController;
            $controller->signOut();
            if (Auth::guard('user')->attempt($request->only('email', 'password'))) {
                return redirect()->intended('/')
                            ->withSuccess('Signed in');
            }

            elseif (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
                return redirect()->intended('dashboard')
                            ->withSuccess('Signed in');
            }

      
            return redirect("login")->withSuccess('Login details are not valid');
        }
    
          
        public function registerUser(Request $request)
        {  
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);
               
            $data = $request->all();
            $check = $this->create($data);
             
            return redirect("/")->withSuccess('You have signed-in');
        }
    
        public function create(array $data)
        {
          return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => FacadesHash::make($data['password'])
          ]);
        }    
        
        public function dashboard()
        {
            if(Auth::guard('admin')->check()){
                return view('dashboard');
            }
            elseif (Auth::guard('user')->check()) {
                return Redirect('/');
            }
      
            return redirect("login")->withSuccess('You are not allowed to access');
        }
        
        public function signOut() {
            if(Auth::guard('admin')->check()){
                Auth::guard('admin')->logout();
            }
            elseif (Auth::guard('user')->check()) {
                Auth::guard('user')->logout();
            }
            
            return Redirect('/');
        }
}
