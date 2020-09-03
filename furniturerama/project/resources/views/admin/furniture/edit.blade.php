 @extends('layouts.admin')

 @section('content')

  <div class="card-my-4">

    <div class="card-header">

            <h1 class="card-title">{{ $title }}</h1>

        </div>

    <div class="card-body">
        
        <p><a href="/admin/furniture/view" class="btn btn-warning">&#x2B05;Back to Furnitures</a></p>

        <form class="form" action="/admin/furniture/view" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="{{ old('id', $furniture->id) }}" />
            
            @method('PUT')

            <p class="required">Red <label>indicates required field.</label></p>

            <div class="form-group required">

                <label for="name">Name</label>
                <input id="name" class="form-control" name="name" value="{{ old('name', $furniture->name) }}" />
                @error('name')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="price">Price</label>
                <input id="price" class="form-control" name="price" value="{{ old('price', $furniture->price) }}" />
                @error('price')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="depth">Depth</label>
                <input id="depth" class="form-control" name="depth" value="{{ old('depth',$furniture->depth) }}" />
                @error('depth')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="height">Height</label>
                <input id="height" class="form-control" name="height" value="{{ old('height',$furniture->height) }}" />
                @error('height')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="width">Width</label>
                <input id="width" class="form-control" name="width" value="{{ old('width',$furniture->width) }}" />
                @error('width')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="cost">Cost</label>
                <input id="cost" class="form-control" name="cost" value="{{ old('cost',$furniture->cost) }}" />
                @error('cost')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="description">Description</label>
                <textarea id="description" class="form-control" rows="4" name="description" value="{{old('description')}}">{{ old('description',$furniture->description) }}</textarea>
                @error('description')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="color">Color</label>
                <input id="color" class="form-control"  name="color" value="{{ old('color',$furniture->color) }}" />
                @error('color')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

             <div class="form-group">
                <label for="image">Image</label>
                @if(!empty($furniture->image))
                <img src="{{$furniture->image}}" style="width: 150px; height: auto;">
                @endif
                <input type="file" name="image"/>
                @error('image')
                    <span class="error"> {{ $message }}</span>
                @enderror
            </div>

             <div class="form-group">
                <label for="SKU">SKU</label><br />
                <input id="SKU" name="SKU" class="form-control" value="{{ old('SKU',$furniture->SKU) }}" />
                @error('SKU')
                    <span class="error"> {{ $message }}</span>
                @enderror
            </div>


            <div class="form-group">
                <label for="in_stock">In Stock</label><br />
                <input 

                    @if(old('in_stock', $furniture->in_stock) == 'In Stock') 
                        checked 
                    @endif  
                    
                    type="radio" name="in_stock" value="In Stock" />&nbsp; In Stock &nbsp;&nbsp;
                <input 

                    @if(old('in_stock', $furniture->in_stock) == 'Out of Stock') 
                        checked 
                    @endif 

                    type="radio" name="in_stock" value="Out of Stock" />&nbsp;
                Out of Stock
                @error('in_stock')
                    <span class="error"> {{ $message }}</span>
                @enderror
            </div>

                <div class="form-group">

                <label for="category_id">Category id</label><br />

                <select class="form-control" name="category_id">
                    <option value="">Select a category</option>
                    @foreach($category as $cat)
                    <option 
                        @if($cat->id == old('category_id',$furniture->category_id)) 
                            selected 
                        @endif 
                        value="{{ $cat->id }}">{{ $cat->categoryName }}
                    </option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="error"> {{ $message }}</span>
                @enderror
            </div>


                <div class="form-group">

                <label for="material_id">Material id</label><br />

                <select class="form-control" name="material_id">
                    <option value="">Select a Material</option>
                    @foreach($material as $mat)
                    <option 
                        @if($mat->id == old('material_id',$furniture->material_id)) 
                            selected 
                        @endif 
                        value="{{ $mat->id }}">{{ $mat->materialName }}
                    </option>
                    @endforeach
                </select>
                @error('material_id')
                    <span class="error"> {{ $message }}</span>
                @enderror
            </div>


                <div class="form-group">

                <label for="manufacturer_id">Manufacturer id</label><br />

                <select class="form-control" name="manufacturer_id">
                    <option value="">Select a Manufacturer</option>
                    @foreach($manufacturer as $man)
                    <option 
                        @if($man->id == old('manufacturer_id',$furniture->manufacturer_id)) 
                            selected 
                        @endif 
                        value="{{ $man->id }}">{{ $man->manufacturerName }}
                    </option>
                    @endforeach
                </select>
                @error('manufacturer_id')
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