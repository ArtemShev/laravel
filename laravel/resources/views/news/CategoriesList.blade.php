
@extends('layouts.main')
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-3 col-md-8 mx-auto">
            <h1 class="fw-light">Категории</h1>
        </div>
    </div>
@endsection
@section('content')
    @forelse($categoriesList as $category)
        <div class="list-group">
            <div class="d-flex gap-2 w-100 justify-content-between">
            <a href="{{route('news', ['category_name' => $category])}}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                <h6 class="mb-0">{{$category}}</h6>
            </a>
        </div>
        </div>

    @empty
        <h2>Категорий нет</h2>
    @endforelse
@endsection

















