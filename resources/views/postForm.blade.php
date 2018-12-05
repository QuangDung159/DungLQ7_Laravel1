{{--// Gọi route--}}
{{--// Khi form được submit -> laravel sẽ redirect về route có tên là "postform"--}}
<form action="{{route("postform")}}" method="POST">
    {{-- Laravel bắt buộc phải có hàm csrf_field() --}}
    {{ csrf_field() }}
    <input type="text" name="hoten">
    <input type="submit" name="submit">
</form>