@props(['disabled' => false])

{{-- <input @disabled($disabled)
    {{ $attributes->merge(['class' => 'border-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}> --}}

<input @disabled($disabled)
    {{ $attributes->merge(['class' => 'outline-none border border-slate-200 py-2 px-3 text-sm ring-1 ring-transparent hover:border-indigo-500 hover:ring-indigo-500 focus:border-indigo-500 focus:ring-indigo-500 rounded']) }} />
