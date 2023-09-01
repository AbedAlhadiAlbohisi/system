@extends('cms.parent')
@section('title',__('cms.not'))
@section('page_name',__('cms.not'))
@section('main_name',__('cms.not'))
@section('small_page_name',__('cms.cresate'))
@section('small_page_admin',__('cms.createadmin'))

@section('style')

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
                        <h3 class="card-title ">{{(__('cms.not'))}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10px">{{__('cms.#')}}</th>
                                    <th>{{(__('cms.name'))}}</th>
                                    <th>{{(__('cms.title'))}}</th>
                                    <th>{{(__('cms.info'))}}</th>
                                    <th>{{(__('cms.subcategoryas'))}}</th>
                                    <th>{{__('cms.don')}}</th>
                                    {{-- <th>{{(__('cms.updated_at'))}}</th> --}}
                                    <th>{{(__('cms.created_at'))}}</th>
                                    <th style="width: 15px">{{(__('cms.setting'))}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($notes as $note)
                                    <td>{{$loop->index + 1 ?? ''}}</td>
                                    <td>{{$note->name}}</td>
                                    <td>{{$note->title}}</td>
                                    <td>{{$note->info}}</td>

                                    <td> <span
                                            class="badge bg-info">{{$note->subCategory->name??''}}</span>
                                    </td>



                                    <td> <span class="badge @if ($note->done) bg-danger @else bg-success @endif">{{$note->DoneStaus}}</span>
                                    </td>


                                    <td>{{$note->created_at ->diffForHumans()}}</td>
                                    {{-- <td>{{$note->updated_at->diffForHumans()}}</td> --}}
                                    <td>
                                        <div class="btn-group">
                                            @can('Update-Note')
                                              <a href="{{route('notes.edit',[$note->id])}}" class="btn btn-success">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @endcan
                                            @can('Delete-Note')
                                            <a href="#" onclick="comforme('{{$note->id}}',this)" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            @endcan


                                            </form>
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
    function  comforme(id, element){
       Swal.fire({
        title: "{{__('cms.Are you sure?')}}",
        text: "{{__('cms.Youwon')}}",
        icon: 'warning',
        // showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "{{__('cms.Yes')}}"
        }).then((result) => {
        if (result.isConfirmed) {
        performdtore(id, element)
        }
        })


         function performdtore(id,element){
        axios.delete('/cms/admin/notes/'+id )
            .then(function (response) {
                    console.log(response);
                    toastr.success(response.data.message);
                    element.closest('tr').remove();

                 })
         .catch(function (error) {
                    console.log(error);
                    toastr.error(error.response.data.message);
                });
        }



    }


</script>
@endsection
