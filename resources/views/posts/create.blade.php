<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create not post in') }} - {{ $blog->name }}
        </h2>
    </x-slot>
    <form method="POST" style="width:300px;margin:0 auto" action="{{ route('posts.store', ['blog' => $blog->id]) }}">
    @csrf
        <div style="width:300px">
            <x-label for="title" :value="__('Title')" />

            <x-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus />
        </div>

        <div class="mt-4" style="width:300px">
            <x-label for="content" :value="__('Post content')" />

            <x-textarea id="content" class="block mt-1 w-full"
                     name="content"
                     required autocomplete="current-password" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-button class="ml-3">
                {{ __('Create post') }}
            </x-button>
        </div>
    </form>
</x-app-layout>
