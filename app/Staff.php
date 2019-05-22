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

    /**
     * Scope to search based on staff_id
     *
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeStaffID($query, $id){
        return $query->where('staff_id','like',$id.'%');
    }

    /**
     * Scope to search based on name
     *
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeName($query, $id){
        return $query->where('name','like','%'.$id.'%');
    }
}
