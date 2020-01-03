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
                                @if (session('success'))
                                <div class="alert alert-info">{{session('success')}}</div>
                                @endif
                                <h4 class="mb-3 header-title">Thêm mới người chơi </h4>
                                <form action="{{ route('nguoi-choi.xl-them-moi') }}" method="POST" enctype="multipart/form-data">      
                                    @csrf
                                    <div class="form-group">
                                        <label for="ten_dang_nhap">Tên đăng nhập</label>
                                        <input type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap"  @if(isset($nguoiChoi)) value="{{ $nguoiChoi->ten_dang_nhap}}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="mat_khau">Mật khẩu</label>
                                        <input type="text"  class="form-control" id="mat_khau" name="mat_khau"  @if(isset($nguoiChoi)) value="{{ $nguoiChoi->mat_khau}}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"  @if(isset($nguoiChoi)) value="{{ $nguoiChoi->email}}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="hinh_dai_dien">Hình đại diện</label>
                                        <input type="file" class="form-control" id="hinh_dai_dien" name="hinh_dai_dien">
                                    </div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Thêm</button>                                
                                    </form>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>
                    <!-- end col -->

                </div>
@endsection