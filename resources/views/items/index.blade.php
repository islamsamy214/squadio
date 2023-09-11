<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <h1 class="text-3xl font-bold">Items</h1>
                        <a href="{{ route('items.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Item</a>
                    </div>
                    <div class="mt-4">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Seller</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Price</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr class="hover:bg-gray-200">
                                        <td class="text-left py-3 px-4">{{ $item->name }}</td>
                                        <td class="text-left py-3 px-4">{{ $item->seller }}</td>
                                        <td class="text-left py-3 px-4">{{ $item->price }}</td>
                                        <td class="text-left py-3 px-4">
                                            <a href="{{ route('items.edit', $item->id) }}"
                                                class="text-gray-500 hover:text-gray-600 underline">Edit</a>
                                            <form action="{{ route('items.destroy', $item->id) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-gray-500 hover:text-gray-600 underline">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $items->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
