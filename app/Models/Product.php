<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    

public function ProductImage(){
    return $this->hasMany(ProductImage::class);
}
    protected $fillable = [
        'name',
        'price',
        'description',
        'category_id',
    ];
}
