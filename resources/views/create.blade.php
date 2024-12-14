<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Post') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/posts" method="post" class="space-y-6">
                        @csrf
                        <div class="flex flex-col space-y-2">
                            <label for="title" class="text-sm font-medium">Title</label>
                            <input
                                type="text"
                                name="title"
                                id="title"
                                value="{{ old('title') }}"
                                class="border border-gray-300 bg-gray-800 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            >
                            @error('title')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="contents" class="text-sm font-medium">Contents</label>
                            <textarea
                                name="contents"
                                id="contents"
                                class="border border-gray-300 bg-gray-800 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 h-32 resize-none"
                            >{{ old('contents') }}</textarea>
                            @error('body')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <button
                            type="submit"
                            class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"
                        >
                            Create Post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>