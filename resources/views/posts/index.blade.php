<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts of blog') }} - {{ $blog->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a style="display:block;text-align:center;width:100px;height:25px;margin-bottom:5px;border:1px solid grey;" href="{{ route('create.post',['blog' => $blog]) }}">Add Post</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul class="list-disc">
                    @foreach($posts as $post)
                        <div style="width:550px;height:25px;margin-bottom:5px/*border:1px solid green*/">
                            <li style="width:250px;float:left"><a href="{{ route('posts.show', ['post' => $post->id]) }}">{{$post->title}}</a> </li>
                            <div style="width:150px;float:right;">
                                <a style="display:block;text-align:center;width:60px;height:25px;border:1px solid grey;float:left;" href="{{ route('edit.post', ['post' => $post->id]) }}">Edit</a>
                                <a style="display:block;text-align:center;width:60px;height:25px;border:1px solid grey;float:right;" href="{{ route('delete.post', ['post' => $post->id]) }}">Delete</a>
                            </div>
                        </div>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
