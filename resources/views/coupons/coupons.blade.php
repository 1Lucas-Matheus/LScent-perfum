<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cupons</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @include('layouts.sidebar')
    @include('components.messageAlert')
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="sidebar">
        @yield('sidebar')
    </div>

    <div class="p-6 sm:ml-64">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Cupons</h2>

                @yield('messageAlert')

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <table class="w-full text-sm text-left border-collapse">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th class="px-6 py-4">Chave de ativação</th>
                                <th class="px-6 py-4">Valor do cupom</th>
                                <th class="px-6 py-4 text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($coupons as $coupom)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $coupom->key }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $coupom->value }}%</td>
                                <td class="px-6 py-4 text-right flex justify-end items-center gap-3">
                                    {{-- Botão de Editar --}}
                                    <a href="{{ route('coupons.edit', ['coupom' => $coupom->id]) }}"
                                        class="p-2 rounded-lg bg-blue-600 hover:bg-blue-500 text-white shadow transition flex items-center justify-center"
                                        title="Editar cupom">
                                        <img src="{{ asset('Imgs/Icons/editar.png') }}" alt="Editar" class="w-5 h-5" />
                                    </a>

                                    <form action="{{ route('coupons.destroy', ['coupom' => $coupom->id]) }}" method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja apagar o cupom de {{ $coupom->value }}%?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 rounded-lg bg-red-600 hover:bg-red-500 text-white shadow transition flex items-center justify-center"
                                            title="Excluir cupom">
                                            <img src="{{ asset('Imgs/Icons/bin.png') }}" alt="Excluir" class="w-5 h-5" />
                                        </button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('coupons.create') }}"
        class="fixed bottom-6 right-6 bg-green-600 hover:bg-green-500 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg transition"
        title="Adicionar cupom">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
    </a>

</body>

</html>