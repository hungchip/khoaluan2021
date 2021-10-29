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
            <div class="col-sm-1  mb-sm-0 mb-20 h-50px">
                <a href="{{route('room.create')}}" class="btn btn-success btn-user btn-search">
                    <i class="fas fa-user-plus"></i></i>&nbsp; Thêm mới
                </a>
            </div>
        </div>
        
    </div>

</form>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách các phòng</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Loại phòng</th>
                        <th>Người lớn</th>
                        <th>Trẻ em</th>
                        <th>Ngày đến</th>
                        <th>Ngày đi</th>
                        <th>Trạng thái</th>
                        <th>Thiết lập</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Loại phòng</th>
                        <th>Người lớn</th>
                        <th>Trẻ em</th>
                        <th>Ngày đến</th>
                        <th>Ngày đi</th>
                        <th>Trạng thái</th>
                        <th>Thiết lập</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($rooms as $room)
                    <tr>
                        <td>{{$room->room_id}}</td>
                        <td>{{$room->roomType->room_type_name}}</td>
                        <td>{{$room->room_adult}}</td>
                        <td>{{$room->room_child}}</td>
                        <td></td>
                        <td></td>
                        @if ($room->status == 0)
                        <td>Còn trống</td>
                        @elseif ($room->status == 1)
                        <td>Đang ở</td>
                        @elseif ($room->status == 2)
                        <td>Chưa dọn dẹp</td>
                        @elseif ($room->status == 3)
                        <td>Đang sửa</td>
                        @endif
                        <form action="{{route('room.destroy',$room->room_id)}}" method="post">
                            @csrf
                            @method('delete')
                            <td>
                                <a href=""
                                    class="btn btn-primary btn-circle btn-sm" title="Chi tiết">
                                    <i class="fas fa-info"></i>
                                </a>
                                <a href=""
                                    class="btn btn-warning btn-circle btn-sm" title="Chỉnh sửa">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-circle btn-sm" title="Xóa">
                                    <i class="fas fa-trash"></i>
                                </button>
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