@extends('layouts.market')

@section('title', 'Редактирование товара')

@section('content')
<div class='container-sm justfify-content-center mt-2'>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @CSRF
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product Name</label>
            <input class="form-control" name="name" value="{{ $product->name }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Description</label>
            <input class="form-control" name="description" value="{{ $product->description }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
