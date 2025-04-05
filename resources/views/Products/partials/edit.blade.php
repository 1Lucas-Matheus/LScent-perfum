<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white flex min-h-screen">
    <div class="flex justify-center items-center w-full h-screen">

        <div class="bg-white w-[600px] h-auto py-4 flex flex-col rounded-lg px-10 shadow-[10px_10px_30px_rgba(0,0,0,0.5)] items-center justify-center">
            <h1 class="text-slate-900 mb-7 mt-2 text-5xl font-bold">
                Adiconar produto
            </h1>
            <form action="{{ route('products.update', ['product' => $products->id]) }}" method="post" class="w-full h-full flex flex-col">
                @csrf

                <input type="hidden" name="_method" value="put">
                <label for="input-group-1" class="block mb-2 text-sm text-gray-900">Nome do produto</label>
                <input type="text" id="input-group-1" class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400 dark:placeholder-gray-500 dark:text-black" placeholder="Exemplo: Malbec X" name="name" value="{{ $products->name }}">

                <label for="input-group-2" class="block my-2 text-sm text-gray-900">Quantidade</label>
                <input type="number" id="input-group-2" class="bg-gray-50 border border-gray-800 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400 dark:placeholder-gray-500 dark:text-black" placeholder="Exemplo: 5" name="quantity" value="{{ $products->quantity }}">

                <label for="input-group-2" class="block my-2 text-sm text-gray-900">Preço(Unidade)</label>
                <input type="number" step="any" id="input-group-2" class="bg-gray-50 border border-gray-800 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400 dark:placeholder-gray-500 dark:text-black" placeholder="Exemplo: 299,99" name="price" value="{{ $products->price }}">

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