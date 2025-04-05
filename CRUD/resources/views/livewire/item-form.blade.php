<div class="flex justify-center items-center min-h-screen bg-base-200">
    <div class="card w-full max-w-4xl bg-base-100 shadow-xl p-8">
        @if ($errors->any())
            <div id="error-message" class="mb-6">
                <div class="alert alert-error">
                    <span><strong>Error!</strong> {{ $errors->first('error') }}</span>
                </div>
            </div>
        @endif

        @if (session()->has('success'))
            <div id="success-message" class="mb-6">
                <div class="alert alert-success">
                    <span><strong>Success!</strong> {{ session('success') }}</span>
                </div>
            </div>
        @endif

        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-neutral">{{ $isEditing ? 'Edit Item' : 'Create New Item' }}</h2>
            <p class="mt-2 text-lg text-gray-500">{{ $isEditing ? 'Update item details' : 'Add a new item to the inventory' }}</p>
        </div>

        <div class="card-body">
            <form wire:submit='submit' action="" method="POST" class="space-y-6"> 
                @csrf

                <div class="form-control">
                    <label class="label">Name</label>
                    <input wire:model='name' type="text" name="name" class="input input-bordered w-full" required />
                </div>

                <div class="form-control">
                    <label class="label">Description</label>
                    <textarea wire:model='description' name="description" rows="5" class="textarea textarea-bordered w-full"></textarea>
                </div>

                <div class="form-control">
                    <label class="label">Quantity</label>
                    <input wire:model='quantity' type="number" name="quantity" min="0" class="input input-bordered w-full" required />
                </div>

                <div class="form-control">
                    <label class="label">Availability Status</label>
                    <select wire:model='is_available' name="is_available" class="select select-bordered w-full">
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>
                </div>

                <div class="flex justify-end space-x-4 pt-6">
                    <a href="{{ route('crud.index') }}" class="btn btn-outline">Cancel</a>
                    <button type="submit" id="submit-btn" class="btn btn-primary flex items-center">
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
