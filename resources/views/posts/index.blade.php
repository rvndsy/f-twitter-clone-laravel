<x-app-layout>
    <div class="max-w-2xl mx-auto">

        <!-- Post form is rendered here: -->

        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf <!-- Cross-site request forgery protection (mandatory) -->
            <textarea name="message" placeholder="{{ __('Type your post here...') }}" class="block w-full border-gray-400 h-35"></textarea>
                @error('message')<small class="text-red-500">{{ $message }}</small>@enderror
            <div class="">
                <label for="image" class="block text-sm font-medium my-4">{{ __('Upload image here') }}</label>
                <input type="file" name="image" id="image" class="border-gray-400">
                @error('image')<small class="text-red-500">{{ $message }}</small>@enderror
            </div>
            <x-input-error :messages="$errors->get('message')" class="mt-1" />
            <x-primary-button class="mt-4">{{ __('Post') }}</x-primary-button>
        </form>

        <!-- Individual posts are rendered here: -->

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">

            @foreach ($posts as $post)
            <div class="p-6 flex space-x-2">

                <!-- Main post body -->
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-800 font-bold">{{ $post->user->name }}</span>
                            <small class="ml-5 text-gray-500">{{ __('at') }} {{ $post->created_at->format('g:i a, j M Y' ) }}</small>
                            <!-- Display if the post is edited -->
                            @if (!$post->created_at->eq($post->updated_at))
                            <small class="text-sm text-gray-600"> {{ __('edited') }}</small>
                            @endif
                        </div>
                        <!-- Give options to edit/delete only the posts that the user has made themselves -->
                        @if ($post->user->is(auth()->user()))
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2
                                                    2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                    <x-dropdown-link :href="route('posts.destroy', $post)" onclick="event.preventDefault(); this.closest('form').submit();">
                                        @csrf
                                        @method('delete')
                                        {{ __('Delete') }}
                                    </x-dropdown-link>
                                </form>
                                <x-dropdown-link :href="route('posts.edit', $post)">
                                    {{ __('Edit') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                        @endif
                    </div class="mt-3 text-lg text-gray-900">{{ $post->message }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</x-app-layout>