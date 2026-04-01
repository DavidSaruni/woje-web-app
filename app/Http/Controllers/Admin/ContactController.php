<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Auth;
use App\Mail\ContactReplyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    protected $middleware = [
        'auth'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = ContactMessage::with('repliedBy')
            ->latest()
            ->paginate(20);

        return view('admin.contact.index', compact('messages'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactMessage $contact)
    {
        // Mark as read if status is pending
        if ($contact->status === 'pending') {
            $contact->update(['status' => 'read']);
        }

        return view('admin.contact.show', ['contactMessage' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactMessage $contact)
    {
        return view('admin.contact.reply', ['contactMessage' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactMessage $contact)
    {
        $validated = $request->validate([
            'admin_reply' => 'required|string|min:10'
        ]);

        $contact->update([
            'admin_reply' => $validated['admin_reply'],
            'status' => 'replied',
            'replied_at' => now(),
            'replied_by' => Auth::id()
        ]);

        // Send reply email to the contact person
        try {
            Mail::to($contact->email)->send(new ContactReplyMail($contact, $validated['admin_reply']));
        } catch (\Exception $e) {
            Log::error('Failed to send reply email: ' . $e->getMessage());
            // Continue even if email fails
        }

        return redirect()
            ->route('admin.contact.index')
            ->with('success', 'Reply sent successfully! Email has been sent to the contact person.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactMessage $contact)
    {
        $contact->delete();

        return redirect()
            ->route('admin.contact.index')
            ->with('success', 'Message deleted successfully!');
    }
}
