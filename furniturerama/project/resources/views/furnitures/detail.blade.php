@extends('layouts.main')

@section('content')
<div class='container bg-white'>
	<div class="row mt-5 mb-5">

		<div class="col-md-6">
			<small>
				<ul class="breadcrumb bg-white mt-2">
					<li><a href="/" class="text-dark">HOME</a> </li>&nbsp;
					<li>/ <a href="/furniture" class="text-dark">SHOP</a></li>&nbsp;
					<li class="active text-uppercase">/ {{ $furniture->name }}</li>
				</ul>
			</small>
			<img src="{{ $furniture->image }}" alt="{{ $furniture->name }}" width="550" height="550" class="img-fluid">
		</div>
		<div class="col-md-6 mt-5">
			<p><small class="text-muted">New Collection</small></p>
			<h1 class="font-weight-bold" style="font-size:2.0em;">{{ $furniture->name }}</h1>
			<h4 class="font-weight-bold text-muted">{{ $fur_cat->category['categoryName'] }}</h4>
            @if($furniture->price===$furniture->cost)
			<h4 class="font-weight-bold text-danger">${{ number_format($furniture->cost,2) }}</h4>
            @else
            <h4 class="font-weight-bold cut_price">${{ number_format($furniture->price,2) }}</h4>
            <h4 class="font-weight-bold text-danger">${{ number_format($furniture->cost,2) }}</h4>
            @endif
			<p class="text-muted">COLOR: {{ $furniture->color }}</p>

			<p class="text-muted">DIMENSIONS: {{ $furniture->height }} H x {{ $furniture->width }} W x {{ $furniture->depth }} D</p>

			<a href="/cart/{{ $furniture->id }}" class="btn btn-warning">+ ADD TO CART</a>

			<h4 class="mt-5">Description:</h4>
			<p class="text-muted">{{ $furniture->description }}</p>

            @if($furniture->in_stock == 'In Stock')
            <p class="font-weight-bold text-success">
            Available in store.
            </p>
            @else
            <p class="font-weight-bold text-danger">
            Not Available in store. <span class="font-weight-bold text-dark">This item is sold online only.</span>
            </p>
            @endif

		</div> <!--/.col -->
	</div><!--/.row -->
	<!--review-->
    <hr class="w-75" style="margin: 0 auto" />
	<div class="row mb-3">
  		<div class="card-body mx-4 mt-4">
			<h4 class="card-title">Customer Reviews</h4>
			<p></p>
		    @guest

		    <p>Please <a href="/login">login</a> or <a href="/register">register</a> to leave a review</p>

		    @endguest

		    @auth
		    <div class="card-text">
          		<form class="form mb-4" method="post" action="/reviews">
          			@csrf

	                <input type="hidden" name="furniture_id" value="{{ $furniture->id }}" />
	                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />

	                <div class="form-group">
	                    <label for="title">Title</label>
                        @error('title')
                            <div class="alert alert-danger mb-1">
                                {{ $message }}
                            </div>
                        @enderror
	                    <input class="form-control" name="title" value="{{ old('title') }}" />
	                </div>


                    <div class="form-group">
	                    <label for="comment">Review this product</label>
                        @error('comment')
                        <div class="alert alert-danger mb-1">
                            {{ $message }}
                        </div>
                        @enderror
	                    <textarea class="form-control" name="comment" rows="5" >{{ old('comment') }}</textarea>
	                </div>


                    <p class="mb-1">How many <img src="/images/rating.svg" alt="star" width="15" height="auto" class="mb-1" /> would you award?</p>
                    @error('rating')
                    <div class="alert alert-danger mb-1">
                        {{ $message }}
                    </div>
                    @enderror
	                <div class="form-check form-check-inline pl-2">
                        <input class="form-check-input" type="radio" name="rating"  value="1"
                        @if(old('rating') == 1) checked
                        @endif />
					    <label class="form-check-label" for="rating">1</label>

				    </div>
	                <div class="form-check form-check-inline">
					    <input class="form-check-input" type="radio" name="rating"  value="2"
                        @if(old('rating') == 2) checked
                        @endif />
					    <label class="form-check-label" for="rating">2</label>
				    </div>
	                <div class="form-check form-check-inline">
					    <input class="form-check-input" type="radio" name="rating" value="3"
                        @if(old('rating') == 3) checked
                        @endif />
					    <label class="form-check-label" for="rating">3</label>
				    </div>
	                <div class="form-check form-check-inline">
					    <input class="form-check-input" type="radio" name="rating" value="4"
                        @if(old('rating') == 4) checked
                        @endif />
					    <label class="form-check-label" for="rating">4</label>
				    </div>
	                <div class="form-check form-check-inline">
					    <input class="form-check-input" type="radio" name="rating" id="rating" value="5"
                        @if(old('rating') == 5) checked
                        @endif />
					    <label class="form-check-label" for="inlineRadio1">5</label>
				    </div>


                    @error('user_id')
                    <div class="alert alert-danger  my-4">
                       	{{ $message }}
                    </div>
                  	@enderror
                    @error('furniture_id')
                    <div class="alert alert-danger  my-4">
                        {{ $message }}
                    </div>
                    @enderror

	                <div class="form-group mt-4">
	                    <button type="submit" class="btn btn-success">Submit Review</button>
	                </div>
          		</form>
		    </div>
		    @endauth

		      @if(count($reviews))
		      <div class="comments">

		              @foreach($reviews as $review)

		                <div class="card bg-light mb-3">
		                    <div class="card-body">

                                @if($review->user->image ==null)
		                    	<img src="/images/smile.png" alt="{{ $review->user->userFirstName }}" width="25" height="auto" class="mb-2" />
                                @else
                                <img src="{{$review->user->image}}" alt="{{ $review->user->userFirstName }}" width="25" height="auto" class="mb-2" />
                                @endif
                                <p class="d-inline">{{ $review->user->userFirstName }}</p>
		                    	<p class="mb-0">
                                    @if($review->rating == 1)
                                    <img src="/images/rating.svg" alt="star" width="15" height="auto" class="mb-1" />
                                    @elseif($review->rating == 2)
                                    <img src="/images/rating.svg" alt="star" width="15" height="auto" class="mb-1" />
                                    <img src="/images/rating.svg" alt="star" width="15" height="auto" class="mb-1" />
                                    @elseif($review->rating == 3)
                                    <img src="/images/rating.svg" alt="star" width="15" height="auto" class="mb-1" />
                                    <img src="/images/rating.svg" alt="star" width="15" height="auto" class="mb-1" />
                                    <img src="/images/rating.svg" alt="star" width="15" height="auto" class="mb-1" />
                                    @elseif($review->rating == 4)
                                    <img src="/images/rating.svg" alt="star" width="15" height="auto" class="mb-1" />
                                    <img src="/images/rating.svg" alt="star" width="15" height="auto" class="mb-1" />
                                    <img src="/images/rating.svg" alt="star" width="15" height="auto" class="mb-1" />
                                    <img src="/images/rating.svg" alt="star" width="15" height="auto" class="mb-1" />
                                    @elseif($review->rating == 5)
                                    <img src="/images/rating.svg" alt="star" width="15" height="auto" class="mb-1" />
                                    <img src="/images/rating.svg" alt="star" width="15" height="auto" class="mb-1" />
                                    <img src="/images/rating.svg" alt="star" width="15" height="auto" class="mb-1" />
                                    <img src="/images/rating.svg" alt="star" width="15" height="auto" class="mb-1" />
                                    <img src="/images/rating.svg" alt="star" width="15" height="auto" class="mb-1" />
                                    @endif
                                    <span class="font-weight-bold">&nbsp; &nbsp;{{ $review->title }}</span></p>
		                    	<p class="mt-0 text-muted">Reviewed on {{ date('l, F j, Y ', strtotime($review->created_at))  }}</p>
		                        <p>
		                        	{{ $review->comment }}
		                        </p>

		                    </div>
		                </div>

		              @endforeach

		      </div>
		      @endif

		</div> <!--/. card body-->
	</div><!--/. row -->
    <div class='top row align-items-center mx-0 mt-3 mb-5'>
    @include('partials/sale_banner_bottom')
    </div>
</div><!--/.container -->

@endsection
