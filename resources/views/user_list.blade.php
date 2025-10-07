@extends('layouts.app')

@section('content')
<section class="forms-chic">
  <div class="forms-chic__container">
    <form class="forms-chic__grid" action="" method="POST">
      @csrf

      <!-- ボタン群 -->
      <div class="field-row">
        <span class="label"></span>
        <div class="controls actions">
          <button type="submit" formaction="{{ route('user', ['id' => 0]) }}" class="btn btn-primary">新規</button>
        </div>
      </div>

      <!-- 表 -->
      <div class="forms-chic__table">
        <h3>利用者一覧</h3>
        <table class="chic-table">
          <thead>
            <tr>
              <th>名前</th>
              <th>email</th>
              <th>備考</th>
              <th>編集</th>
            </tr>
          </thead>
          <tbody>
@foreach ($users as $user) 
            <tr>
              <td>{{ $user["name"]; }}</td>
              <td>{{ $user["email"]; }}</td>
              <td>{{ $user["note"]; }}</td>
              <td><button type="submit" formaction="{{ route('user', ['id' => $user['id']]) }}" class="btn btn-primary">修正</button></td>
            </tr>
@endforeach
          </tbody>
        </table>
      </div>
    </form>
  </div>
</section>
@endsection
