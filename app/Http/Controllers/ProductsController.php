<?php

namespace App\Http\Controllers;

use acidjazz\metapi\MetApi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\Models\Product;

class ProductsController extends Controller
{
    use MetApi;

    /**
     * Endpoint getting the product list
     */
    public function index(Request $request)
    {
        $products = Product::all();

        return $this->render($products);
    }

    /**
     * Endpoint getting the lasted products added to the list
     */
    public function lasted(Request $request)
    {
        $products = Product::latest()->take(12)->get();

        return $this->render($products);
    }

    /**
     * Endpoint to find a specified product from ID
     */
    public function find(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();

        return $this->render($product);
    }

    /**
     * Endpoint to find a specified organization from his PIN
     */
    public function slug(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();

        return $this->render($product);
    }

    /**
     * Endpoint to destroy a product
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return $this->render([
            'success' => 'true',
            'message' => 'Product deleted'
        ]);
    }

    /**
     * Error response
     */
    public function error(): Response|JsonResponse
    {
        return $this->render(['forced_error' => $forced_error]);
    }
}
