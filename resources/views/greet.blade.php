@extends('layouts.main')

@section('title') Аутентификация - @parent @stop

@section('content')<!doctype html>
<main class="px-3">
    <h1>Новостной агрегатор</h1>
    <p class="lead">Здесь Вы получите ленту новостей на основании Ваших предпочтений</p>
    <p class="lead">
      <a href="{{ route('news.index') }}" class="btn btn-lg btn-secondary fw-bold border-blue bg-blue">Смотреть все новости</a>
    </p>
  </main>
  @endsection

    

