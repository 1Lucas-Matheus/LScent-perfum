<!DOCTYPE html>
<html lang="en">

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
                            <h2 class="text-lg font-semibold">Perfumes em estoque</h2>
                            <p class="text-2xl font-bold">estoque</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <h2 class="text-lg font-semibold">Categorias</h2>
                            <p class="text-2xl font-bold">categoriesCount</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <h2 class="text-lg font-semibold">Promoções Ativas</h2>
                            <p class="text-2xl font-bold">promocoes</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <h2 class="text-lg font-semibold">Usuários</h2>
                            <p class="text-2xl font-bold">ususarios</p>
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
                                        <td class="px-6 py-4 font-medium text-gray-900">NEM UMA COMPRA FOI FEITA AINDA</td>
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
                                        <td class="px-6 py-4 font-medium text-gray-900">NEM UMA COMPRA FOI FEITA AINDA</td>
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