<x-guest-layout>

    <div class="bg-white rounded shadow-sm px-5 mb-5">
        <div class="py-2 border-b border-slate-200 flex items-center">
            <p class="text-xl font-bold">Hot Category</p>

            <a href="" class="ms-auto text-sm underline text-orange-500">View all</a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-8 lg:grid-cols-10 gap-2 py-3">
            @foreach ($categories as $category)
                <a href="#" class="p-2 hover:shadow-md transition-all duration-300 ease-in-out">
                    <div class="w-full max-sm:h-28 h-20">
                        <img src="{{ $category->image_url }}" alt="category image"
                            class="w-full h-full object-cover object-center">
                    </div>
                    <div class="pt-2">
                        <p class="text-sm text-center font-medium">{{ $category->name }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <x-products />
</x-guest-layout>
