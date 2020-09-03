@extends('layouts.admin')

@section('content')

    <div class="card-my-4">

        <div class="card-header">

            <h1 class="card-title">{{ $title }}</h1>

        </div>  

        <div class="card-body">

            <p><a class="btn btn-success" href="/admin/tax/add">Add New Tax</a></p>

            <table class="table table-striped">

                <tr>
                    <th>ID</th>
                    <th>Province</th>
                    <th>GST</th>
                    <th>HST</th>
                    <th>PST</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>

                @foreach($taxes as $tax)
            
                <tr>
                <td>{{ $tax->id }}</td>
                <td>{{ $tax->province }}</td>
                <td>{{ $tax->GST }}</td>
                <td>{{ $tax->HST }}</td>
                <td>{{ $tax->PST }}</td>
                <td><a href="/admin/tax/{{$tax->id}}/edit" class="btn btn-warning btn-sm p-2"><strong>Update<strong></a></td>
                <td><form class="delete" 
                            onSubmit="return confirm('Do you really want to delete this tax?')"
                             action="/admin/tax/view" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $tax->id }}"/>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form></td>
            </tr>

            </tr>
 
            @endforeach
          </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
              {{ $taxes->links() }}
            </div>

          </div>

         
        </div>

        @stop