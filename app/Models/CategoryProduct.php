<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'product_id',
        'category_id',
    ];

    public function product() {
        return $this->belongsToMany(Product::class, 'id', 'product_id');
    }
    public function category() {
        return $this->belongsToMany(Category::class, 'id', 'category_id');
    }
}
