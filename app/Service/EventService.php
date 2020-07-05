<?php


namespace App\Service;


use App\Http\Requests\Event\AddUserEventRequest;
use App\Models\Event;
use App\Models\User;

class EventService
{
    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id = 0)
    {
        return Event::where('id', $id)->first();
    }

    /**
     * @return Event[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList()
    {
        return Event::all();
    }
}
