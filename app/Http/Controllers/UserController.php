<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function getSignInView(){
        return view('login');
    }
    public function getSignUpView(){
        return view('sign-up');
    }


    public function postSignIn(Request $request)
     {
         $this->validate($request, [
             'email' => 'required',
             'password' => 'required'
         ]);

         if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
             return redirect()->route('phonebook');
         }
         return redirect()->back();
     }

     public function postSignUp(Request $request){
     	 $this->validate($request, [
             'email' => 'required|email|unique:users',
             'name' => 'required|max:120',
             'password' => 'required|min:4'
         ]);

     	 //Get all POST variables and store them in php variables using the $request array like the POST superglobal
     	$email = $request['email'];
     	$name = $request['name'];
     	$password = bcrypt($request['password']);

     	$user = new User();//User object using our user controller

     	//Attach the POST variables to the User object's properties
     	$user->email = $email;
     	$user->name = $name;
     	$user->password = $password;

     	$user->save();//Insert New user to db

         //Login the user
         Auth::login($user);

     	return redirect()->route('phonebook');//Redirects the user to the newsfeed after sign up


     }
     public function getLogout()
     {
         Auth::logout();
         return redirect()->route('/');
     }

}
