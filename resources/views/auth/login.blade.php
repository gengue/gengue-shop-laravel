@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if (session('msg'))
        <div class="alert alert-danger">
                {{ session('msg') }}
        </div>
        @endif
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('user_login') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nombre de usuario</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="user_login" value="{{ old('user_login') }}">

                                @if ($errors->has('user_login'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_login') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_pass') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="user_pass">

                                @if ($errors->has('user_pass'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_pass') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
