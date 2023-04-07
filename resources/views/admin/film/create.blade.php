@extends('layout.admin')

@section('title', isset($film)?'Редактировать фильм: '.$film->name : 'Добавить фильм' )

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ isset($film) ? route('films.update', $film->id) : route('films.store') }}" method="POST">
                        @csrf
                        @isset($film)
                            @method("PATCH")
                        @endisset
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{isset($film)? old('name', $film->name): ''}}" id="name" class="form-control @error('name') is-invalid @enderror">
                            <label for="country_id">Country</label>
                            <select name="country_id" class="form-control">
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <label for="duration">Duration</label>
                            <input type="number" name="duration" value="{{ isset($film) ? old('durutaion', $film->duration) : '' }}" id="duration" class="form-control @error('duration') is-invalid @enderror">
                            <label for="year_of_issue">Year</label>
                            <input type="number" name="year_of_issue" value="{{ isset($film) ? old('year_of_issue', $film->year_of_issue) : '' }}" id="year" class="form-control @error('year') is-invalid @enderror">
                            <label for="age">Age</label>
                            <input type="number" name="age" value="{{ isset($film) ? old('age', $film->age) : '' }}" id="age" class="form-control @error('age') is-invalid @enderror">
                            <label for="link_img">Link img</label>
                            <input type="text" name="link_img" value="{{ isset($film) ? old('link_img', $film->link_img) : '' }}" id="link_img" class="form-control @error('link_img') is-invalid @enderror">
                            <label for="link_kinopoisk">Link kinopoisk</label>
                            <input type="text" name="link_kinopoisk" value="{{ isset($film) ? old('link_kinopoisk', $film->link_kinopoisk) : '' }}" id="link_kinopoisk" class="form-control @error('link_kinopoisk') is-invalid @enderror">
                            <label for="link_kinopoisk">Link video</label>
                            <input type="text" name="link_video" value="{{ isset($film) ? old('link_video', $film->link_video) : '' }}" id="link_video" class="form-control @error('link_video') is-invalid @enderror">
                            @error('name')
                            <div class="invalid-feedback  ">
                                Ошибка: {{$message}}
                            </div>
                            @enderror
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
