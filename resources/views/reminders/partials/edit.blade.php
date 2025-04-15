<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembretes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/imask"></script>
    @include('layouts.sidebar')
    @include('components.messageAlert')
</head>

<body class="flex min-h-screen bg-white">

    <div class="sidebar">
        @yield('sidebar')
    </div>

    <div class="flex items-center justify-center w-full min-h-screen p-4 sm:ml-64 bg-gray-50">
        <div class="bg-white w-full max-w-md flex flex-col rounded-lg px-10 py-8 shadow-[10px_10px_30px_rgba(0,0,0,0.1)]">
            <h1 class="mb-6 text-3xl font-semibold text-center text-gray-900">Atudalizar lembrete</h1>

            <div class="mb-4 messageAlert">
                @yield('messageAlert')
            </div>

            <form action="{{ route('reminders.update', ['reminder' => $reminder->id]) }}" method="post" class="flex flex-col w-full h-full">
                @csrf
                <input type="hidden" name="_method" value="put">

                <label for="reminder" class="block mb-2 text-sm text-gray-900">Lembrete</label>
                <input type="text" id="reminder" class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400 dark:placeholder-gray-500 dark:text-black" name="reminder" value="{{ $reminder->reminder }}" required>

                <label for="date" class="block my-2 text-sm text-gray-900">Data</label>
                <input type="text" id="date" class="bg-gray-50 border border-gray-800 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400 dark:placeholder-gray-500 dark:text-black" name="date" value="{{ \Carbon\Carbon::parse($reminder->date)->format('d/m/Y') }}" required>

                <input type="submit" value="Criar" class="bg-[#19231F] hover:bg-green-900 w-full my-3 p-2 rounded-lg text-white font-medium transition-colors duration-300">
            </form>
        </div>
    </div>

    <script>
        const dateInput = document.getElementById('date');
        IMask(dateInput, {
            mask: '00/00/0000'
        });
    </script>

</body>

</html>
