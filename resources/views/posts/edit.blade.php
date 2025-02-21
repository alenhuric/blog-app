@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-8 shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Edit Blog Post</h1>

        <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-semibold text-gray-700 dark:text-gray-300 mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ $post->title }}" maxlength="100" class="w-full border border-gray-300 dark:border-gray-600 p-3 rounded-lg focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400 bg-transparent transition" required>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 hidden" id="title-char-count-container">
                    <span id="title-char-count">{{ 100 - strlen($post->title) }}</span> characters remaining
                </p>
            </div>
            <div>
                <label class="block font-semibold text-gray-700 dark:text-gray-300 mb-2">Content</label>
                <textarea name="content" id="content" rows="5" maxlength="500" class="w-full border border-gray-300 dark:border-gray-600 p-3 rounded-lg focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400 bg-transparent transition" required>{{ $post->content }}</textarea>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 hidden" id="content-char-count-container">
                    <span id="content-char-count">{{ 500 - strlen($post->content) }}</span> characters remaining
                </p>
            </div>
            <button type="submit" class="w-full bg-green-600 dark:bg-green-500 text-white py-3 rounded-lg hover:bg-green-700 dark:hover:bg-green-600 transition">
                Update Post
            </button>
        </form>
    </div>

    <script>
        const titleInput = document.getElementById('title');
        const titleCharCount = document.getElementById('title-char-count');
        const titleCharCountContainer = document.getElementById('title-char-count-container');
        const contentInput = document.getElementById('content');
        const contentCharCount = document.getElementById('content-char-count');
        const contentCharCountContainer = document.getElementById('content-char-count-container');

        titleInput.addEventListener('focus', () => {
            titleCharCountContainer.classList.remove('hidden');
        });

        titleInput.addEventListener('blur', () => {
            titleCharCountContainer.classList.add('hidden');
        });

        titleInput.addEventListener('input', () => {
            const remaining = 100 - titleInput.value.length;
            titleCharCount.textContent = remaining;
        });

        contentInput.addEventListener('focus', () => {
            contentCharCountContainer.classList.remove('hidden');
        });

        contentInput.addEventListener('blur', () => {
            contentCharCountContainer.classList.add('hidden');
        });

        contentInput.addEventListener('input', () => {
            const remaining = 500 - contentInput.value.length;
            contentCharCount.textContent = remaining;
        });
    </script>
@endsection