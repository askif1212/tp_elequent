<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class HomeController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view("index", compact("produits"));
    }
    public function addToCart($id)
    {
        $produit = Produit::find($id);

        if (!$produit) {
            return redirect()->back()->with('error', 'Produit non trouvé.');
        }

        $panier = session()->get('panier', []);

        if (isset($panier[$id])) {
            $panier[$id]['quantite']++;
        } else {
            $panier[$id] = [
                "nom" => $produit->name,
                "quantite" => 1,
                "prix" => $produit->price,
                "image" => $produit->image
            ];
        }

        session()->put('panier', $panier);

        return redirect()->back()->with('success', 'Produit ajouté au panier.');
    }

    public function showCart()
    {
        $panier = session()->get('panier', []);
        return response()->json($panier);
    }
}
