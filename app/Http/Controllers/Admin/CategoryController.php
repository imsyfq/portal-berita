<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables()
                ->of(Category::query())
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('category.edit', $row->id);
                    $btn = "<a href=\"{$editUrl}\" class=\"edit btn btn-primary btn-sm m-1\">Edit</a>";
                    $btn .= '<button onclick="handleDelete('.$row->id.')" class="btn btn-danger btn-sm m-1">Delete</button>';

                    return $btn;
                })
                ->make(true);
        }

        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create($request->all());

        return redirect()->route('category.index')->with('message', 'Kategori ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Category::findOrFail($id);

        return view('admin.category.edit', ['category' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('message', 'Kategori diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where('id', $id)->delete();

        return redirect()->route('category.index')->with('message', 'Kategori dihapus');
    }
}
