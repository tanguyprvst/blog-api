<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Revoie tous les articles
     * 
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        $posts = PostResource::collection(Post::all());
        return response()->json([
            'data' => $posts
        ]);
    }
}
