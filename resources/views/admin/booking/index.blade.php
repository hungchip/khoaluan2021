@extends('admin.default.master')
@section('content')

<form action="{{route('booking.index')}}" method="get" class="user relative mb-30">
    <div class="container-fluid">
        <div class="form-group row">
            <div class="col-sm-2 mb-20 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="" placeholder="mã đặt phòng"
                    name="bookingID">
            </div>
            <div class="col-sm-2 mb-20 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="" placeholder="Email" name="email">
            </div>
            <div class="col-sm-2 mb-20 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="" placeholder="Tên" name="name">
            </div>
            <div class="col-sm-2 mb-20 mb-sm-0">
                <input type="number" pattern="[0-9]*" class="form-control form-control-user" id="phone"
                    placeholder="Số điện thoại" value="{{old('phone')}}" name="phone">
            </div>
            <div class="col-sm-2 mb-20 mb-sm-0">
                <input type="number" pattern="[0-9]*" class="form-control form-control-user" id="idcard"
                    placeholder="CMND/Căn cước" value="{{old('idcard')}}" name="idcard">
            </div>
            <div class="col-sm-2 mb-20 mb-sm-0">
                <select name="status" id="status" class="form-control form-control-user"
                    style="padding: 0px 20px; height:50px">
                    <option value="" selected>Chọn trạng thái</option>
                    <option value="0">Chờ duyệt</option>
                    <option value="1">Đã duyệt</option>
                    <option value="3">Đã hủy</option>
                </select>
            </div>
            <div class="col-sm-1  mb-sm-0 mb-20 h-50px">
                <button class="btn btn-primary btn-user btn-search">
                    <i class="fas fa-search"></i>&nbsp; Tìm Kiếm
                </button>
            </div>
            <div class="col-sm-1  mb-sm-0 mb-20 h-50px">
                <a href="{{route('booking.create')}}" class="btn btn-success btn-user btn-search">
                    <i class="fas fa-user-plus"></i></i>&nbsp; Đặt phòng
                </a>
            </div>
        </div>
    </div>

</form>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách các đặt phòng</h6> ({{$bookings->total()}} kết quả)
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Ngày đến</th>
                        <th>Ngày đi</th>
                        <th>Số lượng phòng</th>
                        <th>Ngày tạo</th>
                        <th>Tiền cọc</th>
                        <th>Trạng thái</th>
                        <th>Thiết lập</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Ngày đến</th>
                        <th>Ngày đi</th>
                        <th>Số lượng phòng</th>
                        <th>Ngày tạo</th>
                        <th>Tiền cọc</th>
                        <th>Trạng thái</th>
                        <th>Thiết lập</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{$booking->booking_id}}</td>
                        <td>{{$booking->guest->guest_name}}</td>
                        <td>{{$booking->guest->guest_email}}</td>
                        <td>{{date('d/m/Y', strtotime($booking->checkin))}}</td>
                        <td>{{date('d/m/Y', strtotime($booking->checkout))}}</td>
                        <td>{{$booking->amount}}</td>
                        <td>{{$booking->created_at->format('d-m-Y H:i:s')}}</td>
                        <td>{{number_format($booking->deposit)}} VNĐ &nbsp; <input onclick="return false;" type="checkbox" {{($booking->deposit_status ==1
                            ) ? 'checked' : '' }}></td>
                        <td>
                            {{-- 1. chờ duyệt/ 2. đã duyệt/ 3.đã hủy --}}
                            @if($booking->status == 0)
                            <span
                                class="{{(strtotime($booking->created_at) + 172800 <= time()) ? 'btn-danger' : 'btn-warning'}} btn-sm">Chờ
                                duyệt</span>
                            @elseif ($booking->status == 1)
                            <span class="btn-success btn-sm">Đã duyệt</span>
                            @elseif($booking->status == 3)
                            <span class="btn-danger btn-sm">Đã hủy</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{route('booking.destroy',$booking->booking_id)}}" method="post">
                                @csrf
                                @method('delete')
                                {{-- xem chi tiết --}}
                                <a href="{{route('booking.show',$booking->booking_id)}}"
                                    class="btn btn-primary btn-circle btn-sm" title="Chi tiết">
                                    <i class="fas fa-info"></i>
                                </a>
                                {{-- chỉnh sửa --}}
                                <a href="{{route('booking.edit',$booking->booking_id)}}" class="btn btn-warning btn-circle btn-sm <?php
                                if(($booking->status == 1) || (strtotime($booking->created_at) + 172800 <= time()) || ($booking->status == 3) || ($booking->status == 2)){
                                    echo 'disabled';
                                }
                                ?>" title="Sửa đặt phòng">
                                    <i class="far fa-file-alt"></i>
                                </a>
                                {{-- hủy --}}
                                <button {{($booking->status !=0) ? 'disabled' : ''}} class="btn btn-danger btn-circle
                                    btn-sm" title="Hủy đặt phòng">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                {{ $bookings->appends(Request::all())->links() }}
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

    .form-group.row>div {
        margin-bottom: 30px;

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