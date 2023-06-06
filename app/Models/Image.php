<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'name',
        'file',
        'enable',
    ];

    public function product() {
        return $this->belongsToMany(Product::class, 'product_image');
    }
}
