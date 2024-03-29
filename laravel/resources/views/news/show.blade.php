

@extends('layouts.main')
@section('header')
@section('content')
<div class="col">
	<div class="card shadow-sm">
		<img src="{{ $news->image }}">

	  <div class="card-body">
		 <strong>
			 <a href=" {{ route('news.show', ['category_id'=> $news['category_id'],'id' => $news['id']]) }}">
				 {{ $news->title }}
			 </a>
		 </strong>
		 <p class="card-text">
			 {!! $news->description !!}
		 </p>
		 <div class="d-flex justify-content-between align-items-center">
		   <div class="btn-group">
			   <a href=" {{ route('news.show', ['category_id'=> $news['category_id'], 'id' => $news['id']]) }}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
		   </div>
			 <small class="text-muted">Статус: <em>{{ $news->status }}</em></small>
			 <small class="text-muted">Автор: <em> {{ $news->author }}</em></small>
	   </div>
   </div>
</div>
</div>
@endsection
