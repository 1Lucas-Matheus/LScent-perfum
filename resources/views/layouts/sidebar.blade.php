@section('sidebar')
<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full bg-white border-r border-gray-200 dark:bg-gray-900 dark:border-gray-700 sm:translate-x-0">
    <div class="flex flex-col justify-between h-full p-4 overflow-y-auto">
        <div>
            <div class="flex items-center gap-2 px-2 pb-6">
                <span class="text-2xl font-bold text-gray-900 dark:text-white">L'scent</span>
            </div>
            <ul class="space-y-2 text-sm font-medium text-gray-700 dark:text-gray-200">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center p-2 transition rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066Z" />
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}" class="flex items-center p-2 transition rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Z" />
                            <path d="M0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10H1.857A1.857 1.857 0 0 0 0 11.857Zm10 0v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10h-4.286A1.857 1.857 0 0 0 10 11.857Z" />
                        </svg>
                        <span class="ms-3">Produtos</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories.index') }}" class="flex items-center p-2 transition rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="ms-3">Categorias</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('coupons.index') }}" class="flex items-center p-2 transition rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="ms-3">Cupons</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reminders.index') }}" class="flex items-center p-2 transition rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a6 6 0 00-6 6v2c0 .628-.184 1.24-.527 1.76L2.293 14.293A1 1 0 003 16h14a1 1 0 00.707-1.707l-1.18-1.18A3.993 3.993 0 0116 10V8a6 6 0 00-6-6zm0 16a2 2 0 001.995-1.85L12 16H8a2 2 0 002 2z" />
                        </svg>
                        <span class="ms-3">Lembretes</span>
                    </a>
                </li>
            </ul>
        </div>

        <ul class="pt-4 space-y-2 border-t border-gray-300 dark:border-gray-600">
            <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center p-2 text-red-500 transition rounded-lg hover:text-white hover:bg-red-900">
                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 18 16" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                    </svg>
                    <span class="text-sm font-medium">Sair</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
@endsection
