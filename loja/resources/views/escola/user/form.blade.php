<div class="form-group row">
    <div class="col-md-12">

        @if(isset($errors) && count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error )
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')    }}
            </div>

        @endif


        {{Form::text('name',null,['class'=>"form-control", 'placeholder'=>'Nome', 'required'])}}
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group row">

    <div class="col-md-12">

        {{Form::email('email', null,['class' =>'form-control', 'placeholder' =>'E-mail', 'required'])}}
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-md-12">

        {{Form::password('password',['class' => 'form-control', 'placeholder' => 'Senha'])}}
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-md-12">

        {{Form::password('password_confirmation',['class' => 'form-control', 'placeholder' => 'Cornfirmar Senha'])}}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">

        {{Form::file('image',['class' => 'form-control', 'placeholder' => 'Nenhum arquvo selecionado'])}}
        @if ($errors->has('image'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">

        {{Form::text('token',null,['class'=>"form-control", 'placeholder'=>'Token'])}}
        @if ($errors->has('token'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('token') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group row{{ $errors->has('bibliography') ? ' is-invalid' : '' }}">
    <div class="col-md-12">

        {{Form::textarea('bibliography',null,['class'=>"form-control", 'placeholder'=>'Bibliografia'])}}
        @if ($errors->has('bibliography'))
            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bibliography') }}</strong>
                        </span>
        @endif
    </div>
</div>


