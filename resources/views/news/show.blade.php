@extends('layouts.main')

@section('title') Новость - @parent @stop

@section('content')
<h1>Новость с ID{{ $id }} - {{ $news->title }}</h1>
<div>
  <p> Автор: {{ $news->author }}</p>
  <p>{{ $news->description }}</p>
  <p>Дата публикации: {{ now()->format('d-m-Y H:i') }}</p>
</div>
@endsection