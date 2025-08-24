<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Demo — Custom Landing</title>
    <style>
        :root { --bg: #0f172a; --card: #111827; --text: #e5e7eb; --muted: #94a3b8; --accent: #22d3ee; --accent2: #a78bfa; }
        * { box-sizing: border-box; }
        body { margin: 0; font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji"; background: radial-gradient(1200px 800px at 10% 10%, #0b1220, var(--bg)); color: var(--text); }
        .container { max-width: 980px; margin: 0 auto; padding: 48px 20px; }
        .hero { display: grid; gap: 10px; margin-bottom: 28px; }
        h1 { font-size: 40px; line-height: 1.1; margin: 0; letter-spacing: -0.02em; }
        .subtitle { color: var(--muted); font-size: 16px; }
        .card { background: linear-gradient(180deg, rgba(255,255,255,0.04), rgba(255,255,255,0.02)); border: 1px solid rgba(255,255,255,0.06); border-radius: 14px; padding: 18px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px; }
        .chip { display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.08); border-radius: 999px; padding: 8px 12px; font-size: 12px; color: var(--muted); }
        .chip b { color: var(--text); font-weight: 600; }
        .note { padding: 14px; background: rgba(34,211,238,0.08); border: 1px solid rgba(34,211,238,0.3); border-radius: 12px; }
        .note h3 { margin: 0 0 6px; font-size: 15px; }
        .badge { display: inline-block; font-size: 11px; color: #0f172a; background: linear-gradient(90deg, var(--accent), var(--accent2)); padding: 6px 10px; border-radius: 999px; font-weight: 700; letter-spacing: .02em; }
        .list { list-style: none; padding: 0; margin: 10px 0 0; }
        .list li { margin: 6px 0; color: var(--muted); }
        .items { margin-top: 20px; display: grid; gap: 10px; }
        .item { background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 12px; padding: 14px; }
        .item h4 { margin: 0 0 4px; font-size: 15px; }
        .muted { color: var(--muted); }
        a { color: var(--accent); text-decoration: none; }
        a:hover { text-decoration: underline; }
        footer { margin-top: 36px; color: var(--muted); font-size: 12px; text-align: center; }
    </style>
    <meta name="color-scheme" content="dark light">
    <meta name="theme-color" content="#0f172a">
    <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ccircle cx='50' cy='50' r='46' fill='%2322d3ee'/%3E%3C/svg%3E">
    <meta name="robots" content="noindex">
    @php($has = isset($items) && count($items))
    @php($now = date('Y'))
    @php($v = app()::VERSION)
    @php($phpver = phpversion())
</head>
<body>
    <div class="container">
        <div class="hero">
            <div class="badge">Custom Landing</div>
            <h1>Welcome to your Laravel Demo</h1>
            <div class="subtitle">A tiny starter running on PHP {{ $phpver }} · Laravel {{ $v }}</div>
        </div>

        <div class="grid">
            <div class="card">
                <div class="chip"><b>Getting started</b> · in seconds</div>
                <ul class="list">
                    <li>Run <code>php artisan serve</code> and open <a href="/">http://127.0.0.1:8000</a>.</li>
                    <li>Migrate: <code>php artisan migrate</code> · Seed: <code>php artisan db:seed --class=DemoItemSeeder</code>.</li>
                    <li>Browse code in <code>app/</code> and routes in <code>routes/web.php</code>.</li>
                </ul>
            </div>
            <div class="card">
                <div class="chip"><b>Cool notes</b> · what’s inside</div>
                <ul class="list">
                    <li>SQLite pre-wired for quick local use.</li>
                    <li>Simple <code>DemoItem</code> model with scopes and seeder.</li>
                    <li>Neat, minimal dark UI — no build step required.</li>
                </ul>
            </div>
            <div class="card">
                <div class="chip"><b>Tips</b> · dev flow</div>
                <ul class="list">
                    <li>Use <code>tinker</code> to play: <code>php artisan tinker</code>.</li>
                    <li>Log locally with <code>storage/logs/laravel.log</code>.</li>
                    <li>Keep PHP at 8.2+ for this app.</li>
                </ul>
            </div>
        </div>

        @if ($has)
            <div class="items">
                <div class="chip"><b>Top demo items</b> · from the DB</div>
                @foreach ($items as $it)
                    <div class="item">
                        <h4>{{ $it->name }} <span class="muted">· priority {{ $it->priority }}</span></h4>
                        <div class="muted">Status: {{ $it->status }}</div>
                        @if ($it->description)
                            <div>{{ $it->description }}</div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="note">
                <h3>No demo items yet</h3>
                <div class="muted">Seed some with <code>php artisan db:seed --class=DemoItemSeeder</code> to see them here.</div>
            </div>
        @endif

        <footer>© {{ $now }} · Laravel Demo</footer>
    </div>
</body>
</html>

