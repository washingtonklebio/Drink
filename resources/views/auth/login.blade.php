@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@section('content')
    <div class="ui centered grid">
        <div class="fourteen wide mobile six wide tablet five wide computer column content-login">
            <div class="column form-login">
                <form action="" method="POST" action="{{ route('login') }}" autocomplete="off" class="ui large form">
                    @csrf
                    <div class="ui segment">
                        <img  class="ui centered small image logo-login" src="{{asset('images/drink.png')}}">
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="envelope icon"></i>
                                <input type="email" name="email" id="email" placeholder="Enderço de e-mail" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input placeholder="Senha" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            </div>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="field">
                            <button type="submit" class="ui fluid button btn-login">Login</button>
                        </div>
                        <div class="clear"></div>
                        <div class="field">
                            <p>Não tem cadastro? <a href="{{ route('register') }}">Registre-se</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
