<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {

        $countries = Country::all();

        return view("admin.country.index", compact("countries"));
    }

    public function create()
    {
        return view("admin.country.create");
    }

    public function store(CountryRequest $request)
    {
        $data = $request->validated();

        Country::create($data);

        return redirect(route('countries.index'));
    }

    public function edit(Country $country)
    {
        return view('admin.country.create', compact('country'));
    }

    public function update(CountryRequest $request, Country $country)
    {
        $country->update($request->validated());

        return redirect(route('countries.index'));
    }

    public function destroy(Country $country)
    {
        $country->delete();

        return redirect(route('countries.index'));
    }
}
