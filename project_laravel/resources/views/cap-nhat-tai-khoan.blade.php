@extends('layout')
@section('main-content')
<h1>Tài khoản</h1>
                    <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="header-title mb-3">Trang quản trị viên</h4>
                                <a href="{{ route('quan-tri-vien.danh-sach') }}">Danh sách quản trị viên</a><br/>
                                <a href="{{ route('quan-tri-vien.tai-khoan') }}">Tài khoản cá nhân</a>
                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> 

@endsection