<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;


class TransactionsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Transaction Table';
        $transactions = Transaction::paginate(10);
        return view('/admin/transaction/view',compact('title','transactions'));
    }

    public function filterTransaction()
    {
        if(request()->has('transactionStatus')){
            $transactions = Transaction::where('transactionStatus', request('transactionStatus'))->paginate(10)->appends('transactionStatus', request('transactionStatus'));
        }else{
            $transactions = Transaction::all();
        }
        $title = 'Transaction Table';
        return view('/admin/transaction/filterTransactions',compact('title','transactions'));
    }

}