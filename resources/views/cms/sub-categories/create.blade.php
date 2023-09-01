@extends('cms.parent')
@section('title',__('cms.subcategorys'))
@section('page_name',__('cms.subcategorys'))
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
                        <h3 class="card-title">{{(__('cms.subcategorys'))}}</h3>
                    </div>

                        <form id="forme_rest">

                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label>{{__('cms.namecategory')}}</label>
                                    <select class="form-control categories" style="width: 100%;" id="category_id">
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                       <div class="form-group">
                            <label for="name">{{(__('cms.namesubcategory'))}}</label>
                            <input type="text" class="form-control @if($errors->any()) is-invalid @endif " id="name"
                            name="name" placeholder="{{__('cms.namesubcategory')}}" >
                        </div>



                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" name="active" id="active">
                            <label class="custom-control-label" for="active">{{(__('cms.active'))}}</label>
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
        axios.post('/cms/admin/sub-categories', {
           category_id: document.getElementById('category_id').value,
           name: document.getElementById('name').value,
           active: document.getElementById('active').checked,

        })
        .then(function (response) {
            console.log(response);
      toastr.success(response.data.message);
      document.getElementById('forme_rest').reset();
        })
        .catch(function (error) {
            console.log(error);
      toastr.error(error.response.data.message);
        });
    }



//

</script>

@endsection
