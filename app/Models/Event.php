<?php


namespace App\Models;


class Event extends Model
{
    protected $fillable = ['name', 'city', 'start_date'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
