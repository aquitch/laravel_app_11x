@extends('layouts.market')

@section('title', 'Редактирование товара')

@section('content')
<div class='container-sm justfify-content-center mt-2'>
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @CSRF
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Comment</label>
            <input class="form-control" name="comment" value="{{ $order->comment }}">
            <input hidden value="1" name="user_id">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Status</label>
            <select class="form-select" aria-label="Default select example" name="status_id">
                @foreach ($statuses as $key => $value)
                    <option {{ $key == $order->status_id ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

<?php
/*
if(условие){
    делайте 1
} 
else {
    делайте 2
}

(условие) ? (делайте 1) : (делайте 2)
*/
?>