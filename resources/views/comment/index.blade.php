<x-layout :title="'Comments'">

    <div class="grid grid-cols-12 gap-6 px-6">

        <!-- Main Content -->
        <div class="col-span-12 lg:col-span-9">

            <!-- Page Header -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-bold">Comments</h1>
                    <span class="text-sm text-gray-500">
                        Total: {{ $comments->total() }}
                    </span>
                </div>

                <!-- Add Comment Button -->
                <a href="{{ route('blog.comments.create', $post) }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white
                    shadow hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2
                    focus-visible:outline-indigo-600">
                    + Add Comment
                </a>
            </div>

            <!-- Comments List -->
            @if($comments->isEmpty())
                <div class="bg-white shadow rounded-lg p-6 text-center text-gray-500">
                    No comments found.
                </div>
            @else
                <div class="space-y-4">
                    @foreach ($comments as $comment)
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

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $comments->links() }}
                </div>
            @endif

        </div>

        <!-- Right Space (future sidebar) -->
        <div class="hidden lg:block lg:col-span-3"></div>
    </div>

    <!-- Confirm Add Comment Modal -->
    <div id="confirmModal" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center">

        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            <h2 class="text-lg font-semibold mb-3">
                Add New Comment
            </h2>

            <p class="text-sm text-gray-600 mb-6">
                Do you want to add a new comment?
            </p>

            <div class="flex justify-end gap-3">
                <button onclick="closeConfirmModal()"
                    class="px-4 py-2 text-sm rounded-md bg-gray-100 text-gray-700 hover:bg-gray-200">
                    Cancel
                </button>

                <a href="{{ route('blog.comments.create', $post) }}"
                    class="px-4 py-2 text-sm rounded-md bg-indigo-600 text-white hover:bg-indigo-500">
                    Yes, Add Comment
                </a>
            </div>
        </div>
    </div>

    <!-- Simple JS -->
    <script>
        function openConfirmModal() {
            document.getElementById('confirmModal').classList.remove('hidden');
        }

        function closeConfirmModal() {
            document.getElementById('confirmModal').classList.add('hidden');
        }
    </script>

</x-layout>