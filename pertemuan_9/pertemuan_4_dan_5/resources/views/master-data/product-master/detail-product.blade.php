<x-app-layout>
    <x-slot name="header"
        <h2 class="text-xl font-semibold leading-thight text-gray-800">
            {{__('Product Detail') }}
        </ha>
    </x-slot>
    <div class="container mx-auto p-4">
        <div class="overflow-x-auto rounded-lg bg-white p-6 shadow-md">

            <!-- Back button -->
            <a href="{{ route('product-index') }}" class="text-blue-500 hover:underline"> Back</a>

            <div class="mt-4">
                <h3 class="mb-4 text-2xl font-semibold">{{ $product->product_name }}</h3>
                <p><strong>ID:</strong> {{ $product->id }}</p>
                <p><strong>Unit:</strong> {{ $product->unit }}</p>
                <p><strong>Type:</strong> {{ $product->type }}</p>
                <p><strong>Information:</strong> {{ $product->information }}</p>
                <p><strong>Quantitiy:</strong> {{ $product->qty }}</p>
                <p><strong>producer:</strong> {{ $product->producer }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
