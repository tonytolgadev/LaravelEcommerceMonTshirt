<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Récupérer la catégorie parent d'une catégorie
    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Récupérer catégorie enfant
    public function childrens(){
       return $this->hasMany(Category::class, 'parent_id');
    }


    // Récupérer les produits de la catégorie >> OneToMany
    public function produitsParent(){
        return $this->hasMany(Produit::class);
    }

    // Récupérer des produits situés dans uen catégorie enfant au travers d'une catégorie parent
    public function produitsChild(){
        return $this->hasManyThrough(Produit::class, Category::class, 'parent_id', 'category_id');
    }

    public function produits(){
        $produits = $this->produitsParent()->with('category')->get()->merge($this->produitsChild()->with('category')->get());
        return $produits;
    }
}







// Note
// belongsto = n'a qu'une seule : par exemple la catégorie la catégorie les goonies n'a qu'une catégorie enfant
// hasMany = en a plusieurs : par exemple la catégorie films a plusieurs catégorie enfants comme les goonies, superman, etc
