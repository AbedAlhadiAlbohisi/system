@extends('cms.parent')
@section('title',__('cms.permissions'))
@section('page_name',__('cms.permissions'))
@section('main_name',__('cms.permissions'))
@section('small_page_name',__('cms.cresate'))
@section('small_page_admin',__('cms.createadmin'))

@section('style')
<link rel="stylesheet" href="{{asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
@endsection
@section('style')
<link rel="stylesheet" href="{{asset('cms/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('cms/plugins/toastr/toastr.min.css')}}">
@endsection
@section('main-content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title ">{{(__('cms.permissions'))}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>{{(__('cms.name'))}}</th>
                                    <th>{{(__('cms.usertype'))}}</th>
                                    <th >{{(__('cms.assinged'))}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($permissions as $permission)
                                    <td>{{$permission->name}}</td>
                                    <td> <span class="badgebg-info ">{{$permission->guard_name }}</span></td>

                                    <td>
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" @if($permission->assigned) checked @endif onchange="updateuserePermission('{{$permission->id}}')"
                                                 id="permission_{{$permission->id}}" >
                                                <label for="permission_{{$permission->id}}">
                                                </label>
                                                <label for="permission_{{$permission->id}}">

                                                </label>
                                            </div>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">

                    </div>
                </div>

                <!-- /.card -->
            </div>


        </div><!-- /.container-fluid -->
</section>

@endsection


@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('cms/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{asset('cms/plugins/toastr/toastr.min.js')}}"></script>
<script>

         function updateuserePermission(permissionId) {
        axios.put('/cms/admin/user/{{$user->id}}/permissions',{
            user_id: '{{$user->id}}',
            permission_id: permissionId,
        })
        .then(function (response) {
        console.log(response);
        toastr.success(response.data.message);
        })
        .catch(function (error) {
        console.log(error);
        toastr.error(error.response.data.message);
        });




    }


</script>
@endsection
