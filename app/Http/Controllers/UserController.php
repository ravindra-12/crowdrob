<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            // 'UserID' => 'required|string',
            'username' => 'required|string',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'phoneNumber' => 'required|string',
            'password' => 'required|string',
            'userRoles' => 'required|string',
        ]);


        // $userID = Str::random(10);
        try {
            // Send registration request to API
            $response = Http::post('https://crowdrobapi.tech/api/User/RegisterUser', [
                // 'UserID' => $request->UserID,
                'username' => $request->username,
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'phoneNumber' => $request->phoneNumber,
                'password' => $request->password,
                'userRoles' => $request->userRoles,
            ]);
            
            // Debugging response
            dd($response->json());

            // Handle success and failure scenarios
            // Redirect the user accordingly
        } catch (\Exception $e) {
            // Handle exceptions
            // Redirect the user with an error message
        }
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function showForgotPasswordForm()
    {
        return view('forgot_password_form');
    }

    // Method to handle forgot password submission
    public function forgotPassword(Request $request)
    {
        try {
            // Validate email input
            $request->validate([
                'email' => 'required|email',
            ]);

            // Prepare data for the API request
            $data = [
                'email' => $request->input('email'),
            ];

            // Send POST request to the forgot password API
            $response = Http::post('https://crowdrobapi.tech/api//api/User/ForgotPassword', $data);

            if ($response->successful()) {
                // Password reset email sent successfully
                return redirect('/')->with('success', 'Password reset email sent successfully.');
            } else {
                // Failed to send password reset email
                return redirect()->back()->with('error', 'Failed to send password reset email. Please try again.');
            }
        } catch (\Exception $e) {
            // Exception occurred
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }


}
