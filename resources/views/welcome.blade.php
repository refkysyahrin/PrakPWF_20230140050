<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tugas Pertemuan 1 - Laravel 12</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col font-sans">
        
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow">
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row shadow-xl rounded-lg overflow-hidden">
                
                <div class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] border-r border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <h1 class="mb-4 text-3xl font-bold text-[#f53003] dark:text-[#FF4433]">
                        Tugas Praktikum 1
                    </h1>
                    
                    <div class="mt-8 space-y-4">
                        <div>
                            <p class="text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-widest text-[10px] font-bold">Nama Lengkap</p>
                            <p class="text-xl font-medium">Refky Muhammad Syahrin</p>
                        </div>

                        <div>
                            <p class="text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-widest text-[10px] font-bold">NIM</p>
                            <p class="text-xl font-medium">20230140050</p>
                        </div>
                    </div>

                    <div class="mt-10 pt-6 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                            Status Instalasi: <span class="text-green-600 font-bold">Selesai</span> <br>
                            Framework: <span class="font-semibold">Laravel 12.52.0</span>
                        </p>
                    </div>
                </div>

                <div class="bg-[#fff2f2] dark:bg-[#1D0002] flex items-center justify-center p-12 lg:w-[400px] shrink-0">
                    <svg class="w-32 h-32 text-[#F53003]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.8 12.1V5.2H56.2V12.1H5.8Z" fill="currentColor"/>
                        <path d="M5.8 59.8V19H12.7V52.9H56.2V59.8H5.8Z" fill="currentColor"/>
                        <path d="M21.1 27.4H56.2V34.3H21.1V27.4Z" fill="currentColor"/>
                        <path d="M21.1 41.1H56.2V48H21.1V41.1Z" fill="currentColor"/>
                    </svg>
                </div>

            </main>
        </div>

        <footer class="mt-6 text-sm text-[#706f6c] dark:text-[#A1A09A]">
            &copy; 2026 - Pemrograman Web Framework
        </footer>

    </body>
</html>