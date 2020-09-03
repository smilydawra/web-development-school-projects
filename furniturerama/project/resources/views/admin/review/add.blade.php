@extends('layouts.admin')

@section('content')

<div class="card my-4">

    <div class="card-header">
        <h1 class="card-title">{{ $title }}</h1>
    </div>

<div class="card-body">

    <p><a href="/admin/review/view" class="btn btn-warning">&#x2B05;Back to Reviews</a></p>

     <form class="form" action="/admin/review/add" method="post" enctype="multipart/form-data">

            <p class="required">Red <label></label> indicates required field.</p>  

            <div class="form-group required">

                <label for="user_id">User ID</label>
                <input id="user_id" class="form-control" name="user_id" value="{{ old('user_id') }}" />
                @error('user_id')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="furniture_id">Furniture ID</label>
                <input id="furniture_id" class="form-control" name="furniture_id" value="{{ old('furniture_id') }}" />
                @error('furniture_id')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="title">Title</label>
                <input id="title" class="form-control" name="title" value="{{ old('title') }}" />
                @error('title')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="rating">Rating</label>
                <input id="rating" class="form-control" name="rating" value="{{ old('rating') }}" />
                @error('rating')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="comment">Comment</label>
                <textarea id="comment" class="form-control" rows="4" name="comment" value="{{ old('comment') }}" ></textarea>
                @error('comment')
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