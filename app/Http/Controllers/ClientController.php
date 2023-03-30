<?php

namespace App\Http\Controllers;
use Cart;
use Session;
use App\Models\Client;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class ClientController extends Controller
{
    public function orders(){
        return view ('admin.orders');
    }

    public function creer_compte(Request $request){
        $this->validate($request, ['email' => 'required|email|unique:clients',
        'motdepasse' => 'required|min:4']);

        // J'appelle ma table Client dans ma bdd
        $client = new Client();
        // J'indique l'email et le mdp
        $client->email = $request->input('email');
        $client->motdepasse = bcrypt($request->input('motdepasse'));
        // J'enregistre
        $client->save();

        return back()->with('status', 'Votre compte a été crée avec succès ! ');
    }

    public function acceder_compte(Request $request){
        $this->validate($request, ['email' => 'required', 'motdepasse' => 'required']);

        $client = Client::where('email', $request->input('email'))->first();

        if ($client) {

            if (Hash::check($request->input('motdepasse'), $client->motdepasse)) {

                Session::put('client', $client);
                return redirect('/');
            } else {

                return back()->with('status', 'Mauvais mot de passe ou email');
            }

        } else {
            return back()->with('status', 'Pas de compte avec cet email, veuillez créer un compte.');
        }

    }

    public function logout(){
        Session::forget('client');

        return back();
    }

    public function payer(Request $request){
        // $produits = Produit::All();

         // Récupere le contenu et le nombre du panier
         $content = Cart::getContent();

         // Table commande dans la bdd
         $commande = new Commande();








        // $payer_id = time();

        $commande->nom = $request->input('nom');
        $commande->prenom = $request->input('prenom');
        $commande->email = $request->input('email');
        $commande->adresse = $request->input('address');
        $commande->codepostal = $request->input('codepostal');
        $commande->ville = $request->input('ville');
        $commande->panier = serialize($content);

        // $commande->payer_id = $payer_id;

        $commande->save();

        // Effacer le panier après l'achat
        Cart::clear();

        // $commandes = Commande::where('payer_id', $payer_id)->get();

        // $commandes->transform(function($commande, $key){
        //     $commande->panier = unserialize($commande->panier);
        // });

        // $email = Session::get('client')->email;

        // Mail::to($email)->send(new SendMail($commandes));

        return redirect('/panier')->with('status', 'Votre commande a été effectué avec succès');
    }

    public function commandes(){
        $commandes = Commande::All();

        $commandes->transform(function($commande, $key){

            $commande->panier = unserialize($commande->panier);
            return $commande;
        });

        return view('admin.orders')->with('commandes', $commandes);
    }

}
