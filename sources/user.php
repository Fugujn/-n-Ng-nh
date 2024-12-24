<?php
session_start();

if (!defined('_source'))
    die("Error");

$d->reset();
$sql = "select * from #_setting ";
$d->query($sql);
$rs_setting = $d->fetch_array();

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch ($act) {
    
    case "update":
        if (!empty($_POST))
        changeinfo($_SESSION['mem_login']['email']);
        $template = "capnhattaikhoan";
        break;
    case "profile":    
        $template = "profile";
        break;
    case "theodoi":    
        $template = "theodoi";
        break;
    case "quanlydoithuong":    
        $template = "quanlydoithuong";
        break;
    case "editnew":    
        $template = "editnew";
        break;
    case "postnew":    
        $source = "postnew";
        $template = "postnew";
        break;
    case "changepassword":
        if (!empty($_POST))
        changemk($_SESSION['mem_login']['email']);
        $template = "doimatkhau";
        break;

    default:
        $template = "index";
}

function get_item($id) {
    global $d, $item;
    if (!$id)
        transfer(_banchuadangnhap, "index.php?com=user&act=login");

    $sql = "select * from #_thanhvien where id='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer(_dulieukhongtontai, "index.php?com=user&act=login");
    $item = $d->fetch_array();
}

function login() {
    global $d, $login_name, $error_login, $error_ccc, $error_email, $error_matkhau, $coloi;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass = md5($password);
    $sql = "select * from #_member where user='" . $email . "' and pass='" . $pass . "'";
    $d->query($sql);

    $coloi = false;

    if ($email == NULL) {
        $coloi = true;
        $error_email = "Bạn chưa nhập email !";
    }
    if ($password == NULL) {
        $coloi = true;
        $error_matkhau = "Bạn chưa nhập mật khẩu !";
    }

    if ($d->num_rows() == 1) {
        $row = $d->fetch_array();
        if ($row['hienthi'] == 1) {
            if ($row['pass'] == md5($password)) {
                $_SESSION[$login_name] = true;
                //$_SESSION['mem_login']['ok'] = 1;
                $_SESSION['mem_login']['mem_mail'] = $row['user'];
                //$_SESSION['mem_login']['mem_level'] = $row['hienthi'];
                if (isset($_SESSION['back']))
                    $url = $_SESSION['back'];
                else
                    $url = 'quan-tri.html';
                transfer("Đăng nhập thành công !", $url);
            }else /* transfer("Mật khẩu không đúng !",$_SESSION['goBack']); */
            if ($error_ccc == NULL) {
                $coloi = true;
                $error_ccc = "Mật khẩu không đúng.";
            }
        } elseif ($row['type'] == 2 && $row['hienthi'] != 1) {
            transfer("Tài khoản được đăng ký là công tác viên <br> Vui lòng liên hệ quản trị viên !", $_SESSION['goBack']);
        }
        if ($error_ccc == NULL) {
            $coloi = true;
            $error_ccc = "Tài khoản tạm khóa.Vui lòng liên hệ quản trị viên.";
        }
    } else {


        if ($error_ccc == NULL) {
            $coloi = true;
            $error_ccc = "Tài khoản không đúng.Vui lòng nhập lại.";
        }
    }
}

function changemk($id) {
    global $d, $error_matkhau,$error_password;
    //tiếp nhận dữ liệu
    $passold = $_POST['matkhaucu'];
    $matkhau = $_POST['matkhaumoi'];
    $golaimatkhau = $_POST['golaimatkhaumoi'];
 
    $coloi = false;
    if ($passold == NULL) {
        $coloi = true;
        $error_password = "Chưa nhập mật khẩu cũ";
    }
    if ($golaimatkhau == NULL && $matkhau != NULL) {
        $coloi = true;
        $error_password = "Chưa nhập mật khẩu mới";
    }
    if ($matkhau != NULL && strlen($matkhau) < 6) {
        $coloi = true;
        $error_password = "Mật khẩu ít nhất 6 kí tự";
    }
    if ($matkhau != $golaimatkhau && $matkhau != NULL) {
        $coloi = true;
        $error_password = "Xác nhận mật khẩu không đúng";
    }
    $passold = md5($passold);
    $d->reset();
    $sql = "select * from table_member where user ='".$id."' and pass = '".$passold."' ";
    $d->query($sql);
    $result = $d->fetch_array();
    if ($result['name'] == '') {
        $coloi = true;
        $error_password = "Mật khẩu cũ không đúng";
    }

    if ($coloi == false) {
        $data['pass'] = md5($matkhau);
        $d->reset();
        $d->setTable('member');
        $d->setWhere('user', $id);
        if ($d->update($data)) { 
            transfer("Đổi mật khẩu thành công", 'user.html&act=update'); 
        }
    }
}



function changeinfo($id) {
    global $d, $name, $dienthoai, $diachi, $email, $coloi, $error_email, $error_captcha,$error_dienthoai, $loaitv;

    $d->reset();
    $sql = "select * from table_member where user='" . $_SESSION['mem_login']['email'] . "'";
    $d->query($sql);
    $result_info_mem = $d->fetch_array();
    $idmem = $result_info_mem['id'];


    $name = $_POST['ten'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    
    $name = addslashes($name);
    $dienthoai = addslashes($dienthoai);
    $diachi = addslashes($diachi);
   

    


    /*$file_name = fns_Rand_digit(0, 9, 12);
    if ($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG', _upload_hinhanh_l, $file_name.time())) {
        $avata = $photo;
        $avatathumb = create_thumb($avata,110,110,_upload_hinhanh_l ,_upload_thumb_l,$file_name.time().'_thumb',1);
        $d->setTable('member');
        $d->setWhere('user', $id);
        $d->select();
        if ($d->num_rows() > 0) {
            $row = $d->fetch_array();
            delete_file(_upload_hinhanh_l . $row['avata']);
            delete_file(_upload_thumb_l . $row['noidungvp']);
        }   
    }*/

    $coloi = false;
    $error_note = 0;
   
    if ($name == NULL) {
        $coloi = true;
        $error_lastname = "Bạn chưa nhập tên .";
    }
  
    if ($dienthoai == NULL) {
        $coloi = true;
        $error_dienthoai = "Bạn chưa nhập số điện thoại";
    }

    $d->reset();
    $sql = "select * from table_member where user <> '" . $_SESSION['mem_login']['email'] . "' and dienthoai = '".$dienthoai."' ";
    $d->query($sql);
    $result_p = $d->fetch_array();

    if (count($result_p) > 0) {
        $coloi = true;
        $error_dienthoai = "Số điện thoại đã được sử dụng";
    }

    if ($coloi == false) {
        
        /*if ($_FILES['file']['name'] != '') {
            $datamem['avata'] = $avata;
            $datamem['noidungvp'] = $avatathumb;
        }*/

        $datamem['name'] = $name;
        $datamem['dienthoai'] = $dienthoai;
        $datamem['diachi'] = $diachi;
        

        $d->setTable('member');
        $d->setWhere('id', $idmem);
        if ($d->update($datamem)) {
            transfer(change_lang('Cập nhật thành công', 'Update successful'),$_SESSION['goBack']);
        }
    }
}

function changeavatar($id, $file_name) {
    global $d, $error_avatar;

    if ($photo = upload_image("file", 'jpg|png|gif', _upload_avatar_l, $file_name)) {
        $thumb = create_thumb($photo, 128, 128, _upload_avatar_l, $file_name, 1);
        $sql = "update table_thanhvien set photo ='$photo',thumb='$thumb' where id ='$id'";
        mysql_query($sql) or die(mysql_error());
    } else
        $error_avatar = 'Upload bị lỗi';
}

function history($id) {
    global $d, $item_history;
    if (!$id)
        transfer(_banchuadangnhap, "index.php?com=user&act=login");

    $sql = "select * from #_history where id_user ='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer(_dulieukhongtontai, "index.php?com=user&act=login");
    $item_history = $d->result_array();
}

function resetpass() {
    global $d, $error_email;
    //tiếp nhận dữ liệu	
    $email = $_POST['emailmk'];

    $email = trim(strip_tags($email));
    if (get_magic_quotes_gpc() == false) {
        $email = mysql_real_escape_string($email);
    }
    $coloi = false;
    if ($email == NULL) {
        $coloi = true;
        $error_email = "<br>" . _chuanhapemail;
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
        $coloi = true;
        $error_email = "<br>" . _emailkhongdung;
    }
    if ($_SESSION['captcha_code'] != $_POST['capt']) {
        $coloi = true;
        $error_captcha = "<br/><i>" . _saimabaove . "</i>"; // xử lý lỗi
    }
//     kiem tra email trùng
    $d->reset();
    $d->setTable('member');
    $d->setWhere('user', $email);
    $d->select();
    if ($d->num_rows() != 1) {
        transfer("Không tồn tại mail", "index.php?com=user&act=login");
    } else {

        if ($coloi == FALSE) {
            $randomkey = ChuoiNgauNhien(8);
            //echo $randomkey;exit;	
            $d->reset();
            //$passdoi = $randomkey; 
            $data['pass'] = md5($randomkey);
            //$sqlmk = "update table_member SET pass = '".md5($randomkey)."' where user = '".$email."'";


            $d->reset();
            $d->setTable('member');
            $d->setWhere('user', $email);
            if ($d->update($data)) {
                //$link = "http://". $_SERVER['SERVER_NAME']."/lostpass.php";		
                //$link = $link . "?email=$email&rd=$randomkey";
                /* include_once _lib."C_email.php";
                  $to['name'] =$email;
                  $to['email'] =$email;
                  $from['name'] ='nhadatsohong.vn';
                  $from['email'] ='danghai.ptit@gmail.com';
                  $subject = 'Lấy lại mật khẩu tại nhadatsohong.vn';
                  $body = 'Mật khẩu mới: '.$randomkey;
                  $e = new C_email;
                  $e->MailSend($to, $subject, $body, $from); */

            $body = 'Mật khẩu mới :' . $randomkey;
            $subject = "Lấy lại mật khẩu";

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
            $mail->SetFrom($email_company, $subject);
            $mail->AltBody = "This is a plain-text message body";
            $mail->Subject = "Cart information";
            $mail->MsgHTML($body);
            $mail->Body = $body;
            $mail->AddAddress($email,$subject);
            // $mail->AddReplyTo($email_company, $subject);
            

            if (!$mail->Send()) {
                $error = 'Gởi mail bị lỗi: ' . $mail->ErrorInfo;
                // echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
                return false;
            } else {
                transfer("Thông tin khôi phục đã được gửi vào mail của bạn.<br>Cảm ơn.", "user.html&act=login");
                return true;
            }   

             
//                include('phpmailer/class.phpmailer.php');
//                $mail = new PHPMailer();
//                $mail->IsSMTP();  // telling the class to use SMTP
//                $mail->Mailer = "smtp";
//                $mail->Host = "103.1.236.58";
//                $mail->Port = 25;
//                $mail->SMTPAuth = true; // turn on SMTP authentication
//                $mail->Username = "diaoclienv"; // SMTP username
//                $mail->Password = "weZ0wgnt"; // SMTP password
//                $mail->From = "diaoclienv@diaoclienviet.com";
//                $mail->AddAddress($email);
//                $mail->AddCC($email, $email);
//                $mail->CharSet = ("UTF-8");
//                $mail->Subject = "Thông tin mật khẩu";
//                $mail->MsgHTML($body);
//                $mail->Body = 'Mật khẩu mới :' . $randomkey;
//                $mail->WordWrap = 50;
//                $mail->Send();
//                $yc = "<span style='font-family:Tahoma'>Yêu cầu của bạn đã được gửi!<br>Bạn cần vào mail $email để lấy mật khẩu mới<br><br>Vui lòng kiểm tra hộp thư spam nếu chưa nhận được mật khẩu.</span>";
//                transfer($yc, "user.html&act=login");
            }
        }
    }
}

function thanhviennb($solg) {
    global $d;
    $sql = "select username,photo,magioithieu from #_user where active=1 and noibat>0 order by username limit 0,$solg";
    $d->query($sql);
    return $d->result_array();
}

function huongdandk() {
    global $d;
    $sql = "select noidung_vi,noidung_en from #_hddk";
    $d->query($sql);
    return $d->result_array();
}

function getfamyli($id) {
    global $d;
    $sql = "select id,username,photo from #_user where id_user = '$id' order by username";
    $d->query($sql);
    return $d->result_array();
}

function changemoney($id) {
    global $d, $thongbao;
    //tiếp nhận dữ liệu
    if ($id) {
        $money = $_POST['money'];
        $typemoney = $_POST['typemoney'];

        //validate dữ liệu
        $money = trim(strip_tags($money));
        $typemoney = trim(strip_tags($typemoney));


        settype($money, "int");
        settype($typemoney, "int");
        $coloi = false;
        if ($money < 0) {
            $coloi = true;
            $error_moneyvnd = "Bạn chưa nhập số tiền cần chuyển<br>";
        }

        $thongbao = ' <div class="error_mess">' . $error_moneyvnd . '</div>';
        if ($coloi == FALSE) {

            if ($typemoney == 1) {

                $sql = "select money_vnd from table_user where id ='$id'";
                $d->query($sql);
                $row = $d->fetch_array();

                if ($row['money_vnd'] < $money)
                    transfer("Số tiền bạn có trong tài khoản không dủ<br/>", "index.php?com=user&act=changemoney");
                else {
                    $sotienkv = $money * 10;
                    $sql = "update table_user set 	money_vnd=	money_vnd-'$money' , 	money_kv=	money_kv+ '$sotienkv'  where id ='$id'";
                    mysql_query($sql) or die(mysql_error());
                    transfer("Chuyển tiền thành công<br/>", "index.php");
                }
            } elseif ($typemoney == 2) {

                $sql = "select money_kv from table_user where id ='$id'";
                $d->query($sql);
                $row = $d->fetch_array();

                if ($row['money_kv'] < $money)
                    transfer("Số tiền bạn có trong tài khoản không dủ<br/>", "index.php?com=user&act=changemoney");
                else {
                    $sotienvnd = $money / 10;
                    $sql = "update table_user set money_vnd=	money_vnd+'$sotienvnd' , 	money_kv=	money_kv- '$money'  where id ='$id'";
                    mysql_query($sql) or die(mysql_error());
                    transfer("Chuyển tiền thành công<br/>", "index.php");
                }
            }
        }
    } else {
        transfer(_banchuadangnhap . "<br/>", "index.php");
    }
}

function logout_u() {
    //$_SESSION['mem_login']['mem_level']=false;
    //unset($_SESSION['mem_login']['mem_level']);
    $_SESSION['mem_login']['mem_mail'] = false;
    unset($_SESSION['mem_login']['mem_mail']);
    //unset($_SESSION['mem_login']);
    //$_SESSION['cart']=false;
    //$_SESSION['cart'] = '';
    //unset($_SESSION['cart']);
    transfer("Đăng xuất thành công", "index.html");
}

function dangky() {
    global $d, $name, $avata, $firstname, $comra, $lastname, $dienthoai, $diachi, $dienthoaicodinh, $captcha, $diachinoio, $diachigiaohang, $gioitinh, $matkhau, $golaimatkhau, $email, $ngaysinh, $error_note, $coloi, $error_email, $error_matkhau, $error_golaimatkhau, $error_ngaysinh, $error_gioitinh, $error_firstname, $error_lastname, $keyword, $error_captcha, $error_diachinoio, $error_diachigiaohang, $error_dienthoai, $error_dienthoaicodinh;

    $d->reset();
    $sql = "select * from #_setting limit 0,1";
    $d->query($sql);
    $row_setting = $d->fetch_array();
    $email_company = $row_setting['email'];


    $comra = $_POST['comra'];
    $email = $_POST['email'];
    //$folderemail = explode('@',$email);
    //$foldname = $folderemail[0];

    if (!is_dir('upload/thanhvien/' . $foldname)) {
        //mkdir('upload/thanhvien/'.$foldname);
    }

    $matkhau = $_POST['matkhau'];
    $golaimatkhau = $_POST['golaimatkhau'];

    //$ngaysinh = $_POST['ngaysinh'];
    //$gioitinh = $_POST['gioitinh'];
    //$firstname = $_POST['firstname'];	
    $name = $_POST['ten'];

    $dienthoai = $_POST['dienthoai'];
    //$dienthoaicodinh=$_POST['dienthoaicodinh'];


    $diachi = $_POST['diachi'];
    //$diachigiaohang=$_POST['diachigiaohang'];
    // $captcha = $_POST['captcha'];
    //validate dữ liệu
    $comra = trim(strip_tags($comra));
    $email = trim(strip_tags($email));
    $matkhau = trim(strip_tags($matkhau));
    $golaimatkhau = trim(strip_tags($golaimatkhau));
//	$ngaysinh = trim(strip_tags($ngaysinh));
    //$firstname = trim(strip_tags($firstname));
    $name = trim(strip_tags($name));

    $dienthoai = trim(strip_tags($dienthoai));
//	$dienthoaicodinh = trim(strip_tags($dienthoaicodinh));	

    $diachi = trim(strip_tags($diachi));
    //$diachigiaohang = trim(strip_tags($diachigiaohang));	
    // $captcha = trim(strip_tags($captcha));
//	$ngaydangky = date("Y-m-d H:i:s");	
    //settype($gioitinh,"int");
    if (get_magic_quotes_gpc() == false) {
        $comra = mysql_real_escape_string($comra);
        $email = mysql_real_escape_string($email);
        $matkhau = mysql_real_escape_string($matkhau);
        $golaimatkhau = mysql_real_escape_string($golaimatkhau);
        //$ngaysinh = mysql_real_escape_string($ngaysinh);
        //$firstname = mysql_real_escape_string($firstname);
        $name = mysql_real_escape_string($name);
        $dienthoai = mysql_real_escape_string($dienthoai);
        //$dienthoaicodinh = mysql_real_escape_string($dienthoaicodinh);	
        $diachi = mysql_real_escape_string($diachi);
        //$diachigiaohang = mysql_real_escape_string($diachigiaohang);		
        // $captcha = mysql_real_escape_string($captcha);
    }

    $coloi = false;
    $error_note = 0;
    if ($email == NULL) {
        $coloi = true;
        $error_email = "Bạn chưa nhập email !";
    }
    if ($matkhau == NULL) {
        $coloi = true;
        $error_matkhau = "Bạn chưa nhập mật khẩu !";
    }
    if (strlen($matkhau) < 6) {
        $coloi = true;
        $error_matkhau = "Mật khẩu phải ít nhất 6 ký tự !";
    }
    if ($golaimatkhau == NULL) {
        $coloi = true;
        $error_golaimatkhau = "Bạn chưa nhập lại mật khẩu !";
    }
    if ($matkhau != $golaimatkhau) {
        $coloi = true;
        $error_golaimatkhau = "Mật khẩu không trùng khớp !";
    }
    /* if ($firstname == NULL) { 
      $coloi=true; $error_firstname = _chuanhaptenlot;
      } */
    if ($name == NULL) {
        $coloi = true;
        $error_lastname = "Bạn chưa nhập tên !";
    }
    if ($diachi == NULL) {
        $coloi = true;
        $error_diachinoio = "Bạn chưa nhập địa chỉ !";
    }
    /* if ($diachigiaohang == NULL) { 
      $coloi=true; $error_diachigiaohang = _chuanhapdiachigiaohang;
      } */
    if ($dienthoai == NULL) {
        $coloi = true;
        $error_dienthoai = "Bạn chưa nhập số điện thoại !";
    }

    // if ($captcha == NULL) {
    //     $coloi = true;
    //     $error_captcha = "Bạn chưa nhập mã !";
    // }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
        $coloi = true;
        $error_email = "Email chưa được định dạng !";
    }


    if ($coloi == FALSE) {
        // kiem tra email trung
        $d->reset();
        $d->setTable('member');
        $d->setWhere('user', $email);
        $d->select();
        if ($d->num_rows() > 0) {
            $coloi = true;
            $error_email = "Email đã được sử dụng !";
        }
    }

    // if ($_SESSION['cap_code'] != $_POST['captcha']) {
    //     $coloi = true;
    //     $error_captcha = "Mã bảo vệ sai !"; // xử lý lỗi		   
    // }
    if ($coloi == FALSE) {
        $matkhau = md5($matkhau);
        $ngaydangky = time();
        if ($comra == 1) {
            $hienthi = 1;
        } else {
            $hienthi = 0;
        }
        $file_name = fns_Rand_digit(0, 9, 12);
        if ($photo2 = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh_l, $file_name)) {
            $avata = $photo2;
            // $data['thumb'] = create_thumb($data['photo'], 160, 105, _upload_sanpham_l,$file_name,1);		
        }

        $sql = "INSERT INTO  table_member (user,pass,name,diachi,ngaytao,dienthoai,hienthi,com,type,avata) VALUES ('$email','$matkhau','$name','$diachi','$ngaydangky','$dienthoai','$hienthi','user','$comra','$avata')";
        mysql_query($sql) or die(mysql_error());

        $d->query();
        $sql = "select * from table_member order by id desc limit 0,1";
        $d->query($sql);
        $memcuoi = $d->fetch_array();

        $idctv = $memcuoi['id'];
        if ($comra == 2) {
            $masoctv = 'MS' . $idctv;
        }
        $sql = "UPDATE table_member SET masoctv='$masoctv' WHERE id='$idctv' ";
        mysql_query($sql) or die(mysql_error());

//end
        $d->reset();
        $sql_tv = "select * from table_member where user='" . $email . "'";
        $d->query($sql_tv);
        $result_tv = $d->result_array();
        //$_SESSION['mem_login']['mem_level']=$result_tv[0]['role'];
//            $_SESSION['mem_login']['mem_mail'] = $result_tv[0]['user'];
        
        // gui mail đăng ký
        require_once ("phpmailer/class.phpmailer.php");
        require_once ("phpmailer/class.smtp.php");


        $subject = "Thư được gửi từ $row_setting[website]";
        //thiết lập thư gửi
        $body = '<div style="margin:5px 0px;float:left;width:100%">
                <p style="margin:0px">Cảm ơn bạn đã đăng ký làm thành viên của website chúng tôi</p>
            </div>';
        $body.= '<div style="margin:5px 0px;float:left;width:100%">
                <p style="margin:0px">Họ tên : '.$name.'</p>
            </div>';
        $body.= '<div style="margin:5px 0px;float:left;width:100%">
                <p style="margin:0px">Email : '.$email.'</p>
            </div>';
        $body.= '<div style="margin:5px 0px;float:left;width:100%">
                <p style="margin:0px">Địa chỉ : '.$diachi.'</p>
            </div>';
        $body.= '<div style="margin:5px 0px;float:left;width:100%">
                <p style="margin:0px">Điện thoại : '.$dienthoai.'</p>
            </div>';
        if($comra == 1){
            $body.= '<div style="margin:10px 0px;float:left;width:100%">
                <p style="margin:0px">Đăng ký dưới tài khoản thành viên</p>
            </div>';    
        } else {
            $body.= '<div style="margin:10px 0px;float:left;width:100%">
                <p style="margin:0px">Tài khoản của bạn được đăng ký dưới tài khoản nhân viên. Vui lòng liên hệ với quản trị viên:</br></p>
            </div>';    
            $body.= '<div style="margin:10px 0px;float:left;width:100%">
                <p style="margin:0px">Điện thoại : '.$row_setting['dienthoai_vi'].' </p>
            </div>';    
            $body.= '<div style="margin:10px 0px;float:left;width:100%">
                <p style="margin:0px">Địa chỉ : '.$row_setting['diachi_vi'].' </p>
            </div>';    
            $body.= '<div style="margin:10px 0px;float:left;width:100%">
                <p style="margin:0px">Email 1 : '.$row_setting['google'].' - '. $row_setting['email'] .' </p>
            </div>';    
        }
        $body.='Đây là hộp thư tự động<br /><br />
            Mọi yêu cầu giúp đỡ xin liên hệ mail: ' . $email_company . '<br /><br />
            Chúng tôi hân hạnh được phục vụ quý khách';

        // gửi mail
        //Khởi tạo đối tượng

        $subject = "Tài khoản mới đươc gửi từ $row_setting[website]";

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
        $mail->SetFrom($email_company, $subject);
        $mail->AltBody = "This is a plain-text message body";
        $mail->Subject = "Contact information";
        $mail->MsgHTML($body);
        $mail->Body = $body;
        $mail->AddAddress($email_company,$subject);
        $mail->AddBCC($email);
        $mail->AddReplyTo($email_company, $subject);
      

        if (!$mail->Send()) {
              $error = 'Gởi mail bị lỗi: ' . $mail->ErrorInfo;
              // echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
          return false;
        } else {
            if ($result_tv[0]['type'] == 1) {
                transfer("Bạn đã đăng ký thành công. <br/>", "user.html&act=login");
            } else {
                transfer("Bạn đã đăng ký làm cộng tác viên. Xin đợi chúng tôi xác nhận tài khoản của bạn <br/><br/> Hoặc liên hệ với ban quản trị ", "user.html&act=login");
            }
              return true;
        }


        // end
    }
}

?>