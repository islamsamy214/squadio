<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-gray-900">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('items.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col">
                            <label for="name" class="text-lg">Name</label>
                            <input type="text" name="name" id="name" value="{{ $item->name }}"
                                class="border-gray-300 border-2 rounded-lg p-2 mt-2">
                        </div>
                        <div class="flex flex-col mt-4">
                            <label for="seller" class="text-lg">Seller</label>
                            <input type="text" name="seller" id="seller" value="{{ $item->seller }}"
                                class="border-gray-300 border-2 rounded-lg p-2 mt-2">
                        </div>
                        <div class="flex flex-col mt-4">
                            <label for="price" class="text-lg">Price</label>
                            <input type="text" name="price" id="price" value="{{ $item->price }}"
                                class="border-gray-300 border-2 rounded-lg p-2 mt-2">
                        </div>
                </div>
                <div class="flex justify-end mt-4">
                    <a href="{{ route('items.index') }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-4">Update
                        Item</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>