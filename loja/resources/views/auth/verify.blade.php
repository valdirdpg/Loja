@extends('escola.templates.template')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verifique seu endereço de e-mail') }}</div>

                    <div class="card-body">
                        @if (session('resend'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Enviamos um e-mail para o seu link de redefinição de senha!') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }}, <a
                            href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
