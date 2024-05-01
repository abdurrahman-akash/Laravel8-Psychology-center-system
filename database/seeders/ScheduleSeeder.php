<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=ScheduleSeeder
     * @return void
     */
    public function run()
    {
        $schedule = [
            [
                'user_id'=>'2',
                'date'=>'2024-03-20',
                'time_slot'=>'08 - 09 AM',
                'order_by'=> '1',
                'status'=>'2',
            ],
            [
                'user_id'=>'2',
                'date'=>'2024-03-20',
                'time_slot'=>'09 - 10 AM',
                'order_by'=> '2',
                'status'=>'1',
            ],
            [
                'user_id'=>'2',
                'date'=>'2024-03-20',
                'time_slot'=>'10 - 11 AM',
                'order_by'=> '3',
                'status'=>'1',
            ],
            [
                'user_id'=>'2',
                'date'=>'2024-03-20',
                'time_slot'=>'11 - 12 PM',
                'order_by'=> '4',
                'status'=>'1',
            ],
            [
                'user_id'=>'2',
                'date'=>'2024-03-15',
                'time_slot'=>'11 - 12 PM',
                'order_by'=> '4',
                'status'=>'1',
            ],
            [
                'user_id'=>'2',
                'date'=>'2024-03-15',
                'time_slot'=>'10 - 11 AM',
                'order_by'=> '3',
                'status'=>'1',
            ],
        ];

        foreach ($schedule as $key => $schedules) {
            Schedule::create($schedules);
        }
    }
}
