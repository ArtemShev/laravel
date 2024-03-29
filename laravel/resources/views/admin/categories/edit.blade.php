@extends('layouts.admin')
@section('title') Редактировать категорию @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 offset-2">Редактировать категорию</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div class="raw offset-2">
        @include('inc.messages')
        <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Наименование</label>
                <input type="text" class="form-control @if($errors->has('title')) alert-danger @endif" name="title" id="title" value="{{ $category->title }}">
                @error('title') <strong style="color: red">{{$message}}</strong>@enderror
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control @if($errors->has('description')) alert-danger @endif" name="description" id="description">{!! $category->description !!}</textarea>
                @error('description') <strong style="color: red">{{$message}}</strong>@enderror
            </div>
            <br><br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>


@endsection
