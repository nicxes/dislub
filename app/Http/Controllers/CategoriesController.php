<?php

namespace App\Http\Controllers;

use acidjazz\metapi\MetApi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\Models\Category;

class CategoriesController extends Controller
{
    use MetApi;

    /**
     * Endpoint getting categories list
     */
    public function index(Request $request)
    {
        $categories = Category::all();

        return $this->render($categories);
    }

    /**
     * Endpoint to destroy a task
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return $this->render([
            'success' => 'true',
            'message' => 'Category deleted'
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