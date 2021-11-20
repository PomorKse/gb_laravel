@extends('layouts.admin')

@section('title') Редактировать категорию - @parent @stop

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать категорию</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>

  <div class="table-responsive">

    @include('inc.message')

    <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
      @csrf
      @method('put')
      <div class="form-group">
        <label for="title">Название категории</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ $category->title }}">
      </div>
      @error('title') <div style="color: #842029"> {{$message}} </div> @enderror
      <div class="form-group">
        <label for="description">Описание</label>
        <textarea class="form-control" name="description" id="description">{!! $category->description !!}</textarea>
      </div>
      @error('description') <div style="color: #842029"> {{$message}} </div> @enderror <br>
      <button type="submit" class="btn btn-success">Редактировать</button>
    </form>
  </div>
@endsection

@push('js')
  <script>   
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
  </script>
@endpush