@extends('layouts.admin')

@section('title') Список пользователей - @parent @stop

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Пользователи</h1>
  </div>

  <div class="table-responsive">

    @include('inc.message')

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Имя</th>
              <th scope="col">Email адрес</th>
              <th scope="col">Права администратора</th>
              <th scope="col">Дата создания профиля</th>
            </tr>
          </thead>
          <tbody>
         

          @forelse ($users as $user)
            <tr>
              <td>
                {{ $user->id }}
              </td>
              <td>
                {{ $user->name }}
              </td>
              <td>
                {{ $user->email }}
              </td>
              <td>
                @if ($user->is_admin) + @else - @endif
              </td>
              <td>
                {{ $user->created_at }}
              </td>
              <td>
                <a href="{{ route('admin.users.edit', ['user' => $user]) }}">Ред.</a>
              </td>
            </tr>
          @empty
            "Новостей нет"
          @endforelse

            <div>
              {{ $users->links()}}
            </div>
          
          </tbody>
        </table>
  </div>
@endsection