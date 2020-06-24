@extends('layouts/public')
@section('content')
<section id="news-header">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="header-text display-5">Login</h1>
            <div class="garis"></div>
        </div>
    </div>
</section>
<section id="news-list">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="login-container">
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username"><h5 class="header-text display-5">Username atau Email</h5></label>
                            <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password"><h5 class="header-text display-5">Password</h5></label>
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-grou">
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md">
                
            </div>
        </div>
    </div>
</section>
@endsection