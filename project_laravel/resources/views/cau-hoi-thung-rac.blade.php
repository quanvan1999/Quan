@extends('layout')
@section('main-content')
<h1>Thùng rác câu hỏi</h1>
	<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
               	
                <table id="linh-vuc-datatable" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nội dung</th>
                            <th>Lĩnh vực</th>
                            <th>Phương án a</th>
                            <th>Phương án b</th>
                            <th>Phương án c</th>
                            <th>Phương án d</th>
                            <th>Đáp án</th>
                            <th></th> 
                        </tr>
                    </thead>
                
                
                    <tbody>
                        @foreach($cauHoiRac as $cauHoi)
                        <tr>
                            <td>{{ $cauHoi->id }}</td>
                            <td>{{ $cauHoi->noi_dung }}</td>
                            <td>{{ $cauHoi->linhVuc->ten_linh_vuc }}</td>
                            <td>{{ $cauHoi->phuong_an_a }}</td>
                            <td>{{ $cauHoi->phuong_an_b }}</td>
                            <td>{{ $cauHoi->phuong_an_c }}</td>
                            <td>{{ $cauHoi->phuong_an_d }}</td>
                            <td>{{ $cauHoi->dap_an }}</td>
                            <td>
                                <a href="{{ route('cau-hoi.khoi-phuc', ['id' => $cauHoi->id]) }}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-pencil"></i></a>
                                <a href="{{ route('cau-hoi.xoa-csdl', ['id' => $cauHoi->id]) }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>
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