
@extends('layouts.header')

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body" style="background-color:#EEEFEE; border-radius: 0px; overflow: auto; border: 1px solid silver;">

<div style="width:100%; float:left">


                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row" style="color: #0B0B0B;">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus style="    background: none repeat scroll 0 0 #FBFBFB;
    border: 1px solid #B1B1B1;
    box-shadow: 1px 1px 2px rgba(200, 200, 200, 0.2) inset;
    margin: 2px 6px 3px 0px;
    outline: medium none;
    padding: 0px 0px 0px 3px;
    width: 97%;
    height: 28px;">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row" style="color: #0B0B0B;">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required style="    background: none repeat scroll 0 0 #FBFBFB;
    border: 1px solid #B1B1B1;
    box-shadow: 1px 1px 2px rgba(200, 200, 200, 0.2) inset;
    margin: 2px 6px 3px 0px;
    outline: medium none;
    padding: 0px 0px 0px 3px;
    width: 97%;
    height: 28px;">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>



</div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
