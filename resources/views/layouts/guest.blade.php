<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Enrollment Portal')</title>
    <style>
        :root {
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background-color: #eef2ff;
            color: #0f172a;
        }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; display: flex; align-items: center; justify-content: center; background: #eef2ff; }
        body, input, button, select, textarea { font-family: inherit; }
        .page-shell { width: min(560px, calc(100% - 32px)); padding: 24px; }
        .card { background: #fff; border-radius: 24px; box-shadow: 0 24px 60px rgba(15, 23, 42, 0.08); padding: 36px; }
        .page-title { margin: 0 0 6px; font-size: 2.05rem; line-height: 1.05; }
        .page-subtitle { margin: 0 0 22px; color: #475569; }
        .form-field { width: 100%; padding: 14px 16px; border-radius: 14px; border: 1px solid #cbd5e1; background: #f8fafc; margin-bottom: 18px; }
        .form-field:focus { outline: none; border-color: #6366f1; background: #fff; }
        .btn { width: 100%; border: none; padding: 14px 18px; border-radius: 14px; background: #2563eb; color: #fff; font-weight: 700; cursor: pointer; }
        .link-row { display: flex; justify-content: space-between; align-items: center; margin-top: 16px; }
        .link-row a { color: #2563eb; text-decoration: none; }
        .alert { padding: 16px 18px; border-radius: 16px; background: #dbeafe; color: #1e3a8a; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="page-shell">
        <div class="card">
            @if(session('status'))
                <div class="alert">{{ session('status') }}</div>
            @endif
            @yield('content')
        </div>
    </div>
</body>
</html>
