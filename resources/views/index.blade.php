@extends('layouts.app')

@section('content')
<section class="forms-chic">
  <div class="forms-chic__container">
    <form class="forms-chic__grid" action="{{ route('file.update') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <!-- ファイル -->
      <div class="field-row">
        <span class="label">ファイル</span>
        <div class="file-wrap">
          <!-- 実際の input は非表示（hidden）にしてカスタムボタンで開く -->
          <input type="file" name="image" class="file-input" hidden />
          <button type="button" class="btn file-trigger">ファイルを選択</button>
          <div class="file-preview">ファイルが選択されていません</div>
        </div>
      </div>

      <!-- テキスト入力 -->
      <div class="field-row">
        <span class="label">ファイル名</span>
        <div class="field">
          <input type="text" name="fname" class="input" placeholder="ここにテキストを入力" />
          <small class="hint">ファイルの名称（省略可）</small>
        </div>
      </div>

      <!-- セレクト -->
      <div class="field-row">
        <span class="label">公開期間</span>
        <div class="select-wrap">
          <select name="limit" class="select">
            <!--option value="">選択してください</option-->
            <option value="1" selected>1時間</option>
            <option value="2">1日</option>
            <option value="3">3日</option>
            <option value="4">1ヵ月</option>
          </select>
          <svg class="select-icon" viewBox="0 0 20 20" fill="none" aria-hidden>
            <path d="M6 8l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
      </div>

      <!-- ボタン群 -->
      <div class="field-row">
        <span class="label"></span>
        <div class="controls actions">
          <button type="submit" class="btn btn-primary">決定</button>
        </div>
      </div>

      <!-- 表 -->
      <div class="forms-chic__table">
        <h3>メール送信先一覧</h3>
        <table class="chic-table">
          <thead>
            <tr>
              <th></th>
              <th>名前</th>
              <th>email</th>
            </tr>
          </thead>
          <tbody>
@foreach ($users as $user) 
            <tr>
              <td>
                <label class="checkbox">
                  <input type="checkbox" name="send[]" value="{{ $user["id"]; }}" />
                </label>
              </td>
              <td>{{ $user["name"]; }}</td>
              <td>{{ $user["email"]; }}</td>
            </tr>
@endforeach
          </tbody>
        </table>
      </div>
    </form>
  </div>
</section>
@endsection