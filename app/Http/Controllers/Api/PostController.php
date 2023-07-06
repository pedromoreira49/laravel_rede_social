<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }


    public function store(CreatePostRequest $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $post = new Post($request->validated());
        $post->user_id = $user->id;
        $post->save();

        return response()->json($post, 201);
    }

    public function show(Post $post)
    {
        return response()->json($post);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $user = Auth::user();
        
        if(!$user){
            return response()->json(['error'=> 'Unauthorized'], 401);
        }
        if($post->user_id === $user->id || $user->tokenCan('admin')){
            $post->update($request->validated());
            return response()->json($post);
        }else{
            return response()->json(['error'=> 'You can only update your own posts.'], 401);
        }
    }

    public function destroy(Post $post)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if ($post->user_id === $user->id || $user->tokenCan('admin')) {
            $post->delete();
            return response()->json(['message' => 'Post deleted successfully.'], 204);
        } else {
            return response()->json(['error' => 'You can only delete your own posts.'], 401);
        }
    }
}
