<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\state;
use App\district;
use App\child;
use Redirect;
use Auth;

class childController extends Controller
{ 
     public function __construct()
    {
      $this->middleware('auth');
    }
    public function addState()
    {
        if($_POST)
        {
            $state=new state();
            $state->name=$_POST['state'];
            if($state->save())
            {
                return Redirect::to('/state');
            }
        }
        else{
            return Redirect::to('/state');
        }
    }
    public function showState()
    {
        $state=state::orderBy('id', 'DESC')->get();
        return view('state',['state'=> $state]);
    }
    public function showDistrict()
    {
        $state=state::orderBy('id', 'DESC')->get();
        $district=district::orderBy('id', 'DESC')->get();
    
        return view('district',['state'=> $state,'district'=>$district]);
    }
    public function addDistrict()
    {
        if($_POST)
        {
            $district=new district();
            $district->name=$_POST['district'];
            $district->state_id=$_POST['state'];
            if($district->save())
            {
                return Redirect::to('/district');
            }
        }
        else{
            return Redirect::to('/district');
        }
    }
    public function childForm()
    {
        $state=state::orderBy('id', 'DESC')->get();
        return view('childForm',['state'=>$state]);  
    }
    public function getDistrict($id)
    {
    
        return json_encode(district::getallDistrictName($id));
    }
    public function addChild()
    {
        if($_POST)
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
                    echo "data saved";
                }
                else
                {
                     echo " error";
                }
            }
        }
    }
    public function showChild()
    {
        $child=child::orderBy('id', 'DESC')->get();
       return view('ShowChild',['child'=>$child]);
       
    }
    public function viewChild($id)
    {
        $child=child::find($id);
    
       return view('viewChild',['child'=>$child]);
       
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
      }
}
