<?php

include ("configajax.php");

$dulieu= $_POST['id'];
$act = $_REQUEST['act'];
switch ($act) {
    case "testcode":
        testcode();
        break;
    case "resetpro":
        resetpro();
        break;
    case "loadincrease":
        loadincrease();
        break;
    case "loaddecrease":
        loaddecrease();
        break;    
    case "loadpricetopping":
        loadpricetopping();
        break;
    case "loadpricesize":
        loadpricesize();
        break;
    case "loadsearch":
        loadsearch();
        break;
    case "comment":
        comment();
        break;
    case "step1":
        step1();
        break;
    case "city":
        loadquan();
        break;
    case "dis":
        loadstores();
        break;  
    case "store":
        loadboxstores();
        break; 
    case "calldistrict":
        loadquan1();
        break;
    case "gettt":
        gettt();
        break;
    case "getmap":
        getmap();
        break;             
}
function getmap(){
    global $d;
    $id = $_POST['id'];  
    $d->reset();
    $sql = "select * from #_icon where type='diachi' and hienthi = 1 and id = ".$id." ";
    $d->query($sql);
    $diachi = $d->fetch_array();

    echo $diachi['mota_vi'];
}

function gettt(){
    global $d;
    $id = $_POST['id'];  
    $d->reset();
    $sql = "select * from #_icon where type='diachi' and hienthi = 1 and text3_vi = ".$id." order by stt,id desc";
    $d->query($sql);
    $diachi = $d->result_array();

    foreach($diachi as $kp=>$vp){
        $str .='<a class="tinhthanhstyle">'.$vp['ten_vi'].'</a>';
    }
    echo $str;
    //echo json_encode(array('diachi'=>$str));
}

function testcode(){
    global $d;
    $giatri = $_POST['gt'];
    $d->reset();
    $sql = "select * from #_icon where hienthi = 1 and com = 'magiamgia' and ten_vi = '".$giatri." ' ";
    $d->query($sql);
    $codes = $d->fetch_array();
    if($codes == ''){
        $data = 0;
        unset($_SESSION['payc']['codes']);
        $str = "<span style='color:red'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp;&nbsp;".change_lang('Mã nhập không chính xác','The code is incorrect')."</span>";
        $totalprice = number_format(get_order_total() + $_SESSION['payc']['priceship'],0,',','.').' đ';
    }else{
        $data = 1;
        $str = "<span style='color:green'><i class='fa fa-check' aria-hidden='true'></i>&nbsp;&nbsp;".change_lang('Áp dụng thành công','The code is correct')." ( - ".$codes['gia']."% ) (Lưu ý: Không áp dụng cho chương trình tích điểm) </span>";
        $_SESSION['payc']['codes'] = $giatri;
        $ptsale = $codes['gia'];
        $prsale = ((get_order_total() * $codes['gia']) / 100);
        $totalprice = number_format( (get_order_total() - $prsale ) + $_SESSION['payc']['priceship'],0,',','.').' đ';
        //echo json_encode(array('pricepro'=>$pricemore));
    }
    echo json_encode(array('err'=>$data,'codes'=>$str,'totalprice'=>$totalprice));
}

function resetpro(){
    unset($_SESSION['bef_size']);
    unset($_SESSION['bef_prsize']);
    unset($_SESSION['pricepro']);
    unset($_SESSION['bef_top']);
    unset($_SESSION['bef_idtop']);
    unset($_SESSION['in_qty']);
    unset($_SESSION['de_qty']);
}
function loaddecrease(){
    global $d;
    $qty= $_POST['qty'];
    $_SESSION['de_qty'] = $qty;
    unset($_SESSION['in_qty']);

    $d->reset();
    $sql = "select id,gia from #_product where hienthi = 1 and type = 'size' and id='" . $_SESSION['bef_size'] . "' ";
    $d->query($sql);
    $psizeold = $d->fetch_array();

    $sum = 0;
    $arridtopping = $_SESSION['bef_idtop'];
    for ($i=0; $i < count($arridtopping); $i++ ) {
        if($arridtopping[$i] != ''){
            $d->reset();
            $sql="select id,gia from #_product where type='topping' and id = ".$arridtopping[$i]."";
            $d->query($sql);
            $topsimple=$d->fetch_array();
            $sum = $sum + $topsimple['gia'];
        }
    }

    $v1 = $_SESSION['pricepromain']; // product price
    $v2 = $psizeold['gia'];
    $v3 = $sum ;

    $_SESSION['pricepro'] = ($v1 + $v2 + $v3)*$qty;
    $pricemore = number_format($_SESSION['pricepro'],0,',','.').' đ';
    echo json_encode(array('pricepro'=>$pricemore));
}
function loadincrease(){
    global $d;
    $qty= $_POST['qty'];
    $_SESSION['in_qty'] = $qty;
    unset($_SESSION['de_qty']);

    $d->reset();
    $sql = "select id,gia from #_product where hienthi = 1 and type = 'size' and id='" . $_SESSION['bef_size'] . "' ";
    $d->query($sql);
    $psizeold = $d->fetch_array();

    $sum = 0;
    $arridtopping = $_SESSION['bef_idtop'];
    for ($i=0; $i < count($arridtopping); $i++ ) {
        if($arridtopping[$i] != ''){
            $d->reset();
            $sql="select id,gia from #_product where type='topping' and id = ".$arridtopping[$i]."";
            $d->query($sql);
            $topsimple=$d->fetch_array();
            $sum = $sum + $topsimple['gia'];
        }
    }

    $v1 = $_SESSION['pricepromain']; // product price
    $v2 = $psizeold['gia'];
    $v3 = $sum ;

    $_SESSION['pricepro'] = ($v1 + $v2 + $v3)*$qty;
    $pricemore = number_format($_SESSION['pricepro'],0,',','.').' đ';
    echo json_encode(array('pricepro'=>$pricemore));
}

function loadpricetopping(){
    global $d;
    $id= $_POST['id'];
    $arridtopping = explode(',', $id);
    $sum = 0;
    for ($i=0; $i < count($arridtopping); $i++ ) {
        if($arridtopping[$i] != ''){
            $d->reset();
            $sql="select id,gia from #_product where type='topping' and id = ".$arridtopping[$i]."";
            $d->query($sql);
            $topsimple=$d->fetch_array();
            $sum = $sum + $topsimple['gia'];
        }
    }

    $d->reset();
    $sql = "select id,gia from #_product where hienthi = 1 and type = 'size' and id='" . $_SESSION['bef_size'] . "' ";
    $d->query($sql);
    $psizeold = $d->fetch_array();

    $v1 = $_SESSION['pricepromain']; // product price
    $v2 = $psizeold['gia'];
    $v3 = $sum ;
    $qty = 1;
    if(isset($_SESSION['in_qty'])){
        $qty = $_SESSION['in_qty'];
    }
    if(isset($_SESSION['de_qty'])){
        $qty = $_SESSION['de_qty'];
    }
    $_SESSION['pricepro'] = ($v1 + $v2 + $v3)*$qty;
    $_SESSION['bef_idtop'] = $arridtopping;
    $_SESSION['bef_top'] = $sum;
    $pricemore = number_format($_SESSION['pricepro'],0,',','.').' đ';
    echo json_encode(array('pricepro'=>$pricemore));
}
function loadpricesize(){
    global $d;
    $id= $_POST['id'];
    $status = $_REQUEST['status'];

    $d->reset();
    $sql = "select id,gia from #_product where hienthi = 1 and type = 'size' and id='" . $id . "' ";
    $d->query($sql);
    $psize = $d->fetch_array();
    
    if($status == 1){
        $data = 0; //Tồn tại dữ liệu
    }
    if($status == 0){
       $data = 1; //Dữ liệu mới chọn

        $sum = 0;
        $arridtopping = $_SESSION['bef_idtop'];
        for ($i=0; $i < count($arridtopping); $i++ ) {
            if($arridtopping[$i] != ''){
                $d->reset();
                $sql="select id,gia from #_product where type='topping' and id = ".$arridtopping[$i]."";
                $d->query($sql);
                $topsimple=$d->fetch_array();
                $sum = $sum + $topsimple['gia'];
            }
        }

        $v1 = $_SESSION['pricepromain']; // product price
        $v2 = $psize['gia'];
        $v3 = $sum ;
        $qty = 1;
        if(isset($_SESSION['in_qty'])){
            $qty = $_SESSION['in_qty'];
        }
        if(isset($_SESSION['de_qty'])){
            $qty = $_SESSION['de_qty'];
        }
        $_SESSION['pricepro'] = ($v1 + $v2 + $v3)*$qty;

        $_SESSION['bef_size'] = $id;
    }
    
    $pricemore = number_format($_SESSION['pricepro'],0,',','.').' đ';
    echo json_encode(array('status'=>$data,'pricepro'=>$pricemore));
}

function loadsearch(){
    global $d;
    $_SESSION['search']['idd'] = $_POST['idd'];
    $_SESSION['search']['namekey'] = $_POST['namekey'];
}

function comment() {
    global $config_url, $d, $row_setting;

    $sodt = $_POST['dienthoai'];
    $ten = $_POST['hoten'];
    $email = $_POST['email'];
    $tieude = $_POST['tieude'];
    $noidung = $_POST['noidung'];
    $rating = $_POST['rating'];
    $id_sp = $_POST['id_sp'];


    //validate dữ liệu
    $sodt = trim(strip_tags($sodt));
    $ten = trim(strip_tags($ten));
    $email = trim(strip_tags($email));
    $tieude = trim(strip_tags($tieude));
    $noidung = trim(strip_tags($noidung));
    $_SESSION['email_reg'] = $email;

    $coloi = false;
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
        $coloi = true;
        $error_email = "Email không đúng định dạng <br>";
    }

    if ($sodt == NULL) {
        $coloi = true;
        $error_sodt = "Chưa nhập số điện thoại<br>";
    }

    if ($ten == NULL) {
        $coloi = true;
        $error_ten = "Chưa nhập họ tên <br>";
    }

    if ($email == NULL) {
        $coloi = true;
        $error_email = "Chưa nhập địa chỉ email <br>";
    }

    if ($tieude == NULL) {
        $coloi = true;
        $error_diachi = "Chưa nhập tiêu đề bình luận <br>";
    }
    if ($noidung == NULL) {
        $coloi = true;
        $error_username = "Chưa nhập nội dung bình luận <br>";
    }

    $thongbao = ' <div class="error_mess">' . $error_hoten . $error_username . $error_diachi . $error_sodt . '</div>';

    if ($coloi == FALSE) {
        $d->reset();
        $data["ngaytao"] = time();
        $data["hoten"] = $ten;
        $data["email"] = $email;
        $data["dienthoai"] = $sodt;
        $data["ten"] = $tieude;
        $data["noidung"] = $noidung;
        $data["danhgia"] = $rating;
        $data["id_sp"] = $id_sp;
        $d->setTable("comment");
        if ($d->insert($data)) {
            $rs["id"] = 1;
            $rs["thongbao"] = "<span style='color:red;'>Cảm ơn bạn đã nhận xét sản phẩm này. Nhận xét của bạn sẽ được duyệt và đăng lên trong thời gian sớm nhất. </span>";
        } else {
            $rs["id"] = 0;
            $rs["thongbao"] = "<span style='color:red;'>Nhận xét thất bại. </span>";
        }
    } else {
        $rs["id"] = 0;
        $rs["thongbao"] = $thongbao;
    }
    echo json_encode($rs);
}

function step1() {
    global $d, $row_setting;

    $chon = $_POST['chon'];
    $username = $_POST['email'];
    $password = $_POST['pass'];
    if ($chon == 2) {
        $_SESSION["thanhtoan"]["email"] = $username;
        $rs["id"] = 1;
        $rs["thongbao"] = "";
        $rs["url"] = "thanh-toan.html";
    } else {
        /* $username = mysql_real_escape_string($username); */
        $matkhau = mysql_real_escape_string($matkhau);
        $sql = "select * from #_member where email='" . $username . "'";
        $d->query($sql);
        if ($d->num_rows() == 1) {
            $row = $d->fetch_array();
            if ($row['hienthi'] == 1) {
                if ($row['password'] == md5($password)) {
                    $_SESSION[$login_name] = true;
                    $_SESSION['login_web']['id'] = $row['id'];
                    $_SESSION['login_web']['username'] = $row['email'];
                    $_SESSION['login_web']['ten'] = $row['ten_vi'];
                    $_SESSION['login_web']['com'] = $row['com'];
                    $rs["id"] = 1;
                    $rs["thongbao"] = "<span style='color:#f00;'>Đăng nhập thành công!. Hệ thống sẽ chuyển trang trong giây lát. </span>";
                    $rs["url"] = "thanh-toan.html";
                } else {
                    $rs["id"] = 0;
                    $rs["thongbao"] = "<span style='color:#f00'>Mật khẩu đăng nhập chưa đúng.</span><a href='quen-mat-khau.html'>Quên mật khẩu</a>";
                }
            } else {
                $rs["id"] = 0;
                $rs["thongbao"] = "<span style='color:#f00'>" . _taikhoanchuakichhoat . "</span>";
            }
        } else {
            $rs["id"] = 0;
            $rs["thongbao"] = "<span style='color:#f00'>Tài khoản không tồn tại </span>";
        }
    }
    echo json_encode($rs);
}
function loadquan1() {
    global $d,$lang;
        $id = $_POST['id'];  
        $d->reset();
        $sql = "select id,ten_$lang as ten,gia from table_product_list where type='quanhuyen1' and com = 2 and hienthi = 1 and id_parent = ".$id." order by stt asc,ten desc";
        $d->query($sql);
        $quan = $d->result_array();
        
      $str = "<option value=''>".change_lang('Chọn Quận/Huyện','Select District')."</option>";
      foreach($quan as $kp=>$vp){
      $str .='<option value="'.$vp['id'].'">'.$vp['ten'].'</option>';
      }
      
      echo json_encode(array('quan'=>$str));
}
function loadquan() {
    global $d,$dulieu,$lang;  
        $d->reset();
        $sql = "select id,ten_$lang as ten from table_product_list where type='quanhuyen' and com = 2 and hienthi = 1 and id_parent = ".$dulieu." order by stt asc,ten desc";
        $d->query($sql);
        $quan = $d->result_array();

      $str = "<option value=''>".change_lang('Hãy chọn Quận/Huyện','Choose District','')."</option>";
      foreach($quan as $kp=>$vp){
      $str .='<option value="'.$vp['id'].'">'.$vp['ten'].'</option>';
      }
      
      echo json_encode(array('quan'=>$str));
}

function loadstores() {
    global $d,$dulieu,$lang;  
        $d->reset();
        $sql = "select id,ten_$lang as ten from table_product where type='cua-hang' and  hienthi = 1 and id_item = ".$dulieu." order by stt asc,ten desc";
        $d->query($sql);
        $quan = $d->result_array();

      $str = "<option value=''>".change_lang('Hãy chọn cửa hàng bạn muốn xem','Choose Stores','')."</option>";
      foreach($quan as $kp=>$vp){
      $str .='<option value="'.$vp['id'].'">'.$vp['ten'].'</option>';
      }
      
      echo json_encode(array('store'=>$str));
}

function loadboxstores() {
    global $d,$dulieu,$lang;  
    $d->reset();
    $sql = "select id,ten_$lang as ten,matbangtang,sdt from table_product where type='cua-hang' and  hienthi = 1 and id = ".$dulieu." ";
    $d->query($sql);
    $store = $d->fetch_array();

    $str = "<div style='box-sizing: border-box;padding: 0px;width:100%;float:left;box-sizing: border-box;'>";
    $str .= "<p class='content_home' style='margin-bottom:10px;padding:0px 15px;box-sizing: border-box;'>".change_lang('Điện thoại','Phone','').":  <span style='color: #b27f12;font-family:opensans-bold;'>".$store['sdt']."</span></p>";
    $str .= "<p class='content_home' style='margin-bottom:10px;padding:0px 15px;box-sizing: border-box;'>".change_lang('Địa chỉ','Address','').": <span style='color: #b27f12;font-family:opensans-bold;'>".$store['ten']."</span></p>"; 
    $str .= "<div style='margin-top:10px;float:left;width:100%;'>".$store['matbangtang']."</div>" ;
    $str .= "</div>";
    echo json_encode(array('addstore'=>$str));
}

?>