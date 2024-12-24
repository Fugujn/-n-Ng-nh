
<style type="text/css">
    .right_search{float:right;margin-top: -10px}
    .right_search select{height: 30px;border:1px solid #dedede;}
</style> 

<script>
    function myFunction() {
        var x = document.getElementById("selectgia").value;
        if(x == 'random') {
            biensession = 'random';
        } 
        if(x == 'giatang') {
            biensession = 'giatang';
        } 
        if(x == 'giagiam') {
            biensession = 'giagiam';
        }
        $.ajax({
            url: "ajax/sessionsapxep.php",
            data: {biensession: biensession},
            type: "post",
            success: function (data) {
            }
        });
        location.reload();
    }

    function session_sapxep() {
        var thutu = $('#sapxepoption').val();
        $.ajax({
            type: 'POST',
            url: 'ajax/ajax_search.php',
            data: {thutu: thutu, type : 'thutu'},
            success: function (trave) {
                window.location.reload();
            }
        })
    }
</script>

    
<?php if($com == 'san-pham') { ?>


<style type="text/css">
  .boxcat:hover img{opacity: .8}
  .boxcat:hover .boxcatbg{left: 30px !important;}
  .boxcat .boxcatbg span{color:#2a2a2a;font-family:'roboto-b';font-size: 17px;text-transform: uppercase;}
</style> 
<div style="padding:0px 0px;margin-top: 30px;margin-bottom: 40px;width:100%;float: left;">
    <div class="section-heading">
        <h2><?= $title_tcat ?></h2> 
        
    </div>
</div>
<div class="clear" ></div>
<?php foreach ($product_list as $kp => $vp) { ?>
    <div class="col-sp-4" style="margin-bottom: 20px;">
        <div class="colpad" style="padding:0px 10px;">
            <div class="imgbox1" style="border-radius: 10px;">
                <a href="<?=$vp['tenkhongdau']?>">
                    <img class="imgname" src="<?=_upload_thumb_l.$vp['thumb']?>" alt="<?=$vp['ten']?>">
                    <div style="background:rgba(0,0,0,0.2);width:100%;height: 100%;position: absolute;top:0px;left: 0px;"></div>
                    <span style="display: inline-block;position: absolute;top:50%;left: 50%;transform: translate(-50%,-50%);text-align:center;color:#fff;font-family:'chakrapetch-bold';font-size: 18px;background:rgba(0,0,0,0.5);padding:10px 15px;box-sizing: border-box;width:80%;">
                        <!-- <img src="<?=_upload_thumb_l.$vp['thumb2']?>" alt="<?=$vp['ten']?>"><br> -->
                        <?=$vp['ten']?>
                    </span>
                </a>
            </div>
        </div>
    </div>
  <?php } ?>
  <div class="clear"></div>
<div class="phantrang" ><?= $paging['paging'] ?></div>
<div class="clear"></div>
    
<?php } else { ?>
    <?php 
    $checkbrands = explode(',',$_SESSION['searchf']['brands']);
    if($checkbrands != ''){
        $checkcount = count($checkbrands) - 1;
        
        if($checkcount == 1){
            $wherebrand .= " and id = '".$checkbrands[0]."' ";
        }

        if($checkcount > 1){
            for ($i=0; $i < $checkcount ; $i++) { 
                if($i==0){
                  $wherebrand .= " and ( id = '".$checkbrands[$i]."' ";
                }elseif($i == (count($checkbrands)-1)){
                  $wherebrand .= " or id = '".$checkbrands[$i]."' ";
                }else{
                  $wherebrand .= " or id = '".$checkbrands[$i]."' ";
                }
            
            }
            $wherebrand .= " )";
        }
        
    }

    $sql = "select * from #_product_list where hienthi=1 and type='thuong-hieu' " . $wherebrand . " order by stt,id desc";
    $d->query($sql);
    $brandname = $d->result_array();
    ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.btn-detail').click(function(){
            var sta = $('.content-t-wrap').attr('data-show');
            if(sta == 0){
                $('.contentpro').css({
                    height: 'auto'
                });
                $('.content-t-wrap').attr('data-show',1);
                $('.btn-detail span').html('Đóng lại');
            }
            if(sta == 1){
                $('.contentpro').css({
                    height: '450px'
                });
                $('.content-t-wrap').attr('data-show',0);
                $('.btn-detail span').html('Xem thêm');
            }
        })
    });
</script>
<style type="text/css">
    .contentpro{margin-bottom: 30px;width:100%;float: left;padding:10px;box-sizing: border-box;height: 450px;overflow: hidden;transition: .3s;}
    .contentpro img{max-width: 100% !important;height: auto !important}
    .contentpro p{margin-bottom: 10px;line-height: 25px;}
    .content-t-wrap{position: relative;margin-bottom: 20px;}
    .bg-article {
    background: linear-gradient(to bottom,rgba(255 255 255/0),rgba(255 255 255/62.5),rgba(255 255 255/1));
    bottom: 15px;
    height: 105px;
    left: 0;
    position: absolute;
    width: 100%;
}
.btn-detail span {
    position: relative;
}
.btn-detail span::before {
    border-bottom: 5px solid transparent;
    border-top: 5px solid transparent;
    border-left: 5px solid #2f80ed;
    content: '';
    position: absolute;
    top: 3px;
    right: -15px;
}
.article .btn-detail {
    position: relative;
}
.btn-detail {
    border: 1px solid #2f80ed;
    border-radius: 5px;
    color: #2f80ed;
    display: block;
    margin: 0 auto;
    max-width: 340px;
    padding: 10px 5px;
    text-align: center;
}
.optionmsearch{width: 48%;float: left;margin-top: 20px;}
.optionmsearch select{width: 100%;float: left;height: 40px;border:1px solid silver}
.section-heading h2{font-size: 18px;}
</style>

    <div style="width: 100%;float:left" class="baoproduct">
        <div class="optionmsearch mobilehienlen" style="margin-right: 4%;">
            <select class="checkth" onchange="changeth()">
                <option>Lọc thương hiệu</option>
                <?php
                
                $d->reset();
                $sql = "select * from #_product_list where hienthi = 1 and type = 'san-pham' and tenkhongdau = '".$_REQUEST['com']."' ";
                $d->query($sql);
                $checkcap_mo = $d->fetch_array();

                if($checkcap_mo['com'] == 1){
                    $showcap3_mo = $checkcap_mo['id'];
                } elseif($checkcap_mo['com'] == 2){
                    $showcap3_mo = $checkcap_mo['id_parent'];
                } elseif($checkcap_mo['com'] == 3){
                    $tachlevel = explode('|',$rs_menu['set_level']);
                    $showcap3_mo = $tachlevel[0];
                } 

                $d->reset();
                $sql = "select * from #_product_list where hienthi=1 and type='thuong-hieu' and id_parent = '".$showcap3_mo."' order by stt,id desc";
                $d->query($sql);
                $brandleft = $d->result_array();
                for ($i = 0; $i < count($brandleft); $i++) {
                ?>
                    <option value="<?= $brandleft[$i]['id'] ?>"><?= $brandleft[$i]['ten_vi'] ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="checkdm" class="checkdm" value="<?= $rs_menu['id'] ?>">
        </div>
        <div class="optionmsearch mobilehienlen">
            <select class="checkstt" onchange="changestt()">
                <option value="" <?php if($_SESSION['sapxep']['sapxepstt'] == ''){ ?> selected="selected" <?php } ?>>Sắp xếp</option>
                <option value="sx1" <?php if($_SESSION['sapxep']['sapxepstt'] == 'sx1'){ ?> selected="selected" <?php } ?>>Sản phẩm Bán chạy</option>
                <option value="sx2" <?php if($_SESSION['sapxep']['sapxepstt'] == 'sx2'){ ?> selected="selected" <?php } ?>>Sản phẩm Mới nhất</option>
                <option value="sx3" <?php if($_SESSION['sapxep']['sapxepstt'] == 'sx3'){ ?> selected="selected" <?php } ?>>Giá từ Thấp đến cao</option>
                <option value="sx4" <?php if($_SESSION['sapxep']['sapxepstt'] == 'sx4'){ ?> selected="selected" <?php } ?>>Giá từ Cao đến thấp</option>
            </select>
            <input type="hidden" name="checkdm" class="checkdm" value="<?= $rs_menu['id'] ?>">
        </div>
        <div style="margin-top: 30px;width:100%;float: left;margin-bottom: 30px;box-sizing: border-box;">
            <div class="section-heading">
                <h2><?= $title_tcat ?></h2>
                <a style="color:#676767;display:inline-block;margin-left: 10px;">
                    <?php if($_SESSION['searchf']['brands'] != '') { ?>   
                        Thương hiệu :  
                        <?php for($i = 0;$i < count($brandname);$i++) { ?>    
                            <?php if($i == (count($brandname)-1)) { ?>
                                <?= $brandname[$i]['ten_vi'] ?>
                            <?php } else { ?>
                                <?= $brandname[$i]['ten_vi'] ?>,
                            <?php } ?>

                        <?php } ?>
                    <?php } ?>
                </a>
            </div>
        </div>
        <div class="clear" ></div>
        <?php if($rs_menu['noidung'] != ''){?>
            <div data-show="0" class="article content-t-wrap">
                <div class="contentpro"><?=$rs_menu['noidung']?></div>
                <div class="clear"></div>
                <div class="bg-article"></div>
                <div class="clear"></div>
                <a href="javascript:void(0)" class="btn-detail jsArticle">
                <span>Xem thêm</span>
                </a>
            </div>
        <?php } ?>
        <div class="clear"></div>
        <div class="boxflex">
            <?php for ($i = 0; $i < count($product); $i++) { ?>
                <div class="productcon" style="">
                    <?php if($product[$i]['giakm'] > 0) { ?>
                        <div class="showphantram">
                            <p>- <?= 100 - round($product[$i]['gia'] * 100 / $product[$i]['giakm']) ?> %</p>
                        </div>
                    <?php } ?>
                    <div class="colpad" style="" > 
                        <div class="colpro">
                            <div class="imgbox1">
                                <a href="<?=$product[$i]['tenkhongdau']?>" style="box-sizing: border-box;display: block;width: 100%;">
                                    <img class="imgname " src="<?=_upload_product1_l.$product[$i]['photo']?>" alt="<?=$product[$i]['ten']?>" onerror='this.src="images/no-image.svg"'>
                                </a>
                            </div>
                            <a href="<?=$product[$i]['tenkhongdau']?>" class="homecathover"><?=$product[$i]['ten']?></a>
                            <div class="clear"></div>
                            <p style="margin-left:15px;margin-top:10px;color:#959595;font-size:12px" class="heightms"><?=$product[$i]['masp']?></p>
                            <div class="clear"></div>
                            <div class="baogia">
                                <p style="padding: 0px 15px;">
                                    <?php if($product[$i]['gia'] == 0) { ?>
                                        <a>Liên hệ</a>
                                    <?php } else { ?>
                                        <a style="text-decoration: line-through;font-size: 14px;color:silver"><?= price_sp($product[$i]['giakm']) ?></a></br>
                                        <a style="font-weight: bold;"><?= price_sp($product[$i]['gia']) ?></a>
                                    <?php } ?>
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
	        <?php } ?>        
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="phantrang" ><?= $paging['paging'] ?></div>
        <div class="clear"></div>
    </div>
<?php } ?><!-- Phan san pha -->
