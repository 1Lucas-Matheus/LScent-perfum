<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @include('layouts.sidebar')
    @include('components.messageAlert')
</head>

<body>
    <div class="sidebar">
        @yield('sidebar')
    </div>


    <div class="p-4 sm:ml-64">
        <div class="p-4">
            <div class=" h-48 mb-4">
                <div class="max-w-7xl mx-auto">
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Cupons</h2>

                        <div class="messageAlert">
                            @yield('messageAlert')
                        </div>

                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <table class="w-full text-sm text-left border-collapse">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Chave de ativação</th>
                                        <th scope="col" class="px-6 py-3">Valor do cupom</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach($coupons as $coupom)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4 font-medium text-gray-900">{{ $coupom->key }}</td>
                                        <td class="px-6 py-4 text-gray-700">{{ $coupom->value }}%</td>
                                        <td class="px-6 py-4 text-right flex justify-end space-x-3">
                                            <a href="{{ route('coupons.edit', ['coupom' => $coupom->id]) }}" class="bg-blue-600 py-2 px-4 rounded-lg text-white font-medium shadow-md hover:bg-blue-500 transition duration-300" type="button">
                                                Editar
                                            </a>

                                            <form action="{{ route('coupons.destroy', ['coupom' => $coupom->id]) }}" method="post" onsubmit="return confirm('Tem certeza que deseja apagar o cupom de {{ $coupom->value }}% ?');">
                                                @csrf
                                                <input type="hidden" name="_method" value="delete">
                                                <button type="submit" class="bg-red-600 py-2 px-4 rounded-lg text-white font-medium shadow-md hover:bg-red-500 transition duration-300">
                                                    Excluir
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
        </div>
    </div>

    <a href="{{ route('coupons.create') }}" class="fixed bottom-6 right-6 bg-gray-800 hover:bg-gray-600 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg transition" type="button">
        add
    </a>

</body>

</html>