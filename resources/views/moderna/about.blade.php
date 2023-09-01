@extends('moderna.heder')
@section('tite',__('cms.Paraa2'))
@section('test1')
<main id="main">
                <header id="header" class="fixed-top header-transparent header-scrolled">
                    <div class="container">

                        <div class="logo float-left">
                            <h1 class="text-light"><a href="index.html"><span></span></a></h1>
                        </div>


                    </div>
                </header>
                <section class="breadcrumbs">
                        <div class="container">

                            <div class="d-flex justify-content-between align-items-center">
                                <h2>{{__('cms.Paraa2')}}</h2>
                                <ol>
                                    <li><a href="{{route('Paramedic.home')}}">{{__('cms.Paraa1')}}</a></li>
                                    <li>{{__('cms.Paraa2')}}</li>
                                </ol>
                            </div>

                        </div>
                    </section>



                <section class="services">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
                                <div class="icon-box icon-box-pink">
                                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                                    <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                                    <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                                        excepturi sint occaecati cupiditate non provident</p>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                                <div class="icon-box icon-box-cyan">
                                    <div class="icon"><i class="bx bx-file"></i></div>
                                    <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                                    <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                        dolore eu fugiat nulla pariatur</p>
                                </div>
                            </div>


                        </div>

                    </div>
                </section>
</main>
@endsection
