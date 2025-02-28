   <!-- This allows screen readers to skip the sidebar and go directly to the main content. -->
   <a class="sr-only" href="#main-content">skip to the main content</a>

   <!-- dark overlay for when the sidebar is open on smaller screens  -->
   <div x-cloak x-show="sidebarIsOpen" class="fixed inset-0 z-20 bg-black/10 backdrop-blur-sm md:hidden"
       x-on:click="sidebarIsOpen = false" x-transition.opacity></div>

   <nav x-cloak
       class="fixed left-0 z-30 flex h-svh w-60 shrink-0 flex-col border-r border-slate-200 bg-surface-alt p-4 transition-transform duration-300 md:w-64 md:translate-x-0 md:relative  bg-white"
       x-bind:class="sidebarIsOpen ? 'translate-x-0' : '-translate-x-60'" aria-label="sidebar navigation">
       <!-- logo  -->
       {{-- icon --}}
       <a href="{{ route('home') }}"
           class="inline-flex items-center gap-2 text-orange-500 font-bold text-xl tracking-wide">
           <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-basket size-5" viewBox="0 0 16 16">
               <path
                   d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9zM1 7v1h14V7zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5" />
           </svg>
           <span>Shopsmart</span>
       </a>

       <!-- search  -->
       <div class="relative my-4 flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
               stroke-width="2"
               class="absolute left-2 top-1/2 size-5 -translate-y-1/2 text-on-surface/50 dark:text-on-surface-dark/50">
               <path stroke-linecap="round" stroke-linejoin="round"
                   d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
           </svg>
           <input type="search"
               class="w-full border border-slate-200 rounded bg-surface px-2 py-1.5 pl-9 text-sm outline-none ring-1 ring-transparent hover:border-indigo-500 hover:ring-indigo-500 focus:border-indigo-500 focus:ring-indigo-500 "
               name="search" aria-label="Search" placeholder="Search" />
       </div>

       <!-- sidebar links  -->
       <div class="flex flex-col gap-2 overflow-y-auto pb-6">

           <a href="#"
               class="flex items-center rounded gap-2 px-2 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-200 hover:text-slate-700 ">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0">
                   <path
                       d="M15.5 2A1.5 1.5 0 0 0 14 3.5v13a1.5 1.5 0 0 0 1.5 1.5h1a1.5 1.5 0 0 0 1.5-1.5v-13A1.5 1.5 0 0 0 16.5 2h-1ZM9.5 6A1.5 1.5 0 0 0 8 7.5v9A1.5 1.5 0 0 0 9.5 18h1a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 10.5 6h-1ZM3.5 10A1.5 1.5 0 0 0 2 11.5v5A1.5 1.5 0 0 0 3.5 18h1A1.5 1.5 0 0 0 6 16.5v-5A1.5 1.5 0 0 0 4.5 10h-1Z" />
               </svg>
               <span>Dashboard</span>
           </a>

           <a href="#"
               class="flex items-center rounded gap-2 px-2 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-200 hover:text-slate-700 ">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="size-5 shrink-0">
                   <path
                       d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z" />
               </svg>
               <span>Customers</span>
               <span class="sr-only">active</span>
           </a>

           <div x-data="{ isExpanded: false }" class="flex flex-col">
               <button type="button" x-on:click="isExpanded = ! isExpanded"
                   class="flex items-center justify-between rounded gap-2 px-2 py-1.5 text-sm font-medium"
                   x-bind:class="isExpanded ?
                       ' bg-slate-100 ' :
                       ' hover:bg-slate-200 '">
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                       class="size-5 shrink-0">
                       <path
                           d="M7 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM14.5 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 0 0-1.588-3.755 4.502 4.502 0 0 1 5.874 2.636.818.818 0 0 1-.36.98A7.465 7.465 0 0 1 14.5 16Z" />
                   </svg>
                   <span class="mr-auto text-left">User Management</span>
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                       class="size-5 transition-transform rotate-0 shrink-0"
                       x-bind:class="isExpanded ? 'rotate-180' : 'rotate-0'">
                       <path fill-rule="evenodd"
                           d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                           clip-rule="evenodd" />
                   </svg>
               </button>

               <ul x-cloak x-collapse x-show="isExpanded">
                   <li class="px-1 py-0.5 first:mt-2">
                       <a href="#"
                           class="flex items-center rounded gap-2 px-2 py-1.5 text-sm  underline-offset-2 hover:bg-slate-200">Users</a>
                   </li>
                   <li class="px-1 py-0.5 first:mt-2">
                       <a href="#"
                           class="flex items-center rounded gap-2 px-2 py-1.5 text-sm  underline-offset-2 hover:bg-slate-200">Permissions</a>
                   </li>
                   <li class="px-1 py-0.5 first:mt-2">
                       <a href="#"
                           class="flex items-center rounded gap-2 px-2 py-1.5 text-sm  underline-offset-2 hover:bg-slate-200">Activity
                           Log</a>
                   </li>
               </ul>
           </div>

           <!-- collapsible item  -->
           <div x-data="{ isExpanded: false }" class="flex flex-col">
               <button type="button" x-on:click="isExpanded = ! isExpanded"
                   class="flex items-center justify-between rounded gap-2 px-2 py-1.5 text-sm font-medium underline-offset-2 focus:outline-hidden focus-visible:underline"
                   x-bind:class="isExpanded ?
                       'bg-slate-100' :
                       'hover:bg-slate-200'">
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                       class="size-5 shrink-0">
                       <path
                           d="M10.362 1.093a.75.75 0 0 0-.724 0L2.523 5.018 10 9.143l7.477-4.125-7.115-3.925ZM18 6.443l-7.25 4v8.25l6.862-3.786A.75.75 0 0 0 18 14.25V6.443ZM9.25 18.693v-8.25l-7.25-4v7.807a.75.75 0 0 0 .388.657l6.862 3.786Z" />
                   </svg>
                   <span class="mr-auto text-left">Products</span>
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                       class="size-5 transition-transform rotate-0 shrink-0"
                       x-bind:class="isExpanded ? 'rotate-180' : 'rotate-0'">
                       <path fill-rule="evenodd"
                           d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                           clip-rule="evenodd" />
                   </svg>
               </button>

               <ul x-cloak x-collapse x-show="isExpanded" id="products">
                   <li class="px-1 py-0.5 first:mt-2">
                       <a href="#"
                           class="flex items-center rounded gap-2 px-2 py-1.5 text-sm hover:bg-slate-200">All
                           Products</a>
                   </li>
                   <li class="px-1 py-0.5 first:mt-2">
                       <a href="#"
                           class="flex items-center rounded gap-2 px-2 py-1.5 text-sm hover:bg-slate-200">Inventory</a>
                   </li>
                   <li class="px-1 py-0.5 first:mt-2">
                       <a href="#"
                           class="flex items-center rounded gap-2 px-2 py-1.5 text-sm hover:bg-slate-200">Reviews</a>
                   </li>
               </ul>
           </div>

           <!-- collapsible item  -->
           <div x-data="{ isExpanded: false }" class="flex flex-col">
               <button type="button" x-on:click="isExpanded = ! isExpanded"
                   class="flex items-center justify-between rounded gap-2 px-2 py-1.5 text-sm font-medium"
                   x-bind:class="isExpanded ?
                       'bg-slate-100' :
                       'hover:bg-slate-200'">
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                       class="size-5 shrink-0">
                       <path
                           d="M6.5 3c-1.051 0-2.093.04-3.125.117A1.49 1.49 0 0 0 2 4.607V10.5h9V4.606c0-.771-.59-1.43-1.375-1.489A41.568 41.568 0 0 0 6.5 3ZM2 12v2.5A1.5 1.5 0 0 0 3.5 16h.041a3 3 0 0 1 5.918 0h.791a.75.75 0 0 0 .75-.75V12H2Z" />
                       <path
                           d="M6.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM13.25 5a.75.75 0 0 0-.75.75v8.514a3.001 3.001 0 0 1 4.893 1.44c.37-.275.61-.719.595-1.227a24.905 24.905 0 0 0-1.784-8.549A1.486 1.486 0 0 0 14.823 5H13.25ZM14.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" />
                   </svg>
                   <span class="mr-auto text-left">Orders</span>
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                       class="size-5 transition-transform rotate-0 shrink-0"
                       x-bind:class="isExpanded ? 'rotate-180' : 'rotate-0'">
                       <path fill-rule="evenodd"
                           d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                           clip-rule="evenodd" />
                   </svg>
               </button>

               <ul x-cloak x-collapse x-show="isExpanded">
                   <li class="px-1 py-0.5 first:mt-2">
                       <a href="#"
                           class="flex items-center rounded gap-2 px-2 py-1.5 text-sm text-on-surface hover:bg-slate-200">
                           <span>Pending</span>
                           <span class="ml-auto font-bold">3</span>
                       </a>
                   </li>
                   <li class="px-1 py-0.5 first:mt-2">
                       <a href="#"
                           class="flex items-center rounded gap-2 px-2 py-1.5 text-sm text-on-surface hover:bg-slate-200">
                           <span>Shipped</span>
                           <span class="ml-auto font-bold">12</span>
                       </a>
                   </li>
                   <li class="px-1 py-0.5 first:mt-2">
                       <a href="#"
                           class="flex items-center rounded gap-2 px-2 py-1.5 text-sm text-on-surface hover:bg-slate-200">
                           <span>Completed</span>
                           <span class="ml-auto font-bold">38</span>
                       </a>
                   </li>
                   <li class="px-1 py-0.5 first:mt-2">
                       <a href="#"
                           class="flex items-center rounded gap-2 px-2 py-1.5 text-sm text-on-surface hover:bg-slate-200">
                           <span>Returns</span>
                           <span class="ml-auto font-bold">2</span>
                       </a>
                   </li>
               </ul>
           </div>

           <a href="#"
               class="flex items-center rounded gap-2 px-2 py-1.5 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                   class="size-5 shrink-0">
                   <path fill-rule="evenodd"
                       d="M4.606 12.97a.75.75 0 0 1-.134 1.051 2.494 2.494 0 0 0-.93 2.437 2.494 2.494 0 0 0 2.437-.93.75.75 0 1 1 1.186.918 3.995 3.995 0 0 1-4.482 1.332.75.75 0 0 1-.461-.461 3.994 3.994 0 0 1 1.332-4.482.75.75 0 0 1 1.052.134Z"
                       clip-rule="evenodd" />
                   <path fill-rule="evenodd"
                       d="M5.752 12A13.07 13.07 0 0 0 8 14.248v4.002c0 .414.336.75.75.75a5 5 0 0 0 4.797-6.414 12.984 12.984 0 0 0 5.45-10.848.75.75 0 0 0-.735-.735 12.984 12.984 0 0 0-10.849 5.45A5 5 0 0 0 1 11.25c.001.414.337.75.751.75h4.002ZM13 9a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"
                       clip-rule="evenodd" />
               </svg>
               <span>Sales</span>
           </a>

           <a href="#"
               class="flex items-center rounded gap-2 px-2 py-1.5 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                   class="size-5 shrink-0">
                   <path fill-rule="evenodd"
                       d="M1 2.75A.75.75 0 0 1 1.75 2h16.5a.75.75 0 0 1 0 1.5H18v8.75A2.75 2.75 0 0 1 15.25 15h-1.072l.798 3.06a.75.75 0 0 1-1.452.38L13.41 18H6.59l-.114.44a.75.75 0 0 1-1.452-.38L5.823 15H4.75A2.75 2.75 0 0 1 2 12.25V3.5h-.25A.75.75 0 0 1 1 2.75ZM7.373 15l-.391 1.5h6.037l-.392-1.5H7.373Zm7.49-8.931a.75.75 0 0 1-.175 1.046 19.326 19.326 0 0 0-3.398 3.098.75.75 0 0 1-1.097.04L8.5 8.561l-2.22 2.22A.75.75 0 1 1 5.22 9.72l2.75-2.75a.75.75 0 0 1 1.06 0l1.664 1.663a20.786 20.786 0 0 1 3.122-2.74.75.75 0 0 1 1.046.176Z"
                       clip-rule="evenodd" />
               </svg>
               <span>Performance</span>
           </a>

           <a href="#"
               class="flex items-center rounded gap-2 px-2 py-1.5 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                   class="size-5 shrink-0">
                   <path
                       d="M10 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM6 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM1.49 15.326a.78.78 0 0 1-.358-.442 3 3 0 0 1 4.308-3.516 6.484 6.484 0 0 0-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 0 1-2.07-.655ZM16.44 15.98a4.97 4.97 0 0 0 2.07-.654.78.78 0 0 0 .357-.442 3 3 0 0 0-4.308-3.517 6.484 6.484 0 0 1 1.907 3.96 2.32 2.32 0 0 1-.026.654ZM18 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM5.304 16.19a.844.844 0 0 1-.277-.71 5 5 0 0 1 9.947 0 .843.843 0 0 1-.277.71A6.975 6.975 0 0 1 10 18a6.974 6.974 0 0 1-4.696-1.81Z" />
               </svg>
               <span>Referrals</span>
           </a>

           <a href="#"
               class="flex items-center rounded gap-2 px-2 py-1.5 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                   class="size-5 shrink-0">
                   <path fill-rule="evenodd"
                       d="M1 6a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3H4a3 3 0 0 1-3-3V6Zm4 1.5a2 2 0 1 1 4 0 2 2 0 0 1-4 0Zm2 3a4 4 0 0 0-3.665 2.395.75.75 0 0 0 .416 1A8.98 8.98 0 0 0 7 14.5a8.98 8.98 0 0 0 3.249-.604.75.75 0 0 0 .416-1.001A4.001 4.001 0 0 0 7 10.5Zm5-3.75a.75.75 0 0 1 .75-.75h2.5a.75.75 0 0 1 0 1.5h-2.5a.75.75 0 0 1-.75-.75Zm0 6.5a.75.75 0 0 1 .75-.75h2.5a.75.75 0 0 1 0 1.5h-2.5a.75.75 0 0 1-.75-.75Zm.75-4a.75.75 0 0 0 0 1.5h2.5a.75.75 0 0 0 0-1.5h-2.5Z"
                       clip-rule="evenodd" />
               </svg>
               <span>Licenses</span>
           </a>

           <a href="#"
               class="flex items-center rounded gap-2 px-2 py-1.5 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                   class="size-5 shrink-0">
                   <path fill-rule="evenodd"
                       d="M7.84 1.804A1 1 0 0 1 8.82 1h2.36a1 1 0 0 1 .98.804l.331 1.652a6.993 6.993 0 0 1 1.929 1.115l1.598-.54a1 1 0 0 1 1.186.447l1.18 2.044a1 1 0 0 1-.205 1.251l-1.267 1.113a7.047 7.047 0 0 1 0 2.228l1.267 1.113a1 1 0 0 1 .206 1.25l-1.18 2.045a1 1 0 0 1-1.187.447l-1.598-.54a6.993 6.993 0 0 1-1.929 1.115l-.33 1.652a1 1 0 0 1-.98.804H8.82a1 1 0 0 1-.98-.804l-.331-1.652a6.993 6.993 0 0 1-1.929-1.115l-1.598.54a1 1 0 0 1-1.186-.447l-1.18-2.044a1 1 0 0 1 .205-1.251l1.267-1.114a7.05 7.05 0 0 1 0-2.227L1.821 7.773a1 1 0 0 1-.206-1.25l1.18-2.045a1 1 0 0 1 1.187-.447l1.598.54A6.992 6.992 0 0 1 7.51 3.456l.33-1.652ZM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                       clip-rule="evenodd" />
               </svg>
               <span>Settings</span>
           </a>
       </div>
   </nav>
