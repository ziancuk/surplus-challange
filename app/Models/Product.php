<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'name',
        'description',
        'enable',
    ];

    public function category() {
        return $this->belongsToMany(Category::class, 'category_products');
    }
    public function image() {
        return $this->belongsToMany(Image::class, 'product_images');
    }
}
