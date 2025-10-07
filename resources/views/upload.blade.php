@extends('layouts.app')

@section('content')
<section class="forms-chic">
  <div class="forms-chic__container">
    <form class="forms-chic__grid" action="{{ route('user.add') }}" method="POST">
      @csrf

      <div class="field-row">
        <span class="label">URL</span>
        <div class="field">
          {{route('file.download', ['token'=>$token]) }}
        </div>
      </div>

      <div class="field-row">
        <span class="label">公開期間</span>
        <div class="field">
          {{ $limit_dt }}
        </div>
      </div>

    </form>
  </div>
</section>
@endsection
