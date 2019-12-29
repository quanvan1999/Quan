@extends('layout')
@section('main-content')
<h1>Danh sách quản trị viên</h1>
	<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
               	<p><a href="{{ route('quan-tri-vien.them-moi') }}" type="button"  class="btn btn-primary btn-rounded waves-effect waves-light">Thêm mới</a></p>
                <p><a href="{{ route('quan-tri-vien.thung-rac') }}" type="button"  class="btn btn-primary btn-rounded waves-effect waves-light">Thùng rác</a></p>
                <table id="linh-vuc-datatable" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên đăng nhập</th>
                            <th>Mật khẩu</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Ảnh đại diện</th>
                            <th></th>
                        </tr>
                    </thead>
                
                
                    <tbody>
                    	@foreach($listQTV as $qTV)
                        <tr>
                            <td>{{ $qTV->id }}</td>
                            <td>{{ $qTV->ten_dang_nhap }}</td>
                            <td>{{ $qTV->mat_khau }}</td>
                            <td>{{ $qTV->ho_ten }}</td>
                            <td>{{ $qTV->email }}</td>
                            <td>{{ $qTV->anh_dai_dien }}</td>


                            <td>
                            
                            	

                                <a href="{{route('quan-tri-vien.xoa', ['id'=> $qTV->id]) }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>
                         
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>    

@endsection