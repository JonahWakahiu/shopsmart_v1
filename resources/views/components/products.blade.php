<div class="bg-white rounded shadow-sm px-5" x-data="products">
    <div class="py-2 border-b border-slate-200">
        <p class="text-2xl font-bold">👍 You may also like</p>
    </div>

    <div class="py-6 grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-5">
        <template x-for="product in products" :key="product.id">
            <a :href="`{{ route('customer.listing', ':id') }}`.replace(':id', product.id)" target="_blank"
                class="p-2 hover:shadow-md hover:scale-105 transition-all duration-300 ease-in-out">
                {{-- product image --}}
                <div class="w-full h-32 rounded-t overflow-hidden relative">
                    <img :src="product.image" alt="product image" class="w-full h-full object-cover object-center">

                    <div class="absolute top-2 w-full flex items-center justify-between pe-2">
                        {{-- product discount --}}
                        <template x-if="product.discount">
                            <div class="border-[10px] border-orange-500 border-r-transparent w-12 relative">
                                <span class="absolute top-1/2 -translate-y-1/2 -left-1 text-white text-xs font-medium"
                                    x-text="product.discount"></span>
                            </div>
                        </template>

                        {{-- add to wishlist --}}
                        <button type="button"
                            class="flex items-center justify-between p-1 rounded-full bg-orange-100 text-orange-500 ms-auto"><svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4"
                                fill="currentColor">
                                <path
                                    d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8l0-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5l0 3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20-.1-.1s0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5l0 3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2l0-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- product details --}}
                <div class="py-3">
                    <p class="line-clamp-2" x-text="product.name"></p>

                    <template x-if="product.discount">
                        <div class="flex items-center gap-2">
                            <p class="font-medium text-red-600" x-text="product.sale_price"></p>
                            <p class="line-through text-sm text-slate-500" x-text="product.price"></p>
                        </div>
                    </template>
                    <template x-if="!product.discount">
                        <p class="font-medium text-red-600" x-text="product.price"></p>
                    </template>

                    {{-- product reviews --}}
                    <template x-if="product.reviews_count > 0">
                        <div class="flex items-center gap-1">
                            <template x-for="i in 5">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                    class="size-4 text-yellow-500" fill="currentColor">
                                    <path x-cloak x-show="i <= product.average_rating"
                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    <path x-cloak x-show="i > product.average_rating"
                                        d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z" />
                                </svg>
                            </template>


                            <span class="text-slate-500 ms-2 text-sm" x-text="'('+product.reviews_count+')'"></span>
                        </div>
                    </template>
                </div>

            </a>
        </template>
    </div>

    <div class="p-5 flex items-center justify-center">
        <button @click="getProducts" type="button"
            class="border-4 border-slate-200 px-10 py-2 font-bold text-slate-600 flex items-center gap-3">
            <svg x-cloak x-show="loading" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                class="size-6 animate-spin" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                xml:space="preserve" fill="#000000">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path style="fill:#2D50A7;"
                        d="M116.364,221.091H23.273C10.42,221.091,0,231.511,0,244.364c0,12.853,10.42,23.273,23.273,23.273 h93.091c12.853,0,23.273-10.42,23.273-23.273C139.636,231.511,129.216,221.091,116.364,221.091z">
                    </path>
                    <path style="fill:#73A1FB;"
                        d="M488.727,221.091h-93.091c-12.853,0-23.273,10.42-23.273,23.273c0,12.853,10.42,23.273,23.273,23.273 h93.091c12.853,0,23.273-10.42,23.273-23.273C512,231.511,501.58,221.091,488.727,221.091z">
                    </path>
                    <path style="fill:#355EC9;"
                        d="M140.805,326.645L74.98,392.471c-9.089,9.089-9.089,23.823,0,32.912 c4.544,4.544,10.501,6.816,16.457,6.816s11.913-2.273,16.455-6.816l65.825-65.826c9.089-9.089,9.089-23.824,0-32.912 S149.892,317.556,140.805,326.645z">
                    </path>
                    <g>
                        <path style="fill:#C4D9FD;"
                            d="M256,11.636c-12.853,0-23.273,10.42-23.273,23.273v46.545c0,12.853,10.42,23.273,23.273,23.273 c12.853,0,23.273-10.42,23.273-23.273V34.909C279.273,22.056,268.853,11.636,256,11.636z">
                        </path>
                        <path style="fill:#C4D9FD;"
                            d="M404.105,63.344L338.28,129.17c-9.089,9.089-9.089,23.824,0,32.912 c4.544,4.544,10.501,6.817,16.457,6.817s11.913-2.273,16.455-6.817l65.825-65.826c9.089-9.089,9.089-23.824,0-32.912 C427.93,54.255,413.192,54.255,404.105,63.344z">
                        </path>
                    </g>
                    <path style="fill:#3D6DEB;"
                        d="M256,360.727c-12.853,0-23.273,10.42-23.273,23.273v93.091c0,12.853,10.42,23.273,23.273,23.273 c12.853,0,23.273-10.42,23.273-23.273V384C279.273,371.147,268.853,360.727,256,360.727z">
                    </path>
                    <path style="fill:#5286FA;"
                        d="M371.192,326.645c-9.086-9.089-23.824-9.089-32.912,0c-9.089,9.087-9.089,23.824,0,32.912 l65.825,65.826c4.544,4.544,10.501,6.816,16.457,6.816c5.955,0,11.913-2.273,16.455-6.816c9.089-9.089,9.089-23.824,0-32.912 L371.192,326.645z">
                    </path>
                </g>
            </svg>
            <span>SHOW MORE</span>
        </button>

    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('products', () => ({
                products: @json($products),
                prevNumber: 24,
                loading: false,

                async getProducts() {
                    try {
                        this.loading = true;
                        const response = await axios.get('{{ route('customer.products.get') }}', {
                            params: {
                                prevNumber: this.prevNumber,
                            }
                        });

                        if (response.status == 200) {
                            this.loading = false;
                            this.products = response.data.products;
                            this.prevNumber = response.data.currNumber;
                        }
                    } catch (error) {
                        this.loading = false;
                        console.log(error);
                    }
                }
            }))
        })
    </script>
@endpush
