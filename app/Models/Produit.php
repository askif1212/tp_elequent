<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    /** @use HasFactory<\Database\Factories\ProduitFactory> */
    use HasFactory;
    protected $fillable=["name","description","price","stock","categorie_id","image"];
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
    public function commandes(){
        return $this->belongsToMany(commande::class)
        ->withPivot('qte')
        ->withTimestamps();
    }
}
