<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Categorie::all();
        return view("categories.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate(
        [
            "name"=>"required|unique:categories,name"
        ]
       );
       Categorie::create($request->all());
      return redirect()->route("categories.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categorie=Categorie::find($id);
     return view("categories.show",compact("categorie"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorie=Categorie::find($id);
        return view("categories.edit",compact("categorie"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $validated= $request->validate([
           "name"=>"required|unique:categories,name,".$id
        ]);

        $categorie=Categorie::find($id);
        $categorie->update($request->all());
        return redirect()->route("categories.index");
      


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categorie::destroy($id);
        return redirect()->route("categories.index");
    }
}
