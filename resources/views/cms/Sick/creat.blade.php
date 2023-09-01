@extends('cms.parent')
@section('title',__('cms.sick'))
@section('page_name',__('cms.createsick'))
@section('main_name',__('cms.createsick'))
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
                        <h3 class="card-title">{{(__('cms.createsick'))}}</h3>
                    </div>

                        <form id="forme_rest" >

                            @csrf
                            <div class="card-body">

                        <div class="card-body">
                            <div class="form-group">
                                <label>{{__('cms.hospitel')}}</label>
                                <select class="form-control categories" style="width: 100%;" id="category_id">
                                    <option value="-1">select form below</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label>{{__('cms.hospitelw')}}</label>
                                <select class="form-control sub_category" style="width: 100%;" id="sub_category" disabled>


                                </select>
                            </div>

                            <div class="form-group">
                                <label for="First_name">{{(__('cms.First_name'))}}</label>
                                <input type="text" class="form-control @if($errors->any()) is-invalid @endif " id="First_name" name="First_name"
                                    placeholder="{{__('cms.First_name')}}" value="{{old('First_name')}}">
                            </div>

                        <div class="form-group">
                            <label for="phone">{{(__('cms.phone'))}}</label>
                            <input type="number" class="form-control @if($errors->any()) is-invalid @endif " id="phone" name="phone"
                                placeholder="{{__('cms.phone')}}" value="{{old('phone')}}">
                        </div>

                        <div class="form-group">
                            <label for="citys">{{(__('cms.citys'))}}</label>
                            <input type="text" class="form-control @if($errors->any()) is-invalid @endif " id="citysike" name="citysike"
                                placeholder="{{__('cms.citys')}}" value="{{old('citysike')}}">
                        </div>

                        <div class="form-group">
                               <label for="city">{{(__('cms.numpermone'))}}</label>
                            <input type="number" class="form-control @if($errors->any()) is-invalid @endif " id="city" name="city"
                                placeholder="{{__('cms.numpermone')}}" value="{{old('city')}}">
                        </div>


                            <div class="form-group">
                                <label for="ID_namber">{{(__('cms.id_number'))}}</label>
                                <input type="number" class="form-control @if($errors->any()) is-invalid @endif " id="ID_namber" name="ID_namber"
                                    placeholder="{{__('cms.id_number')}}" value="{{old('ID_namber')}}">
                            </div>


                      <div class="form-group">
                        <label>{{__('cms.gender')}}</label>
                        <select class="form-control gender" style="width: 100%;" id="gender">
                            <option value="M">{{__('cms.male')}}</option>
                            <option value="F">{{__('cms.female')}}</option>
                        </select>
                    </div>

                        <div class="form-group">
                            <label>{{__('cms.Last_name')}}</label>
                            <select class="form-control gender" style="width: 100%;" id="Last_name">
                                <option value="M">{{__('cms.malew')}}</option>
                                <option value="F">{{__('cms.femalew')}}</option>

                            </select>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" name="danger" id="danger">
                            <label class="custom-control-label" for="danger">{{(__('cms.danger'))}}</label>
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
<script src="{{asset('cms/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('cms/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
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
    $(function () {
  bsCustomFileInput.init();
                    });
</script>
<script>
    $('.Sicks').select2({
        theme: 'bootstrap4'
    });

    function performstore(){
        let formData=new FormData ();
        formData.append('First_name',document.getElementById('First_name').value);
        formData.append('Last_name',document.getElementById('Last_name').value);
        formData.append('sub_category_id',document.getElementById('sub_category').value);
        formData.append('phone',document.getElementById('phone').value);
        formData.append('citysike',document.getElementById('citysike').value);
        formData.append('city',document.getElementById('city').value);
        formData.append('ID_namber',document.getElementById('ID_namber').value);
        formData.append('gender',document.getElementById('gender').value);
        formData.append('danger',document.getElementById('danger').value);

        axios.post('/cms/admin/sick', formData)
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
