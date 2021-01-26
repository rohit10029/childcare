<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\JWT;

class apiCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($_POST)
      {
       if(isset($_POST['token'])){
      $user=User::where(['token' => JWT::decode($_POST['token'],env('API_KEY'))]); 
    
      $x=$user->get()->toArray();
      
       if(count($x)){
        return $next($request);
       }
       else{
        return json_encode(['status'=>0,"error"=>"wrong email and password"]);
       }
       }
       else{
        return json_encode(['status'=>0,"error"=>"token needed"]);
       }
       }
    }
}
