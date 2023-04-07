@extends('layout.admin')

@section('title', isset($category_film)?'Редактировать жанр: '.$category_film->name : 'Добавить жанр' )

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ isset($category_film) ? route('category_films.update', $category_film->id) : route('category_films.store') }}" method="POST">
                        @csrf
                        @isset($category_film)
                            @method("PATCH")
                        @endisset
                        <div class="form-group">
                            <label for="category_id">Category id</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <label for="film_id">Film id</label>
                            <select name="film_id" class="form-control">
                                @foreach($films as $film)
                                    <option value="{{ $film->id }}">{{ $film->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary ">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
