  @extends('layout')
@section('main-content')
  <div class="wrapper">
            <div class="container-fluid">
               <div class="row">
                    
                    <div class="col-md-6 col-xl-3">
                        <div class="card-box">
                              <div class="text-center" dir="ltr">
                                <h3 class="mb-3"><i class="mdi mdi-arrow-up-bold-circle-outline text-success"></i>Lĩnh vực</h3>
                                <input data-plugin="knob" data-width="150" data-height="150" data-min="0"
                                   data-displayPrevious=true data-max="10000" data-step="1000"
                                   value="{{ $linhVuc_count }}" data-fgColor="#414d5f"/>
                            </div>
                        </div> <!-- end card-box -->
                    </div><!-- end col-->

                    <div class="col-md-6 col-xl-3">
                        <div class="card-box">
                            <div class="text-center" dir="ltr">
                                 <div class="text-center" dir="ltr">
                                 <h3 class="mb-3"><i class="mdi mdi-arrow-up-bold-circle-outline text-success"></i>Câu hỏi</h3>
                                 <input data-plugin="knob" data-width="150" data-height="150" data-min="0"
                                   data-displayPrevious=true data-max="10000" data-step="1000"
                                   value="{{ $cauHoi_count }}" data-fgColor="#23b397"/>
                            </div> 
                            </div> <!-- end .text-center -->
                        </div> <!-- end card-box -->

                    </div><!-- end col-->
                      <div class="col-md-6 col-xl-3">
                        <div class="card-box">
                            <div class="text-center" dir="ltr">
                                 <div class="text-center" dir="ltr">
                                 <h3 class="mb-3"><i class="mdi mdi-arrow-up-bold-circle-outline text-success"></i>Người chơi</h3>
                                 <input data-plugin="knob" data-width="150" data-height="150" data-min="0"
                                   data-displayPrevious=true data-max="10000" data-step="1000"
                                   value="{{ $nguoiChoi_count }}" data-fgColor="#23b397"/>
                            </div> 
                            </div> <!-- end .text-center -->
                        </div> <!-- end card-box -->

                    </div><!-- end col-->
                      <div class="col-md-6 col-xl-3">
                        <div class="card-box">
                            <div class="text-center" dir="ltr">
                                 <div class="text-center" dir="ltr">
                                 <h3 class="mb-3"><i class="mdi mdi-arrow-up-bold-circle-outline text-success"></i>Lượt chơi</h3>
                                 <input data-plugin="knob" data-width="150" data-height="150" data-min="0"
                                   data-displayPrevious=true data-max="10000" data-step="1000"
                                   value="{{ $luotChoi_count }}" data-fgColor="#23b397"/>
                            </div> 
                            </div> <!-- end .text-center -->
                        </div> <!-- end card-box -->

                    </div><!-- end col-->
                      <div class="col-md-6 col-xl-3">
                        <div class="card-box">
                            <div class="text-center" dir="ltr">
                                 <div class="text-center" dir="ltr">
                                 <h3 class="mb-3"><i class="mdi mdi-arrow-up-bold-circle-outline text-success"></i>Gói Credit</h3>
                                 <input data-plugin="knob" data-width="150" data-height="150" data-min="0"
                                   data-displayPrevious=true data-max="10000" data-step="1000"
                                   value="{{ $goiCredit_count }}" data-fgColor="#23b397"/>
                            </div> 
                            </div> <!-- end .text-center -->
                        </div> <!-- end card-box -->

                    </div><!-- end col-->
                <!-- end page title --> 
               @endsection