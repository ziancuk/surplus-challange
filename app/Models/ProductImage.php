<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'product_id',
        'image_id',
    ];

    public function product() {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function image() {
        return $this->hasOne(Image::class, 'id', 'product_id');
    }
}
