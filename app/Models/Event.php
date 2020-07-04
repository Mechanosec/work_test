<?php


namespace App\Models;


class Event extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
