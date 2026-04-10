<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('About Me') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-6 text-orange-600 dark:text-orange-500">Biodata Mahasiswa</h3>
                    
                    <div class="space-y-4 border-l-4 border-orange-500 pl-6">
                        <div class="flex flex-col">
                            <span class="text-xs font-bold uppercase tracking-widest text-gray-500">Nama Lengkap</span>
                            <span class="text-lg font-medium">Refky Muhammad Syahrin</span>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-xs font-bold uppercase tracking-widest text-gray-500">Nomor Induk Mahasiswa</span>
                            <span class="text-lg font-mono">20230140050</span>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-xs font-bold uppercase tracking-widest text-gray-500">Program Studi</span>
                            <span class="text-lg font-medium">Teknologi Informasi</span>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-xs font-bold uppercase tracking-widest text-gray-500">Hobi</span>
                            <span class="text-lg font-medium italic">"Ngoding dan Web Development"</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>