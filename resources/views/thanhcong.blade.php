@if(\Illuminate\Support\Facades\Auth::check())
    <h1>Đăng nhập thành công</h1>
    @if(isset($user))
        {{"Tên : ".$user->name}}
        <br>
        {{"Email : ".$user->email}}
        <a href="{{url("logout")}}">Logout</a>
    @endif
@else
    <h1>Bạn chưa đăng nhập</h1>
@endif