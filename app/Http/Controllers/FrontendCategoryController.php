<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class FrontendCategoryController extends Controller
{   //culture
    public function category($slug)
    {
        $posts = Post::latest()
        
            ->where('status', true)
            ->with(['category:id,name,slug', 'user:id,name,profile'])
            ->wherehas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->orwherehas('subcategory', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->select(['id', 'user_id', 'category_id','slug', 'subcategory_id', 'title', 'featured_image', 'short_description', 'created_at'])
            ->paginate(10);
        return view('frontend.category', compact('posts'));
    }
}
