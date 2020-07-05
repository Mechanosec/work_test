<?php


namespace App\Models;


class User extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'event_id'];

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    /**
     * @param int $id
     * @return bool|null
     * @throws \Exception
     */
    public static function onDelete(int $id=0)
    {
        return self::findBy('id', $id)->delete();
    }
}
