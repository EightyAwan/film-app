<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([[
            'name' => 'Halton',
            'comment' => 'Amazing movie',
            'film_id' => 1, 
            'created_at' => Carbon::now(),  
            'updated_at' => Carbon::now(),  
        ],[
            'name' => 'Johnson',
            'comment' => 'Superb movie',
            'film_id' => 2, 
            'created_at' => Carbon::now(),  
            'updated_at' => Carbon::now(),  
        ],[
            'name' => 'Neymar',
            'comment' => 'Amazing/Superb movie',
            'film_id' => 3, 
            'created_at' => Carbon::now(),  
            'updated_at' => Carbon::now(),  
        ]]);
    }
}
