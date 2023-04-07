@extends('layout.admin')

@section('title', 'Список фильмов');

@section('content')
    <div class="row">
        <div class="col">
            <a href="{{route('films.create')}}" class="btn w-25 ml-auto btn-block btn-success  btn-flat">Добавить</a>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2">
        <div class="col mb-4">
            @foreach ($films as $film)
                <div class="card">
              
                    <div class="card-body">
                        <h5 class="card-title">Название: <a href="{{ route('films.edit', $film->id) }}">{{ $film->name }}</a></h5>

                        <p class="card-text">
                            Страна: {{ $film->country->name }}<br>
                            Продолжительность:<a href="{{ route('films.edit', $film->id) }}">{{ $film->duration }}</a><br>
                            Год выпуска:<a href="{{ route('films.edit', $film->id) }}">{{ $film->year_of_issue }}</a><br>
                            Возраст:<a href="{{ route('films.edit', $film->id) }}">{{ $film->age }}</a><br>
                            Ссылка на изображение: <a href="{{ route('films.edit', $film->id) }}">{{ isset($film->link_img) ? $film->link_img : 'd' }}</a><br>
                            Ссылка на кинопоиск: <a href="{{ route('films.edit', $film->id) }}">{{ isset($film->link_kinopoisk) ? $film->link_kinopoisk : 'Данных нет' }}</a><br>
                            Ссылка видео: <a
                                href="{{ route('films.edit', $film->id) }}">{{ isset($film->link_video) ? $film->link_video : 'Данных нет' }}</a><br>

                        </p>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="m-2">
                            <a href="{{route('films.edit', $film->id)}}" class="btn btn-outline-primary">Редактировать</a>
                        </div>
                        <div class="m-2">
                            <a href="{{route('ratings.index', ["film_id" => $film->id])}}" class="btn btn-outline-success">Оценки</a>
                        </div>
                        <div class="m-2">
                            <a href="{{ route('reviews.index', ['film_id' => $film->id]) }}" class="btn btn-outline-dark">Отзывы</a>
                        </div>
                        <div class="m-2">
                            <form action="{{route('films.destroy', $film->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Удалить</button>
                            </form>

                    </div>

                </div>
            @endforeach
        </div>

    </div>

@endsection
