<?php
session_start();
if ($_SESSION['mem_login']['email'] != '') {

$d->reset();
$sql = "select * from #_member where user = '" . $_SESSION['mem_login']['email'] . "' order by id desc ";
$d->query($sql);
$taikhoan = $d->fetch_array();

$d->reset();
$sql = "select * from #_donhang where iduser = '" . $taikhoan['id'] . "' order by ngaytao desc ";
$d->query($sql);
$showorder = $d->result_array();

$tongdon = count($showorder);

?>
<script type="text/javascript">
	$(document).ready(function (e) {

        $('.tabgift').click(function () {
            $('.tabgift').removeClass('activegift');
            $(this).addClass('activegift');

            var tabopen = $(this).attr('dataid');
            $('.infoorder').hide(0);
            $('.' + tabopen).slideToggle(400);
        });
       
    });

	function addgift(id,masouser) {
		$('.change'+id).hide();
		$('.change2'+id).show();
		swal({
            title: "Thông báo !",
            text: "Bạn có muốn đổi sản phẩm này không?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Đồng ý",
            cancelButtonText: "Không đồng ý",
            closeOnConfirm: false,
            closeOnCancel: false},
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
				            type: 'POST',
				            url: 'ajax/ajax_gift.php',
				            data: {id: id,masouser: masouser},
				            success: function (data) {
				                window.location.reload();
				            }
				        })
                        swal("Đổi thưởng", "Đổi thành công", "success");

                    } else {
                        swal("Hủy", "Đã hủy", "error");
                    }
                });
        
    }
	
</script>
<style>
    .ordercon{width:100%;float:left;padding: 20px 0px;border-bottom:1px solid #1c801d;}
    .ordercon p{margin-bottom: 10px}
    .ordercon a{color:#1c801d}
    .orderleft{float:left;width:50%}
    .tieude p{margin-bottom:0px}
    .infoorder{width: 100%;float:left;min-height: 200px;background: #f8f8f8;padding:20px;box-sizing: border-box;}
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

    .titledoi{width: 100%;float:left;background:silver;text-align: center;margin-top:10px;transition: all 0.2s;cursor: pointer;}
    .titledoi p{line-height: 35px;transition: all 0.2s;}

    .titledoi:hover{background:#CDA53D;transition: all 0.2s}
    .titledoi:hover p{color:white;transition: all 0.2s}

    .text2{width: 100%;float:left;background:silver;text-align: center;margin-top:10px;transition: all 0.2s;cursor: pointer;display: none}
    .text2 p{line-height: 35px;transition: all 0.2s;}

    .text3{width: 100%;float:left;background:#eee;text-align: center;margin-top:10px;transition: all 0.2s;}
    .text3 p{line-height: 35px;transition: all 0.2s;color:#333;}

    .tabgift{display: inline-block;padding:10px 20px;transition: all 0.5s;cursor: pointer;}
    .tabgift:hover{background: #f8f8f8;transition: all 0.5s}
    .activegift{background: #f8f8f8;transition: all 0.5s}
    .lichsu{display: none}
</style>
<script>
    $(document).ready(function (e) {
        $('.show_orderdetail').click(function () {
            $(".orderdetail").slideToggle(400);
        });
    });
</script>

<div class="boxcontent" style="width: 100%;float: left;box-sizing: border-box;padding:0px 30px;">
    <div class="titleaccount" style="margin-bottom:15px;">
        <p style="font-size: 16px;color:#CDA53D;">
            <i class="fa fa-unlock-alt" aria-hidden="true" style="margin-right: 5px"></i>
            <?=change_lang('Quản lý tích điểm','User Point Management')?>
        </p>
    </div>
    <div class="clear"></div>
    <p style="margin-bottom: 25px;">Số điểm của bạn : <span style="color:#CDA53D;font-family:'opensans-bold';"><?=$taikhoan['point']?></span></p>
    <div class="clear"></div>
    <div class="quantriadmin">      
        <div class="titleaccount">
            <p style="float:left">
            	<a class="tabgift activegift" dataid="sp">
                    <i class="fa fa-gift" aria-hidden="true" style="margin-right: 5px"></i>
                    Đổi thưởng
                </a>
                <a class="tabgift" dataid="lichsu">
                    <i class="fa fa-history" aria-hidden="true" style="margin-right: 5px"></i>
                    Lịch sử
                </a>
            </p>
        </div>
        <div style="clear:both"></div>
        <div class="infoorder sp">
            <?php 
            $d->reset();
            $sql = "select * from #_product where hienthi = 1 and type = 'doi-thuong' order by stt, ngaytao desc";
            $d->query($sql);
            $product_gift = $d->result_array();

            $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
            $url = getCurrentPageURL();
            $maxR = 15;
            $maxP = 4;
            $paging = paging_home($product_gift, $url, $curPage, $maxR, $maxP);
            $product_gift = $paging['source'];
            if(count($product_gift)>0){
            ?>
            <?
            for ($i = 0; $i < count($product_gift); $i++) { ?>
                <div class="col-sp-4">
                    <div style="padding:0px 10px;"> 
                    <div class="baoanhsp" style="width: 100%;box-sizing: border-box;">
                        <a>
                            <img src="upload/thumb/<?= $product_gift[$i]['thumb'] ?>">
                        </a>
                    </div>
                    <div class="baotensp" style="text-align: center">
                        <p>
                            <a style="font-size: 16px;"><?= $product_gift[$i]['ten_vi'] ?></a>
                        </p>
                    </div>
                    <div class="baogia" style="text-align: center;height: 22px">
                        <p><a style="color:#afabab;"><?= $product_gift[$i]['point'] ?> điểm</a></p>
                    </div>
                    <?php if($taikhoan['point'] >= $product_gift[$i]['point']) { ?>
                        <div class="titledoi change<?= $product_gift[$i]['id'] ?>" onclick="addgift('<?= $product_gift[$i]['id'] ?>','<?= $taikhoan['id'] ?>')">
                            <p>Đổi quà</p>
                        </div>
                        <div class="text2 change2<?= $product_gift[$i]['id'] ?>">
                            <p>Đang xử lý</p>
                        </div>
                    <?php } else { ?>
                        <div class="text3 change3<?= $product_gift[$i]['id'] ?>">
                            <p>Bạn không đủ điểm</p>
                        </div>
                    <?php } ?>
                    <div style="clear:both;"></div>
                </div>
            </div>
            <?php } ?>   
            <div class="clear"></div>
            <div class="phantrang" ><?= $paging['paging'] ?></div>
            <div class="clear"></div>
        <?php }else{?>
            <p style="text-align: center;padding:20px 10px;"><?=change_lang('Chương trình đang cập nhật ...','Events updating ...')?></p>
        <?php } ?>
        </div>
        <div class="infoorder lichsu">
        	<div class="tieude lichsutext" style="width:100%;float:left;margin-top:20px;background:#ebebeb;">
                <div class="lichsu_con" style="width:10%;float:left;text-align:center;">
                    <p style="line-height:40px;font-family:'opensans-bold';">Stt</p>
                </div>
                <div class="lichsu_con" style="width:50%;float:left;text-align:center;">
                    <p style="line-height:40px;font-family:'opensans-bold';">Sản phẩm đổi</p>
                </div>
                <div class="lichsu_con" style="width:20%;float:left;text-align:center;">
                    <p style="line-height:40px;font-family:'opensans-bold';">Số điểm</p>
                </div>
                <div class="lichsu_con" style="width:20%;float:left;text-align:center;">
                    <p style="line-height:40px;font-family:'opensans-bold';">Ngày</p>
                </div>
            </div>
            <div style="clear:both"></div>
            <?php
            $d->reset();
            $sql = "select * from #_product_thongso where iduser = '".$taikhoan['id']."' order by ngaytao desc";
            $d->query($sql);
            $history = $d->result_array();
            for($i = 0; $i < count($history);$i++){
            	$d->reset();
                $sql = "select * from #_product where id = '" . $history[$i]['id_product'] . "'";
                $d->query($sql);
                $productonly = $d->fetch_array();
            	?>
                    <div class="tieude lichsutext" style="width:100%;float:left;border-bottom: 1px solid #e6e6e6;padding:10px 0px">
                        <div class="lichsu_con" style="width:10%;float:left;text-align:center;">
                            <p><?= $i + 1 ?></p>
                        </div>
                        <div class="lichsu_con" style="width:50%;float:left;text-align:center;">
                            <p><?= $productonly['ten_vi'] ?></p>
                        </div>
                        <div class="lichsu_con" style="width:20%;float:left;text-align:center;">
                            <p><?= $history[$i]['diemdoi'] ?></p>
                        </div>
                        <div class="lichsu_con" style="width:20%;float:left;text-align:center;">
                            <p><?= date('d/m/Y',$history[$i]['ngaytao']) ?></p>
                        </div>
                    </div>
                    <div style="clear:both"></div>
        	<?php } ?>
        </div>
        <div style="clear:both"></div>
    </div>
</div>

<?php
} else {
    transfer("Bạn chưa đăng nhập !", "./");
}
?>