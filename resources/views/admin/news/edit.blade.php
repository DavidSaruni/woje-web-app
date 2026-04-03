@extends('admin.layouts.app')

@section('title', 'Edit News')

@section('content')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
    .ql-toolbar.ql-snow { border-radius:6px 6px 0 0; border-color:#e2e8f0 !important; background:#f8fafc; }
    .ql-container.ql-snow { border-radius:0 0 6px 6px; border-color:#e2e8f0 !important; font-size:0.85rem; }
    .ql-editor { min-height:220px; }

    .form-grid { display:grid; grid-template-columns:1fr; gap:0; }
    @media(min-width:1024px) {
        .form-grid { grid-template-columns:1fr 270px; gap:1.25rem; align-items:start; }
    }
    .images-grid { display:grid; grid-template-columns:1fr; gap:0.75rem; }
    @media(min-width:640px) {
        .images-grid { grid-template-columns:repeat(3,1fr); }
    }
    .current-image { border:1px solid #e2e8f0; border-radius:6px; padding:0.5rem; margin-top:0.5rem; }
    .current-image img { border-radius:4px; }
</style>

{{-- Page header --}}
<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.5rem; flex-wrap:wrap; gap:0.75rem;">
    <div>
        <h1 style="font-size:1.1rem; font-weight:700; color:#0f172a; margin:0;">Edit News Article</h1>
        <p style="font-size:0.78rem; color:#64748b; margin:0.2rem 0 0;">Update the content and settings for this article</p>
    </div>
    <a href="{{ route('admin.news.index') }}"
       style="display:inline-flex; align-items:center; gap:0.4rem; font-size:0.78rem; color:#64748b; text-decoration:none;"
       onmouseover="this.style.color='#1e3a6e'" onmouseout="this.style.color='#64748b'">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
        Back to Articles
    </a>
</div>

<form action="{{ route('admin.news.update', $article->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="form-grid">

    {{-- LEFT: Main content --}}
    <div>

        {{-- Title --}}
        <div class="card">
            <div class="card-header"><p>Article Title</p></div>
            <div class="card-body">
                <label for="title" class="field-label">Title <span style="color:#ef4444;">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title', $article->title) }}" required
                    class="form-input" placeholder="Enter news article title...">
                @error('title') <p class="field-error">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Excerpt --}}
        <div class="card">
            <div class="card-header"><p>Excerpt</p></div>
            <div class="card-body">
                <label for="excerpt" class="field-label">Brief Summary</label>
                <textarea id="excerpt" name="excerpt" rows="3"
                    class="form-input" placeholder="Write a brief summary...">{{ old('excerpt', $article->excerpt) }}</textarea>
                <p class="field-hint">Shown on the news listing page (optional)</p>
                @error('excerpt') <p class="field-error">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Content --}}
        <div class="card">
            <div class="card-header"><p>Full Content</p></div>
            <div class="card-body">
                <label class="field-label">Article Body <span style="color:#ef4444;">*</span></label>
                <div id="editor"></div>
                <input type="hidden" id="content" name="content" value="{{ old('content', $article->content) }}">
                @error('content') <p class="field-error">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Images --}}
        <div class="card">
            <div class="card-header"><p>Images</p></div>
            <div class="card-body">
                <div style="margin-bottom:1.1rem;">
                    <label for="main_image" class="field-label">Main Image</label>
                    <input type="file" id="main_image" name="main_image" accept="image/*" class="file-input">
                    <p class="field-hint">Primary image for the news listing (JPEG, PNG, JPG, GIF — max 2MB)</p>
                    @if(isset($article->main_image) && $article->main_image)
                        <div class="current-image">
                            <p style="font-size:0.7rem; color:#64748b; margin-bottom:0.25rem;">Current main image:</p>
                            <img src="{{ asset($article->image_path) }}" alt="{{ $article->title }}" 
                                 style="height:3rem; width:auto; border-radius:4px;">
                        </div>
                    @endif
                    @error('main_image') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                <div style="border-top:1px solid #f1f5f9; padding-top:1rem;">
                    <p class="field-label" style="margin-bottom:0.75rem;">Additional Images <span style="font-weight:400; color:#94a3b8;">(optional)</span></p>
                    <div class="images-grid">
                        @foreach([2, 3, 4] as $n)
                        <div>
                            <label for="image_{{ $n }}" class="field-label" style="color:#64748b;">Image {{ $n }}</label>
                            <input type="file" id="image_{{ $n }}" name="image_{{ $n }}" accept="image/*" class="file-input">
                            @if(isset($article->{'image_' . $n}) && $article->{'image_' . $n})
                                <div class="current-image">
                                    <p style="font-size:0.7rem; color:#64748b; margin-bottom:0.25rem;">Current:</p>
                                    <img src="{{ asset(\App\Models\NewsArticle::storedPathForAsset($article->{'image_' . $n})) }}" alt="{{ $article->title }}" 
                                         style="height:2.5rem; width:auto; border-radius:4px;">
                                </div>
                            @endif
                            @error('image_'.$n) <p class="field-error">{{ $message }}</p> @enderror
                        </div>
                        @endforeach
                    </div>
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
                    <label for="status" class="field-label">Status <span style="color:#ef4444;">*</span></label>
                    <select id="status" name="status" required class="form-input">
                        <option value="draft" {{ old('status', $article->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $article->status) == 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="category" class="field-label">Category <span style="color:#ef4444;">*</span></label>
                    <select id="category" name="category" required class="form-input">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->slug }}" {{ old('category', $article->category->slug ?? '') == $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="date" class="field-label">Date</label>
                    <input type="datetime-local" id="date" name="date" 
                        value="{{ old('date', $article->date ? $article->date->format('Y-m-d\TH:i') : '') }}" class="form-input">
                    <p class="field-hint">Publication date (optional - leave empty for current date)</p>
                    @error('date') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="read_time" class="field-label">Read Time (minutes)</label>
                    <input type="number" id="read_time" name="read_time" min="1" max="30"
                        value="{{ old('read_time', $article->read_time ?? 5) }}" class="form-input" placeholder="5">
                    <p class="field-hint">Estimated reading time (1–30 minutes)</p>
                    @error('read_time') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="featured" name="featured" value="1" 
                            class="w-4 h-4 text-woje-red border-gray-300 rounded focus:ring-woje-red"
                            {{ old('featured', $article->featured) ? 'checked' : '' }}>
                        <span class="field-label mb-0">Feature this article</span>
                    </label>
                    <p class="field-hint">Featured articles appear prominently on the website</p>
                    @error('featured') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                @if($article->published_at)
                    <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:6px; padding:0.75rem;">
                        <p style="font-size:0.7rem; color:#64748b; margin:0;">
                            <strong>Published on:</strong> {{ is_string($article->published_at) ? $article->published_at : $article->published_at->format('M d, Y H:i') }}
                        </p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Tips --}}
        <div style="background:#f0f7ff; border:1px solid #bfdbfe; border-radius:8px; padding:1rem; margin-bottom:1.25rem;">
            <p style="font-size:0.68rem; font-weight:700; color:#1e3a6e; text-transform:uppercase; letter-spacing:0.08em; margin:0 0 0.6rem;">Tips</p>
            <ul style="margin:0; padding-left:1rem; font-size:0.78rem; color:#3b5b8c; line-height:1.8;">
                <li>Add a clear, descriptive title</li>
                <li>Write a short excerpt for previews</li>
                <li>Upload a main image (required)</li>
                <li>Save as Draft to review first</li>
            </ul>
        </div>

    </div>
</div>

{{-- Bottom action bar --}}
<div style="background:#fff; border-radius:8px; border:1px solid #e2e8f0; padding:1rem 1.25rem; display:flex; align-items:center; justify-content:flex-end; gap:0.75rem; margin-top:0.5rem; box-shadow:0 1px 4px rgba(0,0,0,0.05);">
    <a href="{{ route('admin.news.index') }}"
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
        Update Article
    </button>
</div>

</form>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Write full news article content here...',
            modules: {
                toolbar: [
                    [{ header: [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline'],
                    ['blockquote'],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    [{ align: [] }],
                    ['link'],
                    ['clean']
                ]
            }
        });

        var contentInput = document.getElementById('content');

        // Restore old() value on validation failure
        if (contentInput.value) {
            quill.root.innerHTML = contentInput.value;
        }

        // Keep hidden input in sync on every keystroke
        quill.on('text-change', function () {
            contentInput.value = quill.root.innerHTML;
        });

        // Belt-and-suspenders: also set on submit
        document.querySelector('form').addEventListener('submit', function () {
            contentInput.value = quill.root.innerHTML;
        });
    });
</script>
@endsection
