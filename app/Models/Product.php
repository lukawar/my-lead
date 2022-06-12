<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Filters\ProductFilter;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'short_description',
        'long_description',
        'tax',
    ];

    public function price()
    {
        return $this->hasMany('App\Models\Price', 'product_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'product_categories');
    }

    public function scopeFilter(Builder $builder, $request)
    {
        return (new ProductFilter($request))->filter($builder);
    }
}
