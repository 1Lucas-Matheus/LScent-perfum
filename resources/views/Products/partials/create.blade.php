<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/imask"></script>
    @include('layouts.sidebar')
    @include('components.messageAlert')
</head>

<body class="flex min-h-screen bg-white">

    <div class="sidebar">
        @yield('sidebar')
    </div>

    <div class="flex items-center justify-center w-full min-h-screen p-4 sm:ml-64 bg-gray-50">
        <div class="bg-white w-full max-w-md flex flex-col rounded-lg px-10 py-8 shadow-[10px_10px_30px_rgba(0,0,0,0.1)]">
            <h1 class="mb-6 text-3xl font-semibold text-center text-gray-900">Novo Produto</h1>

            <div class="mb-4 messageAlert">
                @yield('messageAlert')
            </div>

            <form action="{{ route('products.store') }}" method="post" class="flex flex-col w-full">
                @csrf
                <label for="name" class="block mb-1 text-sm text-gray-900">Nome do Produto</label>
                <input type="text" id="name" name="name" class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-3" placeholder="Ex: Malbec X" required>

                <label for="price" class="block mb-1 text-sm text-gray-900">Preço Unidade (R$)</label>
                <input type="number" id="price" name="price" class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-3" placeholder="Ex: 199,90" required>

                <label for="quantity" class="block mb-1 text-sm text-gray-900">Quantidade</label>
                <input type="number" min="0" max="10000" step=".01" id="quantity" name="quantity" class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-3" placeholder="Ex: 20" required>

                <label for="category" class="block mb-1 text-sm text-gray-900">Categoria</label>
                <select id="category" name="category_id" class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-3" required>
                    <option value="" disabled selected>Selecione uma categoria</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <div class="flex items-center">
                    <input type="checkbox" id="promoCheckbox" class="mr-2" onchange="togglePromoPrice()">
                    <label for="promoCheckbox" class="text-gray-900">Aplicar desconto</label>
                </div>

                <div id="promo-value-container" class="hidden mt-3">
                    <label for="promo_value" class="block mb-1 text-sm text-gray-900">Desconto (%)</label>
                    <input type="number" min="0" max="100" id="promo_value" name="promo" class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Ex: 20">
                    <span class="text-sm text-gray-500">Informe o percentual de desconto. O valor final será calculado automaticamente.</span>
                </div>

                <div class="flex justify-end gap-3 mt-4 mb-3">
                    <a href="{{ route('products.index') }}"
                        class="px-5 py-2 font-medium text-white transition duration-300 bg-gray-700 rounded-lg hover:bg-red-800">
                        Cancelar
                    </a>
                    <input type="submit" value="Salvar" class="bg-[#19231F] hover:bg-green-900 px-6 py-2 rounded-lg text-white font-medium transition duration-300 cursor-pointer">
                </div>
            </form>
        </div>
    </div>

    <script>
        IMask(priceInput, {
            mask: Number,
            scale: 2,
            signed: false,
            thousandsSeparator: '.',
            padFractionalZeros: true,
            normalizeZeros: true,
            radix: ',',
            min: 0,
            max: 9999.99,
        });

        function togglePromoPrice() {
            var promoPriceContainer = document.getElementById('promo-value-container');
            var promoCheckbox = document.getElementById('promoCheckbox');

            if (promoCheckbox.checked) {
                promoPriceContainer.classList.remove('hidden');
            } else {
                promoPriceContainer.classList.add('hidden');
            }
        }

        togglePromoPrice();
    </script>
</body>

</html>
