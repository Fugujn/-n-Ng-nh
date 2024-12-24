<?php
if($_REQUEST['k'] == '') {
    $d->reset();
    $sql = "select * from table_donhang where madonhang = '".$_SESSION['donhangthanhtoan']."'";
    $d->query($sql);
    $donhangcuoi = $d->fetch_array();


    $d->reset();
    $sql = "select * from table_donhang_detail where id_order = '".$_SESSION['donhangthanhtoan']."'";
    $d->query($sql);
    $donhangdetail_cuoi = $d->result_array();
} else {
    // $_SESSION['checkmadon'] = $_REQUEST['k'];
    $d->reset();
    $sql = "select * from table_donhang where madonhang = '".$_REQUEST['k']."'";
    $d->query($sql);
    $donhangcuoi = $d->fetch_array();


    $d->reset();
    $sql = "select * from table_donhang_detail where id_order = '".$_REQUEST['k']."'";
    $d->query($sql);
    $donhangdetail_cuoi = $d->result_array();
}
$d->reset();
$sql = "select * from #_time where type='nhan-hang'";
$d->query($sql);
$nhanhang = $d->fetch_array();

$d->reset();
$sql = "select * from #_time where type='noi-dia'";
$d->query($sql);
$ttdathang = $d->fetch_array();

$d->reset();
$sql = "select * from #_footer";
$d->query($sql);
$footprint = $d->fetch_array();
?>

<style>
    .mausole:nth-child(2n + 1) {background: white !important}
    .leftmid{display: none}
    .rightmid{width: 100%;}
    .showprint{display: none}

       .showinfoheader{display: none;width: 100%;float:left;margin-bottom: 30px}
    .infoprint{width:25%;float:left;margin-right: 5%}
    .infoprint1{width:70%;float:left;text-align: right}
    .infoprint1{font-size: 12px;}
    .infoprint1 p{font-size: 12px;}
    .infoprint1 a{font-size: 12px;}
    .infoprint1 span{font-size: 12px;}
    .infodathang{width: 100%;float:left;}
    .infodathang p{width: 100%;float:left;margin-bottom:10px}


    @media print {
        .infocheckout{box-shadow: 0px 0px 15px 0px #ffffff !important}
        .headmobile{display: none !important}
        .content{margin-top: 0px !important}
        .pagemenu a{left: 10% !important;}
        .banner{display: none !important;}
        .menuprint{display: none !important;}
        .img-res{display: none !important;}
        .logodoitac1{display: none !important;}
        footer{display: none !important;}
        .buttonmuathem{display: none !important;}
        .break_thumb{display: none !important;}
        .fiximg{width: 20% !important;}
        .fixdiengiai{width: 30% !important;}
        .showprint{display: block !important}
        table{border:1px solid silver}
        table td{border:1px solid silver}
        table th{border:1px solid silver}
        .showinfoheader{display: block !important}

    }
</style>
<div class="box_content">
    <div class="content" style="width:100%;float:left;margin-top:20px;font-family: Arial">
        <div class="showinfoheader">
            <div class="infoprint">
            <img src="<?= _upload_hinhanh_l . $row_photo['logo'] ?>"  style="max-width: 100%;margin-top: 10px;" />
            </div>
            <div class="infoprint1">
                <p><?= $footprint['noidung_vi'] ?></p>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div style="clear:both;"></div>
        <div class="infocheckout" style="width:96%;float:left;padding:2%;box-shadow: 0px 0px 15px 0px #ececec">
            <div class="box-form" style="width:100%;float:left">
                <div class="checkoutleft">
                    <div class="title-form" style="margin-bottom:20px">
                        <i class="fa fa-info-circle" aria-hidden="true" style="margin-right: 5px;color:#35c853;font-size: 18px"></i>
                        <a style="font-size:16px;font-weight: bold;color:#35c853"><?= change_lang('Thông tin đơn hàng', 'Billing Information') ?> : </a>
                        
                    </div>
                    <div style="clear:both;"></div>
                    <div class="infodathang">
                        <p><a style="font-size:14px;font-weight: bold;color:#35c853">Mã Đơn Hàng : <?= $donhangcuoi['madonhang'] ?></a></p>
                        <p>
                            <a style="font-size:14px;font-weight: bold;color:#35c853">Trạng thái : 
                                <?php if($donhangcuoi['trangthai'] == 1){ ?>
                                    <span>Mới đặt</span>
                                <?php } elseif($donhangcuoi['trangthai'] == 2){ ?>
                                    <span>Đã xác nhận</span>
                                <?php } elseif($donhangcuoi['trangthai'] == 6){ ?>
                                    <span>Đang đặt cọc</span>
                                <?php } elseif($donhangcuoi['trangthai'] == 3){ ?>
                                    <span>Đang giao hàng</span>
                                <?php } elseif($donhangcuoi['trangthai'] == 4){ ?>
                                    <span>Đã hoàn thành</span>
                                <?php } elseif($donhangcuoi['trangthai'] == 5){ ?>
                                    <span>Đã hủy</span>
                                <?php } ?>
                            </a>
                        </p>
                        <p><a style="font-size:14px;font-weight: bold;color:#35c853">Ngày đặt : <?= date('d/m/Y',$donhangcuoi['ngaytao']) ?></a></p>
                    </div>
                    <div style="clear:both;"></div>
                    <p><?= $donhangcuoi['noidung'] ?></p>
                    <div style="clear:both;height: 10px;"></div>
                    <p><?= $nhanhang['noidung_vi'] ?></p>
                    <div style="clear:both;"></div>
                    <div class="pad-contact" style="width: 49%;margin-right: 2%;float:left">
                        <div class="inputphai">
                            <input type="text" class="form-control" name="hoten" id="hoten" value="<?= $donhangcuoi['hoten'] ?>" readonly>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="pad-contact" style="width: 49%;margin-right: 0%;float:left">
                        <div class="inputphai">
                            <div style="padding-left: 0px;width: 100%">
                                <input type="tel" pattern="[0][0-9]{9,10}" min="10" max="13" class="form-control" name="dienthoai" id="dienthoai" placeholder="<?= change_lang('Điện thoại', 'Phone') ?>"  value="<?= $donhangcuoi['dienthoai'] ?>" required="required" readonly>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="pad-contact" style="width: 49%;margin-right: 2%;float:left">
                        <div class="inputphai">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email"  value="<?= $donhangcuoi['email'] ?>" readonly>
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                    <div class="thongtinform" style="width: 49%;margin-right: 0%;float:left">
                        <div class="pad-contact" >
                            <div class="inputphai" style="">
                                <input type="text"  class="form-control" name="diachi" id="diachi" placeholder="<?= change_lang('Địa chỉ', 'Adress') ?>"  value="<?= $donhangcuoi['diachi'] ?>" readonly>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                    <div style="clear: both;"></div>
                    <div style="clear: both;"></div>
                    <div class="thongtinform" style="margin-top:20px">
                        <div class="pad-contact" style=";width: 100%;float:left">
                            <div class="inputphai" style="">
                                <p>Ghi chú : <?= $donhangcuoi['ghichu'] ?></p>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                    <div style="clear: both;"></div>
                    
                </div>
                <div class="clear"></div>
                
            </div>
        </div>
        <div class="infocart" style="width:96%;float:left;margin-top:20px;padding:2%;box-shadow: 0px 0px 15px 0px #ececec">

            <div class="table-responsive">
                <table class="table table-bordered service-list" border="0" cellpadding="5px" cellspacing="1px" style="font-size:12px;" width="100%">

                    <?php
                    echo '<tr  style="font-weight:bold;color:#111;border-top:1px solid #e4e4e4;border-bottom:1px solid #e4e4e4;height:30px">
                        <th style="text-align:center;  text-transform:uppercase;">' . change_lang('STT', 'Images') . '</th>
                        <th style="text-align:center;  text-transform:uppercase;">' . change_lang('Mã', 'Images') . '</th>
                        <th style="text-align:center; text-transform:uppercase;">' . change_lang('Photo', 'Name product') . '</th>
                        <th style="text-align:center; text-transform:uppercase;">' . change_lang('Diễn dải', 'Name product') . '</th>
                        <th align="center" style="text-transform:uppercase;" class="mobileandi">' . change_lang('Đơn giá', 'Price') . '</th>
                        <th align="center" style="text-transform:uppercase;" class="mobileandi">' . change_lang('SL', 'Number') . '</th>
                        
                        <th align="center" style="text-transform:uppercase;" class="mobileandi">' . change_lang('Thành tiền', 'Amount') . '</th>   
                        
                        </tr>';



                    for ($i = 0; $i < (count($donhangdetail_cuoi)); $i++) {
                        $d->reset();
                        $sql = "select * from #_product where hienthi = 1 and id = '".$donhangdetail_cuoi[$i]['id_product']."'";
                        $d->query($sql);
                        $detailproduct = $d->fetch_array();
                        ?>
                        <tr class="mausole" <?php echo 'style="background:#f5f5f5;border-bottom:1px solid #e4e4e4"'; ?>>
                            <td width="5%" style="border-left:none; text-align:center;">
                                <?= $i+1 ?>
                            </td>
                            <td width="10%" style="border-left:none; text-align:center;">
                                <?= $detailproduct['masp'] ?>
                            </td>
                            <td width="10%" class="fiximg" style="border-left:none; text-align:center;padding:10px 0px 8px 0px">
                                <a href="<?= $detailproduct['tenkhongdau'] ?>">
                                    <img style="max-height: 50px;border: 1px solid #e4e4e4" src="<?= _upload_product1_l . $detailproduct['photo'] ?>"  alt="<?= $pname ?>" /> 
                                </a>
                            </td>
                            <td width="40%" class="fixdiengiai" style="border-left:none; text-align:left" class="mobileandi">
                                <span> 
                                    <a href="<?= $detailproduct['tenkhongdau'] ?>" style="color:black">
                                        <?= $detailproduct['ten_vi'] ?>
                                    </a> 
                                </span>
                            </td>
                            <td style="border-left:none; text-align:left;margin-top:10px;width: 80%;padding-left:20%" class="mobilehienlen">
                                <p style="margin-top:0%"> <?= $detailproduct['ten_vi'] ?> </p>
                                <div class="clear"></div>
                                <p>
                                <div class="quantity buttons_added" style="text-align: center;float:left;margin:10px 0px;">
                                    <p>Số lượng : <?= $donhangdetail_cuoi[$i]['soluong'] ?></p>
                                </div>
                                <!-- $######### -->
                                </p><br><br>
                                <div class="clear"></div>
                                <p><?= change_lang('Đơn giá', 'Prices') ?> : <?= price_sp1($detailproduct['gia']) ?> </p>
                            </td>
                            <td width="10%" align="center" class="mobileandi">
                                <?= price_sp1($detailproduct['gia']) ?>
                            </td>
                            <td width="10%" align="center" class="mobileandi">
                                <?= $donhangdetail_cuoi[$i]['soluong'] ?>
                            </td>             
                            <td width="15%" align="center" class="price_tt mobileandi">
                                <?= price_sp1($detailproduct['gia'] * $donhangdetail_cuoi[$i]['soluong']) ?>
                            </td> 

                        </tr>
                    <?php } ?>

                </table>
            </div>
            <div class="total-order" style="width:100%;float:left;margin:20px 0px;text-align: right;">
                <b style="margin-right:30px;font-size: 16px;"><?= change_lang('Tổng tiền', 'Total') ?> : <span class="last_tt"><?= price_sp1($donhangcuoi['tonggia']) ?></span></b>
            </div> 
            <div class="clear"></div>
            <style type="text/css">
                .buttonmuathem{float:right;margin-top:20px}
                .buttonmuathem a{padding:12px 35px;background: linear-gradient(#229CD0, #229CD0);color:white;margin-left:10px;font-size: 14px}
            </style>
            <div class="buttonmuathem" style="margin-right:28px;cursor: pointer;" onclick="printlist()">
                <div class="tienhangdathang">
                    <a style="font-size: 13px"><?= change_lang('IN DANH SÁCH', 'Pay') ?></a>
                </div>
            </div>
            
            <div class="clear" style="height:30px;"></div>
            <div class="ttdathang showprint">
                <?= $ttdathang['noidung_vi'] ?>
            </div>
            <div class="clear" style="height:30px;"></div>
           
        </div>
        <div style="clear:both"></div>
    </div>
</div>
<div style="clear:both"></div>
<script type="text/javascript">
    function printlist(){
        window.print();
    }
</script>