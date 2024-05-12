@extends('layouts.market')

@section('title', 'Все товары')

@section('content')
    <div class="container-sm justfify-content-center mt-2">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Status</th>
                <th scope="col">Comment</th>
                <th scope="col">Owner</th>
                <th scope="col">Control</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->comment }}</td>
                        <td>{{ $order->owner->name }}</td>
                        <td>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                <a href="{{ route('orders.show', $order->id) }}">
                                    <button type="button" class="btn btn-success">Show</button>
                                </a>
                                <a href="{{ route('orders.edit', $order->id) }}">
                                    <button type="button" class="btn btn-warning">Edit</button>
                                </a>
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
