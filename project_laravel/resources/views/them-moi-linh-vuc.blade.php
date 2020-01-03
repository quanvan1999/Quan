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
                                <h4 class="mb-3 header-title">@if(isset($linhVuc)) Cập nhật @else Thêm @endif mới lĩnh vực</h4>
                                
                                @if(isset($linhVuc))
                                <form action="{{ route('linh-vuc.xl-cap-nhat', ['id' => $linhVuc->id]) }}" method="POST">
                                @else
                                <form action="{{ route('linh-vuc.xl-them-moi') }}" method="POST">@endif                                
                                    @csrf
                                    <div class="form-group">
                                        <label for="ten_linh_vuc">Tên lĩnh vực</label>
                                        <input type="text" class="form-control" id="ten_linh_vuc" name="ten_linh_vuc" @if(isset($linhVuc)) value="{{ $linhVuc->ten_linh_vuc }}"
                                          @endif>
                                    </div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($linhVuc)) Cập nhật @else Thêm @endif</button>
                                </form>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>
                    <!-- end col -->

                </div>
@endsection