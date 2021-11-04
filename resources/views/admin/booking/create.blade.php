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
            <form action="{{route('service.store')}}" class="user" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="">Tên khách hàng</label>
                        <input type="text" class="form-control form-control-user" id="" placeholder="Đơn vị"
                            name="name">
                        <span class="error-message text-danger">{{$errors->first('unit')}}</span></p>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Số điện thoại</label>
                        <input type="number" class="form-control form-control-user" id="" placeholder="Đơn vị"
                            name="name">
                        <span class="error-message text-danger">{{$errors->first('unit')}}</span></p>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Email</label>
                        <input type="email" class="form-control form-control-user" id="" placeholder="Đơn vị"
                            name="name">
                        <span class="error-message text-danger">{{$errors->first('unit')}}</span></p>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Địa chỉ</label>
                        <input type="text" class="form-control form-control-user" id="" placeholder="Đơn vị"
                            name="name">
                        <span class="error-message text-danger">{{$errors->first('unit')}}</span></p>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Ngày đến</label>
                        <input type="date" class="form-control form-control-user" id="" placeholder="Đơn vị"
                            name="t_start">
                        <span class="error-message text-danger">{{$errors->first('unit')}}</span></p>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Ngày đi</label>
                        <input type="date" class="form-control form-control-user" id="" placeholder="Đơn vị"
                            name="t_end">
                        <span class="error-message text-danger">{{$errors->first('unit')}}</span></p>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Loại phòng</label>
                        <select name="room_type_id" id="" class="form-control form-control-user"
                            style="padding: 0px 20px;">
                            @foreach($roomTypes as $roomType)
                            <option class="" value="{{$roomType->room_type_id}}">{{$roomType->room_type_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Số lượng</label>
                        <select name="room_amount" id="select_room_amount" class="form-control form-control-user"
                            style="padding: 0px 20px;">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="room-wrap col-sm-12">
                        <p class="font-weight-bold">Phòng 1</p>
                        <div class=" form-group row">

                            <div class="col-sm-6">
                                <label for="">Người lớn</label>
                                <select name="adult[]" id="" class="form-control form-control-user"
                                    style="padding: 0px 20px;">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Trẻ em</label>
                                <select name="child[]" id="" class="form-control form-control-user"
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
                    <div class="room-wrap col-sm-12">
                        <p class="font-weight-bold">Phòng 2</p>
                        <div class=" form-group row">

                            <div class="col-sm-6">
                                <label for="">Người lớn</label>
                                <select name="adult[]" id="" class="form-control form-control-user"
                                    style="padding: 0px 20px;">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Trẻ em</label>
                                <select name="child[]" id="" class="form-control form-control-user"
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
                    <div class="room-wrap col-sm-12">
                        <p class="font-weight-bold">Phòng 3</p>
                        <div class=" form-group row">

                            <div class="col-sm-6">
                                <label for="">Người lớn</label>
                                <select name="adult[]" id="" class="form-control form-control-user"
                                    style="padding: 0px 20px;">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Trẻ em</label>
                                <select name="child[]" id="" class="form-control form-control-user"
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
                    <div class="room-wrap col-sm-12">
                        <p class="font-weight-bold">Phòng 4</p>
                        <div class=" form-group row">

                            <div class="col-sm-6">
                                <label for="">Người lớn</label>
                                <select name="adult[]" id="" class="form-control form-control-user"
                                    style="padding: 0px 20px;">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Trẻ em</label>
                                <select name="child[]" id="" class="form-control form-control-user"
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
                    <div class="room-wrap col-sm-12">
                        <p class="font-weight-bold">Phòng 5</p>
                        <div class=" form-group row">

                            <div class="col-sm-6">
                                <label for="">Người lớn</label>
                                <select name="adult[]" id="" class="form-control form-control-user"
                                    style="padding: 0px 20px;">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Trẻ em</label>
                                <select name="child[]" id="" class="form-control form-control-user"
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

                <button type="submit" class="btn btn-success btn-user btn-block col-sm-3 mg-0-auto">
                    Thêm mới
                </button>
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
</script>
@endsection