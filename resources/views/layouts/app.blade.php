<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <a href="{{ route('home') }}" class="flex items-center py-4">
                        <span class="font-semibold text-gray-500 text-lg">Library</span>
                    </a>
                    @auth
                        @if(auth()->user()->is_admin)
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('admin.dashboard') }}" class="py-4 px-2 text-gray-500 hover:text-gray-900">Dashboard</a>
                            <a href="{{ route('admin.books.index') }}" class="py-4 px-2 text-gray-500 hover:text-gray-900">Manage Books</a>
                        </div>
                        @endif
                    @endauth
                </div>
                @auth
                    <div class="flex items-center space-x-3">
                        <span class="text-gray-500">Welcome, {{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="py-2 px-4 bg-red-500 text-white rounded hover:bg-red-600">Logout</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto mt-6 px-4">
        @yield('content')
    </main>
</body>
</html>