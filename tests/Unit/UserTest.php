<?php

namespace Tests\Unit;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreateUserTrue()
    {
        $user = User::create([
            'first_name' => 'Иван',
            'last_name' => 'Сидоров',
            'email' => 'ivan@gamil.com'
        ]);
        $found = $user::first();
        $this->assertTrue(!is_null($found));
    }

    public function testDeleteUserTrue()
    {
        $user = User::create([
            'first_name' => 'Иван',
            'last_name' => 'Сидоров',
            'email' => 'ivan@gamil.com'
        ]);
        $found = $user::first();
        $this->assertTrue(!is_null($found));

        User::findBy('email', 'ivan@gamil.com')->delete();
        $found = $user::first();
        $this->assertTrue(is_null($found));
    }

    public function testAddUserToEvent()
    {
        $user = User::create([
            'first_name' => 'Иван',
            'last_name' => 'Сидоров',
            'email' => 'ivan@gamil.com'
        ]);
        $foundUser = $user::first();
        $this->assertTrue(!is_null($foundUser));

        $event = Event::create([
            'name' => 'Новый год',
            'city' => 'Москва',
            'start_date' => date('Y-m-d')
        ]);
        $foundEvent = $event::first();
        $this->assertTrue(!is_null($foundEvent));

        $foundUser->event_id = $foundEvent->id;

        $foundUser->save();
        $foundUser = $foundUser::first();
        $this->assertEquals($foundEvent->id, $foundUser->event_id);
    }
}
