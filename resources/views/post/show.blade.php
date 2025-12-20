<x-layout :title="$pageTitle">

    <div class="grid grid-cols-12 gap-6 px-6">

        <!-- Left Content -->
        <div class="col-span-12 lg:col-span-8 space-y-8">

            <!-- Post Card -->
            <div class="bg-white shadow rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4 break-words">
                    {{ $post->title }}
                </h1>

                <p class="text-gray-700 leading-relaxed break-words">
                    {{ $post->body }}
                </p>

                <p class="text-sm text-gray-500 mt-4">
                    Author: {{ $post->author }}
                </p>
            </div>

            <!-- Comments Card -->
            <div class="bg-white shadow rounded-lg p-6">

                <!-- Header -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold">
                        Comments ({{ $post->comments->count() }})
                    </h2>

                    <a href="{{ route('blog.comments.create', $post) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md
                              hover:bg-indigo-500 transition text-sm font-medium">
                        + Add Comment
                    </a>
                </div>

                <!-- Comments List -->
                @if($post->comments->isEmpty())
                    <p class="text-gray-500 text-center py-6">
                        No comments yet
                    </p>
                @else
                    <div class="space-y-4">
                        @foreach($post->comments as $comment)
                            <div class="border rounded-lg p-4 grid grid-cols-[1fr_auto] gap-4">

                                <!-- Comment Content -->
                                <div class="min-w-0 break-all">
                                    <p class="font-medium text-gray-900">
                                        {{ $comment->author }}
                                    </p>

                                    <p class="text-gray-600">
                                        {{ $comment->content }}
                                    </p>
                                </div>

                                <!-- Actions -->
                                <div class="flex gap-3 text-sm self-start shrink-0 whitespace-nowrap">
                                    <button class="text-blue-600 hover:underline">
                                        Edit
                                    </button>

                                    <button class="text-red-600 hover:underline">
                                        Delete
                                    </button>
                                </div>

                            </div>

                        @endforeach
                    </div>
                @endif

            </div>

        </div>

        <!-- Right Space (Dashboard feel) -->
        <div class="hidden lg:block lg:col-span-4"></div>

    </div>

</x-layout>