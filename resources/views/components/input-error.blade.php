@props(['messages'])

@if ($messages)
    <div class="flex items-start gap-3 p-4 mb-4 text-sm text-red-800 bg-red-100 shadow-lg rounded-2xl" role="alert">
        <div>
            <svg class="inline w-4 h-4 shrink-0 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
        </div>

        <div class="flex-1">
            <span class="font-semibold">Erro!</span>
            <span class="block">
                {{ is_array($messages) ? implode(' ', $messages) : $messages }}
            </span>
        </div>

        <button onclick="this.parentElement.remove();" class="ml-auto">
            <svg class="w-5 h-5 text-red-600 transition rounded hover:bg-red-600 hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
@endif


