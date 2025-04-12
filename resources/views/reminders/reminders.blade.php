<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembretes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @include('layouts.sidebar')
    @include('components.messageAlert')
</head>

<body class="text-gray-800 bg-gray-100">

    <div class="sidebar">
        @yield('sidebar')
    </div>

    <div class="p-4 sm:ml-64">
        <div class="p-4">
            <div class="mx-auto max-w-7xl">
                <h2 class="mb-6 text-2xl font-bold text-gray-800">Lembretes</h2>

                <div class="mb-4 messageAlert">
                    @yield('messageAlert')
                </div>

                <div class="overflow-hidden bg-white shadow rounded-2xl">
                    <table class="w-full text-sm text-left border-collapse">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th class="px-6 py-4">Lembrete</th>
                                <th class="px-6 py-4">Data</th>
                                <th class="px-6 py-4 text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($reminders as $reminder)
                            <tr class="transition hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $reminder->reminder }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($reminder->date)->format('d/m/Y') }}</td>
                                <td class="flex justify-end gap-2 px-6 py-4 text-right">
                                    <a href="{{ route('reminders.edit', ['reminder' => $reminder->id]) }}" class="p-2 transition bg-blue-600 rounded-lg shadow hover:bg-blue-500">
                                        <img src="{{ asset('Imgs/Icons/editar.png') }}" alt="Ícone de Senha" class="w-5 h-5 text-gray-500 dark:text-gray-400">
                                    </a>

                                    <form action="{{ route('reminders.destroy', ['reminder' => $reminder->id]) }}" method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja apagar: {{$reminder->reminder}}?');">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete">
                                        <button type="submit" class="p-2 text-white transition bg-red-600 rounded-lg shadow hover:bg-red-500">
                                            <img src="{{ asset('Imgs/Icons/bin.png') }}" alt="Ícone de Senha" class="w-5 h-5 text-gray-500 dark:text-gray-400">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <a href="{{ route('reminders.create') }}" class="fixed flex items-center justify-center text-white transition bg-green-600 rounded-full shadow-lg bottom-6 right-6 hover:bg-green-500 w-14 h-14" title="Adicionar lembrete">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </a>

            </div>
        </div>
    </div>

</body>

</html>
