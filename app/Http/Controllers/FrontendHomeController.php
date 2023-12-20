<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendHomeController extends Controller
{
    public function index()
    {
        $featured_posts = Post::latest()
            ->where('is_featured', true)
            ->where('status', true)
            ->with(['category:id,name,slug', 'user:id,name'])
            ->select(['id', 'user_id', 'category_id', 'title', 'featured_image', 'created_at'])
            ->take(3)
            ->get();

        $posts = Post::latest()
            ->where('status', true)
            ->with(['category:id,name,slug', 'user:id,name,profile'])
            ->select(['id', 'user_id', 'category_id', 'title', 'featured_image', 'short_description', 'created_at'])
            ->paginate(1);

        return view('frontend.index', compact('featured_posts', 'posts'));
    }

    public function showPost($slug)
    {
        $post = Post::where('slug', $slug)
            ->with([
                'category:id,name,slug',
                'user:id,name,profile',
                'comments'
            ])
            ->first();
        $categories = Category::withCount('posts')->latest()->take(6)->get();

        return view('frontend.post_single', compact('post', 'categories'));
    }
}





