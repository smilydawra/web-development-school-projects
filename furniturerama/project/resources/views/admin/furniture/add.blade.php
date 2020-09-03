@extends('layouts.admin')

@section('content')

<div class="card my-4">

    <div class="card-header">
        <h1 class="card-title">{{ $title }}</h1>
    </div>

<div class="card-body">

    <p><a href="/admin/furniture/view" class="btn btn-warning">&#x2B05;Back to Furnitures</a></p>

     <form class="form" action="/admin/furniture/add" method="post" enctype="multipart/form-data">

            <p class="required">Red <label></label> indicates required field.</p>  

            <div class="form-group required">

                <label for="name">Name</label>
                <input id="name" placeholder="Eg.Some Tables" class="form-control" name="name" value="{{ old('name') }}" />
                @error('name')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="price">Price</label>
                <input id="price" placeholder="Eg.100" class="form-control" name="price" value="{{ old('price') }}" />
                @error('price')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="depth">Depth</label>
                <input id="depth" placeholder="Eg.100" class="form-control" name="depth" value="{{ old('depth') }}" />
                @error('depth')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="height">Height</label>
                <input id="height" placeholder="Eg.100" class="form-control" name="height" value="{{ old('height') }}" />
                @error('height')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="width">Width</label>
                <input id="width" placeholder="Eg.100" class="form-control" name="width" value="{{ old('width') }}" />
                @error('width')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="cost">Cost</label>
                <input id="cost" placeholder="Eg.100" class="form-control" name="cost" value="{{ old('cost') }}" />
                @error('cost')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="description">Description</label>
                <textarea id="description" class="form-control" rows="4" name="description" value="{{ old('description') }}" ></textarea>
                @error('description')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="color">Color</label>
                <input id="color" placeholder="Eg.Red" class="form-control"  name="color" value="{{ old('color') }}" />
                @error('color')
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

             <div class="form-group">
                <label for="SKU">SKU</label><br />
                <input id="SKU" placeholder="Eg.XXXXXXXXXX 10 digit" name="SKU" class="form-control" value="{{ old('SKU') }}" />
                @error('SKU')
                    <span class="error"> {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="in_stock">In Stock</label><br />
                <input 

                    @if(old('in_stock') == 'In Stock') 
                        checked 
                    @endif  
                    
                    type="radio" name="in_stock" value="In Stock" />&nbsp; In Stock &nbsp;&nbsp;
                <input 

                    @if(old('in_stock') == 'Out of Stock') 
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
                        @if($cat->id == old('category_id')) 
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
                        @if($mat->id == old('material_id')) 
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
                        @if($man->id == old('manufacturer_id')) 
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
