
<style type="text/css">
    .nd_tonghop img{width:100% !important;height:auto !important;margin-top:10px}
    .nd_tonghop{color:#696a6d !important;font-family: Arial !important}
    .nd_tonghop p{font-size:13px;line-height: 20px;color:#696a6d !important;font-family: Arial !important}
    .nd_tonghop span{font-size:13px;line-height: 20px;color:#696a6d !important;font-family: Arial !important}
    .nd_tonghop a{font-size:13px;line-height: 20px;color:#696a6d !important;font-family: Arial !important}
    .summary{color:#545454}
    .othernews ul li a{color:#696a6d}
    .othernews ul li{margin-top:10px;}

    .baokhunggia{width:100%;float:left;border:1px solid #e8e8e8;}
    .baokhunggiatrong{width:100%;float:left;border-bottom:1px solid #e8e8e8;}
    .khungbaogia{float:left;text-align: center;border-right:1px solid #e8e8e8}
    .khungbaogia p{padding: 10px 5px}
    .khungbaogia img{width:80%}

    .forminfo{width:100%;float:left;margin-top:20px}
    .leftinfo{width:160px;float:left}
    .rightinfo{width:400px;float:left}
    .rightinfo input{width:290px;float:left;height:30px;padding-left:10px;border:1px solid #e8e8e8;}

    .phuongthuc{width:96%;border:1px solid #e8e8e8;padding:2%;float:left;margin:10px 0px}
</style> 
<?php
session_start();
$d->reset();
$sql = "select * from #_news_hinhanh where id_photo = '" . $tintuc_detail[0]['id'] . "'";
$d->query($sql);
$showspnews = $d->result_array();

$d->reset();
$sql = "select * from #_time where type = 'noi-dia'";
$d->query($sql);
$hieulucbaogia = $d->result_array();

$d->reset();
$sql = "select * from #_time where type = 'quoc-te'";
$d->query($sql);
$phuongthucthanhtoan = $d->result_array();

$d->reset();
$sql = "select * from #_time where type = 'nhan-hang'";
$d->query($sql);
$thoigianbaohanh = $d->result_array();

$d->reset();
$sql = "select * from #_setting limit 0,1";
$d->query($sql);
$row_setting = $d->fetch_array();
$email_company = $row_setting['email'];

if (isset($_GET['id'])) {
    unset($_SESSION['aaa']);
}
?>
<script type="text/javascript">
    $(document).ready(function (e) {
        $(".change_qty").change(function () {
            $val = parseInt($(this).val());
            if (parseInt($val) < 0) {
                $(this).val(0);
                $val = 0;
            }
        })
    });


    function loadsl(id) {
        $(".doimau" + id).css("background", "#e8e8e8");
        var x = document.getElementById("soluong" + id).value;
        if (x == 0) {
            $(".doimau" + id).css("background", "white");
        }
        $.ajax({
            url: "xuly1.php",
            type: "post",
            cache: false,
            data: {sl: x, id: id},
            success: function (trave) {
                $('.tonggiatotal').html(trave);
                unset($_SESSION['aaa']);
            }
        });
    }
//    function load_ajax(ids) {
//        var ducid = new Array();
//        $("input:checkbox[id=okcheck]:checked").each(function () {
//            ducid.push($(this).val());
//        });
//        $.ajax({
//            url: "xuly.php",
//            type: "post",
//            cache: false,
//            data: {arr: ducid},
//            success: function (trave) {
//                $('.tonggiatotal').html(trave);
//            }
//        });
//
//    }
</script>

<?php
if (isset($_POST['baogia'])) {
    $name = $_POST['ten'];
    $dienthoai = $_POST['dienthoai'];
    $email = $_POST['email'];
    $dcnhanhang = $_POST['dcnhanhang'];
    $tonggiatotal = $_POST['tonggiatotal'];

    $data['ten'] = $name;
    $data['dienthoai'] = $dienthoai;
    $data['email'] = $email;
    $data['diachinhanhang'] = $dcnhanhang;
    $data['tongdonhang'] = $tonggiatotal;

    $d->setTable('baogia');
    $d->insert($data);
    $id = mysql_insert_id();
    for ($i = 0; $i < count($showspnews); $i++) {
        $d->reset();
        $sql = "select * from #_product where id = '" . $showspnews[$i]['id_item'] . "'";
        $d->query($sql);
        $showspchon = $d->result_array();
        $id_pro = $showspchon[0]['id'];
        if ($_POST['soluong' . $id_pro] > 0) {
            $data1['id_product'] = $id_pro;
            $data1['soluong'] = $_POST['soluong' . $id_pro];
            $data1['id_baogia'] = $id;
            $d->setTable('baogia_detail');
            $d->insert($data1);
        }
    }
    require_once ("phpmailer/class.phpmailer.php");
    $subject = "Bảng báo giá" . $row_setting[website];

    $body = '<p style="font-weight:bold;font-size:14px">Bảng báo giá từ website ' . $row_setting[website] . '</p>';
    $body.='<div class="clear"></div>
                <div class="infonguoidk">
                    <div class="forminfo" style="width:100%;float:left;margin-top:10px">
                        <div class="leftinfo" style="width:160px;float:left">
                            <p>Họ và tên</p>
                        </div>
                        <div class="rightinfo" style="width:400px;float:left">
                            <p>' . $name . '</p>
                        </div>
                    </div>
                    <div class="forminfo" style="width:100%;float:left;margin-top:10px">
                        <div class="leftinfo" style="width:160px;float:left">
                            <p>Điện thoại</p>
                        </div>
                        <div class="rightinfo" style="width:400px;float:left">
                            <p>' . $dienthoai . '</p>
                        </div>
                    </div>
                    <div class="forminfo" style="width:100%;float:left;margin-top:10px">
                        <div class="leftinfo" style="width:160px;float:left">
                            <p>Email</p>
                        </div>
                        <div class="rightinfo" style="width:400px;float:left">
                            <p>' . $email . '</p>
                        </div>
                    </div>
                    <div class="forminfo" style="width:100%;float:left;margin-top:10px">
                        <div class="leftinfo" style="width:160px;float:left">
                            <p>Địa chỉ nhận hàng</p>
                        </div>
                        <div class="rightinfo" style="width:400px;float:left">
                            <p>' . $dcnhanhang . '</p>
                        </div>
                    </div>
                </div>';
    $body.= '<div class="guithu" style="width:100%;float:left">';
    $body.= '<div class="bangbaogia" style="width:100%;float:left;margin-top:20px"> ';
    $body.= '<div class="baokhunggia" style="width:99%;float:left;border:1px solid #e8e8e8;">
                    
                    <div class="khungbaogia" style="width:18%;float:left;text-align: center;border-right:1px solid #e8e8e8">
                        <p style="padding: 10px 5px">Hình ảnh</p>
                    </div>
                    <div class="khungbaogia" style="width:40%;float:left;text-align: center;border-right:1px solid #e8e8e8">
                        <p style="padding: 10px 5px">Tên sản phẩm</p>
                    </div>
                    <div class="khungbaogia" style="width:15%;float:left;text-align: center;border-right:1px solid #e8e8e8">
                        <p style="padding: 10px 5px">Giá</p>
                    </div>
                    <div class="khungbaogia" style="width:12%;float:left;text-align: center;border-right:1px solid #e8e8e8">
                        <p style="padding: 10px 5px">Số lượng</p>
                    </div>
                    <div class="khungbaogia" style="width:11%;float:left;text-align: center;border-right:1px solid #e8e8e8;border-right:0px">
                        <p style="padding: 10px 5px">Chiết khấu</p>
                    </div>
                </div>';
    for ($i = 0; $i < count($showspnews); $i++) {
        $d->reset();
        $sql = "select * from #_product where id = '" . $showspnews[$i]['id_item'] . "'";
        $d->query($sql);
        $spchonguithu = $d->result_array();
        $id_pro1 = $spchonguithu[0]['id'];
        if ($_POST['soluong' . $id_pro1] > 0) {
            $body.='<div class="baokhunggia" style="width:99%;float:left;border:1px solid #e8e8e8;">
                        
                        <div class="khungbaogia" style="width:18%;;float:left;text-align: center;border-right:1px solid #e8e8e8">
                            <p><img style="width:62%" src="thietbidienemf.com/upload/product/' . $spchonguithu[0]['photo'] . '" /></p>
                        </div>
                        <div class="khungbaogia" style="width:40%;padding:39px 0px;float:left;text-align: center;border-right:1px solid #e8e8e8">
                            <p style="font-size:12px">' . $spchonguithu[0]['ten_vi'] . '</p>
                        </div>
                        <div class="khungbaogia" style="width:15%;padding:39px 0px;float:left;text-align: center;border-right:1px solid #e8e8e8">
                            <p>' . price_sp($spchonguithu[0]['gia']) . '</p>
                        </div>
                        <div class="khungbaogia" style="width:12%;padding:39px 0px;float:left;text-align: center;border-right:1px solid #e8e8e8">
                            <p>' . $_POST['soluong' . $id_pro1] . '</p>
                        </div>
                        <div class="khungbaogia" style="width:11%;border-right:0px;padding:39px 0px;float:left;text-align: center;">
                            <p>' . $spchonguithu[0]['chietkhau'] . ' %</p>
                        </div>
                    </div>';
        }
    }
    $body.='<div class="clear"></div>
                <div class="infonguoidk">
                    <div class="forminfo" style="width:100%;float:left;margin-top:10px">
                        <div class="leftinfo" style="width:160px;float:left">
                            <p>Tổng giá trị</p>
                        </div>
                        <div class="rightinfo" style="width:400px;float:left">
                            <p style="color:#f80404;font-weight:bold;font-size:14px">' . price_sp($tonggiatotal) . '</p>
                        </div>
                    </div>
                    <div class="forminfo" style="width:100%;float:left;margin-top:10px">
                        <div class="leftinfo" style="width:100%;float:left">
                            <p style="font-weight:bold;">' . $phuongthucthanhtoan[0]['ten_vi'] . ' : </p>
                        </div>
                        <div class="rightinfo" style="width:100%;float:left">
                            <p>' . $phuongthucthanhtoan[0]['noidung_vi'] . '</p>
                        </div>
                    </div>
                    <div class="forminfo" style="width:100%;float:left;margin-top:10px">
                        <div class="leftinfo" style="width:100%;float:left">
                            <p style="font-weight:bold;">' . $thoigianbaohanh[0]['ten_vi'] . ' : </p>
                        </div>
                        <div class="rightinfo" style="width:100%;float:left">
                            <p>' . $thoigianbaohanh[0]['noidung_vi'] . '</p>
                        </div>
                    </div>
                    <div class="forminfo" style="width:100%;float:left;margin-top:10px">
                        <div class="leftinfo" style="width:100%;float:left">
                            <p style="font-weight:bold;">' . $hieulucbaogia[0]['ten_vi'] . ' : </p>
                        </div>
                        <div class="rightinfo" style="width:100%;float:left">
                            <p>' . $hieulucbaogia[0]['noidung_vi'] . '</p>
                        </div>
                    </div>
                </div>';
    $body.='</div>';
    $body.='</div>';
    define('GUSER', 'testkythuativangroup@gmail.com'); // tài khoản đăng nhập Gmail
    define('GPWD', 'ducta1409'); // mật khẩu cho cái mail này  

    function smtpmailer($to, $from, $from_name, $subject, $body) {
        global $error;

        $mail = new PHPMailer();  // tạo một đối tượng mới từ class PHPMailer
        $mail->CharSet = 'UTF-8';
        $mail->IsSMTP(); // bật chức năng SMTP
        $mail->SMTPDebug = 1;  // kiểm tra lỗi : 1 là  hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi
        $mail->SMTPAuth = true;  // bật chức năng đăng nhập vào SMTP này
        //  $mail->SMTPSecure = 'ssl'; // sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
        $mail->SMTPSecure = 'ssl'; // sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = GUSER;
        $mail->Password = GPWD;
        $mail->SetFrom($from, $from_name);
        $mail->Subject = $subject;
        $mail->MsgHTML($body);
        $mail->Body = $body;
        $mail->AddAddress($to);
        $mail->AddBCC($_POST['email']);

        if (!$mail->Send()) {
            $error = 'Gởi mail bị lỗi: ' . $mail->ErrorInfo;
            return false;
        } else {
            $error = 'Thư của bạn đã được gởi đi ';
            return true;
        }
    }

    if (smtpmailer($email_company, $_POST['email'], 'Website ' . $row_setting[website], 'Báo giá từ website ' . $row_setting[website], $body)) {
        unset($_SESSION['aaa']);
        transfer("Thông tin của bạn đang được xử lý...", "checkout.html");
    } else {
        transfer("Thông tin KHÔNG gửi được.<br>Cảm ơn.", "trang-chu.html");
    }
}
?>

<div class="box_content">

    <div class="content"> 
        <!--<div class="title_sp"><span><?= $breakcrumb ?></span></div>-->
        <div class="title" style="margin-bottom:10px;">
            <p><?= $tintuc_detail[0]['ten'] ?></p>
        </div>
        <div style="clear:both"></div>

        <div class="nd_tonghop" style="">  
            <?= $tintuc_detail[0]['noidung']; ?>
            <?php // print_r($_SESSION['cart']); ?>
        </div>    
        <div class="clear" style="height:20px;"></div>
        <?php if (count($showspnews) > 0) { ?>
            <form method="post" action="">
                <div class="bangbaogia" style="width:100%;float:left;margin-top:20px"> 
                    <div class="baokhunggia">
                        <div class="khungbaogia baogiatat" style="width:5%">
                            <p>STT</p>
                        </div>
                        <div class="khungbaogia soluongmobile" style="width:15%">
                            <p>Hình ảnh</p>
                        </div>
                        <div class="khungbaogia hienbaogia" style="width:42%">
                            <p>Tên sản phẩm</p>
                        </div>
                        <div class="khungbaogia anbaogia" style="width:38%">
                            <p>Tên sản phẩm</p>
                        </div>
                        <div class="khungbaogia anbaogia" style="width:15%">
                            <p>Giá</p>
                        </div>
                        <div class="khungbaogia soluongmobile" style="width:15%">
                            <p>Số lượng</p>
                        </div>
                        <!--                    <div class="khungbaogia" style="width:10%">
                                                <p>Chọn mua</p>
                                            </div>-->
                        <div class="khungbaogia" style="width:11%;border-right:0px">
                            <p>Chiết khấu</p>
                        </div>
                    </div>
                    <?php
                    for ($i = 0; $i < count($showspnews); $i++) {
                        $d->reset();
                        $sql = "select * from #_product where id = '" . $showspnews[$i]['id_item'] . "'";
                        $d->query($sql);
                        $showspchon = $d->result_array();

//                    $dongia = $showspchon[0]['gia'] - ($showspchon[0]['gia'] * $showspchon[0]['chietkhau'] / 100);
                        ?>
                        <div class="baokhunggia doimau<?= $showspchon[0]['id'] ?>">
                            <div class="khungbaogia baogiatat" style="width:5%;padding:39px 0px">
                                <p><?= $i + 1 ?></p>
                            </div>
                            <div class="khungbaogia soluongmobile" style="width:15%;">
                                <p><img src="upload/product/<?= $showspchon[0]['photo'] ?>" /></p>
                            </div>
                            <div class="khungbaogia hienbaogia" style="width:42%;padding:39px 0px">
                                <p style="font-size:12px"><?= $showspchon[0]['ten_vi'] ?></p>
                                <input type="hidden" name="gia<?= $i ?>" id="gia" value="<?= $showspchon[0]['gia'] ?>">
                                <p><?= price_sp($showspchon[0]['gia']) ?></p>
                            </div>
                            <div class="khungbaogia anbaogia" style="width:38%;padding:39px 0px">
                                <p style="font-size:12px"><?= $showspchon[0]['ten_vi'] ?></p>
                            </div>
                            <div class="khungbaogia anbaogia" style="width:15%;padding:39px 0px">
                                <input type="hidden" name="gia<?= $i ?>" id="gia" value="<?= $showspchon[0]['gia'] ?>">
                                <p><?= price_sp($showspchon[0]['gia']) ?></p>
                            </div>
                            <div class="khungbaogia soluongmobile" style="width:15%;padding:39px 0px">
                                <p><input type="number" class="change_qty" name="soluong<?= $showspchon[0]['id'] ?>" id="soluong<?= $showspchon[0]['id'] ?>" onchange="loadsl(<?= $showspchon[0]['id'] ?>)" value="0" style="width:40px;text-align: center" /></p>
                            </div>
                            <!--                        <div class="khungbaogia" style="width:10%;padding:39px 0px">
                                                        <p>
                                                            <input type="checkbox" name="okcheck[]" id="okcheck" class="okcheck(<?= $showspchon[0]['id'] ?>)" onchange="load_ajax(<?= $i ?>)" value="<?= $showspchon[0]['id'] ?>" dataid="" required="">
                                                        </p>
                                                    </div>-->
                            <div class="khungbaogia" style="width:11%;border-right:0px;padding:39px 0px">
                                <input type="hidden" name="chietkhau<?= $i ?>" id="chietkhau<?= $i ?>" value="<?= $showspchon[0]['chietkhau'] ?>">
                                <p><?= $showspchon[0]['chietkhau'] ?> %</p>
                            </div>

                        </div>
                        <input type="hidden" id="tongdongia<?= $i ?>" value="" />
                    <?php } ?>
                    <div class="clear"></div>
                    <div class="tonggia" style="width:100%;float:right;margin-top:20px">
                        <input type="hidden" name="tonggiatotal" id="tonggiatotal" value="" />
                        <div class="tonggiatotal" style="float:right;margin-top:5px;width:150px;border:1px solid #e8e8e8;">
                            <p style="line-height:30px;float:right;margin-right:10px;">0</p>
                        </div>
                        <p style="float:right;margin-right:10px;margin-top:10px">Tổng giá</p>
                    </div>

                </div>
                <div class="clear"></div>
                <p style="font-size:15px;font-weight: bold;font-family: Arial;color:#1e75ba;margin-top:20px">
                    <?= $phuongthucthanhtoan[0]['ten_vi'] ?>
                </p>
                <div class="phuongthuc">
                    <p><?= $phuongthucthanhtoan[0]['noidung_vi'] ?></p>
                </div>
                <div class="clear"></div>
                <p style="font-size:15px;font-weight: bold;font-family: Arial;color:#1e75ba;margin-top:20px">
                    <?= $thoigianbaohanh[0]['ten_vi'] ?>
                </p>
                <div class="phuongthuc">
                    <p><?= $thoigianbaohanh[0]['noidung_vi'] ?></p>
                </div>
                <div class="clear"></div>
                <p style="font-size:15px;font-weight: bold;font-family: Arial;color:#1e75ba;margin-top:20px">
                    <?= $hieulucbaogia[0]['ten_vi'] ?>
                </p>
                <div class="phuongthuc">
                    <p><?= $hieulucbaogia[0]['noidung_vi'] ?></p>
                </div>
                <div class="clear"></div>
                <p style="font-size:15px;font-weight: bold;font-family: Arial;color:#1e75ba;margin-top:20px">
                    THÔNG TIN NGƯỜI ĐẶT HÀNG
                </p>
                <div class="clear"></div>
                <div class="infonguoidk">
                    <div class="forminfo">
                        <div class="leftinfo">
                            <p>Họ và tên</p>
                        </div>
                        <div class="rightinfo">
                            <input type="text" name="ten" value="" required=""/>
                        </div>
                    </div>
                    <div class="forminfo">
                        <div class="leftinfo">
                            <p>Điện thoại</p>
                        </div>
                        <div class="rightinfo">
                            <input type="text" name="dienthoai" value="" required=""/>
                        </div>
                    </div>
                    <div class="forminfo">
                        <div class="leftinfo">
                            <p>Email</p>
                        </div>
                        <div class="rightinfo">
                            <input type="text" name="email" value="" required=""/>
                        </div>
                    </div>
                    <div class="forminfo">
                        <div class="leftinfo">
                            <p>Địa chỉ nhận hàng</p>
                        </div>
                        <div class="rightinfo">
                            <input type="text" name="dcnhanhang" value="" required=""/>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="nutgui" style="margin-top:20px;float:right">
                    <button type="submit" name="baogia" class="btn btn-success" style="background: #26b9e6;color: white;padding: 10px 25px;border: none;font-size:13px">
                        Gửi thông tin
                    </button>
                </div>
        </div>  
    </form>
<?php } ?>
<div class="clear"></div>
<div class="post-share" style="margin-top:10px;">
    <div class="addthis_sharing_toolbox"></div>
</div>
<div class="clear" style="height:20px;"></div>

<div class="othernews">
    <div class="title" style="">
        <p>Bài viết khác</p>
    </div>
    <div class="clear"></div>
    <ul style="margin-top: 20px;">
        <?php foreach ($tintuc_khac as $tinkhac) { ?>
            <li><a href="<?= $com ?>/<?= $tinkhac['tenkhongdau'] ?>-<?= $tinkhac['id'] ?>.html" style="text-decoration:none;"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?= $tinkhac['ten'] ?></a> (<?= make_date($tinkhac['ngaytao']) ?>)</li>
            <?php } ?>
    </ul>
</div>

</div>
</div>
