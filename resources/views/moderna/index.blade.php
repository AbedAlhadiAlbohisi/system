@extends('moderna.heder')
@section('tite',__('cms.home'))
@section('test1')

                    <header id="header" class="fixed-top header-transparent header-scrolled">
                        <div class="container">

                            <div class="logo float-left">
                                <h1 class="text-light"><a href="index.html"><span></span></a></h1>

                            </div>



                        </div>
                    </header>
                    <!-- ======= Hero Section ======= -->
                    <section id="hero" class="d-flex justify-cntent-center align-items-center">
                        <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

                            <!-- Slide 1 -->
                            <div class="carousel-item active">
                                <div class="carousel-container">
                                    <h2 class="animated fadeInDown">{{__('cms.welcom')}}</h2>
                                    <p class="animated fadeInUp">{{__('cms.text1')}}</p>
                                </div>
                            </div>

                            <!-- Slide 2 -->
                            <div class="carousel-item">
                                <div class="carousel-container">
                                    <h2 class="animated fadeInDown">{{__('cms.welcom2')}}</h2>
                                    <p class="animated fadeInUp">{{__('cms.text2')}}</p>
                                    {{-- <a href="http://127.0.0.1:8000/cms/admin/login" class="btn-get-started animated fadeInUp">{{__('cms.Read')}}</a> --}}
                                </div>
                            </div>



                            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>

                            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>

                        </div>
                    </section>
                    <main id="main">





                            </div>
                        </section>
                    </main>
@endsection
