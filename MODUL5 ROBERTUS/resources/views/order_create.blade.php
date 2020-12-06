@extends('layouts.order')

@section('content')

<h3 class="text-center" style="margin-top: 15px;">Order</h3>

<div class="d-flex justify-content-center" style="margin-top: 30px;">
    <span class="border">
        <div class="fluid-container" style="width: 1100px">
            <div class="row no-gutters">
            <div class="col-md">
                <div class="menu-image h-100 d-flex align-items-start">
                <img src="/image/{{$product->img_path}}" class="img-fluid" alt="menu image" style="width: 600px;">
                <input type="hidden" class="form-control" name="img_path" value="{{$product->img_path}}"> 
                </div>
            </div>
        
            <div class="col-md">
                <div class="menu-text flex-grow-1 py-4 px-5">
                <h2 class="main-title text-left">{{$product->name}}</h2>
                <input type="hidden" class="form-control" name="name" value="{{$product->name}}">
                
                <div class="menu-content d-flex justify-content-between">
                    <p>{{$product->description}}</p>
                    <input type="hidden" class="form-control" name="description" value="{{$product->description}}">
                </div>
        
                <div class="menu-content d-flex justify-content-between">
                    <p>Stock : {{$product->stock}}</p>
                </div>
        
                <div class="menu-content d-flex justify-content-between">
                    <h2>${{$product->price}}</h2>
                    <input type="hidden" class="form-control" name="price" value="{{$product->price}}">
                </div>
                </div>
            </div>
            </div>
        </div>
    </span>
</div>

<div class="d-flex justify-content-center" style="margin-top: 50px;">

    <div class="card" style="margin-bottom: 50px; width: 1100px">
        <div class="card-body">
            <form action="/order" method="POST" enctype="multipart/form-data" style="width: 1000px;">
                @csrf
                {{-- @method('PUT') --}}

                <h2 style="text-align:center">Buyer Information</h2>
                <div class="from-group" >
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="buyer_name">
                    <input type="hidden" class="form-control" name="product_id" value="{{$product->id}}">
                    
                </div>

                <div class="from-group">
                    <label for="price">Contact</label>
                    <input type="text" class="form-control" id="contact" name="buyer_contact">
                </div>

                <div class="from-group mb-5" style="width: 400px">
                    <label for="stock">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="amount">
                    <input type="hidden" class="form-control" name="stock" value="{{$product->stock}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection