<x-customer-layout>
    <div class="p-3" x-data="itemReview">
        <div class="py-2 border-b border-slate-200">
            <p class="text-lg font-semibold">Item Review</p>
        </div>

        <div class="py-5 px-5">
            <div class=" rounded p-3 flex gap-5">
                <div class="shrink-0">
                    <div class="size-24 rounded overflow-hidden">
                        <img :src="item.variation ? item.variation.image : item.product.image" alt="item image"
                            class="w-full h-full object-cover object-center">
                    </div>
                </div>

                <div class="flex-1 space-y-1">
                    <p x-text="item.product.name"></p>

                    <p class="text-sm text-slate-500">Order <span class="text-slate-700"
                            x-text="item.order.order_id"></span>
                    </p>

                    {{-- item attributes --}}
                    <template x-if="item.variation">
                        <div class="flex items-center gap-5">
                            <template x-for="(value, name) in item.variation.attributes" :key="name">
                                <div class="flex items-center gap-2 text-sm">
                                    <span class="capitalize" x-text="name+':'"></span>
                                    <span class="text-slate-500" x-text="value"></span>
                                </div>
                            </template>
                        </div>
                    </template>

                    <div class="flex items-center gap-1">
                        <label for="oneStar" class="transition hover:scale-125 has-focus:scale-125">
                            <span class="sr-only">one star</span>
                            <input x-model="rating" id="oneStar" type="radio" class="sr-only" name="rating"
                                value="1">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"
                                fill="currentColor" class="size-5"
                                x-bind:class="rating > 0 ? 'text-amber-500' : 'text-slate-500'">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                    clip-rule="evenodd">
                            </svg>
                        </label>

                        <label for="twoStars" class="transition hover:scale-125 has-focus:scale-125">
                            <span class="sr-only">two stars</span>
                            <input x-model="rating" id="twoStars" type="radio" class="sr-only" name="rating"
                                value="2">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"
                                fill="currentColor" class="size-5"
                                x-bind:class="rating > 1 ? 'text-amber-500' : 'text-slate-500'">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                    clip-rule="evenodd">
                            </svg>
                        </label>

                        <label for="threeStars" class="transition hover:scale-125 has-focus:scale-125">
                            <span class="sr-only">three stars</span>
                            <input x-model="rating" id="threeStars" type="radio" class="sr-only" name="rating"
                                value="3">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"
                                fill="currentColor" class="size-5"
                                x-bind:class="rating > 2 ? 'text-amber-500' : 'text-slate-500'">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                    clip-rule="evenodd">
                            </svg>
                        </label>

                        <label for="fourStars" class="transition hover:scale-125 has-focus:scale-125">
                            <span class="sr-only">four stars</span>
                            <input x-model="rating" id="fourStars" type="radio" class="sr-only" name="rating"
                                value="4">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"
                                fill="currentColor" class="size-5"
                                x-bind:class="rating > 3 ? 'text-amber-500' : 'text-slate-500'">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                    clip-rule="evenodd">
                            </svg>
                        </label>

                        <label for="fiveStars" class="transition hover:scale-125 has-focus:scale-125">
                            <span class="sr-only">five stars</span>
                            <input x-model="rating" id="fiveStars" type="radio" class="sr-only" name="rating"
                                value="5">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"
                                fill="currentColor" class="size-5"
                                x-bind:class="rating > 4 ? 'text-amber-500' : 'text-slate-500'">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                    clip-rule="evenodd">
                            </svg>
                        </label>
                    </div>


                </div>

                <div class="shrink-0 space-y-2">
                    {{-- item status --}}
                    <div class="flex items-baseline gap-2">
                        <span class="text-sm text-slate-500">Status:</span>
                        <div class="px-3 py-0.5 text-sm capitalize leading-none rounded"
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
                    </div>


                    <p class="text-sm text-slate-500">On: <span class="text-slate-700"
                            x-text="item.formatted_created_at"></span></p>
                </div>
            </div>

            <form :action="'{{ route('customer.reviews.store', ':id') }}'.replace(':id', item.id)" class="space-y-3"
                method="POST">
                @csrf

                <div class="block">
                    <label for="anonymous" class="inline-flex items-center">
                        <input id="anonymous" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 "
                            name="anonymous">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Stay anonymous') }}</span>
                    </label>
                </div>

                <input type="hidden" name="rating" x-model="rating" value="{{ old('rating') }}">

                <div class="">
                    <x-forms.input-label for="title" value="Review title" />
                    <x-forms.text-input id="title" name="title" class="w-1/2" value="{{ old('title') }}" />
                    <x-forms.input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div class="">
                    <x-forms.input-label for="message" value="Message" />
                    <x-forms.textarea id="message" name="message" class="w-1/2" value="{{ old('message') }}" />
                    <x-forms.input-error :messages="$errors->get('message')" class="mt-2" />
                </div>

                <div class="flex items-center gap-2">
                    <button type="submit"
                        class="px-5 py-1.5 text-white bg-indigo-500 rounded hover:bg-indigo-500/90 transition-all duration-150 ease-in-out">Submit
                        Review</button>

                    <button type="reset"
                        class="px-5 py-1.5 text-white bg-red-500 rounded hover:bg-red-500/90 transition-all duration-150 ease-in-out">Reset</button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('itemReview', () => ({
                    rating: 3,
                    item: @json($item),

                    init() {
                        this.$watch('rating', () => {
                            console.log(this.rating);
                        })
                    }
                }))
            })
        </script>
    @endpush
</x-customer-layout>
