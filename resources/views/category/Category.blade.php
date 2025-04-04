<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="{{ asset('js/modal.js') }}"></script>

    @include('components.sidebar')
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
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Categorias</h2>

                        <div class="messageAlert">
                            @yield('messageAlert')
                        </div>

                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <table class="w-full text-sm text-left border-collapse">
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach($categories as $category)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            {{ $category->name }}
                                        </td>
                                        <td class="px-6 py-4 text-right flex justify-end space-x-3">
                                            <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="bg-blue-600 py-2 px-4 rounded-lg text-white font-medium shadow-md hover:bg-blue-500 transition duration-300" type="button">
                                                Editar
                                            </a>

                                            <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post" onsubmit="return confirm('Tem certeza que deseja apagar a categoria: {{ $category->name }}?');">
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

    <button data-modal-target="Modal-Create" data-modal-toggle="Modal-Create" class="fixed bottom-6 right-6 bg-gray-800 hover:bg-gray-600 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg transition" type="button">
        add
    </button>

    <div id="Modal-Create" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="ml-32 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow-[10px_10px_30px_rgba(0,0,0,0.5)]">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Adiconar categoria
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="Modal-Create">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form id="category-form" method="post">
                    @csrf
                    <div class="p-4 md:p-5 space-y-4">
                        <label for="input-group-1" class="block mb-2 text-sm text-gray-900">Categoria</label>
                        <input type="text" id="input-group-1" class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400 dark:placeholder-gray-500 dark:text-black" name="name">
                    </div>
                    <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="Modal-Update" type="button" class="py-2.5 px-5 ms-3 bg-gray-700 hover:bg-red-700 rounded-lg text-white transition-colors duration-300">Cancelar</button>
                        <input type="submit" value="Criar" class="py-2.5 px-8 ms-3 bg-[#19231F] hover:bg-green-900 rounded-lg text-white transition-colors duration-300">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>