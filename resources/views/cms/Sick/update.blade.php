@extends('cms.parent')
@section('title',__('cms.dashbord'))
@section('page_name',__('cms.updateuser'))
@section('main_name',__('cms.creates'))
@section('small_page_name',__('cms.cresate'))
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
                        <h3 class="card-title">{{(__('cms.updateuser'))}}</h3>
                    </div>

                    <form id="forme_rest">

                        @csrf
                        <div class="card-body">



                            <div class="form-group">
                                    <label for="First_name">{{(__('cms.First_name'))}}</label>
                                    <input type="text" class="form-control @if($errors->any()) is-invalid @endif " id="First_name" name="First_name"
                                        placeholder="{{__('cms.First_name')}}" value="{{$sick->First_name}}">
                                </div>



                                <div class="form-group">
                                    <label for="Last_name">{{(__('cms.Last_name'))}}</label>
                                    <input type="text" class="form-control @if($errors->any()) is-invalid @endif " id="Last_name" name="Last_name"
                                        placeholder="{{__('cms.Last_name')}}" value="{{$sick->Last_name}}">
                                </div>

                                 <div class="card-body">
                            <div class="form-group">
                                <label>{{__('cms.category')}}</label>
                                <select class="form-control categories" style="width: 100%;" id="category_id">
                                    <option value="-1">select form below</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}" value="{{$sick->category}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label>{{__('cms.subcategory')}}</label>
                                <select class="form-control sub_category" style="width: 100%;" id="sub_category" disabled value="{{$sick->sub_category}}">


                                </select>
                            </div>



                                <div class="form-group">
                                    <label for="phone">{{(__('cms.phone'))}}</label>
                                    <input type="number" class="form-control @if($errors->any()) is-invalid @endif " id="phone" name="phone"
                                        placeholder="{{__('cms.phone')}}" value="{{$sick->phone}}">
                                </div>


                                <div class="form-group">
                                    <label for="city">{{(__('cms.city'))}}</label>
                                    <input type="text" class="form-control @if($errors->any()) is-invalid @endif " id="city" name="city"
                                        placeholder="{{__('cms.city')}}"value="{{$sick->city}}">
                                </div>


                                <div class="form-group">
                                    <label for="ID_namber">{{(__('cms.id_number'))}}</label>
                                    <input type="number" class="form-control @if($errors->any()) is-invalid @endif " id="ID_namber" name="ID_namber"
                                        placeholder="{{__('cms.id_number')}}" value="{{$sick->ID_namber}}">
                                </div>



                               <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="danger" id="danger" @if ($sick->danger)  checked @endif
                                >
                                <label class="custom-control-label" for="danger" @if ($sick->danger)  checked @endif>{{__('cms.danger')}}</label>
                            </div>




                        </div>
                        <div class="card-footer">
                            <button type="button" onclick="performUpdate()"
                                class="btn btn-primary">{{__('cms.edit')}}</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
</section>
@endsection
@section('script')
<script src="{{asset('cms/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('cms/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(function () {
  bsCustomFileInput.init();
                    });
</script>
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
            // $('#title').attr('disabled',status);
            // $('#info').attr('disabled',status);
    }

    function getsubcategories(categoryId){
         axios.get('/cms/admin/category/'+categoryId)
        .then(function (response) {
            console.log(response);
            console.log(response.data.subcategories);
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
    // $('.citys').select2({
    //     theme: 'bootstrap4'
    // });
    // $('.gender').select2({
    //     theme: 'bootstrap4'
    // })

    function performUpdate(){
       axios.put('/cms/admin/sick/{{$sick->id}}',{
           First_name:document.getElementById('First_name').value,
           Last_name:document.getElementById('Last_name').value,
           phone:document.getElementById('phone').value,
           city:document.getElementById('city').value,
           sub_category:document.getElementById('sub_category').value,
           ID_namber:document.getElementById('ID_namber').value,
           danger:document.getElementById('danger').checked,

       })


        .then(function (response) {
            console.log(response);
      toastr.success(response.data.message);
            window.location.href='/cms/admin/sick'
        })
        .catch(function (error) {
            console.log(error);
      toastr.error(error.response.data.message);
        });
    }



//

</script>

@endsection
