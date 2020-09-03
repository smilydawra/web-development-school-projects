@extends('layouts.admin')

@section('content')

    <div class="card-my-4">

        <div class="card-header">

            <h1 class="card-title">{{ $title }}</h1>

        </div>  

        <div class="card-body">

            <p><a class="btn btn-success" href="/admin/review/add">Add New Review</a></p>

            <table class="table table-striped">

                <tr>
                    <th>ID</th>
                    <th>Furniture ID</th>
                    <th>User ID</th>
                    <th>Title</th>
                    <th>Rating</th>
                    <th>Created At</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>

                @foreach($reviews as $review)
            
                <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->furniture->id }}</td>
                <td>{{ $review->user->id }}</td>
                <td>{{ $review->title }}</td>
                <td>{{ $review->rating }}</td>
                <td>{{ $review->created_at }}</td>
                <td><a href="/admin/review/{{$review->id}}/edit" class="btn btn-warning btn-sm p-2"><strong>Update<strong></a></td>
                <td><form class="delete" 
                            onSubmit="return confirm('Do you really want to delete this review?')"
                             action="/admin/review/view" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $review->id }}"/>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form></td>
            </tr>

            </tr>
 
            @endforeach
          </table>

        <div class="row justify-content-center">

              
            <!-- Pagination -->
            <div class="d-flex justify-content-center">
              {{ $reviews->links() }}
            </div>

         
        </div>

          @stop