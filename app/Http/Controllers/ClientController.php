<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'birthDay' => 'required|date',
        ]);

        Client::create($request->all());

        return redirect()->route('clients.index')
            ->with('success', 'Client created successfully.');
    }

    public function show(string $id)
    {
        $client = Client::find($id);
        return view('clients.show', compact('client'));
    }

    public function edit(string $id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'city' => 'required|string|max:255',
            'birthDay' => 'required|date',
        ]);

        $client = Client::findOrFail($id);

        $client->firstName = $request->input('firstName');
        $client->lastName = $request->input('lastName');
        $client->phone = $request->input('phone');
        $client->city = $request->input('city');
        $client->birthDay = $request->input('birthDay');
        $client->save();

        return redirect()->route('clients.index')->with('success', 'Client updated successfully');
    }

    public function destroy(string $id)
    {
        Client::destroy($id);
        
        if(request()->wantsJson()) {
            return response()->json(['success' => true]);
        }
        
        return redirect()->route('clients.index')
            ->with('success', 'Client deleted successfully');
    }
}
