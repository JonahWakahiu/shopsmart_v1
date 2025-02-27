<x-customer-layout>
    <div x-data="cart">

        <template x-if="!items.length > 0">
            <div class="w-full bg-white py-10 rounded grid place-items-center">
                <div class="flex flex-col items-center gap-2">
                    <img src="{{ asset('images/empty-cart.jpg') }}" alt="empty cart" class="size-72">
                    <p class="text-xl font-semibold">Your cart is empty</p>
                    <p class="text-sm text-slate-500">You can add some items here before you check out</p>
                    <button type="button"
                        class="border border-orange-500 rounded px-7 py-1.5 text-sm font-medium tracking-wide">Go
                        Shopping</button>
                </div>
            </div>
        </template>

        <template x-if="items.length > 0">
            <div class="grid md:grid-cols-5 gap-5">
                {{-- displaying cart items --}}

                <div class="md:col-span-4">
                    {{-- badge for showing total cart items --}}
                    <div class="bg-orange-500 text-white flex items-center justify-between px-5 py-3 rounded">
                        <p>There are <span x-text="items.length"></span> items in your cart </p>

                        {{-- remove all the items from the cart --}}
                        <button @click="clearCart" type="button" class="underline">Clear cart</button>
                    </div>

                    <div class="space-y-5">
                        <template x-for="item in items" :key="item.id">
                            <div class="bg-white rounded shadow-sm">

                                <div class="px-5 py-3 flex items-start pb-5">
                                    {{-- item image --}}
                                    <div class="me-3">
                                        <div class="size-16 rounded overflow-hidden">
                                            <img :src="item.variation ? (item.variation.image ? item.variation.image : item.product
                                                .image) : item.product.image"
                                                alt="product image" class="w-full h-full object-cover h-cover">
                                        </div>
                                    </div>

                                    {{-- item details --}}
                                    <div class="flex-1 ps-3 space-y-2">
                                        {{-- item name --}}
                                        <p class="line-clamp-1" x-text="item.product.name"></p>

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

                                        {{-- adjust item quantity --}}
                                        <div class="flex items-center gap-1">
                                            {{-- decrease button --}}
                                            <button @click="decreaseQuantity(item)" type="button"
                                                class="bg-slate-200 shadow-sm shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    class="bi bi-dash size-5" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                                                </svg>
                                            </button>

                                            {{-- quantity --}}
                                            <p class="leading-none bg-slate-200 py-[2px] px-1 shrink-0"
                                                x-text="item.quantity"></p>

                                            {{-- increase button --}}
                                            <button @click="increaseQuantity(item)" type="button"
                                                class="bg-slate-200 shadow-sm shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    class="bi bi-plus size-5" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                                </svg>
                                            </button>
                                        </div>

                                    </div>

                                    {{-- item price and discount details --}}
                                    <div class="shrink-0">
                                        <p class="text-sm text-right">Item price</p>

                                        <template x-if="!item.variation">
                                            <div>
                                                <template x-if="item.product.sale_price">
                                                    <div class="flex items-center gap-2">
                                                        <span x-text="item.product.sale_price"></span>
                                                        <span class="line-through text-sm text-slate-500"
                                                            x-text="item.product.price">
                                                        </span>
                                                    </div>
                                                </template>

                                                <template x-if="!item.product.sale_price">
                                                    <p x-text="item.product.price"></p>
                                                </template>
                                            </div>
                                        </template>

                                        <template x-if="item.variation">
                                            <div>
                                                <template
                                                    x-if="item.variation.sale_price && item.variation.price !== null">
                                                    <div class="flex items-center gap-2">
                                                        <span x-text="item.variation.sale_price"></span>
                                                        <span class="line-through text-sm text-slate-500"
                                                            x-text="item.variation.price">
                                                        </span>
                                                    </div>
                                                </template>

                                                <template x-if="item.variation.sale_price == null">
                                                    <p x-text="item.variation.price"></p>
                                                </template>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                                {{-- item footer --}}
                                <div class="bg-slate-50 px-5 py-2 flex items-center gap-5">
                                    {{-- remove the item from the cart --}}
                                    <button @click="removeItem(item)" type="button"
                                        class="inline-flex items-center gap-2">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="size-5">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M3 6.38597C3 5.90152 3.34538 5.50879 3.77143 5.50879L6.43567 5.50832C6.96502 5.49306 7.43202 5.11033 7.61214 4.54412C7.61688 4.52923 7.62232 4.51087 7.64185 4.44424L7.75665 4.05256C7.8269 3.81241 7.8881 3.60318 7.97375 3.41617C8.31209 2.67736 8.93808 2.16432 9.66147 2.03297C9.84457 1.99972 10.0385 1.99986 10.2611 2.00002H13.7391C13.9617 1.99986 14.1556 1.99972 14.3387 2.03297C15.0621 2.16432 15.6881 2.67736 16.0264 3.41617C16.1121 3.60318 16.1733 3.81241 16.2435 4.05256L16.3583 4.44424C16.3778 4.51087 16.3833 4.52923 16.388 4.54412C16.5682 5.11033 17.1278 5.49353 17.6571 5.50879H20.2286C20.6546 5.50879 21 5.90152 21 6.38597C21 6.87043 20.6546 7.26316 20.2286 7.26316H3.77143C3.34538 7.26316 3 6.87043 3 6.38597Z"
                                                    fill="#1C274C"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9.42543 11.4815C9.83759 11.4381 10.2051 11.7547 10.2463 12.1885L10.7463 17.4517C10.7875 17.8855 10.4868 18.2724 10.0747 18.3158C9.66253 18.3592 9.29499 18.0426 9.25378 17.6088L8.75378 12.3456C8.71256 11.9118 9.01327 11.5249 9.42543 11.4815Z"
                                                    fill="#1C274C"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M14.5747 11.4815C14.9868 11.5249 15.2875 11.9118 15.2463 12.3456L14.7463 17.6088C14.7051 18.0426 14.3376 18.3592 13.9254 18.3158C13.5133 18.2724 13.2126 17.8855 13.2538 17.4517L13.7538 12.1885C13.795 11.7547 14.1625 11.4381 14.5747 11.4815Z"
                                                    fill="#1C274C"></path>
                                                <path opacity="0.5"
                                                    d="M11.5956 22.0001H12.4044C15.1871 22.0001 16.5785 22.0001 17.4831 21.1142C18.3878 20.2283 18.4803 18.7751 18.6654 15.8686L18.9321 11.6807C19.0326 10.1037 19.0828 9.31524 18.6289 8.81558C18.1751 8.31592 17.4087 8.31592 15.876 8.31592H8.12405C6.59127 8.31592 5.82488 8.31592 5.37105 8.81558C4.91722 9.31524 4.96744 10.1037 5.06788 11.6807L5.33459 15.8686C5.5197 18.7751 5.61225 20.2283 6.51689 21.1142C7.42153 22.0001 8.81289 22.0001 11.5956 22.0001Z"
                                                    fill="#1C274C"></path>
                                            </g>
                                        </svg>
                                        <span>Remove</span>
                                    </button>

                                    {{-- add the item to wish list and view it later --}}
                                    <button type="button" class="inline-flex items-center gap-2">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="size-5">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.10627 18.2468C5.29819 16.0833 2 13.5422 2 9.1371C2 4.27416 7.50016 0.825464 12 5.50063V20.5C11 20.5 10 19.7294 8.96173 18.9109C8.68471 18.6925 8.39814 18.4717 8.10627 18.2468Z"
                                                    fill="#1C274C"></path>
                                                <path
                                                    d="M15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063V20.5C13 20.5 14 19.7294 15.0383 18.9109Z"
                                                    fill="#1C274C"></path>
                                            </g>
                                        </svg>
                                        <span>Add wishlist</span>
                                    </button>

                                    {{-- item total --}}
                                    <div class="ms-auto text-sm">
                                        <span class="text-slate-500">Total:</span>
                                        <span x-text="item.total"></span>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>



                {{-- displaying cart summary --}}
                <div class="md:col-span-1">
                    <div class="rounded bg-white shadow-sm">
                        <div class="px-5 py-2 font-semibold">
                            <p>Order summary</p>
                        </div>

                        <div class="px-5 py-3 space-y-5">
                            {{-- cart sub total --}}
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center gap-2 text-slate-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        class="size-4 shrink-0" fill="currentColor">
                                        <path
                                            d="M320 96L192 96 144.6 24.9C137.5 14.2 145.1 0 157.9 0L354.1 0c12.8 0 20.4 14.2 13.3 24.9L320 96zM192 128l128 0c3.8 2.5 8.1 5.3 13 8.4C389.7 172.7 512 250.9 512 416c0 53-43 96-96 96L96 512c-53 0-96-43-96-96C0 250.9 122.3 172.7 179 136.4c0 0 0 0 0 0s0 0 0 0c4.8-3.1 9.2-5.9 13-8.4zm84 88c0-11-9-20-20-20s-20 9-20 20l0 14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1c0 0 0 0 0 0s0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4l0 14.6c0 11 9 20 20 20s20-9 20-20l0-13.8c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15c0 0 0 0 0 0l-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7l0-13.9z" />
                                    </svg>
                                    <span>Sub Total:</span>
                                </div>

                                <p x-text="cart.subtotal"></p>
                            </div>

                            {{-- cart discount --}}
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center gap-2 text-slate-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                        class="size-4 shrink-0" fill="currentColor">
                                        <path
                                            d="M14 2.2C22.5-1.7 32.5-.3 39.6 5.8L80 40.4 120.4 5.8c9-7.7 22.3-7.7 31.2 0L192 40.4 232.4 5.8c9-7.7 22.3-7.7 31.2 0L304 40.4 344.4 5.8c7.1-6.1 17.1-7.5 25.6-3.6s14 12.4 14 21.8l0 464c0 9.4-5.5 17.9-14 21.8s-18.5 2.5-25.6-3.6L304 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L192 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L80 471.6 39.6 506.2c-7.1 6.1-17.1 7.5-25.6 3.6S0 497.4 0 488L0 24C0 14.6 5.5 6.1 14 2.2zM96 144c-8.8 0-16 7.2-16 16s7.2 16 16 16l192 0c8.8 0 16-7.2 16-16s-7.2-16-16-16L96 144zM80 352c0 8.8 7.2 16 16 16l192 0c8.8 0 16-7.2 16-16s-7.2-16-16-16L96 336c-8.8 0-16 7.2-16 16zM96 240c-8.8 0-16 7.2-16 16s7.2 16 16 16l192 0c8.8 0 16-7.2 16-16s-7.2-16-16-16L96 240z" />
                                    </svg>
                                    <span>Discount:</span>
                                </div>

                                <p x-text="cart.discount"></p>
                            </div>

                            {{-- cart delivery charge --}}
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center gap-2 text-slate-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                        class="size-4 shrink-0" fill="currentColor">
                                        <path
                                            d="M48 0C21.5 0 0 21.5 0 48L0 368c0 26.5 21.5 48 48 48l16 0c0 53 43 96 96 96s96-43 96-96l128 0c0 53 43 96 96 96s96-43 96-96l32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64 0-32 0-18.7c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7L416 96l0-48c0-26.5-21.5-48-48-48L48 0zM416 160l50.7 0L544 237.3l0 18.7-128 0 0-96zM112 416a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm368-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                    </svg>
                                    <span>Delivery Charge:</span>
                                </div>

                                <p x-text="cart.delivery_charge"></p>
                            </div>

                            {{-- cart estimated tax --}}
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center gap-2 text-slate-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        class="size-4 shrink-0" fill="currentColor">
                                        <path
                                            d="M64 0C46.3 0 32 14.3 32 32l0 64c0 17.7 14.3 32 32 32l80 0 0 32-57 0c-31.6 0-58.5 23.1-63.3 54.4L1.1 364.1C.4 368.8 0 373.6 0 378.4L0 448c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-69.6c0-4.8-.4-9.6-1.1-14.4L488.2 214.4C483.5 183.1 456.6 160 425 160l-217 0 0-32 80 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32L64 0zM96 48l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L96 80c-8.8 0-16-7.2-16-16s7.2-16 16-16zM64 432c0-8.8 7.2-16 16-16l352 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16zm48-168a24 24 0 1 1 0-48 24 24 0 1 1 0 48zm120-24a24 24 0 1 1 -48 0 24 24 0 1 1 48 0zM160 344a24 24 0 1 1 0-48 24 24 0 1 1 0 48zM328 240a24 24 0 1 1 -48 0 24 24 0 1 1 48 0zM256 344a24 24 0 1 1 0-48 24 24 0 1 1 0 48zM424 240a24 24 0 1 1 -48 0 24 24 0 1 1 48 0zM352 344a24 24 0 1 1 0-48 24 24 0 1 1 0 48z" />
                                    </svg>
                                    <span>Estimated Tax:</span>
                                </div>

                                <p x-text="cart.estimated_tax"></p>
                            </div>
                        </div>

                        {{-- cart total --}}
                        <div class="bg-slate-50 px-5 py-2 space-y-2">
                            <div class="flex items-center justify-between font-semibold">
                                <p>Total</p>
                                <p x-text="cart.total"></p>
                            </div>

                            <button
                                class="bg-indigo-500 text-white py-1.5 w-full rounded hover:bg-indigo-500/80">Proceed
                                to Checkout</button>

                            <div class="flex items-center justify-center gap-4">
                                <span class="text-slate-500">or</span>

                                <a href="{{ route('home') }}"
                                    class="flex items-center gap-2 underline hover:no-underline text-indigo-500 text-sm font-medium">
                                    <span>Continue Shopping</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                        class="size-4 shrink-0" fill="currentColor">
                                        <path
                                            d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                                    </svg>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('cart', () => ({
                    items: @json($cart).items,
                    cart: @json($cart),

                    increaseQuantity(item) {
                        let maxVal = item.variation ? item.variation.stock : item.product.stock;
                        let unmodifiedQuantity = item.quantity;

                        if (maxVal !== null) {
                            if (item.quantity < maxVal) {
                                item.quantity++;
                            }
                        } else {
                            item.quantity++;
                        }

                        if (unmodifiedQuantity !== item.quantity) {
                            this.updateItems(item.product.id, item.variation?.id, item.quantity);
                        }
                    },

                    decreaseQuantity(item) {
                        let minVal = 0;
                        let unmodifiedQuantity = item.quantity;

                        if (item.quantity > minVal) {
                            item.quantity--;
                        }

                        if (unmodifiedQuantity !== item.quantity) {
                            this.updateItems(item.product.id, item.variation?.id, item.quantity);
                        }
                    },

                    async getItems() {
                        try {
                            const response = await axios.get('{{ route('cart.items') }}');
                            if (response.status == 200) {
                                this.items = response.data.cart.items;
                                this.cart = response.data.cart;
                            }
                        } catch (error) {
                            console.log(error);
                        }
                    },

                    async updateItems(productId, variationId, quantity) {
                        try {
                            const response = await axios.put('{{ route('cart.update') }}', {
                                product_id: productId,
                                variation_id: variationId ? variationId : null,
                                quantity: quantity,
                            });

                        } catch (error) {
                            console.log(error);
                        }
                    },

                    async clearCart() {
                        if (confirm('Are you sure?')) {
                            try {
                                const response = await axios.delete('{{ route('cart.destroy') }}');

                                if (response.status == 200) {
                                    this.getItems();
                                }
                            } catch (error) {
                                console.log(error);
                            }
                        }
                    },

                    async removeItem(item) {
                        if (confirm('Are you sure?')) {
                            try {
                                const response = await axios.delete(`{{ route('cart.destroy', ':id') }}`
                                    .replace(':id', item.id));

                                if (response.status == 200) {
                                    this.getItems();
                                }
                            } catch (error) {
                                console.log(error);
                            }
                        }
                    },

                    init() {
                        Echo.private('cart.{{ auth()->user()->cart?->id }}').listen('CartUpdated', (e) => {
                            this.getItems();
                        });
                    }
                }))
            })
        </script>
    @endpush
</x-customer-layout>
