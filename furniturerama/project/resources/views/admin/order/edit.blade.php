 @extends('layouts.admin')

 @section('content')

  <div class="card-my-4">

    <div class="card-header">

            <h1 class="card-title">{{ $title }}</h1>

        </div>

    <div class="card-body">
        
        <p><a href="/admin/order/view" class="btn btn-warning">&#x2B05;Back to Order</a></p>

        <form class="form" action="/admin/order/view" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="{{ old('id', $order->id) }}" />
            
            @method('PUT')

            <p class="required">Red <label>indicates required field.</label></p>

            <div class="form-group required">

                <label for="user_id">User ID</label>
                <input id="user_id" class="form-control" name="user_id" value="{{ old('user_id', $order->user_id) }}" />
                @error('user_id')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="shippingStreet">Shipping Street</label>
                <input id="shippingStreet" class="form-control" name="shippingStreet" value="{{ old('shippingStreet', $order->shippingStreet) }}" />
                @error('shippingStreet')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="shippingProvince">Shipping Province</label>
                <input id="shippingProvince" class="form-control" name="shippingProvince" value="{{ old('shippingProvince', $order->shippingProvince) }}" />
                @error('shippingProvince')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="shippingCity">Shipping City</label>
                <input id="shippingCity" class="form-control" name="shippingCity" value="{{ old('shippingCity', $order->shippingCity) }}" />
                @error('shippingCity')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="shippingPost">Shipping Post</label>
                <input id="shippingPost" class="form-control" name="shippingPost" value="{{ old('shippingPost', $order->shippingPost) }}" />
                @error('shippingPost')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="shippingCost">Shipping Cost</label>
                <input id="shippingCost" class="form-control" name="shippingCost" value="{{ old('shippingCost', $order->shippingCost) }}" />
                @error('shippingCost')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

             <div class="form-group required">

                <label for="shippingStatus">Shipping Status</label>
                <input id="shippingStatus" class="form-control" name="shippingStatus" value="{{ old('shippingStatus', $order->shippingStatus) }}" />
                @error('shippingStatus')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

             <div class="form-group required">

                <label for="subtotal">subtotal</label>
                <input id="subtotal" class="form-control" name="subtotal" value="{{ old('subtotal', $order->subtotal) }}" />
                @error('subtotal')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

             <div class="form-group required">

                <label for="GST">GST</label>
                <input id="GST" class="form-control" name="GST" value="{{ old('GST', $order->GST) }}" />
                @error('GST')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

             <div class="form-group required">

                <label for="PST">PST</label>
                <input id="PST" class="form-control" name="PST" value="{{ old('PST', $order->PST) }}" />
                @error('PST')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

             <div class="form-group required">

                <label for="HST">HST</label>
                <input id="HST" class="form-control" name="HST" value="{{ old('HST', $order->HST) }}" />
                @error('HST')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

             <div class="form-group required">

                <label for="finalPrice">finalPrice</label>
                <input id="finalPrice" class="form-control" name="finalPrice" value="{{ old('finalPrice', $order->finalPrice) }}" />
                @error('finalPrice')
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