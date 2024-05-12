@extends('layouts.market')

@section('title', 'Создание товара')

@section('content')
<div class='container-sm justfify-content-center mt-2'>
    <form action="{{ route('orders.store') }}" method="POST">
        @CSRF
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Comment</label>
            <input class="form-control" name="comment">
            <input hidden value="1" name="user_id">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Status</label>
            <select class="form-select" aria-label="Default select example" name="status_id">
                @foreach ($statuses as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
