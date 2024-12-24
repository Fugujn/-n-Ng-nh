<?php
include ("configajax.php");

$id = $_POST['id'];
$masouser = $_POST['masouser'];

$d->reset();
$sql = "select * from #_product where hienthi = 1 and type = 'doi-thuong' and id ='".$id."' order by stt, ngaytao desc";
$d->query($sql);
$product_gift = $d->fetch_array();

$data_ajax['diemdoi'] = $product_gift['point'];
$data_ajax['id_product'] = $id;
$data_ajax['iduser'] = $masouser;
$data_ajax['ngaytao'] = time();

$d->setTable('product_thongso');
$d->insert($data_ajax);

$sql_point = "update #_member set point = point - '".$product_gift['point']."' where id ='" . $masouser . "'";
$d->query($sql_point);

$d->reset();
$sql = "select email from #_setting limit 0,1";
$d->query($sql);
$row_setting = $d->fetch_array();
$email_company = $row_setting['email'];

$d->reset();
$sql = "select point from #_member where id = '".$data_ajax['iduser']."'";
$d->query($sql);
$pointuser = $d->fetch_array();


$body = '
            <div style="width:100%;float:left;margin-bottom:20px">Yomie Vietnam chúc mừng quý khách đã đổi quà tích điểm thành công :</div>
            <table width="100%" border="0" style="border: solid 1px #000;">
              	<tr style="height:30px;border-bottom:1px solid #000;background:#f5f5f5">
                    <td style="width:40%;">Tên sản phẩm</td>
                    <td style="text-align:center;width:15%;">Số điểm</td>
                    <td style="text-align:center;width:15%;">Ngày đổi</td>
                </tr>';

        $body.='<tr style="height:30px">
                    <td style="width:30%;">' . get_product_name($data_ajax['id_product']) . '</td>
                    <td style="text-align:center;width:15%;">' . $data_ajax['diemdoi']. '</td>
                        <td style="text-align:center;width:15%;">' . date('d/m/Y',$data_ajax['ngaytao']) . '</td>
                    </tr>';


        

        $body.='</table>';
        
        $body.='<div style="width:100%;float:left;margin-top:15px;">Số điểm thưởng còn lại : ' . $pointuser['point'] . '</div>';
       
        $body.='<p style="margin-top:20px;width:100%;float:left">Đây là hộp thư tự động</p><br /><br />
         Mọi yêu cầu giúp đỡ xin liên hệ mail: '.$email_company.'<br /><br />
            Chúng tôi hân hạnh được phục vụ quý khách';

require_once ("../phpmailer/class.phpmailer.php");
require_once ("../phpmailer/class.smtp.php");

    define('GUSER', 'testkythuativangroup@gmail.com'); // tài khoản đăng nhập Gmail
    define('GPWD', 'zlhyeurscyofslqn'); // mật khẩu cho cái mail này  

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
    $mail->SetFrom($email_company, 'Thông tin đổi quà');
    $mail->AltBody = "This is a plain-text message body";
    $mail->Subject = "Thông tin đổi quà";
    $mail->MsgHTML($body);
    $mail->Body = $body;
    $mail->AddAddress($email_company);
    $mail->AddAddress($_SESSION['mem_login']['email']);
    $mail->AddReplyTo($email_company, 'Thông tin đổi quà');
    

    if (!$mail->Send()) {
        $error = 'Gởi mail bị lỗi: ' . $mail->ErrorInfo;
        return false;
    } else {
        return true;
    }
?>

