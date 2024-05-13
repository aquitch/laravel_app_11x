@extends('layouts.market')

@section('title', 'Просмотр товара')

@section('content')
    <div class="container-sm justfify-content-center mt-2">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Product</th>
                <th scope="col">Amount</th>
                <th scope="col">Control</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->cart as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->pivot->amount }}</td>
                        <td>
                            <a href="{{ route('orders.edit', $item->id) }}">
                                <button class="btn btn-warning">Edit</button>
                            </a>
                            <form action="{{ route('orders.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>     
                    </tr>
                @endforeach  
            </tbody>
        </table>
    </div>
@endsection