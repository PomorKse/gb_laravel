@extends('layouts.main')

@section('title') Новость - @parent @stop

@section('content')
<h1>Новость с ID{{ $id }}</h1>
@endsection