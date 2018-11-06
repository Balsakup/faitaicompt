@extends('layouts.default')

@section('title', 'Inscription')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    {!! Form::open([ 'route' => 'users.authenticate' ]) !!}

                        <div class="form-group">
                            {!! Form::label('email', 'Adresse email<span class="text-danger">*</span>', null, false) !!}
                            {!! Form::email('email', null, [ 'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '') ]) !!}

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Mot de passe<span class="text-danger">*</span>', null, false) !!}
                            {!! Form::password('password', [ 'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '') ]) !!}

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-0">
                            <hr>
                            {!! Form::button('Se connecter', [ 'type' => 'submit', 'class' => 'btn btn-outline-primary' ]) !!}
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
