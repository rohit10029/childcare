<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    public $timestamps = false;
    public static function getStateName($id)
    {
            $x=  self::where(['id'=>$id]);
        $state=$x->get()->toArray();
        return $state[0]['name'];
    }
    
}
