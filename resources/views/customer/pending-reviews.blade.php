<x-customer-layout>
    <div class="px-3" x-data="pendingReviews">
        <div class="py-2 border-b border-slate-200">
            <p class="text-lg font-semibold">Pending Reviews</p>
        </div>

        <div class="py-5">
            <div class="px-5 h-[600px] overflow-y-auto">
                <template x-if="pendingReviews">

                    <template x-for="item in pendingReviews" :key="item.id">

                        <div class="border border-slate-200 rounded p-3 flex gap-5">
                            <div class="shrink-0">
                                <div class="size-24 rounded overflow-hidden">
                                    <img :src="item.variation ? item.variation.image : item.product.image"
                                        alt="item image" class="w-full h-full object-cover object-center">
                                </div>
                            </div>

                            <div class="flex-1 space-y-1">
                                <p x-text="item.product.name"></p>

                                <p class="text-sm text-slate-500">Order <span class="text-slate-700"
                                        x-text="item.order.order_id"></span></p>

                                {{-- item attributes --}}
                                <template x-if="item.variation">
                                    <div class="flex items-center gap-5">
                                        <template x-for="(value, name) in item.variation.attributes"
                                            :key="name">
                                            <div class="flex items-center gap-2 text-sm">
                                                <span class="capitalize" x-text="name+':'"></span>
                                                <span class="text-slate-500" x-text="value"></span>
                                            </div>
                                        </template>
                                    </div>
                                </template>

                                {{-- item status --}}
                                <div class="px-3 py-0.5 text-sm w-fit capitalize leading-none rounded"
                                    :class="{
                                        'bg-green-100 text-green-500': item.status ==
                                            'delivered',
                                        'bg-red-100 text-red-500': item.status ==
                                            'cancelled',
                                        'bg-indigo-100 text-indigo-500': item.status ==
                                            'shipped',
                                        'bg-orange-100 text-orange-500': item.status == 'pending'
                                    }">
                                    <span x-text="item.status"></span>
                                </div>

                                <p class="text-sm text-slate-500">On: <span class="text-slate-700"
                                        x-text="item.formatted_created_at"></span></p>
                            </div>
                            <div class="shrink-0">
                                <a :href="'{{ route('customer.reviews.create', ':id') }}'.replace(':id', item.id)"
                                    class="text-indigo-500 font-medium text-sm">
                                    Add Review
                                </a>

                            </div>
                        </div>
                    </template>
                </template>

                <template x-if="!pendingReviews.length > 0">
                    <div class="grid place-items-center">
                        <div class="flex flex-col py-10 items-center text-center text-sm max-w-80">
                            <div class="size-56">
                                <img src="{{ asset('images/no_data.svg') }}" alt="no data"
                                    class="w-full h-full object-cover object-center">
                            </div>

                            <p class="font-semibold mt-2 mb-3">You have no orders waiting for feedback</p>

                            <p>After getting your products delivered, you will be able to rate and review them. Your
                                feedback will be published on the product page to help all Shopsmart users get the best
                                shopping experience!</p>

                            <a href="{{ route('home') }}"
                                class="mt-3 bg-orange-500 text-white py-2 px-5 rounded hover:bg-orange-500/90">Continue
                                Shopping</a>
                        </div>
                    </div>
                </template>

            </div>


        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('pendingReviews', () => ({
                    pendingReviews: @json($pendingReviews),


                }))
            })
        </script>
    @endpush
</x-customer-layout>
