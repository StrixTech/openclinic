<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $table = 'patients';

    /**
     * Scope to search based on staff_id
     *
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeMRN($query, $id){
        return $query->where('mrn','like',$id.'%');
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
