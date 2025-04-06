<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @include('layouts.sidebar')
    @include('components.messageAlert')
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="sidebar">
        @yield('sidebar')
    </div>

    <div class="p-4 sm:ml-64">
        <div class="p-4">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Produtos</h2>

                <div class="messageAlert mb-4">
                    @yield('messageAlert')
                </div>

                <div class="bg-white rounded-2xl shadow overflow-hidden">
                    <table class="w-full text-sm text-left border-collapse">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th class="px-6 py-4">Nome</th>
                                <th class="px-6 py-4">Preço original</th>
                                <th class="px-6 py-4">Preço promocional</th>
                                <th class="px-6 py-4">Categoria</th>
                                <th class="px-6 py-4">Promoção</th>
                                <th class="px-6 py-4">Estoque</th>
                                <th class="px-6 py-4 text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($products as $product)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $product->name }}</td>
                                <td class="px-6 py-4">R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                                <td class="px-6 py-4">
                                    @if($product->promo > 0)
                                    R$ {{ number_format($product->price - ($product->price * ($product->promo / 100)), 2, ',', '.') }}
                                    @else
                                    <span class="text-gray-400 italic">Sem promoção</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($product->category)
                                    {{ $product->category->name }}
                                    @else
                                    <span class="text-gray-400 italic">Sem categoria</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($product->promo > 0)
                                    {{ $product->promo }}%
                                    @else
                                    ❌
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ $product->quantity }}</td>
                                <td class="px-6 py-4 text-right flex justify-end gap-2">
                                    <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="bg-blue-600 hover:bg-blue-500 p-2 rounded-lg shadow transition">
                                            <img src="{{ asset('Imgs/Icons/editar.png') }}" alt="Ícone de Senha" class="w-5 h-5 text-gray-500 dark:text-gray-400">
                                    </a>

                                    <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja apagar: {{$product->name}}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 hover:bg-red-500 text-white p-2 rounded-lg shadow transition">
                                            <img src="{{ asset('Imgs/Icons/bin (2).png') }}" alt="Ícone de Senha" class="w-5 h-5 text-gray-500 dark:text-gray-400">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <a href="{{ route('products.create') }}" class="fixed bottom-6 right-6 bg-green-600 hover:bg-green-500 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg transition" title="Adicionar produto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </a>

            </div>
        </div>
    </div>

</body>

</html>