@extends('layout')
@section('main-content')
<h1>Thùng rác lượt chơi</h1>
	<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
               	
                <table id="linh-vuc-datatable" class="table dt-responsive nowrap">
                   <thead>
                        <tr>
                            <th>ID</th>
                            <th>Người chơi</th>
                            <th>Số câu</th>
                            <th>Điểm</th>                    
                            <th>Ngày giờ</th>
                            <th></th>
                        </tr>
                    </thead>
                
                
                    <tbody>
                        @foreach($luotChoiRac as $luotChoi)
                        <tr>
                            <td>{{ $luotChoi->id }}</td>
                            <td>{{ App\NguoiChoi::find($luotChoi->nguoi_choi_id)->ten_dang_nhap }}</td>
                            <td>{{ $luotChoi->so_cau }}</td>
                            <td>{{ $luotChoi->diem }}</td>
                            <td>{{ $luotChoi->ngay_gio }}</td>
                            <td>
                            	<a href="{{ route('luot-choi.khoi-phuc', ['id' => $luotChoi->id]) }}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-restore"></i></a>
                            	<a href="{{ route('luot-choi.xoa-csdl', ['id' => $luotChoi->id]) }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>
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