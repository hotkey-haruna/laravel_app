<!-- forms-chic.blade.php -->
<!--
  シックなフォームコンポーネント（Blade partial）
  - ファイル選択をカスタムボタン + プレビューに統合
  - 複数要素・配置変更に対応する堅牢なバインド
  - セレクトの視認性改善済み
  - 外部CSS/JSに依存しないインライン実装
-->
@if (0)
<section class="forms-chic">
  <div class="forms-chic__container">
    <header class="forms-chic__header">
      <h2>フォームコンポーネント（Chic Theme）</h2>
      <p class="muted">メニューと統一感のある色調・余白で各種要素をデザインしました。</p>
    </header>

    <form class="forms-chic__grid" action="#" method="POST" enctype="multipart/form-data">
      @csrf

      <!-- テキスト入力 -->
      <div class="field-row">
        <span class="label">テキスト</span>
        <div class="field">
          <input type="text" name="text_input" class="input" placeholder="ここにテキストを入力" />
          <small class="hint">短い説明文や補助テキスト</small>
        </div>
      </div>

      <!-- チェックボックス -->
      <div class="field-row">
        <span class="label">チェックボックス</span>
        <div class="controls">
          <label class="checkbox">
            <input type="checkbox" name="chk1" checked />
            <span>項目A</span>
          </label>
          <label class="checkbox">
            <input type="checkbox" name="chk2" />
            <span>項目B</span>
          </label>
        </div>
      </div>

      <!-- セレクト -->
      <div class="field-row">
        <span class="label">セレクト</span>
        <div class="select-wrap">
          <select name="select" class="select">
            <option value="">選択してください</option>
            <option value="1">オプション 1</option>
            <option value="2">オプション 2</option>
            <option value="3">オプション 3</option>
          </select>
          <svg class="select-icon" viewBox="0 0 20 20" fill="none" aria-hidden>
            <path d="M6 8l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
      </div>

      <!-- ファイル（カスタムボタン + プレビュー） -->
      <div class="field-row">
        <span class="label">ファイル</span>
        <div class="file-wrap">
          <!-- 実際の input は非表示（hidden）にしてカスタムボタンで開く -->
          <input type="file" name="file" class="file-input" hidden />
          <button type="button" class="btn file-trigger">ファイルを選択</button>
          <div class="file-preview">ファイルが選択されていません</div>
        </div>
      </div>

      <!-- ボタン群 -->
      <div class="field-row">
        <span class="label">操作</span>
        <div class="controls actions">
          <button type="submit" class="btn btn-primary">決定</button>
          <button type="button" class="btn btn-ghost" onclick="(function(f){ f.reset(); f.querySelectorAll('.file-preview').forEach(p=>p.textContent='ファイルが選択されていません'); })(document.querySelector('.forms-chic__container form'))">キャンセル</button>
        </div>
      </div>
    </form>

    <!-- 表 -->
    <div class="forms-chic__table">
      <h3>サンプル表</h3>
      <table class="chic-table">
        <thead>
          <tr>
            <th>番号</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>ステータス</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>山田 太郎</td>
            <td>taro@example.com</td>
            <td><span class="badge active">有効</span></td>
          </tr>
          <tr>
            <td>2</td>
            <td>佐藤 花子</td>
            <td>hanako@example.com</td>
            <td><span class="badge inactive">停止</span></td>
          </tr>
          <tr>
            <td>3</td>
            <td>鈴木 一郎</td>
            <td>ichiro@example.com</td>
            <td><span class="badge active">有効</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>
@endif
<style>
.forms-chic{font-family:Inter, 'Hiragino Kaku Gothic ProN', 'Noto Sans JP', 'Meiryo', sans-serif;color:#e6eef8}
.forms-chic__container{max-width:980px;margin:20px auto;padding:20px;background:linear-gradient(180deg,#071024 0%, #0b1524 100%);border-radius:12px;border:1px solid rgba(255,255,255,0.03);box-shadow:0 10px 30px rgba(2,6,23,0.6)}
.forms-chic__header h2{margin:0;font-size:18px;color:#fff}
.muted{color:rgba(230,238,248,0.6);font-size:13px;margin-top:6px}
.forms-chic__grid{display:flex;flex-direction:column;gap:14px;margin-top:20px}
.field-row{display:flex;align-items:flex-start;gap:20px;padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.04)}
.label{width:200px;font-weight:600;color:rgba(230,238,248,0.95);margin-top:8px;flex-shrink:0}
.field{flex:1;display:flex;flex-direction:column}
.hint{font-size:12px;color:rgba(230,238,248,0.55);margin-top:6px}
.input{background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.04);padding:10px 12px;border-radius:10px;color:inherit;outline:none;font-size:14px;width:100%}
.input:focus{box-shadow:0 6px 18px rgba(124,58,237,0.12);border-color:rgba(167,139,250,0.6)}
.controls{display:flex;gap:12px;align-items:center}
.checkbox{display:inline-flex;gap:8px;align-items:center;background:transparent;padding:6px 8px;border-radius:8px}
.checkbox input{width:18px;height:18px;appearance:none;-webkit-appearance:none;background:transparent;border:2px solid rgba(255,255,255,0.12);border-radius:4px;display:inline-block;position:relative;cursor:pointer}
.checkbox input:checked{background:linear-gradient(135deg,#7c3aed,#ec4899);border-color:transparent}
.checkbox input:checked::after{content:'';position:absolute;left:4px;top:1px;width:5px;height:9px;border:2px solid white;border-width:0 2px 2px 0;transform:rotate(40deg)}
.checkbox span{font-size:14px;color:rgba(230,238,248,0.9)}
.select-wrap{position:relative;flex:1}
/* select のコントラスト強化 */
.select{appearance:none;-webkit-appearance:none;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.08);padding:10px 12px;border-radius:10px;color:#eaf0ff;font-size:14px;width:100%}
.select:focus{box-shadow:0 6px 18px rgba(79,70,229,0.08);border-color:rgba(167,139,250,0.6)}
.select option{background:#0b1524;color:#eaf0ff}
.select-icon{position:absolute;right:12px;top:50%;transform:translateY(-50%);width:18px;height:18px;color:rgba(230,238,248,0.65);pointer-events:none}
.file-wrap{display:flex;gap:12px;align-items:center;flex:1}
/* 実際の input は hidden にしているので表示なし */
.file-input{display:none}
.file-trigger{border:1px solid rgba(255,255,255,0.08);background:rgba(255,255,255,0.03);padding:10px 16px;border-radius:10px;color:#eaf0ff;font-size:14px;cursor:pointer;transition:background 0.12s ease}
.file-trigger:hover{background:rgba(255,255,255,0.08)}
.file-preview{padding:10px 12px;border-radius:10px;background:rgba(255,255,255,0.02);border:1px dashed rgba(255,255,255,0.04);color:rgba(230,238,248,0.75);font-size:14px;min-height:44px;display:flex;align-items:center;width:100%}
.actions{display:flex;gap:12px}
.btn{padding:10px 14px;border-radius:10px;border:1px solid rgba(255,255,255,0.04);cursor:pointer;font-weight:600}
.btn-primary{background:linear-gradient(90deg,#7c3aed,#ec4899);color:white;border:none}
.btn-primary:hover{filter:brightness(1.03);transform:translateY(-1px)}
.btn-ghost{background:transparent;color:rgba(230,238,248,0.85)}
.forms-chic__table{margin-top:40px}
.forms-chic__table h3{margin-bottom:12px;color:#fff;font-size:16px}
.chic-table{width:100%;border-collapse:collapse;background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.04);border-radius:10px;overflow:hidden}
.chic-table th,.chic-table td{padding:10px 12px;text-align:left;border-bottom:1px solid rgba(255,255,255,0.05)}
.chic-table th{background:rgba(255,255,255,0.05);font-weight:600;color:rgba(230,238,248,0.95)}
.chic-table tr:hover{background:rgba(124,58,237,0.08)}
.badge{padding:3px 8px;border-radius:8px;font-size:12px;font-weight:600}
.badge.active{background:rgba(34,197,94,0.15);color:#4ade80}
.badge.inactive{background:rgba(239,68,68,0.15);color:#f87171}
@media (max-width:820px){.field-row{flex-direction:column;}.label{width:100%;margin-bottom:6px}}
</style>

<script>
(function(){
  // DOM 完全読み込み後に全ての .file-wrap を初期化
  function initFileWraps(root){
    (root || document).querySelectorAll('.file-wrap').forEach(function(wrap){
      // ファイル input と trigger と preview を取得
      var input = wrap.querySelector('.file-input');
      var trigger = wrap.querySelector('.file-trigger');
      var preview = wrap.querySelector('.file-preview');

      if(!input || !preview) return;

      // バインド済みチェック
      if(input.__chic_bound) return; input.__chic_bound = true;

      // トリガーがなければ input を直接表示させる（フォールバック）
      if(!trigger){
        trigger = document.createElement('button');
        trigger.type = 'button';
        trigger.className = 'btn file-trigger';
        trigger.textContent = 'ファイルを選択';
        wrap.insertBefore(trigger, preview);
      }

      // trigger クリックで input を開く
      trigger.addEventListener('click', function(){ input.click(); });

      // input change
      input.addEventListener('change', function(){
        var f = input.files && input.files[0];
        if(!f){ preview.textContent = 'ファイルが選択されていません'; return; }
        var sizeKB = (f.size/1024);
        var sizeText = sizeKB < 1024 ? sizeKB.toFixed(1) + ' KB' : (sizeKB/1024).toFixed(2) + ' MB';
        preview.textContent = f.name + ' (' + sizeText + ')';
      });
    });
  }

  document.addEventListener('DOMContentLoaded', function(){
    initFileWraps();

    // フォームリセット時にプレビューを消す
    document.querySelectorAll('form').forEach(function(form){
      form.addEventListener('reset', function(){
        form.querySelectorAll('.file-preview').forEach(function(p){ p.textContent = 'ファイルが選択されていません'; });
      });
    });
  });

  // 動的に要素を追加した場合に再初期化するために公開
  window.chicInitFileWraps = initFileWraps;
})();
</script>

<!--
  変更点:
  - ファイル選択UIをカスタムボタンに統合し、標準ボタンが二重に見える問題を解消しました。
  - 複数の file-wrap に対して安全に初期化できます。
  - select の視認性強化（色調を明示）。
-->
