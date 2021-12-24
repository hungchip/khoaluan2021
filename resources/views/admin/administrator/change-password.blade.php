@extends('admin.default.master')
@section('content')
<!-- Page Heading -->
{{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> --}}
{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. --}}
    {{-- For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p> --}}

<!-- DataTales Example -->
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="p-3">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Đổi mật khẩu</h1>
            </div>
            <form action="{{route('postChangePassword')}}" class="user" method="post" enctype="multipart/form">
                @method ('post')
                @csrf

                <div class="form-group ">
                    <div class="col-sm-6 mb-3 mb-sm-0 mg-0-auto">
                        <span>Mật khẩu cũ</span>
                        <input type="password" class="form-control form-control-user" id="" placeholder=""
                            name="oldPassword" value="">
                        <span class="error-message text-danger">{{$errors->first('oldPassword')}}</span></p>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0 mg-0-auto">
                        <span>Mật khẩu mới</span>
                        <input type="password" class="form-control form-control-user" id="" placeholder=""
                            name="newPassword" value="">
                        <span class="error-message text-danger">{{$errors->first('newPassword')}}</span></p>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0 mg-0-auto">
                        <span>Nhập lại mật khẩu mới</span>
                        <input type="password" class="form-control form-control-user" id="" placeholder=""
                            name="confirmPassword" value="">
                        <span class="error-message text-danger">{{$errors->first('confirmPassword')}}</span></p>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-user btn-block col-sm-3 mg-0-auto">
                    Đổi mật khẩu
                </button>
                <a href="{{route('showListAdmin')}}" class="btn btn-primary btn-user btn-block col-sm-3 mg-0-auto">
                    Quay lại
                </a>
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