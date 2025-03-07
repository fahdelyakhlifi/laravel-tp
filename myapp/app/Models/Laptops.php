<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laptops extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image'];
}