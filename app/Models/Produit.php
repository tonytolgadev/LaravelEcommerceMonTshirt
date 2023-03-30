<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    private static $facteur_tva = 1.2;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags() {

        return $this->belongsToMany(Tag::class);

    }


    public function recommandations() {
        return $this->belongsToMany(Produit::class, 'produit_recommande', 'produit_id', 'produit_recommande_id');

    }

  
}

