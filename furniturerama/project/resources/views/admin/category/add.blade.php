@extends('layouts.admin')

@section('content')

<div class="card my-4">

    <div class="card-header">
        <h1 class="card-title">{{ $title }}</h1>
    </div>

<div class="card-body">

    <p><a href="/admin/category/view" class="btn btn-warning">&#x2B05;Back to Categories</a></p>

     <form class="form" action="/admin/category/add" method="post" enctype="multipart/form-data">

            <p class="required">Red <label></label> indicates required field.</p>  

            <div class="form-group required">

                <label for="categoryName">Category Name</label>
                <input id="categoryName" class="form-control" name="categoryName" value="{{ old('categoryName') }}" />
                @error('name')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>


          @csrf

            <div class="form-group">

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </form>

    </div>


    
</div>


@stop
