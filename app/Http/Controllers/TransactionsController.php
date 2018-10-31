<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transactions\StoreRequest;
use App\TransactionCategory;
use App\TransactionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account_id = request()->query('account_id');
        $type       = request()->query('type');

        if ($account = Auth::user()->accounts()->find($account_id)) {
            if ($transactionType = TransactionType::where('name', $type)->first()) {
                $categories = TransactionCategory::pluck('name', 'id');
                return view('transactions.create', compact('categories'));
            }

            return redirect()->route('pages.index')->with('danger', 'Le type de transaction n\'existe pas');
        }

        return redirect()->route('pages.index')->with('danger', 'Impossible d\'ajouter une transaction à un compte qui ne vous appartient pas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $account_id = request()->query('account_id');
        $type       = request()->query('type');

        if ($account = Auth::user()->accounts()->find($account_id)) {
            if ($transactionType = TransactionType::where('name', $type)->first()) {
                $data = array_merge(
                    $request->only([ 'name', 'amount', 'paid_at', 'transaction_category_id' ]),
                    [
                        'account_id'          => $account->id,
                        'transaction_type_id' => $transactionType->id
                    ]
                );

                if ($account->transactions()->create($data)) {
                    return redirect()->route('accounts.show', $account)->with('success', 'La transaction a bien été ajoutée');
                }

                return redirect()->route('accounts.show', $account)->with('danger', 'Une erreur est survenue');
            }

            return redirect()->route('pages.index')->with('danger', 'Le type de transaction n\'existe pas');
        }

        return redirect()->route('pages.index')->with('danger', 'Impossible d\'ajouter une transaction à un compte qui ne vous appartient pas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
