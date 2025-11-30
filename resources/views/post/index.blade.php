<x-layout :title="$pageTitle">
    <h1>Posts Testing</h1>

    @foreach ($posts as $post )
        <h2>{{ $post->title }}</h2>
        <h2>{{ $post->id }}</h2>      
    @endforeach
    {{ $posts->links() }}
</x-layout>