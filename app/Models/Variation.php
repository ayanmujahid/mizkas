<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $table = 'variation';
    // public $primaryKey = 'id';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function variationBelongsToProduct()
    {
        return $this->belongsTo('App\Models\Products', 'product_id');
    }

    public function variationBelongsToSize()
    {
        return $this->belongsTo('App\Models\Size', 'size_id');
    }

    public function variationBelongsToColor()
    {
        return $this->belongsTo('App\Models\Color', 'color_id');
    }

    public function variationBelongsToFabric()
    {
        return $this->belongsTo(Fabric::class, 'fabric_id');
    }

}