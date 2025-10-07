@extends('layouts.app')

@section('content')
<section class="forms-chic">
  <div class="forms-chic__container">
    <form class="forms-chic__grid" action="{{ route('user.add') }}" method="POST">
      @csrf

      <input type="hidden" name="id" value="{{$user['id'];}}"/>

      <!-- テキスト入力 -->
      <div class="field-row">
        <span class="label">名前</span>
        <div class="field">
          <input type="text" name="user_name" class="input" placeholder="ここにテキストを入力" value="{{$user['name'];}}" autocomplete="new-password"/>
        </div>
      </div>

      <!-- テキスト入力 -->
      <div class="field-row">
        <span class="label">email</span>
        <div class="field">
          <input type="text" name="user_email" class="input" placeholder="ここにテキストを入力" value="{{$user['email'];}}"/>
        </div>
      </div>

      <!-- テキスト入力 -->
      <div class="field-row">
        <span class="label">password</span>
        <div class="field">
          <input type="password" name="user_password" class="input" placeholder="ここにテキストを入力" value="{{$user['password'];}}" autocomplete="new-password"/>
        </div>
      </div>

      <!-- テキスト入力 -->
      <div class="field-row">
        <span class="label">備考</span>
        <div class="field">
          <input type="text" name="user_note" class="input" placeholder="ここにテキストを入力" value="{{$user['note'];}}"/>
        </div>
      </div>

      <!-- セレクト -->
      <div class="field-row">
        <span class="label">権限</span>
        <div class="select-wrap">
          <select name="user_auth" class="select">
            <!--option value="">選択してください</option-->
            <option value="1" @if ($user['auth'] == 1) echo "selected"; @endif>管理者</option>
            <option value="2" @if ($user['auth'] == 2) echo "selected"; @endif>担当者</option>
            <option value="3" @if ($user['auth'] == 3) echo "selected"; @endif>利用者</option>
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
          <button type="button" class="btn btn-primary" onclick='history.back()'>戻る</button>
        </div>
      </div>
    </form>
  </div>
</section>
@endsection
