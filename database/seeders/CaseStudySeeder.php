<?php

namespace Database\Seeders;

use App\Models\CaseStudy;
use Illuminate\Database\Seeder;

class CaseStudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=CaseStudySeeder
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'user_id'=>'1',
                'psy_id'=>'2',
                'problem_discussion'=>'Need More Problem',
                'r_a_date'=>'2024-03-20',
                'r_a_time_slot'=>'1',
                'status'=>'1',
            ],
        ];

        foreach ($user as $key => $value) {
            CaseStudy::create($value);
        }
    }
}
