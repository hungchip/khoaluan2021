@extends('hotel.booking')

@section('form-booking')
<form action="{{route('showStepTwo')}}" onSubmit="return validateForm()"  class="form-ajax" name="formBooking">
    <div class="booking-step">
        <div class="booking-step-title current">
            1. <span>Chọn ngày</span>
        </div>
        <div class="booking-step-title ">
            2. <span>Chọn phòng</span>
        </div>
        <div class="booking-step-title ">
            3. <span>Chọn phương thức thanh toán</span>
        </div>
        <div class="booking-step-title ">
            4. <span>Hoàn tất</span>
        </div>
    </div>
    <div class="booking-side">
        <h4>Đặt phòng</h4>
        <label for="">Số phòng</label>
        <select name="room_amount" id="select_room_amount">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <div class="rooms-wrapper">
            <div class="room-item room-item-1">
                <p>Phòng 1</p>
                <div class="guest-col">
                    <label for="">Người lớn</label>
                    <select name="room_adult_[]" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="guest-col">
                    <label for="">Trẻ em</label>
                    <select name="room_child_[]" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="room-item room-item-2">
                <p>Phòng 2</p>
                <div class="guest-col">
                    <label for="">Người lớn</label>
                    <select name="room_adult_[]" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="guest-col">
                    <label for="">Trẻ em</label>
                    <select name="room_child_[]" id="">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                    </select>
                </div>
            </div>
            <div class="room-item room-item-3">
                <p>Phòng 3</p>
                <div class="guest-col">
                    <label for="">Người lớn</label>
                    <select name="room_adult_[]" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="guest-col">
                    <label for="">Trẻ em</label>
                    <select name="room_child_[]" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="room-item room-item-4">
                <p>Phòng 4</p>
                <div class="guest-col">
                    <label for="">Người lớn</label>
                    <select name="room_adult_[]" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="guest-col">
                    <label for="">Trẻ em</label>
                    <select name="room_child_[]" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="room-item room-item-5">
                <p>Phòng 5</p>
                <div class="guest-col">
                    <label for="">Người lớn</label>
                    <select name="room_adult_[]" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="guest-col">
                    <label for="">Trẻ em</label>
                    <select name="room_child_[]" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
        </div>
        <button class="btn-search">Search</button>
    </div>
    <div class="booking-main">
        <div class="col-12">
            <p><span class="error-message text-danger">{{$errors->first('t_start')}}</span></p>
        </div>
        <div class="t-datepicker datepicker-2">
            <div class="t-check-in t-picker-only">
                <div class="t-dates t-date-check-in ">
                    <label class="t-date-info-title">Check In</label>
                </div>
                <input type="hidden" class="t-input-check-in" value="" name="start">
                <div class="t-datepicker-day" style="display: block;">
                    <table class="t-table-condensed">
                        <!-- Date theme calendar -->
                    </table>
                </div>
            </div>
            <div class="t-check-out t-picker-only">
                <div class="t-dates t-date-check-out">
                    <label class="t-date-info-title">Check Out</label>
                </div>
                <input type="hidden" class="t-input-check-out" value="" name="end">
            </div>

        </div>

    </div>
    <div class="clearfix">

    </div>

</form>
@endsection

@section('js')
<script>
    function validateForm() {
        let x = document.forms['formBooking']['t_start'].value;
        let y = document.forms['formBooking']['t_end'].value;
        if(x == "null" || y == "null") {
            alert("Vui lòng điền đầy đủ ngày đến và đi");
            return false;
        }
    }
</script>
@endsection