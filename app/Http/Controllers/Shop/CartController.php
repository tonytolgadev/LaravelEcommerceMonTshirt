<?php

namespace App\Http\Controllers\Shop;
use Session;
use Cart;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //Ajouter un produit au panier
    public function add(Request $request) {
        $produit = Produit::find($request->id);
        Cart::add(array(
            'id' => $produit->id, // inique row ID
            'name' => $produit->nom_produit,
            'price' => $produit->prix,
            'quantity' => $request->qty,
            'attributes' => array('size'=>$request->size,'photo'=>$produit->photo_principale)
        ));



        // return redirect('panier');
        return redirect(route('cart_index'));
    }


    // contenu du panier
    public function index() {
    $produits = Produit::All();

    $content = Cart::getContent();
    // dd($content);
    // $total_ttc_panier = Cart::getTotal();
        return view('cart.index', compact('content'))->with('produits', $produits);
    }


    public function suppdupanier($id){
        Cart::remove($id);
        return redirect()->back();
    }

    public function modifier_quant(Request $request, $id){

        Cart::update(456, array(
            'quantity' => $request->qty, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
          ));

        //dd(Session::get('cart'));
        return back();
    }

    public function paiement() {
        $content = Cart::getContent();

        if(!Session::has('client')){
            return view('shop.login');
        }
        return view ('shop.paiement', compact('content'));
    }

    public function signup(){
        return view('shop.signup');

    }

    public function login(){
        return view('shop.login');

    }

}
