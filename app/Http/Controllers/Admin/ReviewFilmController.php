<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewFilmRequest;
use App\Models\Film;
use App\Models\Review;
use App\Models\User;

class ReviewFilmController extends Controller
{
    public function index($film_id)
    {
        $reviews = Review::where('film_id', $film_id)->get();

        return view('admin.review.index', compact('reviews'));
    }

    public function create()
    {
        $films = Film::all();
        $users = User::all();

        return view("admin.review.create", compact('films', 'users'));
    }

    public function store(ReviewFilmRequest $request)
    {
        $data = $request->validated();

        Review::create($data);

        return redirect(route("reviews.index", ['film_id' => $request->film_id]));
    }

    public function edit(Review $review)
    {
        $films = Film::all();
        $users = User::all();

        return view('admin.review.create', compact('review', 'films', 'users'));
    }

    public function update(ReviewFilmRequest $request, Review $review)
    {
        $review->update($request->all());

        return redirect(route('reviews.index', ['film_id' => $review->film_id]));
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect(route('reviews.index', ["film_id" => $review->film_id]));
    }

    public function approved(Review $review)
    {
        if (!$review->is_approved) {
            $review->is_approved = true;
        } else {
            $review->is_approved = false;
        }
        $review->save();

        return redirect(route('reviews.index', ["film_id" => $review->film_id]));
    }
}
