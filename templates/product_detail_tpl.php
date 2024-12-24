    <?php 
$d->reset();
$sql = "select * from #_product_hinhanh where id_photo = '".$row_detail['id']."'";
$d->query($sql);
$hinhanh = $d->result_array();

$d->reset();
$sql = "select * from #_product_tab where id_photo = '".$row_detail['id']."' and com = 'listgia' order by stt";
$d->query($sql);
$producttab = $d->result_array();
?>

<style>
    .box_content{width:100%;float:left;margin-bottom: 40px;}
    .contentdetail{width:100%;float:left;}
    .leftdetail{float:left;width:45%}
    .detailimg{max-width:100% !important;height: auto !important;}
    .rightdetail{float:right;width:50%}

    .noidungdetail{width:100%;float:left}
    .titledetail{float:left;width:100px;text-align: center;border:1px solid #e5e5e5;border-bottom: 1px solid white;margin-top:20px}
    .titledetail p{line-height:30px;font-size:15px;}

    .noidungdetail1{text-align: justify;width:100%;float:left;margin-top:20px;line-height: 23px;font-size: 15px}
    .noidungdetail1 p{margin-bottom: 10px;font-size: 15px}
    .noidungdetail1 a{font-size: 15px}
    .noidungdetail1 img{max-width: 100%;margin:10px 0px;height:auto !important;font-size: 15px}
    .noidungdetail1 ul{padding-left: 20px;}
    .contentsp img{max-width: 100% ;height: auto !important;}

    .khungdetail{width:100%;float:left;}
    .giadetail{width:100%;float:left;margin: 20px 0px}
    .giadetail a{display: inline-block;padding: 10px 25px;color: #2084af;background: white;border: 1px solid #2084af;transition: all 0.5s;margin-right: 5px;cursor: pointer;}
    .giadetail a:hover{color: white;background: #2084af;border: 1px solid white;transition: all 0.5s;}
    .activegia{color: white !important;background: #2084af !important;border: 1px solid white !important;transition: all 0.5s;}
    .motakm{width:100%;float:left;border-bottom:1px solid #e9e9e9;padding:20px 0px}
    .motakm p{font-size:14px;color:#71706c;line-height: 20px;}
    .motakm1{width:100%;float:left;border-bottom:1px solid #e9e9e9;padding:20px 0px}
    .motakm1 p{font-size:14px;color:#71706c;line-height: 28px;font-weight: bold}
    .xuatxukm{width:100%;float:left;border-bottom:1px solid #e9e9e9;padding:20px 0px}
    .xuatxukm p{line-height:25px;font-size:14px;color:#71706c;}
    .number{border-radius: 30px;text-align: center;border:1px solid silver;height:40px;margin-right:20px}  

    .hieuunggiohang{margin-left:-200px;transition: all 1s}
    .logoheadergiohang{left:-400px;transition: all 1s}
    @media(max-width: 770px){

        .leftdetail{width: 100% !important}

        .rightdetail{width: 100% !important}

    }
</style>

<script>
    $(document).ready(function (e) {
        var size='';
        var color='';
        var colorname='';
        $('.sizes').click(function(){
            $('.u_sizes').find('.act1').removeClass('act1');
            $(this).addClass('act1');
            size = $(this).find('#cosize').val();         
        })


        $('.colors').click(function(){
            $('.u_colors').find('.act1').removeClass('act1');
            $(this).addClass('act1');
            color = $(this).find('#cocolor').val();
            colorname = $(this).find('#cocolorname').val();   
        })





        $('.giohangbutton').click(function () {
            var id = $(this).attr('dataid');
            var qty = $('#qty').val();
            if(size == ''){ size = '';}
            if(color == ''){ color = '';}
            if(colorname == ''){ colorname = '';}
            addtocart(id, qty, 1, 1, 1);
            setTimeout(function () {
                window.location = "thanh-toan.html";
            }, 100);
        });

    });



    // function addtocart(id, $sl) {
    //     var gia = $('#checkprice').val();
    //     $.ajax({
    //         type: 'post',
    //         url: "gio-hang.html",
    //         data: {id: id, sl: $sl, act: 'add', gia: gia},
    //         success: function (data) {
    //             $(".source-cart a").html(data.num);
    //             updateCartNum()
    //             $.fancybox({
    //                 href: base_url + "/gio-hang/fill.html",
    //                 type: "ajax"
    //             })
    //         }
    //     })
    //     return false;
    // }


    function updateCartNum() {
        $.get("index.php", {ajax: "number"}, function (data) {
            $("#cart-total").html(data);
        })
    }

</script>



<style type="text/css">
    .border-detail-product{
        border-bottom: solid 1px #eaeaea;
    }
    .color ul li,.size ul li  {cursor: pointer;
    min-width: 5rem;
    min-height: 2.125rem;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: .25rem .75rem;
    margin: 0 8px 8px 0;
    color: rgba(0,0,0,.8);
    text-align: left;
    border-radius: 2px;
    border: 1px solid rgba(0,0,0,.09);
    position: relative;
    background: #fff;
    outline: 0;
    word-break: break-word;
    display: -webkit-inline-box;
    display: -webkit-inline-flex;
    display: -moz-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -moz-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;}

    .u_colors,.u_sizes{padding: 0px;margin:0px;}
    .color ul li:hover { border:1px solid #e5e5e5;}
    .size ul li:hover { border:1px solid #EE4D2D}
    .size .act1 { border:1px solid #EE4D2D  !important}
    .size .act1 span{color:#EE4D2D !important;}
    .size .act1 .product-variation__tick{display: inline-block !important;}

    .color ul li:hover { border:1px solid #EE4D2D}
    .color .act1 { border:1px solid #EE4D2D  !important}
    .color .act1 span{color:#EE4D2D !important;}
    .color .act1 .product-variation__tick{display: inline-block !important;}

    .product-variation__tick {
        width: .9375rem;
        height: .9375rem;
        position: absolute;
        overflow: hidden;
        right: 0;
        bottom: 0;
        display: none;
    }
    .product-variation__tick:before {
        border: .9375rem solid transparent;
        border-bottom-color: #ee4d2d;
        content: "";
        position: absolute;
        right: -.9375rem;
        bottom: 0;
    }
    .product-variation__tick>.icon-tick-bold {position: absolute;right: 0;bottom: 0;color: #fff;font-size: 8px;}
    .shopee-svg-icon {display: inline-block;width: 1em;height: 1em;fill: currentColor;position: relative;}
    .cartadd{width: 50%;float: left;background: #eea24c;color: white;text-align: center;cursor: pointer;margin-top: 20px;}
    .cartadd p{line-height: 40px;}
    .cartadd a{font-size: 16px;}
    .noidungtailieu{width: 100%;float: left;margni-top: 40px}
    .showtailieu{width: 100%;float: left;margin-top: 10px;}
    .showtailieu i{font-size: 16px;margin-right: 5px;}
    .showtailieu a{font-size: 16px;color: black}
</style>



<div class="box_content box_detail" style="margin-top: 30px;width: 100%;float: left;">
    <div class="content_tc">
    <div style="box-sizing: border-box;background: #fff;width: 100%;float: left;">
        <div class="contentdetail">
            <div class="leftdetail" style="position: relative;">
                <?php if($row_detail['giakm'] > 0) { ?>
                    <div class="showphantram" style="width: 12%;border-radius: 10px;">
                        <p style="line-height: 35px;">- <?= 100 - round($row_detail['gia'] * 100 / $row_detail['giakm']) ?> %</p>
                    </div>
                <?php } ?>
                <div class="zoom_slick" align="center" style="background: #fff;padding:0px 30px;box-sizing: border-box;">    
                    <a  class="fancybox-buttons images_main swipebox" data-fancybox-group="button" href="<?= _upload_product1_l . $row_detail['photo'] ?>">
                        <img class='cloudzoom img-responsive' src="<?= _upload_product1_l . $row_detail['photo'] ?>" data-cloudzoom ="zoomSizeMode:'lens',autoInside: 550 ,zoomImage: '<?= _upload_product1_l . $row_detail['photo'] ?>' " style="">
                    </a>
                    <div style="clear:both;"></div>
                    <?php if($row_detail['photo_phu'] != '') { ?>
                        <a  class="fancybox-buttons images_main swipebox" data-fancybox-group="button" href="<?= _upload_product1_l . $row_detail['photo_phu'] ?>">
                            <img class='cloudzoom img-responsive' src="<?= _upload_product1_l . $row_detail['photo_phu'] ?>" data-cloudzoom ="zoomSizeMode:'lens',autoInside: 550 ,zoomImage: '<?= _upload_product1_l . $row_detail['photo_phu'] ?>' " style="">
                        </a>
                    <?php } ?>
                </div>
            </div>
            <style type="text/css">
                .titlectsp{display: block; width: 90px;float: left;}
                .gtitlesp{float: left;}
                .gtitlesp p{margin-bottom: 10px;width: 100% !important;}
                .gtitlesp img{max-width: 100% !important;height:auto !important;}
                .motasp_detail{width: 100%;float: left;padding: 20px 0px;border-top: 1px solid silver;border-bottom: 1px solid silver;}
                .detailprice{width: 100%;float: left;margin-bottom: 20px;}
                .left_mota{width: 72%;float:left}
                .right_logo{width: 25%;float:right;text-align: center;}
            </style>
            <script type="text/javascript">
                function checkgia(gia,id){
                    $('.tabgia').removeClass('activegia');
                    $('.giadetailcheck'+id).addClass('activegia');

                    document.getElementById('checkprice').value = id;

                    $.ajax({
                        type:'POST',
                        url:'ajax/ajax_checkgia.php',
                        data:{gia:gia},
                        success: function(data){
                            $('#changegia').html(data);
                        }
                    })
                }
            </script>
            <div class="rightdetail">

                <p style="font-size:25px;color:#353236;margin-bottom:20px;font-weight: bold;"><?= $row_detail["ten"] ?></p>
                <div class="clear"></div>
                <p class="detailprice">
                    <a style="font-size:16px">Giá : </a>
                    <a style="color:red;font-size: 26px;font-weight: bold;" id="changegia"><?= price_sp($row_detail["gia"]) ?></a>
                    <a style="color:silver;font-size: 18px;text-decoration: line-through;margin-left: 10px;" id="changegia">Giá niêm yết : <?= price_sp($row_detail["giakm"]) ?></a>
                    <input type="hidden" name="checkprice" id="checkprice" value="<?= $row_detail["gia"] ?>">
                </p>
                
                <div class="clear"></div>
                <div class="motasp_detail">
                    <div class="left_mota">
                        <p style="font-size: 15px;">
                            <i class="fa fa-check-circle" aria-hidden="true" style="color:#2084af;"></i>
                            <span style="color:#757575;display: inline-block;">Mã sản phẩm :</span> <span style="display: inline-block;font-weight: bold;color:#757575;"><?= $row_detail["masp"] ?></span><br>
                        </p>
                        <?php
                        $d->reset();
                        $sql = "select * from #_product_list where id = '".$row_detail["id_list"]."' order by stt, id asc";
                        $d->query($sql);
                        $list_brand = $d->fetch_array();

                        $d->reset();
                        $sql = "select * from #_product_list where hienthi=1 and type='thuong-hieu' and com = 2 and id = '".$row_detail["thuonghieu"]."' order by stt, id desc";
                        $d->query($sql);
                        $ttbrand = $d->fetch_array();
                        ?>
                        <!-- <p style="font-size: 15px;margin-top: 5px;">
                            <i class="fa fa-check-circle" aria-hidden="true" style="color:#2084af;"></i>
                            <span style="color:#757575;display: inline-block;">Thương hiệu :</span> <span style="display: inline-block;font-weight: bold;color:#757575;"><?= $ttbrand["ten_vi"] ?></span><br>
                        </p> -->
                        <?php

                        if($row_detail["trangthai"] == 1){
                            $texttrangthai = 'Còn hàng';
                        } elseif($row_detail["trangthai"] == 2){ 
                            $texttrangthai = 'Hết hàng';
                        } elseif($row_detail["trangthai"] == 3){ 
                            $texttrangthai = 'Đang về';
                        } elseif($row_detail["trangthai"] == 4){ 
                            $texttrangthai = 'Tạm ngững';
                        }
                        ?>
                        <p style="font-size: 15px;margin-top:5px">
                            <i class="fa fa-check-circle" aria-hidden="true" style="color:#2084af;"></i>
                            <span style="color:#757575;display: inline-block;">Trạng thái :</span> <span style="display: inline-block;;font-weight: bold;color:#757575;"><?= $texttrangthai ?></span><br>
                        </p>
                    </div>
                    <!-- <div class="right_logo">
                        <img src="upload/product/<?= $ttbrand['photo'] ?>" style="max-width: 100%;">
                    </div> -->
                </div>
                
                <div class="clear" style="margin-top: 10px;"></div>
                
                <div class="cartadd ">
                    <p onclick="loadcart(<?= $row_detail['id'] ?>)" class="hidedone">
                        <a id="textchange">THÊM VÀO ĐƠN HÀNG</a>
                    </p>
                    <p class="showdone" style="display: none;background: silver;">
                        <a>ĐÃ THÊM VÀO ĐƠN HÀNG</a>
                    </p>
                </div>
                <div class="clear"></div>
                <style type="text/css">
                    .contentchinhsach{width: 100%;float: left;margin: 20px 0px}
                    .detailchinhsach{width: 45%;float: left;margin-right: 2%;margin-top: 10px;}
                    .detailchinhsach:nth-child(2n){margin-right: 0%;}
                    .detailchinhsach a{font-size: 16px;color: black;}
                </style>
                <div class="contentchinhsach">
                    <?php
                    $d->reset();
                    $sql = "select * from #_product where hienthi=1 and type='chinhsach' and noibat = 1 order by stt, id desc";
                    $d->query($sql);
                    $chinhsachnb = $d->result_array();
                    for($i = 0; $i < count($chinhsachnb);$i++) {
                    ?>
                        <div class="detailchinhsach">
                            <p>
                                <i class="fa fa-file" aria-hidden="true" style="margin-right: 5px;"></i>
                                <a href="<?= $chinhsachnb[$i]['tenkhongdau'] ?>"><?= $chinhsachnb[$i]['ten_vi'] ?></a>
                            </p>
                        </div>
                    <?php } ?>
                </div>
                <div class="clear"></div>
                <style type="text/css">
                    .contenthotro{width: 100%;float: left;}
                    .detailhotro{width: 45%;float: left;margin-right: 2%;background: #8f8f8f;padding:2% 2%;margin-top: 10px;}
                    .detailhotro:nth-child(2n){margin-right: 0%;}
                    .detailhotro img{vertical-align: middle;margin-right: 10px;}
                    .detailhotro p{height:40px;overflow: hidden}
                    .detailhotro a{font-size: 16px;color: white}
                </style>
                <div class="contenthotro">
                    <?php
                    $d->reset();
                    $d->query("select * from #_icon where hienthi=1 and type='hotro' order by stt,id desc");
                    $hotroicon = $d->result_array();
                    for($i = 0; $i < count($hotroicon);$i++) {
                    ?>
                        <div class="detailhotro">
                            <img src="upload/icon/<?= $hotroicon[$i]['photo'] ?>" style="width: 25px;float:left">
                            <p> 
                                <a><?= $hotroicon[$i]['ten_vi'] ?></a>
                            </p>
                        </div>
                    <?php } ?>
                </div>
                <div class="clear"></div>
                
            </div>
            <div style="clear: both;"></div>
        </div>
        <div style="clear: both;"></div>
        <style type="text/css">
            .khungshowanh{width: 100%;float: left;margin-top:20px}
            .gridshowanh{
                display: grid;
                grid-template-columns: repeat(4,25%);
                list-style: none;
                list-style-type: none;
                width: 100%;
            }
            .gridshowanh li{box-sizing: border-box;list-style: none;text-align: center;padding:4%}
            .gridshowanh li img{max-width: 100%;}
            .leftnd_detail{width: 48%;float:left;}
        </style>
        <div class="leftnd_detail" style="margin-right: 4%;">
            <div style="margin-top: 40px;width: 100%;float: left;box-sizing: border-box;margin-bottom: 10px;"><div class="section-heading"><h2>Mô tả chi tiết</h2></div></div>
            <div style="clear: both;"></div>
            <div class="khungshowanh">
                <div class="zoom-gallery">
                    <ul class="gridshowanh">
                        <?php for($i = 0; $i < count($hinhanh);$i++) { ?>
                            <li>
                                <a href="upload/product/imgproduct/<?= $hinhanh[$i]['photo'] ?>" title="<?= $row_detail["ten_vi"] ?>">
                                    <img src="upload/product/imgproduct/<?= $hinhanh[$i]['photo'] ?>">
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div style="clear: both;"></div>
            <?php if($row_detail["noidung"] != '')  { ?>
                <div class="noidungdetail1">
                    <?php $xulychuoi1 = str_replace('*', '<div style="clear: both;height:10px"></div><a style="font-weight:bold">-</a>  ', $row_detail["noidung"]) ?>
                    <?= $xulychuoi1 ?></br>
                </div>
                <div style="clear: both;"></div>
            <?php } ?>
        </div>
        <div class="leftnd_detail">
            <div style="margin-top: 40px;width: 100%;float: left;box-sizing: border-box;margin-bottom: 10px;"><div class="section-heading"><h2>Thông tin tham khảo</h2></div></div>
            <div style="clear: both;"></div>
            <?php $ganlink = explode('.be/',$row_detail["ten_video"]) ?>
            <div class="noidungdetail1">
                <?php $xulychuoi = str_replace('*', '<div style="clear: both;height:10px"></div><a style="font-weight:bold">-</a> ', $row_detail["mota"]) ?>
                <?= $xulychuoi ?></br></br>
                <?php if($row_detail["ten_video"] != '') { ?>
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?= $ganlink[1] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <?php } ?>
            </div>
            <div style="clear: both;"></div>
        </div>
        
        <?php 
            $mangspmuakem = explode(',', $row_detail["spmuakem"]);
            if($row_detail["spmuakem"] != '') {
            ?>
                <div style="clear: both;"></div>
                <div style="margin-top: 40px;width: 100%;float: left;box-sizing: border-box;margin-bottom: 10px;"><div class="section-heading"><h2>Sản phẩm mua kèm</h2></div></div>
                <div style="clear: both;"></div>
                <div class="boxspmuakem" style="width: 100%;float:left;margin-top: 20px;">
                    <?php for ($i = 0; $i < count($mangspmuakem);$i++) { 
                            $d->reset();
                            $sql = "select * from #_product where masp = '".$mangspmuakem[$i]."' order by stt";
                            $d->query($sql);
                            $product_info = $d->fetch_array();

                            $d->reset();
                            $sql = "select * from #_product_tab where id_photo = '".$product_info['id']."' and com = 'listgia' order by stt";
                            $d->query($sql);
                            $producttab = $d->result_array();
                            ?>
                            <div class="productcon">
                                <?php if($product_info['giakm'] > 0) { ?>
                                    <div class="showphantram">
                                        <p>- <?= 100 - round($product_info['gia'] * 100 / $product_info['giakm']) ?> %</p>
                                    </div>
                                <?php } ?>
                                <div class="colpad" style="" > 
                                    <div class="colpro">
                                        <div class="imgbox1">
                                            <a href="<?=$product_info['tenkhongdau']?>" style="box-sizing: border-box;display: block;width: 100%;">
                                                <img class="imgname checkimg<?=$product_info['id']?>" src="<?=_upload_product1_l.$product_info['photo']?>" alt="<?=$product_info['ten_'.$lang]?>" onerror='this.src="images/no-image.svg"'>
                                            </a>
                                        </div>
                                        <a href="<?=$product_info['tenkhongdau']?>" class="homecathover"><?=$product_info['ten_'.$lang]?></a>
                                        <div class="clear"></div>
                                        <p style="margin-left:15px;margin-top:10px;color:#959595;font-size12px"><?=$product_info['masp']?></p>
                                        <div class="clear"></div>
                                        <div class="baogia">
                                            <p style="padding: 0px 15px;">
                                                <?php if($product_info['gia'] == 0) { ?>
                                                    <a>Liên hệ</a>
                                                <?php } else { ?>
                                                    <a style="text-decoration: line-through;font-size: 14px;color:silver"><?= price_sp($product_info['giakm']) ?></a></br>
                                                    <a style="font-weight: bold;"><?= price_sp($product_info['gia']) ?></a>
                                                <?php } ?>
                                                
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php } ?>
                </div>
                <div style="clear: both;"></div>
            <?php } ?>

        <?php
        $d->reset();
        $sql = "select * from #_icon where id_product = '".$row_detail['id']."' and type = 'listfile' order by stt";
        $d->query($sql);
        $producttab_file = $d->result_array();
        ?>
        <?php if(count($producttab_file) > 0)  { ?>
            <div style="margin-top: 20px;width: 100%;float: left;box-sizing: border-box;margin-bottom: 10px;"><div class="section-heading"><h2>Tài liệu đính kèm</h2></div></div>
            <div style="clear: both;"></div>
            
            <div class="noidungtailieu">
                <?php for($i = 0; $i < count($producttab_file);$i++) { ?>
                <div class="showtailieu">
                    <p>
                        <i class="fa fa-file" aria-hidden="true"></i>
                        <a href="<?= $producttab_file[$i]['url'] ?>" target="_blank">
                            <?= $producttab_file[$i]['ten_vi'] ?> - <?= $row_detail['masp'] ?>
                        </a>
                    </p>
                </div>
                <?php } ?>
            </div>
            <div style="clear: both;"></div>
        <?php } ?>
        <div style="clear: both;"></div>
    </div>    
</div>
<div class="clear"></div>
    
    <div class="clear"></div>
        <div style="margin-top: 40px;width: 100%;float: left;box-sizing: border-box;margin-bottom: 30px;"><div class="section-heading"><h2>Sản phẩm cùng loại</h2></div></div>

        <div class="clear"></div>
        <div style="width:100%;float: left;box-sizing: border-box;">
        <?php foreach ($sanpham_khac as $ktt => $vtt) { 
            $d->reset();
            $sql = "select * from #_product_tab where id_photo = '".$vtt['id']."' and com = 'listgia' order by stt";
            $d->query($sql);
            $producttab = $d->result_array();
            ?>
            <div class="productcon" style="">
                <?php if($vtt['giakm'] > 0) { ?>
                    <div class="showphantram">
                        <p>- <?= 100 - round($vtt['gia'] * 100 / $vtt['giakm']) ?> %</p>
                    </div>
                <?php } ?>
                <div class="colpad" style="" > 
                    <div class="colpro">
                        <div class="imgbox1">
                            <a href="<?=$vtt['tenkhongdau']?>" style="box-sizing: border-box;display: block;width: 100%;">
                                <img class="imgname checkimg<?=$vtt['id']?>" src="<?=_upload_product1_l.$vtt['photo']?>" alt="<?=$vtt['ten']?>" onerror='this.src="images/no-image.svg"'>
                            </a>
                        </div>
                        <a href="<?=$vtt['tenkhongdau']?>" class="homecathover"><?=$vtt['ten']?></a>
                        <div class="clear"></div>
                        <p style="margin-left:15px;margin-top:10px;color:#959595;font-size:12px"class="heightms"><?=$vtt['masp']?></p>
                        <div class="clear"></div>
                        <div class="baogia">
                            <p style="padding: 0px 15px;">
                                <?php if($vtt['gia'] == 0) { ?>
                                    <a>Liên hệ</a>
                                <?php } else { ?>
                                    <a style="text-decoration: line-through;font-size: 14px;color:silver"><?= price_sp($vtt['giakm']) ?></a></br>
                                    <a style="font-weight: bold;"><?= price_sp($vtt['gia']) ?></a>
                                <?php } ?>
                                
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>



<script type="text/javascript" src="assets/js/zoomanh3/js/cloudzoom.js"></script>

<link href="assets/js/zoomanh3/css/cloudzoom.css" type="text/css" rel="stylesheet" /> 

<script type = "text/javascript">

    CloudZoom.quickStart();

</script>



<!-- slick -->

<link rel="stylesheet" type="text/css" href="assets/js/zoomanh3/css/slick.css"/>

<link rel="stylesheet" type="text/css" href="assets/js/zoomanh3/css/slick-theme2.css"/>

<script type="text/javascript" src="assets/js/zoomanh3/js/slick.min.js"></script>







<link rel="stylesheet" href="assets/js/zoomanh3/css/swipebox.css">

<script src="assets/js/zoomanh3/js/jquery.swipebox.js"></script>

<script type="text/javascript">

$( document ).ready(function() {

        $( '.swipebox' ).swipebox();

  });

</script>



<script type="text/javascript">
    $('.zoom-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
            verticalFit: true,
            titleSrc: function(item) {
                return item.el.attr('title') + '<a class="image-source-link" style="color:white" href="'+item.el.attr('data-source')+'" target="_blank"><?= $row_detail['ten'] ?></a>';
            }
        },
        gallery: {
            enabled: true
        },
        zoom: {
            enabled: true,
            duration: 300, // don't foget to change the duration also in CSS
            opener: function(element) {
                return element.find('img');
            }
        }
        
    });
    $(document).ready(function () {

        

        var wscreenslider = $(document).width();

        if(wscreenslider > 520){

            itemslider = 5;

        }else if(wscreenslider <=  520 && wscreenslider >  420){

            itemslider = 4;

        }else{

            itemslider = 3;

        }

        //alert(wscreenslider);

        $('.slick .cloudzoom-gallery').click(function () {

            var url_hinh = $(this).parent('a').attr('href');

            $('.images_main').attr('href', url_hinh);

            $('.images_main .cloudzoom').attr('data-cloudzoom', "zoomSizeMode:'image',autoInside: 550 ,zoomImage:" + url_hinh);

        });



        $('.slick').slick({

            dots: false,

            infinite: true,

            speed: 300,

            slidesToShow: itemslider,

            slidesToScroll: 1,

            draggable: true,

            centerMode: true, //item nằm giữa

        });

    });

</script>

<!-- slick -->





<script type="text/javascript">

    $(document).ready(function (e) {

        var gttonkho  = $('#tonkho').val();

        $(".quantity .plus").click(function(){

            $id = $(this).data("id");

            $input = $(this).parent().find(".qty")

            $val = parseInt($input.val());

            //alert($val);

            if ($val > gttonkho-1) {

                //alert('Nhập số lượng phải nhỏ hơn '+gttonkho);

                $num = parseInt($input.val());

                $input.val($num);

                return false;

            }else{

                $num = parseInt($input.val());

                $input.val($num+1);

            }



            if (parseInt($val) < 1) {

                $(this).val(1);

                $val = 1;

            }

            //alert($val);

            //$root = $(this).parents("tr");

            //$price = parseInt($(this).data("price"));

            

        })

        $(".quantity .minus").click(function(){

            $id = $(this).data("id");

            $input = $(this).parent().find(".qty")

            $num = parseInt($input.val());

            if($num > 1){

               $input.val($num-1);

               $val = parseInt($input.val());

               if (parseInt($val) < 1) {

                    $(this).val(1);

                    $val = 1;

                }

            $root = $(this).parents("tr");

            $price = parseInt($(this).data("price"));

            if ($price < 1) {

                    $price = 0;

                }

            } else {

                //alert('Nhập số lượng phải lớn hơn 0');

                return false;

            }

        })

    });

</script>
<style type="text/css">
    #cloudzoom-zoom-image-1, .cloudzoom-zoom, .cloudzoom-blank{display: none !important;}
</style>