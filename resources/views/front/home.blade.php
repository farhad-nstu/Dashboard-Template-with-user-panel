@extends('front.layouts.app')

@section('content')
    @if (Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong class="text-danger">Message: {{ Session::get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong class="text-success">{{ Session::get('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <!-- preloader - start -->
    <div id="preloader" class="dia-preloader"></div>
    <div class="up">
        <a href="#" id="scrollup" class="dia-scrollup text-center"><i class="fas fa-angle-up"></i></a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <!-- End of header section
                      ============================================= -->


    <!-- Start of Banner section
                      ============================================= -->
    <section id="dia-banner" class="dia-banner-section position-relative">
        <div class="banner-side-img banner-img1 position-absolute">
         
            </div>
        
        <div class="container">
            <div class="dia-banner-content dia-headline pera-content">
                <div class="mobileimage mobileimage-height" style="height: 350px; margin-top:-80px"></div>

         
                <div class="dia-banner-btn d-flex">
                    <div class="dia-play-btn text-center d-inline-block">
                        <a href="" class="lightbox-image overlay-box"><i class="fas fa-play"></i></a>
                    </div>
                    <div class="dia-abt-btn text-center d-inline-block">
                       
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!-- End of Banner section
                      ============================================= -->

    <!-- Start of Service section
                      ============================================= -->
    <section id="dia-service" class="dia-service-section">
        <div class="container">
            <div class="dia-service-content">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="dia-service-img position-relative">
                           
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="dia-service-text">
                            <div class="dia-section-title text-left text-capitalize dia-headline">
                                
                            </div>
                            <div class="dia-service-details clearfix">
                                <div class="dia-service-item dia-headline ul-li-block wow fadeFromUp" data-wow-delay="0ms"
                                    data-wow-duration="1500ms">
                                    <h3></h3>
                                    <ul>
                                        
                                    </ul>
                                </div>
                                <div class="dia-service-item dia-headline ul-li-block wow fadeFromUp" data-wow-delay="300ms"
                                    data-wow-duration="1500ms">
                                    <h3></h3>
                                    <ul>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Service section
                      ============================================= -->

@endsection
