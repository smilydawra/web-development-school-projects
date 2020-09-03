@extends('layouts.admin')

@section('content')

<div class="card my-4">

    <div class="card-header">
        <h1 class="card-title">{{ $title }}</h1>
    </div>

<div class="card-body">

    <p><a href="/admin/user/view" class="btn btn-warning">&#x2B05;Back to Users</a></p>

     <form class="form" action="/admin/user/add" method="post" enctype="multipart/form-data">

            <p class="required">Red <label></label> indicates required field.</p>  

            <div class="form-group required">

                <label for="userFirstName">First Name:</label><br/>
                <input id="userFirstName" class="form-control" name="userFirstName" value="{{ old('userFirstName') }}" />
                @error('userFirstName')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="userLastName">Last Name:</label><br/>
                <input id="userLastName" class="form-control" name="userLastName" value="{{ old('userLastName') }}" />
                @error('userLastName')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="birthDate">Date of birth:</label><br/>
                <input id="birthDate" type="date" class="form-control" name="birthDate" value="{{ old('birthDate') }}" />
                @error('birthDate')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="email">Email:</label><br/>
                <input id="email" class="form-control" name="email" value="{{ old('email') }}" />
                @error('email')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="phone">Phone:</label><br/>
                <input id="phone" class="form-control" name="phone" value="{{ old('phone') }}" />
                @error('phone')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="street">Street:</label><br/>
                <input id="street" class="form-control" name="street" value="{{ old('street') }}" />
                @error('street')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="post">Post Address:</label><br/>
                <input id="post" class="form-control"  name="post" value="{{ old('post') }}" />
                @error('post')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="city">City:</label><br />
                <input id="city" name="city" class="form-control" value="{{ old('city') }}" />
                @error('city')
                    <span class="error"> {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="province">Province:</label><br />
                <input id="province" name="province" class="form-control" value="{{ old('province') }}" />
                @error('province')
                    <span class="error"> {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password:</label><br />
                <input id="password" name="password" class="form-control" value="{{ old('password') }}" />
                @error('password')
                    <span class="error"> {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="admin">Admin:</label><br />
                <input 

                    @if(old('admin') == 'True') 
                        checked 
                    @endif  
                    
                    type="radio" name="admin" value="True" />&nbsp; True &nbsp;&nbsp;
                <input 

                    @if(old('admin') == 'False') 
                        checked 
                    @endif 

                    type="radio" name="admin" value="False" />&nbsp;
                False
                @error('admin')
                    <span class="error"> {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label><br />
                <input type="file" name="image" value="{{ old('image') }}" />
                @error('image')
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
