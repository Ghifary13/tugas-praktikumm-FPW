<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tambah Produk Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div class="form-group">
                            <label for="products_name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                            <input type="text" id="products_name" name="products_name" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>

                        <div class="form-group">
                            <label for="unit" class="block text-sm font-medium text-gray-700">Satuan</label>
                            <select id="unit" name="unit" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                <option value="" disabled selected>Pilih satuan</option>
                                <option value="kg">Kilogram (kg)</option>
                                <option value="ltr">Liter (ltr)</option>
                                <option value="pcs">Pieces (pcs)</option>
                                <option value="box">Box</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type" class="block text-sm font-medium text-gray-700">Jenis</label>
                            <input type="text" id="type" name="type" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>

                        <div class="form-group">
                            <label for="information" class="block text-sm font-medium text-gray-700">Informasi</label>
                            <textarea id="information" name="information" rows="3" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="qty" class="block text-sm font-medium text-gray-700">Kuantitas</label>
                            <input type="number" id="qty" name="qty" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>

                        <div class="form-group">
                            <label for="producer" class="block text-sm font-medium text-gray-700">Produsen</label>
                            <input type="text" id="producer" name="producer" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>

                        <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
