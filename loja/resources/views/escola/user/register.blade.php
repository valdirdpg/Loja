@extends('escola.templates.template')

@section('content')
    {{Form::open(['url'=>'novo-usuario','class'=>'form-horizontal','files'=>true])}}
    <section class="pg-form text-center">
        <h1 class="title">Cadastrar-se</h1>
        @include('escola.user.form')

        <div class="form-group row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-form">
                    {{ __('Registrar') }}
                </button>
            </div>
        </div>
    </section>
    {{Form::close()}}

@endsection
