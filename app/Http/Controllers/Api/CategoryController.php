<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryController extends Controller
{
    /**
     * Récupération de toutes les Categories
     *
     * @return JsonResource Renvoie une collection de Resource de Category
     */
    public function index(): JsonResource
    {
        return CategoryResource::collection(Category::all());
    }
}
