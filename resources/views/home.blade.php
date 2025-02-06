<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Список конференций</title>

    <!-- Подключаем Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased bg-gray-100">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-gray-100">

        <!-- Блок кнопок входа и регистрации -->
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        Вход
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            Регистрация
                        </a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Одобренные конференции</h1>

            @if ($reports->isEmpty())
                <p class="text-center text-gray-600">Нет одобренных конференций.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($reports as $report)
                        <div class="bg-white shadow-lg rounded-lg p-4">
                            <img src="{{ asset('storage/' . $report->path_img) }}" alt="Фото спикера"
                                class="w-full h-48 object-cover rounded-md">

                            <h2 class="mt-4 text-xl font-semibold text-gray-900">{{ $report->theme }}</h2>
                            <p class="text-gray-600">Секция: {{ $report->section->title }}</p>

                            <div class="mt-4 text-center">
                                <a href="{{ route('dashboard') }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                    Принять участие
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</body>

</html>
