<?php

namespace Database\Seeders;

use App\Models\Genres;
use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies_array = [[
            'name' => 'Abc',
            'description' => 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ',
            'release_date' => '2020-10-01',
            'rating' => '1',
            'price' => '25',
            'country_name' => 'USA',
            'photo' => 'default.png',
            'created_by' => 1,
        ], [
            'name' => 'Def',
            'description' => 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ',
            'release_date' => '2020-11-01',
            'rating' => '2',
            'price' => '30',
            'country_name' => 'UK',
            'photo' => 'default.png',
            'created_by' => 1,
        ], [
            'name' => 'Ghi',
            'description' => 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ',
            'release_date' => '2020-12-01',
            'rating' => '3',
            'price' => '45',
            'country_name' => 'UAE',
            'photo' => 'default.png',
            'created_by' => 1,
        ]];



        foreach ($movies_array as $movie) {
            $movie = Movie::firstOrCreate($movie);
            $random_number = mt_rand(1, 3);

            for ($i = 0; $i < $random_number; $i++) {
                $random_genres = mt_rand(1, 5);

                $genres = new Genres();
                $genres->genres_id = $random_genres;
                $genres->movie_id = $movie->id;
                $genres->save();
            }
        }
    }
}
