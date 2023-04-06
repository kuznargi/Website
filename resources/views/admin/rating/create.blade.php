@extends('layout.admin')

@section('title', isset($rating)?'Редактировать оценку: '.$rating->id : 'Добавить оценку' )

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ isset($rating) ? route('ratings.update', $rating->id) : route('ratings.store') }}" method="POST">
                        @csrf
                        @isset($rating)
                            @method("PATCH")
                        @endisset
                        <div class="form-group">
                            <label for="film_id">Film</label>
                            <select name="film_id" id="film_id" class="form-control">
                                @foreach($films as $film)
                                    <option value="{{ $film->id }}">{{ $film->name }}</option>
                                @endforeach
                            </select>
                            <label for="user_id">User</label>
                            <select name="user_id" id="user_id" class="form-control">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->fio }}</option>
                                @endforeach
                            </select>
                            <label for="ball">Ball</label>
                            <input type="number" name="ball" value="{{isset($rating)? old('ball', $rating->ball): ''}}" id="ball" class="form-control @error('ball') is-invalid @enderror ">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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
