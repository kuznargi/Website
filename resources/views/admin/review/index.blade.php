@extends('layout.admin')

@section('title', 'Список отзывов');

@section('content')
    <div class="row">
        <div class="col">
            <a href="{{route('reviews.create')}}" class="btn w-25 ml-auto btn-block btn-success  btn-flat">Добавить</a>
        </div>
    </div>
    <div class="row">
    </div>
    <div class="row mt-4">
        <div class="col">
            @foreach($reviews as $review)
                <div class="col">
                    <div class="card p-4">
                        <div class="row">
                            <p class="text-bold text-lg">{{ $review->user->fio }}</p>
                        </div>
                        <div class="row">
                            <p>{{ $review->created_at->format("d.m.Y") }}
                                в {{ $review->created_at->format("H:i") }} </p>
                        </div>
                        <div class="row">
                            <p>{{ $review->message }}</p>
                        </div>
                        <div class="row {{ $review->is_approved ? 'text-success' : 'text-gray' }}">
                            <p>{{ $review->is_approved ? 'Подтвержден' : 'Ожидает проверки' }}</p>
                        </div>
                        <div class="d-flex flex-row flex-grow-1 justify-content-end">
                            <div class="m-1">
                                <form action="{{route('reviews.approved', $review->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                            class="btn btn-block btn-success btn-flat">{{ $review->is_approved == 0 ? 'Подтвердить' : 'Отменить'}}</button>
                                </form>
                            </div>
                            <div class="m-1">
                                <a href="{{ route('reviews.edit', $review->id) }}"><button type="submit" class="btn btn-block btn-primary btn-flat ">Редактировать</button></a>
                            </div>
                            <div class="m-1">
                                <form action="{{route('reviews.destroy', $review->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-block btn-danger btn-flat">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
