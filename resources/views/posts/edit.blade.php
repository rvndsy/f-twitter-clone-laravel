<x-app-layout>

    <div class="max-w-2xl mx-auto p-4">

        <h2>{{  __('Editing post from ')}}</h2>

        <!-- Display previous message in form to make changes -> Click 'Save'  -> Update message data and redirect to /posts
                                                              -> Click 'Cancel -> Redirect to /posts  -->
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('patch')
            <textarea
                name="message"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                    rounded-md shadow-sm">{{ old('message', $post->message) }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('posts.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>

    </div>

</x-app-layout>