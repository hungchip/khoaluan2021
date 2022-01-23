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

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách liên hệ</h6>({{$contacts->total()}} kết quả)
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Ngày gửi</th>
                        <th>Trạng thái</th>
                        <th>Thiết lập</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Ngày gửi</th>
                        <th>Trạng thái</th>
                        <th>Thiết lập</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->contact_id}}</td>
                        <td>{{$contact->contact_name}}</td>
                        <td>{{$contact->contact_email}}</td>
                        <td>{{date('d-m-Y H:m:s', strtotime($contact->created_at))}}</td>
                        <td>
                            @if($contact->status == 0)
                            Chưa đọc
                            @else
                            Đã đọc
                            @endif
                        </td>
                        <td>
                            <form action="{{route('adcontact.destroy',$contact->contact_id)}}" method="post">
                                @csrf
                                @method('delete')

                                <a href="{{route('adcontact.show',$contact->contact_id)}}"
                                    class="btn btn-primary btn-circle btn-sm" title="Chi tiết">
                                    <i class="fas fa-info"></i>
                                </a>
                                @if (Auth::guard('admin')->user()->hasRole('admin'))
                                {{-- <a href="{{route('adcontact.edit',$contact->contact_id)}}"
                                    class="btn btn-warning btn-circle btn-sm" title="Chỉnh sửa">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-circle btn-sm" title="Xóa">
                                    <i class="fas fa-trash"></i>
                                </button> --}}
                                @endif

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                {{ $contacts->appends(Request::all())->links() }}
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