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
        <p>Mã đặt phòng: {{$booking->booking_id}}.&nbsp;&nbsp;&nbsp;Tên khách hàng:
            {{$booking->guest->guest_name}}.&nbsp;&nbsp;&nbsp; Ngày đến:
            {{date('d/m/Y',strtotime($booking->checkin))}}.&nbsp;&nbsp;&nbsp;Ngày đi:
            {{date('d/m/Y',strtotime($booking->checkout))}}</p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Thứ tự</th>
                        <th>Loại phòng</th>
                        <th>Người lớn</th>
                        <th>Trẻ em</th>
                        <th>Ngày tạo</th>
                        <th>Ngày sửa</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Thứ tự</th>
                        <th>Loại phòng</th>
                        <th>Người lớn</th>
                        <th>Trẻ em</th>
                        <th>Ngày tạo</th>
                        <th>Ngày sửa</th>
                        <th>Trạng thái</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($bookingDetails as $bookingDetail)
                    <tr>
                        <td>{{$bookingDetail->no}}</td>
                        <td>{{$bookingDetail->roomTypes->room_type_name}}</td>
                        <td>{{$bookingDetail->roomAdult}}</td>
                        <td>{{$bookingDetail->roomChild}}</td>
                        <td>{{$bookingDetail->created_at}}</td>
                        <td>{{$bookingDetail->updated_at}}</td>
                        {{-- kiểm tra từng chi tiết đặt phòng (kiểm tra loại phòng và thời gian) --}}
                        <td>
                            <form action="{{route('check',$bookingDetail->booking_detail_id)}}" method="get">
                                <button <?php if($bookingDetail->status ==1 || $bookingDetail->status == 4 || $booking->status ==3){
                                    echo 'disabled';
                                    }
                                    ?>>Kiểm tra</button>
                                @if ($bookingDetail->status == 2 && $booking->status !=3)
                                <span class="text-success ">Hợp lệ</span>
                                {{-- @elseif ($bookingDetail->status == 4)
                                <span class="text-danger ">Không hợp lệ</span> --}}
                                @endif
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form action="{{route('approveBooking',$booking->booking_id)}}" method="get">
            <input type="hidden" name="booking_id" value="{{$booking->booking_id}}">
            <input type="hidden" name="admin_id" value="{{Auth::guard('admin')->user()->admin_id}}">
            <?php 
            if($booking->status ==0 ){
            ?><button <?php if($valid==0){ echo 'disabled' ; } ?>
                class="btn btn-success btn-user btn-block col-sm-3 mg-0-auto ">Duyệt đơn này</button>
            <?php }?>

        </form>

        <a href="{{route('booking.index')}}" class="btn btn-primary btn-user btn-block col-sm-3 mg-0-auto">
            Quay lại
        </a>

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

    p {
        margin: 0;
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