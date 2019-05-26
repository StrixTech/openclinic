<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientNotes extends Model
{
    public static function getStaffName($id)
    {
        return Staff::where('staff_id', $id)->first()->name;
    }
}
