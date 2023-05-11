@extends('layouts.admin')
@section('title') Добавить запись @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 offset-2">Добавить ресурс</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div class="raw offset-2">
        @include('inc.messages')
        <form method="post" action="{{ route('admin.resources.store') }}">
            @csrf
            <div class="form-group">
                <label for="site_url">Добавить ссылку</label>
                <input name="site_url" id="site_url" class="form-control" value="{{ old('site_url') }}">
            </div>
            <br><br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
