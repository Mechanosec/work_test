<?php


namespace App\Service;


use App\Http\Requests\User\AddToEventUserRequest;
use App\Http\Requests\User\GetUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Jobs\SendMale;
use App\Models\Event;
use App\Models\User;

class UserService
{
    public function get(int $id = 0)
    {
        return User::where('id', $id)->first();
    }

    /**
     * @param GetUserRequest $request
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList(GetUserRequest $request)
    {
        $userQuery = User::query();

        if ($eventId = $request->get('eventId')) {
            $userQuery->where('event_id', $eventId);
        }

        return $userQuery->get();
    }

    /**
     * @param StoreUserRequest $request
     * @param int $id
     * @return bool|string[]
     * @throws \Exception
     */
    public function onStore(StoreUserRequest $request, int $id = 0)
    {
        $data = $request->all();
        $user = User::findByOrNew('id', $id);
        if ($user->email != $request->get('email') && User::findBy('email', $request->get('email'))) {
            return ['error' => 'email занят'];
        }
        $user->fill($data);
        $user->save();

        return true;
    }

    /**
     * @param AddToEventUserRequest $request
     * @param int $id
     * @return bool|string[]
     */
    public function addToEvent(AddToEventUserRequest $request, int $id=0)
    {
        $event = Event::findBy('id', $request->get('eventId'));
        if(is_null($event)) {
            return ['error' => 'такого евента не существует'];
        }
        $user = User::findBy('id', $id);
        if(is_null($user)) {
            return ['error' => 'такого пользователя не существует'];
        }
        $user->event_id = $request->get('eventId');
        $user->save();

        SendMale::dispatch('Здравствуйте ' . $user->first_name . ' ' . $user->last_name . '. Вы добавленны в мероприятие ' . $event->name);
        return true;
    }

    /**
     * @param int $id
     * @return bool|string[]
     */
    public function delFromEvent(int $id=0)
    {
        $user = User::findBy('id', $id);
        if(is_null($user)) {
            return ['error' => 'такого пользователя не существует'];
        }
        $user->event_id = 0;
        $user->save();
        return true;
    }
}
