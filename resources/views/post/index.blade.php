<x-layout :title="$pageTitle">

    @foreach ($posts as $post )
        <h2>{{ $post->title }}</h2>
        <h2>{{ $post->id }}</h2>      
    @endforeach
    {{ $posts->links() }}
</x-layout>