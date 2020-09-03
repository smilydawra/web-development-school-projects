@extends('layouts.admin')

 @section('content')

  <div class="card-my-4">

    <div class="card-header">

            <h1 class="card-title">{{ $title }}</h1>

        </div>

    <div class="card-body">
        
        <p><a href="/admin/promotion/view" class="btn btn-warning">&#x2B05;Back to Promotions</a></p>

        <form class="form" action="/admin/promotion/view" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="{{ old('id', $promotion->id) }}" />
            
            @method('PUT')

            <p class="required">Red <label>indicates required field.</label></p>

            <div class="form-group required">

                <label for="promotionCode">promotionCode</label>
                <input id="promotionCode" class="form-control" name="promotionCode" value="{{ old('promotionCode', $promotion->promotionCode) }}" />
                @error('promotionCode')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="promotionAmount">promotionAmount</label>
                <input id="promotionAmount" class="form-control" name="promotionAmount" value="{{ old('promotionAmount', $promotion->promotionAmount) }}" />
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