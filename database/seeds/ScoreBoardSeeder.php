<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoreBoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scoreboard')->insert([
            'id_scoreboard' => 1
        ]);
    }
}
