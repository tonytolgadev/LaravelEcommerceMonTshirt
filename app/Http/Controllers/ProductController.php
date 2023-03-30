<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Session;
use App\Models\Category;
use App\Models\Produit;
use App\Cart;


class ProductController extends Controller
{
    public function addproduct()
    {
        $categories = Category::All()->pluck('nom_cat', 'nom_cat');
        $produits = Produit::All()->pluck('category_id', 'category_id');

        return view('admin.addproduct')->with('produits', $produits);
    }

    public function saveproduct(Request $request)
    {
        $this->validate($request, [
            'nom_produit' => 'required',
            'prix' => 'required',
            'photo_principale' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('photo_principale')) {
            // 1 : get file name with exte
            $fileNameWithExt = $request->file('photo_principale')->getClientOriginalName();
            // 2 : get juste file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // 3 : get juste file extension
            $extension = $request->file('photo_principale')->getClientOriginalExtension();
            // 4 : file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            // upload image
            $path = $request->file('photo_principale')->storeAs('public/photo_principale', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $produit = new Produit();
        $produit->nom_produit = $request->input('nom_produit');
        $produit->prix = $request->input('prix');
        $produit->description = $request->input('description');
        $produit->category_id = $request->input('category_id');
        $produit->photo_principale = $fileNameToStore;
        // $produit->status =  1;

        $produit->save();

        return back()->with('status', 'Le produit a été enregistrée avec succès !');
    }


    public function edit_product($id)
    {
        $produit = Produit::find($id);

        $categories = Category::All()->pluck('nom_cat', 'nom_cat');

        return view('admin.editproduct')->with('produit', $produit)->with('categories', $categories);
    }

    public function products()
    {
        $produits = Produit::All();
        return view('admin.products')->with('produits', $produits);
    }

    public function updateproduct(Request $request)
    {
        $this->validate($request, [
            'nom_produit' => 'required',
            'prix' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'photo_principale' => 'image|nullable|max:1999'
        ]);
        $produit = Produit::find($request->input('id'));
        $produit->nom_produit = $request->input('nom_produit');
        $produit->prix = $request->prix;
        $produit->description = $request->input('description');
        $produit->category_id = $request->input('category_id');

        if ($request->hasFile('photo_principale')) {
            // 1 : get file name with exte
            $fileNameWithExt = $request->file('photo_principale')->getClientOriginalName();
            // 2 : get juste file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // 3 : get juste file extension
            $extension = $request->file('photo_principale')->getClientOriginalExtension();
            // 4 : file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            // upload image
            $path = $request->file('photo_principale')->storeAs('public/photo_principale', $fileNameToStore);

            if ($produit->photo_principale != 'noimage.jpg') {
                Storage::delete('public/photo_principale/' . $produit->photo_principale);
            }

            $produit->photo_principale = $fileNameToStore;
        }

        $produit->update();

        return redirect('/products')->with('status', 'Le produit a été modifié avec succès !');
    }

    public function delete_product($id)
    {
        $produit = Produit::find($id);

        if ($produit->photo_principale != 'noimage.jpg') {
            Storage::delete('public/photo_principales/' . $produit->photo_principale);
        }

        $produit->delete();

        return back()->with('status', 'Le produit a été supprimé avec succès !');
    }



    // public function select_par_cat($category_name)
    // {
    //     $produits = Product::All()->where('product_category', $category_name)->where('status', 1);

    //     $categories = Category::All();

    //     return view('client.shop')->with('products', $produits)->with('categories', $categories);
    // }


}
