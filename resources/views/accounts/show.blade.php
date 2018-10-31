@extends('layouts.default')

@section('title', 'Visualisation du compte : ' . $account->name)

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-3 mb-3">
            <a href="{{ route('transactions.create', [ 'account_id' => $account->id, 'type' => 'debit' ]) }}" class="btn btn-block btn-outline-primary">Ajouter un débit</a>
        </div>
        <div class="col-sm-6 col-md-3 mb-3">
            <a href="{{ route('transactions.create', [ 'account_id' => $account->id, 'type' => 'credit' ]) }}" class="btn btn-block btn-outline-primary">Ajouter un crédit</a>
        </div>
    </div>

    @foreach ($account->transactions as $transaction)
        <div class="card mb-3" style="border-left: 5px solid #{{ substr(md5($transaction->category->name), 0, 6) }};;">
            <div class="card-body d-flex justify-content-between px-3 py-2">
                <div>
                    <h5>{{ $transaction->name }}</h5>
                </div>

                <div class="text-right">
                    <div>
                        @if ($transaction->type->name === 'debit')
                            <span class="text-danger">{{ $transaction->amount }}€</span>
                        @elseif ($transaction->type->name === 'credit')
                            <span class="text-success">{{ $transaction->amount }}€</span>
                        @endif
                    </div>

                    <small class="text-muted">{{ $transaction->paid_at->format('d/m/Y') }}</small>
                </div>
            </div>
        </div>
    @endforeach
@endsection
