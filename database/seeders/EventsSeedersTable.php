<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsSeedersTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'title'=>'Event 1',
            'description'=>'Event 1 Description',
            'start_time'=>now()->addDays(),
            'end_time'=>now()->addDays(7)->addHours(5),
        ]);

        Event::create([
            'title'=>'Event 2',
            'description'=>'Event 2 Description',
            'start_time'=>now()->addDays(),
            'end_time'=>now()->addDays(8)->addHours(5),
        ]);

        Event::create([
            'title'=>'Event 3',
            'description'=>'Event 3 Description',
            'start_time'=>now()->addDays(),
            'end_time'=>now()->addDays(9)->addHours(5),
        ]);
    }
}
