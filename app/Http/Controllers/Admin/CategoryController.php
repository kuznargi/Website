<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Film;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view("admin.category.index", compact("categories"));
    }

    public function create()
    {
        $categories = Category::all();

        return view("admin.category.create", compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        Category::create($data);

        return redirect(route('categories.index'));
    }

    public function edit(Category $category)
    {
        $categories = Category::all();

        return view('admin.category.create', compact('category', 'categories'));
    }

    public function update(CategoryRequest $request, Category $category)
    {

        $category->update($request->all());

        return redirect(route('categories.index'));
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect(route('categories.index'));
    }
}
