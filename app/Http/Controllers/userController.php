<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Redirect;
use Auth;

class userController extends Controller
{
    public function Signup()
    {
      if($_POST){
         
        $user =new User();
       try{
       
        $user->name=$_POST['name'];
        $user->email=$_POST['email'];
        $user->password=$_POST['pwd'];
        $user->token=genRandomString();
        if($user->save())
        {
          Auth::login($user);
          return Redirect::to('/home');
        }
        else{
            echo "some error"; 
        }
      }
        catch(\Exception $e)
        {
          echo "some error"; 
        }
      }
      else{
        echo "not";
       }
       
    }
    public function login()
    {
      if($_POST)
      {
       
     $user=User::where(['email' => $_POST['email'], 'password' => $_POST['pwd']]); 
    
      $x=$user->get()->toArray();
      $y=User::find($x[0]['id']);
       Auth::login($y);
       if(Auth::user()->token){
        return Redirect::to('/home');
       }
      }
      else{
       echo "wrong";
      }
    }
    public function showlogin()
    { 
     return view('signup');
    }
    public function home()
    { 
      return view('home');
    }
}
