<?php

namespace App\Http\Controllers\Shop;

use App\Models\Tag;
use App\Models\Produit;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        // SELECT * FROM produits;
        $produits = Produit::with('category')->get();
        // dd($produits);
        // $categories = Category::where('is_online',1)->get();



        return view('shop.index', compact('produits'));
    }

    public function produit(Request $request){
        // echo "page produit";
        // dd($_GET);
        // SELECT * FROM produits WHERE id = ?
        // dd($request->id);
        // $categories = Category::where('is_online',1)->get();

        $produit = Produit::find($request->id);

        return view('shop.produit', compact('produit'));
    }

    public function viewByCategory(Request $request) {
        // Récuperer toutes les catégories >> is_online == 1
            // $categories = Category::where('is_online',1)->get();
            // dd($categories);
            // $produits = Produit::all();

            // SELECT * FROM produits WHERE category_id = $request->id
            // $produits = Produit::where('category_id', $request->id)->get();

            $category = Category::find($request->id);
            $produits = $category->produits();

        return view('shop.categorie', compact('produits', 'category'));
    }

    public function viewByTag(Request $request){
    $tag = Tag::find($request->id);
    $produits = $tag->produits;
    return view('shop.categorie', compact('produits', 'tag'));

    }
}
