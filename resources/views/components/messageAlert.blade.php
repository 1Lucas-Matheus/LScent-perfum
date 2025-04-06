@section('messageAlert')
    @if(session('messageSuccess') || session('messageError'))
        <div class="flex items-start gap-3 p-4 mb-4 text-sm rounded-2xl shadow-lg 
            @if(session('messageSuccess')) bg-green-100 text-green-800 @endif
            @if(session('messageError')) bg-red-100 text-red-800 @endif"
            role="alert">

            <div>
                @if(session('messageSuccess'))
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                @endif

                @if(session('messageError'))
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                @endif
            </div>

            <div class="flex-1">
                @if(session('messageSuccess'))
                    <label class="font-semibold">Sucesso! {{ session('messageSuccess') }}</label>
                @endif

                @if(session('messageError'))
                    <label class="font-semibold">Erro! {{ session('messageError') }}</label>
                @endif
            </div>

            <button onclick="this.parentElement.remove();" class="ml-auto">
                <svg class="w-5 h-5 text-red-600 hover:bg-red-600 hover:text-white rounded transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    @endif
@endsection
