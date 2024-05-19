<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('List of products') }}
                </h2>
            </div>
            <div>
                <a href="{{ route('products.create') }}">
                    <x-primary-button class="w-full justify-center">Make a new one?</x-primary-button>
                </a>
            </div>
    </x-slot>

    <div class="py-2">
        <div class="mb-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('products.index') }}" method="GET">
                            <div class="flex gap-3 justfify-content-center">
                            <x-text-input class="w-full" name="search"/>
                            <x-primary-button type="submit">Search</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        <div class="flex flex-wrap justify-center mb-2 mx-auto sm:px-6 lg:px-8">
            @foreach ($products as $product)
                <div class="flex-col m-1 w-80 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="text-gray-900 dark:text-gray-100">
                        <div class="p-2">
                            {{ $product->name }}
                        </div>
                        <div class="px-2 italic font-thin">
                            {{ $product->description }}
                        </div>
                    </div>
                    <div class="flex-row m-2">
                        <div class="grid grid-flow-col justify-stretch gap-2">
                            <a href="{{ route('products.show', $product->id) }}">
                                <x-primary-button class="w-full justify-center">Show</x-primary-button>
                            </a>
                            @if (auth()->user()->id == $product->user_id)
                            <a href="{{ route('products.edit', $product->id) }}">
                                <x-secondary-button class="w-full justify-center">Edit</x-secondary-button>
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-danger-button type="submit" class="w-full justify-center">Delete</x-danger-button>
                            </form>
                            @endif         
                        </div>
                        
                        <div class="mt-2">
                            @if (auth()->user()->cart->contains($product))
                                <x-green-button class="w-full justify-center" type="submit">Already in cart</x-green-button>
                            @else
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input hidden value="{{ $product->id }}" name="product_id">
                                    <x-blue-button class="w-full justify-center" type="submit">Add to cart</x-primary-button>
                                </form>
                            @endif                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
