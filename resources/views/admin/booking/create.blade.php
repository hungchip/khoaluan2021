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
                <h1 class="h4 text-gray-900 mb-4">Tạo đặt phòng</h1>
            </div>
            <form action="{{route('storeBooking')}}" class="user" method="post" name="formBooking"
                onSubmit="return validateForm()">
                {{-- @method('') --}}
                @csrf
                <input type="hidden" name="flag" value="1">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="name">Tên khách hàng</label>
                        <input type="text" class="form-control form-control-user" id="name" value="{{old('name')}}"
                            name="name">
                        <span class="error-message text-danger">{{$errors->first('name')}}</span></p>
                    </div>
                    <div class="col-sm-3">
                        <label for="phone">Số điện thoại</label>
                        <input type="tel" pattern="[0-9]*" class="form-control form-control-user" id="phone"
                            value="{{old('phone')}}" name="phone">
                        <span class="error-message text-danger">{{$errors->first('phone')}}</span></p>
                    </div>
                    <div class="col-sm-3">
                        <label for="idcard">CMND</label>
                        <input type="tel" pattern="[0-9]*" class="form-control form-control-user" id="idcard"
                            value="{{old('idcard')}}" name="idcard">
                        <span class="error-message text-danger">{{$errors->first('idcard')}}</span>
                    </div>
                    <div class="col-sm-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control form-control-user" id="email" value="{{old('email')}}"
                            name="email">
                        <span class="error-message text-danger">{{$errors->first('email')}}</span></p>
                    </div>
                    <div class="col-sm-6">
                        <label for="address">Địa chỉ</label>
                        <input type="text" class="form-control form-control-user" id="address"
                            value="{{old('address')}}" name="address">
                        <span class="error-message text-danger">{{$errors->first('address')}}</span></p>
                    </div>
                    <div class="col-sm-12">
                        <div class="t-datepicker datepicker-2">
                            <div class="col-sm-6 clearfix">
                                <label for="">Ngày đến</label>
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
                                <label for="">Ngày đi</label>
                                <div class="t-check-out t-picker-only form-control ">
                                    <div class="t-dates t-date-check-out">
                                        <label class="t-date-info-title">Check Out</label>
                                    </div>
                                    <input type="hidden" class="t-input-check-out" value="" name="end">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Số lượng</label>
                        <select name="room_amount" id="select_room_amount" class="form-control form-control-user"
                            style="padding: 0px 20px;" onchange="getval(this);">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="room-wrap col-sm-12">
                        <div class="room-item">
                            <p class="font-weight-bold">Phòng 1</p>
                            <div class=" form-group row">
                                <div class="col-sm-4">
                                    <label for="">Loại phòng</label>
                                    <select name="room_type_id[]" id="" class="form-control form-control-user room-type"
                                        style="padding: 0px 20px;" onchange="getval(this);">
                                        @foreach($roomTypes as $roomType)
                                        <option class="" value="{{$roomType->room_type_id}}">
                                            {{$roomType->room_type_name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Người lớn</label>
                                    <select name="room_adult[]" id="" class="form-control form-control-user "
                                        style="padding: 0px 20px;">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Trẻ em</label>
                                    <select name="room_child[]" id="" class="form-control form-control-user"
                                        style="padding: 0px 20px;">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="room-item">
                            <p class="font-weight-bold">Phòng 2</p>
                            <div class=" form-group row">
                                <div class="col-sm-4">
                                    <label for="">Loại phòng</label>
                                    <select name="room_type_id[]" id="" class="form-control form-control-user room-type"
                                        style="padding: 0px 20px;">
                                        @foreach($roomTypes as $roomType)
                                        <option class="" value="{{$roomType->room_type_id}}">
                                            {{$roomType->room_type_name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Người lớn</label>
                                    <select name="room_adult[]" id="" class="form-control form-control-user"
                                        style="padding: 0px 20px;">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Trẻ em</label>
                                    <select name="room_child[]" id="" class="form-control form-control-user"
                                        style="padding: 0px 20px;">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="room-item">
                            <p class="font-weight-bold">Phòng 3</p>
                            <div class=" form-group row">
                                <div class="col-sm-4">
                                    <label for="">Loại phòng</label>
                                    <select name="room_type_id[]" id="" class="form-control form-control-user room-type"
                                        style="padding: 0px 20px;">
                                        @foreach($roomTypes as $roomType)
                                        <option class="" value="{{$roomType->room_type_id}}">
                                            {{$roomType->room_type_name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Người lớn</label>
                                    <select name="room_adult[]" id="" class="form-control form-control-user"
                                        style="padding: 0px 20px;">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Trẻ em</label>
                                    <select name="room_child[]" id="" class="form-control form-control-user"
                                        style="padding: 0px 20px;">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="room-item">
                            <p class="font-weight-bold">Phòng 4</p>
                            <div class=" form-group row">
                                <div class="col-sm-4">
                                    <label for="">Loại phòng</label>
                                    <select name="room_type_id[]" id="" class="form-control form-control-user room-type"
                                        style="padding: 0px 20px;">
                                        @foreach($roomTypes as $roomType)
                                        <option class="" value="{{$roomType->room_type_id}}">
                                            {{$roomType->room_type_name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Người lớn</label>
                                    <select name="room_adult[]" id="" class="form-control form-control-user"
                                        style="padding: 0px 20px;">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Trẻ em</label>
                                    <select name="room_child[]" id="" class="form-control form-control-user"
                                        style="padding: 0px 20px;">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="room-item">
                            <p class="font-weight-bold">Phòng 5</p>
                            <div class=" form-group row">
                                <div class="col-sm-4">
                                    <label for="">Loại phòng</label>
                                    <select name="room_type_id[]" id="" class="form-control form-control-user room-type"
                                        style="padding: 0px 20px;">
                                        @foreach($roomTypes as $roomType)
                                        <option class="" value="{{$roomType->room_type_id}}">
                                            {{$roomType->room_type_name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Người lớn</label>
                                    <select name="room_adult[]" id="" class="form-control form-control-user"
                                        style="padding: 0px 20px;">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Trẻ em</label>
                                    <select name="room_child[]" id="" class="form-control form-control-user"
                                        style="padding: 0px 20px;">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="">Phương thức thanh toán</label>
                        <div class="payment-method">
                            <p>
                                <input type="radio" name="paymentMethod" value="credit" id="credit_card">
                                <label for="credit_card">Thẻ tín dụng</label>
                            </p>
                            <p>
                                <input type="radio" name="paymentMethod" value="bank" id="bank_transfer">
                                <label for="bank_transfer">Chuyển khoản ngân hàng</label>
                            </p>
                            <p>
                                <input type="radio" name="paymentMethod" value="payOnArrival" checked
                                    id="pay_on_arrival">
                                <label for="pay_on_arrival">Thanh toán khi đến nhận phòng</label>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="price-detail">
                            {{-- <p class="deposite-notice">Tổng giá</p>
                            <h3 class="deposite-price"> 100000 VND</h3> --}}
                            {{--
                            <hr>
                            <p class="total-notice">Total price</p>
                            <h3 class="total-price">$1,000,</h3> --}}
                            {{-- <p class="detail"><a href="">Detail</a></p> --}}
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-user btn-block col-sm-3 mg-0-auto">
                    Thêm mới
                </button>
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

    p {
        margin: 0;
    }
</style>
@endsection

@section('js')
<script>
    function validateForm() {
        let x = document.forms['formBooking']['t_start'].value;
        let y = document.forms['formBooking']['t_end'].value;
        if (x == "null" || y == "null") {
            alert("Vui lòng điền đầy đủ ngày đến và đi");
            return false;
        }
    }
    function getval(sel) {
        amount = $('#select_room_amount').val(); //get value by jquery
        // roomTypes = $('.room-type');
        
        roomItems = document.getElementsByClassName('room-item');
        roomTypes = document.getElementsByClassName('room-type');
        for (let i = 0; i < roomItems.length; i++) {
            if(roomItems[i].style.display == 'block'){
                console.log(roomTypes[i].value); //get value by js
            }
        }
    }

</script>
@endsection