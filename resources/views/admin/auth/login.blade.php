<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — WOJE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif !important; }
        .input-wrapper {
            position: relative;
        }
        .input-icon {
            position: absolute;
            left: 0.85rem;
            top: 50%;
            transform: translateY(-50%);
            color: #f53003;
            font-size: 0.8rem;
            pointer-events: none;
            z-index: 2;
        }
        .input-field {
            position: relative;
            z-index: 1;
            width: 100%;
            padding: 0.65rem 0.85rem 0.65rem 2.5rem;
            border: 1.5px solid #c8dce8;
            border-radius: 6px;
            font-size: 0.875rem;
            color: #1e3a6e;
            background: #f0fdf4;
            transition: border-color 0.15s, box-shadow 0.15s, background 0.15s;
            outline: none;
            box-sizing: border-box;
        }
        .input-field:focus {
            border-color: #28a745;
            box-shadow: 0 0 0 3px rgba(40,167,69,0.12);
            background: #fff;
        }
        .input-field::placeholder { color: #b0c4d4; }
    </style>
</head>
<body style="background: #f0fdf4; min-height: 100vh; display: flex; flex-direction: column;">

    {{-- Top bar --}}
    <div style="background: #28a745; border-bottom: 3px solid #f53003; padding: 0.75rem 1.5rem;">
        <div style="max-width: 1280px; margin: 0 auto; display: flex; align-items: center; gap: 0.75rem;">
            <img src="{{ asset('woje-logo.png') }}" alt="WOJE" style="height: 2rem; width: auto; border-radius: 4px;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
            <div style="display: none; color: #fff; font-weight: bold; font-size: 1.2rem;">WOJE</div>
            <span style="color: rgba(255,255,255,0.5); font-size: 0.75rem; font-weight: 500; letter-spacing: 0.05em;">Admin Portal</span>
        </div>
    </div>

    {{-- Main --}}
    <div style="flex: 1; display: flex; align-items: center; justify-content: center; padding: 2rem 1rem;">
        <div style="width: 100%; max-width: 420px;">

            {{-- Card --}}
            <div style="background: #fff; border-radius: 8px; box-shadow: 0 2px 12px rgba(30,58,110,0.09); overflow: hidden;">

                {{-- Card Header --}}
                <div style="background: #28a745; padding: 1.75rem 2rem; border-bottom: 3px solid #f53003;">
                    <p style="color: #ffffff; font-size: 0.65rem; font-weight: 700; letter-spacing: 0.15em; margin: 0 0 0.25rem;">WOJE</p>
                    <h1 style="color: #ffffff; font-size: 1.15rem; font-weight: 700; margin: 0;">Admin Sign In</h1>
                    <p style="color: rgba(255,255,255,0.85); font-size: 0.78rem; margin: 0.35rem 0 0;">Access the administration dashboard</p>
                </div>

                {{-- Form --}}
                <div style="padding: 2rem;">

                    @if(session('error'))
                        <div style="background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; border-radius: 6px; padding: 0.65rem 0.85rem; font-size: 0.82rem; margin-bottom: 1.25rem; display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-circle-exclamation" style="flex-shrink:0;"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div style="background: #f0fdf4; border: 1px solid #bbf7d0; color: #16a34a; border-radius: 6px; padding: 0.65rem 0.85rem; font-size: 0.82rem; margin-bottom: 1.25rem; display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-check-circle" style="flex-shrink:0;"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf

                        {{-- Email --}}
                        <div style="margin-bottom: 1.1rem;">
                            <label for="email" style="display: block; font-size: 0.78rem; font-weight: 600; color: #374151; margin-bottom: 0.4rem;">Email Address</label>
                            <div style="position: relative;">
                                <span class="input-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#f53003" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm13.293-.707A1 1 0 0 0 12.586 4L8.707 7.879a1 1 0 0 1-1.414 0L3.414 4A1 1 0 1 0 .707 5.707l3.999 3.999a3 3 0 0 0 4.242 0l3.999-3.999z"/>
                                    </svg>
                                </span>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                    class="input-field" placeholder="your@email.com">
                            </div>
                            @error('email')
                                <p style="margin: 0.3rem 0 0; font-size: 0.75rem; color: #dc2626;">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div style="margin-bottom: 1.1rem;">
                            <label for="password" style="display: block; font-size: 0.78rem; font-weight: 600; color: #374151; margin-bottom: 0.4rem;">Password</label>
                            <div style="position: relative;">
                                <span class="input-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#f53003" viewBox="0 0 16 16">
                                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                                    </svg>
                                </span>
                                <input type="password" id="password" name="password" required
                                    class="input-field" placeholder="Enter your password">
                            </div>
                            @error('password')
                                <p style="margin: 0.3rem 0 0; font-size: 0.75rem; color: #dc2626;">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Remember me --}}
                        <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.5rem;">
                            <input type="checkbox" id="remember" name="remember"
                                style="width: 1rem; height: 1rem; accent-color: #f53003; cursor: pointer;">
                            <label for="remember" style="font-size: 0.8rem; color: #6b7280; cursor: pointer;">Remember me</label>
                        </div>

                        {{-- Submit --}}
                        <button type="submit"
                            style="width: 100%; padding: 0.7rem 1rem; background: #f53003; color: #fff; border: none; border-radius: 6px; font-size: 0.875rem; font-weight: 600; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 0.5rem; transition: background 0.15s; letter-spacing: 0.03em;"
                            onmouseover="this.style.background='#28a745'" onmouseout="this.style.background='#f53003'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                            </svg>
                            Sign In
                        </button>
                    </form>
                </div>
            </div>

            {{-- Footer --}}
            <p style="text-align: center; margin-top: 1.5rem; font-size: 0.72rem;" class="text-gray-500">
                &copy; {{ date('Y') }} Women's Justice and Empowerment (WOJE). All rights reserved.
            </p>
        </div>
    </div>

</body>
</html>
