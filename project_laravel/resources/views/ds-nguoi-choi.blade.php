@extends('layout')
@section('css')
<!-- third party css -->
        <link href="{{asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
@endsection
@section('js')
 <!-- third party js -->
        <script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/buttons.flash.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/buttons.print.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>
        <script src="{{asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
        <!-- third party js ends -->

        <!-- Datatables init -->
        <script src="{{asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection
@section('main-content')
<h1>Danh sách người chơi</h1>
	<div class="row">
    <div class="col-12">
        <div class="card">
        

            <div class="card-body">
               	<p><a href="{{ route('nguoi-choi.them-moi') }}" type="button"  class="btn btn-primary btn-rounded waves-effect waves-light">Thêm mới</a></p>
                <table id="linh-vuc-datatable" class="table dt-responsive ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên đăng nhập</th>
                            <th>Mật khẩu</th>
                            <th>Email</th>                    
                            <th>Hình đại diện</th>
                            <th>Điểm cao nhất</th> 
                            <th>Credit</th> 
                            <th></th>
                        </tr>
                    </thead>
                
                
                    <tbody>
                    	@foreach($listNguoiChoi as $nguoiChoi)
                        <tr>
                            <td>{{ $nguoiChoi->id }}</td>
                            <td>{{ $nguoiChoi->ten_dang_nhap }}</td>
                            <td>{{ $nguoiChoi->mat_khau }}</td>
                            <td>{{ $nguoiChoi->email }}</td>
                            <td>{{ $nguoiChoi->hinh_dai_dien }}</td>
                            <td>{{ $nguoiChoi->diem_cao_nhat }}</td>
                            <td>{{ $nguoiChoi->credit }}</td>
                            <td>
                            	<a role="button" href="{{ route('nguoi-choi.lich-su',$nguoiChoi->id) }}"class="btn btn-info waves-effect waves-light">Lịch sử</a>
                            	<a href="{{ route('nguoi-choi.xoa', ['id' => $nguoiChoi->id]) }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>

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