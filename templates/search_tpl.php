<?php
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

$d->reset();
$sql = "select * from #_product_list where hienthi=1 and id='".$_SESSION['searchf']['list']."' order by stt,id desc";
$d->query($sql);
$listname = $d->fetch_array();
 
?>
<style type="text/css">
    .section-heading h2{font-size: 18px;}
    .optionmsearch{width: 48%;float: left;margin-top: 20px;}
    .optionmsearch select{width: 100%;float: left;height: 40px;border:1px solid silver}
    .section-heading h2{font-size: 18px;}
</style>
<?php if($_SESSION['savenamesearch'] == '') { ?>
    <div class="baosearch_check">
        <div class="optionmsearch mobilehienlen" style="margin-right: 4%;">
            <select class="checkth" onchange="changeth()">
                <option>Lọc thương hiệu</option>
                <?php

                $d->reset();
                $sql = "select * from #_product_list where hienthi = 1 and type = 'san-pham' and id = '".$_SESSION['searchf']['list']."' ";
                $d->query($sql);
                $checkcap1_mo = $d->fetch_array();

                if($checkcap1_mo['com'] == 1){
                    $showcap3_mo = $checkcap1_mo['id'];
                } elseif($checkcap1_mo['com'] == 2){
                    $showcap3_mo = $checkcap1_mo['id_parent'];
                    $showdanhmuc = $showcap3_mo;
                } elseif($checkcap1_mo['com'] == 3){
                    $tachlevel = explode('|',$checkcap1_mo['set_level']);
                    $showcap3_mo = $tachlevel[0];
                    $showdanhmuc = $tachlevel[1];
                } 

                $d->reset();
                $sql = "select * from #_product_list where hienthi=1 and type='thuong-hieu' and id_parent = '".$showcap3_mo."' order by stt,id desc";
                $d->query($sql);
                $brandleft = $d->result_array();
                for ($i = 0; $i < count($brandleft); $i++) {
                ?>
                    <option value="<?= $brandleft[$i]['id'] ?>" <?php if($brandleft[$i]['id'] == $checkbrands[0]){ ?> selected="selected" <?php } ?>><?= $brandleft[$i]['ten_vi'] ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="checkdm" class="checkdm" value="<?= $listname['id'] ?>">
        </div>
        <div class="optionmsearch mobilehienlen">
            <select class="checkstt2" onchange="changestt2()">
                <option value="" <?php if($_SESSION['sapxep']['sapxepstt'] == ''){ ?> selected="selected" <?php } ?>>Sắp xếp sản phẩm</option>
                <option value="sx1" <?php if($_SESSION['sapxep']['sapxepstt'] == 'sx1'){ ?> selected="selected" <?php } ?>>Sản phẩm Bán chạy</option>
                <option value="sx2" <?php if($_SESSION['sapxep']['sapxepstt'] == 'sx2'){ ?> selected="selected" <?php } ?>>Sản phẩm Mới nhất</option>
                <option value="sx3" <?php if($_SESSION['sapxep']['sapxepstt'] == 'sx3'){ ?> selected="selected" <?php } ?>>Giá từ Thấp đến cao</option>
                <option value="sx4" <?php if($_SESSION['sapxep']['sapxepstt'] == 'sx4'){ ?> selected="selected" <?php } ?>>Giá từ Cao đến thấp</option>
            </select>
            <input type="hidden" name="checkdm2" class="checkdm2" value="<?= $rs_menu['id'] ?>">
        </div>

        <div style="width: 100%;float:left;margin-top:30px">
            <div class="section-heading">
                <h2>
                    <?php if($_SESSION['savenamesearch'] == '') { ?>
                        <?= $listname['ten_vi'] ?> / 
                        <?php for($i = 0;$i < count($brandname);$i++) { ?>
                            
                            <?php if($i == (count($brandname)-1)) { ?>
                                <?= $brandname[$i]['ten_vi'] ?>
                            <?php } else { ?>
                                <?= $brandname[$i]['ten_vi'] ?>,
                            <?php } ?>

                        <?php } ?>
                    <?php } else { ?>
                        Tìm kiếm theo mã <?= $_SESSION['savenamesearch'] ?>
                    <?php } ?>
                </h2> 
            </div>
        </div>
        <div class="clear" ></div>
        <div class="baoproductindex" style="width:100%;float:left;margin-top:20px">
            <?php for ($i = 0; $i < count($product); $i++) { 
                $d->reset();
                $sql = "select * from #_product_tab where id_photo = '".$product[$i]['id']."' and com = 'listgia' order by stt";
                $d->query($sql);
                $producttab = $d->result_array();
                ?>
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
                                    <img class="imgname" src="<?=_upload_product1_l.$product[$i]['photo']?>" alt="<?=$product[$i]['ten']?>" onerror='this.src="images/no-image.svg"'>
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
<?php } else { ?>
    <style type="text/css">
        .leftmid{display: none}
        .rightmid{width:100%}
    </style>
    <div class="baosearch_check">
        
        <div style="width: 100%;float:left;margin-top:30px">
            <div class="section-heading">
                <h2>
                    Tìm kiếm theo mã <?= $_SESSION['savenamesearch'] ?>
                </h2> 
            </div>
        </div>
        <div class="clear" ></div>
        <div class="baoproductindex" style="width:100%;float:left;margin-top:20px">
            <?php for ($i = 0; $i < count($product); $i++) { 
                $d->reset();
                $sql = "select * from #_product_tab where id_photo = '".$product[$i]['id']."' and com = 'listgia' order by stt";
                $d->query($sql);
                $producttab = $d->result_array();
                ?>
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
                                    <img class="imgname" src="<?=_upload_product1_l.$product[$i]['photo']?>" alt="<?=$product[$i]['ten']?>" onerror='this.src="images/no-image.svg"'>
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
<?php } ?>