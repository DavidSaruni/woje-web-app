@extends('admin.layouts.app')

@section('title', 'Edit Poster - Woje')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.posters.index') }}" 
                   class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h3 class="text-lg font-semibold text-gray-900">Edit Poster</h3>
            </div>
        </div>

        <!-- Form -->
        <div class="p-6">
            <form action="{{ route('admin.posters.update', $poster->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                Title <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title', $poster->title) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-genyra-primary focus:border-transparent"
                                   placeholder="Enter poster title"
                                   required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Description
                            </label>
                            <textarea id="description" 
                                      name="description" 
                                      rows="4" 
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-genyra-primary focus:border-transparent"
                                      placeholder="Enter poster description (optional)">{{ old('description', $poster->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">
                                Brief description of the poster (optional)
                            </p>
                        </div>

                        <!-- Active Status -->
                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" 
                                       id="is_active" 
                                       name="is_active" 
                                       value="1"
                                       {{ $poster->is_active ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-genyra-primary focus:ring-genyra-primary">
                                <span class="ml-2 text-sm text-gray-700">Make this poster active</span>
                            </label>
                            <p class="mt-1 text-xs text-gray-500">
                                Only one poster can be active at a time. Checking this will deactivate all other posters.
                            </p>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Current Image -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Current Image
                            </label>
                            <div class="border rounded-lg p-2 bg-gray-50">
                                <img src="{{ asset($poster->image_path) }}" 
                                     alt="{{ $poster->title }}" 
                                     class="w-full h-48 object-cover rounded">
                            </div>
                        </div>

                        <!-- New Image Upload -->
                        <div>
                            <label for="image_path" class="block text-sm font-medium text-gray-700 mb-2">
                                Upload New Image
                            </label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-genyra-primary transition-colors">
                                <input type="file" 
                                       id="image_path" 
                                       name="image_path" 
                                       accept="image/*"
                                       class="hidden"
                                       onchange="previewImage(this)">
                                <label for="image_path" class="cursor-pointer">
                                    <div id="imagePreview" class="mb-3">
                                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400"></i>
                                    </div>
                                    <p class="text-sm text-gray-600">Click to upload new poster image</p>
                                    <p class="text-xs text-gray-500">Leave empty to keep current image</p>
                                </label>
                            </div>
                            @error('image_path')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mt-8 flex items-center justify-between">
                    <a href="{{ route('admin.posters.index') }}" 
                       class="px-4 py-2 text-gray-600 hover:text-gray-800 transition-colors">
                        <i class="fas fa-times mr-2"></i>
                        Cancel
                    </a>
                    <div class="space-x-3">
                        <button type="submit" 
                                class="px-6 py-2 bg-genyra-primary text-white rounded-lg hover:bg-genyra-secondary transition-colors">
                            <i class="fas fa-save mr-2"></i>
                            Update Poster
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `<img src="${e.target.result}" class="max-h-48 mx-auto rounded">`;
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
