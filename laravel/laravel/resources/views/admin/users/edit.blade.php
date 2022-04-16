@extends('layouts.admin')
@section('title') Редактировать  пользователя @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 offset-2">Редактировать пользователя - {{ $user->id }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div class="raw offset-2">
        @include('inc.messages')
        <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
            @csrf
            @method('put')
            {{-- <div class="form-group">
                <label for="name">имя</label>
                <input type="text" class="form-control @if($errors->has('name')) alert-danger @endif" name="name" id="name" value="{{ $user->name }}">
                @error('name') <strong style="color: red">{{$message}}</strong>@enderror
            </div>
            <div class="form-group">
                <label for="email">почта</label>
                <input type="email" class="form-control @if($errors->has('email')) alert-danger @endif" name="email" id="email" value="{{ $user->email }}">
                @error('email') <strong style="color: red">{{$message}}</strong>@enderror
            </div> --}}
            <div class="form-group">
                <label for="is_admin">Админ</label>
                <input type="text" class="form-control @if($errors->has('is_admin')) alert-danger @endif" name="is_admin" id="is_admin" value="{{ $user->is_admin }}">
                @error('is_admin') <strong style="color: red">{{$message}}</strong>@enderror
            </div>

            <br><br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>


@endsection
