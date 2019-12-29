@extends('layout')
@section('main-content')
<h1>Thùng rác người chơi</h1>
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <table id="linh-vuc-datatable" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên đăng nhập</th>
                            <th>Mật khẩu</th>
                            <th>Email</th>                    
                            <th>Hình đại diện</th>
                            <th>Hình đại diện</th> 
                            <th>Điểm cao nhất</th> 
                            <th>Credit</th> 
                            <th></th>
                        </tr>
                    </thead>
                
                
                    <tbody>
                        @foreach($nguoiChoiRac as $nguoiChoi)
                        <tr>
                            <td>{{ $nguoiChoi->id }}</td>
                            <td>{{ $nguoiChoi->ten_dang_nhap }}</td>
                            <td>{{ $nguoiChoi->mat_khau }}</td>
                            <td>{{ $nguoiChoi->email }}</td>
                            <td>{{ $nguoiChoi->hinh_dai_dien }}</td>
                            <td>{{ $nguoiChoi->diem_cao_nhat }}</td>
                            <td>{{ $nguoiChoi->credit }}</td>
                            <td>
                                <a href="{{ route('nguoi-choi.khoi-phuc', ['id' => $nguoiChoi->id]) }}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-pencil"></i></a>
                                <a href="{{ route('nguoi-choi.xoa-csdl', ['id' => $nguoiChoi->id]) }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>                  
@endsection>
                           