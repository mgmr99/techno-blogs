<x-app-layout>
    <div class="w-full grid grid-cols-4 shadow-inner gap-10">
        {{-- <div class="md:col-span-3 col-span-4">
            <div id="posts" class=" px-3 lg:px-7 py-6">
                <div class="flex justify-between items-center border-b border-gray-100">
                    <div id="filter-selector" class="flex items-center space-x-4 font-light ">
                        <button class="text-gray-500 py-4">Latest</button>
                        <button class="text-gray-900 py-4 border-b border-gray-700">Oldest</button>
                    </div>
                </div>
                <div class="py-4">
                    @foreach ($posts as $post)
                        <x-posts.post-item :post="$post" />
                    @endforeach
                </div>
            </div>
        </div> --}}
        @livewire('post-list')
        <div id="side-bar"
            class="border-t border-t-gray-100 md:border-t-none col-span-4 md:col-span-1 px-3 md:px-6  space-y-10 py-6 pt-10 md:border-l border-gray-100 h-screen sticky top-0">
            @livewire('search-box')
            @include('posts.partials.categories-box')
        </div>
    </div>
</x-app-layout>
