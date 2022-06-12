<?php

namespace App\Services;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductService
{
    public function store($data)
    {
        $product = Product::create([
            'name' => $data->name,
            'short_description' => $data->short_description,
            'long_description' => $data->long_description,
        ]);

        Price::create([
            'product_id' => $product->id,
            'tax' => $data->tax,
            'netto_price' => $data->netto_price * 100,
            'gross_price' => (($data->netto_price * 100) * ($data->tax/100)) + ($data->netto_price * 100),
            'condition' => $data->condition
        ]);

        $product->categories()->attach($data->category_id);

        return new ProductResource($product);
    }

    public function update($data)
    {
        $product = Product::find($data['id']);

        if($product){
            $product->update($data);

            return new ProductResource($product);
        } else return response()->json(['message' => 'no product'], 404);
    }

    public function index($request)
    {
        $products = Product::with(['price']);

        //simple order ...
        if(isset($request->orderDesc))
            $products->orderBy($request->orderDesc, 'DESC');

        if(isset($request->orderAsc))
            $products->orderBy($request->orderAsc, 'ASC');

        return $products;
    }
}
