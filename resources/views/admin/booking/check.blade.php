@extends('admin.default.master')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">

        <div class="curent-room">
            <h6 class="m-0 font-weight-bold text-primary">Đặt phòng hiện tại</h6> 
            <span class="curent-room-item">Loại phòng: {{$bookingDetail->roomTypes->room_type_name}}</span>
            <span class="curent-room-item">Ngày đến: {{date('d/m/Y',
                strtotime($bookingDetail->booking->checkin))}}</span>
            <span class="curent-room-item">Ngày đi: {{date('d/m/Y',
                strtotime($bookingDetail->booking->checkout))}}</span>
            <span class="curent-room-item">Tổng số phòng của loại phòng này: {{count($rooms)}}</span>
        </div>
        <?php 
        if($bookingDetail->status == 2){
            echo '<h3 class="text-success"> Hợp lệ</h3>';
        }else {
            echo '<h3 class="text-danger"> Không hợp lệ</h3>';
        }
        ?>
        
        <h6 class="m-0 font-weight-bold text-primary">Danh sách các đặt phòng đã duyệt</h6>
        {{-- ({{ (isset($bookingDetails)) ? (count($bookingDetails)) : 0)}} kết quả) --}}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Loại phòng</th>
                        <th>Ngày đến</th>
                        <th>Ngày đi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Loại phòng</th>
                        <th>Ngày đến</th>
                        <th>Ngày đi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if(isset($bookingDetails))
                    @foreach($bookingDetails as $BookingDetail)
                    <tr>
                        <td>{{$BookingDetail->booking_id}}</td>
                        <td>{{$BookingDetail->roomTypes->room_type_name}}</td>
                        <td>{{date('d/m/Y', strtotime($BookingDetail->booking->checkin))}}</td>
                        <td>{{date('d/m/Y', strtotime($BookingDetail->booking->checkout))}}</td>
                    </tr>
                    @endforeach
                    @endif
                    
                </tbody>
            </table>

        </div>
        <a style="margin: 0 auto;" href="{{route('booking.show',$bookingDetail->booking->booking_id)}}"
            class="btn btn-primary btn-user btn-block col-sm-3 mg-0-auto">
            Quay lại
        </a>
    </div>
</div>

@endsection

@section('css')
<style>
    .relative {
        position: relative;
    }

    .mg-0-auto {
        margin: 0 auto;
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

    .curent-room-item {
        margin-right: 30px;
    }

    .curent-room {
        margin-bottom: 30px;
    }
</style>
@endsection