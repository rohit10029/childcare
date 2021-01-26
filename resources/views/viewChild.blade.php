<?php 
use App\state;
use App\district;
use Illuminate\Support\Facades\URL;
?>
@extends('layout')
@section('content')

        <div class="container">
            <div  class="row">
                <div class="col-sm-12">
                    <img src="<?=URL::to('/')."../".$child->image?>" width="50px" height="50px"  class="img-circle">
                </div>
            </div>
          <div class="row">
             <div class="col-sm-4">
                <label>Name:</label><?=$child->name?>
             </div>
              <div class="col-sm-4">
                <label>sex:</label><?=$child->sex==0?'female':'male'?>
                </div>
            <div class="col-sm-4">
                <label>Date of birth:</label><?=$child->dob?>
              </div>
           </div> 
           <div class="row">
            <div class="col-sm-4">
               <label>Father's name:</label><?=$child->father_name?>
            </div>
             <div class="col-sm-4">
                <label>Mother's name:</label><?=$child->mother_name?>
               </div>
           <div class="col-sm-4">
               <label>state:</label><?= state::getStateName($child->state_id)?>
             </div>
          </div> 
          <div class="row">
            <div class="col-sm-4">
                <label>district:</label><?= district::getDistrictName($child->district_id)?>
            </div>
             
          </div> 
        </div>
        
    <style>
         
    
    /* #center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;
 
} */
/* .container {
  display: flex;
  justify-content: center;
  align-items: center;
} */

    </style>
  
@endsection;