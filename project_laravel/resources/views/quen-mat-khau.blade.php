<!DOCTYPE html>
<html>
<head>
        <title></title>
</head>
<body>
<h1>Quên mật khẩu</h1>
 <form action="{{ route('xl-quen-mk') }}" method="POST">
        {{ csrf_field() }}
        @if(session('error'))
        <div>
        {{ session('error') }}
        </div>
        @endif

        @if(session('success'))
        <div>
        {{ session('success') }}
</div>
        @endif

        Nhập Emai: <input type="email" name="email" id="email">
        <button type="submit">Gửi</button>
</form>
</body>
</html>

