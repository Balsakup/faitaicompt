<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests\Accounts\StoreRequest;
use App\TransactionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if ($account = Auth::user()->accounts()->create($request->only([ 'name' ]))) {
            return redirect()->route('accounts.show', $account);
        }

        return redirect()->route('pages.index')->with('danger', 'Une erreur est survenue');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($account = Auth::user()->accounts()->find($id)) {
            return view('accounts.show', compact('account'));
        }

        return redirect()->route('pages.index')->with('danger', 'Une erreur est survenue');
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
        if (Auth::user()->accounts()->detach($id)) {
            return redirect()->route('pages.index')->with('success', 'Le compte a bien été masqué');
        }

        return redirect()->route('pages.index')->with('danger', 'Une erreur est survenue');
    }
}
