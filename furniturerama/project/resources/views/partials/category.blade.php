<ul class="text-left" style="list-style-type:none">
	@foreach($categories as $category)
		<li><a href="/furniture/category/{{ $category->categoryName }}" class="text-dark">{{ $category->categoryName }}</a></li>
	@endforeach
</ul>
