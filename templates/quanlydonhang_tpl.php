<?php
session_start();
if ($_SESSION['mem_login']['email'] != '') {

function tinhtrang($i = 0) {
    $sql = "select * from table_tinhtrang order by id";
    $stmt = mysql_query($sql);
    while ($row = @mysql_fetch_array($stmt)) {
        if ($row["id"] == $i) {
            $str = $row["trangthai"];
        } else {
            
        }
    }
    return $str;
}

$d->reset();
$sql = "select * from #_member where user = '" . $_SESSION['mem_login']['email'] . "' order by id desc ";
$d->query($sql);
$taikhoan = $d->fetch_array();

?>

<style>
    .leftmid{display: none}
    .rightmid{width: 100%;float:left}
    .khung_slider{display: none}
    .ordercon{width:100%;float:left;padding: 20px 0px;border-bottom:1px solid #1c801d;font-family: Arial}
    .ordercon p{margin-bottom: 10px}
    .ordercon a{color:#1c801d}
    .orderleft{float:left;width:50%}
    .tieude p{margin-bottom:0px}
    .infoorder{width: 99.7%;border:1px solid #eaeaea;float:left}
    .col-3{width: 25%;float: left;}
    .col-9{width: 75%;float: left;}
    .col-cont{padding: 0 15px;}
    .thongtintk{border: 1px solid #f4f4f4;width: 100%;float:left;}
    .thongtintk li {padding: 10px;border-bottom: 1px solid #f4f4f4;transition: .2s all;list-style: none}
    .thongtintk li:hover{background:#d2effb;padding-left: 15px;}
    /*.thongtintk li:last-child{border-bottom: none;}*/
    .thongtintk li a{color:#515151;font-size: 15px;}
    .acttk{background: #d2effb;}
    .show_array{width: 100%;float:left;margin:10px 0px;border-bottom: 1px solid silver;padding-bottom: 10px}
    .show_array:last-child{border-bottom: none;padding-bottom: 10px}
    .left_array{width: 60%;float:left;text-align: left;}
    .right_array{width: 40%;float:left;text-align: right}
    .orderdetail{display: none}
    

    .khungkhoahoc{width: 100%;float:left;margin-top:20px;border-top:1px solid #f0f0f0;border-left:1px solid #f0f0f0;border-right:1px solid #f0f0f0;}
    .khoahoccon{width: 100%;float:left;border-bottom:1px solid #f0f0f0;}
    
    .cotkhoahoc{float:left;text-align: center}
    .cotkhoahoc p{line-height: 40px}
    .sttkh{width: 10%}
    .tenkh{width: 30%}
    .ngaykh{width: 15%}
    .buoikh{width: 15%}
    .hocphikh{width: 15%}
    .motakh4{width: 30%}
    .motakh{width: 26%;padding:10px 2% 0 2%;}
    .buykh{width: 15%}
</style>
<script>
    $(document).ready(function (e) {
        $('.show_orderdetail').click(function () {
            $(".orderdetail").slideToggle(400);
        });
    });
</script>

<div class="box_content scrollkhung" style="width: 100%;float:left;margin:40px 0px">
    <div class="box_profile" style="width: 1200px;margin:0 auto">
        
        <div class="col-3">
            <div class="col-cont" style="padding:0px">
                <div class="title_login">
                    <p>Phụ mục</p>
                </div>
                <div style="clear:both;"></div>
                <ul class="thongtintk">
                    <li>
                        <i class="fa fa-users" aria-hidden="true" style="margin-right:5px"></i>
                        <a href="user.html&act=profile"><?= change_lang('Bài viết của bạn','Order buy group') ?></a>
                    </li>
                    <li class="acttk">
                        <i class="fa fa-line-chart" aria-hidden="true" style="margin-right:5px"></i>
                        <a href="user.html&act=quanlydonhang"><?= change_lang('Quản lý khóa học','Order Manager') ?></a>
                    </li>
                    <li>
                        <i class="fa fa-plus" aria-hidden="true"style="margin-right:5px"></i>
                        <a href="user.html&act=postnew"><?= change_lang('Đăng bài mới','Order buy group') ?></a>
                    </li>
                    <li>
                        <i class="fa fa-info" aria-hidden="true" style="margin-right:8px;margin-left: 2px"></i>
                        <a href="user.html&act=theodoi"><?= change_lang('Bài viết bạn quan tâm','Order buy group') ?></a>
                    </li>
                    
                </ul>
                <div style="clear:both;"></div>
                <div class="title_login" style="margin-top:20px">
                    <p>Thông tin tài khoản</p>
                </div>
                <div style="clear:both;"></div>
                <ul class="thongtintk">
                    <li>
                        <i class="fa fa-pencil" aria-hidden="true" style="margin-right:5px"></i>
                        <a href="user.html&act=update"><?= change_lang('Cập nhật tài khoản','Update Acount') ?></a>
                    </li>
                    <li>
                        <i class="fa fa-unlock-alt" aria-hidden="true" style="margin-right:5px"></i>
                        <a href="user.html&act=changepassword"><?= change_lang('Đổi mật khẩu','Change Password') ?></a>
                    </li>
                    <!-- <li>
                        <i class="fa fa-unlock-alt" aria-hidden="true" style="margin-right:5px"></i>
                        <a href="user.html&act=avata"><?= change_lang('Đổi avata','Change Password') ?></a>
                    </li> -->
                </ul>
                <div style="clear:both;"></div>
            </div>
        </div>
        <div class="col-9">
            <div class="col-cont">
            <div class="quantriadmin">       
                <div class="infoorder">
                    <div class="khoahoccon" style="border:none;background: #179fd5;color:white">
                        <div class="cotkhoahoc mobilehienlen768" style="width: 10%">
                            <p>STT</p>
                        </div>
                        <div class="cotkhoahoc mobilehienlen768" style="width: 55%">
                            <p>Thông tin</p>
                        </div>
                        <div class="cotkhoahoc mobilehienlen768" style="width: 35%">
                            <p>Tình trạng</p>
                        </div>
                        <div class="cotkhoahoc sttkh mobileandi768">
                            <p>Stt</p>
                        </div>
                        <div class="cotkhoahoc tenkh mobileandi768">
                            <p>Tên khóa học</p>
                        </div>
                        <div class="cotkhoahoc ngaykh mobileandi768">
                            <p>Ngày bắt đầu</p>
                        </div>
                        <div class="cotkhoahoc buoikh mobileandi768">
                            <p>Số buổi</p>
                        </div>
                        <div class="cotkhoahoc hocphikh mobileandi768">
                            <p>Học phí</p>
                        </div>
                        <div class="cotkhoahoc buykh mobileandi768">
                            <p>Trạng thái</p>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <?php
                    $d->reset();
                    $sql = "select * from #_donhang where id_user = '".$taikhoan['id']."'";
                    $d->query($sql);
                    $baivietdadang = $d->result_array();
                    if (count($baivietdadang) > 0) {
                        for ($i = 0; $i < count($baivietdadang); $i++) {
                            $d->reset();
                            $sql = "select * from #_donhang_detail where mahoadon = '".$baivietdadang[$i]['madonhang']."'";
                            $d->query($sql);
                            $sanphammua = $d->result_array();
                            for ($j = 0; $j < count($sanphammua); $j++) {
                                $d->reset();
                                $sql = "select * from #_product where hienthi = 1 and id = '".$sanphammua[$j]['id_product']."'";
                                $d->query($sql);
                                $sanphamchuan = $d->fetch_array();
                                ?>
                                <div class="khoahoccon">
                                    <div class="cotkhoahoc mobilehienlen768" style="width: 10%">
                                        <p><?= $i+1 ?></p>
                                    </div>
                                    <div class="cotkhoahoc mobilehienlen768" style="width: 55%">
                                        <p>Tên : <?= $sanphamchuan['ten_vi'] ?></p>
                                        <p>Ngày bắt đầu : <?= $sanphamchuan['chietkhau'] ?></p>
                                        <p>Số buổi : <?= $sanphamchuan['rong'] ?></p>
                                        <p>Giá : <?= price_sp($sanphamchuan['gia']) ?></p>
                                    </div>
                                    <div class="cotkhoahoc mobilehienlen768" style="width: 35%">
                                        <p>
                                            <?php if($baivietdadang[$i]['trangthai'] == 1){ ?>
                                                Mới đặt
                                            <?php } elseif($baivietdadang[$i]['trangthai'] == 2){ ?>
                                                Đã xác nhận
                                            <?php } elseif($baivietdadang[$i]['trangthai'] == 3){ ?>
                                                Đang xét duyệt   
                                            <?php } elseif($baivietdadang[$i]['trangthai'] == 4){ ?>
                                                Xong
                                            <?php } elseif($baivietdadang[$i]['trangthai'] == 5){ ?>
                                                Đã hủy
                                            <?php } ?>
                                        </p>
                                    </div>
                                    <div class="cotkhoahoc sttkh mobileandi768">
                                        <p><?= $i+1 ?></p>
                                    </div>
                                    <div class="cotkhoahoc tenkh mobileandi768">
                                        <p><?= $sanphamchuan['ten_vi'] ?></p>
                                    </div>
                                    <div class="cotkhoahoc ngaykh mobileandi768">
                                        <p><?= $sanphamchuan['chietkhau'] ?></p>
                                    </div>
                                    <div class="cotkhoahoc buoikh mobileandi768">
                                        <p><?= $sanphamchuan['rong'] ?></p>
                                    </div>
                                    <div class="cotkhoahoc hocphikh mobileandi768">
                                        <p><?= price_sp($sanphamchuan['gia']) ?></p>
                                    </div>
                                    <div class="cotkhoahoc buykh mobileandi768">
                                        <p>
                                            <?php if($baivietdadang[$i]['trangthai'] == 1){ ?>
                                                Mới đặt
                                            <?php } elseif($baivietdadang[$i]['trangthai'] == 2){ ?>
                                                Đã xác nhận
                                            <?php } elseif($baivietdadang[$i]['trangthai'] == 3){ ?>
                                                Đang xét duyệt   
                                            <?php } elseif($baivietdadang[$i]['trangthai'] == 4){ ?>
                                                Xong
                                            <?php } elseif($baivietdadang[$i]['trangthai'] == 5){ ?>
                                                Đã hủy
                                            <?php } ?>
                                        </p>
                                    </div>
                                </div>
                                <div style="clear:both"></div>
                            <?php } ?>
                        <?php } ?>
                    <?php } else { ?>
                        <p style="margin:2%"><?= change_lang('Bạn chưa đăng ký khóa học nào','You have no order') ?></p>
                    <?php } ?>
                </div>
                <div class="clear"></div>
                <div class="phantrang" style="margin-top: 20px;"><?= $paging['paging'] ?></div>
            </div>
            </div>
        </div>
    </div>
    <div style="clear:both"></div>
</div>

<?php
} else {
    transfer("Bạn chưa đăng nhập !", "./");
}
?>