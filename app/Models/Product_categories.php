<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_categories extends Model
{
    
    protected $table = 'product_categories';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

     public function sub_categories()
    {
        return $this->hasMany(Sub_category::class,'category_id');
    }

    public function products()
{
    return $this->hasMany(Products::class, 'category_id');
}
    
}
