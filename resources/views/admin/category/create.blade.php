@extends('layout.admin')

@section('title', isset($category)?'Редактировать категорию: '.$category->name : 'Добавить категорию' )

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form
                        action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}"
                        method="POST">
                        @csrf
                        @isset($category)
                            @method("PATCH")
                        @endisset
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name"
                                   value="{{isset($category)? old('name', $category->name): ''}}" id="name"
                                   class="form-control @error('name') is-invalid @enderror ">
                            <label for="parent_id">Parent id</label>
                            <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror ">
                                <option></option>
                                @foreach($categories as $item)
                                    @if(isset($category))
                                        <option value="{{ $item->id }}" {{ $item->parent_id == $category->parent_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('name')
                            <div class="invalid-feedback">
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
