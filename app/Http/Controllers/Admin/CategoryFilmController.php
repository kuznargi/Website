<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFilmsRequest;
use App\Models\Category;
use App\Models\CategoryFilm;
use App\Models\Film;

class CategoryFilmController extends Controller
{
    public function index() {
        $categories = Category::all();
        $categories_films = CategoryFilm::all();
        $films = Film::all();

        return view("admin.category_film.index", compact('categories', 'films', 'categories_films'));
    }

    public function create()
    {
        $categories = Category::all();
        $films = Film::all();

        return view("admin.category_film.create", compact('categories', 'films'));
    }

    public function store(CategoryFilmsRequest $request)
    {
        $data = $request->validated();

        CategoryFilm::create($data);

        return redirect(route('category_films.index'));
    }

    public function destroy(CategoryFilm $categoryFilm)
    {
        $categoryFilm->delete();

        return redirect(route('category_films.index'));
    }
}
