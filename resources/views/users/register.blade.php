@extends('layouts.default')

@section('title', 'Incription')

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open([ 'route' => 'users.store' ]) !!}

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('email', 'Adresse email<span class="text-danger">*</span>', null, false) !!}
                            {!! Form::text('email', null, [ 'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '') ]) !!}

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Nom d\'affichage<span class="text-danger">*</span>', null, false) !!}
                            {!! Form::text('name', null, [ 'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '') ]) !!}

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('password', 'Mot de passe<span class="text-danger">*</span>', null, false) !!}
                            {!! Form::password('password', [ 'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '') ]) !!}

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Confirmation du mot de passe<span class="text-danger">*</span>', null, false) !!}
                            {!! Form::password('password_confirmation', [ 'class' => 'form-control' . ($errors->has('password_confirmation') ? ' is-invalid' : '') ]) !!}

                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <hr>
                    {!! Form::button('S\'inscrire', [ 'type' => 'submit', 'class' => 'btn btn-outline-success' ]) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
