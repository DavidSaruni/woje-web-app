@extends('admin.layouts.app')

@section('title', 'Contact Messages')

@section('content')
{{-- Header --}}
<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.5rem;">
    <div>
        <h1 style="font-size:1.1rem; font-weight:700; color:#0f172a; margin:0;">Contact Messages</h1>
        <p style="font-size:0.78rem; color:#64748b; margin:0.2rem 0 0;">Manage and respond to website inquiries</p>
    </div>
    <div style="display:flex; align-items:center; gap:0.5rem;">
        <span style="font-size:0.78rem; color:#64748b;">{{ $messages->total() }} total</span>
    </div>
</div>

{{-- Table --}}
<div style="background:#fff; border-radius:8px; border:1px solid #e2e8f0; box-shadow:0 1px 4px rgba(0,0,0,0.05); overflow:hidden;">
    <div style="overflow-x:auto;">
        <table style="width:100%; border-collapse:collapse; font-size:0.82rem;">
            <thead>
                <tr style="background:#f8fafc; border-bottom:1px solid #e2e8f0;">
                    <th style="padding:0.75rem 1.25rem; text-align:left; font-size:0.68rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em;">Contact</th>
                    <th style="padding:0.75rem 1.25rem; text-align:left; font-size:0.68rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em;">Subject</th>
                    <th style="padding:0.75rem 1.25rem; text-align:left; font-size:0.68rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em;">Date</th>
                    <th style="padding:0.75rem 1.25rem; text-align:right; font-size:0.68rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                    <tr style="border-bottom:1px solid #f1f5f9; transition:background 0.12s;"
                        onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">

                        {{-- Contact --}}
                        <td style="padding:0.9rem 1.25rem; max-width:320px;">
                            <p style="font-weight:600; color:#0f172a; margin:0; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                                {{ $message->full_name }}
                            </p>
                            <p style="font-size:0.75rem; color:#94a3b8; margin:0.2rem 0 0; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                                {{ $message->email }}
                            </p>
                            @if($message->status === 'pending')
                                <span style="display:inline-flex; align-items:center; gap:0.35rem; padding:0.25rem 0.65rem; background:#fef2f2; color:#dc2626; border:1px solid #fecaca; border-radius:99px; font-size:0.7rem; font-weight:600; margin-top:0.4rem;">
                                    <span style="width:6px; height:6px; border-radius:50%; background:#ef4444;"></span> Unread
                                </span>
                            @endif
                        </td>

                        {{-- Subject --}}
                        <td style="padding:0.9rem 1.25rem; max-width:300px;">
                            <p style="font-size:0.78rem; color:#64748b; margin:0; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                                {{ $message->subject ?? 'No subject' }}
                            </p>
                        </td>

                        {{-- Date --}}
                        <td style="padding:0.9rem 1.25rem; white-space:nowrap; font-size:0.78rem; color:#64748b;">
                            {{ $message->created_at->format('M d, Y') }}
                        </td>

                        {{-- Actions --}}
                        <td style="padding:0.9rem 1.25rem;">
                            <div style="display:flex; align-items:center; justify-content:flex-end; gap:0.2rem;">

                                {{-- View --}}
                                <a href="{{ route('admin.contact.show', $message) }}" title="View"
                                   style="width:2rem; height:2rem; display:flex; align-items:center; justify-content:center; border-radius:6px; color:#94a3b8; text-decoration:none; transition:all 0.12s;"
                                   onmouseover="this.style.background='#eaf6fb'; this.style.color='#1e3a6e';"
                                   onmouseout="this.style.background='transparent'; this.style.color='#94a3b8';">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </a>

                                {{-- Reply --}}
                                @if($message->status !== 'replied')
                                <a href="{{ route('admin.contact.edit', $message) }}" title="Reply"
                                   style="width:2rem; height:2rem; display:flex; align-items:center; justify-content:center; border-radius:6px; color:#94a3b8; text-decoration:none; transition:all 0.12s;"
                                   onmouseover="this.style.background='#f0fdf4'; this.style.color='#16a34a';"
                                   onmouseout="this.style.background='transparent'; this.style.color='#94a3b8';">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                    </svg>
                                </a>
                                @endif

                                {{-- Delete --}}
                                <form action="{{ route('admin.contact.destroy', $message) }}" method="POST"
                                      onsubmit="return confirm('Are you sure?')" style="margin:0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Delete"
                                        style="width:2rem; height:2rem; display:flex; align-items:center; justify-content:center; border-radius:6px; color:#94a3b8; background:none; border:none; cursor:pointer; transition:all 0.12s;"
                                        onmouseover="this.style.background='#fef2f2'; this.style.color='#dc2626';"
                                        onmouseout="this.style.background='transparent'; this.style.color='#94a3b8';">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="padding:3.5rem 1.25rem; text-align:center;">
                            <div style="display:flex; flex-direction:column; align-items:center; gap:0.65rem;">
                                <div style="width:3rem; height:3rem; border-radius:50%; background:#f1f5f9; display:flex; align-items:center; justify-content:center;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#cbd5e1" viewBox="0 0 16 16">
                                        <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h5.5a.5.5 0 0 0 0-1H2zm7 0a.5.5 0 0 0 0 1h5a1 1 0 0 1 1 1v8.01a1 1 0 0 1-1 1H9a.5.5 0 0 0 0 1h5a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H9z"/>
                                        <path d="M3.5 4a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5h-9z"/>
                                    </svg>
                                </div>
                                <p style="font-weight:600; color:#64748b; font-size:0.85rem; margin:0;">No contact messages found.</p>
                                <p style="font-size:0.78rem; color:#94a3b8; margin:0;">Messages from the website contact form will appear here.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($messages->hasPages())
        <div style="padding:0.9rem 1.25rem; border-top:1px solid #f1f5f9; background:#f8fafc;">
            {{ $messages->links() }}
        </div>
    @endif
</div>
@endsection
