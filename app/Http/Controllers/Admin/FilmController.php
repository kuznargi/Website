<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilmRequest;
use App\Models\Country;
use App\Models\Film;

class FilmController extends Controller
{
    public function index()
    {

        $films = Film::all();

        return view("admin.film.index", compact("films"));
    }

    public function create()
    {
        $countries = Country::all();

        return view("admin.film.create", compact('countries'));
    }

    public function store(FilmRequest $request)
    {
        $data = $request->all();

        Film::create($data);

        return redirect(route('films.index'));
    }

    public function edit(Film $film)
    {
        $countries = Country::all();

        return view('admin.film.create', compact('film', 'countries'));
    }

    public function update(FilmRequest $request, Film $film)
    {
        $film->update($request->all());

        return redirect(route('films.index'));
    }

    public function destroy(Film $film)
    {
        $film->delete();

        return redirect(route('films.index'));
    }
}
