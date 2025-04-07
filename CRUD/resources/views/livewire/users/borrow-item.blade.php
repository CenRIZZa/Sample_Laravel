<div class="p-6 bg-white rounded-lg shadow-lg">
    <x-form wire:submit="save2">
        <x-input label="Name" wire:model="name" />

        <x-input label="Address" wire:model="address" />
     
        <x-input label="Number" wire:model="number" omit-error hint="This is required, but we suppress the error message" />
     
        <x-slot:actions>
            <x-button label="Click me!" class="btn-primary" type="submit" spinner="save2" />
        </x-slot:actions>

        <x-select
            label="items"
            wire:model="selectedUser2"
            :options="$items"
            placeholder="Select a user"
            placeholder-value="0" {{-- Set a value for placeholder. Default is `null` --}}
        />

            <x-select 
                label="Master user" 
                wire:model="selectedUser" 
                :options="$faculty" 
                option-label="faculty_name" {{-- Specify the label key --}}
                placeholder="Select a user"
                option-value="id" {{-- Specify the value key --}}
                icon="o-user" 
            />
    </x-form>   

    <h1>{{ json_encode($faculty) }}</h1> {{-- Debugging: Display the $faculty array --}}
    
</div>