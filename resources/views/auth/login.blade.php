@extends('layouts.app')

@section('content')

<div style=" width: 100%;
             height: 100%;
             background: #f2f3f5;
             padding:139px;"
             >
    <div class="modal-dialog login-form">
        <div class="modal-content">
          <div class="modal-heading">
              <h2 class="text-center text-uppercase "style="color:#337ab7;">sign in</h2>
          </div>
          <hr/>
          <div class="modal-body " >
                    <form class="form-horizontal pad" role="form" method="POST" id="myform" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-user"></span>
                                    </span>
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email or Username" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                        </div>
                        <div class="form-group text-center">
                           <!-- <button type="submit" class="btn btn-primary " name="login" id="login">Login</button>
                         -->
                         <button type="submit" class="btn btn-primary " name="login" id="login">login</button>
                        </div>
                    </form>
          </div>
        </div>
    </div>
</div>

@endsection
