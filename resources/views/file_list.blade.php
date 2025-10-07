@extends('layouts.app')

@section('content')
<section class="forms-chic">
  <div class="forms-chic__container">
    <form class="forms-chic__grid" action="" method="POST" enctype="multipart/form-data">
      @csrf

      <!-- 表 -->
      <div class="forms-chic__table">
        <h3>ファイル一覧</h3>
        <table class="chic-table">
          <thead>
            <tr>
              <th>公開期限</th>
              <th>ファイル名</th>
              <th>有効</th>
            </tr>
          </thead>
          <tbody>
@foreach ($files as $file) 
            <tr>
              <td>{{ $file["limit_dt"]; }}</td>
              <td>{{ $file["fname"]; }}</td>
              <td>@if ($file["valid"] == 0) <span class="badge inactive">無効</span> @else <span class="badge active">有効</span> @endif</td>
            </tr>
@endforeach
          </tbody>
        </table>
      </div>
    </form>
  </div>
</section>
@endsection