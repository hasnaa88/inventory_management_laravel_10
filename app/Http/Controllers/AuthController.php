<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Product;


class AuthController extends Controller
{
    
    public function register(){
        return view('auth/register');
    }

    public function registerSave(Request $request){
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
           
        ]);
        return redirect()->route('login');
    }

    public function login(){
        return view('auth/login');
    }

    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
  
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
  
        $request->session()->regenerate();
  
        return redirect()->route('dashboard');
    }


    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('auth/login');
    }


    public function profile(){
        $upProfile = auth()->user();

        return view('profile',compact('upProfile'));
    }


    public function updateProfile(Request $request, string $id)
    {

        $upProfile = User::findOrFail($id);
    
        // Validate the form data if needed
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255'
            
            // Add more validation rules as needed
        ]);
    
        // Update the user's profile
        $upProfile->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
           
            // Add more fields as needed
        ]);
    
       // return redirect()->route('dashboard')->with('success', 'Profile updated successfully');

        return redirect()->route('profile')->with('success', 'Profile updated successfully');

    
    }
    

}
