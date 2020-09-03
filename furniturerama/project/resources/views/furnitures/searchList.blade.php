@extends('layouts.main')

@section('content')
<div class="container">
<div class="mt-4">
	<div class="row bg-danger mx-0">
		<div class="col-2">

		</div>
		<div class="col-10 p-4">
		<small class="text-light">Sign up with your Email and get</small>
		<h1 class="text-light" style="font-size:1.5em;">10% OFF FOR AN ENTIRE YEAR</h1>
		</div>
	</div>
</div>

<div class='bg-light pl-4 pr-4 mt-4'>
	<div class="row mt-1 mb-3">
		<div class="col-3">
			<div class="row mt-4">
				<small>
				<ul class="breadcrumb bg-light mt-2">
					<li><a href="/" class="text-dark">HOME</a> </li>&nbsp;
					<li>/ <a href="/furniture" class="text-dark">SHOP</a></li>&nbsp;
				</ul>
				</small>
			</div>
			<h2 class="text-muted" style="font-size:1em;">CATEGORIES</h2>
			<hr/>
			<ul class="text-left" style="list-style-type:none">
				@foreach($categories as $category)
					<li><a href="/furniture/category/{{ $category->categoryName }}" class="text-dark">{{ $category->categoryName }}</a></li>
				@endforeach
			</ul>
		</div>
		<div class="col-9 mt-1 pb-5">
			<!-- First Row -->
			<div class="row">
				<div class="col mb-3 mt-4">
					<h1 class="title text-muted" style="font-size:1.4em;">{{ $title }}</h1>
				</div>
			</div>
			<div class="row">
				@foreach($furnitures as $furniture)
				<div class="col-md-4 col-sm-6 mb-4">
						<div class="product-grid bg-white pb-3 shadow">
							@if($furniture->price===$furniture->cost)
							<button type="button" class="btn btn-success btn-sm m-3 py-0" style="cursor:default;">New</button>
							@else
							<button type="button" class="btn btn-danger btn-sm m-3 py-0" style="cursor:default;">Sale</button>
							@endif
							<div class="product-image">
								<a href="/furnitures/{{ $furniture->id }}/detail"><img src="{{ $furniture->image }}" alt="{{ $furniture->name }}" style="max-width: 100%; height:auto" class="img-fluid"></a>
							</div>
							<div class="product-content mt-3 text-center">
								<h6 class="product_h6"><a href="/furnitures/{{ $furniture->id }}/detail" class="text-dark">{{ $furniture->name }}</a></h6>
								@if($furniture->price===$furniture->cost)
								<div class="price font-weight-bold">
									<span>Buy at</span><br/>
									<span class="text-danger">${{ number_format($furniture->cost,2) }}</span>
								</div>
								@else
								<div class="price font-weight-bold">
									<span>was </span><span class="cut_price">${{ number_format($furniture->price,2) }}</span><br/>
									<span>now </span><span class="text-danger">${{ number_format($furniture->cost,2) }}</span>
								</div>
								@endif
							</div>
						</div>
						<div>
							<a href="/cart/{{ $furniture->id }}" class="text-white font-weight-bold btn btn-lg btn-block btn-sm" style="text-decoration: none; background-color: #ffba26; border: 1px solid #ffba26; font-size:1em;">Add to Cart</a>
						</div>
					</div>
				@endforeach
			</div> <!--/.row -->

			<!-- Pagination -->
			<div class="float-right">
				{{ $furnitures->links() }}
			</div>

		</div> <!--/.col -->
	</div><!--/.row -->
</div>
</div><!--/.container -->
@endsection
