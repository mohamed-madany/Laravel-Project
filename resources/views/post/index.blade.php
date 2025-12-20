<x-layout :title="$pageTitle">
    @if (session('success'))
        <div class="bg-green-50 px-3 py-2">
            {{ session('success') }}
        </div>
    @endif
    <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/blog/create"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</a>
    </div>

    @foreach ($posts as $post )
    <div class="flex justify-between items-center border border-gray-200 px-3 py-6 my-3">
        <div>
            <p class="text-2xl">
                <a href="/blog/{{ $post->id }}">Title: {{ $post->title }}</a>
            </p>
            <p class="text-lg">Author: {{ $post->author }}</p>
            <br>
        </div>
        <div class="flex justify-between items-center">
            <form method="POST" action="/blog/{{ $post->id }}" onsubmit="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <a class="text-yellow-500 hover:text-gray-500 px-3 py-6" href="/blog/{{ $post->id }}/edit">Edit</a>
                <button class="text-red-500 hover:text-gray-500 px-3 py-6" type="submit">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
    {{ $posts->links() }}
</x-layout>
