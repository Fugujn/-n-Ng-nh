<?php

include ("configajax.php");

switch ($_REQUEST['act']) {
    case 'register':
        $email_re = $_POST['email'];
        $pass_re = $_POST['pass'];
        $phone_re = $_POST['phone'];
        $name_re = $_POST['name'];
        $captcha1 = $_POST['captchadk'];
        register();
        break;
    case 'login':
        $email_log = $_POST['emaillogin'];
        $pass_log = $_POST['passlogin'];
        login();
        break;
    case 'lostpass':
        $emaillost = $_POST['emaillost'];
        $captcha = $_POST['captcha'];
        lostpass();
        break;
}

function lostpass() {
    global $d,$emaillost,$captcha;
    $sql = "select * from #_member where user='" . $emaillost . "'";
    $d->query($sql);
    $row = $d->fetch_array();
    
    if ($d->num_rows() == 1) {
        if($captcha == $_SESSION['captcha_code']){
            $chuoi = "ABCDEFGHIJKLMNOPQRSTUVWXYZWabcdefghijklmnopqrstuvwxyzw0123456789";
            for ($i = 0; $i < 8; $i++) {
                $vitri = mt_rand(0, strlen($chuoi));
                $giatri = $giatri . substr($chuoi, $vitri, 1);
            }
            $randomkey = $giatri;
            $data['pass'] = md5($randomkey);
            $_SESSION['losspass'] = $randomkey;
             $_SESSION['emaillost'] = $emaillost;
            $body = '<table style="width: 100%;border:1px solid #f4f4f4;">
            <caption style="padding: 5px;color:#fff;background:#f6a003;font-size: 16px;">Thông tin mật khẩu mới</caption>
            <tbody>
                <tr>
                    <td style="border:1px solid #f4f4f4;width: 50%;padding: 8px 0px;text-align: center;">Username</td>
                    <td style="border:1px solid #f4f4f4;width: 50%;padding: 8px 0px;text-align: center;"><b>'.$emaillost.'</b></td>
                </tr>
                <tr>
                    <td style="border:1px solid #f4f4f4;width: 50%;padding: 8px 0px;text-align: center;">Password</td>
                    <td style="border:1px solid #f4f4f4;width: 50%;padding: 8px 0px;text-align: center;"><b>'.$randomkey.'</b></td>
                </tr>
            </tbody>
        </table>';
        
            $d->reset();
            $d->setTable('member');
            $d->setWhere('user', $emaillost);
            if ($d->update($data)) {
            

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
                $mail->SetFrom($emaillost, 'Thông tin mật khẩu mới');
                $mail->AltBody = "This is a plain-text message body";
                $mail->Subject = "Thông tin mật khẩu mới";
                $mail->MsgHTML($body);
                $mail->Body = $body;
                $mail->AddAddress($emaillost);
                //$mail->AddBCC($_POST['email']);
                $mail->AddReplyTo($emaillost, 'Thông tin mật khẩu mới');
                if (!$mail->Send()) {
                    $str = "<span style='color:red'>Gửi mail thất bại</span>";
                    echo json_encode(array("giaodien" => $str, "loai" => '0'));
                }else{
                    $str = "Vui lòng kiểm tra thông tin email để lấy mật khẩu mới.<a href='#small-dialog' class='dk' style='font-size:14px;color:#044c87'> Nhấn vào để đăng nhập.</a>
                    <script type='text/javascript'>
                        $(document).ready(function() {
                          $('.dk').magnificPopup({
                            type: 'inline',

                            fixedContentPos: false,
                            fixedBgPos: true,

                            overflowY: 'auto',

                            closeBtnInside: true,
                            preloader: false,
                            
                            midClick: true,
                            removalDelay: 300,
                            mainClass: 'my-mfp-zoom-in'
                          })
                        });
                    </script>";
                    echo json_encode(array("giaodien" => $str, "loai" => '1'));
                }
                

        }
            
        
        }else{
            $str = "<span style='color:red'>Mã nhập chưa đúng</span>";
            echo json_encode(array("giaodien" => $str, "loai" => '0'));
        }
    }else{
        $str = "<span style='color:red'>Email đăng nhập không tồn tại</span>";
        echo json_encode(array("giaodien" => $str, "loai" => '0'));
    }
            
}
function login() {
    global $d,$email_log,$pass_log;

    $pass_log = md5($pass_log);
    $sql = "select * from #_member where user='" . $email_log . "' or dienthoai = '".$email_log."' ";
    $d->query($sql);
    $row = $d->fetch_array();

    if ($d->num_rows() == 1) {
        if ($row['hienthi'] == 1 && $row['vipham'] == 0) {
            if ($row['pass'] == $pass_log){
                $_SESSION['mem_login']['email'] = $row['user'];
                $_SESSION['mem_login']['name'] = $row['name'];
                $_SESSION['mem_login']['phone'] = $row['dienthoai'];
                $_SESSION['mem_login']['id'] = $row['id'];
                $str = "<span style='color:red'>Đăng nhập thành công</span>";
                echo json_encode(array("giaodien" => $str, "loai" => '1'));
            }else{
                $str = "<span style='color:red'>Mật khẩu đăng nhập không chính xác</span>";
                echo json_encode(array("giaodien" => $str, "loai" => '0'));
            }
        }else{
            $str = "<span style='color:red'>Tài khoản chưa được kích hoạt hoặc đang tạm khóa. Vui lòng liên hệ quản trị viên.</span>";
            echo json_encode(array("giaodien" => $str, "loai" => '0'));
        }
    }else{
        $str = "<span style='color:red'>Email đăng nhập không tồn tại</span>";
        echo json_encode(array("giaodien" => $str, "loai" => '0'));
    }
}
function register() {
    global $d,$email_re,$pass_re,$name_re,$phone_re,$captcha1;

    $pass_re_full = $pass_re;
    $pass_re = md5($pass_re);
    $name_re = addslashes($name_re);
    $ngaydangky = time();

    $d->reset();
    $d->setTable('member');
    $d->setWhere('user', $email_re);
    $d->select();
    if ($d->num_rows() > 0) {
        $error_email = "<span style='color:red'>".change_lang('Email đã được sử dụng !','Exist email !')."</span>";
    }

    $d->reset();
    $d->setTable('member');
    $d->setWhere('dienthoai', $phone_re);
    $d->select();
    if ($d->num_rows() > 0) {
        $error_phone = "<span style='color:red'>".change_lang('Số điện thoại đã được sử dụng !','Exist Phone !')."</span>";
    }

    $_SESSION['checkregister']['user'] = $email_re;
    $_SESSION['checkregister']['name'] = $name_re;
    if($captcha1 != $_SESSION['captcha_code1']){
            $str = "<span style='color:red'>".change_lang('Mã nhập chưa đúng','Incorrect Code')."</span>";
            echo json_encode(array("giaodien1" => $str, "loai" => '0'));

    }elseif($d->num_rows() < 1){

            $datamem['user'] = $email_re;
            $datamem['pass'] = $pass_re;
            $datamem['name'] = $name_re;
            $datamem['ngaytao'] = $ngaydangky;
            $datamem['dienthoai'] = $phone_re;
            $datamem['hienthi'] = 1;
            $datamem['com'] = 'user'; 
            $idmem = $d->getMaxId('member');
        
            $d->setTable('member');
            if ($d->insert($datamem)) {
               
            }

           /* $sql = "INSERT INTO  table_member (user,pass,name,ngaytao,dienthoai,hienthi,com) VALUES ('$email_re','$pass_re','$name_re','$ngaydangky','$phone_re',1,'user')";
            mysql_query($sql) or die(mysql_error());

            $id = mysql_insert_id();*/

            $d->reset();
            $sql = "select user,name,id,dienthoai from #_member where id = '".$idmem."'";
            $d->query($sql);
            $memberlogin = $d->fetch_array();

            $d->reset();
            $sql = "select id from #_member order by id desc";
            $d->query($sql);
            $membercuoi = $d->fetch_array();

            $_SESSION['checkregister']['id'] = $membercuoi['id'];
            $_SESSION['mem_login']['email'] = $memberlogin['user'];
            $_SESSION['mem_login']['phone'] = $memberlogin['dienthoai'];
            $_SESSION['mem_login']['name'] = $memberlogin['name'];
            $_SESSION['mem_login']['id'] = $memberlogin['id'];
            
            $body = '<p style="margin-bottom:20px;">Chúc mừng Quý khách hàng đã trở thành hành viên cùng với Gia đình Yomie Vietnam. Đặc biệt, khi mua Online - đều được tích điểm đổi những phần quà hấp dẫn</p>';

            $body .= '<table style="width: 100%;border:1px solid #f4f4f4;">
            <caption style="padding: 5px;color:#fff;background:#f6a003;font-size: 16px;">Thông tin đăng nhập</caption>
            <tbody>
                <tr>
                    <td style="border:1px solid #f4f4f4;width: 50%;padding: 8px 0px;text-align: center;">Username</td>
                    <td style="border:1px solid #f4f4f4;width: 50%;padding: 8px 0px;text-align: center;"><b>'.$email_re.'</b></td>
                </tr>
                <tr>
                    <td style="border:1px solid #f4f4f4;width: 50%;padding: 8px 0px;text-align: center;">Password</td>
                    <td style="border:1px solid #f4f4f4;width: 50%;padding: 8px 0px;text-align: center;"><b>'.$pass_re_full.'</b></td>
                </tr>
            </tbody>
            </table>';


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
                $mail->SetFrom($email_re, 'Thông tin đăng ký tài khoản');
                $mail->AltBody = "This is a plain-text message body";
                $mail->Subject = "Thông tin đăng ký tài khoản";
                $mail->MsgHTML($body);
                $mail->Body = $body;
                $mail->AddAddress($email_re);
                //$mail->AddBCC($_POST['email']);
                $mail->AddReplyTo($email_re, 'Thông tin đăng ký tài khoản');
                if (!$mail->Send()) {
                    //$str = "<span style='color:red'>Gửi mail thất bại</span>";
                    //echo json_encode(array("giaodien" => $str, "loai" => '0'));
                }else{
                   
                    echo json_encode(array("giaodien" => $str, "loai" => '1'));
                }    

        
    }else{
        $str = $error_email;
        $str2 = $error_phone;
        echo json_encode(array("giaodien" => $str,"giaodien2" => $str2,"loai" => '0'));
    }
}

?>

