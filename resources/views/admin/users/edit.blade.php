@extends('layouts.admin')

@section('title') Редактировать пользователя - @parent @stop

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать пользователя</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>

  <div class="table-responsive">

    @include('inc.message')

    <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
      @csrf
      @method('put')
      <h3 class="h3">@if ($user->name) {{ $user->name }} @endif</h3>
      <div class="form-group">
        <label for="is_admin">Статус админа</label>
        <select class="form-control" name="is_admin" id="is_admin">
          <option @if ($user->is_admin === true) selected @endif value="1">Админ</option>
          <option @if ($user->is_admin === false) selected @endif value="0">Не админ</option>
        </select>
      </div><br>
      <button type="submit" class="btn btn-success">Редактировать</button>
    </form>

  </div>
@endsection