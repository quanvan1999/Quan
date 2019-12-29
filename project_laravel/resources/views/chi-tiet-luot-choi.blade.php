@extends('layout')
@section('main-content')
<h2>Chi tiết lượt chơi </h2>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table id="linh-vuc-datatable" class="table dt-responsive nowrap">
					<thead>
						<tr>
							<th>ID lượt chơi</th>
							<th>Câu hỏi</th>
							<th>Phương án</th>
							<th>Điểm</th>
						</tr>
					</thead>
					<tbody>
						@foreach($chiTietLuotChoi as $luotChoi)
						<tr>
							<td>{{$luotChoi->luot_choi_id}}</td>
							<td>
								{{ isset(App\CauHoi::find($luotChoi->cau_hoi_id)->noi_dung) ? App\CauHoi::find($luotChoi->cau_hoi_id)->noi_dung : 'Câu hỏi đã bị xóa' }}
							</td>
							<td>{{$luotChoi->phuong_an}}</td>
							<td>{{$luotChoi->diem}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>
@endsection

