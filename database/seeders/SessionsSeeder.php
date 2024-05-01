<?php

namespace Database\Seeders;

use App\Models\Session;
use Illuminate\Database\Seeder;

class SessionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=SessionsSeeder
     * @return void
     */
    public function run()
    {
        $session = [
            [
                'case_id'=>'1',
                'schedule_id'=>'1',
                'psy_id'=>'2',
                'user_id'=>'3',
                'order_by'=>'1',
                'presenting_issue'=>'Test',
                'session_activities'=> 'Test',
                'Take_out'=>'Test',
                'image'=>'image/session_note/no_image.jpg',
                'Next_date_follow'=>'2024-03-20',
                'Next_date_time_slot'=>'1',
            ],
        ];

        foreach ($session as $key => $schedules) {
            Session::create($schedules);
        }
    }
}
