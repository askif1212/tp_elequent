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
}
