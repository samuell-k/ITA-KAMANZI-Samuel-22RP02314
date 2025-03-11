<?php

namespace App\Http\Controllers;
use App\Models\Account;
use Illuminate\Http\Request;


class BankController extends Controller
{
    //
    public function index()
    {
        // Get the first account for display purposes
        $account = Account::first();  // This can be modified to select the correct account

        return view('bank.index', compact('account'));
    }

    public function deposit(Request $request, $account_id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $account = Account::findOrFail($account_id);
        $account->balance += $request->amount;
        $account->save();

        return redirect()->route('index')->with('success', 'Deposit successful!');
    }

    public function withdraw(Request $request, $account_id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $account = Account::findOrFail($account_id);

        if ($account->balance < $request->amount) {
            return redirect()->route('index')->with('error', 'Insufficient balance!');
        }

        $account->balance -= $request->amount;
        $account->save();

        return redirect()->route('index')->with('success', 'Withdrawal successful!');
    }

    public function transfer(Request $request)
    {
        $request->validate([
            'from_account_id' => 'required|exists:accounts,id',
            'to_account_id' => 'required|exists:accounts,id',
            'amount' => 'required|numeric|min:1',
        ]);

        $from_account = Account::findOrFail($request->from_account_id);
        $to_account = Account::findOrFail($request->to_account_id);

        if ($from_account->balance < $request->amount) {
            return redirect()->route('index')->with('error', 'Insufficient balance!');
        }

        $from_account->balance -= $request->amount;
        $to_account->balance += $request->amount;

        $from_account->save();
        $to_account->save();

        return redirect()->route('index')->with('success', 'Transfer successful!');
    }


   

    // Show account and transaction history
    public function showTransactions($account_id)
    {
        // Fetch the account by ID
        $account = Account::findOrFail($account_id);
    
        // Fetch the transactions related to this account
        $transactions = $account->transactions ?: collect(); // Use collect() for empty transactions
    
        // Return the view with the account and transactions
        return view('bank.transactions', compact('account', 'transactions'));
    }

}
