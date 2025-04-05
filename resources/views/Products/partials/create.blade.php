<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="{{ asset('js/offer.js') }}"></script>
</head>

<body class="bg-white flex min-h-screen">
    <div class="flex justify-center items-center w-full h-screen">
        <div class="bg-white w-[400px] flex flex-col rounded-lg px-10 shadow-[10px_10px_30px_rgba(0,0,0,0.2)] items-center justify-center">
            <h1 class="text-gray-900 my-6 text-4xl font-semibold text-center">Novo Produto</h1>

            @if(session('messageError') || session('messageSuccess'))
            <div class="flex items-center p-4 mb-4 text-sm @if(session('messageSuccess')) text-green-800 @endif @if(session('messageError')) text-red-800 @endif rounded-lg @if(session('messageSuccess')) bg-green-50 @endif @if(session('messageError')) bg-red-50 @endif shadow-[0px_10px_30px_rgba(0,0,0,0.2)]" role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    @if(session('messageSuccess'))
                    <span class="font-medium">Sucesso! </span>{{session('messageSuccess')}}
                    @endif

                    @if(session('messageError'))
                    <span class="font-medium">Falha! </span>{{session('messageError')}}
                    @endif
                </div>
            </div>
            @endif

            <form action="{{ route('products.store') }}" method="post" class="w-full flex flex-col">
                @csrf
                <label for="name" class="block mb-1 text-sm text-gray-900">Nome do Produto</label>
                <input type="text" id="name" name="name" class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-3" placeholder="Ex: Malbec X" required>

                <label for="price" class="block mb-1 text-sm text-gray-900">Preço Unidade (R$)</label>
                <input type="number" min="0" max="10000" step=".01" id="price" name="price" class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-3" placeholder="Ex: 199.90" required>


                <label for="quantity" class="block mb-1 text-sm text-gray-900">Quantidade</label>
                <input type="number" min="0" max="10000" step=".01" id="quantity" name="quantity" class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-3" placeholder="Ex: 199.90" required>

                <label for="category" class="block mb-1 text-sm text-gray-900">Categoria</label>
                <select id="category" name="category_id" class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-3" required>
                    <option value="" disabled selected>Selecione uma categoria</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>


                <div class="flex items-center">
                    <input type="checkbox" id="promo" name="promo" class="mr-2">
                    <label for="promo" class="text-gray-900">Aplicar desconto</label>
                </div>

                <div id="promo-price-container" class="hidden mt-3">
                    <label for="promo_price" class="block mb-1 text-sm text-gray-900">Desconto (%)</label>
                    <input type="number" min="1" max="100" id="promo" name="promo" class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Ex: 20">
                    <span class="text-gray-500 text-sm">Informe o percentual de desconto. O valor final será calculado automaticamente.</span>
                </div>

                <div class="flex justify-end gap-3 mt-4 mb-3">
                    <a href="{{ route('products.index') }}"
                        class="bg-gray-700 hover:bg-red-800 px-5 py-2 rounded-lg text-white font-medium transition duration-300">
                        Cancelar
                    </a>
                    <input type="submit" value="Salvar" class="bg-[#19231F] hover:bg-green-900 px-6 py-2 rounded-lg text-white font-medium transition duration-300 cursor-pointer">
                </div>
            </form>
        </div>
    </div>
</body>

</html>