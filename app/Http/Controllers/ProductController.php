<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductAddRequest;
use App\Http\Requests\Product\ProductDelRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Product
 *
 * APIs for managing products
 */
class ProductController extends Controller
{
    /**
     * list products
     *
     * @return ProductCollection
     * @urlParam orderDesc string order by col name
     * @urlParam orderAsc string order by col name
     * @responseFile responses/product_list.json
     */
    public function index(Request $request, ProductService $product) :ProductCollection
    {
        $products = $product->index($request);
        return new ProductCollection($products->paginate());
    }

    /**
     * Add new product
     *
     * @param ProductAddRequest $request
     * @param Product $product
     * @return ProductResource
     * @responseFile responses/product_add.json
     */
    public function add(ProductAddRequest $request, ProductService $product)
    {
        return $product->store((object)$request->validated());
    }

    /**
     * Update product
     *
     * @param ProductUpdateRequest $request
     * @param Product $product
     * @return ProductResource
     * @responseFile responses/product_add.json
     */
    public function update(ProductUpdateRequest $request, ProductService $product)
    {
        return $product->update($request->validated());
    }

    /**
     * Delete product
     *
     * @param ProductDelRequest $request
     * @param Product $product
     * @return ProductResource
     * @response {"message": "product deleted"}
     */
    public function delete(ProductDelRequest $request) :response
    {
        $data = $request->validated();

        $product = Product::find($data['product_id']);

        if($product) {
            $product->delete();
            return response()->json(['message' => 'product deleted'], 200);
        } else return response()->json(['message' => 'no product'], 404);
    }
}
