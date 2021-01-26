<?php 
use App\state;
use App\district;
use Illuminate\Support\Facades\URL;
?>
@extends('layout')
@section('content')
<div class="row" >
    <div class="col-sm-10">
        <a class="btn btn-success" href=<?= Url::to('/child-form')?> style="float: right;">Add child</a>
    </div>
</div>
<br><br>
        <div class="container">
            
            <div class="row">
                <table class="table">
                    <tr>
                        <th> Name</th>
                        <th>sex</th>
                        <th>Date of birth</th>
                        <th> Father's name</th>
                        <th>Mother's name</th>
                        <th>state</th>
                        <th>district</th>
                    </tr>
                    <?php for($i=0;$i<count($child);$i++) { ?>
                        <tr>
                            <td><?=$child[$i]->name?></td>
                            <td><?=$child[$i]->sex==1?'male':'female'?></td>
                            <td><?=$child[$i]->dob?></td>
                            <td><?=$child[$i]->father_name?></td>
                            <td><?=$child[$i]->mother_name?></td>
                           <td> <?= state::getStateName($child[$i]->state_id)?></td>
                           <td> <?= district::getDistrictName($child[$i]->district_id)?></td>
                           <td><a href="<?= Url::to('/child-view'."/".$child[$i]->id)?>">view</button></td>
                        </tr>
                        <?php } ?>
                </table>
                
              
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