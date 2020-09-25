<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price',
        'description',
        'stock',
        'category_id'
    ];

    public function category_id(){
        return $this->belongsTo('App\Models\Category');
    }
}
