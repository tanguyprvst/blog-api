<?php

namespace App\Http\Controllers\Api;

use App\DataObjects\FileDTO;
use App\DataObjects\PostDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Récupération de tous les Posts
     *
     * @return JsonResource Renvoie une collection de Resource de Post
     */
    public function index(): JsonResource
    {
        return PostResource::collection(Post::all());
    }

    /**
     * Créée un Post
     *
     * @param  PostRequest  $request Request du Post
     * @return JsonResource Renvoie une Resource du Post
     */
    public function store(PostRequest $request): JsonResource
    {
        $image = $request->validated()['image'];
        $postDTO = $this->createDTO($request);
        $post = Post::create(
            $postDTO->toArray()
        );
        $this->saveImage($post, $image);

        return new PostResource($post);
    }

    /**
     * Aficher un Post
     *
     * @param  Post  $post Model du Post
     * @return JsonResource Renvoie une Resource du Post
     */
    public function show(Post $post): JsonResource
    {
        return new PostResource($post);
    }

    /**
     * Mettre à jour un Post
     *
     * @param  PostRequest  $request Request du Post
     * @param  Post  $post Model du Post
     * @return JsonResource Renvoie une Resource du Post
     */
    public function update(PostRequest $request, Post $post): JsonResource
    {
        $image = $request->validated()['image'];
        $postDTO = $this->createDTO($request);
        $post->update(
            $postDTO->toArray()
        );
        $this->saveImage($post, $image);

        return new PostResource($post);
    }

    /**
     * Suppression d'un Post
     *
     * @param  Post  $post Model du Post
     * @return Response Renvoie un json vide
     */
    public function destroy(Post $post): Response
    {
        $post->delete();

        return response()->noContent();
    }

    /**
     * Créé le DTO du Post
     *
     * @param  PostRequest  $request Request du Post
     * @return PostDTO Renvoie DTO du Post
     */
    private function createDTO(PostRequest $request): PostDTO
    {
        $image = $request->validated()['image'];
        $file = new FileDTO($image);
        $postDTO = new PostDTO(
            $request->validated()['title'],
            $request->validated()['content'],
            $request->validated()['category_id'],
            Auth::user()->id,
            $file->getName(),
        );

        return $postDTO;
    }

    /**
     * Enregistre l'image
     *
     * @param  Post  $post Model du Post
     * @param  mixed  $image image de la request
     */
    private function saveImage(Post $post, $image)
    {
        $path = 'posts/'.$post->id.'/'.$post->image;
        Storage::disk('uploads')->put($path, File::get($image));
    }
}
