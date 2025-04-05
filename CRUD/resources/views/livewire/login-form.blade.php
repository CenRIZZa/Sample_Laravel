<div class="flex justify-center items-center min-h-screen bg-base-200">
    <div class="card w-full max-w-md bg-base-100 shadow-xl p-8">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-primary">CRUD App</h1>
        </div>
        
        <h2 class="text-xl font-semibold text-neutral text-center mb-6">Administrator Login</h2>
        
        <!-- Alert message -->
        @if($errorMessage)
        <div class="alert alert-error shadow-lg mb-4">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <span>{{ $errorMessage }}</span>
            </div>
        </div>
        @endif
        
        <!-- Login Form -->
        <form wire:submit.prevent="login" class="space-y-4">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="email" wire:model="email" placeholder="Enter your email" class="input input-bordered w-full" required />
                @error('email') <span class="text-error text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Password</span>
                </label>
                <input type="password" wire:model="password" placeholder="••••••••" class="input input-bordered w-full" required />
                @error('password') <span class="text-error text-xs">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary w-full">Sign In</button>
        </form>
        
        <div class="divider my-6">Secure Admin Access</div>
    </div>
</div>
    