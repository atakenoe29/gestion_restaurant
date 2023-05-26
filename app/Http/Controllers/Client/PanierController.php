<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administrateur\Menu\Produit;
use App\Models\Commande;
use Carbon\Carbon;
//use Cart;
 use Darryldecode\Cart\Facades\CartFacade as Cart;

class PanierController extends Controller
{

    public function index(){
        $produits = Cart::getContent();

        $prixTotal = Cart::getSubTotal();

        $nbre_prod = count($produits);

        $click = 0;

        return view('client.panier', compact('produits', 'nbre_prod', 'click', 'prixTotal'));
    }

    public function add($id){
        $produit = Produit::findOrFail($id);
        Cart::add(array(
            'id' => $produit->id, // inique row ID
            'name' => $produit->name,
            'price' => $produit->price,
            'quantity' => 1,
            'attributes' => array('description' => $produit->description,
            'picture' => $produit->picture)
        ));
        return back();
    }

    public function update(Request $request, $id){
        Cart::update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));

          return back();
    }

    public function destroy($id){
        Cart::remove($id);

        return back();

    }

    public function commande(Request $request){
        $produits = Cart::getContent();
        foreach ($produits as $key => $produit) {
            $prod_id[] = $produit->id;
            $prod_quantity[] = $produit->quantity;
        }
        //dd($prod_id, $prod_quantity);

        
        //dd($produit_id);

        $commande = new Commande;

        $commande->produits = implode(' ', $prod_id);
        $commande->quantities = implode(' ', $prod_quantity);
    
        $commande->prixTotal = $request->prixTotal;
        $commande->telephone = $request->telephone;
        $commande->num_table = $request->num_table;
        $commande->quartier = $request->quartier;
        $commande->reference = $request->reference;
        $commande->date = now()->format('Y-m-d');

        $commande->save();

        Cart::clear();

        return back();
        
    }
}