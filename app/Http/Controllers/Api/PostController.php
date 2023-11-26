<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\DataObjects\FileDTO;
use App\DataObjects\PostDTO;
use Illuminate\Http\Response;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResource
    {
        return PostResource::collection(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request): JsonResource
    {
        dd(Auth::user());
        $file = new FileDTO($request->validated()['image']);
        $postDTO = new PostDTO(
            $request->validated()['title'],
            $request->validated()['content'],
            $request->validated()['category_id'],
            Auth::user()->id,
            $file->getName(),
        );
        $post = Post::create(
            $postDTO->toArray()
        );
        $imagePath =Storage::disk('uploads')->put('posts/' + $post->id + "/" + $post->image, $file);
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): JsonResource
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post): JsonResource
    {
        $post->update($request->validated());

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): Response
    {
        $post->delete();

        return response()->noContent();
    }
}
