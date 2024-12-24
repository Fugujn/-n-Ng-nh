<?php
include ("configajax.php");
?>

<?php
$d->reset();
$sql = "select * from #_setting limit 0,1";
$d->query($sql);
$row_setting = $d->fetch_array();
$email_company = $row_setting['email'];

$mahoadon = strtoupper(ChuoiNgauNhien(6));
$ngaytao = time();
$ngay = date('d', $ngaytao);
$thang = date('m', $ngaytao);
$nam = date('Y', $ngaytao);

$tonggia = get_order_total();
$hoten = $_SESSION['payc']['fullname'];
$diachi = $_SESSION['payc']['address'];
$dienthoai = $_SESSION['payc']['phone'];
$email = $_SESSION['payc']['email'];
$noidung = $_SESSION['payc']['noidung'];
//$city = $_SESSION['payc']['city'];
//$district = $_SESSION['payc']['district'];
//$ward = $_SESSION['payc']['ward'];
//$shipping = $_SESSION['payc']['priceship'];
//$magiamgia = $_SESSION['payc']['codes'];
$phuongthuc = $_POST['cast'];
if($phuongthuc == 'nhan-hang') { 
    $d->reset();
    $sql = "select * from table_time where type = 'nhan-hang' ";
    $d->query($sql);
    $noidungthanhtoan = $d->fetch_array();
} elseif($phuongthuc == 'noi-dia') { 
    $d->reset();
    $sql = "select * from table_time where type = 'noi-dia' ";
    $d->query($sql);
    $noidungthanhtoan = $d->fetch_array();
} 
//$httt = $_POST['hinhthuc'];

/*if($_POST['cast'] == 'nhan-hang'){
    $dichpt_vi = "Thanh toán khi nhận hàng";
    $dichpt_en = "Payment on delivery";
} elseif($_POST['cast'] == 'noi-dia'){
    $dichpt_vi = "Thanh toán bằng thẻ nội địa";
    $dichpt_en = "Payment by domestic card";
} elseif($_POST['cast'] == 'quoc-te'){
    $dichpt_vi = "Thanh toán bằng thẻ quốc tế";
    $dichpt_en = "Payment by international card";
}*/

    if ($httt == 'thanh-toan-bao-kim') {
        
    } else if ($httt == 'thanh-toan-ngan-luong') {
       
    } else if ($httt == 'thanh-toan-paypal') {
        
    } else {

        $idkhachhang = $_SESSION['mem_login']['id'];
        $dataorder['madonhang'] = $mahoadon;
        $dataorder['hoten'] = $hoten;
        $dataorder['dienthoai'] = $dienthoai;
        $dataorder['diachi'] = $diachi;
        $dataorder['email'] = $email;
        $dataorder['httt'] = 2;
        $dataorder['tonggia'] = $tonggia;
        $dataorder['noidung'] = $noidung;
        $dataorder['ngaytao'] = $ngaytao;
        $dataorder['trangthai'] = 1;
        $dataorder['loaithanhtoan'] = 0;
        $dataorder['phuongthuc'] = $phuongthuc;
        $dataorder['iduser'] = $idkhachhang;
        $dataorder['ngay'] = $ngay;
        $dataorder['thang'] = $thang;
        $dataorder['nam'] = $nam;
        //$dataorder['city'] = $city;
        //$dataorder['district'] = $district;
        //$dataorder['ward'] = $ward;
        //$dataorder['ship'] = $shipping;
        //$dataorder['magiamgia'] = $magiamgia;

        if($_SESSION['mem_login']['email'] != ''){
            $emailusersend = $_SESSION['mem_login']['email'];
        }else{
            $emailusersend = $_SESSION['payc']['email'];
        }
        
        if($magiamgia == '' && $idkhachhang != ''){

            /*$d->reset();
            $sql = "select point,id from #_member where com = 'user' and id='" . $idkhachhang . "' ";
            $d->query($sql);
            $re_user = $d->fetch_array();

            $point = intval($tonggia/1000);
            $datamem['point'] = $point + $re_user['point'];
            $d->setTable('member');
            $d->setWhere('id', $idkhachhang);
            if ($d->update($datamem)) {}*/
        }

        
        $d->setTable('donhang');
        if ($d->insert($dataorder)) {}

        $iddonhang = $d->getMaxId1('donhang');
        
        $_SESSION['donhangthanhtoan'] = $iddonhang;

        $d->query("select * from #_donhang where id='" . $iddonhang . "'");
        $rs_order = $d->fetch_array();

        $max = count($_SESSION['cart']);
        $sum = 0;
        for ($i = 0; $i < $max; $i++) {
            $pid = $_SESSION['cart'][$i]['productid'];
            $color = $_SESSION['cart'][$i]['color'];
            $size = $_SESSION['cart'][$i]['size'];
            $q = $_SESSION['cart'][$i]['qty'];

            if($color != ''){
                $sum1 = 0;
                $color = ltrim($color,',');
                $tagbv = explode(',', $color);
                for ($j=0; $j < count($tagbv); $j++ ) {
                    $sum1 = $sum1 + get_product_top($tagbv[$j])['gia'];
                } 
            } 
            $price1 = get_price($pid);
            $price2 = get_product_size($size)['gia'];
            $price3 = $sum1;
            $price = $price1 + $price2 + $price3;
            $totaldetail = $price*$q;

            $datadetailorder['id_order'] = $iddonhang;
            $datadetailorder['id_product'] = $pid;
            $datadetailorder['soluong'] = $q;
            $datadetailorder['id_nguoimua'] = $idkhachhang;

            $datadetailorder['gia'] = $price;
            $datadetailorder['total'] = $totaldetail;
            $datadetailorder['color'] = $color;
            $datadetailorder['size'] = $size;

            $d->setTable('donhang_detail');
            if ($d->insert($datadetailorder)) {}

        }

        $body = '
            <div style="width:100%;float:left;margin-bottom:20px">'.$row_setting['title_vi'].' cảm ơn quý khách đã đặt hàng dưới đây là thông tin đơn hàng của quý khách:</div>
            <table width="100%" border="0" style="border: solid 1px #000;">
                            <tr style="height:40px; line-height:40px; padding:10px;">
                                  <td width="50%" style="border-bottom: solid 1px #000;">Đơn hàng của bạn</td>
                                  <td style="text-align:center; border-bottom: solid 1px #000; font-style:italic; font-size:18px;">' . $_SESSION['payc']['fullname'] . '</td>
                            </tr>
                            <tr style="height:40px; padding:10px;">
                                  <td style="line-height:40px; border-bottom: solid 1px #000; border-right: solid 1px;">Số hóa đơn: ' . $mahoadon . '</td>
                                  <td style=" padding:10px 0px; line-height:25px; border-bottom: solid 1px #000;">Ngày đặt hàng: ' . date('d/m/Y', $ngaytao) . '<br />
                                          Trạng thái đơn hàng: mới đặt
                                  </td>
                            </tr>
                            <tr style=" padding:10px;">
             <td style="line-height:25px; padding:10px 0px; border-bottom: solid 1px #000; border-right: solid 1px;">
                 <b>Nhà cung cấp </b><br /><br />
                 Công ty: ' . $row_setting['title_vi'] . ' <br />
                 Địa chỉ: ' . $row_setting['diachi_vi'] . '<br />
                 Điện thoại: ' . $row_setting['dienthoai_vi'] . ' <br />
                 Email: ' . $row_setting['email'] . ' <br />
             </td>
             <td style=" padding:10px 0px; line-height:25px; border-bottom: solid 1px #000;">
                 <b>Khách hàng </b><br /><br />
                 Tên khách hàng: ' . $rs_order['hoten'] . '<br />
                 Địa chỉ: ' . $rs_order['diachi'] . '<br />
                 Điện thoại: ' . $rs_order['dienthoai'] . ' <br />
                 Email: ' . $rs_order['email'] . '<br />
             </td>
                            </tr>
                            <tr>
             <td colspan="2">
             <table width="100%" style=" border-top: none;">
                 <tr style="height:30px;">
                     <td style="width:25%;">Tên sản phẩm</td>
                     <td style="width:10%;">Size</td>
                     
                     <td style="text-align:center;width:15%;">Giá</td>
                     <td style="text-align:center;width:15%;">Số lượng</td>
                     <td style="text-align:center; width:15%;">Tổng giá</td>
                            </tr>';
        $max = count($_SESSION['cart']);
        $sum = 0;
        for ($i = 0; $i < $max; $i++) {
            $pid = $_SESSION['cart'][$i]['productid'];
            $color = $_SESSION['cart'][$i]['color'];
            $size = $_SESSION['cart'][$i]['size'];
            $q = $_SESSION['cart'][$i]['qty'];
            
            if($color != ''){
                $sum1 = 0;
                $color = ltrim($color,',');
                $tagbv = explode(',', $color);
                $colorname = '';
                for ($j=0; $j < count($tagbv); $j++ ) {
                    $sum1 = $sum1 + get_product_top($tagbv[$j])['gia'];
                    $colorname .= get_product_top($tagbv[$j])['ten'].'<br>';
            }   }
            $price1 = get_price($pid);
            $price2 = get_product_size($size)['gia'];
            $price3 = $sum1;
            $price = $price1 + $price2 + $price3;
            $totaldetail =  $price*$q;                  
            if ($q == 0)
                continue;

            // <td style="text-align:center;width:15%;">' . number_format(get_price($pid), 0, ',', '.') . '&nbsp;VNĐ</td>
            $body.='<tr style="height:30px">
                    <td style="width:25%;">' . get_product_name($pid) . '</td>
                    <td style="width:10%;">' . get_product_size($size)['ten'] . '</td>
                    <td style="text-align:center;width:15%;">' . price_sp($price) . '</td>
                    <td style="text-align:center;width:15%;">' . $q . '</td>
                    <td style="text-align:center; width:15%;">' . price_sp($totaldetail) . '</td>
                </tr>';
        }

        

        $body.='</table>
             </td>
              </tr>
            </table>';
        {
            /*$d->reset();
            $sql = "select * from #_icon where hienthi = 1 and com = 'magiamgia' and ten_vi = '".$magiamgia." ' ";
            $d->query($sql);
            $codes = $d->fetch_array();
            if($codes == ''){
                $totalprice = get_order_total() + $shipping;
            }else{
                $ptsale = $codes['gia'];
                $prsale = ((get_order_total() * $codes['gia']) / 100);
                $totalprice = (get_order_total() - $prsale ) + $shipping;
            }*/
           /* $body.='<div style="width:100%;float:left;margin-top:15px;font-weight:bold">Phí giao hàng : ' . price_sp($shipping) . '</div>';*/
            $body.='<div style="width:100%;float:left;margin-top:15px;font-weight:bold">Tổng giá : ' . price_sp(get_order_total()) . '</div>';
            /*$body.='<div style="width:100%;float:left;margin-top:15px;font-weight:bold">Mã giảm giá áp dụng : ' . $magiamgia . '</div>';
            $body.='<div style="width:100%;float:left;margin-top:15px;font-weight:bold">Thanh toán : ' . price_sp($totalprice) . '</div>';*/
        }
        $body.='<p style="margin-top:20px;width:100%;float:left">Thông tin thanh toán:</p><br />';
        $body.= $noidungthanhtoan['noidung_vi']. '<br /><br />';
        $body.='<p style="margin-top:20px;width:100%;float:left">Đây là hộp thư tự động</p><br /><br />
         Mọi yêu cầu giúp đỡ xin liên hệ mail: '.$row_setting['email'].'<br /><br />
            Chúng tôi hân hạnh được phục vụ quý khách';
    /*unset($_SESSION['cart']);
    echo 1;  */      

    require_once ("../phpmailer/class.phpmailer.php");
    require_once ("../phpmailer/class.smtp.php");

    define('GUSER', 'hongthai.hta@gmail.com'); // tài khoản đăng nhập Gmail
    define('GPWD', 'nrifijeykmlvobyr'); // mật khẩu cho cái mail này  

    // function smtpmailer($to, $from, $from_name, $subject, $body, $bcc) {
        global $error;

        $mail = new PHPMailer();  // tạo một đối tượng mới từ class PHPMailer
        $mail->Debugoutput = "html";
        $mail->CharSet = 'UTF-8';
        $mail->IsSMTP(); // bật chức năng SMTP
        // $mail->SMTPDebug = 2;  // kiểm tra lỗi : 1 là  hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi
        $mail->SMTPAuth = true;  // bật chức năng đăng nhập vào SMTP này
        $mail->SMTPSecure = 'ssl'; // sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = GUSER;
        $mail->Password = GPWD;
        $mail->SetFrom($email_company, 'Thông tin đơn hàng');
        $mail->AltBody = "This is a plain-text message body";
        $mail->Subject = "Thông tin đơn hàng";
        $mail->MsgHTML($body);
        $mail->Body = $body;
        $mail->AddAddress($email_company);
        $mail->AddAddress($emailusersend);
        //$mail->AddBCC($_POST['email']);
        $mail->AddReplyTo($email_company, 'Thông tin đơn hàng');
        

        if (!$mail->Send()) {
            //$error = 'Gởi mail bị lỗi: ' . $mail->ErrorInfo;
            // echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
            //return false;
        } else {
            unset($_SESSION['cart']);
            echo 1;
            //header('Location: checkout.html');
            // echo "Đã gửi thư thành công!";
            //return true;
        }

    }

?>