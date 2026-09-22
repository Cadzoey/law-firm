<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::where('status', 'published')->with(['category', 'user']);

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('body', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $posts = $query->latest()->paginate(9)->withQueryString();
        $categories = Category::has('posts')->get();

        return view('posts.index', compact('posts', 'categories'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)
                    ->where('status', 'published')
                    ->with(['category', 'user', 'tags'])
                    ->firstOrFail();
                    
        $post->increment('views_count');

        $relatedPosts = Post::where('category_id', $post->category_id)
                            ->where('id', '!=', $post->id)
                            ->where('status', 'published')
                            ->latest()
                            ->take(3)
                            ->get();

        return view('posts.show', compact('post', 'relatedPosts'));
    }
}
