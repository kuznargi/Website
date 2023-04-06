@extends('layout.admin')

@section('title', isset($user)?'Редактировать страну: '.$user->name : 'Добавить страну' )

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
                    @csrf
                    @isset($user) 
                        @method("PATCH")
                    @endisset
                    <div class="form-group">
                        <label for="name">FIO</label>
                        <input type="text" name="name" value="{{isset($user)? old('name', $user->fio): ''}}" id="name" class="form-control @error('name') is-invalid @enderror ">
                        @error('name')
                        <div class="invalid-feedback  ">
                            Ошибка: {{$message}}
                        </div>
                        @enderror
                    </div>
                   
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input type="text" name="birthday" value="{{isset($user)? old('birthday', $user->birthday): ''}}" id="birthday" class="form-control @error('birthday') is-invalid @enderror ">
                        @error('birthday')
                        <div class="invalid-feedback  ">
                            Ошибка: {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" value="{{isset($user)? old('email', $user->email): ''}}" id="email" class="form-control @error('email') is-invalid @enderror ">
                            @error('email')
                            <div class="invalid-feedback  ">
                                Ошибка: {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" value="{{isset($user)? old('email', $user->email): ''}}" id="email" class="form-control @error('email') is-invalid @enderror ">
                                @error('email')
                                <div class="invalid-feedback  ">
                                    Ошибка: {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" name="password" value="{{isset($user)? old('password', $user->email): ''}}" id="password" class="form-control @error('password') is-invalid @enderror ">
                                @error('password')
                                <div class="invalid-feedback  ">
                                    Ошибка: {{$message}}
                                </div>
                                @enderror
                            </div>
                        <button type="submit" class="btn btn-primary ">Добавить</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection