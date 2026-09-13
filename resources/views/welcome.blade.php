<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Menadżer wydatków</title>

        <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">

                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Pulpit
                        </a>

                    @else

                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Zaloguj
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                            >
                                Rejestracja
                            </a>
                        @endif

                    @endauth

                </nav>
            @endif
        </header>

        <main class="w-full max-w-4xl flex-1 flex items-center justify-center">

            <div class="text-center">
                <h1 class="text-4xl lg:text-6xl font-bold mb-8"> Menadżer wydatków </h1>
                <img src="{{ asset('images/logo.png') }}" alt="Logo Menadżera wydatków" class="h-24 w-auto mx-auto mb-8" >
                <p class="text-lg text-gray-600 dark:text-gray-400 mb-8"> Kontroluj swoje wydatki w prosty i przejrzysty sposób.</p>
                <a href="{{ route('login') }}" class="inline-block px-8 py-3 bg-[#1b1b18] text-white rounded-lg hover:opacity-80 transition" > Zacznij </a>
            </div>

        </main>

    </body>
</html>
