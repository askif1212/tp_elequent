<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    /** @use HasFactory<\Database\Factories\CommandeFactory> */
    use HasFactory;
    protected $fillable=['date','client_id'];
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function produits(){
        return $this->belongsToMany(Produit::class)
        ->withPivot('qte')
        ->withTimestamps();
    }
    public function getTotal(){
        return $this->produits->reduce(function ($tot, $item){
                        return $tot+ $item->price*$item->pivot->qte;
        },0);
    }
}
