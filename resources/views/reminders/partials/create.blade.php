<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="{{ asset('js/offer.js') }}"></script>
    @include('layouts.sidebar')
    @include('components.messageAlert')
</head>

<body class="flex min-h-screen bg-white">

    <div class="sidebar">
        @yield('sidebar')
    </div>

    <div class="flex items-center justify-center w-full min-h-screen p-4 sm:ml-64 bg-gray-50">
        <div class="bg-white w-full max-w-md flex flex-col rounded-lg px-10 py-8 shadow-[10px_10px_30px_rgba(0,0,0,0.1)]">
            <h1 class="mb-6 text-3xl font-semibold text-center text-gray-900">Novo lembrete</h1>

            <div class="mb-4 messageAlert">
                @yield('messageAlert')
            </div>

            <form action="{{ route('reminders.store') }}" method="post" class="flex flex-col w-full">
                @csrf
                <label for="reminder" class="block mb-1 text-sm text-gray-900">Lembrete</label>
                <input type="text" id="reminder" name="reminder" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-3" placeholder="Ex: Pagamento futuro" required>

                <label for="date" class="block mb-1 text-sm text-gray-900">Data</label>
                <input type="text" id="date" name="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-3" placeholder="Ex: 01/12/2026" required>

                <div class="flex justify-end gap-3 mt-4">
                    <a href="{{ route('reminders.index') }}"
                        class="px-5 py-2 font-medium text-white transition duration-300 bg-gray-700 rounded-lg hover:bg-red-800">
                        Cancelar
                    </a>
                    <input type="submit" value="Salvar"
                        class="bg-[#19231F] hover:bg-green-900 px-6 py-2 rounded-lg text-white font-medium transition duration-300 cursor-pointer">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
