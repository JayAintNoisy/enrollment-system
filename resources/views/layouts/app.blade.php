<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Enrollment System')</title>
    <style>
        :root {
            color-scheme: light;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background-color: #eef2ff;
            color: #0f172a;
        }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; background: #eef2ff; }
        a { color: inherit; }
        body, button, input, select, textarea { font-family: inherit; }
        .app-shell { display: flex; min-height: 100vh; flex-direction: column; }
        .site-header { display: flex; justify-content: space-between; align-items: center; gap: 16px; background: #1e293b; color: #fff; padding: 22px 24px; }
        .brand { display: flex; align-items: center; gap: 12px; font-size: 1.3rem; font-weight: 800; }
        .brand a { color: #fff; text-decoration: none; }
        .nav-links { display: flex; flex-wrap: wrap; gap: 10px; }
        .nav-links a { text-decoration: none; color: #e2e8f0; background: rgba(255,255,255,0.08); padding: 10px 14px; border-radius: 999px; transition: background 0.2s ease; }
        .nav-links a:hover { background: rgba(255,255,255,0.18); }
        .nav-links a.active { background: #2563eb; color: #fff; }
        .portal-switch { display: flex; gap: 8px; align-items: center; }
        .portal-switch a { text-decoration: none; color: #fff; background: rgba(59, 130, 246, 0.2); padding: 8px 12px; border-radius: 8px; font-size: 0.85rem; transition: background 0.2s ease; }
        .portal-switch a:hover { background: rgba(59, 130, 246, 0.3); }
        .app-main { flex: 1; width: min(1200px, calc(100% - 48px)); margin: 32px auto; }
        .page-header { margin-bottom: 24px; display: flex; justify-content: space-between; align-items: flex-end; gap: 14px; }
        .page-title { margin: 0; font-size: 2.2rem; line-height: 1.1; }
        .page-subtitle { margin: 6px 0 0; color: #475569; }
        .card { background: #fff; border-radius: 24px; box-shadow: 0 24px 60px rgba(15, 23, 42, 0.08); padding: 28px; }
        .card-section { margin-top: 24px; }
        .table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        .table th, .table td { padding: 16px 18px; text-align: left; border-bottom: 1px solid #e2e8f0; }
        .table th { background: #f8fafc; color: #475569; font-weight: 700; }
        .table tr:nth-child(even) { background: #f8fafc; }
        .form-field { width: 100%; padding: 14px 16px; border-radius: 14px; border: 1px solid #cbd5e1; background: #f8fafc; margin-bottom: 18px; }
        .form-field:focus { outline: none; border-color: #6366f1; background: #fff; }
        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 22px; border-radius: 14px; border: none; cursor: pointer; text-decoration: none; font-weight: 700; }
        .btn-primary { background: #2563eb; color: #fff; }
        .btn-secondary { background: #475569; color: #fff; }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 18px; margin-top: 18px; }
        .stat-card { padding: 24px; border-radius: 20px; background: #f8fafc; }
        .stat-card strong { display: block; font-size: 2rem; margin-bottom: 10px; }
        .alert { padding: 16px 20px; border-radius: 18px; background: #dbeafe; color: #1e3a8a; margin-bottom: 24px; }
        .form-actions { display: flex; flex-wrap: wrap; gap: 12px; align-items: center; }
        .footer { padding: 18px 24px; text-align: center; color: #475569; background: #fff; border-top: 1px solid #e2e8f0; }
    </style>
</head>
<body>
    <div class="app-shell">
        <header class="site-header">
            <div class="brand">
                <a href="{{ route('admin.dashboard') }}">Enrollment Admin</a>
            </div>

            <div class="nav-links">
                <a href="{{ route('admin.dashboard') }}" @if(Route::currentRouteName() === 'admin.dashboard' || Route::currentRouteName() === 'admin.dashboard.alt') class="active" @endif>Dashboard</a>
                <a href="{{ route('students.index') }}" @if(Route::currentRouteName() === 'students.index') class="active" @endif>Students</a>
                <a href="{{ route('courses.index') }}" @if(Route::currentRouteName() === 'courses.index') class="active" @endif>Courses</a>
                <a href="{{ route('enrollments.index') }}" @if(Route::currentRouteName() === 'enrollments.index') class="active" @endif>Enrollments</a>
            </div>

            {{-- Logout quick-action placed next to main nav for visibility --}}
            <form method="POST" action="{{ route('logout') }}" style="margin:0 12px 0 0; display:inline-block;">
                @csrf
                <button type="submit" style="display:inline-block; padding:10px 14px; border-radius:999px; background:#ef4444; color:#fff; border:none; font-weight:700; cursor:pointer;">Log out</button>
            </form>
        </header>

        <main class="app-main">
            @if(session('status'))
                <div class="alert">{{ session('status') }}</div>
            @endif
            @yield('content')
        </main>

        <footer class="footer">
            Enrollment System · Admin Console
        </footer>
    </div>

</body>
</html>
