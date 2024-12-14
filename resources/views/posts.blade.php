<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between">
            <span>{{ __('Posts') }}</span>

            <div>
                <a href="/posts/create" class="focus:outline-none text-white bg-green-800 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-800 dark:hover:bg-green-700 dark:focus:ring-green-800">Create New Post</a>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Table for posts -->
                    <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th class="py-2 px-4 text-left text-sm font-medium text-gray-900 dark:text-gray-100">Post Title</th>
                                <th class="py-2 px-4 text-left text-sm font-medium text-gray-900 dark:text-gray-100">Author</th>
                                <th class="py-2 px-4 text-left text-sm font-medium text-gray-900 dark:text-gray-100">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="py-2 px-4 text-sm text-gray-800 dark:text-gray-100">
                                        <a href="/posts/{{ $post['id'] }}" class="text-blue-500 hover:underline">{{ $post['title'] }}</a>
                                    </td>
                                    <td class="py-2 px-4 text-sm text-gray-800 dark:text-gray-100">
                                        {{ $post->author->name }}
                                    </td>
                                    <td class="py-2 px-4 text-sm">
                                        <form action="/posts/{{ $post['id'] }}" method="POST" class="inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="bg-red-600 text-white hover:bg-red-700 px-4 py-2 rounded-md focus:outline-none">Delete</button>
                                            <button type="edit" class="bg-red-600 text-white hover:bg-red-700 px-4 py-2 rounded-md focus:outline-none">Edit</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $posts->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
