@extends('layout.admin')

@section('title', 'Список жанров фильмов');

@section('content')
    <div class="row">
        <div class="col">
            <a href="{{route('category_films.create')}}" class="btn w-25 ml-auto btn-block btn-success  btn-flat">Добавить</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Фильм</th>
                    <th>Жанры</th>
                    <th class="w-25">Удалить</th>
                </tr>
                </thead>
                <tr>
                @foreach($films as $film)
                    @if($film->categories->isNotEmpty())
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$film->name}}</td>
                            @foreach($film->categories as $category)
                                @if(!$loop->index+1 == 1)
                                    <td></td>
                                    <td></td>
                                @endif
                                <td>{{ $category->name }}</td>
                                <td>
                                    <form action="{{ route('category_films.destroy', $categories_films->where('category_id', $category->id)->first()->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-block btn-danger btn-flat">Удалить
                                        </button>
                                    </form>
                                </td>
                    </tr>
                    @endforeach
                    </tr>
                    @endif
                    @endforeach
                    </tbody>
            </table>
        </div>
    </div>
@endsection
