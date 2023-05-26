<?php

namespace App\Http\Controllers\Administrateur\Produit;

use App\Http\Controllers\Controller;
use App\Models\Administrateur\Menu\Categorie;
use Illuminate\Http\Request;
use App\Models\Administrateur\Menu\Produit;

use Intervention\Image\ImageManagerStatic as Image;

class ProduitController extends Controller
{
    public function index($id){//liste des produits d'une catégorie
        $categorie = Categorie::findOrFail($id);
        //dd($categorie);
        $produits = Produit::where('categorie_id', '=', $id)->get();
        //dd($produits);
        return view('administrateur.produit', compact('produits', 'categorie'));
    }

    public function store (Request $request, $id){

        // Créer une ressource de l'image
    	//$image = Image::make(($request->picture)->getRealPath());
    	
    	//$image->resize(120, 80); // Redimensionnement de l'image à 120 x 80 px

        $produit = new Produit;
        if($request->hasfile('picture')){
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('images_produit/', $filename);
            $produit->picture = $filename;
        }
        
        //$produit->picture->save(public_path()."/images_produit/a.jpg"); // Enregistrement de l'image
        $produit->name = ucwords($request->name);
        $produit->description = $request->description;
        $produit->price = doubleval($request->price);
        $produit->statut = 1;
        $produit->categorie_id = $id;

        $produit->save();

        return back();  
    }

    public function modif_statut($id){
        $produit = Produit::findOrFail($id);
        if ($produit->statut == 1) {
            $produit->statut = 0;
            $produit->save();
        }else{
            $produit->statut = 1;
            $produit->save();
        }
        
        return back();

    }

    public function edit($id){
        $produit = Produit::findOrFail($id);
        //dd($categorie);

        return view('administrateur.menu.edit_produit', compact('produit'));
    }

    public function update(Request $request, $id){
        $produit = Produit::findOrFail($id);

        if($request->hasfile('picture')){
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('images_produit/', $filename);
            $produit->picture = $filename;
        }else{
            $produit->picture = $produit->picture;
        }

        $produit->name = ucwords($request->name);
        $produit->description = $request->description;
        $produit->price = $request->price;

        $produit->save();

        /*if($categorie){
            $categories = Categorie::all();
            //return view('administrateur.menu', compact('categories'));
        }*/

        return back();
    }

    public function destroy($id){
        $produit = Produit::findOrFail($id);

        $produit->delete();

        /*if($categorie->delete()){
            $categories = Categorie::all();
            //return view('administrateur.menu', compact('categories'));
        }*/

        return back();
        //return view('administrateur.menu', compact('categories'));

    }
}
