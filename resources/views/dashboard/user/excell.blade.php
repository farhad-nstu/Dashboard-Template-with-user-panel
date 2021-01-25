@extends('dashboard.master.app')
@section('title')
    YouthFireIT | Dashboard  
@endsection

@section('content')
@if(session('errors'))
  @foreach($errors as $error)
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong class="text-success">Message: {{$error}}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
  @endforeach      
@endif
@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong class="text-success">Message: {{session('success')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
    <!-- content @s -->
    <div class="nk-content "> 
        <div class="nk-split nk-split-page nk-split-md">
            <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                    <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                </div>
                <div class="nk-block nk-block-middle nk-auth-body"> 
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Create User</h5> 
                        </div>
                    </div><!-- .nk-block-head -->

                    {{--===== Register Start ====== --}}

                <form action="{{ route('excel.import') }}" method="post" enctype="multipart/form-data" >
                  @csrf

                  <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Select Excel File to Upload</label>
                        <!-- <input type="file" name="file" id="file">    -->
                        <input type="file" class="form-control form-control-lg" name="file" id="file">                         
                  </div>

                    <button type="submit" class="btn btn-primary">Upload File</button>
                    <br><br>
                    <a href="{{ url('/sample/products.xlsx') }}">Download File</a>
                    </form>
                    <!-- form -->

                      
                </div><!-- .nk-block -->
                 
            </div><!-- nk-split-content -->
           
        </div><!-- nk-split -->
    </div>
    <!-- wrap @e -->
</div>
<!-- content @e -->
@endsection