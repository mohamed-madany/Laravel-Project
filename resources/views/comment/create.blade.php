<x-layout title="Add Comment">

    <form method="POST" action="{{ route('blog.comments.store', $post) }}">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                <!-- Header -->
                <h2 class="text-base/7 font-semibold text-gray-900">
                    Add New Comment
                </h2>

                <p class="mt-1 text-sm/6 text-gray-600">
                    Use this form to add a comment to a post.
                </p>

                <!-- Form Fields -->
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <!-- Author -->
                    <div class="sm:col-span-3">
                        <label for="author" class="block text-sm/6 font-medium text-gray-900">
                            Author name
                        </label>

                        <div class="mt-2">
                            <input id="author" type="text" name="author" value="{{ old('author') }}" class="{{ $errors->has('author') ? 'outline-red-500' : 'outline-gray-300' }}
                                block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900
                                outline-1 -outline-offset-1 placeholder:text-gray-400
                                focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        </div>

                        @error('author')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Post (nested) -->
                    <div class="sm:col-span-3">
                        <label class="block text-sm/6 font-medium text-gray-900">Post</label>

                        <div class="mt-2">
                            <div class="rounded-md border px-3 py-2 bg-gray-50 text-gray-800">
                                {{ $post->title }}
                            </div>
                        </div>

                        @error('post_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div class="col-span-full">
                        <label for="content" class="block text-sm/6 font-medium text-gray-900">
                            Comment
                        </label>

                        <div class="mt-2">
                            <textarea id="content" name="content" rows="4"
                                class="{{ $errors->has('content') ? 'outline-red-500' : 'outline-gray-300' }}
                                block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900
                                outline-1 -outline-offset-1 placeholder:text-gray-400
                                focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('content') }}</textarea>
                        </div>

                        <p class="mt-3 text-sm/6 text-gray-600">
                            Write your comment clearly and respectfully.
                        </p>

                        @error('content')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{ route('blog.show', $post) }}" class="text-sm/6 font-semibold text-gray-900">
                Cancel
            </a>

            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white
                shadow-xs hover:bg-indigo-500 focus-visible:outline-2
                focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Save Comment
            </button>
        </div>

    </form>

</x-layout>