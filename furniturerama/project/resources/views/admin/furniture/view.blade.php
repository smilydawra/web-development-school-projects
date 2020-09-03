@extends('layouts.admin')

@section('content')

  <div class="card-my-4">

    <div class="card-header">

            <h1 class="card-title">{{ $title }}</h1>

        </div>  

        <div class="card-body">

          <div class="row d-flex">

            <div class="mr-auto p-2">
                <p><a class="btn btn-success ml-2" href="/admin/furniture/add">Add New Furniture</a></p>
            </div>

            <div class="d-flex justify-content-between p-2">
                <div class="mt-2"><a href="/admin/furniture/view" class="text-decoration-none mr-2 font-weight-bold text-dark" style="font-size: 16px;">&#8635;</a></div>
                <div>
                  <form class="form-inline d-fle justify-content-end mr-2" action="/admin_search" method="get">
                      <input class="form-control form-control w-100" name="search" type="search" type="text" placeholder="Search for Name"
                             aria-label="Search">
                  </form>
                </div>
            </div>

          </div>

          <table class="table table-striped">

            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Category</th>
              <th>Cost</th>
              <th>Price</th>
              <th>SKU</th>
              <th>In Stock</th>
              <th>Update</th>
              <th>Delete</th>

            </tr>

            @foreach($furnitures as $furniture)
            
            <tr>
                <td>{{ $furniture->id }}</td>
                <td>{{ $furniture->name }}</td>
                <td>{{ $furniture->category->categoryName }}</td>
                <td>{{ $furniture->cost }}</td>
                <td>{{ $furniture->price }}</td>
                <td>{{ $furniture->SKU }}</td>
                <td>{{ $furniture->in_stock }}</td>
                <td><a href="/admin/furniture/{{$furniture->id}}/edit" class="btn btn-warning btn-sm p-2"><strong>Update<strong></a></td>
                <td><form class="delete" 
                            onSubmit="return confirm('Do you really want to delete this furniture?')"
                             action="/admin/furniture/view" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $furniture->id }}"/>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form></td>
            </tr>

            </tr>
 
            @endforeach
          </table>

          <div class="row justify-content-center">
           
            <!-- Pagination -->
            <div class="d-flex justify-content-center">
              {{ $furnitures->links() }}
            </div>

          </div>

          @stop