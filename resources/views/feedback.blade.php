@extends('layouts.main')

@section('title') Обратная связь - @parent @stop

@section('content')<!doctype html>
<main class="px-3">
    <h1>Форма обратной связи</h1>
    <p class="lead">Здесь Вы можете оставить комментарий / отзыв по работе проекта</p>
    <div class="table-responsive">

      @include('inc.message')
  
      <form method="post" action="{{ route('feedback.store') }}">
        @csrf
        <div class="form-group">
          <label for="login">Имя пользователя</label>
          <input type="text" class="form-control" name="login" id="login" value="{{ old('login') }}">
        </div>
        <div class="form-group">
          <label for="comment">комментарий/отзыв</label>
          <textarea class="form-control" name="comment" id="comment">{!! old('comment') !!}</textarea>
        </div><br>
        <button type="submit" class="btn btn-success">Добавить отзыв</button>
  
      </form>
  
    </div>
  
  </main>
  @endsection

    

