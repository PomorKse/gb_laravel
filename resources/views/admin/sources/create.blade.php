@extends('layouts.admin')

@section('title') Добавить ресурс - @parent @stop

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить ресурс</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>

  <div class="table-responsive">

    @include('inc.message')

    <form method="post" action="{{ route('admin.sources.store') }}">
      @csrf
      <div class="form-group">
        <label for="domain">Ссылка на ресурс</label>
        <input type="text" class="form-control" name="domain" id="domain" value="{{ old('domain') }}">
      </div>
      @error('domain') <div style="color: #842029"> {{$message}} </div> @enderror <br>
      <button type="submit" class="btn btn-success">Добавить</button>
    </form>

  </div>
@endsection