@extends('admin.default.master')
@section('content')
<!-- Page Heading -->
{{-- <h1 class="h3 mb-2 text-dark">Tables</h1> --}}
{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. --}}
    {{-- For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p> --}}

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Chi tiết đặt phòng</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Thứ tự</th>
                        <th>Loại phòng</th>
                        <th>Tên khách hàng</th>
                        <th>Ngày tạo</th>
                        <th>Người lớn</th>
                        <th>Trẻ em</th>
                        <th>Ngày đến</th>
                        <th>Ngày đi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Thứ tự</th>
                        <th>Loại phòng</th>
                        <th>Tên khách hàng</th>
                        <th>Ngày tạo</th>
                        <th>Người lớn</th>
                        <th>Trẻ em</th>

                        <th>Ngày đến</th>
                        <th>Ngày đi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <input type="hidden" name="" id="" value="{{$count=0}}">
                    @foreach($bookingDetails as $bookingDetail)
                    <tr>
                        <td>{{++$count}}</td>
                        <td>{{$bookingDetail->roomTypes->room_type_name}}</td>
                        <td>{{$bookingDetail->booking->guest->guest_name}}</td>
                        <td>{{$bookingDetail->created_at}}</td>
                        <td>{{$bookingDetail->roomAdult}}</td>
                        <td>{{$bookingDetail->roomChild}}</td>

                        <td>{{date('d/m/y', strtotime($bookingDetail->booking->checkin))}}</td>
                        <td>{{date('d/m/y', strtotime($bookingDetail->booking->checkout))}}</td>
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