<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    protected $redirectTo = '/dashboard'; // Redirect after login
    public function login(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        

        try {
            // Send login request to API
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->post('https://crowdrobapi.tech/api/User/login', [
                    'username' => $request->username,
                    'password' => $request->password,
                ]);
    
            // Check if the login request was successful
            if ($response->successful()) {
                // Retrieve token from the response
                $token = $response['token'];
                // Assign the token to the session
                $request->session()->put('token', $token);
                // Store the username in the session
                $request->session()->put('username', $request->username);
                // Redirect to the dashboard
                return redirect('/dashboard');
            }
        } catch (Exception $e) {
            // Handle exceptions
            return back()->withErrors(['message' => 'An error occurred. Please try again later.']);
        }

    }
    
    // public function dashboardlayout()
    // {
    //     // Access the username from the session
    //     $username = session('username');
    //     // Pass the username to the dashboard view
    //     return view('dashboard', compact('username'));
    // }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
{
    try {
        $userID = Str::uuid()->toString();
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->post('https://crowdrobapi.tech/api/User/RegisterUser', [
                'UserID' => $userID, // Use the generated UserID
                // 'UserID' => $request->UserID,
                'username' => $request->username,
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'phoneNumber' => $request->phoneNumber,
                'password' => $request->password,
                'userRoles' => $request->userRoles,
            ]);
        
        $responseData = $response->json(); // Store the JSON response
        //   dd($responseData);
        if ($response->successful()) {
            // dd('Redirecting to allusers route...'); // Debugging statement
            return redirect()->route('allusers')->with('success', 'user is created successful.');
        
            //  return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
        } else {
            // Handle specific API error messages, if available
            $errorMessage = $responseData['message'] ?? 'Failed to register. Please try again later.';
            return back()->withInput()->with('error', $errorMessage);
        }
    } catch (\Exception $e) {
        // Log the exception for further investigation
        \Log::error($e);
        return back()->withInput()->with('error', 'An error occurred. Please try again later.');
    }
}
}
