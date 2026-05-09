<x-app-layout>
    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-200">
                <div class="p-6">

                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('product.index') }}"
                               class="p-1.5 rounded-md text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 19l-7-7 7-7" />
                                </svg>
                            </a>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Product Details</h2>
                                <p class="text-sm text-gray-500 mt-0.5">Viewing product
                                    #{{ $product->id }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            @can('update', $product)
                                <x-edit-button :url="route('product.edit', $product)" />
                            @endcan

                            @can('delete', $product)
                                <x-delete-button :action="route('product.destroy', $product->id)" />
                            @endcan
                        </div>
                    </div>

                    <div class="rounded-xl border border-gray-200 divide-y divide-gray-200 shadow-sm">

                        <div class="flex items-center px-5 py-4">
                            <div class="w-32 shrink-0 text-sm font-medium text-gray-500">Product Name</div>
                            <div class="text-sm font-semibold text-gray-900">{{ $product->name }}</div>
                        </div>

                        <div class="flex items-center px-5 py-4">
                            <div class="w-32 shrink-0 text-sm font-medium text-gray-500">Quantity</div>
                            <div>
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold
                                    {{ $product->quantity > 10
                                        ? 'bg-emerald-50 text-emerald-700 border border-emerald-200'
                                        : 'bg-red-50 text-red-700 border border-red-200' }}">
                                    {{ $product->quantity }} ({{ $product->quantity > 10 ? 'In Stock' : 'Low Stock' }})
                                </span>
                            </div>
                        </div>

                        <div class="flex items-center px-5 py-4">
                            <div class="w-32 shrink-0 text-sm font-medium text-gray-500">Price</div>
                            <div class="text-sm font-medium text-gray-900">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="flex items-center px-5 py-4">
                            <div class="w-32 shrink-0 text-sm font-medium text-gray-500">Owner</div>
                            <div class="flex items-center gap-2">
                                <div class="h-7 w-7 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 text-xs font-bold uppercase shrink-0">
                                    {{ substr($product->user->name ?? '?', 0, 1) }}
                                </div>
                                <span class="text-sm font-medium text-gray-900">{{ $product->user->name ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="flex items-center px-5 py-4 bg-gray-50/50">
                            <div class="w-32 shrink-0 text-sm font-medium text-gray-500">Created At</div>
                            <div class="text-sm font-medium text-gray-600">
                                {{ $product->created_at->format('d M Y, H:i') }}
                            </div>
                        </div>

                        <div class="flex items-center px-5 py-4 bg-gray-50/50 rounded-b-xl">
                            <div class="w-32 shrink-0 text-sm font-medium text-gray-500">Updated At</div>
                            <div class="text-sm font-medium text-gray-600">
                                {{ $product->updated_at->format('d M Y, H:i') }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>