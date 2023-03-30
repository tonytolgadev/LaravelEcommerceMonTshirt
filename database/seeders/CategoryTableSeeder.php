<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $category = new \App\Models\Category();
        $category->nom_cat = "Films";
        $category->is_online = 1;
        $category->save();

        $category2 = new \App\Models\Category();
        $category2->nom_cat = "Séries TV";
        $category2->is_online = 1;
        $category2->save();

        $category3 = new \App\Models\Category();
        $category3->nom_cat = "Musique";
        $category3->is_online = 1;
        $category3->save();

        $category4 = new \App\Models\Category();
        $category4->nom_cat = "Jeux-Vidéos";
        $category4->is_online = 1;
        $category4->save();

        $category5 = new \App\Models\Category();
        $category5->nom_cat = "Sport";
        $category5->is_online = 1;
        $category5->save();

        // $category5 = new \App\Models\Category();
        // $category5->nom = "Les goonies";
        // $category5->is_online = 1;
        // $category5->parent_id = 1;
        // $category5->save();

        // $category6 = new \App\Models\Category();
        // $category6->nom = "Star Wars";
        // $category6->is_online = 1;
        // $category6->parent_id = 1;
        // $category6->save();

        // $category7 = new \App\Models\Category();
        // $category7->nom = "Star Trek";
        // $category7->is_online = 1;
        // $category7->parent_id = 1;
        // $category7->save();

        // $category8 = new \App\Models\Category();
        // $category8->nom = "SuperMan";
        // $category8->is_online = 1;
        // $category8->parent_id = 1;
        // $category8->save();

        // $category9 = new \App\Models\Category();
        // $category9->nom = "Tomb Raider";
        // $category9->is_online = 1;
        // $category9->parent_id = 4;
        // $category9->save();

        // $category10 = new \App\Models\Category();
        // $category10->nom = "GTA";
        // $category10->is_online = 1;
        // $category10->parent_id = 4;
        // $category10->save();
    }
}
