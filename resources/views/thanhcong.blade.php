<h1>Đăng nhập thành công</h1>
@if(isset($user))
    {{"Tên : ".$user->name}}
    <br>
    {{"Email : ".$user->email}}
@endif