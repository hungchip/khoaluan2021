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
                <h1 class="h4 text-gray-900 mb-4">Chỉnh sửa loại phòng </h1>
            </div>
            <form action="{{route('blog.update',$blog->blog_id)}}" class="user" method="post"
                enctype="multipart/form-data">
                
                @csrf
                @method('put')
                
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="title">Tên bài viết</label>
                        <input type="text" class="form-control form-control-user" id="title"
                            value="{{$blog->title}}" name="title">
                        <span class="error-message text-danger">{{$errors->first('title')}}</span></p>
                    </div>
                    <div class="col-sm-6">
                        <label for="author">Tác giả</label>
                        <input type="text" readonly class="form-control form-control-user" id="author"
                            value="{{$blog->admin->admin_name}}">
                        <span class="error-message text-danger">{{$errors->first('author')}}</span></p>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="quote">Mô tả ngắn</label>
                        <input type="text" class="form-control form-control-user" id="quote" value="{{$blog->quote}}"
                            name="quote">
                        <span class="error-message text-danger">{{$errors->first('quote')}}</span></p>
                    </div>
                    <div class="col-sm-12  ">
                        <label for="thumbnail"> Ảnh đại diện</label>
                        <img src="{{asset('public/image/')}}/{{$blog->thumbnail}}" alt="" width="300">
                        <input type="file" class="form-control form-control-user" id="thumbnail" 
                            name="thumbnail" value="{{$blog->thumbnail}}" accept="image/*">
                        <span class="error-message text-danger">{{$errors->first('thumbnail')}}</span></p>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="content"> Thông tin</label>
                    <textarea name="content" id="ckeditor" rows="5">{{$blog->content}}</textarea>
                    <span class="error-message text-danger">{{$errors->first('content')}}</span></p>
                </div>
                <button type="submit" class="btn btn-success btn-user btn-block col-sm-3 mg-0-auto">
                    Cập nhật
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