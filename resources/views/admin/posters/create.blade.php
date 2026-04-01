@extends('admin.layouts.app')

@section('title', 'Create Poster - Woje')

@section('content')
<style>
    .field-label { display:block; font-size:0.78rem; font-weight:600; color:#374151; margin-bottom:0.4rem; }
    .field-hint  { font-size:0.72rem; color:#94a3b8; margin:0.3rem 0 0; }
    .field-error { font-size:0.72rem; color:#dc2626; margin:0.3rem 0 0; }
    .form-input {
        width:100%; padding:0.6rem 0.8rem; border:1.5px solid #e2e8f0; border-radius:6px;
        font-size:0.83rem; color:#0f172a; background:#fff; outline:none;
        transition:border-color 0.15s, box-shadow 0.15s; box-sizing:border-box;
    }
    .form-input:focus { border-color:#1e3a6e; box-shadow:0 0 0 3px rgba(30,58,110,0.08); }
    .form-input::placeholder { color:#cbd5e1; }
    .file-input {
        width:100%; padding:0.5rem 0.8rem; border:1.5px dashed #e2e8f0; border-radius:6px;
        font-size:0.78rem; color:#64748b; background:#f8fafc; cursor:pointer;
        box-sizing:border-box; transition:border-color 0.15s;
    }
    .file-input:hover { border-color:#1e3a6e; }
    .card { background:#fff; border-radius:8px; border:1px solid #e2e8f0; box-shadow:0 1px 4px rgba(0,0,0,0.05); overflow:hidden; margin-bottom:1.25rem; }
    .card-header { padding:0.8rem 1.25rem; border-bottom:1px solid #f1f5f9; background:#f8fafc; }
    .card-header p { font-size:0.68rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em; margin:0; }
    .card-body { padding:1.25rem; }
    .checkbox-label { display:flex; align-items:center; gap:0.5rem; cursor:pointer; }
    .checkbox-label input[type="checkbox"] { width:1rem; height:1rem; border-color:#e2e8f0; color:#1e3a6e; border-radius:4px; }
    .checkbox-label input[type="checkbox"]:checked { background:#1e3a6e; border-color:#1e3a6e; }

    .form-grid { display:grid; grid-template-columns:1fr; gap:0; }
    @media(min-width:1024px) {
        .form-grid { grid-template-columns:1fr 270px; gap:1.25rem; align-items:start; }
    }
</style>

{{-- Page header --}}
<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.5rem; flex-wrap:wrap; gap:0.75rem;">
    <div>
        <h1 style="font-size:1.1rem; font-weight:700; color:#0f172a; margin:0;">Create New Poster</h1>
        <p style="font-size:0.78rem; color:#64748b; margin:0.2rem 0 0;">Upload and configure a new promotional poster</p>
    </div>
    <a href="{{ route('admin.posters.index') }}"
       style="display:inline-flex; align-items:center; gap:0.4rem; font-size:0.78rem; color:#64748b; text-decoration:none;"
       onmouseover="this.style.color='#1e3a6e'" onmouseout="this.style.color='#64748b'">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
        Back to Posters
    </a>
</div>

<form action="{{ route('admin.posters.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="form-grid">

    {{-- LEFT: Main content --}}
    <div>

        {{-- Title --}}
        <div class="card">
            <div class="card-header"><p>Poster Details</p></div>
            <div class="card-body" style="display:flex; flex-direction:column; gap:1rem;">
                <div>
                    <label for="title" class="field-label">Title <span style="color:#ef4444;">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required
                        class="form-input" placeholder="Enter poster title...">
                    @error('title') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="description" class="field-label">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="form-input" placeholder="Enter poster description (optional)">{{ old('description') }}</textarea>
                    <p class="field-hint">Brief description of the poster content</p>
                    @error('description') <p class="field-error">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        {{-- Image Upload --}}
        <div class="card">
            <div class="card-header"><p>Poster Image</p></div>
            <div class="card-body">
                <div style="margin-bottom:1.1rem;">
                    <label for="image_path" class="field-label">Image File <span style="color:#ef4444;">*</span></label>
                    <div style="border:1.5px dashed #e2e8f0; border-radius:6px; padding:1.5rem; text-align:center; transition:border-color 0.15s; cursor:pointer;"
                         onmouseover="this.style.borderColor='#1e3a6e'" onmouseout="this.style.borderColor='#e2e8f0'">
                        <input type="file" id="image_path" name="image_path" accept="image/*"
                               class="hidden" onchange="previewImage(this)">
                        <label for="image_path" style="cursor:pointer; margin:0;">
                            <div id="imagePreview" style="margin-bottom:0.75rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#cbd5e1" viewBox="0 0 16 16">
                                    <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                    <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 14 13V2z"/>
                                </svg>
                            </div>
                            <p style="font-size:0.78rem; color:#374151; margin:0;">Click to upload poster image</p>
                            <p style="font-size:0.72rem; color:#94a3b8; margin:0.25rem 0 0;">JPEG, PNG, JPG, GIF (max 1MB)</p>
                        </label>
                    </div>
                    @error('image_path') <p class="field-error">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

    </div>

    {{-- RIGHT: Settings sidebar --}}
    <div>

        {{-- Publish Settings --}}
        <div class="card">
            <div class="card-header"><p>Publish Settings</p></div>
            <div class="card-body" style="display:flex; flex-direction:column; gap:1rem;">

                <div>
                    <label class="checkbox-label">
                        <input type="checkbox" id="is_active" name="is_active" value="1" checked>
                        <span style="font-size:0.78rem; color:#374151; font-weight:500;">Make this poster active</span>
                    </label>
                    <p class="field-hint">Only one poster can be active at a time. This will deactivate all other posters.</p>
                    @error('is_active') <p class="field-error">{{ $message }}</p> @enderror
                </div>

            </div>
        </div>

        {{-- Tips --}}
        <div style="background:#f0f7ff; border:1px solid #bfdbfe; border-radius:8px; padding:1rem; margin-bottom:1.25rem;">
            <p style="font-size:0.68rem; font-weight:700; color:#1e3a6e; text-transform:uppercase; letter-spacing:0.08em; margin:0 0 0.6rem;">Tips</p>
            <ul style="margin:0; padding-left:1rem; font-size:0.78rem; color:#3b5b8c; line-height:1.8;">
                <li>Use high-quality images for best results</li>
                <li>Recommended dimensions: 1920x1080px</li>
                <li>Keep file size under 1MB for fast loading</li>
                <li>Only one poster can be active at a time</li>
            </ul>
        </div>

    </div>
</div>

{{-- Bottom action bar --}}
<div style="background:#fff; border-radius:8px; border:1px solid #e2e8f0; padding:1rem 1.25rem; display:flex; align-items:center; justify-content:flex-end; gap:0.75rem; margin-top:0.5rem; box-shadow:0 1px 4px rgba(0,0,0,0.05);">
    <a href="{{ route('admin.posters.index') }}"
       style="padding:0.6rem 1.25rem; border:1.5px solid #e2e8f0; border-radius:6px; font-size:0.82rem; font-weight:600; color:#64748b; text-decoration:none; transition:all 0.15s;"
       onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
        Cancel
    </a>
    <button type="submit"
        style="padding:0.6rem 1.5rem; background:#1e3a6e; color:#fff; border:none; border-radius:6px; font-size:0.82rem; font-weight:600; cursor:pointer; transition:background 0.15s; display:inline-flex; align-items:center; gap:0.4rem;"
        onmouseover="this.style.background='#00a0c6'" onmouseout="this.style.background='#1e3a6e'">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
        </svg>
        Create Poster
    </button>
</div>

</form>

<script>
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `<img src="${e.target.result}" style="max-height:120px; border-radius:6px; border:1px solid #e2e8f0;">`;
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
