@extends('layout.admin')

@section('title', 'Список стран');

@section('content')
<div class="row">
    <div class="col">
        <a href="{{route('countries.create')}}" class="btn w-25 ml-auto btn-block btn-success  btn-flat">Добавить</a>
    </div>
</div>
<div class="row mt-4">
    <div class="col">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th class="w-25">Удалить</th>
                </tr>
            </thead>
            <tbody>
                @foreach($countries as $country)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td><a href="{{route('countries.edit', $country->id)}}">{{$country->name}}</a></td>
                    <td>
                        <form action="{{route('countries.destroy', $country->id)}}" method="post">
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
