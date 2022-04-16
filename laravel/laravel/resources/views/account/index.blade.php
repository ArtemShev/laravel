@extends('layouts.app');
@section('content')
    <div class="row offset-2">
        <h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
        <br>
        @if (Auth::user()->is_admin)
        <a href="{{ route('admin.index') }}">На страницу админа</a>
        @endif
    </div>
@endsection
