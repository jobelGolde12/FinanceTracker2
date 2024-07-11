<?php

namespace App\Http\Controllers;

use App\Models\TransactionModel;
use Illuminate\Http\Request;

class TransctionController extends Controller
{
    public function saveTransactions(Request $request)
    {

        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'date' => 'required|date',
            'category' => 'required|string|max:255',
            'description' => 'required',
            'amount' => 'required',
            'type' => 'required|string|max:255|in:income,expense',
        ]);

        $transaction = TransactionModel::create($validated);

        

       if($transaction){
        return response()->json(['message' => 'Transactions saved successfully', 'transaction' => $transaction]);
       }else{
        return response()->json(['error' => 'Transactions not saved']);
       }
    }


    public function getTransactions(){
        $transaction = TransactionModel::all();
        if($transaction){
            return response()->json(['data' => $transaction], 201);
        }else{
            return response()->json(['error' => 'transaction not found'], 401);

        }   
    }
}
