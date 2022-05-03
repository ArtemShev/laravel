
@extends('layouts.main')
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Новости по категории</h1>
        </div>
    </div>
@endsection
@section('content')
    @forelse($parsedNewsList as $news)
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <strong>
                    <a href=" {{ route('parsedNews.show', ['parsedNews'=>$news]) }}">
                        {{ $news->title }}
                    </a>
                </strong>
                <p class="card-text">
                    {!! $news->description !!}
                </p>

            {{ $parsedNewsList->links() }}
        </div>
    </div>
    @empty
    <h2>Новостей нет</h2>
    @endforelse
@endsection
