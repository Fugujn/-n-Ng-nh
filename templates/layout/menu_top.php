<?php
$d->query("select ten_vi, id,url, photo from #_icon where hienthi=1 order by stt");
$icon = $d->result_array();

$d->reset();
$sql_banner_giua = "select photo_$lang as photo from #_photo where com='banner_top' order by id desc";
$d->query($sql_banner_giua);
$row_banner_giua = $d->result_array();

$d->reset();
$sql_gt = "select * from #_about where hienthi=1 and type='gioi-thieu' order by stt,id asc";
$d->query($sql_gt);
$row_gt = $d->result_array();

$d->reset();
$sql_td = "select * from #_about where hienthi=1 and type='tuyen-dung' order by stt,id asc";
$d->query($sql_td);
$row_td = $d->result_array();

$d->reset();
$sql = "select ten_$lang as ten,tenkhongdau,id from #_product_list where hienthi=1 and com = 1 and khungdo > 0 order by stt, ngaytao desc limit 8";
$d->query($sql);
$menu_cap1 = $d->result_array();
?> 
<style type="text/css">
    .menu_slider{width: 100%;float:left;background: #fff;margin-top: 15px;}
    .left_menu{float:left;width: 21%;box-sizing: border-box;box-shadow: 0 0 2px #ccc;border-radius: 5px 5px 0px 0px}
    .right_menu{float:right;width: 77%;}

    .left_menu ul li{width:100%;float:left;list-style: none;padding:7px 15px;transition: all 0.5s;border-bottom: 1px solid #f4f4f4;box-sizing: border-box;}
    .left_menu ul li:last-child{border:none;}
    .left_menu ul li h2{font-weight: normal;}
    .left_menu ul li a{color:#676767;transition: all 0.5s;font-size: 14px}
    .left_menu ul li i{transition: all 0.5s;color:white;float:right}
    .left_menu ul li:hover{background: #f5f5f5;transition: all 0.5s}
    .left_menu ul li:hover .text_cap1{color:#1880fb;transition: all 0.5s}
    .left_menu ul li:hover .i_cap1{color:#1880fb;transition: all 0.5s}

    .menucap2{width: 250px;position: absolute;top:42px;left:21%;background: white;display: none;z-index:999;border-left:1px solid #e3e3e3;transition: all 0.2s;box-shadow: 0 0 2px #ccc;height: 350px;}
    .left_cap2{width: 250px;float:left;position: relative;}
    .left_cap2 ul li:hover .text_cap2{color:#1880fb;transition: all 0.5s}
    .left_cap2 ul li:hover .i_cap2{color:#1880fb;transition: all 0.5s}
    .right_cap2{width: 432px;float:left;}
    .right_cap2 img{width: 100%;}

    .menucap3{width: 250px;position: absolute;top:0px;left:250px;background: white;height: 350px;display: none;z-index:999;border-left:1px solid #e3e3e3;transition: all 0.2s;box-shadow: 0 0 2px #ccc;}
    .menucap3 ul li:hover .text_cap3{color:#1880fb;transition: all 0.5s}

    .left_menu ul li:hover .menucap2{display: block;transition: all 0.2s}
    .left_menu ul li ul li:hover .menucap3{display: block;transition: all 0.2s}
</style>
<div class="menu_slider">
    <div class="content_home" style="position: relative;">
        <div class="left_menu">
        	<div style="width: 100%;float: left;background:url('images/bg2.png') no-repeat;background-size: cover;padding:12px 10px;box-sizing: border-box;border-radius: 5px 5px 0px 0px">
        		<a style="display:inline-block;float: left;color:#fff;font-family:'helve_b';font-size: 15px;"><?=change_lang('Danh mục sản phẩm','Product Categories','Categorías de Producto')?></a>
        		<img src="images/menu.png" alt="icon" style="float: right;">
        	</div>
            <ul>
                <?php for($i = 0; $i < count($menu_cap1);$i++) { 
                	$d->reset();
					$sql = "select ten_$lang as ten,tenkhongdau,id from #_product_list where hienthi=1 and com = 2 and id_parent = '".$menu_cap1[$i]['id']."' order by stt, ngaytao desc";
					$d->query($sql);
					$menu_cap2 = $d->result_array();
                	?>
                    <li>
                    	<h2>
                        <a href="<?= $menu_cap1[$i]['tenkhongdau'] ?>" class="text_cap1"><?= $menu_cap1[$i]['ten'] ?></a>
                        <?php if(count($menu_cap2) > 0) { ?>
	                        <i class="fa fa-angle-right i_cap1" aria-hidden="true" style=""></i>
	                    </h2>
	                        <div class="menucap2">
	                        	<div class="left_cap2">
		                            <ul>
		                            	<?php for($k = 0; $k < count($menu_cap2);$k++) { 
		                            		$d->reset();
											$sql = "select ten_$lang as ten,tenkhongdau,id from #_product_list where hienthi=1 and com = 3 and id_parent = '".$menu_cap2[$k]['id']."' order by stt, ngaytao desc";
											$d->query($sql);
											$menu_cap3 = $d->result_array();
											?>
			                                <li style="padding:10px 15px;">
			                                	<h3 style="font-weight: normal;">
			                                	
			                                    <a href="<?= $menu_cap2[$k]['tenkhongdau'] ?>" class="text_cap2"><?= $menu_cap2[$k]['ten'] ?></a>
			                                    <i class="fa fa-angle-right i_cap2" aria-hidden="true" style=""></i></h3>
			                                    <?php if(count($menu_cap3) > 0) { ?>
							                        
							                        <div class="menucap3">
							                            <ul>
							                            	<?php for($u = 0; $u < count($menu_cap3);$u++) { ?>
								                                <li style="padding:11px 15px;">
								                                	<h4 style="font-weight: normal;">
								                                    <a href="<?= $menu_cap3[$u]['tenkhongdau'] ?>" class="text_cap3"><?= $menu_cap3[$u]['ten'] ?></a></h4>
								                                </li>
							                                <?php } ?>
							                            </ul>
							                        </div>
						                        <?php } ?>
			                                </li>
		                                <?php } ?>
		                            </ul>
		                        </div>
		                        <div class="clear"></div>
	                        </div>
                        <?php } ?>
                    </li>
                <?php } ?>
                <li><h2><a href="categories.html" style="color:#cacaca"><?=change_lang('Tất cả danh mục','View all Categories','Ver todas las categorías')?></a></h2></li>
            </ul>
        </div>
        <div class="right_menu">
            <?php include'slideranh.php' ?>
        </div>
        <div style="clear: both"></div>
    </div>
</div>

