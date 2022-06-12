<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'description',
        'netto_price',
        'gross_price',
        'tax',
        'condition',
    ];

    public $timestamps = false;

    public function product()
    {
        $this->hasOne('App\Models\Product', 'product_id');
    }
}
