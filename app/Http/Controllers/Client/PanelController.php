<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Administrateur\Menu\Produit;
use Illuminate\Http\Request;
use App\Models\Client\Reservation;

class PanelController extends Controller
{
    public function index(){
        $produits = Produit::all();
        return view('client.panel', compact('produits'));
    }
    
    public function reservation(Request $request){
    
        $reservation = new Reservation;

        $reservation->nbre_personne = $request->nbre_personne;
        $reservation->date = date('Y-m-d', strtotime($request->date));

        $time = explode(" ",$request->time);
        if ($time[1] == 'AM'){
            $tt = strtotime($time[0]);
            $reservation->time = date('h:m', $tt);
        }
        if($time[1] == 'PM'){

            $temps = explode(":", $time[0]);
            $t = $temps[0] + 12;
            $collection = collect([$t, $temps[1]]);
            //$heure = $t. ":" .$temps[1];
            $heure = $collection->implode(':');
            
            $reservation->time = $heure;
            //dd($reservation->time);
        }

        
        $reservation->telephone = $request->telephone;
        $reservation->commentaire = $request->commentaire;

        $reservation->save();

        return back();
    }
}
