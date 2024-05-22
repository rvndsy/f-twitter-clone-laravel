<x-app-layout>
    <div class="max-w-2xl mx-auto">
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <textarea
                name="message"
                placeholder="{{ __('Type your post here...') }}"
                class="block w-full border-gray-400 h-40"
            >{{ old('message') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-1" />
            <x-primary-button class="mt-4">{{ __('Post') }}</x-primary-button>
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($posts as $post)
                <div class="p-6 flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100"\
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 
                                                                                4.418-4.03 8-9 8a9.863 9.863 0 01-4.2
                                                                                55-.949L3 20l1.395-3.72C3.512 15.042 
                                                                                3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.
                                                                                582 9 8z" />
                    </svg>

                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800 font-bold">{{ $post->user->name }}</span>
                                <small class="ml-5 text-gray-500">at {{ $post->created_at->format('g:i a, j M Y' ) }}</small>
                            </div>
                        </div
                        <p class="mt-3 text-lg text-gray-900">{{ $post->message }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>