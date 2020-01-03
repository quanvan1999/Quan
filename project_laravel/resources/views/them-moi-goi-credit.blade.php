@extends('layout')

@section('main-content')
<div class="row">
                    <div class="col-lg-12">
                          @if($errors->any())

                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                    </button>
                                <ul>
                                    @foreach($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                </div>
                                @endif   
                        <div class="card">
                            <div class="card-body">
                                @if (session('success'))
                                <div class="alert alert-info">{{session('success')}}</div>
                                @endif
                                <h4 class="mb-3 header-title">@if(isset($goiCredit)) Cập nhật @else Thêm @endif mới gói credit</h4>

                                @if(isset($goiCredit))
                                <form action="{{ route('goi-credit.xl-cap-nhat', ['id' => $goiCredit->id]) }}" method="POST">
                                @else
                                <form action="{{ route('goi-credit.xl-them-moi') }}" method="POST">@endif             
                                    @csrf
                                    <div class="form-group">
                                        <label for="ten_goi">Tên gói</label>
                                        <input type="text" class="form-control" id="ten_goi" name="ten_goi"  @if(isset($goiCredit)) value="{{ $goiCredit->ten_goi}}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="credit">Credit</label>
                                        <input type="text" class="form-control" id="credit" name="credit"  @if(isset($goiCredit)) value="{{ $goiCredit->credit}}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="so_tien">Số tiền</label>
                                        <input type="text" class="form-control" id="so_tien" name="so_tien"  @if(isset($goiCredit)) value="{{ $goiCredit->so_tien}}" @endif>
                                    </div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($goiCredit)) Cập nhật @else Thêm @endif</button>
                                </form>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>
                    <!-- end col -->

                </div>
@endsection