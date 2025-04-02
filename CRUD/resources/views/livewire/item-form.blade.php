<div>
    <div class="max-w-4xl mx-auto"> 
        @if ($errors->any())
            <div id="error-message" class="mb-6">
                <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-md relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline ml-2">{{ $errors->first('error') }}</span>
                </div>
            </div>
        @endif

        @if (session()->has('success'))
            <div id="success-message" class="mb-6">
                <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-md relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline ml-2">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <div class="mb-8"> 
            <h2 class="text-3xl font-bold text-gray-900">{{ $isEditing ? 'Edit Item' : 'Create New Item' }}</h2> 
            <p class="mt-2 text-lg text-gray-600">{{ $isEditing ? 'Update item details' : 'Add a new item to the inventory' }}</p> 
        </div>

        <div class="bg-white rounded-lg shadow-lg p-10"> 
            <form wire:submit='submit' action="" method="POST" class="space-y-8"> 
                @csrf

                <div>
                    <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Name</label> 
                    <input wire:model='name' type="text" name="name" id="name" 
                           class="mt-1 block w-full px-5 py-4 rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg"> 
                </div>

                <div>
                    <label for="description" class="block text-lg font-medium text-gray-700 mb-2">Description</label>
                    <textarea wire:model='description' name="description" id="description" rows="5"
                              class="mt-1 block w-full px-5 py-4 rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg"></textarea>
                </div>

                <div>
                    <label for="quantity" class="block text-lg font-medium text-gray-700 mb-2">Quantity</label>
                    <input wire:model='quantity' type="number" name="quantity" id="quantity" min="0" 
                           class="mt-1 block w-full px-5 py-4 rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg">
                </div>

                <div>
                    <label for="is_available" class="block text-lg font-medium text-gray-700 mb-2">Availability Status</label>
                    <select wire:model='is_available' name="is_available" id="is_available" 
                            class="mt-1 block w-full px-5 py-4 rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg">
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>
                </div>

                <div class="flex items-center justify-end space-x-6 pt-6"> 
                    <a href="{{ route('crud.index') }}" 
                        class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-8 py-4 text-lg font-medium text-gray-700 shadow-sm hover:bg-gray-50">
                        Cancel
                    </a>
                    <button type="submit" id="submit-btn"
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <span id="btn-text">{{ $isEditing ? 'Update Item' : 'Create Item' }}</span>
                        <svg id="loading-spinner" class="hidden w-6 h-6 ml-3 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>