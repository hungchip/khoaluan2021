@extends('admin.default.master')
@section('content')

<form action="{{route('blog.index')}}" method="get" class="user relative mb-30">

    <div class="form-group row">
        <div class="col-sm-3 mb-20 mb-sm-0">
            <input type="text" class="form-control form-control-user" placeholder="ID" id="blog_id" name="blogId">
        </div>
        <div class="col-sm-3 mb-20 mb-sm-0">
            <input type="text" class="form-control form-control-user" placeholder="Tiêu đề"  id="title"  name="title">
        </div>
        <div class="col-sm-3 mb-20 mb-sm-0">
            <input type="text" class="form-control form-control-user" placeholder="Tác giả" id="author"  name="author">
        </div>
        <div class="col-sm-1  mb-sm-0 mb-20 h-50px">
            <button class="btn btn-primary btn-user btn-search">
                <i class="fas fa-search"></i>&nbsp; Tìm Kiếm
            </button>
        </div>
        @if (Auth::guard('admin')->user()->hasAnyRoles(['admin','author']))
        <div class="col-sm-1  mb-sm-0 mb-20 h-50px">
            <a href="{{route('blog.create')}}" class="btn btn-success btn-user btn-search">
                <i class="fas fa-user-plus"></i></i>&nbsp; Thêm mới
            </a>
        </div>
        @endif
    </div>


</form>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách bài biết</h6>({{$blogs->total()}} kết quả)
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Ảnh đại diện</th>
                        <th>Tác giả</th>
                        <th>Thiết lập</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Ảnh đại diện</th>
                        <th>Tác giả</th>
                        <th>Thiết lập</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($blogs as $blog)
                    <tr>
                        <td>{{$blog->blog_id}}</td>
                        <td>{{$blog->title}}</td>
                        <td><img src="public/image/blog/{{$blog->thumbnail}}" alt="" width="200"></td>
                        <td>{{$blog->admin->admin_name}}</td>
                        <form action="{{route('blog.destroy',$blog->blog_id)}}" method="post">
                            @csrf
                            @method('delete')
                            <td>
                                <a href="{{route('blog.show',$blog->blog_id)}}"
                                    class="btn btn-primary btn-circle btn-sm" title="Chỉnh sửa">
                                    <i class="fas fa-info"></i>
                                </a>
                                @if(Auth::guard('admin')->user()->hasAnyRoles(['admin','author']))
                                <a href="{{route('blog.edit',$blog->blog_id)}}"
                                    class="btn btn-warning btn-circle btn-sm" title="Chỉnh sửa">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                @endif
                                @if(Auth::guard('admin')->user()->hasAnyRoles(['admin','author']))
                                <button class="btn btn-danger btn-circle btn-sm" title="Xóa">
                                    <i class="fas fa-trash"></i>
                                </button>
                                @endif
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
                {{-- {{ $admins->appends(Request::all())->links() }} --}}
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