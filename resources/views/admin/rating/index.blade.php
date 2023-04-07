@extends('layout.admin')

@section('title', 'Список оценок');

@section('content')
    <div class="row">
        <div class="col">
            <a href="{{route('ratings.create')}}" class="btn w-25 ml-auto btn-block btn-success  btn-flat">Добавить</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Пользователь</th>
                    <th>Оценка</th>
                    <th class="w-25">Удалить</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ratings as $rating)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{ $rating->user->fio }}</td>
                        <td>{{ $rating->ball }}</td>
                        <td>
                            <form action="{{route('ratings.destroy', $rating->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-block btn-danger btn-flat">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
