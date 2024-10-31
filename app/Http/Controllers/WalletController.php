<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use App\Models\Transaction;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user(); // Mendapatkan pengguna yang sedang terautentikasi

        // Mendapatkan wallet pengguna
        $wallet = $user->wallet;

        // Mendapatkan transaksi pengguna
        $transactions = $wallet ? $wallet->transactions()->latest()->take(5)->get() : collect();
        return view('wallets.index', [
            'wallet' => $wallet,
            'transactions' => $transactions,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wallets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWalletRequest $request)
    {
        $request->validated();
        Wallet::create([
            'user_id' => auth()->id(),
            'balance' => $request->balance,
        ]);

        return redirect()->route('wallets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wallet $wallet)
    {
        return view('wallets.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWalletRequest $request, Wallet $wallet)
    {
        // Validate the request
        $validated = $request->validated();

        // Update the wallet balance
        $wallet->balance += $validated['balance'];
        $wallet->save();

        // Record the transaction
        Transaction::create([
            'wallet_id' => $wallet->id,
            'amount' => $validated['balance'],
            'type' => 'deposit',
        ]);

        return redirect()->route('wallets.index')->with('success', 'Wallet updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wallet $wallet)
    {
        //
    }
}
