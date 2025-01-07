<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\commande;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = commande::all();
        return view("commandes.index", compact("commandes"));
    }

    public function create()
    {
        return view('commandes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'client_id' => 'required|integer|exists:clients,id',
        ]);

        commande::create($request->only(['date', 'client_id']));

        return redirect()->route('commandes.index')
            ->with('success', 'Commande created successfully.');
    }

    public function show(string $id)
    {
        $commande = commande::find($id);
        return view('commandes.show', compact('commande'));
    }

    public function edit(string $id)
    {
        $commande = commande::find($id);
        return view('commandes.edit', compact('commande'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'client_id' => 'required|integer|exists:clients,id',
        ]);

        $commande = commande::findOrFail($id);

        $commande->date = $request->input('date');
        $commande->client_id = $request->input('client_id');
        $commande->etat = $request->input('etat');
        $commande->save();

        return redirect()->route('commandes.index')->with('success', 'Commande updated successfully');
    }

    public function destroy(string $id)
    {
        commande::destroy($id);
        
        if(request()->wantsJson()) {
            return response()->json(['success' => true]);
        }
        
        return redirect()->route('commandes.index')
            ->with('success', 'Commande deleted successfully');
    }

    public function filter($etat = null)
    {
        $query = Commande::query();

        if ($etat === "all") {
            $commandes = $query->get();
        } else if ($etat) {
            $commandes = $query->where("etat", $etat);
        }

        $commandes = $query->get();

        return response()->json($commandes);
    }
}
