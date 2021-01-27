<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit post') }} - {{ $post->title }}
        </h2>
    </x-slot>
    <form method="POST" style="width:300px;margin:0 auto" action="{{ route('update.post', ['post' => $post]) }}">
    @csrf
        <div style="width:300px">
            <x-label for="title" :value="__('Title')" />

            <x-input id="title" class="block mt-1 w-full" value="{{ $post->content }}" type="text" name="title" required autofocus />
        </div>

        <x-label for="content" :value="__('Post content')" />

        <textarea id="content" class="block mt-1 w-full" name="content" required>
            {{ trim($post->content) }}
        </textarea>
        
        <div class="flex items-center justify-end mt-4">

            <x-button class="ml-3">
                {{ __('Update post') }}
            </x-button>
        </div>
    </form>
</x-app-layout>
