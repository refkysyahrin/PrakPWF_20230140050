<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Me') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-200">
                <div class="p-6">
                    
                    <h3 class="text-xl font-bold mb-6 text-indigo-600">Biodata Mahasiswa</h3>
                    
                    <div class="space-y-5 border-l-4 border-indigo-500 pl-6">
                        <div class="flex flex-col">
                            <span class="text-xs font-bold uppercase tracking-widest text-gray-500">Nama Lengkap</span>
                            <span class="text-lg font-semibold text-gray-900">Refky Muhammad Syahrin</span>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-xs font-bold uppercase tracking-widest text-gray-500">Nomor Induk Mahasiswa</span>
                            <span class="text-lg font-mono font-medium text-gray-800">20230140050</span>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-xs font-bold uppercase tracking-widest text-gray-500">Program Studi</span>
                            <span class="text-lg font-medium text-gray-800">Teknologi Informasi</span>
                        </div>
                        
                        <div class="flex flex-col">
                            <span class="text-xs font-bold uppercase tracking-widest text-gray-500">Hobi</span>
                            <span class="text-lg font-medium italic text-gray-600">"Ngoding dan Web Development"</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>