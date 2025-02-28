<x-main-layout>
    <nav class="flex items-center container mx-auto py-4">
        {{-- icon --}}
        <a href="{{ route('home') }}"
            class="inline-flex items-center gap-2 text-orange-500 font-semibold text-lg tracking-wide">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-basket size-5" viewBox="0 0 16 16">
                <path
                    d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9zM1 7v1h14V7zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5" />
            </svg>
            <span>Shopsmart</span>
        </a>

        <div class="ms-auto flex items-center gap-3">
            <!-- cart icon -->
            <a href="{{ route('customer.cart.index') }}" class="relative">
                @auth
                    <div x-data="{ count: {{ auth()->user()->cart ? (auth()->user()->cart->items ? auth()->user()->cart->items->count() : 0) : 0 }} }" x-cloak x-show="count > 0" x-init="Echo.private('cart.{{ auth()->user()->cart?->id }}').listen('CartUpdated', (e) => {
                        count = e.count;
                    })"
                        class="absolute right-0 top-0 translate-x-1/2 -translate-y-1/2" x-init="Echo.private('users.{{ auth()->id() }}')">
                        <p class="flex items-center justify-center size-2 text-sm bg-red-500 text-white p-2.5 rounded-full"
                            x-text="count">

                        </p>
                    </div>
                @endauth
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cart3 size-5"
                    viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                </svg>
            </a>

            {{-- notification icon --}}
            <button type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bell size-5"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                </svg>
            </button>

            {{-- user dropdown --}}
            <div x-data="{ showDropdown: false }" class="flex items-center justify-center relative">
                <button @click="showDropdown = !showDropdown" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person size-5"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                </button>

                <div x-cloak x-show="showDropdown" class="absolute top-full -right-3 mt-4 z-20">
                    <div
                        class="absolute right-3 rotate-45 size-4 top-0 -translate-y-1/2 bg-white border-l border-t border-l-slate-200 border-t-slate-200 rounded">

                    </div>
                    <div class="rounded-md bg-white w-64 shadow-md border border-slate-200">

                        <div class="py-5 flex items-center flex-col">
                            @guest
                                <img src="{{ asset('images/avatar-placeholder.svg') }}" alt=""
                                    class="size-14 rounded-full object-cover object-center">

                                <p class="text-sm font-medium mt-1">Welcome to shopsmart</p>
                            @endguest

                            @auth
                                <img src="{{ auth()->user()->avatar }}" alt=""
                                    class="size-14 rounded-full object-cover object-center">

                                <p class="text-sm font-medium mt-1">{{ auth()->user()->name }}</p>
                            @endauth
                        </div>
                        <div class="text-sm">
                            <a href="{{ route('customer.profile') }}"
                                class="inline-flex items-center gap-2 px-3 py-1.5 hover:bg-slate-100 w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                </svg>
                                <span>Profile</span></a>
                            <a href="{{ route('customer.orders.index') }}"
                                class="inline-flex items-center gap-2 px-3 py-1.5 hover:bg-slate-100 w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                    <path
                                        d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9zM1 7v1h14V7zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5" />
                                </svg>
                                <span>Orders</span></a>
                            <a href=""
                                class="inline-flex items-center gap-2 px-3 py-1.5 hover:bg-slate-100 w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path
                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                </svg>
                                <span>Wishlist</span></a>
                        </div>
                        <div class="border-t border-slate-200 p-3 mt-3">
                            @guest
                                <a href="{{ route('login') }}"
                                    class="border border-slate-200 bg-slate-100 rounded py-1.5 w-full flex items-center justify-center gap-2 text-sm hover:bg-slate-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-box-arrow-in-right size-5" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                        <path fill-rule="evenodd"
                                            d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                    </svg>
                                    <span>Sign In</span>
                                </a>
                            @endguest

                            @auth
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="border border-slate-200 bg-slate-100 rounded py-1.5 w-full flex items-center justify-center gap-2 text-sm hover:bg-slate-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            class="bi bi-box-arrow-left size-5" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                                            <path fill-rule="evenodd"
                                                d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                                        </svg>
                                        <span>Sign Out</span>
                                    </button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <main class="container mx-auto">
        {{ $slot }}
    </main>

    <footer
        class="mt-10 bg-indigo-100 p-5 container mx-auto rounded grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 text-sm">
        <div>
            <a href="{{ route('home') }}"
                class="inline-flex items-center gap-2 text-orange-500 font-semibold tracking-wide mb-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-basket size-5"
                    viewBox="0 0 16 16">
                    <path
                        d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9zM1 7v1h14V7zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5" />
                </svg>
                <span>Shopsmart</span>
            </a>

            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde iste excepturi autem
                tenetur harum
                aspernatur architecto expedita tempora eligendi inventore.</p>
        </div>


        <div class="">
            <p class="mb-5 font-semibold ">Stay Connected</p>

            <div class="space-y-1">
                <a href="">Blogs</a>

                <a href="" class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4"
                        fill="currentColor">
                        <path
                            d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64h98.2V334.2H109.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H255V480H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z" />
                    </svg><span>Facebook</span></a>
                <a href="" class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4"
                        fill="currentColor">
                        <path
                            d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm297.1 84L257.3 234.6 379.4 396H283.8L209 298.1 123.3 396H75.8l111-126.9L69.7 116h98l67.7 89.5L313.6 116h47.5zM323.3 367.6L153.4 142.9H125.1L296.9 367.6h26.3z" />
                    </svg><span>Twitter</span></a>
            </div>

        </div>

        <div class="">
            <p class="font-semibold mb-5">Payment method</p>

            <div class="space-y-1">
                <p>Cash on Delivery</p>
                <p>Credit/Debit Card</p>
                <p>Paypal</p>
            </div>
        </div>
    </footer>

    <footer class="container mx-auto px-5 py-2 text-sm">
        Copyright © {{ date('Y') }} All rights reserved | This website is made with ❤️ by Jonahdevs
    </footer>
</x-main-layout>
