<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    public static function count()
    {
        return Staff::all()->count();
    }
}
