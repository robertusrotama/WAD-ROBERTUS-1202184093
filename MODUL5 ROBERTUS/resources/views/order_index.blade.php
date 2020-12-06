@extends('layouts.order')

@section('content')

@if ($products->count() < 1 )
<div class="d-flex justify-content-center" style="margin-top: 200px; font-size: 20px;">
    <p>There is no data</p>
</div>
<div class="d-flex justify-content-center" style="margin-top: 5px">
    <a href="/product/create" class="btn btn-primary">Add Product</a>
</div>

@else

<h3 class="text-center" style="margin-top: 15px;">Input Product</h3>

<div class="d-flex justify-content-center" style="margin-top:15px">
    <div class="row">
        @foreach ($products as $product)
        <div class="col mb-2 ml-5">
            <div class="card shadow-sm" style="width: 300px;">
                <img src="/image/{{ $product->img_path }}" class="card-img-top" alt="pic" style="width:auto; height: 300px;">
                <div class="card-body">
                    <h4 class="card-title">{{ $product->name }}</h4>
                    <p>
                        {{ $product->description }}
                    </p>
                    <h2>{{ $product->price }}</h2>
                    <a href="/order/{{$product->id}}" class="btn btn-primary">Order Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

@endsection