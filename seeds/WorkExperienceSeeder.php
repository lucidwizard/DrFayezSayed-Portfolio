<?php

use Illuminate\Database\Seeder;

class WorkExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_experiences')->delete();
        $test = [
            [
                'title' => Str::random(10),
                'dates' => Str::random(10),
                'company' => Str::random(10),
                'desc' => Str::random(30),
                'user_id' => 1
            ],
            [
                'title' => Str::random(10),
                'dates' => Str::random(10),
                'company' => Str::random(10),
                'desc' => Str::random(30),
                'user_id' => 1
            ],
            [
                'title' => Str::random(10),
                'dates' => Str::random(10),
                'company' => Str::random(10),
                'desc' => Str::random(30),
                'user_id' => 1
            ],
            [
                'title' => Str::random(10),
                'dates' => Str::random(10),
                'company' => Str::random(10),
                'desc' => Str::random(30),
                'user_id' => 1
            ],
            [
                'title' => Str::random(10),
                'dates' => Str::random(10),
                'company' => Str::random(10),
                'desc' => Str::random(30),
                'user_id' => 1
            ],
        ];
    
        DB::table('work_experiences')->insert($test);
    }
}
