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
                        <h3 class="card-title">{{(__('cms.not'))}}</h3>
                    </div>

                        <form id="forme_rest">

                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{__('cms.category')}}</label>
                                    <select class="form-control categories" style="width: 100%;" id="category_id">
                                        <option value="-1">select form below</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>{{__('cms.subcategory')}}</label>
                                    <select class="form-control sub_category" style="width: 100%;" id="sub_category" disabled>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">{{(__('cms.name'))}}</label>
                                    <input type="text" class="form-control @if($errors->any()) is-invalid @endif " id="name" name="name"
                                        placeholder="{{__('cms.name')}}" value="{{old('name')}}" disabled>
                                </div>

                       <div class="form-group">
                            <label for="title">{{(__('cms.title'))}}</label>
                            <input type="text" class="form-control @if($errors->any()) is-invalid @endif " id="title"
                            name="title" placeholder="{{__('cms.title')}}" value="{{old('title')}}" disabled>
                        </div>


                        <div
                           class="form-group">
                            <label for="info">{{(__('cms.info'))}}</label>
                            <input type="text" class="form-control @if($errors->any()) is-invalid @endif " id="info"
                            name="info" placeholder="{{__('cms.info')}}"  value="{{old('info')}}" disabled>
                        </div>



                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" name="active" id="done_chickbox">
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
    $('#category_id').on('click',function(){
        console.log('category clicke');
    });
    $('#category_id').on('change',function(){
        if(this.value != -1){
            controlFormstatus(false);
            getsubcategories(this.value);
        }else{
         controlFormstatus(true);
        }
    });

    function controlFormstatus(status){
            $('#sub_category').attr('disabled',status);
            $('#name').attr('disabled',status);
            $('#title').attr('disabled',status);
            $('#info').attr('disabled',status);
    }

    function getsubcategories(categoryId){

         axios.get('/cms/admin/category/'+categoryId)
        .then(function (response) {
            $('#sub_category').empty();
            if(response.data.subcategories.length > 0){
                $.each(response.data.subcategories,function(i, item){
                $('#sub_category').append(new Option(item.name, item.id));
                });
            }else{
                    controlFormstatus(true);
            }

        })
        .catch(function (error) {
            console.log(error);
        });
    }
</script>
<script>
    function performstore(){
        axios.post('/cms/admin/notes', {
           sub_category_id: document.getElementById('sub_category').value,
           name: document.getElementById('name').value,
           title: document.getElementById('title').value,
           info: document.getElementById('info').value,
           done: document.getElementById('done_chickbox').checked,

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
