<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a new product') }}
        </h2>
    </x-slot>


    

<div class='container-sm justfify-content-center mt-2'>
    <form action="{{ route('products.store') }}" method="POST">
        @CSRF
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product Name</label>
            <input class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Description</label>
            <input class="form-control" name="description">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</x-app-layout>
