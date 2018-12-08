<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    {{-- asset("{path}") : trỏ đến public --}}
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
</head>
<body>
{{-- Hiển thị nội dung của header --}}
@include("layouts.header")
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <div id="content">
                <h1>
                    Khóa học
                </h1>
                {{--Hiển thị nội dung các page kế thừa--}}
                @yield("noidung")
            </div>
        </div>
    </div>
</div>
@include("layouts.footer")
</body>
</html>
