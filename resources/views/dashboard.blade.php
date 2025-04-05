<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @include('layouts.sidebar')
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="sidebar">
        @yield('sidebar')
    </div>

    <div class="p-4 sm:ml-64">
        <div class="px-4">
            <div>
                <div class="max-w-7xl mx-auto">
                    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <h2 class="text-sm font-semibold text-gray-500 mb-2">Variedade de Produtos</h2>
                            <p class="text-3xl font-bold text-gray-800">{{ $countProducts }}</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <h2 class="text-sm font-semibold text-gray-500 mb-2">Categorias Disponíveis</h2>
                            <p class="text-3xl font-bold text-gray-800">{{ $countCategory }} </p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <h2 class="text-sm font-semibold text-gray-500 mb-2">Cupons Ativos</h2>
                            <p class="text-3xl font-bold text-gray-800">{{ $countCoupons }}</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <h2 class="text-sm font-semibold text-gray-500 mb-2">Usuários Cadastrados</h2>
                            <p class="text-3xl font-bold text-gray-800">{{ $countUsers }}</p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h2 class="text-2xl font-semibold mb-4">Perfumes com Estoque Baixo</h2>
                        <div class="bg-white rounded-2xl shadow overflow-hidden">
                            <table class="w-full text-sm text-left">
                                <thead class="text-xs uppercase bg-gray-100 text-gray-600">
                                    <tr>
                                        <th class="px-6 py-3">Nome</th>
                                        <th class="px-6 py-3">Preço Original</th>
                                        <th class="px-6 py-3">Preço com Desconto</th>
                                        <th class="px-6 py-3">Categoria</th>
                                        <th class="px-6 py-3">Promoção</th>
                                        <th class="px-6 py-3">Estoque</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @if($products->where('quantity', '<=', 5)->count() > 0)
                                        @foreach($products->where('quantity', '<=', 5)->take(5) as $product)
                                            <tr class="hover:bg-gray-50 transition">
                                                <td class="px-6 py-4 font-medium">{{ $product->name }}</td>
                                                <td class="px-6 py-4">R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                                                <td class="px-6 py-4">
                                                    @if($product->promo > 0)
                                                    R$ {{ number_format($product->price - ($product->price * ($product->promo / 100)), 2, ',', '.') }}
                                                    @else
                                                    <span class="text-gray-400 italic">Sem promoção</span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4">{{ $product->category->name }}</td>
                                                <td class="px-6 py-4">{{ $product->promo > 0 ? $product->promo.'%' : '❌' }}</td>
                                                <td class="px-6 py-4">{{ $product->quantity }}</td>
                                            </tr>
                                            @endforeach

                                            <tr>
                                                <td class="px-6 py-4 text-sm text-gray-600" colspan="6">
                                                    <strong>Atenção:</strong> mais
                                                    <span class="text-red-700 font-semibold">{{ $remainingLowStock }}</span> produto(s) com estoque baixo.
                                                    <a href="{{ route('products.index') }}" class="ml-2 text-blue-600 hover:underline">Ver mais</a>
                                                </td>
                                            </tr>
                                            @else
                                            <tr>
                                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">Nenhum perfume com estoque baixo.</td>
                                            </tr>
                                            @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h2 class="text-2xl font-semibold mb-4">Perfume Mais Vendido</h2>
                        <div class="bg-white rounded-2xl shadow overflow-hidden">
                            <table class="w-full text-sm text-left">
                                <thead class="text-xs uppercase bg-gray-100 text-gray-600">
                                    <tr>
                                        <th class="px-6 py-3">Nome do Perfume</th>
                                        <th class="px-6 py-3">Categoria</th>
                                        <th class="px-6 py-3">Preço</th>
                                        <th class="px-6 py-3">Promoção</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-center text-gray-500" colspan="6">Nenhuma compra foi realizada até o momento.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mb-2">
                        <h2 class="text-2xl font-semibold mb-4">Categorias Mais Vendidas</h2>
                        <div class="bg-white rounded-2xl shadow overflow-hidden">
                            <table class="w-full text-sm text-left">
                                <tbody class="divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-center text-gray-500" colspan="6">Nenhuma compra foi realizada até o momento.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>