<div class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
        <div class="flex justify-center mb-6">
            <div class="text-3xl font-bold text-blue-600">CRUD App</div>
        </div>
        
        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Administrator Login</h2>
        
        <!-- Alert message -->
        @if($errorMessage)
        <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700">{{ $errorMessage }}</p>
                </div>
            </div>
        </div>
        @endif
        
        <!-- Login Form -->
        <form wire:submit.prevent="login" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input 
                    type="email" 
                    wire:model="email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                    placeholder="Enter your email"
                    required
                />
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input 
                    type="password" 
                    wire:model="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                    placeholder="••••••••"
                    required
                />
                @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-medium py-2.5 rounded-lg transition-all duration-300 transform hover:scale-[1.01]">
                Sign In
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600">
            <div class="flex items-center justify-center">
                <span class="bg-gray-300 h-px flex-grow t-2 relative top-2"></span>
                <span class="flex-shrink mx-4 text-gray-400">Secure Admin Access</span>
                <span class="bg-gray-300 h-px flex-grow t-2 relative top-2"></span>
            </div>
        </div>
    </div>
</div>