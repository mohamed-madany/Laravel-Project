<?php

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can create a comment for a post via nested route', function () {
    $post = Post::factory()->create();

    $response = $this->post(route('blog.comments.store', $post), [
        'author' => 'Alice',
        'content' => 'Nice post',
    ]);

    $response->assertRedirect(route('blog.show', $post));

    $this->assertDatabaseHas('comment', [
        'author' => 'Alice',
        'content' => 'Nice post',
        'post_id' => $post->id,
    ]);
});
