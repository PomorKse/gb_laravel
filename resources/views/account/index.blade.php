@extends('layouts.app')

@section('title') Личный кабинет - @parent @stop

@section('content')
  <div class="offset-2">
    <h2 class="h2">Привет, {{ Auth::user()->name }} !</h2>
    @if (Auth::user()->is_admin)
    <br>
    <a href="{{ route('admin.index') }}">Перейти в админку</a>
    @endif
  </div>

  <div class="table-responsive">


  </div>
@endsection