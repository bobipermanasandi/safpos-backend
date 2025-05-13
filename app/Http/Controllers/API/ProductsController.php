<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Resources\ProductsResource;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreProductRequest;


class ProductsController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $products = Products::orderBy('id', 'DESC')->get();

        return $this->sendResponse('Products retrieved successfully.', ProductsResource::collection($products));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request) : JsonResponse
    {
        $filename = time() . '.' . $request->images->extension();
        $request->images->storeAs('products', $filename);
        $product = Products::create([
            'name' => $request->name,
            'price' => (int) $request->price,
            'stock' => (int) $request->stock,
            'category' => $request->category,
            'description' => $request->description,
            'images' => $filename,
            'is_best_seller' => $request->is_best_seller,
        ]);

        if($product) {
            return $this->sendResponse('Products retrieved successfully.', $product, 201);
        }else {
            return $this->sendError('Create Product Failed', 'Create Product Failed', 409);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
