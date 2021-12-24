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
                <h1 class="h4 text-gray-900 mb-4">Tạo bài viết</h1>
            </div>
            <form action="{{route('blog.store')}}" class="user" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="adminId" value="{{Auth::guard('admin')->user()->admin_id}}">
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="title">Tiêu đề</label>
                        <input type="text" class="form-control form-control-user" id="title" 
                            name="title" value="{{old('title')}}">
                        <span class="error-message text-danger">{{$errors->first('title')}}</span></p>
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="quote">Mô tả ngắn</label>
                        <input type="text" class="form-control form-control-user" id="quote" value="{{old('quote')}}" 
                            name="quote">
                        <span class="error-message text-danger">{{$errors->first('quote')}}</span></p>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0  ">
                        <label for="thumbnail"> Ảnh đại diện</label>
                        <input type="file" accept="image/*" class="form-control form-control-user" id="thumbnail" name="thumbnail">
                        <span class="error-message text-danger">{{$errors->first('thumbnail')}}</span></p>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="content"> Thông tin</label>
                    <textarea name="content" id="test" rows="5"></textarea>
                    <span class="error-message text-danger">{{$errors->first('content')}}</span></p>
                </div>
                <button type="submit" class="btn btn-success btn-user btn-block col-sm-3 mg-0-auto">
                    Thêm mới
                </button>
                <a href="{{route('blog.index')}}" class="btn btn-primary btn-user btn-block col-sm-3 mg-0-auto">
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

    textarea {
        width: 100%;
        resize: none;
        border-radius: none;
        border-color: #d1d3e2;
    }

    textarea:focus {
        outline: none;
    }


    /* disable arrow */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@endsection