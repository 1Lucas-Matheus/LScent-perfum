<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Essence</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white flex p-6 lg:p-10 items-center lg:justify-center min-h-screen">
    <div class="bg-white flex items-center justify-center w-full">
        <div class="flex max-w-335px w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
            <div class="leading-[50px] flex flex-1 flex-col lg:p-20 bg-[#fff] sm:bg-[#fff] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none items-center lg:shadow-[-10px_10px_30px_rgba(0,0,0,0.5)]">
                <h1 class="dark:text-[#383838] text-5xl font-extrabold mb-28 hidden sm:block">Bem vindo!</h1>
                <div class="h-full w-full mt-1">
                    <a href="login" class="text-white bg-[#19231F] hover:bg-green-900 rounded-lg mb-3 flex items-center justify-center transition-colors duration-300 text-2xl p-2.5">Acessar</a>
                    <a href="register" class="text-white bg-[#19231F] hover:bg-green-900 rounded-lg flex items-center justify-center transition-colors duration-300 text-2xl p-2.5">Registrar</a>
                </div>
            </div>

            <div class="bg-[#ffffff] dark:text-[#EDEDEC] relative lg:-ml-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg aspect-[335/376] lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden lg:shadow-[10px_10px_30px_rgba(0,0,0,0.5)] flex items-center justify-center">
                <img src="{{ asset('Imgs/lscent.png') }}" alt="LogoLogin" class="object-cover">
            </div>


        </div>
    </div>
</body>

</html>