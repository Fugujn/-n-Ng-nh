<?php
if($_SESSION['emaillost'] != ''){
    $d->reset();
    $sql = "select * from #_setting limit 0,1";
    $d->query($sql);
    $row_setting = $d->fetch_array();
    $email_company = $row_setting['email'];

    $body = '<table style="width: 50%;border:1px solid #179fd5;">
        <p style="color:black">Thông tin tài khoản mới của quý khách trên trang website '.$row_setting['ten_vi'].'</p>
        <div style="clear:both"></div>
        <caption style="padding: 5px;color:#fff;background:#f6a003;font-size: 16px;">Thông tin mật khẩu mới</caption>
        <tbody>
            <tr>
                <td style="border:1px solid #f4f4f4;width: 50%;padding: 8px 0px;text-align: center;">Username</td>
                <td style="border:1px solid #f4f4f4;width: 50%;padding: 8px 0px;text-align: center;"><b>'.$_SESSION['emaillost'].'</b></td>
            </tr>
            <tr>
                <td style="border:1px solid #f4f4f4;width: 50%;padding: 8px 0px;text-align: center;">Password</td>
                <td style="border:1px solid #f4f4f4;width: 50%;padding: 8px 0px;text-align: center;"><b>'.$_SESSION['losspass'].'</b></td>
            </tr>
        </tbody>
    </table>';

    require_once ("phpmailer/class.phpmailer.php");
    require_once ("phpmailer/class.smtp.php");

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
    $mail->SetFrom($_SESSION['emaillost'], 'Quên mật khẩu');
    $mail->AltBody = "This is a plain-text message body";
    $mail->Subject = "Quên mật khẩu";
    $mail->MsgHTML($body);
    $mail->Body = $body;
    $mail->AddAddress($_SESSION['emaillost']);
    // $mail->AddBCC($_POST['email']);
    $mail->AddReplyTo($_SESSION['emaillost'], 'Quên mật khẩu');


    if (!$mail->Send()) {
        $error = 'Gởi mail bị lỗi: ' . $mail->ErrorInfo;
        // echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
        return false;
    } else {
        unset($_SESSION['emaillost']);
        unset($_SESSION['losspass']);
        transfer("", "losspass");
        // echo "Đã gửi thư thành công!";
        return true;
    }
}

?>
<style>
    .baogioithieu{width: 100%;float:left;}
    .leftmid{display: none}
    .rightmid{width: 100%;float:left}
    .khung_slider{display: none}
    .khungtronglosspass{width: 500px;margin:0 auto;border:1px solid silver;background: #f5f2f2;padding:2%;}
    .khungtronglosspass p{line-height: 25px}
</style>
<div class="baogioithieu">
    <div class="khungtronglosspass">
        <p>
            Thông tin mật khẩu của quý khách đã được gửi về email đăng ký. Quý khách vui lòng kiểm tra email để biết thông tin đăng nhập mới. Sau đó quý khách có thể <a href="login" style="color:#179fd5">đăng nhập</a> vào tài khoản để đổi lại mật khẩu. Cảm ơn !
        </p>
    </div>
</div>