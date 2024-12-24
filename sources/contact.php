<?php

if (!defined('_source'))
    die("Error");

$d->reset();
$sql = "select * from #_setting limit 0,1";
$d->query($sql);
$row_setting = $d->fetch_array();
$email_company = $row_setting['email'];

if (!empty($_POST)) {
    if($_POST['idpro'] != ''){
      $data['tieude'] =  strip_tags(addslashes($_POST['idpro'])); 
    }else{
      $sec = strtoupper($_POST['security']);
      if($sec != $_SESSION['captcha_code2']){
        echo '<meta charset=utf-8" />';
        alert(change_lang("Sai mã an toàn vui lòng nhập lại.","Captcha is not correct"));
        redirect('lien-he.html');
      }
    }
    $data['ten_en'] = strip_tags(addslashes($_POST['ten']));
    $data['diachi'] = strip_tags(addslashes($_POST['diachi']));
    $data['dienthoai'] = strip_tags(addslashes($_POST['dienthoai']));
    $data['email'] = strip_tags(addslashes($_POST['email']));
    $data['noidung'] = strip_tags(addslashes($_POST['noidung']));
    //$data['id_product'] = $_POST['id_product'];
    $data['type'] = 1;
    $data['ngaytao'] = time();
    $data['ngay'] = date('d',time());
    $data['thang'] = date('m',time());
    $data['nam'] = date('Y',time());

    $d->setTable('dknhantin');
    $d->insert($data);
    transfer("Thông tin liên hệ đã được gửi.<br>Cảm ơn.", "./");
   
      $body = '<table>';
      $body .= '
              <tr>
              <th colspan="2">&nbsp;</th>
              </tr>
              <tr>
              <th colspan="2">Thư liên hệ từ website ' . $row_setting['website'] . '</th>
              </tr>
              <tr>
              <th colspan="2">&nbsp;</th>
              </tr>
              <tr>
              <th>Họ tên :</th><td>' . strip_tags(addslashes($_POST['ten'])) . '</td>
              </tr>
              <tr>
              <th>Điện thoại :</th><td>' . strip_tags(addslashes($_POST['dienthoai'])) . '</td>
              </tr>
              <tr>
              <th>Email :</th><td>' . strip_tags(addslashes($_POST['email'])) . '</td>
              </tr>
              <tr>
              <th>Nội dung :</th><td>' . strip_tags(addslashes($_POST['noidung'])) . '</td>
              </tr>';
      $body .= '</table>';
    
    // require_once ("phpmailer/class.phpmailer.php");
    // require_once ("phpmailer/class.smtp.php");

    // define('GUSER', 'hongthai.hta@gmail.com'); // tài khoản đăng nhập Gmail
    // define('GPWD', 'nrifijeykmlvobyr'); // mật khẩu cho cái mail này    

    // // function smtpmailer($to, $from, $from_name, $subject, $body, $bcc) {
    // global $error;

    // $mail = new PHPMailer();  // tạo một đối tượng mới từ class PHPMailer
    // $mail->Debugoutput = "html";
    // $mail->CharSet = 'UTF-8';
    // $mail->IsSMTP(); // bật chức năng SMTP
    // // $mail->SMTPDebug = 2;  // kiểm tra lỗi : 1 là  hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi
    // $mail->SMTPAuth = true;  // bật chức năng đăng nhập vào SMTP này
    // $mail->SMTPSecure = 'ssl'; // sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
    // $mail->Host = 'smtp.gmail.com';
    // $mail->Port = 465;
    // $mail->Username = GUSER;
    // $mail->Password = GPWD;
    // $mail->SetFrom($email_company, 'Thông tin liên hệ từ khách hàng');
    // $mail->AltBody = "Nội dung chi tiết tin";
    // $mail->Subject = "Thông tin liên hệ từ khách hàng";
    // $mail->MsgHTML($body);
    // $mail->Body = $body;
    // $mail->AddAddress($email_company);
    // //$mail->AddBCC($_POST['email']);
    // $mail->AddReplyTo($email_company, 'Contact information Forward');
    

    // if (!$mail->Send()) {
    //     $error = 'Gởi mail bị lỗi: ' . $mail->ErrorInfo;
    //     // echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
    //     return false;
    // } else {
    //     transfer("Thông tin liên hệ đã được gửi.<br>Cảm ơn.", "./");
    //     // echo "Đã gửi thư thành công!";
    //     //return true;
    // }
}
?>