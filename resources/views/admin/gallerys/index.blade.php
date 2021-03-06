@extends('admin.default.master')
@section('content')
<!-- Page Heading -->
{{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> --}}
{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. --}}
{{-- For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official --}}
{{-- DataTables documentation</a>.</p> --}}
{{-- <div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
</div> --}}
<form action="" method="get" class="user relative mb-30">
    <div class="container-fluid">
        <div class="form-group row">
            {{-- <div class="col-sm-3 mb-20 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="" placeholder="ID" name="adminID">
        </div>
        <div class="col-sm-3 mb-20 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="" placeholder="Email" name="adminEmail">
        </div>
        <div class="col-sm-3 mb-20 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="" placeholder="Tên" name="adminName">
        </div>
        <div class="col-sm-1  mb-sm-0 mb-20 h-50px">
            <button class="btn btn-primary btn-user btn-search">
                <i class="fas fa-search"></i>&nbsp; Tìm Kiếm
            </button>
        </div> --}}
        @if (Auth::guard('admin')->user()->hasRole('admin'))
            <div class="col-sm-1  mb-sm-0 mb-20 h-50px">
                <a href="{{route('gallerys.create')}}" class="btn btn-success btn-user btn-search">
                    <i class="fas fa-user-plus"></i></i>&nbsp; Thêm mới
                </a>

            </div>
            @endif 
        </div>
    </div>

</form>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Bộ sưu tập</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Thiết lập</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Thiết lập</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($gallerys as $gallery)
                    <tr>
                        <td>{{$gallery->gallery_id}}</td>
                        <td><img src="{{asset('public/image/gallery/')}}/{{$gallery->image}}" alt="{{$gallery->image}}" width="300"></td>

                        <form action="{{route('gallerys.destroy',$gallery->gallery_id)}}" method="post">
                            @csrf
                            @method('delete')
                            <td>
                                @if (Auth::guard('admin')->user()->hasRole('admin'))
                                <button class="btn btn-danger btn-circle btn-sm" title="Xóa">
                                    <i class="fas fa-trash"></i>
                                </button>
                                @endif
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('css')
<style>
    .relative {
        position: relative;
    }

    .btn-search {
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
        display: flex;
        align-items: center;
        width: 100%;
        justify-content: center;
    }

    .mb-30 {
        margin-bottom: 30px;
    }

    .mb-40 {
        margin-bottom: 40px;
    }

    .mb-20 {
        margin-bottom: 20px;
    }

    .h-50px {
        height: 50px;
    }
</style>
@endsection

@section('js')
<script src="">


</script>
@endsection