@extends('layouts.admin')

@section('content')

    <div class="card-my-4">

        <div class="card-header">

            <h1 class="card-title">{{ $title }}</h1>

        </div>  

        <div class="card-body">

            <p><a class="btn btn-success" href="/admin/material/add">Add New Material</a></p>

            <table class="table table-striped">

                <tr>
                    <th>ID</th>
                    <th>Material Name</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>

                @foreach($materials as $material)
            
                <tr>
                <td>{{ $material->id }}</td>
                <td>{{ $material->materialName }}</td>
                <td><a href="/admin/material/{{$material->id}}/edit" class="btn btn-warning btn-sm p-2"><strong>Update<strong></a></td>
                <td><form class="delete" 
                            onSubmit="return confirm('Do you really want to delete this material?')"
                             action="/admin/material/view" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $material->id }}"/>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form></td>
            </tr>

            </tr>
 
            @endforeach
          </table>

        <div class="row justify-content-center">

              
            <!-- Pagination -->
            <div class="d-flex justify-content-center">
              {{ $materials->links() }}
            </div>

         
        </div>

        @stop