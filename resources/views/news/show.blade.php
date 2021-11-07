@extends('layouts.main')

@section('title') Новость - @parent @stop

@section('content')
<h1>Новость с ID{{ $news->id }} - {{ $news->title }}</h1>
<div>
  <p> Автор: {{ $news->author }}</p>
  <p>{{ $news->description }}</p>
  <p>Дата публикации: @if ($news->updated_at) {{ $news->updated_at->format('d-m-Y H:i') }} @else - @endif</p>
</div>
@endsection