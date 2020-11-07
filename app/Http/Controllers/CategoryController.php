<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id', 0)->with('subcategories')->orderBy('sort_order')->get();

        return response()->json($categories, 400);
    }
}
