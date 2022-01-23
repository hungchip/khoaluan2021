@extends('admin.default.master')
@section('content')
<!-- Page Heading -->
{{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> --}}
{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. --}}
    {{-- For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official --}}
        {{-- DataTables documentation</a>.</p> --}}
{{-- <div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
</div> --}}
<form action="{{route('showListAdmin')}}" method="get" class="user relative mb-30">

    <div class="form-group row">
        <div class="col-sm-3 mb-20 mb-sm-0">
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
        </div>
        @if (Auth::guard('admin')->user()->hasRole('admin'))
        <div class="col-sm-1  mb-sm-0 mb-20 h-50px">
            <a href="{{route('admin.create')}}" class="btn btn-success btn-user btn-search">
                <i class="fas fa-user-plus"></i></i>&nbsp; Thêm mới
            </a>
        </div>
        @endif
    </div>


</form>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách quản trị viên</h6>({{$admins->total()}} kết quả)
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>E-mail</th>
                        <th>Tên</th>
                        <th>Ngày khởi tạo</th>
                        <th>Quyền</th>
                        <th></th>
                        <th>Thiết lập</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>E-mail</th>
                        <th>Tên</th>
                        <th>Ngày khởi tạo</th>
                        <th>Quyền</th>
                        <th></th>
                        <th>Thiết lập</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($admins as $admin)
                    <tr>
                        <form action="{{route('assignRole')}}" method="post">
                            @csrf

                            <input type="hidden" name="admin_id" value="{{$admin->admin_id}}">
                            <td>{{$admin->admin_id}}</td>
                            <td>{{$admin->admin_email}}</td>
                            <td>{{$admin->admin_name}}</td>
                            <td>{{date('d-m-Y H:m:s', strtotime($admin->created_at))}}</td>
                            <td class="role-box" id="role-box">
                                <input type="checkbox" name="adminRole" id="adminRole{{$admin->admin_id}}"
                                    class=" role-check" {{$admin->hasRole('admin') ? 'checked' : '' }}
                                onclick="{{Auth::guard('admin')->user()->hasRole('admin') ? 'return true;' : ' return
                                false;'}}">

                                <label for="adminRole{{$admin->admin_id}}" class=" role-label">Quản
                                    trị</label>

                                <input type="checkbox" name="authorRole" id="authorRole{{$admin->admin_id}}"
                                    class=" role-check" {{$admin->hasRole('author') ? 'checked' : '' }}
                                onclick="{{Auth::guard('admin')->user()->hasRole('admin') ? 'return true;' : ' return
                                false;'}}">

                                <label for="authorRole{{$admin->admin_id}}" class=" role-label">Tác
                                    giả</label>

                                <input type="checkbox" name="receptionistRole" id="receptionistRole{{$admin->admin_id}}"
                                    class=" role-check" {{$admin->hasRole('receptionist') ? 'checked' : '' }}
                                onclick="{{Auth::guard('admin')->user()->hasRole('admin') ? 'return true;' : ' return
                                false;'}}">

                                <label for="receptionistRole{{$admin->admin_id}}" class=" role-label">Tiếp tân</label>

                                {{-- <input type="checkbox" name="basicRole" id="basicRole{{$admin->admin_id}}"
                                    readonly="true" class=" role-check" onclick="return false;"
                                    {{$admin->hasRole('basic') ?
                                'checked' : '' }} onclick="{{Auth::guard('admin')->user()->hasRole('admin') ? 'return
                                true;' : '
                                return false;'}}">

                                <label for="basicRole{{$admin->admin_id}}" class=" role-label">Nhân
                                    viên</label> --}}
                            </td>
                            <td> @if(Auth::guard('admin')->user()->hasRole('admin'))

                                <button> Phân quyền</button>
                                @endif
                            </td>
                        </form>
                        <form action="{{route('admin.destroy',$admin->admin_id)}}" method="post">
                            @csrf
                            @method('delete')
                            <td>
                                @if(Auth::guard('admin')->user()->admin_id == $admin->admin_id )
                                <a href="{{route('admin.edit',$admin->admin_id)}}"
                                    class="btn btn-warning btn-circle btn-sm" title="Chỉnh sửa">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                @elseif(Auth::guard('admin')->user()->hasRole('admin'))
                                <a href="{{route('admin.edit',$admin->admin_id)}}"
                                    class="btn btn-warning btn-circle btn-sm" title="Chỉnh sửa">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                @endif
                                @if(Auth::guard('admin')->user()->hasRole('admin'))
                                <button class="btn btn-danger btn-circle btn-sm" title="Xóa">
                                    <i class="fas fa-trash"></i>
                                </button>
                                @endif
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
                {{ $admins->appends(Request::all())->links() }}
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

    .role-label{
        margin-right: 15px;
    }
</style>
@endsection