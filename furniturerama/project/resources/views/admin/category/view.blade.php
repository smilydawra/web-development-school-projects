@extends('layouts.admin')

@section('content')

  <div class="card-my-4">

    <div class="card-header">

            <h1 class="card-title">{{ $title }}</h1>

        </div>  

        <div class="card-body">

          <p><a class="btn btn-success" href="/admin/category/add">Add New Category</a></p>

          <table class="table table-striped">

            <tr>
              <th>ID</th>
              <th>Category Name</th>
              <th>Update</th>
              <th>Delete</th>

            </tr>

            @foreach($category as $category)
            
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->categoryName }}</td>
                <td><a href="/admin/category/{{$category->id}}/edit" class="btn btn-warning btn-sm p-2"><strong>Update<strong></a></td>
                <td><form class="delete" 
                            onSubmit="return confirm('Do you really want to delete this category?')"
                             action="/admin/category/view" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $category->id }}"/>
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