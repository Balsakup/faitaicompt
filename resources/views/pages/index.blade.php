@extends('layouts.default')

@section('title', 'Accueil')

@section('content')
    <div class="jumbotron">
        <h1>{{ config('app.name', 'Fai Tai Compt') }}</h1>
        <p>L'application qui te permet de faire tes comptes</p>
    </div>

    @auth
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        {!! Form::open([ 'route' => 'accounts.store' ]) !!}

                            <div class="form-group">
                                {!! Form::label('name', 'Nom du compte<span class="text-danger">*</span>', null, false) !!}
                                {!! Form::text('name', null, [ 'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '') ]) !!}

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-0">
                                <hr>
                                {!! Form::button('Créer un compte', [ 'type' => 'submit', 'class' => 'btn btn-sm btn-block btn-outline-primary' ]) !!}
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                @foreach(Auth::user()->accounts as $account)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">{{ $account->name }}</h5>
                                <span class="{{ $account->amount >= 0 ? 'text-success' : 'text-danger' }}">{{ $account->amount }}€</span>
                            </div>


                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('accounts.show', $account) }}" class="btn btn-sm btn-outline-primary">Voir le compte</a>
                                <a href="{{ route('accounts.destroy', $account) }}" class="btn btn-sm btn-outline-danger" onclick="confirm('Voulez-vous vraiment masquer ce compte ?') ? document.getElementById('accounts-destroy-{{ $account->id }}').submit() : null; return false;">Ne plus voir ce compte</a>

                                {!! Form::open([ 'route' => [ 'accounts.destroy', $account ], 'id' => 'accounts-destroy-' . $account->id, 'class' => 'd-none' ]) !!}
                                    @method('DELETE')
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endauth
@endsection
