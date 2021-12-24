<div style="background-color:white;padding:20px;max-width:860px;margin:auto">
    <table cellpadding="4" cellspacing="0" border="0" style="width:100%">
        <tbody>
            <tr>
                <td colspan="2" style="text-align:center"><img
                        src="https://ci3.googleusercontent.com/proxy/DptNdURLOsHuLUciAGi8J3bCZpfPBRSq_ckClrh52R7JIuaousYGAUmVm0gS9K3ynBY_-bMWFUFHXJxBGQ6hPQ5P4S7lfMXM4hzMojOL10MsBgaoXYRvWsou=s0-d-e1-ft#https://static01-cdn.oneinventory.com/images/2019/03/15517836387327.png"
                        alt="" height="40" class="CToWUd"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>Xin chào <strong>{{$booking->guest->guest_name}}</strong></p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>Chúng tôi xác nhận đặt phòng của bạn tại <strong>Khách Sạn Anh Em Hotel</strong> <i>(mã
                            đặt phòng:
                            {{$booking->booking_id}})</i> đã được hủy miễn phí theo chính sách của khách sạn</p>
                </td>
            </tr>
        </tbody>
    </table>
    <table cellpadding="4" cellspacing="0" border="0">
        <tbody>
            <tr>
                <td style="white-space:nowrap;width:25%;vertical-align:top;text-align:left;font-weight:bold"> Mã đặt
                    phòng:&nbsp; </td>
                <td style="vertical-align:top;width:25%;text-align:left"> {{$booking->booking_id}} </td>
                <td style="white-space:nowrap;width:25%;vertical-align:top;text-align:left;font-weight:bold"> Họ tên
                    khách hàng:&nbsp; </td>
                <td style="vertical-align:top;width:25%;text-align:left"> {{$booking->guest->guest_name}} </td>
            </tr>
            <tr>
                <td style="white-space:nowrap;width:25%;vertical-align:top;text-align:left;font-weight:bold">Ngày, giờ
                    đặt phòng:&nbsp; </td>
                <td style="vertical-align:top;text-align:left"> {{$booking->created_at->format('d/m/Y H:i:s')}} </td>
                <td style="white-space:nowrap;width:25%;vertical-align:top;text-align:left;font-weight:bold">Ngày, giờ
                    hủy:&nbsp; </td>
                <td style="vertical-align:top;text-align:left"> {{$booking->updated_at->format('d/m/Y H:i:s')}}</td>
            </tr>
            <tr>
                <td style="white-space:nowrap;width:25%;vertical-align:top;text-align:left;font-weight:bold"> Tình
                    trạng:&nbsp; </td>
                <td style="vertical-align:top;font-weight:bold;text-align:left">
                    <span style="color:red">Hủy bởi khách hàng</span>
                </td>
                <td style="white-space:nowrap;width:25%;vertical-align:top;text-align:left;font-weight:bold"> Số điện
                    thoại:&nbsp; </td>
                <td style="vertical-align:top;text-align:left"> {{$booking->guest->guest_phone}} </td>
            </tr>
            <tr>
                <td style="white-space:nowrap;width:25%;vertical-align:top;text-align:left;font-weight:bold"> Lý do hủy
                    đặt phòng: :&nbsp; </td>
                <td style="vertical-align:top;text-align:left" colspan="3">
                    Quá hạn thanh toán
                </td>
            </tr>
            <tr style="height:15px"></tr>
        </tbody>
    </table>
    {{-- <table cellpadding="4" cellspacing="0" border="0" style="width:100%">
        <tbody>
            <tr>
                <td style="border-left:solid 2px #173d8f;background-color:#f0f0f0;height:30px;padding-left:15px;font-weight:bold;margin-top:10px"
                    colspan="4">
                    Chi tiết thanh toán
                </td>
            </tr>
            <tr style="height:15px"></tr>
        </tbody>
    </table> --}}
    {{-- <table cellpadding="4" cellspacing="0" border="0" style="width:100%">

        <tbody>
            <tr>
                <td style="white-space:nowrap;width:80%;text-align:left">
                    <strong>Số tiền đã thanh toán (VND)</strong>
                </td>
                <td style="width:20%;text-align:right">

                    <strong>0.00</strong>
                </td>
            </tr>
            <tr style="height:10px"></tr>
            <tr>
                <td style="white-space:nowrap;width:80%;text-align:left">
                    <strong>Phí hủy (VND)</strong>
                </td>
                <td style="width:20%;text-align:right">
                    <strong>0.00</strong>
                </td>
            </tr>
            <tr style="height:10px"></tr>
            <tr>
                <td style="white-space:nowrap;width:80%;text-align:left">
                    <strong>Số tiền còn lại (VND)</strong>
                </td>
                <td style="width:20%;text-align:right">
                    <strong>0.00</strong>
                </td>
            </tr>

        </tbody>
    </table> --}}
    <hr>
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