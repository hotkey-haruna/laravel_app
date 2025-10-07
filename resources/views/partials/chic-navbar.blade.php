

<nav id="chic-navbar" class="chic-nav" aria-label="Primary">
  <div class="chic-container">
    <div class="chic-left">
@if (0)
      <a href="{{ route('home') }}" class="chic-logo">
        <div class="logo-mark">JP</div>
        <div class="logo-text">
          <div class="brand">YourBrand</div>
          <div class="tag">Design · Web · Laravel</div>
        </div>
      </a>
@endif
          <span class="username">{{ Auth::user()->name ?? 'guest' }}</span>

      <div class="chic-links" id="chic-desktop-links">
        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
        <a href="{{ route('file_list',['page' => 0]) }}" class="nav-link {{ request()->routeIs('file_list') ? 'active' : '' }}">ファイル一覧</a>
        <a href="{{ route('user_list',['page' => 0]) }}" class="nav-link {{ request()->routeIs('user_list') ? 'active' : '' }}">利用者一覧</a>
@if (0)
        <a href="{{ route('project_list',['page' => 0]) }}" class="nav-link {{ request()->routeIs('project_list') ? 'active' : '' }}">プロジェクト一覧</a>
        <a href="{{ route('history_list',['page' => 0]) }}" class="nav-link {{ request()->routeIs('history_list') ? 'active' : '' }}">履歴</a>
@endif
      </div>
    </div>

    <div class="chic-right">
@if (0)
      <form action="{{ route('home') }}" method="GET" class="search-form" role="search">
        <input name="q" type="search" placeholder="Search..." value="{{ request('q') }}" class="search-input" />
        <button type="submit" class="search-btn" aria-label="Search">🔍</button>
      </form>
@endif
      <button id="mobile-toggle" class="mobile-toggle" aria-expanded="false" aria-controls="mobile-menu">☰</button>

      @auth
      <div class="profile-wrap" data-profile>
        <button class="profile-btn" aria-haspopup="true" aria-expanded="false">
@if (0)
          <img src="{{ Auth::user()->avatar ?? '/images/default-avatar.png' }}" alt="avatar" class="avatar" />
@endif
          <span class="username">{{ Auth::user()->name }}</span>
@if (0)
          <span class="caret">▾</span>
@endif
        </button>

        <div class="profile-menu" data-profile-menu hidden>
          <a href="{{ route('dashboard') }}" class="profile-item">Dashboard</a>
          <a href="{{ route('profile') }}" class="profile-item">Profile</a>
          <form method="POST" action="{{ route('logout') }}" class="profile-item">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
          </form>
        </div>
      </div>
      @else
      <div class="auth-links">
        <a href="{{ route('home') }}" class="link">Login</a>
        <a href="{{ route('home') }}" class="cta">Sign up</a>
      </div>
      @endauth
    </div>
  </div>

  <!-- Mobile menu -->
  <div id="mobile-menu" class="mobile-menu" hidden>
    <a href="{{ route('home') }}" class="mobile-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
    <a href="{{ route('home') }}" class="mobile-link {{ request()->routeIs('works') ? 'active' : '' }}">Works</a>
    <a href="{{ route('home') }}" class="mobile-link {{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
    <a href="{{ route('home') }}" class="mobile-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
    <a href="{{ route('home') }}" class="mobile-link {{ request()->routeIs('blog*') ? 'active' : '' }}">Blog</a>
    <form action="{{ route('home') }}" method="GET" class="mobile-search">
      <input name="q" type="search" placeholder="Search..." value="{{ request('q') }}" class="mobile-search-input" />
      <button type="submit" class="mobile-search-btn">🔍</button>
    </form>
  </div>
</nav>
<style>
/* --- ベース --- */
.chic-nav{background:#0f1724;color:#e6eef8;border-bottom:1px solid rgba(255,255,255,0.03);font-family:Inter, ui-sans-serif, system-ui, -apple-system, "Hiragino Kaku Gothic ProN", "Noto Sans JP", "Meiryo", sans-serif}
.chic-container{max-width:1200px;margin:0 auto;padding:12px 20px;display:flex;align-items:center;justify-content:space-between;gap:16px}
.chic-left{display:flex;align-items:center;gap:18px}
.chic-logo{display:flex;align-items:center;gap:12px;text-decoration:none;color:inherit}
.logo-mark{width:44px;height:44px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;background:linear-gradient(135deg,#4f46e5,#ec4899);color:white;box-shadow:0 6px 18px rgba(79,70,229,0.18)}
.logo-text .brand{font-weight:600;font-size:16px}
.logo-text .tag{font-size:12px;color:rgba(230,238,248,0.6);margin-top:2px}

/* --- デスクトップリンク --- */
.chic-links{display:flex;gap:8px}
.nav-link{padding:8px 12px;border-radius:8px;text-decoration:none;color:rgba(230,238,248,0.75);font-size:14px}
.nav-link:hover{color:#ffffff;background:rgba(255,255,255,0.03)}
.nav-link.active{color:#a78bfa;background:linear-gradient(90deg,rgba(167,139,250,0.06),transparent);box-shadow:inset 0 -2px 0 rgba(167,139,250,0.12)}

/* --- 右側 --- */
.chic-right{display:flex;align-items:center;gap:12px}
.search-form{display:flex;align-items:center;background:rgba(255,255,255,0.02);padding:6px;border-radius:999px;border:1px solid rgba(255,255,255,0.03)}
.search-input{background:transparent;border:none;color:inherit;outline:none;padding:6px 8px;width:180px}
.search-btn{background:transparent;border:none;color:rgba(230,238,248,0.7);cursor:pointer}

.mobile-toggle{display:none;background:transparent;border:1px solid rgba(255,255,255,0.03);padding:6px 10px;border-radius:8px;color:inherit;cursor:pointer}

.profile-wrap{position:relative}
.profile-btn{display:flex;align-items:center;gap:8px;background:transparent;border:none;color:inherit;cursor:pointer;padding:6px;border-radius:999px}
.avatar{width:36px;height:36px;border-radius:50%;object-fit:cover;border:1px solid rgba(255,255,255,0.04)}
.username{display:none;font-size:14px;color:rgba(230,238,248,0.9)}
.caret{color:rgba(230,238,248,0.65)}
.profile-menu{position:absolute;right:0;top:calc(100% + 10px);background:#0b1220;border:1px solid rgba(255,255,255,0.03);padding:8px;border-radius:8px;min-width:160px;box-shadow:0 12px 30px rgba(2,6,23,0.6);z-index:60}
.profile-item{display:block;padding:8px 10px;color:rgba(230,238,248,0.9);text-decoration:none;border-radius:6px}
.profile-item:hover{background:rgba(255,255,255,0.02)}
.logout-btn{background:transparent;border:none;color:#fb7185;cursor:pointer;padding:0}

.auth-links{display:flex;gap:8px;align-items:center}
.auth-links .link{color:rgba(230,238,248,0.8);text-decoration:none}
.auth-links .cta{background:#7c3aed;color:white;padding:6px 12px;border-radius:999px;text-decoration:none}

/* --- モバイルメニュー --- */
.mobile-menu{display:none;padding:12px 16px;border-top:1px solid rgba(255,255,255,0.02);background:linear-gradient(180deg,rgba(5,8,15,0.6),transparent)}
.mobile-link{display:block;padding:10px;border-radius:8px;color:rgba(230,238,248,0.9);text-decoration:none;margin-bottom:6px}
.mobile-link.active{color:#a78bfa}
.mobile-search{display:flex;gap:8px;margin-top:6px}
.mobile-search-input{flex:1;padding:8px;border-radius:8px;border:1px solid rgba(255,255,255,0.04);background:transparent;color:inherit}
.mobile-search-btn{padding:8px;border-radius:8px;border:none;background:#111827;color:white}

/* --- レスポンシブ --- */
@media (max-width:900px){
  .logo-text .brand{display:none}
  .logo-text .tag{display:none}
  .chic-links{display:none}
  .search-input{display:none}
  .mobile-toggle{display:inline-flex}
  .username{display:none}
}
@media (min-width:901px){
  .mobile-menu{display:none !important}
  .mobile-toggle{display:none}
  .username{display:inline-block}
}

/* small touch-ups */
*{box-sizing:border-box}
</style>

<script>
(function(){
  // モバイルメニューのトグル
  var mobileToggle = document.getElementById('mobile-toggle');
  var mobileMenu = document.getElementById('mobile-menu');
  if(mobileToggle && mobileMenu){
    mobileToggle.addEventListener('click', function(e){
      var isOpen = mobileMenu.hasAttribute('hidden') === false;
      if(isOpen){
        mobileMenu.setAttribute('hidden', '');
        mobileToggle.setAttribute('aria-expanded', 'false');
      } else {
        mobileMenu.removeAttribute('hidden');
        mobileToggle.setAttribute('aria-expanded', 'true');
      }
    });
  }

  // プロフィールドロップダウン（デスクトップ）
  var profileWrap = document.querySelector('[data-profile]');
  if(profileWrap){
    var btn = profileWrap.querySelector('.profile-btn');
    var menu = profileWrap.querySelector('[data-profile-menu]');
    var closeMenu = function(){ if(menu) menu.setAttribute('hidden',''); btn.setAttribute('aria-expanded','false'); };
    var openMenu = function(){ if(menu) menu.removeAttribute('hidden'); btn.setAttribute('aria-expanded','true'); };

    btn.addEventListener('click', function(e){
      var isHidden = menu.hasAttribute('hidden');
      if(isHidden) openMenu(); else closeMenu();
    });

    // クリック外で閉じる
    document.addEventListener('click', function(e){
      if(!profileWrap.contains(e.target)) closeMenu();
    });

    // ESCで閉じる
    document.addEventListener('keydown', function(e){ if(e.key === 'Escape') closeMenu(); });
  }

  // アクセシビリティ: mobile menu 内のリンクが押されたら閉じる
  if(mobileMenu){
    mobileMenu.addEventListener('click', function(e){
      var t = e.target; if(t.tagName === 'A' || t.tagName === 'BUTTON' || t.tagName === 'INPUT'){
        mobileMenu.setAttribute('hidden',''); mobileToggle.setAttribute('aria-expanded','false');
      }
    });
  }
})();
</script>

<!--
  注意点:
  - すべてインラインの CSS / JS のみで動作します（外部ライブラリ不要）。
  - ルーティング名（home, works, services, about, blog, search, dashboard, profile, login, register, logout）はプロジェクトに合わせて変更してください。
  - 必要に応じてカラーや間隔、フォントなどを調整してください。
  - アクセシビリティのため aria-* を一部追加していますが、さらにキーボードナビゲーションを強化することを推奨します。
-->
