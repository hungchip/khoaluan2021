@extends('admin.default.master')
@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="">
            <h5 class="m-0 font-weight-bold text-primary">Danh sách các phòng</h5>
        </div>
        <div class="list-icon">
            <div class="text-primary icon-item"><i class="fas fa-home"></i> Tổng phòng ({{count($rooms)}}) </div>
            <div class="text-danger icon-item"><i class="fas fa-bed"></i> Phòng đang có khách ({{count($checkedRooms)}}) </div>
            <div class="text-success icon-item"><i class="fas fa-bed"></i> Phòng trống ({{count($emptyRooms)}}) </div>
            <div class="text-warning icon-item"><i class="fas fa-calendar-alt"></i> Phòng đã đặt () </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <td>Loại phòng</td>
                    </tr>
                </thead>
                <tfoot>

                </tfoot>
                <tbody>
                    @foreach($roomTypes as $roomType)
                    <tr>
                        <td style="width: 200px; "><b>{{$roomType->room_type_name}}</b></td>

                        @foreach($rooms as $room)
                        {{-- 0: trống/ 1: đã đặt/ 2: đang có khách --}}
                        @if($room->room_type_id == $roomType->room_type_id)
                        <td style="color:#fff;" class="
                        <?php if($room->room_status == 2) {
                            echo 'bg-yellow';
                        } elseif($room->room_status == 1) {
                            echo 'bg-red';
                        } else {
                            echo 'bg-green';
                        }
                        ?>">
                            <form action="">
                                <div style="">
                                    <h6 class="text-center font-weight-bold text-uppercase" style="">
                                        {{$room->room_number}}</h6>
                                </div>
                                {{-- nhận phòng  --}}
                                <a href="" class="btn btn-success btn-circle btn-sm 
                                <?php 
                                if($room->room_status == 1){
                                    echo 'disabled';
                                }
                                ?>" title="Nhận phòng"><i class="fas fa-check-circle"></i></a>
                                {{-- trả phòng  --}}
                                <a href="" class="btn btn-danger btn-circle btn-sm <?php 
                                if($room->room_status == 0){
                                    echo 'disabled';
                                }
                                ?>" title="Trả phòng"><i class="fas fa-sign-out-alt"></i></i></a>
                            </form>
                        </td>
                        @endif

                        @endforeach
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

    .card-header.py-3 {
        display: flex;
        justify-content: space-between;
    }

    .list-icon {
        display: flex;
    }

    .list-icon>* {
        margin-left: 20px;
    }

    .bg-green {
        background-color: #28a745;
    }
    .bg-yellow {
        background-color: #ffc107;
    }
    .bg-red {
        background-color: #dc3545;
    }

    .btn-circle {
        border: 1px solid #fff;
    }

    .icon-item {
        position: relative;
        cursor: pointer;
    }

    .icon-item::after{
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        bottom: -3px;
        z-index: 2;
        content: '';
        display: block;
        width: 0%;
        height: 2px;
        background:#aaa;
        transition: all ease-in-out .3s;
    }

    .icon-item:hover::after{
        width: 50%;
    }
</style>
@endsection

@section('js')
<script src="">


</script>
@endsection