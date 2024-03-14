<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('static_vals')->insert(
            [
                'symbol' => 'A',
                'value' => 1,
            ],
           
        );
        DB::table('static_vals')->insert(
            [
                'symbol' => 'B',
                'value' => 5,
            ],
           
        );
        DB::table('static_vals')->insert(
            [
                'symbol' => 'Z',
                'value' => 10,
            ],
           
        );
        DB::table('static_vals')->insert(
            [
                'symbol' => 'L',
                'value' => 50,
            ],
           
        );
        DB::table('static_vals')->insert(
            [
                'symbol' => 'C',
                'value' => 100,
            ],
           
        );
        DB::table('static_vals')->insert(
            [
                'symbol' => 'D',
                'value' => 500,
            ],
           
        );
        DB::table('static_vals')->insert(
            [
                'symbol' => 'R',
                'value' => 1000,
            ],
           
        );
    }
}
