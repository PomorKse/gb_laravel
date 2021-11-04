@extends('layouts.admin')

@section('title') Список категорий - @parent @stop

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Категории</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>
      </div>
    </div>
  </div>

  <div class="table-responsive">

    @include('inc.message')

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Название категории</th>
              <th scope="col">Описание</th>
              <th scope="col">Дата публикации</th>
              <th scope="col">Действия</th>
            </tr>
          </thead>
          <tbody>
          @forelse ($categoryList as $category)
            <tr>
              <td>{{ $category->id }}</td>
              <td>{{ $category->title }}</td>
              <td>{{ $category->description }}</td>
              <td>{{ now()->format('d-m-Y H:i') }}</td>
              <td>
                <a href="#{{--{{ route('admin.news.edit', ['id' => intval($news['id'])]) }}--}}">Ред.</a>
                &nbsp;|&nbsp;
                <a href="#{{--{{ route('admin.news.destroy', ['id' => intval($news['id'])]) }}--}}" style="color:red">Уд.</a></td>
            </tr>
          @empty
            "Категорий нет"
          @endforelse

          </tbody>
        </table>
  </div>
@endsection