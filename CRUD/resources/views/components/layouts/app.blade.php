<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page Title' }}</title>
        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 min-h-screen font-sans flex flex-col">
        <!-- Navigation bar -->
        <nav class="bg-white shadow-lg border-b">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex justify-between items-center h-20">
                    <div class="font-bold text-2xl text-indigo-600">CRUD Application</div>
                    <div class="flex space-x-6">
                        <a href="/form" class="{{ request()->is('form*') ? 'px-6 py-3 bg-indigo-700 text-white rounded-md transition duration-300 ease-in-out flex items-center border-b-2 border-indigo-900 shadow-sm text-lg' : 'px-6 py-3 bg-gray-200 text-gray-800 rounded-md hover:bg-indigo-600 hover:text-white transition duration-300 ease-in-out flex items-center text-lg' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Item
                        </a>
                        <a href="/fetch" class="{{ request()->is('fetch*') ? 'px-6 py-3 bg-indigo-700 text-white rounded-md transition duration-300 ease-in-out flex items-center border-b-2 border-indigo-900 shadow-sm text-lg' : 'px-6 py-3 bg-gray-200 text-gray-800 rounded-md hover:bg-indigo-600 hover:text-white transition duration-300 ease-in-out flex items-center text-lg' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            View Items
                        </a>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="px-6 py-3 bg-gray-200 text-gray-800 rounded-md hover:bg-red-600 hover:text-white transition duration-300 ease-in-out flex items-center text-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- Main content -->
        <main class="max-w-7xl mx-auto px-6 py-10 w-full flex-grow">
            <div class="bg-white shadow-lg rounded-lg p-8">
                {{ $slot }}
            </div>
        </main>
        
        <!-- Footer -->
        <footer class="bg-white shadow-inner py-6 mt-auto">
            <div class="max-w-7xl mx-auto px-6 text-center text-gray-500">
                &copy; {{ date('Y') }} CRUD Application. All rights reserved.
            </div>
        </footer>
    </body>
    <script>
        // Auto-hide success message after 6 seconds
        setTimeout(function() {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
                successMessage.eastIn = 'opacity 0.5s ease-in-out';
                successMessage.style.opacity = 0;
            }
        }, 6000);
    </script>
</html>
