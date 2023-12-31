<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PostMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $postId = $request->route('post');

        $post = Post::findOrFail($postId);

        if ($post->user_id !== Auth::id()) {
            return response()->json(['message' => 'Vous n\'avez pas la permission de modifier ce post.'], 403);
        }

        return $next($request);
    }
}
