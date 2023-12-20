<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //Index Page(Listing Page)
    public function index()
    {
        $subcategories = Subcategory::with('category')->latest()->paginate(5);
        $categories = Category::latest()->select('id', 'name')->get();
        return view('backend.category.subcategory_list', compact('categories', 'subcategories'));
    }

    //Store(Store new data)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
        ]);
        $category_slug = str($request->name)->slug();
        $slug_count = Subcategory::where('slug', 'LIKE', '%' . $category_slug . '%')->count();

        if ($slug_count > 0) {
            $category_slug .= '-' . $slug_count + 1;
        }


        $category = new Subcategory();
        $category->name = $request->name;
        $category->category_id = $request->category;
        $category->slug = $category_slug;
        $category->save();
        return back();
    }

    public function getSubcategory(Request $request)
    {
        $subcategories = Subcategory::where('category_id', $request->category)->latest()->get(['id', 'name']);
        return $subcategories;
    }
}
