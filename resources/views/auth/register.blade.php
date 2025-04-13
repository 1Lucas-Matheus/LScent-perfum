<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/imask"></script>
</head>

<body class="flex min-h-screen bg-white">
    <div class="flex items-center justify-center w-full h-screen">

        <div class="bg-white w-[800px] flex flex-col rounded-lg px-10 py-6 shadow-[10px_10px_30px_rgba(0,0,0,0.5)]">
            <h1 class="text-5xl font-bold text-center text-slate-900 mb-7">
                Registre-se
            </h1>

            <form action="{{ route('register') }}" method="post" class="grid w-full grid-cols-1 gap-6 md:grid-cols-2">
                @csrf

                <div class="flex flex-col">
                    <label for="name" class="block my-2 text-sm text-gray-900">Nome</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-2.5 pointer-events-none">
                            <img src="{{ asset('Imgs/Icons/email.png') }}" alt="Ícone de Email" class="w-5 h-5 text-gray-500 dark:text-gray-400">
                        </div>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-800 text-gray-900 text-sm rounded-lg block w-full ps-10 p-2.5 dark:bg-gray-100 dark:border-gray-400 dark:placeholder-gray-500 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Usuário123" autocomplete="name" required>
                    </div>

                    <label for="email" class="block my-2 text-sm text-gray-900">E-mail</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-2.5 pointer-events-none">
                            <img src="{{ asset('Imgs/Icons/email.png') }}" alt="Ícone de Email" class="w-5 h-5 text-gray-500 dark:text-gray-400">
                        </div>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-800 text-gray-900 text-sm rounded-lg block w-full ps-10 p-2.5 dark:bg-gray-100 dark:border-gray-400 dark:placeholder-gray-500 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nome@gmail.com" autocomplete="email" required>
                    </div>

                    <label for="tel" class="block my-2 text-sm text-gray-900">Número de telefone</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-2.5 pointer-events-none">
                            <img src="{{ asset('Imgs/Icons/telefone.png') }}" alt="Ícone de Telefone" class="w-6 h-6 text-gray-500 dark:text-gray-400">
                        </div>
                        <input type="tel" name="tel" id="tel" class="bg-gray-50 border border-gray-800 text-gray-900 text-sm rounded-lg block w-full ps-10 p-2.5 dark:bg-gray-100 dark:border-gray-400 dark:placeholder-gray-500 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="(99) 999999999" required>
                    </div>
                </div>

                <div class="flex flex-col">
                    <label for="cpf" class="block my-2 text-sm text-gray-900">CPF</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-2">
                            <img src="{{ asset('Imgs/Icons/cpf.png') }}" alt="Ícone de CPF" class="text-gray-500 w-7 h-7 dark:text-gray-400">
                        </div>
                        <input type="text" name="cpf" id="cpf" class="bg-gray-50 border border-gray-800 text-gray-900 text-sm rounded-lg block w-full ps-10 p-2.5 dark:bg-gray-100 dark:border-gray-400 dark:placeholder-gray-500 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999.999.999-99" required>
                    </div>

                    <label for="password" class="block my-2 text-sm text-gray-900">Senha</label>
                    <div class="relative flex">
                        <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-2">
                            <img src="{{ asset('Imgs/Icons/passwordIndicator.png') }}" alt="Ícone de Senha" class="w-6 h-6 text-gray-500 dark:text-gray-400">
                        </div>

                        <input type="password" name="password" id="password" class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-l-lg ps-10 p-2.5 w-full focus:ring-blue-500 focus:border-blue-500" placeholder="********" autocomplete="new-password" required>

                        <button type="button" onclick="togglePassword()" class="px-4 text-sm text-gray-700 transition bg-gray-300 border border-l-0 border-gray-400 rounded-r-lg hover:bg-gray-400">
                            <img id="toggle-icon" src="{{ asset('Imgs/Icons/password.png') }}" alt="Ver Senha" class="w-5 h-5">
                        </button>
                    </div>

                    <label for="password_confirmation" class="block my-2 text-sm text-gray-900">Confirmar Senha</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-2">
                            <img src="{{ asset('Imgs/Icons/passwordIndicator.png') }}" alt="Ícone de Senha" class="w-6 h-6 text-gray-500 dark:text-gray-400">
                        </div>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-800 text-gray-900 text-sm rounded-lg block w-full ps-10 p-2.5 dark:bg-gray-100 dark:border-gray-400 dark:placeholder-gray-500 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="********" autocomplete="new-password" required>
                    </div>
                </div>

                <div class="col-span-2">
                    <input type="submit" value="Criar Conta" class="bg-[#19231F] hover:bg-green-900 w-full p-3 mb-3 rounded-lg text-white font-medium transition-colors duration-300">
                </div>
            </form>

            <div class="flex justify-between w-full mt-6">
                <label>Já tem conta? <a href="login" class="relative text-green-900 hover:text-[#19231F] before:content-[''] before:absolute before:left-0 before:bottom-0 before:w-full before:h-[2px] before:bg-[#19231F] before:scale-x-0 before:origin-left before:transition-transform before:duration-300 hover:before:scale-x-100"> Entrar </a> </label>
                <a href="#" class="relative text-green-900 hover:text-[#19231F] before:content-[''] before:absolute before:left-0 before:bottom-0 before:w-full before:h-[2px] before:bg-[#19231F] before:scale-x-0 before:origin-left before:transition-transform before:duration-300 hover:before:scale-x-100"> Ajuda </a>
            </div>
        </div>
    </div>

    <script>
        IMask(document.getElementById('cpf'), {
            mask: '000.000.000-00'
        });

        IMask(document.getElementById('tel'), {
            mask: '(00) 000000000'
        });

        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggle-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.src = "{{ asset('Imgs/Icons/secretPassword.png') }}";
            } else {
                passwordInput.type = 'password';
                toggleIcon.src = "{{ asset('Imgs/Icons/password.png') }}";
            }
        }
    </script>
</body>

</html>
