@extends('layouts.admin')
@section('title') Добавить запись @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить запись</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div class="raw offset-2">
        @include('inc.messages')
        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf

            <div class="form-group">
                <label for="category_id">Категория</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                           @if($category->id === old('category_id')) selected @endif>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control @if($errors->has('title')) alert-danger @endif" name="title" id="title" value="{{ old('title') }}">
                @error('title') <strong style="color: red">{{$message}}</strong>@enderror
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control @if($errors->has('author')) alert-danger @endif" name="author" id="author" value="{{ old('author') }}">
                @error('author') <strong style="color: red">{{$message}}</strong>@enderror
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" class="form-control @if($errors->has('image')) alert-danger @endif" name="image" id="image">
                @error('image') <strong style="color: red">{{$message}}</strong>@enderror
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control @if($errors->has('status')) alert-danger @endif" name="status" id="status">
                    <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
                @error('status') <strong style="color: red">{{$message}}</strong>@enderror
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control @if($errors->has('description')) alert-danger @endif" name="description" id="description">{!! old('description') !!}</textarea>
                @error('description') <strong style="color: red">{{$message}}</strong>@enderror
            </div>

            <br><br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>


@endsection
