<x-customer-layout>
    <div x-data="productDetails" class="space-y-5">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-5 bg-white rounded shadow-sm p-3">
            {{-- product images --}}
            <div class="lg:col-span-2">
                <div class="swiper-container">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                        class="swiper mySwiper2 mb-2">
                        <div class="swiper-wrapper">
                            @foreach ($product_details['product']->images as $image)
                                <div class="swiper-slide">
                                    <img src="{{ $image->url }}" />
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($product_details['product']->images as $image)
                                <div class="swiper-slide">
                                    <img src="{{ $image->url }}" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- product details --}}
            <div class="lg:col-span-3 space-y-5">
                <p x-text="product.name"></p>

                {{-- product reviews --}}
                <template x-if="product.reviews_count > 0">
                    <div class="flex items-center gap-1">
                        <template x-for="i in 5">
                            <div>
                                <template x-if="i <= product.average_rating">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                        class="size-4 text-red-500" fill="currentColor">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                </template>

                                <template x-if="i > product.average_rating">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                        class="size-4 text-slate-500" fill="currentColor">
                                        <path
                                            d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z" />
                                    </svg>
                                </template>
                            </div>
                        </template>

                        <span class="text-slate-500 ms-2" x-text="product.average_rating"></span>
                        <span class="text-sm text-indigo-500 ms-5"
                            x-text="product.reviews_count + ' Customer reviews'"></span>
                    </div>
                </template>


                <div class="flex items-center gap-3 bg-slate-100 rounded px-3 py-1.5">
                    {{-- displaying price for variation if it is available --}}

                    <template x-if="variation">
                        <div>
                            <template x-if="variation.discount">
                                <div class="flex items-baseline gap-2">
                                    <p class="text-xl font-semibold text-red-500" x-text="variation.sale_price"></p>
                                    <p class="line-through text-sm" x-text="variation.price"></p>
                                    <p class="text-red-500 text-sm" x-text="'('+variation.discount+')'"></p>
                                </div>
                            </template>
                            <template x-if="!variation.discount">
                                <p class="text-red-500 text-xl font-bold" x-text="variation.price"></p>
                            </template>
                        </div>
                    </template>

                    {{-- displaying prices of product if it does not have variation --}}
                    <template x-if="!variation">
                        <div>
                            <template x-if="product.discount">
                                <div class="flex items-baseline gap-2">
                                    <p class="text-xl font-semibold text-red-500" x-text="product.sale_price"></p>
                                    <p class="line-through text-sm" x-text="product.price"></p>
                                    <p class="text-red-500 text-sm" x-text="'('+product.discount+')'"></p>
                                </div>
                            </template>

                            <template x-if="!product.discount">
                                <p class="text-red-500 text-xl font-bold" x-text="product.price"></p>
                            </template>
                        </div>
                    </template>
                </div>

                {{-- product shortdescription --}}
                <div>
                    <div x-text="variation ? variation.description : product.short_description"></div>
                </div>

                {{-- product variations --}}
                <div class="space-y-3">
                    <template x-if="variation">
                        <template x-for="(values, name) in attributes" :key="name">
                            <div class="grid grid-cols-5">
                                <!-- Label for the attribute (e.g., Color, Size) -->
                                <div class="col-span-1 capitalize" x-text="name + ':'"></div>

                                <!-- Radio buttons for each attribute value -->
                                <div class="col-span-4 flex items-center gap-3">
                                    <template x-for="(value, i) in values" :key="i">
                                        <div>
                                            <input type="radio" :name="name" :id="name + '-' + value"
                                                :value="value" class="hidden peer"
                                                x-model="variationAttributes[name]" @change="changeDefaultVariation">

                                            <label :for="name + '-' + value"
                                                class="w-full p-1 text-xs font-medium tracking-wide px-3 border border-slate-200 rounded cursor-pointer peer-checked:border-indigo-500">
                                                <span x-text="value" class="capitalize"></span>
                                            </label>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </template>
                    </template>
                </div>

                <div class="grid grid-cols-5">
                    <div class="col-span-1 capitalize">Quantity</div>

                    <div class="col-span-4 flex items-center gap-1">
                        {{-- decrease button --}}
                        <button @click="decreaseQuantity" type="button" class="bg-slate-200 shadow-sm shrink-0 p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-dash size-5"
                                viewBox="0 0 16 16">
                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                            </svg>
                        </button>

                        {{-- quantity --}}
                        <p class="leading-none bg-slate-200 p-1.5 px-2 shrink-0" x-text="quantity"></p>

                        {{-- increase button --}}
                        <button @click="increaseQuantity" type="button" class="bg-slate-200 shadow-sm shrink-0 p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus size-5"
                                viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- action buttons --}}
                <div class="flex items-center gap-3">
                    <button @click="addToCart"
                        class="bg-red-500 text-white rounded flex items-center gap-2 px-5 py-1.5 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-cart3" viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                        </svg>
                        <span>Add to Cart</span>
                    </button>

                    <button class="bg-indigo-500 text-white rounded flex items-center gap-2 px-5 py-1.5 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-heart" viewBox="0 0 16 16">
                            <path
                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                        </svg>
                        <span>Add to wishlist</span>
                    </button>
                </div>
            </div>

        </div>

        <div class="bg-white rounded shadow-sm" x-data>

            <div class="border-b border-slate-200">
                <button @click="selectedTab = 'description'" type="button" class="px-5 py-2"
                    :class="selectedTab == 'description' && 'bg-red-500 text-white'">Description</button>

                <button @click="selectedTab = 'reviews'" type="button" class="px-5 py-2"
                    :class="selectedTab == 'reviews' && 'bg-red-500 text-white'">Reviews</button>

                <button @click="selectedTab = 'recommend'" type="button" class="px-5 py-2"
                    :class="selectedTab == 'recommend' && 'bg-red-500 text-white'">Recommend</button>
            </div>

            <div>
                <div x-cloak x-show="selectedTab == 'description'" class="p-5">
                    <div x-html="product.description"></div>
                </div>

                <div x-cloak x-show="selectedTab == 'reviews'" class="p-5">
                    <template x-if="product.reviews.length > 0">
                        <div>
                            <div class="grid grid-cols-5 divide-x divide-slate-300 py-7">
                                <div class="col-span-1 justify-self-center flex flex-col items-center space-y-2">
                                    <div class="font-semibold text-3xl text-slate-600">
                                        <span x-text="product.average_rating ? product.average_rating : 0"
                                            class="text-6xl text-red-500"></span>
                                        <span>/</span>
                                        <span>5</span>
                                    </div>

                                    {{-- product reviews --}}
                                    <div class="flex items-center gap-1">
                                        <template x-for="i in 5">
                                            <div>
                                                <svg :class="i <= product.average_rating ? 'text-red-500' : 'text-slate-200'"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                    class="size-6" fill="currentColor">
                                                    <path
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                            </div>
                                        </template>
                                    </div>
                                    <p class="text-slate-500" x-text="'('+product.reviews_count+ ' Ratings)' "></p>
                                </div>

                                <div class="col-span-4 space-y-2 px-5 ps-10">
                                    {{-- 5 star ratings --}}
                                    <div class="flex items-center gap-7">
                                        <div class="shrink-0 flex items-center text-red-500 gap-1">
                                            <template x-for="i in 5">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                    class="size-6 text-red-500" fill="currentColor">
                                                    <path
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                            </template>
                                        </div>

                                        <div class="flex-1">
                                            <div class="rounded-full w-full bg-slate-200 h-4 relative overflow-hidden">
                                                <div class="absolute inset-0 bg-red-500"
                                                    :style="'width: ' + product.reviews.filter(r => r.rating === 5).length *
                                                        100 /
                                                        product.reviews.length + '%'">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="shrink-0 min-w-16">
                                            <p x-text="product.reviews.filter(r => r.rating == 5).length"></p>
                                        </div>
                                    </div>


                                    {{-- 4 star ratings --}}
                                    <div class="flex items-center gap-7">
                                        <div class="shrink-0 flex items-center gap-1">
                                            <template x-for="i in 5">
                                                <div>
                                                    <svg :class="i <= 4 ? 'text-red-500' : 'text-slate-200'"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                        class="size-6" fill="currentColor">
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </div>
                                            </template>
                                        </div>

                                        <div class="flex-1">
                                            <div class="rounded-full w-full bg-slate-200 h-4 relative overflow-hidden">
                                                <div class="absolute inset-0 bg-red-500"
                                                    :style="'width: ' + product.reviews.filter(r => r.rating === 4).length *
                                                        100 /
                                                        product.reviews.length + '%'">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="shrink-0 min-w-16">
                                            <p x-text="product.reviews.filter(r => r.rating == 4).length"></p>
                                        </div>
                                    </div>

                                    {{-- 3 star ratings --}}
                                    <div class="flex items-center gap-7">
                                        <div class="shrink-0 flex items-center gap-1">
                                            <template x-for="i in 5">
                                                <div>
                                                    <svg :class="i <= 3 ? 'text-red-500' : 'text-slate-200'"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                        class="size-6 " fill="currentColor">
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </div>
                                            </template>
                                        </div>

                                        <div class="flex-1">
                                            <div class="rounded-full w-full bg-slate-200 h-4 relative overflow-hidden">
                                                <div class="absolute inset-0 bg-red-500"
                                                    :style="'width: ' + product.reviews.filter(r => r.rating === 3).length *
                                                        100 /
                                                        product.reviews.length + '%'">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="shrink-0 min-w-16">
                                            <p x-text="product.reviews.filter(r => r.rating == 3).length"></p>
                                        </div>
                                    </div>

                                    {{-- 2 star ratings --}}
                                    <div class="flex items-center gap-7">
                                        <div class="shrink-0 flex items-center gap-1">
                                            <template x-for="i in 5">
                                                <div>
                                                    <svg :class="i <= 2 ? 'text-red-500' : 'text-slate-200'"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                        class="size-6" fill="currentColor">
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </div>
                                            </template>
                                        </div>

                                        <div class="flex-1">
                                            <div class="rounded-full w-full bg-slate-200 h-4 relative overflow-hidden">
                                                <div class="absolute inset-0 bg-red-500"
                                                    :style="'width: ' + product.reviews.filter(r => r.rating === 2).length *
                                                        100 /
                                                        product.reviews.length + '%'">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="shrink-0 min-w-16">
                                            <p x-text="product.reviews.filter(r => r.rating == 2).length"></p>
                                        </div>
                                    </div>

                                    {{-- 1 star ratings --}}
                                    <div class="flex items-center gap-7">
                                        <div class="shrink-0 flex items-center gap-1">
                                            <template x-for="i in 5">
                                                <div>
                                                    <svg :class="i <= 1 ? 'text-red-500' : 'text-slate-200'"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                        class="size-6" fill="currentColor">
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </div>
                                            </template>
                                        </div>

                                        <div class="flex-1">
                                            <div class="rounded-full w-full bg-slate-200 h-4 relative overflow-hidden">
                                                <div class="absolute inset-0 bg-red-500"
                                                    :style="'width: ' + product.reviews.filter(r => r.rating === 1).length *
                                                        100 /
                                                        product.reviews.length + '%'">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="shrink-0 min-w-16">
                                            <p x-text="product.reviews.filter(r => r.rating == 1).length"></p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="mt-10">
                                <div class="border-b border-slate-200">
                                    <button @click="selectedReviewTab = 'allReviews'" type="button"
                                        :class="selectedReviewTab == 'allReviews' &&
                                            'font-semibold text-red-500 border-b border-red-500'"
                                        class="px-5 py-2">All
                                        Reviews (<span x-text="product.reviews.length"></span>)</button>
                                    <button @click="selectedReviewTab = 'latest'" type="button"
                                        :class="selectedReviewTab == 'latest' &&
                                            'font-semibold text-red-500 border-b border-red-500'"
                                        class="px-5 py-2">Latest</button>
                                    <button @click="selectedReviewTab = 'withContent'" type="button"
                                        :class="selectedReviewTab == 'withContent' &&
                                            'font-semibold text-red-500 border-b border-red-500'"
                                        class="px-5 py-2">With
                                        Content</button>
                                    <button @click="selectedReviewTab = 'withPhotos'" type="button"
                                        :class="selectedReviewTab == 'withPhotos' &&
                                            'font-semibold text-red-500 border-b border-red-500'"
                                        class="px-5 py-2">With
                                        Photos</button>
                                </div>

                                <div>
                                    <div x-cloak x-show="selectedReviewTab == 'allReviews'" class="p-5 ">
                                        <template x-for="review in product.reviews" :key="review.id">
                                            <div class="py-3 border-b border-slate-200">
                                                <div class="flex items-center">
                                                    <div class="size-12 rounded-full overflow-hidden">
                                                        <img :src="review.user.avatar" alt="user avatar"
                                                            class="w-full h-full object-cover object-center">
                                                    </div>

                                                    <div class="ms-2 flex flex-col">
                                                        <p x-text="review.user.name"></p>
                                                        <p x-text="review.formatted_created_date"
                                                            class="text-sm text-slate-400"></p>
                                                    </div>

                                                    <div class="ms-auto flex items-center gap-[2px]">
                                                        <template x-for="i in 5">
                                                            <div>
                                                                <svg :class="i <= review.rating ? 'text-red-500' : 'text-slate-200'"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 576 512" class="size-4"
                                                                    fill="currentColor">
                                                                    <path
                                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                                </svg>
                                                            </div>
                                                        </template>
                                                    </div>
                                                </div>

                                                <div class="py-5 px-10">
                                                    <p x-text="review.message"></p>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                    <div x-cloak x-show="selectedReviewTab == 'latest'" class="p-5"></div>
                                    <div x-cloak x-show="selectedReviewTab == 'withContent'" class="p-5"></div>
                                    <div x-cloak x-show="selectedReviewTab == 'withPhotos'" class="p-5"></div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template x-if="!product.reviews.length > 0">
                        <div class="">No reviews yet</div>
                    </template>
                </div>
            </div>
        </div>

        <x-products />
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('productDetails', () => ({
                    product: {},
                    variation: {},
                    attributes: {},
                    variationAttributes: {},
                    quantity: 1,
                    selectedTab: 'description',
                    selectedReviewTab: 'allReviews',

                    increaseQuantity() {
                        let maxQuantity = this.variation ? this.variation.stock : this.product.stock;

                        if (maxQuantity > 0) {
                            if (this.quantity < maxQuantity) {
                                this.quantity++;
                            }
                        } else {
                            this.quantity++;
                        }
                    },

                    decreaseQuantity() {
                        let minQuantity = 1;
                        if (this.quantity > minQuantity) {
                            this.quantity--;
                        }
                    },

                    async addToCart() {
                        try {
                            const response = await axios.put('{{ route('cart.update') }}', {
                                product_id: this.product.id,
                                variation_id: this.variation ? this.variation.id : null,
                                quantity: this.quantity,
                            });

                            if (response.status == 200) {
                                console.log(response);
                            }
                        } catch (error) {
                            console.log(error);
                        }
                    },

                    async changeDefaultVariation() {
                        console.log(this.variationAttributes);
                        try {
                            const response = await axios.get('{{ route('product.variation') }}', {
                                params: {
                                    product_id: this.product.id,
                                    variation_attributes: this.variationAttributes,
                                }
                            });

                            if (response.status === 200) {
                                console.log(response);
                                this.product = response.data.product;
                                this.variation = response.data.variation;
                                this.selectedAttributes = response.data.variation.attributes;
                            }

                        } catch (error) {
                            console.log(error);
                        }
                    },

                    init() {
                        this.product = @json($product_details).product;
                        this.variation = @json($product_details).variation;
                        this.attributes = @json($product_details).attributes;
                        this.variationAttributes = @json($product_details).variation?.attributes;

                        var swiper = new Swiper(".mySwiper", {
                            loop: true,
                            spaceBetween: 10,
                            slidesPerView: 4,
                            freeMode: true,
                            watchSlidesProgress: true,
                        });
                        var swiper2 = new Swiper(".mySwiper2", {
                            loop: true,
                            spaceBetween: 10,
                            thumbs: {
                                swiper: swiper,
                            },
                        });
                    }

                }))
            })
        </script>
    @endpush
</x-customer-layout>
