<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,"index"])->name("index");

Route::get('/categories',[CategorieController::class,"index"])->name("categories.index");
Route::get("/categories/create",[CategorieController::class,"create"])->name("categories.create");
Route::post("/categories",[CategorieController::class,"store"])->name("categories.store");
Route::get("/categories/{id}",[CategorieController::class,"show"])->name("categories.show");
Route::get("/categories/{id}/edit",[CategorieController::class,"edit"])->name("categories.edit");
Route::put("/categories/{id}",[CategorieController::class,"update"])->name("categories.update");
Route::delete("/categories/{id}",[CategorieController::class,"destroy"])->name("categories.destroy");

Route::get('/clients',[ClientController::class,"index"])->name("clients.index");
Route::get("/clients/create",[ClientController::class,"create"])->name("clients.create");
Route::post("/clients",[ClientController::class,"store"])->name("clients.store");
Route::get("/clients/{id}",[ClientController::class,"show"])->name("clients.show");
Route::get("/clients/{id}/edit",[ClientController::class,"edit"])->name("clients.edit");
Route::put("/clients/{id}",[ClientController::class,"update"])->name("clients.update");
Route::delete("/clients/{id}",[ClientController::class,"destroy"])->name("clients.destroy");

Route::get('/commandes',[CommandeController::class,"index"])->name("commandes.index");
Route::get("/commandes/create",[CommandeController::class,"create"])->name("commandes.create");
Route::post("/commandes",[CommandeController::class,"store"])->name("commandes.store");
Route::get("/commandes/{id}",[CommandeController::class,"show"])->name("commandes.show");
Route::get("/commandes/{id}/edit",[CommandeController::class,"edit"])->name("commandes.edit");
Route::put("/commandes/{id}",[CommandeController::class,"update"])->name("commandes.update");
Route::delete("/commandes/{id}",[CommandeController::class,"destroy"])->name("commandes.destroy");
Route::get('/commandes/filter/{etat?}', [CommandeController::class, 'filter']);

Route::get('/produits',[ProduitController::class,"index"])->name("produits.index");
Route::get("/produits/create",[ProduitController::class,"create"])->name("produits.create");
Route::post("/produits",[ProduitController::class,"store"])->name("produits.store");
Route::get("/produits/{id}",[ProduitController::class,"show"])->name("produits.show");
Route::get("/produits/{id}/edit",[ProduitController::class,"edit"])->name("produits.edit");
Route::put("/produits/{id}",[ProduitController::class,"update"])->name("produits.update");
Route::delete("/produits/{id}",[ProduitController::class,"destroy"])->name("produits.destroy");
Route::get('/produits/filter/{category?}', [ProduitController::class, 'filter']);