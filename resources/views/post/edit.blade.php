<x-layout :title="$pageTitle">
    <form method="POST" action="/blog/{{ $post->id }}">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{ $post->id }}">
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Edit Post: {{ $post->title }}</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Use this form to edit a post for the blog.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <input id="title" value="{{ old('title', $post->title ) }}" type="text" name="title"
                                autocomplete="given-name"
                                class="{{ $errors->has('title') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1  placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        </div>
                        @error('title')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="author" class="block text-sm/6 font-medium text-gray-900">Author name</label>
                        <div class="mt-2">
                            <input id="author" value="{{ old('author', $post->author ) }}" type="text" name="author"
                                autocomplete="family-name"
                                class="{{ $errors->has('author') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1  placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        </div>
                        @error('author')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label for="body" class="block text-sm/6 font-medium text-gray-900">Content</label>
                        <div class="mt-2">
                            <textarea id="body" name="body" rows="3"
                                class="{{ $errors->has('body') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('body',$post->body) }}</textarea>
                        </div>
                        <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about the article.</p>
                        @error('body')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div>
                    <br>
                    <fieldset>
                        <legend class="text-sm/6 font-semibold text-gray-900">Published</legend>
                        <p class="mt-1 text-sm/6 text-gray-600">Do you want it published or saved as draft.</p>
                        <div class="mt-6 space-y-6">
                            <div class="flex items-center gap-x-3">
                                <input id="published" type="checkbox" name="published" {{ old('published') || (!old() && $post->published) ? 'checked' : '' }}
                                    class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-700 checked:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden" />
                                <label for="published"
                                    class="block text-sm/6 font-medium text-gray-900">Published</label>
                            </div>


                        </div>
                    </fieldset>
                </div>

            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/blog" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>

</x-layout>
