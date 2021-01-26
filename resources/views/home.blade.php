<?php 
use App\state;
use App\district;
use Illuminate\Support\Facades\URL;
?>
@extends('layout')
@section('content')

        <div class="container">
            <div>
                <div  class="row">
                    <div class="col-sm-12">
                        <img src="<?=URL::to('/')."../../storage/app/public/site/dihawani_home.jpg"?>" >
                    </div>
                </div>
            </div>
          </div>
        
    <style>
         
    .text-line {
        background-color: transparent;
        color: gray;
        outline: none;
        outline-style: none;
        outline-offset: 0;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: solid #eeeeee 1px;
        padding: 3px 10px;
    }
    /* #center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;
 
} */
.container {
  display: flex;
  justify-content: center;
  align-items: center;
}

    </style>
    <script>
        
    </script>
@endsection;