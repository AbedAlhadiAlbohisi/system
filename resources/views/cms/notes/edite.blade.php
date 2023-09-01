@extends('cms.parent')
@section('title',__('cms.dashbord'))
@section('page_name',__('cms.not'))
@section('main_name',__('cms.not'))
@section('small_page_name',__('cms.cresate'))
@section('small_page_admin',__('cms.createadmin'))

@section('style')
<link rel="stylesheet" href="{{asset('cms/plugins/select2/css/select2.min.css')}}">

@endsection
@section('main-content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{(__('cms.not_update'))}}</h3>
                    </div>

                        <form>

                            @csrf
                            <div class="card-body">



                       <div class="form-group">
                            <label for="title">{{(__('cms.titles'))}}</label>
                            <input type="text" class="form-control @if($errors->any()) is-invalid @endif " id="title"
                            name="title" placeholder="{{__('cms.titles')}}" value="{{$note->title}}">
                        </div>


                        <div
                           class="form-group">
                            <label for="info">{{(__('cms.info'))}}</label>
                            <input type="text" class="form-control @if($errors->any()) is-invalid @endif " id="info"
                            name="info" placeholder="{{__('cms.info')}}"  value="{{$note->info}}">
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" name="active" id="done_chickbox" @if ($note->done)  checked @endif>
                            <label class="custom-control-label" for="done_chickbox">{{(__('cms.don'))}}</label>
                        </div>




                        </div>
                        <div class="card-footer">
                            <button type="button" onclick="performstore()"
                            class="btn btn-primary">{{__('cms.send')}}</button>
                        </div>

                    </form>
                </div>

           </div>
    </div>
</section>
@endsection
@section('script')

<script>
    function performstore(){
        axios.put('/cms/admin/notes/{{$note->id}}', {
           title: document.getElementById('title').value,
           info: document.getElementById('info').value,
           done: document.getElementById('done_chickbox').checked,

        })
        .then(function (response) {
            console.log(response);
        toastr.success(response.data.message);
        window.location.href='/cms/admin/notes'
        })
        .catch(function (error) {
            console.log(error);

        });
    }



//

</script>

@endsection
