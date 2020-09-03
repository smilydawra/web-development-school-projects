@extends('layouts.admin')

@section('content')

    <div class="card-my-4">

        <div class="card-header">

            <h1 class="card-title">{{ $title }}</h1>

        </div>  

        <div class="card-body">

            <p><a class="btn btn-success" href="/admin/user/add">Add New User</a></p>

            <table class="table table-striped">

                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>

                @foreach($users as $user)
            
                <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->userFirstName }}</td>
                <td>{{ $user->userLastName }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td><a href="/admin/user/{{$user->id}}/edit" class="btn btn-warning btn-sm p-2"><strong>Update<strong></a></td>
                <td><form class="delete" 
                            onSubmit="return confirm('Do you really want to delete this user?')"
                             action="/admin/user/view" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $user->id }}"/>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form></td>
            </tr>

            </tr>
 
            @endforeach
          </table>

        <div class="row justify-content-center">

              
            <!-- Pagination -->
            <div class="d-flex justify-content-center">
              {{ $users->links() }}
            </div>

         
        </div>

        @stop