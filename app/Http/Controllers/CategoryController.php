<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function addcategory(){
        return view('admin.addcategory');
    }

    public function categories(){
        $categories = Category::All();

        return view('admin.categories')->with('categories', $categories);
    }

    public function savecategory(Request $request){
        // le required permet d'obliger a inssérer un nom de catégorie et la catégorie doit etre unique
        $this->validate($request, ['nom_cat' => 'required|unique:categories']);

        // J'appelle la BDD
        $category = new Category();
        $category->nom_cat = $request->input('nom_cat');
        $category->is_online = $request->input('is_online');
        $category->parent_id = $request->input('parent_id');



        $category->save();

        return back()->with('status', 'La catégorie a été enregistrée avec succès !');
    }

    public function edit_category($id){
        $category = Category::find($id);

        return view('admin.editcategory')->with('category', $category);
    }

    public function updatecategory(Request $request){
        $this->validate($request, ['nom_cat' => 'required']);

        $category = Category::find($request->input('id'));

        $category->nom_cat = $request->input('nom_cat');
        $category->is_online = $request->input('is_online');

        $category->update();

        return redirect('/categories')->with('status', 'La catégorie a été modifié avec succès !');

    }

    public function delete_category($id){
        $category = Category::find($id);

        $category->delete();

        return back()->with('status', 'La catégorie a été supprimé avec succès !');

    }


}
