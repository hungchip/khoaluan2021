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
                <h1 class="h4 text-gray-900 mb-4">Chỉnh sửa đặt phòng {{$booking->booking_id}} </h1>
            </div>
            <form action="{{route('booking.update',$booking->booking_id)}}" class="user" method="post">
                @method('put')
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="name">Tên khách hàng</label>
                        <input type="text" class="form-control form-control-user" id="name"
                            value="{{$guest->guest_name}}" name="name">
                        <span class="error-message text-danger">{{$errors->first('name')}}</span>
                    </div>
                    <div class="col-sm-3">
                        <label for="phone">Số điện thoại</label>
                        <input type="tel" pattern="[0-9]*" class="form-control form-control-user" id="phone"
                            value="{{$guest->guest_phone}}" name="phone">
                        <span class="error-message text-danger">{{$errors->first('phone')}}</span>
                    </div>
                    <div class="col-sm-3">
                        <label for="idcard">CMND</label>
                        <input type="tel" pattern="[0-9]*" class="form-control form-control-user" id="idcard"
                            value="{{$guest->guest_idcard}}" name="idcard">
                        <span class="error-message text-danger">{{$errors->first('idcard')}}</span>
                    </div>
                    <div class="col-sm-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control form-control-user" id="email"
                            value="{{$guest->guest_email}}" name="email">
                        <span class="error-message text-danger">{{$errors->first('email')}}</span>
                    </div>
                    <div class="col-sm-6">
                        <label for="address">Địa chỉ</label>
                        <input type="text" class="form-control form-control-user" id="address"
                            value="{{$guest->guest_address}}" name="address">
                        <span class="error-message text-danger">{{$errors->first('address')}}</span>
                    </div>
                    <div class="col-sm-12">
                        <div class="t-datepicker datepicker-2">
                            <div class="col-sm-6 clearfix">
                                <p for="">Ngày đến <strong>{{date('d-m-Y',strtotime($booking->checkin))}}</strong></p>
                                <div class="t-check-in t-picker-only form-control ">
                                    <div class="t-dates t-date-check-in ">
                                        <label class="t-date-info-title">Check In</label>
                                    </div>
                                    <input type="hidden" class="t-input-check-in " value="" name="start">
                                    <div class="t-datepicker-day" style="display: block;">
                                        <table class="t-table-condensed">
                                            <!-- Date theme calendar -->
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 clearfix">
                                <p for="">Ngày đi <strong>{{date('d-m-Y',strtotime($booking->checkout))}}</strong></p>
                                <div class="t-check-out t-picker-only form-control ">
                                    <div class="t-dates t-date-check-out">
                                        <label class="t-date-info-title">Check Out</label>
                                    </div>
                                    <input type="hidden" id="input-out" class="t-input-check-out" value="" name="end">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label for="select_room_amount">Số lượng</label>
                        <select name="room_amount" id="select_room_amount" class="form-control form-control-user"
                            style="padding: 0px 20px;">
                            @for($i = 0; $i < 5; $i++) <option value="{{$i+1}}" {{($i+1==$booking->amount) ? 'selected'
                                : '' }}>{{$i+1}}</option>
                                @endfor
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="deposit">Tiền cọc (VNĐ)</label>
                        <input type="number" class="form-control form-control-user" id="deposit" value="{{$booking->deposit}}"
                            name="deposit">
                    </div>
                    <div class="col-sm-1">
                        <label for="depositStatus">Đặt cọc</label>
                        <input type="checkbox" class="form-control form-control-user" id="depositStatus"
                            name="deposit_status" >
                    </div>
                    <div class="col-sm-3">
                        <label for="creater_id">ID người tạo</label>
                        <input type="text" readonly class="form-control form-control-user" id="creater_id" 
                            name="creater_id" value="{{($booking->creater_id == 0) ? 'Khách' : $booking->creater_id}}">
                    </div>
                    <div class="col-sm-3">
                        <label for="edittoe_id">ID người Sửa</label>
                        <input type="text" readonly class="form-control form-control-user" id="edittoe_id" 
                            name="edittoe_id" value="{{Auth::guard('admin')->user()->admin_id}}">
                    </div>
                    <div class="room-wrap col-sm-12">
                        @for($i = 0; $i < 5; $i++) <div class="room-item"
                            style="{{isset($bookingDetails[$i]) ? ($bookingDetails[$i]->no == $i + 1) ? 'display: block' : 'display:none': '' }}">
                            <p class="font-weight-bold">Phòng {{$i+1}}</p>
                            <div class=" form-group row">
                                <div class="col-sm-4">
                                    <label for="room-type-{{$i}}">Loại phòng</label>
                                    <select name="room_type_id[]" id="room-type-{{$i}}"
                                        class="form-control form-control-user" style="padding: 0px 20px;">
                                        @foreach($roomTypes as $roomType)
                                        <option class="" value="{{$roomType->room_type_id}}" <?php
                                            if(isset($bookingDetails[$i])) { if($bookingDetails[$i]->room_type_id ==
                                            $roomType->room_type_id){
                                            echo 'selected';
                                            }
                                            } ?>>
                                            {{$roomType->room_type_name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="room-child-{{$i}}">Người lớn</label>
                                    <select name="room_adult[]" id="room-adult-{{$i}}"
                                        class="form-control form-control-user" style="padding: 0px 20px;">

                                        @for($j = 0; $j < 5; $j++) <option class="" value="{{$j+1}}" <?php
                                            if(isset($bookingDetails[$i])) { if($bookingDetails[$i]->roomAdult == $j+1){
                                            echo 'selected';
                                            }
                                            } ?>>
                                            {{$j+1}}

                                            </option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="room-child-{{$i}}">Trẻ em</label>
                                    <select name="room_child[]" id="room-child-{{$i}}"
                                        class="form-control form-control-user" style="padding: 0px 20px;">
                                        @for($k = 0; $k < 5; $k++) <option class="" value="{{$k+1}}" <?php
                                            if(isset($bookingDetails[$i])) { if($bookingDetails[$i]->roomChild == $k+1){
                                            echo 'selected';
                                            }
                                            } ?>>
                                            {{$k+1}}
                                            </option>
                                            @endfor
                                    </select>
                                </div>
                            </div>
                    </div>
                    @endfor

                </div>

        </div>

        <div class="col-sm-6">
            <p for="">Phương thức thanh toán</p>
            <div class="payment-method">
                <p>
                    <input type="radio" name="paymentMethod" value="credit" id="credit_card">
                    <label for="credit_card">Credit card</label>
                </p>
                <p>
                    <input type="radio" name="paymentMethod" value="bank" id="bank_transfer">
                    <label for="bank_transfer">Bank transfer</label>
                </p>
                <p>
                    <input type="radio" name="paymentMethod" value="payOnArrival" checked id="pay_on_arrival">
                    <label for="pay_on_arrival">Pay On Arrival</label>
                </p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="price-detail">
                <p class="deposite-notice">Tổng giá</p>
                <h3 class="deposite-price"> VND</h3>
                {{--
                <hr>
                <p class="total-notice">Total price</p>
                <h3 class="total-price">$1,000,</h3> --}}
                {{-- <p class="detail"><a href="">Detail</a></p> --}}
            </div>
        </div>

        @if($booking->status != -1)
        <button type="submit" class="btn btn-success btn-user btn-block col-sm-3 mg-0-auto">
            Cập nhật
        </button>
        @endif
        <a href="{{route('booking.index')}}" class="btn btn-primary btn-user btn-block col-sm-3 mg-0-auto">
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
        border-radius: 0;
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

@section('js')
<script>
    $('#select_room_amount').on('change', function() {
        var amount = $(this).val();
        var roomItem = document.getElementsByClassName('room-wrap');
        for (let i = 0; i < roomItem.length; i++) {
            if (i < amount) {
                roomItem[i].style.display = 'block';
            } else {
                roomItem[i].style.display = 'none';
            }
        }
    });
    function validateForm() {
        let x = document.forms['formBooking']['t_start'].value;
        let y = document.forms['formBooking']['t_end'].value;
        if (x == "null" || y == "null") {
            alert("Vui lòng điền đầy đủ ngày đến và đi");
            return false;
        }
    }
    $('#test-btn').on('click', () => {
        $('#address').val('địa chỉ gì đó');
        $('#input-out').val('Vũ Việt Hưng');
    });

    // $('#')
</script>
@endsection