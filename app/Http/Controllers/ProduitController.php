<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view("produits.index", compact("produits"));
    }

    public function show(string $id)
    {
        $produit = Produit::find($id);
        return view("produits.show", compact('produit'));
    }

    public function create()
    {
        return view('produits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'categorie_id' => 'required|integer',
            'description' => 'required'
        ]);

        Produit::create($request->all());
        return redirect()->route('produits.index')->with('success', 'Product created successfully');
    }

    public function edit(string $id)
    {
        $produit = Produit::find($id);
        return view('produits.edit', compact('produit'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'categorie_id' => 'required|integer',
            'description' => 'required'
        ]);

        $produit = Produit::find($id);
        $produit->update($request->all());
        return redirect()->route('produits.index')->with('success', 'Product updated successfully');
    }

    public function destroy(string $id)
    {
        $produit = Produit::find($id);
        $produit->delete();
        
        if(request()->wantsJson()) {
            return response()->json(['success' => true]);
        }
        
        return redirect()->route('produits.index')->with('success', 'Product deleted successfully');
    }
}
