@extends('layouts.main')

@section('title') Аутентификация - @parent @stop

@section('content')
@include('inc.message')

  <form class="form-signin" method="post" action="">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" class="form-control" name="login" id="login" placeholder="Login" value="{{ old('login') }}">
      <label for="login">Login</label><br>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="{{ old('password') }}">
      <label for="password">Password</label><br>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
  </form>

@endsection
