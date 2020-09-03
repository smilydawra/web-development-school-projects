@extends('layouts.admin')

@section('content')

<div class="card my-4">

    <div class="card-header">
        <h1 class="card-title">{{ $title }}</h1>
    </div>

<div class="card-body">

    <p><a href="/admin/promotion/view" class="btn btn-warning">&#x2B05;Back to Taxes</a></p>

     <form class="form" action="/admin/promotion/add" method="post" enctype="multipart/form-data">

            <p class="required">Red <label></label> indicates required field.</p>  

            <div class="form-group required">

                <label for="promotionCode">Promotion Code</label>
                <input id="promotionCode" class="form-control" name="promotionCode" value="{{ old('promotionCode') }}" />
                @error('promotionCode')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="promotionAmount">promotion Amount</label>
                <input id="promotionAmount" class="form-control" name="promotionAmount" value="{{ old('promotionAmount') }}" />
                @error('promotionAmount')
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