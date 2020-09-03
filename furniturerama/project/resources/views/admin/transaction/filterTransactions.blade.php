@extends('layouts.admin')

@section('content')

    <div class="card-my-4">

        <div class="card-header">

            <h1 class="card-title">{{ $title }}</h1>

        </div>  

        <div class="card-body">

            <div class="mb-3">
                Filter by Transaction Status:
                <a href="/admin/transaction/filterTransactions/?transactionStatus=COMPLETE">Complete</a> |
                <a href="/admin/transaction/filterTransactions/?transactionStatus=INCOMPLETE">Incomplete</a> |
                <a href="/admin/transaction/view">Reset</a>
            </div>

            <table class="table table-striped">

                <tr>
                    <th>ID</th>
                    <th>order id</th>
                    <th>transaction Status</th>
                    <th>transaction Code</th>
                </tr>

                @foreach($transactions as $transaction)
            
                <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->order_id }}</td>
                <td>{{ $transaction->transactionStatus }}</td>
                <td>{{ $transaction->transactionCode }}</td>
            </tr>

            </tr>
 
            @endforeach
          </table>

        <div class="row justify-content-center">

              
            <!-- Pagination -->
            <div class="float-right">
              {{ $transactions->links() }}
            </div>

         
        </div>

        @stop