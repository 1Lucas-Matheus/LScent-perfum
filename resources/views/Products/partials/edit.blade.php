<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

            <form action="{{ route('products.update', ['product' => $products->id]) }}" method="post" class="flex flex-col w-full h-full">
                @csrf

                <input type="hidden" name="_method" value="put">
                <label for="input-group-1" class="block mb-2 text-sm text-gray-900">Nome do produto</label>
                <input type="text" id="input-group-1" class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400 dark:placeholder-gray-500 dark:text-black" placeholder="Exemplo: Malbec X" name="name" value="{{ $products->name }}" required>

                <label for="input-group-2" class="block my-2 text-sm text-gray-900">Quantidade</label>
                <input type="number" id="input-group-2" class="bg-gray-50 border border-gray-800 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400 dark:placeholder-gray-500 dark:text-black" placeholder="Exemplo: 5" name="quantity" value="{{ $products->quantity }}" required>

                <label for="input-group-2" class="block my-2 text-sm text-gray-900">Preço(Unidade)</label>
                <input type="number" step="any" id="input-group-2" class="bg-gray-50 border border-gray-800 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400 dark:placeholder-gray-500 dark:text-black" placeholder="Exemplo: 299,99" name="price" value="{{ $products->price }}" required>

                <label for="input-group-2" class="block my-2 text-sm text-gray-900">Categoria</label>
                <select name="category_id" id="categorie" class="border rounded bg-gray-50 border-gray-800 text-gray-900 text-sm block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400 dark:placeholder-gray-500 dark:text-black mb-4">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $products->category_id) selected @endif>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>


                <input type="submit" value="Criar" class="bg-[#19231F] hover:bg-green-900 w-full my-3 p-2 rounded-lg text-white font-medium transition-colors duration-300">
            </form>
        </div>
    </div>
</body>

</html>
