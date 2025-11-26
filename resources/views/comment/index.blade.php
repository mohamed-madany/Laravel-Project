<x-layout :title="$pageTitle">

    <h2>Comments Testing</h2>
    @foreach ($comments as &$comment )
        <h2>{{ $comment->content }}</h2>
        <h2>{{ $comment->author }}</h2>
        <a href="/blog/{{ $comment->post->id }}">{{ $comment->post->title }}</a>
   
    @endforeach
    <br>
</x-layout>