@extends('layouts.admin')

@section('content')

    <div class="card-my-4">

        <div class="card-header">

            <h1 class="card-title">{{ $title }}</h1>

        </div>  

        <div class="card-body">

            <p><a class="btn btn-success" href="/admin/promotion/add">Add New Promotion</a></p>

            <table class="table table-striped">

                <tr>
                    <th>ID</th>
                    <th>promotion Code</th>
                    <th>promotion Amount</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>

                @foreach($promotions as $promotion)
            
                <tr>
                <td>{{ $promotion->id }}</td>
                <td>{{ $promotion->promotionCode }}</td>
                <td>{{ $promotion->promotionAmount }}</td>
                <td><a href="/admin/promotion/{{$promotion->id}}/edit" class="btn btn-warning btn-sm p-2"><strong>Update<strong></a></td>
                <td><form class="delete" 
                            onSubmit="return confirm('Do you really want to delete this promotion?')"
                             action="/admin/promotion/view" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $promotion->id }}"/>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form></td>
            </tr>

            </tr>
 
            @endforeach
          </table>

        <div class="row justify-content-center">

              
            <!-- Pagination -->
            <div class="d-flex justify-content-center">
              {{ $promotions->links() }}
            </div>

         
        </div>

        @stop