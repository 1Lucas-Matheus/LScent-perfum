<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="{{ asset('js/modal.js') }}"></script>

    @include('layouts.sidebar')
    @include('components.messageAlert')
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="sidebar">
        @yield('sidebar')
    </div>

    <main class="p-6 sm:ml-64">
        <div class="max-w-7xl mx-auto space-y-6">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold text-gray-800">Categorias</h2>
            </div>

            @yield('messageAlert')

            <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                <table class="min-w-full text-sm">
                    <tbody class="divide-y divide-gray-200">
                        @foreach($categories as $category)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    {{ $category->name }}
                                </td>
                                <td class="px-6 py-4 text-right flex justify-end space-x-2">
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                       class="bg-blue-600 p-2 rounded-lg shadow hover:bg-blue-500 transition">
                                        <img src="{{ asset('Imgs/Icons/editar.png') }}" alt="Editar" class="w-5 h-5">
                                    </a>

                                    <form action="{{ route('categories.destroy', $category->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Tem certeza que deseja apagar a categoria: {{ $category->name }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-600 p-2 rounded-lg shadow hover:bg-red-500 transition">
                                            <img src="{{ asset('Imgs/Icons/bin.png') }}" alt="Excluir" class="w-5 h-5">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <button data-modal-target="Modal-Create" data-modal-toggle="Modal-Create"
            class="fixed bottom-6 right-6 bg-green-600 hover:bg-green-500 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
    </button>

    <div id="Modal-Create" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
         class="fixed inset-0 z-50 hidden justify-center items-center p-4 overflow-y-auto">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-xl">
            <div class="flex justify-between items-center p-5 border-b">
                <h3 class="text-lg font-semibold">Adicionar categoria</h3>
                <button type="button" data-modal-hide="Modal-Create"
                        class="text-gray-400 hover:text-gray-900 transition">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <form id="category-form" method="POST" class="p-6">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Categoria</label>
                    <input type="text" name="name" id="name" class="w-full rounded-lg border border-gray-300 p-2 focus:ring-2 focus:ring-green-600 focus:outline-none" placeholder="Nome da categoria">
                </div>
                <div class="flex justify-end space-x-3 border-t pt-4">
                    <button type="button" data-modal-hide="Modal-Create" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition">
                        Cancelar
                    </button>
                    <input type="submit" value="Criar" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition cursor-pointer">
                </div>
            </form>
        </div>
    </div>

</body>
</html>
