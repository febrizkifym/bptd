@extends('layouts/public')
@section('style')
<style>
.loginbox{
        background-color:#FFF;
        border-radius:5px;
        padding:30px 20px 10px 20px;
        /* border:1px solid rgba(0,0,0,0.5); */
        box-shadow: 2px 2px 8px 0px rgba(0,0,0,0.22),-5px -5px 8px 0px rgb(255,255,255);
        margin-top:20px;
}
.title{
    font-weight: bold;
}
</style>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="loginbox">
            <span class="title">Login User</span>
            <hr>
            <form action="{{route('login')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="email">Username</label>
                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>


                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection