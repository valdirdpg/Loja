@extends('escola.templates.template')

@section('content')
    <section class="pg-form text-center">
        <h1 class="title">Recuperar Senha</h1>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="email" placeholder="Endereço de E-mail" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-form">
                            {{ __('Redefinir Senha') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
