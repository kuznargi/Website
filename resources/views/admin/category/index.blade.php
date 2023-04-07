@extends('layout.admin')

@section('title', 'Список категорий');

@section('content')
    <div class="row">
        <div class="col">
            <a href="{{route('categories.create')}}" class="btn w-25 ml-auto btn-block btn-success  btn-flat">Добавить</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Parent_id</th>
                    <th class="w-25">Удалить</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{ $category->parent_id }}</td>
                        <td>
                            <form action="{{route('categories.destroy', $category->id)}}" method="post">
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
