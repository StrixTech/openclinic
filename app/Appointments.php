<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    public function getStaffName($id)
    {
        return Staff::where('staff_id', $id)->first();
    }
}
