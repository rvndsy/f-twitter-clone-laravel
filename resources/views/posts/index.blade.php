<x-app-layout>
    <div class="max-w-2xl mx-auto">

        <div class="bg-zinc-900 border border-gray-100 p-4">

            <!-- Post form is rendered here: -->

            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                <h1 class="text-white mt-5">{{ __('Post something?') }}</h1>
                @csrf <!-- Cross-site request forgery protection (mandatory) -->
                <textarea name="message" placeholder="{{ __('Type here...') }}" class="block w-full bg-zinc-900 border-zinc-600 h-35 mt-4" style="color: white"></textarea>
                <p class="text-sm text-gray-500 dark:text-gray-300 mb-4 mt-2">Max post length is 255 characters</p>
                @error('message')<small class="text-red-500">{{ $message }}</small>@enderror
                <input class="block w-full text-sm border rounded-lg cursor-pointer
                        text-gray-400 border-zinc-600 placeholder-gray-400" type="file" name="image" id="image">
                <p class="text-sm text-gray-500 dark:text-gray-300 mb-4 mt-2">Upload an image</p>
                <x-primary-button class="mt-4">{{ __('Post') }}</x-primary-button>
                @error('image')<small class="text-red-500">{{ $message }}</small>@enderror
                <x-input-error :messages="$errors->get('message')" class="mt-1" />
            </form>

            <!-- Individual posts are rendered here: -->

            @foreach ($posts as $post)
            <div class="p-6 flex border-t border-gray-100 mt-8">

                <!-- Main post body -->
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-white font-bold">{{ $post->user->name }}</span>
                            <small class="ml-5 text-gray-500">{{ __('at') }} {{ $post->created_at->format('H:i, j M Y' ) }}</small>
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
                            </x-slot>
                        </x-dropdown>
                        @endif

                    </div>

                    <p class="mt-1 text-sm text-white">
                        {{ $post->message }}
                    </p>

                    @if($post->image_path)
                    <div class="mt-6">
                        <img src="{{ asset('/storage/'. $post->image_path) }}" alt="{{ 'Image by ' . Auth::user()->name }}" />
                    </div>
                    @endif

                </div>
            </div>
            @endforeach

        </div>

    </div>
</x-app-layout>