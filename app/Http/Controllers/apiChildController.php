<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\state;
use App\district;
use App\child;
use Redirect;
use Auth;
use App\JWT;
class apiChildController extends Controller
{
    
    public function addState()
    {
        if($_POST)
        { if(isset($_POST['token'])){
            $x=json_decode($this->checkuser($_POST['token']));
            if($x->status!=0)
            {
            $state=new state();
            $state->name=$_POST['state'];
            if($state->save())
            {
                return json_encode(['status'=>1,'msg'=>"data saved"]);
            }}
            else{
                return json_encode(['status'=>0,"error"=>"you are not allowed"]);
            }
         }else{
            return json_encode(['status'=>0,"error"=>"token needed"]);
           }

        }
        else{
            return json_encode(['status'=>0,"error"=>"not post any thing"]);
        }
    }
    public function getAllstate()
    {
        if($_POST)
        {
        if(isset($_POST['token'])){
            $x=json_decode($this->checkuser($_POST['token']));
            if($x->status!=0)
            {
                $state=state::orderBy('id', 'DESC')->get();
                return json_encode($state);
            }
            else{
                return json_encode(['status'=>0,"error"=>"you are not allowed"]);
            }
         }else{
            return json_encode(['status'=>0,"error"=>"token needed"]);
           }
        }else{
            return json_encode(['status'=>0,"error"=>"not post any thing"]);
        }
       
    }
    public function getAlldistrict()
    { 
        if($_POST)
        {
        if(isset($_POST['token'])){
            $x=json_decode($this->checkuser($_POST['token']));
            if($x->status!=0)
            {
                $district=district::orderBy('id', 'DESC')->get();
    
                return json_encode($district);
            }
            else{
                return json_encode(['status'=>0,"error"=>"you are not allowed"]);
            }
         }else{
            return json_encode(['status'=>0,"error"=>"token needed"]);
           }
        }else{
            return json_encode(['status'=>0,"error"=>"not post any thing"]);
        }

       
        
    }
    public function addDistrict()
    {
        if($_POST)
        {
            if(isset($_POST['token'])){
                $x=json_decode($this->checkuser($_POST['token']));
                if($x->status!=0)
                {
                    $district=new district();
                    $district->name=$_POST['district'];
                    $district->state_id=$_POST['state'];
                    if($district->save())
                    {
                        return json_encode(['status'=>1,"msg"=>"data saved"]);
                    }
                }
                else{
                    return json_encode(['status'=>0,"error"=>"you are not allowed"]);
                }
             }else{
                return json_encode(['status'=>0,"error"=>"token needed"]);
               }
           
        }
        else{
            return json_encode(['status'=>0,"error"=>"not post any thing"]);
        }
    }
    
    public function getDistrictByState($id)
    {
        if($_POST)
        {
            if(isset($_POST['token'])){
                $x=json_decode($this->checkuser($_POST['token']));
                if($x->status!=0)
                {
                    return json_encode(district::getallDistrictName($id));
                }
                else{
                    return json_encode(['status'=>0,"error"=>"you are not allowed"]);
                }
             }else{
                return json_encode(['status'=>0,"error"=>"token needed"]);
               }
           
        }
        else{
            return json_encode(['status'=>0,"error"=>"not post any thing"]);
        }
        
    }
    public function addChild()
    {
        if($_POST)
        { if(isset($_POST['token']))
            {
            $x=json_decode($this->checkuser($_POST['token']));
            if($x->status!=0)
            {
                $error=[];
                if($_FILES["file"]["error"] != 4)
                {
                  if($_FILES['file']['size'] > 10485760)
                  {  
                    array_push($error,'file size is more');
                  }
                  else{
                    $allowed = array('gif', 'png', 'jpg');
                    $filename = $_FILES['file']['name'];
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if (!in_array($ext, $allowed)) {
                        array_push($error,'file type not allowed');
                       }
                       else{
                        $filename   = uniqid() . "-" . time();
                        $extension  = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); 
                        $basename   = $filename . "." . $extension; 
                        
                        $source       = $_FILES["file"]["tmp_name"];
                        $destination  = "../storage/app/public/images/{$basename}";
                        if(move_uploaded_file($source, $destination))
                        {
                           
                           
                           
                        }
                        else{
                            array_push($error,'file type not uploded');
                        }
                       }
                  }
    
                }
                if(empty($_POST['name']) && 
                   empty($_POST['sex']) &&
                   empty($_POST['dob']) && 
                    empty($_POST['father'])
                    && empty($_POST['state'])
                    && empty($_POST['district'])
                 )
                {
                    array_push($error,'All field are mandatory');
                }
                if(count($error))
                {
                    return json_encode(['status'=>0,"error"=>$error]);
                }
                else{
                    $child=new child();
                    $child->name=$_POST['name'];
                    $child->sex=$_POST['sex'];
                    $child->dob=$_POST['dob'];
                    $child->father_name=$_POST['father'];
                    $child->mother_name=$_POST['mother'];
                    $child->state_id=$_POST['state'];
                    $child->district_id=$_POST['district'];
                    $child->image=$destination;
                    if($child->save())
                    {
                        return json_encode(['status'=>1,"msg"=>"data saved"]);
                    }
                    else
                    {
                        return json_encode(['status'=>0,"error"=>"data not saved"]);
                    }
                }
            }
            else{
                return json_encode(['status'=>0,"error"=>"you are not allowed"]);
            }
         }else{
            return json_encode(['status'=>0,"error"=>"token needed"]);
           }
           
        }
        else{
            return json_encode(['status'=>0,"error"=>"not post any thing"]);
        }
    }
    public function showChild()
    {
        if($_POST)
        {
            if(isset($_POST['token'])){
                $x=json_decode($this->checkuser($_POST['token']));
                if($x->status!=0)
                {
                    $child=child::orderBy('id', 'DESC')->get()->toArray();
                    return json_encode($child);
                }
                else{
                    return json_encode(['status'=>0,"error"=>"you are not allowed"]);
                }
             }else{
                return json_encode(['status'=>0,"error"=>"token needed"]);
               }  
        }
        else{
            return json_encode(['status'=>0,"error"=>"not post any thing"]);
        }
        
      
       
    }
    public function viewChild($id)
    {
        if($_POST)
        {
            if(isset($_POST['token'])){
                $x=json_decode($this->checkuser($_POST['token']));
                if($x->status!=0)
                {
                    $child=$child=child::find($id);
                    return json_encode($child);
                }
                else{
                    return json_encode(['status'=>0,"error"=>"you are not allowed"]);
                }
             }else{
                return json_encode(['status'=>0,"error"=>"token needed"]);
               }  
        }
        else{
            return json_encode(['status'=>0,"error"=>"not post any thing"]);
        }
        
    
       
       
    }
    public function checkuser($token)
    {
       
         try{
             $user=User::where(['token' => JWT::decode($token,env('API_KEY'))]); 
      
            $x=$user->get()->toArray();
            
             if(count($x)){
                return json_encode(['status'=>1,"msg"=>"passed"]);
             }
             else{
              return json_encode(['status'=>0,"error"=>"wrong email and password"]);
             }
            }
            catch(\Exception $e)
            {
                return json_encode(['status'=>0,"error"=>"wrong email and password"]);
            }         
         
         
         
    }
    
}
