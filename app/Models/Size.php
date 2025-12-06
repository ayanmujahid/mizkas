<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'size';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function variationBelongsToSize()
    {
        return $this->hasMany(Variation::class, 'size_id', 'id');
    }
}