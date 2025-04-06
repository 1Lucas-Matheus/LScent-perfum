</html>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar categoria</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @include('components.messageAlert')
</head>

<body class="bg-white flex min-h-screen">
    <div class="flex justify-center items-center w-full h-screen">
        <div class="bg-white w-[400px] flex flex-col rounded-lg px-10 shadow-[10px_10px_30px_rgba(0,0,0,0.2)] items-center justify-center">
            <h1 class="text-gray-900 my-6 text-4xl font-semibold text-center">Atualizar categoria</h1>

            <div class="messageAlert">
                    @yield('messageAlert')
                </div>

            <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post" class="w-full flex flex-col">
                @csrf

                <input type="hidden" name="_method" value="put">
                <label for="input-group-1" class="block mb-1 text-sm text-gray-900">Categoria</label>
                <input type="text" id="input-group-1" class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400 dark:placeholder-gray-500 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $category->name }}" name="name" required>

                <div class="flex justify-end gap-3 mt-4 mb-3">
                    <a href="{{ route('categories.index') }}"
                        class="bg-gray-700 hover:bg-red-800 px-5 py-2 rounded-lg text-white font-medium transition duration-300">
                        Cancelar
                    </a>
                    <input type="submit" value="Atualizar" class="bg-[#19231F] hover:bg-green-900 px-6 py-2 rounded-lg text-white font-medium transition duration-300 cursor-pointer">
                </div>
            </form>
        </div>
</body>

</html>