@extends('moderna.heder')

@section('tite',__('cms.Paraa3'))

@section('test1')
<main id="main">
    <header id="header" class="fixed-top header-transparent header-scrolled">

    </header>
    <!-- ======= About Us Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>{{__('cms.Paraa3')}}</h2>
                <ol>
                    <li><a href="{{route('Paramedic.home')}}">{{__('cms.Paraa1')}}</a></li>
                    <li>{{__('cms.Paraa3')}}</li>
                </ol>
            </div>

        </div>
    </section>

    <!-- ======= About Section ======= -->
    <section class="about" data-aos="fade-up">
        <div class="container">

            <div class="row">

                <div class="col-lg-6 pt-4 pt-lg-0">
                    <h3>{{__('cms.aboarab1')}}</h3>
                    <p class="font-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="icofont-check-circled"></i> {{__('cms.aboarab2')}}</li>
                        <li><i class="icofont-check-circled"></i> {{__('cms.aboarab3')}}</li>
                        <li><i class="icofont-check-circled"></i>{{__('cms.Gmail')}}mohammadalbohisi@gmail.com</li>
                    </ul>
                    <p>
                      {{__('cms.aboarab4')}}

                    </p>
                </div>

                <div class="col-lg-6">
                    <img src="{{asset('assets/img/mohammad.jpeg')}}" class="img-fluid" alt="">
                </div>
            </div>

        </div>
    </section>

    <section class="about" data-aos="fade-up">
        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <img src="{{asset('assets/img/about.jpg')}}" class="img-fluid" alt="">
                </div>
               <div class="col-lg-6 pt-4 pt-lg-0">
                    <h3>{{__('cms.adbbod1')}}</h3>
                        <p class="font-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.
                        </p>
                    <ul>
                        <li><i class="icofont-check-circled"></i> {{__('cms.adbbod2')}}</li>
                        <li><i class="icofont-check-circled"></i> {{__('cms.adbbod3')}}</li>
                        <li><i class="icofont-check-circled"></i>{{__('cms.Gmail')}} (adlhadiabed2000@gmail.com)</li>
                    </ul>
                    <p>
                        {{__('cms.adbbod4')}}

                    </p>
                </div>
            </div>

        </div>
    </section>


</main>
@endsection
