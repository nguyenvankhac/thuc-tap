@extends('layout.auth')
@section('title,Quản Trị')
@section('main')
<p class="login-box-msg">Sign in to start your session</p>

<form class="form-horizontal" method="POST">
{{csrf_field()}}
@error('email')
    <small>{{$message}}</small>
 @enderror
  <div class="input-group mb-3">
    <input type="email" class="form-control" placeholder="email" name="email">
  
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-envelope"></span>
      </div>
    </div>
  </div>
  @error('password')
    <small>{{$message}}</small>
    @enderror
  <div class="input-group mb-3">
    <input type="password" class="form-control" placeholder="password" name="password">

    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-lock"></span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-8">
      <div class="icheck-primary">
        <input type="checkbox" id="remember" name="remember">
        <label for="remember">
          Remember Me
        </label>
      </div>
    </div>
    <!-- /.col -->
    <div class="col-4">
      <button type="submit" class="btn btn-primary btn-block">Sign In</button>
    </div>
    <!-- /.col -->
  </div>
</form>
<p class="mb-1">
  <a href="forgot-password.html">I forgot my password</a>
</p>

@stop()