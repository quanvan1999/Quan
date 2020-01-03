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
<h1>Danh sách lượt chơi</h1>
	<div class="row">
    <div class="col-12">
        <div class="card">
        

            <div class="card-body">
                <table id="linh-vuc-datatable" class="table dt-responsive">
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
                    	@foreach($listLuotChoi as $luotChoi)
                        <tr>
                            <td>{{ $luotChoi->id }}</td>
                            <td>{{ App\NguoiChoi::find($luotChoi->nguoi_choi_id)->ten_dang_nhap }}</td>
                            <td>{{ $luotChoi->so_cau }}</td>
                            <td>{{ $luotChoi->diem }}</td>
                            <td>{{ $luotChoi->ngay_gio }}</td>
                            <td>
                            	<a role="button" href="{{ route('luot-choi.chi-tiet',$luotChoi->id) }}"class="btn btn-info waves-effect waves-light">Chi tiết lượt chơi</a>
                            
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