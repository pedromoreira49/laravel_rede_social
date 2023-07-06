<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('per_page');
        $productsPerPage = Product::paginate($perPage);
        $productsPerPage->appends([
            'per_page' => $perPage
        ]);
        return response()->json($productsPerPage);
    }

    public function store(CreateProductRequest $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $product = new Product($request->validated());
        $product->user_id = $user->id;
        $product->save();

        return response()->json($product, 201);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $user = Auth::user();
        
        if(!$user){
            return response()->json(['error'=> 'Unauthorized'], 401);
        }
        if($product->user_id === $user->id || $user->tokenCan('admin') || $user->tokenCan('manager')){
            $product->update($request->validated());
            return response()->json($product);
        }else{
            return response()->json(['error'=> 'You can only update your own product.'], 401);
        }
    }

    public function destroy(Product $product)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if ($product->user_id === $user->id || $user->tokenCan('admin') || $user->tokenCan('manager')) {
            $product->delete();
            return response()->json(['message' => 'Post deleted successfully.'], 204);
        } else {
            return response()->json(['error' => 'You can only delete your own product.'], 401);
        }
    }
}