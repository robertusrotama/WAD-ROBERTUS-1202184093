@extends ('layouts.product')

@section('content')
<h3 class="text-center" style="margin-top: 15px;">Input Product</h3>

<div class="d-flex justify-content-center" style="margin-top: 15px;">

<form action="/product" method="POST" enctype="multipart/form-data" style="width: 1000px">        

        <div class="from-group" >
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="from-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <div class="from-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock">
        </div>
        
        <div class="custom-file" style="margin-top: 30px; margin-bottom: 30px">
            <input type="file" class="custom-file-input" id="img_path" name="img_path">
            <label class="custom-file-label" for="customFile">Choose image</label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
