<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\JWT;

class apiUserController extends Controller
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
        if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_POST['email'])) 
       {
        return json_encode(['status'=>0,"error"=>"email not valid" ]);
       }else{
        if($user->save())
        {
            $token=JWT::encode($user->token,env('API_KEY'));
            $d_token=JWT::decode($token,env('API_KEY'));
           return json_encode(['status'=>1,'token'=>$token]);
        }
        else{
            return json_encode(['status'=>0,"error"=>"some error on save "]);
        }
        }
      }
        catch(\Exception $e)
        {
            return json_encode(['status'=>0,"error"=>"some error "]);
        }
      }
      else{
        return json_encode(['status'=>0,"error"=>"not post any thing"]);
       }
       
    }
    public function login()
    {
      if($_POST)
      {
      
      $user=User::where(['email' => $_POST['email'], 'password' => $_POST['pwd']]); 
    
      $x=$user->get()->toArray();
      
       if(count($x)){
           $user=User::find($x[0]['id']);
        $token=JWT::encode($user->token,env('API_KEY'));
        return json_encode(['status'=>1,'token'=>$token]);
       }
       else{
        return json_encode(['status'=>0,"error"=>"wrong email and password"]);
       }
      }
      else{
        return json_encode(['status'=>0,"error"=>"not post any thing"]);
      }
    }
}
