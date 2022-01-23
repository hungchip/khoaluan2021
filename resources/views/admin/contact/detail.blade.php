@extends('admin.default.master')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="p-3">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Chi tiết liên hệ </h1>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <h4 class=" mb-2 text-dark">Tên người gửi</h4>
                    <p>{{$contact->contact_name}}</p>
                </div>
                <div class="col-md-4">
                    <h4 class=" mb-2 text-dark">Email</h4>
                    <p>{{$contact->contact_email}}</p>
                </div>
                <div class="col-md-4">
                    <h4 class=" mb-2 text-dark">Số điện thoại</h4>
                    <p>{{$contact->contact_phone}}</p>
                </div>
                <div class="col-md-12">
                    <h4 class=" mb-2 text-dark">Nội dung</h4>
                    <p>{{$contact->contact_content}}</p>
                </div>
            </div>

            <a href="{{route('adcontact.index')}}" class="btn btn-primary btn-user btn-block col-sm-3 mg-0-auto">
                Quay lại
            </a>
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