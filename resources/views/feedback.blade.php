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
          <label for="feedback">комментарий/отзыв</label>
          <textarea class="form-control" name="feedback" id="feedback">{!! old('feedback') !!}</textarea>
        </div><br>
        <button type="submit" class="btn btn-success">Добавить отзыв</button>
      </form>
    </div>

    <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Отзывы о работе проекта</h6>
    
    @forelse($feedbacks as $feedback)

    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
      
      <p class="pb-3 mb-0 small lh-sm border-bottom">
        <strong class="d-block text-gray-dark">{{ $feedback->login}}</strong>
        {{$feedback->feedback}}
      </p>
    </div>
    @empty
    "Отзывов пока нет"
    @endforelse

    <div>
      {{ $feedbacks->links()}}
    </div>



    <small class="d-block text-end mt-3">
      <a href="#">All updates</a>
    </small>
  </div>
  
  </main>
  @endsection

    

