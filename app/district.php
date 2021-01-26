<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    public $timestamps = false;
    public static function getDistrictName($id)
    {
            $x=  self::where(['state_id'=>$id]);
        $state=$x->get()->toArray();
        return $state[0]['name'];
        
    }
    public static function getallDistrictName($id)
    {
            $x=  self::where(['state_id'=>$id]);
        $state=$x->get()->toArray();
        return $state;
        
    }
}
