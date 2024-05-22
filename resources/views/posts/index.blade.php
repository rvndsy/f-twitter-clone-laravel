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
    </div>
</x-app-layout>