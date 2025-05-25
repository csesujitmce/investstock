<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {  
        $valid_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|string|max:10',
            'password' => 'required|min:6|confirmed',
        ]);

        $image = 'assets/assets/img/user2-160x160.jpg';

        $exists = User::where('email', $request->email)
                ->orWhere('mobile', $request->mobile)
                ->exists();        
        
        if($exists) {
            $data = [
                'message' => 'Allready registered using Either Mobile or Email. Please choose different Email and Mobile or Login',
                'message_type' => 'danger',
                'header_message' => 'Not Register',
            ];
            return redirect()->back()->with($data);
        }                    

        $user = User::create([
            'name' => $request->name,
            'image' => $image,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => $request->password,
        ]);

        $data = [
            'message' => 'Registration successful! LogIn username as your EmailId or Mobile number',
            'message_type' => 'success',
            'header_message' => 'Hi! '. $request->name,
        ];

        // return redirect()->route('login');
        return redirect()->back()->with($data);
    }    
    
    
    public function userlogin(Request $request)
    {  
        $request->validate([
        'emailmobile' => 'required|string',
        'password' => 'required|string',
        // 'password' => 'required|string|min:6',
        ]);

        $loginInput = $request->input('emailmobile');
        $password = $request->input('password');

        // Determine if input is email or mobile
        $fieldType = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';

        // Attempt to log in
        if (Auth::attempt([$fieldType => $loginInput, 'password' => $password])) {
            $user = Auth::user();
            $request->session()->regenerate();

            // Redirect to intended page or dashboard
            return redirect()->intended('/test');
        }

        $data = [
            'message' => 'UserId or Password is Invalid',
            'message_type' => 'warning',
            'header_message' => 'Invalid',
        ];

        return redirect()->back()->with($data);
    }


    public function logout(Request $request)
    {
        Auth::logout(); // Logs out the user

        $request->session()->invalidate();      // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('/login'); // Redirect to login or homepage
    }


}
