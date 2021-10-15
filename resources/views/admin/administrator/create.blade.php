@extends('admin.default.master')
@section('content')
<!-- Page Heading -->
{{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> --}}
{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. --}}
{{-- For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> --}}

<!-- DataTales Example -->
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="p-3">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Tạo tài khoản quản trị mới</h1>
            </div>
            <form action="{{route('admin.store')}}" class="user" method="post" enctype="multipart/form">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="email" class="form-control form-control-user" id="" placeholder="Email"
                            name="adminEmail">
                        <span class="error-message text-danger">{{$errors->first('adminEmail')}}</span></p>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" id="" placeholder="password"
                            name="password">
                        <span class="error-message text-danger">{{$errors->first('password')}}</span></p>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="" placeholder="Tên" name="adminName">
                    <span class="error-message text-danger">{{$errors->first('adminName')}}</span></p>
                </div>
                
                <button type="submit" class="btn btn-success btn-user btn-block col-sm-3 mg-0-auto">
                    Thêm mới
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
    .mg-0-auto {
        margin: 0 auto; 
    }
</style>
@endsection