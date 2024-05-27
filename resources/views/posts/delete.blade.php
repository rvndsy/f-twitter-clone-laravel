<form action="{{ route('posts.destroy', $post) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Are you sure you want to delete this post?</h5>
    </div>

    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="button" class="mt-3 inline-flex w-full justify-center px-3 py-2 text-sm
                                                     font-semibold text-gray-900 ">Delete</button>
                        <button type="button" class="mt-3 inline-flex w-full justify-center px-3 py-2 text-sm
                                                     font-semibold text-gray-900 ">Cancel</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>