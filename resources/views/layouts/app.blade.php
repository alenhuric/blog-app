<!DOCTYPE html>
<html lang="en" class="{{ session('theme', 'light') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">
<nav class="bg-white dark:bg-gray-800 shadow-md py-4">
    <div class="container mx-auto px-6 flex items-center justify-between">
        <a href="{{ route('posts.index') }}" class="text-2xl font-bold text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition">
            Alen's Blog
        </a>

        <div class="flex items-center gap-4">
            @auth
                <!-- Display "Hello, [Name]" and a sign-out button -->
                <span class="text-gray-700 dark:text-gray-300">Hello, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-600 dark:bg-red-500 text-white px-5 py-2 rounded-lg transition font-semibold hover:bg-red-700 dark:hover:bg-red-600">
                        Sign Out
                    </button>
                </form>
            @else
                <!-- Display sign-in and sign-up buttons -->
                <a href="{{ route('login') }}" class="bg-blue-600 dark:bg-blue-500 text-white px-5 py-2 rounded-lg transition font-semibold hover:bg-blue-700 dark:hover:bg-blue-600">
                    Sign In
                </a>
                <a href="{{ route('register') }}" class="bg-green-600 dark:bg-green-500 text-white px-5 py-2 rounded-lg transition font-semibold hover:bg-green-700 dark:hover:bg-green-600">
                    Sign Up
                </a>
            @endauth

            @unless (Route::is('posts.create'))
                <a href="{{ route('posts.create') }}" class="bg-blue-600 dark:bg-blue-500 text-white px-5 py-2 rounded-lg transition font-semibold hover:bg-blue-700 dark:hover:bg-blue-600">
                    Make A Blog Post
                </a>
            @endunless

            <button id="theme-toggle" class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                <span id="theme-icon" class="text-gray-700 dark:text-gray-300">🌙</span>
            </button>
        </div>
    </div>
</nav>

    <div class="container mx-auto p-6">
        @yield('content')
    </div>

    <footer class="bg-gray-300 dark:bg-gray-700 shadow-md py-4 mt-10">
        <div class="container mx-auto px-6 text-center">
            <p class="text-sm text-gray-500 dark:text-gray-100">
                Check out the source code on 
                <a href="https://github.com/alenhuric/blog-app" target="_blank" class="inline-flex items-center text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition">
                    GitHub.
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/91/Octicons-mark-github.svg" alt="GitHub Logo" class="w-5 h-5 ml-1">
                </a>
            </p>
        </div>
    </footer>

    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');
        const htmlElement = document.documentElement;

        const setTheme = (theme) => {
            if (theme === 'dark') {
                htmlElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                themeIcon.textContent = '☀️';
            } else {
                htmlElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                themeIcon.textContent = '🌙';
            }
        };

        const savedTheme = localStorage.getItem('theme') || 'light';
        setTheme(savedTheme);

        themeToggle.addEventListener('click', () => {
            const isDark = htmlElement.classList.contains('dark');
            setTheme(isDark ? 'light' : 'dark');
        });
    </script>
</body>
</html>