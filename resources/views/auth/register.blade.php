@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@section('content')
<div class="ui centered grid">
    <div class="fourteen wide mobile six wide tablet five wide computer column content-login">
        <div class="column form-register">
            <form action="" method="POST" action="{{ route('login') }}" autocomplete="off" class="ui large form">
                @csrf
                <div class="ui segment">
                    <img  class="ui centered small image logo-login" src="{{asset('images/drink.png')}}">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user circo icon"></i>
                            <input type="text" name="name" id="name" placeholder="Nome de usuário" class="form-control" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="envelope icon"></i>
                            <input type="email" name="email" id="email" placeholder="Enderço de e-mail" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
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
                            <input placeholder="Senha" id="password" type="password" class="form-control" name="password" required>
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input placeholder="Confirmar senha" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="field">
                        <button type="submit" class="ui fluid button btn-login">Registrar</button>
                    </div>
                    <div class="clear"></div>
                    <div class="field">
                        <p>Já é cadastrado? <a href="{{ route('login') }}">Fazer login</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
