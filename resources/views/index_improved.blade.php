<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>{{ $title ?? 'ページタイトル' }}</title>

  <!-- Google Font (optional) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

  <style>
    :root{
      --bg: #f7fafc;
      --card: #ffffff;
      --muted: #6b7280;
      --accent: #2563eb;
      --accent-2: #7c3aed;
      --radius: 12px;
      --max-width: 1100px;
    }
    @media (prefers-color-scheme: dark) {
      :root{
        --bg: #0b1220;
        --card: #081025;
        --muted: #94a3b8;
        --accent: #4f46e5;
        --accent-2: #06b6d4;
      }
      body { color: #e6eef8; }
    }

    * { box-sizing: border-box; }
    html,body{height:100%}
    body{
      margin:0;
      font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      line-height:1.6;
      background: linear-gradient(180deg, var(--bg), #ffffff00);
      color: #0f172a;
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
      padding:24px;
      display:flex;
      justify-content:center;
      align-items:flex-start;
    }

    .container{
      width:100%;
      max-width:var(--max-width);
      margin:0 auto;
    }

    header{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:20px;
      padding:18px 22px;
      border-radius: calc(var(--radius) - 4px);
      background: linear-gradient(90deg, rgba(255,255,255,0.6), rgba(255,255,255,0.45));
      box-shadow: 0 6px 18px rgba(2,6,23,0.06);
      backdrop-filter: blur(6px);
    }

    .brand { display:flex; align-items:center; gap:14px; }
    .logo{
      width:56px;height:56px;border-radius:10px;
      display:flex;align-items:center;justify-content:center;
      color:white;font-weight:700;font-size:1.1rem;
      background: linear-gradient(135deg,var(--accent),var(--accent-2));
      box-shadow: 0 6px 18px rgba(43, 108, 255, 0.18);
    }
    h1{font-size:1.125rem;margin:0}
    .sub{font-size:0.9rem;color:var(--muted)}

    nav a{color:var(--muted);text-decoration:none;margin-left:14px;font-weight:500}
    nav a:hover{color:var(--accent)}

    main{margin-top:18px;display:grid;grid-template-columns:1fr 320px;gap:24px;align-items:start}
    @media(max-width:980px){
      main{grid-template-columns:1fr}
      header{flex-direction:column;align-items:flex-start}
    }

    .card{
      background:var(--card);
      padding:20px;
      border-radius:var(--radius);
      box-shadow:0 8px 30px rgba(2,6,23,0.06);
      border:1px solid rgba(15,23,42,0.04);
    }

    .hero{
      display:flex;gap:18px;align-items:center;
    }
    .hero-text h2{margin:0;font-size:1.4rem}
    .hero-text p{margin:10px 0 0;color:var(--muted)}

    .grid{
      display:grid;
      grid-template-columns:repeat(auto-fill,minmax(220px,1fr));
      gap:14px;
      margin-top:16px;
    }

    .item{
      padding:14px;border-radius:10px;border:1px solid rgba(0,0,0,0.04);
      background: linear-gradient(180deg, rgba(255,255,255,1), rgba(250,252,255,1));
      transition:transform .18s ease, box-shadow .18s ease;
      cursor:default;
    }
    .item:hover{ transform: translateY(-6px); box-shadow:0 12px 30px rgba(2,6,23,0.06) }

    aside .card{position:sticky; top:24px}

    .btn{
      display:inline-block;padding:10px 14px;border-radius:10px;border:0;
      background: linear-gradient(90deg,var(--accent),var(--accent-2));
      color:white;font-weight:600;text-decoration:none;
      box-shadow:0 8px 24px rgba(43,108,255,0.14);
    }
    .muted{color:var(--muted)}
    footer{margin-top:30px;text-align:center;color:var(--muted);font-size:0.9rem;padding:8px}

    /* small helpers */
    .stack{display:flex;flex-direction:column;gap:8px}
    .row{display:flex;gap:10px;align-items:center}
  </style>
</head>
<body>
  <div class="container">
    <header>
      <div class="brand">
        <div class="logo">LP</div>
        <div>
          <h1>{{ $siteTitle ?? 'サイトタイトル' }}</h1>
          <div class="sub">{{ $siteSubtitle ?? 'サブタイトルやキャッチコピーが入ります' }}</div>
        </div>
      </div>

      <nav aria-label="Main navigation">
        <a href="#">ホーム</a>
        <a href="#">機能</a>
        <a href="#">ドキュメント</a>
        <a href="#contact">お問い合わせ</a>
      </nav>
    </header>

    <main>
      <section class="card">
        <div class="hero">
          <div class="hero-text" style="flex:1">
            <h2>{{ $heroTitle ?? '表題をここに' }}</h2>
            <p class="muted">{{ $heroLead ?? '導入文をここに。短くインパクトのあるリードで訪問者を引きつけます。' }}</p>

            <div style="margin-top:14px" class="row">
              <a class="btn" href="#">{{ $ctaText ?? 'はじめる' }}</a>
              <a style="padding:10px 12px;border-radius:10px;border:1px solid rgba(2,6,23,0.06);text-decoration:none;color:var(--muted)" href="#">{{ $secondary ?? '詳細' }}</a>
            </div>
          </div>

          <div style="width:220px">
            <img alt="イメージ" src="{{ $heroImage ?? 'https://via.placeholder.com/420x260?text=Image' }}" style="width:100%;border-radius:10px;display:block" />
          </div>
        </div>

        <div class="grid">
          <div class="item"><strong>高速</strong><div class="muted" style="margin-top:8px">軽快で扱いやすい設計。</div></div>
          <div class="item"><strong>直感的</strong><div class="muted" style="margin-top:8px">迷わない UI を提供します。</div></div>
          <div class="item"><strong>安全</strong><div class="muted" style="margin-top:8px">運用に配慮した設計。</div></div>
          <div class="item"><strong>拡張性</strong><div class="muted" style="margin-top:8px">将来的な拡張も容易に。</div></div>
        </div>
      </section>

      <aside class="card" aria-labelledby="aside-title">
        <h3 id="aside-title" style="margin-top:0;margin-bottom:8px">サイド情報</h3>
        <div class="muted" style="font-size:0.95rem">ここに連絡先や最新のお知らせ、ログインボタンなどの補助情報を置けます。</div>

        <div style="margin-top:14px" class="stack">
          <a class="btn" href="#login">ログイン</a>
          <a style="padding:10px;border-radius:10px;border:1px solid rgba(0,0,0,0.06);text-decoration:none;color:var(--muted)" href="#help">ヘルプ</a>
        </div>

        <div style="margin-top:18px;border-top:1px dashed rgba(0,0,0,0.05);padding-top:12px" class="muted">
          <strong>連絡先</strong>
          <div style="margin-top:6px">info@example.com</div>
        </div>
      </aside>
    </main>

    <footer>
      &copy; {{ date('Y') }} {{ $siteTitle ?? 'サイト名' }}. All rights reserved.
    </footer>
  </div>
</body>
</html>
