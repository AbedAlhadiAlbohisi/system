@extends('cms.parent')
@section('title',__('cms.dashbord'))
@section('main-content')

<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          @can(['Totel_admin'])
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info ">
                <div class="inner">
                    <h3>{{$admincount}}</h3>

                    <p>{{__('cms.admintotells')}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('admins.index')}}" class="small-box-footer">{{__('cms.adminotels')}} <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endcan


            @can(['Totel_user'])
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success ">
                    <div class="inner">
                        <h3>{{$userCount}}</h3>

                        <p>{{__('cms.usertotells')}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('users.index')}}" class="small-box-footer">{{__('cms.usertotels')}} <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            @endcan


            <!-- ./col -->
            @can(['Totel_sike'])
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$Sikecount}}</h3>

                        <p>{{__('cms.Siketotells')}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('sick.index')}}" class="small-box-footer">{{__('cms.Siketotels')}} <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            @endcan


              @can(['Totel_note'])
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$Notecount}}</h3>

                        <p>{{__('cms.Notetotells')}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('notes.index')}}" class="small-box-footer">{{__('cms.Notetotell')}} <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            @endcan


            </section>
@endsection
