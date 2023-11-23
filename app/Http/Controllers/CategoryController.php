<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Revoie toutes les categories
     * 
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        $categories = CategoryResource::collection(Category::all());
        return response()->json([
            'data' => $categories
        ]);
    }
}
