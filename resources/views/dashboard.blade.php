<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @include('components.sidebar')
</head>

<body>
    <div class="sidebar">
        @yield('sidebar')
    </div>

    <div class="p-4 sm:ml-64">
        <div class="p-4">
            <div class=" h-48 mb-4">
                <div class="max-w-7xl mx-auto">
                    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <h2 class="text-lg font-semibold">Variedade de Produtos</h2>
                            <p class="text-2xl font-bold">{{ $countProducts }}</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <h2 class="text-lg font-semibold">Categorias Disponíveis</h2>
                            <p class="text-2xl font-bold">{{ $countCategory }} </p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <h2 class="text-lg font-semibold">Cupons Ativos</h2>
                            <p class="text-2xl font-bold">{{ $countCoupons }}</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <h2 class="text-lg font-semibold">Usuários Cadastrados</h2>
                            <p class="text-2xl font-bold">{{ $countUsers }}</p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Perfume com estoque baixo</h2>
                        <div class="bg-white rounded-2xl shadow-lg">
                            <table class="w-full text-sm text-left border-collapse">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Nome do Perfume</th>
                                        <th scope="col" class="px-6 py-3">Preço original</th>
                                        <th scope="col" class="px-6 py-3">Preço na promoção</th>
                                        <th scope="col" class="px-6 py-3">Categoria</th>
                                        <th scope="col" class="px-6 py-3">Promoção</th>
                                        <th scope="col" class="px-6 py-3">Estoque</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @if($products->where('quantity', '<=', 5)->count() > 0)
                                        @foreach($products->where('quantity', '<=', 5)->take(5) as $product)
                                            <tr class="hover:bg-gray-50 transition">
                                                <td class="px-6 py-4 font-medium text-gray-900">{{ $product->name }}</td>
                                                <td class="px-6 py-4 text-gray-700"> R$ {{ number_format($product->price, 2, ',', '.') }} </td>
                                                <td class="px-6 py-4 text-gray-700">
                                                    @if($product->promo > 0)
                                                    R$ {{ number_format($product->price - ($product->price * ($product->promo / 100)), 2, ',', '.') }}
                                                    @else
                                                    sem promoção
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 text-gray-700">{{ $product->category->name }}</td>
                                                <td class="px-6 py-4 text-gray-700"> @if($product->promo > 0) {{ $product->promo / 1 }}% @else ❌ @endif </td>
                                                <td class="px-6 py-4 text-gray-700"> {{ $product->quantity }} </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td class="px-6 py-4 text-gray-700" colspan="6">
                                                    <strong>Atenção:</strong> mais <span class="text-red-700 font-semibold">{{ $remainingLowStock }}</span> produto com estoque baixo.
                                                    <a href="{{ route('products.index') }}" class="relative text-blue-500 hover:text-blue-700 before:content-[''] before:absolute before:left-0 before:bottom-0 before:w-full before:h-[2px] before:bg-blue-700 before:scale-x-0 before:origin-left before:transition-transform before:duration-300 hover:before:scale-x-100">Ver mais</a>
                                                </td>
                                            </tr>
                                            @else
                                            <p class="text-gray-500 text-sm">Nenhum perfume com estoque baixo.</p>
                                            @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Perfume Mais Vendido</h2>
                        <div class="bg-white rounded-2xl shadow-lg">
                            <table class="w-full text-sm text-left border-collapse">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Nome do Perfume</th>
                                        <th scope="col" class="px-6 py-3">Categoria</th>
                                        <th scope="col" class="px-6 py-3">Preço</th>
                                        <th scope="col" class="px-6 py-3">Promoção</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4 font-medium text-gray-900 text-center" colspan="6"> Nenhuma compra foi realizada até o momento. </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Categorias Mais Vendidas</h2>
                        <div class="bg-white rounded-2xl shadow-lg">
                            <table class="w-full text-sm text-left border-collapse">
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4 font-medium text-gray-900 text-center" colspan="6"> Nenhuma compra foi realizada até o momento. </td>

                                    </tr>
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