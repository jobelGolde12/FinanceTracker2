<?php

namespace App\Http\Controllers;

use App\Models\TransactionModel;
use Illuminate\Http\Request;

class TransctionController extends Controller
{
    public function saveTransactions(Request $request)
    {

        $validated = $request->validate([
            'user_id' => 'required|integer|exists:user,id',
            'date' => 'required|date',
            'category' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'type' => 'required|string|max:255|in:income,expense',
        ]);

        $transaction = TransactionModel::create($validated);
        

        return response()->json(['message' => 'Transactions saved successfully', 'transaction' => $transaction]);
    }


    public function getTransactions(Request $request){
        // $validate = $request->validate([
        //     'user_id' => 'required|integer|exists:user,id'
        // ]);

        $transaction = TransactionModel::find($request->id);
        if($transaction){
            return response()->json(['data' => $transaction], 201);
        }else{
            return response()->json(['error' => 'transaction not found'], 401);

        }
    }
}