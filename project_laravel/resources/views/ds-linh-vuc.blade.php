@extends('layout')
@section('main-content')
<h1>Danh sách lĩnh vực</h1>
	<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
               	<p><a href="{{ route('linh-vuc.them-moi') }}" type="button"  class="btn btn-primary btn-rounded waves-effect waves-light">Thêm mới</a></p>
                <table id="linh-vuc-datatable" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên lĩnh vực</th>
                            <th></th>
                        </tr>
                    </thead>
                
                
                    <tbody>
                    	@foreach($listLinhVuc as $linhVuc)
                        <tr>
                            <td>{{ $linhVuc->id }}</td>
                            <td>{{ $linhVuc->ten_linh_vuc }}</td>
                            <td>
                            
                            	<a href="{{ route('linh-vuc.cap-nhat', ['id' => $linhVuc->id]) }}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-pencil"></i></a>

                                <a href="{{route('linh-vuc.xoa', ['id'=> $linhVuc->id]) }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>
                         
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