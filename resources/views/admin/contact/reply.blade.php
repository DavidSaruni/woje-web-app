@extends('admin.layouts.app')

@section('title', 'Reply to Contact Message - WOJE Admin')

@section('content')
<div class="bg-white rounded-lg shadow">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.contact.show', $contactMessage) }}" 
                   class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h3 class="text-lg font-semibold text-gray-900">Reply to {{ $contactMessage->full_name }}</h3>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Original Message -->
            <div>
                <h4 class="text-md font-semibold text-gray-900 mb-4">Original Message</h4>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">From</label>
                        <p class="text-gray-900">{{ $contactMessage->full_name }} ({{ $contactMessage->email }})</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                        <p class="text-gray-900">{{ $contactMessage->subject }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                        <p class="text-gray-900">{{ $contactMessage->created_at->format('F d, Y \a\t g:i A') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-gray-900 whitespace-pre-wrap">{{ $contactMessage->message }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reply Form -->
            <div>
                <h4 class="text-md font-semibold text-gray-900 mb-4">Your Reply</h4>
                <form action="{{ route('admin.contact.update', $contactMessage) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-4">
                        <div>
                            <label for="admin_reply" class="block text-sm font-medium text-gray-700 mb-1">Reply Message *</label>
                            <textarea name="admin_reply" id="admin_reply" 
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                      rows="10" required placeholder="Type your reply here...">{{ old('admin_reply') }}</textarea>
                            @error('admin_reply')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-info-circle text-blue-400"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-blue-700">
                                        <strong>Note:</strong> This reply will be saved to the database and marked as replied. 
                                        Email notification functionality can be added later.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="flex space-x-3">
                            <button type="submit" 
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                <i class="fas fa-paper-plane mr-2"></i> Send Reply
                            </button>
                            <a href="{{ route('admin.contact.show', $contactMessage) }}" 
                               class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                                <i class="fas fa-times mr-2"></i> Cancel
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
