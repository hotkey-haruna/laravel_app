        <a href="/" class="button">Home</a>
@if(0)
        <a href="#" class="button" >個人情報設定</a>
        <a class="buttonoff" tabindex="-1">個人情報設定</a>

        <a href="#" class="button" >一覧(on)</a>
        <a class="buttonoff" tabindex="-1">一覧(off)</a>
@endif
@if(Request::routeIs('user_list') || Request::routeIs('user'))
        <a href="/user_list/0" class="button">利用者一覧</a>
@else
        <a href="/user_list/0" class="buttonoff" tabindex="-1">利用者一覧</a>
@endif
@if(0)
        <a href="#" class="button">PJ所属一覧(on)</a>
        <a class="buttonoff" tabindex="-1">PJ所属一覧(off)</a>
        
        <a href="#" class="button">履歴(on)</a>
        <a class="buttonoff" tabindex="-1">履歴(off)</a>
@endif
