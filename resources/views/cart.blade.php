@extends('layouts.market')

@section('title', 'Просмотр корзины')

@section('content')
    <div class="container-sm justfify-content-center mt-2">
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Product</th>
                    <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->cart as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>
                                <input value="{{ $item->pivot->amount }}" name="products[{{ $item->id }}][amount]">
                            </td>   
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <input hidden value="1" name="user_id">
            <input hidden value="0" name="status_id"> 
            <button type="submit" class="btn btn-primary">Оформить заказ</button>
        </form>
    </div>
@endsection