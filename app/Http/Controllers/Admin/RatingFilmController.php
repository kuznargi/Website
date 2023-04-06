<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RatingFilmRequest;
use App\Models\Film;
use App\Models\Rating;
use App\Models\User;

class RatingFilmController extends Controller
{
    public function index($film_id)
    {
        $ratings = Rating::where('film_id', $film_id)->get();

        return view('admin.rating.index', compact('ratings'));
    }

    public function create()
    {
        $films = Film::all();
        $users = User::all();

        return view("admin.rating.create", compact('users', 'films'));
    }

    public function store(RatingFilmRequest $request)
    {
        $data = $request->validated();

        Rating::create($data);

        return redirect(route('ratings.index', ['film_id' => $request->film_id]));
    }

    public function destroy(Rating $rating)
    {
        $rating->delete();

        return redirect(route('ratings.index', ['film_id' => $rating->film_id]));
    }
}
