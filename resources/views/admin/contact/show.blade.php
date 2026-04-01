@extends('admin.layouts.app')

@section('title', 'Contact Message - WOJE Admin')

@section('content')
<div class="bg-white rounded-lg shadow">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.contact.index') }}" 
                       class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h3 class="text-lg font-semibold text-gray-900">Contact Message</h3>
                </div>
                <div class="flex items-center space-x-2">
                    @if($contactMessage->status !== 'replied')
                        <a href="{{ route('admin.contact.edit', $contactMessage->id) }}" 
                           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-reply mr-2"></i>
                            Reply
                        </a>
                    @endif
                    <a href="mailto:{{ $contactMessage->email }}" 
                       class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-envelope mr-2"></i>
                        Email Client
                    </a>
                    <form action="{{ route('admin.contact.destroy', $contactMessage->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this message?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                            <i class="fas fa-trash mr-2"></i>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Message Details -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Sender Information -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <p class="text-gray-900">{{ $contactMessage->full_name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <p class="text-gray-900">
                            <a href="mailto:{{ $contactMessage->email }}" 
                               class="text-blue-600 hover:text-blue-700">
                                {{ $contactMessage->email }}
                            </a>
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $contactMessage->status_color }}-100 text-{{ $contactMessage->status_color }}-800">
                            {{ ucfirst($contactMessage->status) }}
                        </span>
                    </div>
                </div>

                <!-- Message Metadata -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                        <p class="text-gray-900">{{ $contactMessage->subject }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Received</label>
                        <p class="text-gray-900">
                            {{ $contactMessage->created_at->format('M d, Y \a\t h:i A') }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Message ID</label>
                        <p class="text-gray-500 text-sm">#{{ $contactMessage->id }}</p>
                    </div>
                </div>
            </div>

            <!-- Message Content -->
            <div class="border-t border-gray-200 pt-6">
                <label class="block text-sm font-medium text-gray-700 mb-3">Message</label>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-gray-900 whitespace-pre-wrap">{{ $contactMessage->message }}</p>
                </div>
            </div>

            <!-- Admin Reply (if exists) -->
            @if($contactMessage->admin_reply)
                <div class="border-t border-gray-200 pt-6 mt-6">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Admin Reply</label>
                    <div class="bg-green-50 rounded-lg p-4">
                        <p class="text-gray-900 whitespace-pre-wrap">{{ $contactMessage->admin_reply }}</p>
                    </div>
                    @if($contactMessage->replied_at)
                        <div class="mt-3 text-sm text-gray-500">
                            Replied by {{ $contactMessage->repliedBy->name ?? 'Unknown' }} on {{ $contactMessage->replied_at->format('M d, Y \a\t h:i A') }}
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
