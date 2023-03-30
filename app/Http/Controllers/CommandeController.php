<?php

namespace App\Http\Controllers;
use App\Models\Commande;

use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function delete_commandes($id){
        $commande = Commande::find($id);

        $commande->delete();

        return back()->with('status', 'La commande a été supprimé avec succès !');

    }
}
