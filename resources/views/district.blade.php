<?php use App\state;?>
@extends('layout')
@section('content')
<div class="row" >
    <div class="col-sm-3">
            <div id=center style="border-color:green;border:solid 2px ">
                
                <form method="post" action= "<?=URL::to('/add-district');?>"  >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="row" >
                        <div class="col-sm-6">
                            <i class="fa fa-plus-circle" style="font-size:48px;color:red"></i>
                        </div>
                        <div class="col-sm-6">
                            <div class="row" >
                                <div class="col-sm-12">
                                  <select class="text-line col-sm-12" name="state">
                                      <?php
                                        for($i=0;$i<count($state);$i++){
                                        ?>
                                        <option value="<?=$state[$i]->id?>"><?=$state[$i]->name?></option>
                                        <?php } ?>
                                  </select>
                                </div>
                        <div class="col-sm-12">
                            <input type="text" class="text-line col-sm-12" name="district"   required placeholder="District"/>
                        </div>
                        <br> <br> <br>
                        <div class="col-sm-12">
                            <button class="btn " type="submit" style="background-color: green;color:white">Add state</button>
                        </div>
                            </div>
                    </div>
                    </div> 
                </form>
            </div>
    </div>
    <?php for($i=0;$i<count($district);$i++) { ?>
    <div class="col-sm-3" style=" height: 300px;">
        <div id=center style="border-color:green;border:solid 2px ">
            
           
                <div class="row" >
                    <div class="col-sm-6">
                        <i class="fa fa-plus-circle" style="font-size:48px;color:red"></i>
                    </div>
                    <div class="col-sm-6">
                        <div class="row" >
                    <div class="col-sm-12">
                        <h2><?=$district[$i]->name?></h2>
                    </div>
                   <?=state::getStateName($district[$i]->state_id)
                    ?>
                    </div>
                </div>
                </div> 
          
        </div>
     </div>
     <?php }?>
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
   


    </style>
    
@endsection