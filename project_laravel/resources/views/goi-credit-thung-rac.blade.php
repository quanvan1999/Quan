@extends('layout')
@section('main-content')
<h1>Thùng rác gói credit</h1>
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <table id="linh-vuc-datatable" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            < <th>ID</th>
                            <th>Tên gói</th>
                            <th>Credit</th>
                            <th>Số tiền</th>                    
                            <th></th> 
                        </tr>
                    </thead>
                
                
                    <tbody>
                        @foreach($goiCreditRac as $goiCredit)
                        <tr>
                            <td>{{ $goiCredit->id }}</td>
                            <td>{{ $goiCredit->ten_goi }}</td>
                            <td>{{ $goiCredit->credit }}</td>
                            <td>{{ $goiCredit->so_tien }}</td>
                            <td>
                                <a href="{{ route('goi-credit.khoi-phuc', ['id' => $goiCredit->id]) }}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-restore"></i></a>
                                <a href="{{ route('goi-credit.xoa-csdl', ['id' => $goiCredit->id]) }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>
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
                           