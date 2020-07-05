<?php

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [];
        $now = Carbon::now()->toDateTimeString();
        for ($i = 0; $i < 10; $i++) {
            $events[] = [
                'name' => 'Событие' . $i,
                'city' => 'Город' . $i,
                'start_date' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        Event::insert($events);
    }
}
