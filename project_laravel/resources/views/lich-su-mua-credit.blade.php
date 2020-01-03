@extends('layout')
@section('main-content')
<h2>Lịch sử mua credit </h2>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table id="linh-vuc-datatable" class="table dt-responsive nowrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>Credit</th>
							<th>Số tiền</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($lichSuMuaCredit as $nguoiChoi)
						<tr>
							<td>{{$nguoiChoi->id}}</td>
							<td>
								{{ isset(App\GoiCredit::find($nguoiChoi->goi_credit_id)->credit) ? App\GoiCredit::find($nguoiChoi->goi_credit_id)->credit : 'Gói credit đã bị xóa' }}
							</td>
							<td>{{$nguoiChoi->so_tien}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>
@endsection

