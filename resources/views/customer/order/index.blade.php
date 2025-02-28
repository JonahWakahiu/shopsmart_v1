<x-customer-layout>
    <div class="px-3" x-data="orders">

        <div class="border-b border-slate-200">
            <button @click="selectedTab = 'delivered'" type="button"
                :class="selectedTab == 'delivered' && 'border-b-red-500 text-red-500'"
                class="py-2 px-5 border-b-2 border-transparent hover:border-red-500 hover:text-red-500">Ongoing/delivered</button>
            <button @click="selectedTab = 'canceled'" type="button"
                :class="selectedTab == 'canceled' && 'border-b-red-500 text-red-500'"
                class="py-2 px-5 border-b-2 border-transparent hover:border-red-500 hover:text-red-500">canceled/returned</button>
        </div>

        <div class="py-5 h-[600px] overflow-y-auto px-5">
            <div x-cloak x-show="selectedTab == 'delivered'">

                {{-- items --}}
                <div class="space-y-5">
                    <template x-for="item in ongoing_delivered_items" :key="item.id">
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
                                <button class="text-indigo-500 font-medium text-sm">See details</button>

                            </div>
                        </div>
                    </template>
                </div>

            </div>

            <div x-cloak x-show="selectedTab == 'canceled'">

                {{-- items --}}
                <div class="space-y-5">
                    <template x-for="item in canceled_items" :key="item.id">
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
                                <button class="text-indigo-500 font-medium text-sm">See details</button>

                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('orders', () => ({
                    selectedTab: 'delivered',
                    ongoing_delivered_items: {},
                    canceled_items: {},

                    init() {
                        this.ongoing_delivered_items = @json($ongoing_delivered_items);
                        this.canceled_items = @json($cancelled_items);
                        console.log(this.ongoing_delivered_items);
                        console.log(this.canceled_items);
                    }
                }))
            })
        </script>
    @endpush
</x-customer-layout>
