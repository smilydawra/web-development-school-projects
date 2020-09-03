@extends('layouts.admin')

@section('content')

  <div class="card-my-4">

    <div class="card-header">

            <h1 class="card-title">{{ $title }}</h1>

        </div>  

        <div class="card-body">

          <p><a class="btn btn-success" href="/admin/manufacturer/add">Add New Manufacturer</a></p>

          <table class="table table-striped">

            <tr>
              <th>ID</th>
              <th>Manufacturer Name</th>
              <th>Update</th>
              <th>Delete</th>

            </tr>

            @foreach($manufacturers as $manufacturers)
            
            <tr>
                <td>{{ $manufacturers->id }}</td>
                <td>{{ $manufacturers->manufacturerName }}</td>
                <td><a href="/admin/manufacturer/{{$manufacturers->id}}/edit" class="btn btn-warning btn-sm p-2"><strong>Update<strong></a></td>
                <td><form class="delete" 
                            onSubmit="return confirm('Do you really want to delete this furniture?')"
                             action="/admin/manufacturer/view" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $manufacturers->id }}"/>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form></td>
            </tr>

            </tr>
 
            @endforeach

          </table>

            <div class="row justify-content-center">

              
            </div>

          </div>

         
        </div>

          @stop