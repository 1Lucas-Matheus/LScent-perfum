<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @include('components.messageAlert')
</head>

<body class="flex min-h-screen bg-white">
    <div class="flex items-center justify-center w-full h-screen">

        <div class="bg-white w-[600px] h-auto py-4 flex flex-col rounded-lg px-10 shadow-[10px_10px_30px_rgba(0,0,0,0.5)] items-center justify-center">
            <h1 class="mt-2 text-5xl font-bold text-slate-900 mb-7"> Adiconar produto </h1>

            <div class="mb-4 messageAlert">
                @yield('messageAlert')
            </div>

            <form action="{{ route('reminders.update', ['reminder' => $reminder->id]) }}" method="post" class="flex flex-col w-full h-full">
                @csrf

                <input type="hidden" name="_method" value="put">
                <label for="reminder" class="block mb-2 text-sm text-gray-900">Lembrete</label>
                <input type="text" id="reminder" class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400 dark:placeholder-gray-500 dark:text-black" name="reminder" value="{{ $reminder->reminder }}" required>

                <label for="date" class="block my-2 text-sm text-gray-900">Date</label>
                <input type="text" id="date" class="bg-gray-50 border border-gray-800 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400 dark:placeholder-gray-500 dark:text-black" name="date" value="{{ \Carbon\Carbon::parse($reminder->date)->format('d/m/Y') }}" required>

                <input type="submit" value="Criar" class="bg-[#19231F] hover:bg-green-900 w-full my-3 p-2 rounded-lg text-white font-medium transition-colors duration-300">
            </form>
        </div>
    </div>
</body>

</html>
