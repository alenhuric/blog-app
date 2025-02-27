@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold text-gray-900 dark:text-gray-100 text-center mb-8">Feed</h1>

        @if($posts->isNotEmpty())
            <div class="space-y-4">
                @foreach($posts as $post)
                    <div class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 p-4 rounded-lg transition-shadow duration-300 relative">
                        <div class="flex items-start justify-between">
                            <div class="flex-1 pr-4">
                                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-1">{{ $post->title }}</h2>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">
                                    {{ $post->content }}
                                </p>
                            </div>

                            <button onclick="toggleActions('actions-{{ $post->id }}')" class="p-2 rounded-full hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                                <svg class="w-5 h-5 text-gray-700 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                </svg>
                            </button>
                        </div>

                        <div id="actions-{{ $post->id }}" class="hidden mt-2 flex items-center justify-end gap-2">
                            <a href="{{ route('posts.edit', $post->id) }}" class="bg-yellow-600 dark:bg-yellow-500 text-gray-100 dark:text-white px-3 py-1 rounded-lg hover:bg-yellow-600 dark:hover:bg-yellow-700 transition">
                                Edit
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 dark:bg-red-600 text-gray-100 px-3 py-1 rounded-lg hover:bg-red-600 dark:hover:bg-red-700 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 dark:text-gray-400 text-center text-lg mt-10">
                No blog posts found. <a href="{{ route('posts.create') }}" class="text-blue-600 dark:text-blue-400 hover:underline">Create one!</a>
            </p>
        @endif
    </div>

    <script>
        function toggleActions(actionsId) {
            const actions = document.getElementById(actionsId);
            actions.classList.toggle('hidden');
        }

        document.addEventListener('click', (event) => {
            const actionsContainers = document.querySelectorAll('[id^="actions-"]');
            actionsContainers.forEach(container => {
                if (!container.contains(event.target) && !event.target.closest('button[onclick*="toggleActions"]')) {
                    container.classList.add('hidden');
                }
            });
        });
    </script>
@endsection