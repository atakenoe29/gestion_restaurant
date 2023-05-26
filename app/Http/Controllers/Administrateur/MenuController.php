<?php

namespace App\Http\Controllers\Administrateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administrateur\Menu\Categorie;

class MenuController extends Controller
{
    public function index(){//liste des catégories de plat
        $categories = Categorie::all();
        return view('administrateur.menu', compact('categories'));
    }

    public function store(Request $request){
        $categorie = new Categorie;

        $categorie->name = ucwords($request->name);
        $categorie->description = $request->description;

        $categorie->save();

        if($categorie){
            $categories = Categorie::all();
            //return view('administrateur.menu', compact('categories'));
        }

        return redirect('/admin/menu')->with('success', 'Catégorie créée avec succèss');
        //return view('administrateur.menu', compact('categories'));

    }

    public function edit($id){
        $categorie = Categorie::findOrFail($id);
        //dd($categorie);

        return view('administrateur.menu.edit_categorie', compact('categorie'));
        //return response()->json($categorie);

        //return view('administrateur.menu.edit_categorie', compact('categorie'));
    }

    public function update(Request $request, $id){
        $categorie = Categorie::findOrFail($id);

        $categorie->name = ucwords($request->name);
        $categorie->description = $request->description;

        $categorie->save();

        if($categorie){
            $categories = Categorie::all();
            //return view('administrateur.menu', compact('categories'));
        }

        return redirect('/admin/menu');
        //return view('administrateur.menu', compact('categories'));

    }

    public function destroy($id){
        $categorie = Categorie::findOrFail($id);

        $categorie->delete();

        /*if($categorie->delete()){
            $categories = Categorie::all();
            //return view('administrateur.menu', compact('categories'));
        }*/

        return redirect('/admin/menu');
        //return view('administrateur.menu', compact('categories'));

    }
}
