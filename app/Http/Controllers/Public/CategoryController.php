<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::query()
            ->with('post', fn ($q) => $q->limit(3))
            ->get();

        // make the view soon
        return view('public.category', [
            'category' => $data,
        ]);
    }
}
