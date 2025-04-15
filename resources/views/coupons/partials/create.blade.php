<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Cupom</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="{{ asset('js/keyGenerator.js') }}"></script>
    @include('layouts.sidebar')
    @include('components.messageAlert')
</head>

<body class="flex min-h-screen bg-white">

    <div class="sidebar">
        @yield('sidebar')
    </div>

    <div class="flex items-center justify-center w-full min-h-screen p-4 sm:ml-64 bg-gray-50">
        <div class="bg-white w-full max-w-md flex flex-col rounded-lg px-10 py-8 shadow-[10px_10px_30px_rgba(0,0,0,0.1)]">
            <h1 class="mb-6 text-3xl font-semibold text-center text-gray-900">Novo cupom</h1>

            <div class="mb-4 messageAlert">
                @yield('messageAlert')
            </div>

            <form action="{{ route('coupons.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="key" class="block mb-1 text-sm font-medium text-gray-700">Chave de ativação</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <img src="{{ asset('Imgs/Icons/key.png') }}" alt="Ícone de Chave" class="w-5 h-5">
                    </div>
                    <input type="text" id="key" name="key" placeholder="Exemplo: qWuPi-roS5cY" class="w-full py-2 pl-10 pr-3 text-sm border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
            </div>

            <div>
                <label for="value" class="block mb-1 text-sm font-medium text-gray-700">Valor</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <img src="{{ asset('Imgs/Icons/desconto.png') }}" alt="Ícone de desconto" class="w-5 h-5">
                    </div>
                    <input type="number" min="1" max="100" id="value" name="value" placeholder="Exemplo: 50" class="w-full py-2 pl-10 pr-3 text-sm border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
            </div>

            <input type="submit" value="Criar Cupom" class="w-full bg-[#19231F] hover:bg-green-900 text-white py-2 rounded-lg cursor-pointer transition">

            <hr class="mt-6 border-t">

            <div class="space-y-3">
                <p class="text-sm font-medium text-gray-700">Gerar chave de ativação</p>

                <input type="text" id="keyDisplay" readonly class="w-full p-2 text-center text-gray-700 bg-gray-100 border rounded-lg" placeholder="Sua chave será exibida aqui">

                <div class="flex gap-2">
                    <button type="button" onclick="generateActivationKey()" class="flex-1 py-2 text-white transition bg-green-600 rounded-lg hover:bg-green-700">
                        Gerar Key
                    </button>

                    <button type="button" onclick="copyText()" class="flex-1 py-2 text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                        Copiar Texto
                    </button>
                </div>

                <p id="copiedMessage" class="hidden text-sm text-center text-green-600">Texto copiado!</p>
            </div>
        </form>
        </div>
    </div>
</body>

</html>
