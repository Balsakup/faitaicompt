@extends('layouts.default')

@section('title', 'Ajouter une transaction')

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open([ 'route' => array_merge([ 'transactions.store' ], request()->query()) ]) !!}

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('name', 'Nom de la transaction<span class="text-danger">*</span>', null, false) !!}
                            {!! Form::text('name', null, [ 'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '') ]) !!}

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('amount', 'Montant de la transaction<span class="text-danger">*</span>', null, false) !!}
                            {!! Form::number('amount', null, [ 'class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'step' => '0.01', 'min' => 0 ]) !!}

                            @if ($errors->has('amount'))
                                <span class="invalid-feedback">{{ $errors->first('amount') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('paid_at', 'Date de la transaction<span class="text-danger">*</span>', null, false) !!}
                            {!! Form::date('paid_at', null, [ 'class' => 'form-control' . ($errors->has('paid_at') ? ' is-invalid' : '') ]) !!}

                            @if ($errors->has('paid_at'))
                                <span class="invalid-feedback">{{ $errors->first('paid_at') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('transaction_category_id', 'Catégorie de la transaction<span class="text-danger">*</span>', null, false) !!}
                            {!! Form::select('transaction_category_id', $categories, null, [ 'class' => 'form-control' . ($errors->has('transaction_category_id') ? ' is-invalid' : ''), 'step' => '0.01', 'min' => 0 ]) !!}

                            @if ($errors->has('transaction_category_id'))
                                <span class="invalid-feedback">{{ $errors->first('transaction_category_id') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <hr>
                    {!! Form::button('Ajouter', [ 'type' => 'submit', 'class' => 'btn btn-outline-success' ]) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
