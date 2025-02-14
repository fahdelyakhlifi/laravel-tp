<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price', 'description', 'discount'];

    // Calcul du prix après réduction
    public function getNewPriceAttribute()
    {
        return $this->price - ($this->price * $this->discount / 100);
    }

    // Affichage de la réduction en rouge
    public function getDiscountSpanAttribute()
    {
        return $this->discount > 0 ? "<span style='color:red;'> -{$this->discount}% </span>" : "";
    }
}