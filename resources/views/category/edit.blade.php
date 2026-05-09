<x-app-layout>
    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-200">
                <div class="p-6">

                    <div class="flex items-center gap-3 mb-6">
                        <a href="{{ route('category.index') }}"
                           class="p-1.5 rounded-md text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Edit Category</h2>
                            <p class="text-sm text-gray-500 mt-0.5">Update details for <span class="font-semibold text-gray-900">{{ $category->name }}</span></p>
                        </div>
                    </div>

                    <form action="{{ route('category.update', $category->id) }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                Category Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}"
                                   placeholder="e.g. Electronics"
                                   class="w-full px-4 py-2.5 rounded-lg border text-sm text-gray-900 placeholder-gray-400
                                   {{ $errors->has('name') ? 'border-red-400 bg-red-50' : 'border-gray-300 bg-white' }}
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                            @error('name')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col-reverse sm:flex-row sm:items-center justify-end pt-4 gap-3 border-t border-gray-100 mt-6">
                            <a href="{{ route('category.index') }}"
                               class="px-4 py-2.5 rounded-lg border border-gray-300 text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition w-full sm:w-auto text-center">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-gray text-sm font-medium rounded-lg shadow-sm transition w-full sm:w-auto">
                                Update Category
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>