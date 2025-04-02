<div>
    <div class="max-w-full mx-auto">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Available Items</h2>
                <p class="mt-2 text-gray-600">Manage your inventory items</p>
            </div>

        </div>
        
        @if (session('success'))
        <div id="success-message" class="mb-6 transition-opacity duration-500 ease-in-out opacity-100">
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-md relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline ml-2">{{ session('success') }}</span>
            </div>
        </div>
        @endif

        @if ($message)
        <div id="message" class="mb-6">
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-6 py-4 rounded-md relative" role="alert">
                <strong class="font-bold">Info:</strong>
                <span class="block sm:inline ml-2">{{ $message }}</span>
            </div>
        </div>
        @endif

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-8 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-8 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Description</th>
                            <th scope="col" class="px-8 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Quantity</th>
                            <th scope="col" class="px-8 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-8 py-4 text-right text-sm font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($items as $item)
                        <tr wire:key = '{{$item->id}}' wire:transition class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-8 py-5 whitespace-nowrap text-base font-medium text-gray-900">
                                {{ $item->name }}
                            </td>
                            <td class="px-8 py-5 text-base text-gray-500">
                                {{ $item->description }}
                            </td>
                            <td class="px-8 py-5 whitespace-nowrap text-base text-gray-500">
                                {{ $item->quantity }}
                            </td>
                            <td class="px-8 py-5 whitespace-nowrap">
                                <span class="px-4 py-2 inline-flex text-sm leading-5 font-semibold rounded-full 
                                    {{ $item->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $item->is_available ? 'Available' : 'Not Available' }}
                                </span>
                            </td>
                            <td class="px-8 py-5 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-3">
                                    <a href="{{ route('crud.edit', $item->id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md">
                                        Edit
                                    </a>
                                    <button wire:click="delete({{ $item->id }})" 
                                        wire:confirm="Are you sure you want to delete this item?"
                                        class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-md">
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
