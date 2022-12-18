<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('films')->insert([[
            'name' => 'John Wick',
            'slug' => 'john-wick-100',
            'description' => 'John Wick, a retired hitman, is forced to return to his old ways after a group of Russian gangsters steal his car and kill a puppy gifted to him by his late wife',
            'release_date' => '2026-01-01',
            'rating' => 4,
            'ticket_price' => 50,
            'genre' => 'a:2:{i:0;s:6:"comedy";i:1;s:8:"fighting";}',
            'photo' => 'assets/images/clip-01.jpg',  
            'created_at' => Carbon::now(),  
            'updated_at' => Carbon::now(),  
        ],
        [
            'name' => 'Harry Potter',
            'slug' => 'harry-potter-100',
            'description' => 'Harry Potter, a retired hitman, is forced to return to his old ways after a group of Russian gangsters steal his car and kill a puppy gifted to him by his late wife',
            'release_date' => '2026-02-01',
            'rating' => 4,
            'ticket_price' => 50,
            'genre' => 'a:2:{i:0;s:6:"comedy";i:1;s:8:"fighting";}',
            'photo' => 'assets/images/clip-02.jpg',  
            'created_at' => Carbon::now(),  
            'updated_at' => Carbon::now(), 
        ],
        [
            'name' => 'Trauma',
            'slug' => 'trauma-100',
            'description' => 'Trauma, a retired hitman, is forced to return to his old ways after a group of Russian gangsters steal his car and kill a puppy gifted to him by his late wife',
            'release_date' => '2026-05-01',
            'rating' => 3,
            'ticket_price' => 500,
            'genre' => 'a:2:{i:0;s:6:"comedy";i:1;s:8:"fighting";}',
            'photo' => 'assets/images/clip-03.jpg',  
            'created_at' => Carbon::now(),  
            'updated_at' => Carbon::now(), 
        ]]);
    }
}
