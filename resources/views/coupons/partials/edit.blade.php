<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Cupom</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="{{ asset('js/keyGenerator.js') }}"></script>
    @include('components.messageAlert')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <main class="bg-white w-full max-w-md p-8 rounded-xl shadow-lg space-y-6">
        <h1 class="text-slate-900 text-center text-3xl font-bold">Criar Cupom</h1>

        <div class="messageAlert mb-4">
            @yield('messageAlert')
        </div>

        <form action="{{ route('coupons.update', ['coupom' => $coupom->id]) }}" method="POST" class="space-y-5">
            @csrf

            <input type="hidden" name="_method" value="put">
            <div>
                <label for="key" class="block text-sm font-medium text-gray-700 mb-1">Chave de ativação</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <img src="{{ asset('Imgs/Icons/key.png') }}" alt="Ícone de Chave" class="w-5 h-5">
                    </div>
                    <input type="text" id="key" name="key" placeholder="Exemplo: qWuPi-roS5cY" class="pl-10 pr-3 py-2 w-full text-sm border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $coupom->key }}" required>
                </div>
            </div>

            <div>
                <label for="value" class="block text-sm font-medium text-gray-700 mb-1">Valor</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <img src="{{ asset('Imgs/Icons/desconto.png') }}" alt="Ícone de desconto" class="w-5 h-5">
                    </div>
                    <input type="number" min="1" max="100" id="value" name="value" placeholder="Exemplo: 50" class="pl-10 pr-3 py-2 w-full text-sm border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $coupom->value }}" required>
                </div>
            </div>

            <input type="submit" value="Atualizar Cupom" class="w-full bg-[#19231F] hover:bg-green-900 text-white py-2 rounded-lg cursor-pointer transition">

            <hr class="border-t mt-6">

            <div class="space-y-3">
                <p class="text-sm text-gray-700 font-medium">Gerar nova chave de ativação</p>

                <input type="text" id="keyDisplay" readonly class="text-center w-full border rounded-lg p-2 bg-gray-100 text-gray-700" placeholder="Sua chave será exibida aqui">

                <div class="flex gap-2">
                    <button type="button" onclick="generateActivationKey()" class="flex-1 bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg transition">
                        Gerar Key
                    </button>

                    <button type="button" onclick="copyText()" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition">
                        Copiar Texto
                    </button>
                </div>

                <p id="copiedMessage" class="text-green-600 text-sm text-center hidden">Texto copiado!</p>
            </div>
        </form>
    </main>
</body>

</html>