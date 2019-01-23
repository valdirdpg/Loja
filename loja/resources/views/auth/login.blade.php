@extends('escola.templates.template')

@section('content')
<section class="pg-form text-center">
    <h1 class="title">Entrar</h1>
                <div class="form-login">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                        <!--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>-->

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="e-mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>-->

                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Senha" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-form">
                                    {{ __('Entrar') }}
                                </button>
                            </div>
                        </div>
                        <div class="form-group row col-md-12">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Mantenha-se Conectado') }}
                                    </label>
                                </div>
                            </div>


                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu a senha?') }}
                                    </a>
                                @endif
                                @if (Route::has('register'))
                                    <a class="btn btn-link" href="{{ url('cadastrar') }}">
                                        {{ __('Cadastre-se') }}
                                    </a>
                                @endif
                        </div>


                    </form>
                </div>
</section>

@endsection
