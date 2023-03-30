<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;


class ProduitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produit= new \App\Models\Produit();
        $produit->nom = "T-Shirt Goonies";
        $produit->prix_ht = 25;
        $produit->description = "T-Shirt du film les Goonies";
        $produit->photo_principale = "goonies.jpg";
        $produit->category_id = 1;
        $produit->save();

        $produit= new \App\Models\Produit();
        $produit->nom = "T-Shirt Star Strek";
        $produit->prix_ht = 39;
        $produit->description = "T-Shirt du film les Star Strek";
        $produit->photo_principale = "star_strek_kirk.jpg";
        $produit->category_id = 1;
        $produit->save();

        $produit= new \App\Models\Produit();
        $produit->nom = "T-Shirt M. Happy";
        $produit->prix_ht = 39;
        $produit->description = "T-Shirt qui rend heureux";
        $produit->photo_principale = "happy.jpg";
        $produit->category_id = 6;
        $produit->save();

        $produit= new \App\Models\Produit();
        $produit->nom = "T-Shirt Hulk";
        $produit->prix_ht = 19;
        $produit->description = "T-Shirt qui rend super fort";
        $produit->photo_principale = "hulk.jpg";
        $produit->category_id = 2;
        $produit->save();

        $produit= new \App\Models\Produit();
        $produit->nom = "T-Shirt Krusty Le Clown";
        $produit->prix_ht = 22;
        $produit->description = "T-Shirt qui rend super rigolo et cynique";
        $produit->photo_principale = "krusty_simpsons.jpg";
        $produit->category_id = 6;
        $produit->save();

        $produit= new \App\Models\Produit();
        $produit->nom = "T-Shirt Little Miss Sunshine";
        $produit->prix_ht = 19;
        $produit->description = "Une belle aventure familiale";
        $produit->photo_principale = "little_miss_sunshine.jpg";
        $produit->category_id = 1;
        $produit->save();

        $produit= new \App\Models\Produit();
        $produit->nom = "T-Shirt Les Simpsons";
        $produit->prix_ht = 19;
        $produit->description = "Tshirt super cool";
        $produit->photo_principale = "simpsons.jpg";
        $produit->category_id = 6;
        $produit->save();

        $produit= new \App\Models\Produit();
        $produit->nom = "T-Shirt SuperMan";
        $produit->prix_ht = 19;
        $produit->description = "Tshirt super man";
        $produit->photo_principale = "super_man.jpg";
        $produit->category_id = 1;
        $produit->save();

        $produit= new \App\Models\Produit();
        $produit->nom = "T-Shirt Wonder Woman";
        $produit->prix_ht = 19;
        $produit->description = "Tshirt Wonder Woman";
        $produit->photo_principale = "wonder_man.jpg";
        $produit->category_id = 2;
        $produit->save();

    }
}
