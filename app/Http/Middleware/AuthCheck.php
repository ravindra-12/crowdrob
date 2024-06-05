<?php
namespace App\Http\Middleware;
use Closure;
use session;
use Illuminate\Http\Request;

class AuthCheck
{
    public function handle(Request $request, Closure $next)
    {
       
        $path = $request->path();
        // echo $path;
        // die();
        $Svalue= $request->session()->get('token');
        // dd($path);
    //dd($request->session()->get('token'));
   
      if ($Svalue == null && $path != "login"){
        // dd($request->session()->get('token'));
        echo "Please log in to access this page.";
        return redirect('/login');
        
        }else if($Svalue != null && $path == "login"){
            return redirect('/');
        }

        // else if( $path = "login" && $request->session()->get('token')){
        //     return redirect('/');
        // }
        // Check if the user is authenticated
        // if (!$request->session()->has('token')) {
        //     // User is not authenticated, redirect to the login page
        //     echo  "Please log in to access this page.";
        //     return redirect()->route('login')->with('error', 'Please log in to access this page.');
        // }

        // User is authenticated, allow the request to proceed
       
         return $next($request);
        // return redirect('/dashboard');
}
}