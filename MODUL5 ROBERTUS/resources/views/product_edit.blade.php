@extends ('layouts.product')

@section('content')
<h3 class="text-center" style="margin-top: 15px;">Update Product</h3>

<div class="d-flex justify-content-center" style="margin-top: 15px;">

<div class="d-flex justify-content-center" style="margin-top: 10px;">
    
    <form action="/product/{{ $product-> id }}" method="POST" enctype="multipart/form-data" style="width: 1000px">
        @csrf
        @method('PUT')

        <div class="from-group" >
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
        </div>

        <div class="from-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{$product->description}}</textarea>
        </div>

        <div class="from-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{$product->stock}}">
        </div>
        
        <div class="custom-file" style="margin-top: 30px; margin-bottom: 30px">
            <input type="file" class="custom-file-input" id="image" name="img_path">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
