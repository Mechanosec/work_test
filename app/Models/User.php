<?php


namespace App\Models;


class User extends Model
{
    public function event()
    {
        return $this->hasOne('App\Models\Event');
    }
}
