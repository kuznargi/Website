@extends('layout.admin')

@section('title', 'Список пользователей');

@section('content')
<div class="row">
    <div class="col">
        <a href="{{route('users.create')}}" class="btn w-25 ml-auto btn-block btn-success  btn-flat">Добавить</a>
    </div>
</div>
    <div class="row mt-4">
        <div class="col">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>№</th>
                    <th>ФИО</th>
                    <th>День рождения</th>
                    <th>Пол</th>
                    <th>Почта</th>
                    <th class="w-25">Удалить</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$user->fio}}</a></td>
                        <td>{{ $user->birthday }}</td>
                        <td>{{ $user->gender->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{route('users.destroy', $user->id)}}" method="post">
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
