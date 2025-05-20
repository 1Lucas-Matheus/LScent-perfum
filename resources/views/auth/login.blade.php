<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex min-h-screen bg-white">
    <div class="flex items-center justify-center w-full h-screen">

        <div class="bg-white w-[400px] flex flex-col rounded-lg px-10 shadow-[10px_10px_30px_rgba(0,0,0,0.5)] items-center justify-center">
            <h1 class="mt-5 text-5xl font-bold text-slate-900 mb-7">
                Login
            </h1>

            <div>
                <x-input-error :messages="$errors->get('email')" class="mt-1 mb-2" />
            </div>

            <div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <form action="{{ route('login') }}" method="post" class="flex flex-col w-full h-full">
                @csrf
                <label for="input-group-1" class="block text-sm text-gray-900">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-2.5 pointer-events-none">
                        <img src="{{ asset('Imgs/Icons/email.png') }}" alt="Ícone de Email" class="w-5 h-5 text-gray-500 dark:text-gray-400">
                    </div>
                    <input type="email" id="input-group-1" class="border text-sm rounded-lg block w-full ps-10 p-2.5 bg-gray-100 border-gray-400 placeholder-gray-500 text-black focus:ring-blue-500 focus:border-blue-500" placeholder="nome@gmail.com" name="email" required>
                </div>

                <label for="input-group-2" class="block my-2 text-sm text-gray-900">Senha</label>
                <div class="relative">
                    <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-2">
                        <img src="{{ asset('Imgs/Icons/passwordIndicator.png') }}" alt="Ícone de Senha" class="w-6 h-6 text-gray-500 dark:text-gray-400">
                    </div>
                    <div class="flex w-full">
                        <input type="password" id="input-group-2" class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-l-lg ps-10 p-2.5 w-full focus:ring-blue-500 focus:border-blue-500" placeholder="********" name="password" required>

                        <button type="button" onclick="togglePassword()" class="px-4 text-sm text-gray-700 transition bg-gray-300 border border-l-0 border-gray-400 rounded-r-lg">
                            <img id="toggle-icon" src="{{ asset('Imgs/Icons/password.png') }}" alt="Ver Senha" class="w-6 h-6">
                        </button>
                    </div>
                </div>

                <input type="submit" value="Entrar" class="bg-[#19231F] hover:bg-green-900 w-full my-3 p-2 rounded-lg text-white font-medium transition-colors duration-300">
            </form>



            <div class="flex justify-between w-full mb-4">
                <Label>Não tem Conta? <a href="register" class="relative text-green-900 hover:text-[#19231F] before:content-[''] before:absolute before:left-0 before:bottom-0 before:w-full before:h-[1px] before:bg-[#19231F] before:scale-x-0 before:origin-left before:transition-transform before:duration-300 hover:before:scale-x-100"> Criar conta </a> </Label>
                <a href="#" class="relative text-green-900 hover:text-[#19231F] before:content-[''] before:absolute before:left-0 before:bottom-0 before:w-full before:h-[1px] before:bg-[#19231F] before:scale-x-0 before:origin-left before:transition-transform before:duration-300 hover:before:scale-x-100"> Ajuda </a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('input-group-2');
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
