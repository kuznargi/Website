@extends('layout.admin')

@section('title', isset($country)?'Редактировать страну: '.$country->name : 'Добавить страну' )

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{ isset($country) ? route('countries.update', $country->id) : route('countries.store') }}" method="POST">
                    @csrf
                    @isset($country) 
                        @method("PATCH")
                    @endisset
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{isset($country)? old('name', $country->name): ''}}" id="name" class="form-control @error('name') is-invalid @enderror ">
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