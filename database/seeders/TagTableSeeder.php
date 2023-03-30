<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tag= new \App\Models\Tag();
        $tag->nom = "#Humour";
        $tag->save();

        $tag= new \App\Models\Tag();
        $tag->nom = "#Fun";
        $tag->save();

        $tag= new \App\Models\Tag();
        $tag->nom = "#Rouge";
        $tag->save();

    }
}
