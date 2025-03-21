<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;
    protected $fillable = ["name", "description"];

    public function products()
    {
        return $this->hasMany(Product::class, 'marque_id');
    }
}