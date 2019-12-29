@extends('layout')

@section('main-content')
<div class="row">
                    <div class="col-lg-12">
                        @if($errors->any())

                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                    </button>
                                <ul>
                                    @foreach($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                </div>
                                @endif      
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3 header-title">Thêm mới quản trị viên</h4>

                        
                                <form action="{{ route('quan-tri-vien.xl-them-moi') }}" method="POST" enctype="multipart/form-data">        
                                    @csrf
                                    <div class="form-group">
                                        <label for="ten_dang_nhap">Tên đăng nhập</label>
                                        <input type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap">
                                    </div>
                                    <div class="form-group">
                                        <label for="mat_khau">Mật khẩu</label>
                                        <input type="password"  class="form-control" id="mat_khau" name="mat_khau">
                                    </div>
                                    <div class="form-group">
                                        <label for="mat_khau1">Nhập lại mật khẩu</label>
                                        <input type="password"  class="form-control" id="mat_khau1" name="mat_khau1">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email">
                                    </div>

                                    <div class="form-group">
                                        <label for="ho_ten">Họ tên</label>
                                        <input type="text" class="form-control" id="ho_ten" name="ho_ten">
                                    </div>
                                    <div class="form-group">
                                        <label for="anh_dai_dien">Ảnh đại diện</label>
                                        <input type="file" class="form-control" id="anh_dai_dien" name="anh_dai_dien">
                                    </div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Thêm</button>
                                </form>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>
                    <!-- end col -->

                </div>
@endsection