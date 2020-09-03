@extends('layouts.admin')

 @section('content')

  <div class="card-my-4">

    <div class="card-header">

            <h1 class="card-title">{{ $title }}</h1>

        </div>

    <div class="card-body">
        
        <p><a href="/admin/tax/view" class="btn btn-warning">&#x2B05;Back to Taxes</a></p>

        <form class="form" action="/admin/tax/view" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="{{ old('id', $tax->id) }}" />
            
            @method('PUT')

            <p class="required">Red <label>indicates required field.</label></p>

            <div class="form-group required">

                <label for="province">Province</label>
                <input id="province" class="form-control" name="province" value="{{ old('province', $tax->province) }}" />
                @error('province')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="GST">GST</label>
                <input id="GST" class="form-control" name="GST" value="{{ old('GST', $tax->GST) }}" />
                @error('GST')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="HST">HST</label>
                <input id="HST" class="form-control" name="HST" value="{{ old('HST', $tax->HST) }}" />
                @error('HST')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>
            <div class="form-group required">

                <label for="PST">PST</label>
                <input id="PST" class="form-control" name="PST" value="{{ old('PST', $tax->PST) }}" />
                @error('PST')
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