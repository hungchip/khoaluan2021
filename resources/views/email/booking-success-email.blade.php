<div style="background-color:white;padding:20px;max-width:860px;margin:auto">
    <div style="width:100%;height:80px;line-height:80px">
        <div style="text-align:center">
            <img src="https://ci3.googleusercontent.com/proxy/DptNdURLOsHuLUciAGi8J3bCZpfPBRSq_ckClrh52R7JIuaousYGAUmVm0gS9K3ynBY_-bMWFUFHXJxBGQ6hPQ5P4S7lfMXM4hzMojOL10MsBgaoXYRvWsou=s0-d-e1-ft#https://static01-cdn.oneinventory.com/images/2019/03/15517836387327.png"
                alt="" height="40" class="CToWUd">
            {{-- <img src="{{asset('public/hotel/images/logoae.png')}}" alt="test ảnh" height="40" class="CToWUd"> --}}
        </div>
    </div>
    <p><strong>Xác nhận đặt phòng thành công !!!</strong></p>
    <p>Xin chào <strong>{{$booking->guest->guest_name}}</strong> </p>
    <p>Cảm ơn bạn đã chọn <strong>Khách Sạn Anh Em Hotel</strong> của chúng tôi cho kỳ nghỉ sắp tới. Yêu cầu đặt
        phòng của bạn đã được xác nhận. Thông tin đặt phòng như sau:
    </p>
    <table cellpadding="4" cellspacing="0" border="0">
        <tbody>
            <tr>
                <td style="white-space:nowrap;width:25%;vertical-align:top;text-align:left;font-weight:bold"> Mã đặt
                    phòng: </td>
                <td style="vertical-align:top;width:25%;text-align:left"> {{$booking->booking_id}} </td>
                <td style="white-space:nowrap;width:25%;vertical-align:top;text-align:left;font-weight:bold"> Họ tên
                    khách hàng: </td>
                <td style="vertical-align:top;width:25%;text-align:left">{{$booking->guest->guest_name}} </td>
            </tr>
            <tr>
                <td style="white-space:nowrap;width:25%;vertical-align:top;text-align:left;font-weight:bold">Ngày, giờ
                    đặt phòng: </td>
                <td style="vertical-align:top;text-align:left"> {{date('d/m/y H:i:s', strtotime($booking->created_at))}}
                </td>
                <td style="white-space:nowrap;width:25%;vertical-align:top;text-align:left;font-weight:bold">
                    Email: </td>
                <td style="vertical-align:top;text-align:left"><a href="mailto:{{$booking->guest->guest_email}}"
                        target="_blank">{{$booking->guest->guest_email}}</a></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;width:25%;vertical-align:top;text-align:left;font-weight:bold"> Tình
                    trạng: </td>
                <td style="vertical-align:top;font-weight:bold;text-align:left">
                    <span style="color:red">Đã duyệt</span>
                </td>
                <td style="white-space:nowrap;width:25%;vertical-align:top;text-align:left;font-weight:bold"> Số điện
                    thoại: </td>
                <td style="vertical-align:top;text-align:left">{{$booking->guest->guest_phone}}</td>
            </tr>
            <tr style="height:15px"></tr>
        </tbody>
    </table>
    <table cellpadding="4" cellspacing="0" border="0" style="width:100%">
        <tbody>
            <tr>
                <td style="border-left:solid 2px #173d8f;background-color:#f0f0f0;height:30px;padding-left:15px;font-weight:bold"
                    colspan="4">
                    Chi tiết đặt phòng
                </td>
            </tr>
            <tr>
                <td style="white-space:nowrap;width:25%;text-align:left;font-weight:bold">Tên đoàn khách: </td>
                <td colspan="3"></td>
            </tr>
            <tr style="height:10px"></tr>
            <tr>
                <td style="white-space:nowrap;text-align:left;font-weight:bold">Nhận phòng: </td>
                <td colspan="3">{{date('d/m/Y', strtotime($booking->checkin))}}</td>
            </tr>
            <tr style="height:10px"></tr>
            <tr>
                <td style="white-space:nowrap;text-align:left;font-weight:bold">Trả phòng: </td>
                <td colspan="3">{{date('d/m/Y', strtotime($booking->checkout))}}</td>
            </tr>
            <tr style="height:10px"></tr>
            <tr>
                <?php 
                $start = new DateTime($booking->checkin);
                $end = new DateTime($booking->checkout);

                $abs_diff = $end->diff($start)->format("%a");
                ?>
                <td style="white-space:nowrap;text-align:left;font-weight:bold">Số đêm nghỉ</td>
                <td colspan="3">{{$abs_diff}} đêm</td>
            </tr>
            <tr style="height:10px"></tr>
            <tr>
                <?php 
                $adult = $child = 0;
                for($i =0 ; $i < count($bookingDetails) ; $i++) {
                    $adult += $bookingDetails[$i]->roomAdult;
                    $child += $bookingDetails[$i]->roomChild;
                }    
                ?>
                <td style="white-space:nowrap;text-align:left;font-weight:bold">Số khách: </td>
                <td colspan="3">{{$adult}} Người lớn, {{$child}} Trẻ em</td>
            </tr>
            <tr style="height:10px"></tr>
            {{-- <tr>
                <td style="white-space:nowrap;text-align:left;font-weight:bold">Yêu cầu đặc biệt: </td>
                <td colspan="3" style="font-size:13px">



                </td>
            </tr>
            <tr>
                <td style="white-space:nowrap;text-align:left;font-weight:bold">Phí hủy đặt phòng: </td>
                <td colspan="3">
                    <p>Hủy đặt phòng sau 11/12/2021 00:00, sẽ phải chịu phí 50 % giá trị đặt phòng</p>
                    <p>Hủy đặt phòng trước 11/12/2021 00:00, hủy miễn phí</p>

                </td>
            </tr>--}}
        </tbody>
    </table>
    <table cellpadding="4" cellspacing="0" border="0" style="width:100%">
        <tbody>
            <tr>
                <td style="border-left:solid 2px #173d8f;background-color:#f0f0f0;height:30px;padding-left:15px;font-weight:bold;margin-top:10px"
                    colspan="2">
                    Chi tiết phòng
                </td>
            </tr>
            <?php $totalPrice = 0;?>
            @foreach($bookingDetails as $bookingDetail)
            <?php $totalPrice += $bookingDetail->roomTypes->room_type_price;?>
            <tr>
                <td style="width:80%;text-align:left">
                    &#8594; {{$bookingDetail->roomTypes->room_type_name}}

                    <span style="color:gray;font-style:italic">
                        ({{$bookingDetail->roomAdult}} Người lớn, {{$bookingDetail->roomChild}} Trẻ em)
                    </span>
                    <span>{{number_format($bookingDetail->roomTypes->room_type_price)}}/đêm</span>
                    <br>
                    {{-- <span style="color:gray;font-size:13px"> Phòng Superior Giường Đôi hoặc 2 Giường Đơn </span>
                    --}}

                </td>
                <td style="width:20%;text-align:right">
                    {{number_format($bookingDetail->roomTypes->room_type_price * $abs_diff)}}

                </td>
            </tr>
            {{-- <tr>
                <td style="width:80%;text-align:left">
                    54% - Getaway Deal 2021

                </td>
                <td style="width:20%;text-align:right">
                    -864,000
                </td>
            </tr> --}}

            <tr style="height:15px">
                <td style="width:80%;margin:0;padding:0">
                    <hr>
                </td>
                <td style="width:20%;margin:0;padding:0">
                    <hr>
                </td>
            </tr>
            @endforeach
            {{--
            <tr>
                <td style="width:80%;text-align:left">
                    1 x Phòng Superior Giường Đôi hoặc 2 Giường Đơn

                    <span style="color:gray;font-style:italic">
                        (1 Người lớn, 0 Trẻ em, Hưng)
                    </span>
                    <br>
                    <span style="color:gray;font-size:13px"> Phòng Superior Giường Đôi hoặc 2 Giường Đơn </span>

                </td>
                <td style="width:20%;text-align:right">
                    1,600,000
                </td>
            </tr>
            <tr>
                <td style="width:80%;text-align:left">
                    54% - Getaway Deal 2021

                </td>
                <td style="width:20%;text-align:right">
                    -864,000
                </td>
            </tr>

            <tr style="height:15px">
                <td style="width:80%;margin:0;padding:0">
                    <hr>
                </td>
                <td style="width:20%;margin:0;padding:0">
                    <hr>
                </td>
            </tr>
            --}}
        </tbody>
    </table>
    {{--
    <hr> --}}
    <table cellpadding="4" cellspacing="0" border="0" style="width:100%">
        <tbody>
            {{-- <tr>
                <td style="white-space:nowrap;width:80%;text-align:left">
                    <strong>Tổng cộng số tiền tạm tính (VND)</strong>
                </td>
                <td style="width:20%;text-align:right">
                    <strong>{{$totalPrice}}</strong>
                </td>
            </tr>
            <tr>
                <td style="white-space:nowrap;width:80%;text-align:left">
                    <strong>Tổng cộng số tiền giảm giá (VND)</strong>

                </td>
                <td style="width:20%;text-align:right">
                    <strong>-2,779,920</strong>
                </td>
            </tr> --}}
            <tr style="height:10px"></tr>
            <tr>
                <td style="white-space:nowrap;width:80%;text-align:left">
                    <strong>Tổng cộng số tiền phải thanh toán (bao gồm cả đặt cọc) (VND)</strong>
                </td>
                <td style="width:20%;text-align:right">
                    <strong>{{number_format($totalPrice * $abs_diff)}} VNĐ</strong>
                </td>
            </tr>
            <tr>
                <td style="white-space:nowrap;width:80%;text-align:left">
                    <strong>Số tiền đặt cọc tối thiểu (10% giá trị đơn)</strong>
                </td>
                <td style="width:20%;text-align:right">
                    <strong>{{number_format($totalPrice * $abs_diff * 0.1)}} VNĐ</strong>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="font-size:15px;text-align:right;font-style:italic">

                </td>
            </tr>
        </tbody>
    </table>
    <table cellpadding="4" cellspacing="0" border="0" style="width:100%">
        <tbody>
            <tr>
                <td style="border-left:solid 2px #173d8f;background-color:#f0f0f0;height:30px;padding-left:15px;font-weight:bold;margin-top:10px"
                    colspan="4">
                    Chi tiết giao dịch thanh toán
                </td>
            </tr>
            <tr style="height:15px"></tr>
            <tr>
                <td style="white-space:nowrap;width:25%;text-align:left;font-weight:bold">Phương thức thanh toán:
                </td>
                <td colspan="2">
                    Thanh toán qua
                    Khách sạn
                </td>
                <td></td>
            </tr>
            <tr style="height:10px"></tr>
            <tr>
                <td style="white-space:nowrap;text-align:left;font-weight:bold">Hình thức thanh toán:
                </td>
                <td colspan="2">
                    Chuyển khoản
                </td>
                <td style="text-align:right">
                    {{-- {{number_format($totalPrice * $abs_diff)}} --}}
                </td>
            </tr>

            <tr>
                <td colspan="4">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="vertical-align:top;font-weight:bold;text-align:center;">
                    {{-- <span style="color:red">Quý khách vui lòng thanh toán (tối thiểu là tiền cọc) trong vòng 48h, nếu
                        không đơn đặt phòng sẽ bị
                        hủy</span> --}}
                </td>
            </tr>
        </tbody>
    </table>
    <table cellpadding="4" cellspacing="0" border="0" style="width:100%">

        <tbody>
            <tr>
                <td style="white-space:nowrap;width:80%;text-align:left">
                    <strong>Số tiền đã thanh toán (VND)</strong>
                </td>
                <td style="width:20%;text-align:right">

                    <strong>{{number_format($booking->deposit)}}</strong>
                </td>
            </tr>
            <tr style="height:10px"></tr>

            <tr>
                <td style="white-space:nowrap;width:80%;text-align:left;color:red">
                    <strong>Số tiền còn thiếu (VND)</strong>
                </td>
                <td style="width:20%;text-align:right;color:red">
                    <strong>{{number_format(($totalPrice * $abs_diff)-$booking->deposit)}}</strong>
                </td>
            </tr>

        </tbody>
    </table>
    {{--
    <table cellpadding="4" cellspacing="0" border="0" style="width:100%">
        <tbody>
            <tr>
                <td style="border-left:solid 2px #173d8f;background-color:#f0f0f0;height:30px;padding-left:15px;font-weight:bold;margin-top:10px"
                    colspan="2">
                    Chính sách khách sạn
                </td>
            </tr>
            <tr style="height:15px"></tr>
            <tr>
                <td style="white-space:nowrap;width:25%;text-align:left;font-weight:bold">Nhận phòng: </td>
                <td colspan="3">Từ 13:30 giờ</td>
            </tr>
            <tr style="height:10px"></tr>
            <tr>
                <td style="white-space:nowrap;text-align:left;font-weight:bold">Trả phòng: </td>
                <td colspan="3">Cho đến 12:00 giờ</td>
            </tr>
            <tr style="height:10px"></tr>
            <tr>
                <td style="white-space:nowrap;text-align:left;font-weight:bold">Phụ thu: </td>
                <td colspan="3">
                    <p>Trẻ em dưới 5 tuổi được miễn phí.</p>
                    <p>Trẻ em từ 5 - 10 tuổi được tính phụ phí.</p>
                    <p>Trẻ em trên 10 tuổi được tính phí như người lớn.</p>
                </td>
            </tr>
            <tr style="height:10px"></tr>
            <tr>
                <td style="white-space:nowrap;text-align:left;font-weight:bold">Chính sách hủy: </td>
                <td colspan="3">
                    <p>Hủy đặt phòng trong khoảng 3 ngày trước ngày đến, sẽ phải chịu phí 50 % giá trị đặt phòng</p>
                    <p>Hủy đặt phòng trước 3 ngày trước ngày đến, hủy miễn phí</p>

                </td>
            </tr>
            <tr style="height:10px"></tr>
            <tr>
                <td style="white-space:nowrap;text-align:left;font-weight:bold">Chính sách thanh toán: </td>
                <td colspan="3">
                    <p>Thanh toán 100% giá trị đặt phòng</p>
                </td>
            </tr>
        </tbody>
    </table>
    <table cellpadding="4" cellspacing="0" border="0" style="width:100%">
        <tbody>
            <tr>
                <td style="border-left:solid 2px #173d8f;background-color:#f0f0f0;height:30px;padding-left:15px;font-weight:bold"
                    colspan="4">
                    Thông tin chuyển khoản
                </td>
            </tr>
            <tr>
                <td style="white-space:nowrap;width:25%;text-align:left;font-weight:bold">Chủ tài khoản: </td>
                <td colspan="3">LE THU LINH</td>
            </tr>
            <tr style="height:10px"></tr>
            <tr>
                <td style="white-space:nowrap;text-align:left;font-weight:bold">Số tài khoản: </td>
                <td colspan="3">0611003337879</td>
            </tr>
            <tr style="height:10px"></tr>
            <tr>
                <td style="white-space:nowrap;text-align:left;font-weight:bold">Chi nhánh: </td>
                <td colspan="3">Hà Nội</td>
            </tr>
            <tr style="height:10px"></tr>
            <tr>
                <td style="white-space:nowrap;text-align:left;font-weight:bold">Tên ngân hàng: </td>
                <td colspan="3">TMCP Ngoại thương Việt Nam</td>
            </tr>
            <tr style="height:10px"></tr>
            <tr>
                <td colspan="4">
                    <hr>
                </td>
            </tr>
        </tbody>
    </table> --}}
    <table cellpadding="4" cellspacing="0" border="0" style="width:100%">
        <tbody>
            <tr>
                <td style="text-align:center">
                    <span style="font-size:20px;color:green">Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:center">
                    <span style="font-size:20px">Bạn cần giúp đỡ?</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:center">
                    <b>Hotline: 02439381513</b>
                </td>
            </tr>
        </tbody>
    </table>
</div>