@extends("layouts.master")

{{-- tên yield được khai báo ở master --}}
{{-- Bất cứ đoạn mã được đặt trong section được hiển thị bên master --}}
{{-- theo vị trí yield --}}
@section("noidung")
    <h2>
        Laravel
    </h2>
    {{-- In ra biến được truyền từ controller --}}
    {{$khoahoc}}
    {{-- In ra biến được truyền từ controller --}}
    {{-- Có hiệu lực cho các đoạn mã html --}}
    {!! $khoahoc !!}
    <div>
        @if($khoahoc != "")
            {{$khoahoc}}
        @else
            {{"Không có khóa hoc"}}
        @endif
    </div>
    <div>
        @for($i = 0; $i <10; $i++)
            {{$i}}
        @endfor
    </div>
    <div>
        {{$khoahoc1 or "Không biến có khóa học"}}
    </div>
    <div>
        <?php
        $arr = array("")
        ?>
    </div>
@endsection