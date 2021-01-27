<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <form method="POST" style="width:300px;margin:0 auto" action="{{ route('update.blog', ['blog' => $blog]) }}">
    @csrf
        <div style="width:300px">
            <x-label for="title" :value="__('Name')" />

            <x-input id="title" class="block mt-1 w-full" type="text" name="name" required autofocus />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-button class="ml-3">
                {{ __('Update Blog') }}
            </x-button>
        </div>
    </form>
</x-app-layout>
