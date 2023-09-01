@extends('cms.parent')
@section('title',__('cms.dashbord'))
@section('page_name',__('cms.category'))
@section('main_name',__('cms.category'))
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
                        <h3 class="card-title">{{(__('cms.update_ category'))}}</h3>
                    </div>

                        <form>

                            @csrf
                            <div class="card-body">



                       <div class="form-group">
                            <label for="title">{{(__('cms.name'))}}</label>
                            <input type="text" class="form-control @if($errors->any()) is-invalid @endif " id="name"
                            name="name" placeholder="{{__('cms.titles')}}" value="{{$category->name}}">
                        </div>



                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" name="active" id="active" @if ($category->active)  checked @endif>
                            <label class="custom-control-label"value="{{$category->active}}" for="active">{{(__('cms.active'))}}</label>
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
        axios.put('/cms/admin/category/{{$category->id}}', {
           name: document.getElementById('name').value,
           active: document.getElementById('active').checked,

        })
        .then(function (response) {
            console.log(response);
        toastr.success(response.data.message);
        window.location.href='/cms/admin/category'
        })
        .catch(function (error) {
            console.log(error);
      toastr.error(error.response.data.message);
        });
    }



//

</script>

@endsection
