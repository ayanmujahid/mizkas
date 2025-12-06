<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'color';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function variationBelongsToColor()
    {
        return $this->hasMany(Variation::class, 'color_id', 'id');
    }
}