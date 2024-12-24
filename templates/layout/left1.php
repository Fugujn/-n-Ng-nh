<link rel="stylesheet" href="assets/js/cssmenu/styles1.css">
<!-- <script src="assets/js/cssmenu/script.js"></script> -->
<?php
$d->reset();
$sql="select * from #_yahoo where hienthi=1 order by stt limit 0,6";
$d->query($sql);
$hotrott=$d->result_array();

$d->reset();
$sql="select ten_$lang as ten, tenkhongdau, id, photo, mota_$lang as mota,dai,rong,cao,chanmay from #_product where type='san-pham' and spbc>0 and hienthi=1 order by stt";
$d->query($sql);
$rs_news=$d->result_array();

$d->query("select * from #_link where com='edugames' and hienthi=1 order by id");
$web=$d->result_array();


$d->reset();
$sql_dmsp = "select ten_$lang as ten,tenkhongdau,id from #_product_list where hienthi =1 and com='1' order by stt,id desc";
$d->query($sql_dmsp);
$result_dmsp = $d->result_array();

$d->reset();
$sql_set = "select * from #_setting ";
$d->query($sql_set);
$result_set = $d->fetch_array();
?>

<style type="text/css">

    .menu-left li {height:43px;line-height:43px;padding-left:35px;}
    .menu-left li a{color:#fff;font-size:17px;text-transform:uppercase;}
    .menu-left-con > li{height:40px;line-height:40px;background: #0e3173;border-bottom:1px solid #fff;}
    .menu-left-con > li > a{font-size:16px;text-transform:uppercase;}
    .menu-left-con > li > a:hover{color:#fff000 !important;}
</style>
<div class="module_left" style="font-family: uvnhongha;">
	

    <div style="width: 100%;background: url('assets/images/xetai/menu_g.png') no-repeat;height: 46px;line-height: 46px; padding-left: 60px;">        
    <span style="font-size: 17px;font-weight: bold;text-transform: uppercase;color:#fff;">Danh mục sản phẩm</span>
    </div>
    <div class="clear"></div>
    <div class="content" >
    <ul class="menu-left">
        <?php for ($i = 0, $count_dmsp = count($result_dmsp); $i < $count_dmsp; $i++) { 
            $sql = "select ten_$lang as ten,tenkhongdau,id from #_product_list where  com='2' and hienthi =1 and id_parent='" . $result_dmsp[$i]['id'] . "' order by stt,id asc";
                        $d->query($sql);
                        $result = $d->result_array();

                        $count = count($result);
                        
            ?>   
           <li style="background: url('assets/images/xetai/aa3.png') no-repeat;"><a href="san-pham/<?= $result_dmsp[$i]['tenkhongdau'] ?>-<?= $result_dmsp[$i]['id'] ?>/" title="<?= htmlentities($result_dmsp[$i]['ten'], ENT_QUOTES, "UTF-8") ?>"><?= $result_dmsp[$i]['ten'] ?></a>
           </li>
            <?php if ($count > 0) { ?>
              <ul class="menu-left-con">
              <?php for ($j = 0; $j < $count; $j++) { ?>
                 <li><a href="san-pham/c2-<?= $result[$j]['tenkhongdau'] ?>-<?= $result[$j]['id'] ?>/"><i class="fa fa-plus-circle" aria-hidden="true"></i> <?= $result[$j]['ten'] ?></a></li>
              <?php } ?>   
              </ul> 
            <?php } ?>  
        <?php } ?>   
        </ul> 
    <!-- <div id='cssmenu1'>
        <ul>
        <?php for ($i = 0, $count_dmsp = count($result_dmsp); $i < $count_dmsp; $i++) { 
            $sql = "select ten_$lang as ten,tenkhongdau,id from #_product_list where  com='2' and hienthi =1 and id_parent='" . $result_dmsp[$i]['id'] . "' order by stt,id asc";
                        $d->query($sql);
                        $result = $d->result_array();

                        $count = count($result);
                        
            ?>   
           <li <?php if ($count > 0) { ?> class='has-sub' <?php } ?>><a href="san-pham/<?= $result_dmsp[$i]['tenkhongdau'] ?>-<?= $result_dmsp[$i]['id'] ?>/" title="<?= htmlentities($result_dmsp[$i]['ten'], ENT_QUOTES, "UTF-8") ?>">> <?= $result_dmsp[$i]['ten'] ?></a>
            <?php if ($count > 0) { ?>
              <ul>
              <?php for ($j = 0; $j < $count; $j++) { 
                $sql = "select ten_$lang as ten,tenkhongdau,id from #_product_list where  com='3' and hienthi =1 and id_parent='" . $result[$j]['id'] . "' order by stt,id asc";
                $d->query($sql);
                $result_c3 = $d->result_array();
                ?>
                 <li  <?php  if (count($result_c3) > 0) {?> class='has-sub' <?php } ?>><a href="san-pham/c2-<?= $result[$j]['tenkhongdau'] ?>-<?= $result[$j]['id'] ?>/">>> <?= $result[$j]['ten'] ?></a>
                <?php  if (count($result_c3) > 0) {?>    
                    <ul>
                    <?php for ($k = 0; $k < count($result_c3); $k++) {  ?>
                       <li><a href="san-pham/c3-<?= $result_c3[$k]['tenkhongdau'] ?>-<?= $result_c3[$k]['id'] ?>/" title="<?= htmlentities($result_c3[$k]['ten'], ENT_QUOTES, "UTF-8") ?>">>>> <?= $result_c3[$k]['ten'] ?></a></li>
                    <?php } ?>   
                    </ul>
                <?php } ?>    
                 </li>
              <?php } ?>   
              </ul>
            <?php } ?>  
           </li>
        <?php } ?>   
        </ul>
        </div> -->
                              
</div>
<script type="text/javascript">
   /* function timkiem(){
        document.frm_tk.submit();
    }*/
</script>
<!-- <div class="module_left" style="margin-top: 20px;">
    
    <div style="width: 100%;background: url('assets/images/bcom/x_line.png') bottom repeat-x;position: relative;height: 37px;">        
            <div style="float: left;border-top:2px solid #000;background: #fff200;position: relative;height: 36px;line-height: 36px;">
              <span style="font-size: 18px;font-weight: bold;text-transform: uppercase;padding: 10px;"><?=change_lang('Tìm kiếm','Search')?></span>
            </div>
            <img src="assets/images/bcom/cat_danhmuc.png"  style="float: left;height: 36px;">
        </div>
        <div class="clear"></div>
    <div class="content" > 
        <div class="box_search">
        <form name="frm_tk" action="tim-kiem.html" method="post" enctype="multipart/form-data">
            <input name="txtkey" class="txt_key" type="text"  border="0" placeholder="Tìm kiếm ..." />
             
             <a style="cursor: pointer;" onclick="timkiem()"><i class="fa fa-search" aria-hidden="true"></i></a>
        </form>
           
    </div>
    </div>
</div> -->   

<div class="module_left" style="margin-top: 20px;">
    
    <div style="width: 100%;background: url('assets/images/xetai/aa2.png') no-repeat;height: 39px;line-height: 39px; padding-left: 60px;">        
    <span style="font-size: 17px;font-weight: bold;text-transform: uppercase;color:#fff;">Hỗ trợ trực tuyến</span>
    </div>
        <div class="clear"></div>
    <div class="content" style="overflow: hidden;text-align: center;padding: 0px 0px 10px 0px">
        <img src="assets/images/xetai/hotline-10.png">
        <div style="width: 100%;padding:5px;margin-top: 10px;">
        <img src="assets/images/xetai/phone.png"  style="margin:0px 10px;float: left;">    
        <span style="float: left;color:#ff0000;font-size: 24px;font-weight: bold;font-family: Arial;"><?=$result_set['hotline']?></span>
        </div>
        <div style="width: 100%;padding:5px;margin-top: 10px;">
        <img src="assets/images/xetai/mail.png"  style="margin:0px 10px;float: left;">    
        <span style="float: left;color:#ff0000;font-size: 13px;font-weight: bold;font-family: Arial;"><?=$result_set['email']?></span>
        </div>
    </div>
</div>     

<!-- <div class="module_left" >
   
    <div style="width: 100%;background: url('assets/images/bcom/x_line.png') bottom repeat-x;position: relative;height: 37px;">        
            <div style="float: left;border-top:2px solid #000;background: #fff200;position: relative;height: 36px;line-height: 36px;">
              <span style="font-size: 18px;font-weight: bold;text-transform: uppercase;padding: 10px;"><?=change_lang('Đăng ký nhận tin','Register')?></span>
            </div>
            <img src="assets/images/bcom/cat_danhmuc.png"  style="float: left;height: 36px;">
        </div>
        <div class="clear"></div>
    <div class="content" > 
        <form action="" method="post" id="nhanemail" name="nhanemail">
            <input type="text" name="email" id="email" placeholder="Email" style="border:none;width: 90%;padding:10px;" /> 
            
            <a onclick="checkemail()"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
        </form>
    </div>
</div> --> 

<!-- <div class="module_left" >
  
    <div style="width: 100%;background: url('assets/images/bcom/x_line.png') bottom repeat-x;position: relative;height: 37px;">        
            <div style="float: left;border-top:2px solid #000;background: #fff200;position: relative;height: 36px;line-height: 36px;">
              <span style="font-size: 18px;font-weight: bold;text-transform: uppercase;padding: 10px;"><?=change_lang('Video Clip','Video')?></span>
            </div>
            <img src="assets/images/bcom/cat_danhmuc.png"  style="float: left;height: 36px;">
        </div>
        <div class="clear"></div>
    <div class="content" >
        <?php $link=explode('v=',$result_set['video']);?>
         <iframe width="100%" height="300px" src="//www.youtube.com/embed/<?=$link[1]?>" frameborder="0" allowfullscreen></iframe> 
    </div>
</div> -->


<!--<div class="module_left">
    <div class="title"><h2><?=_hotrotructuyen?></h2></div>
    <div class="content"> 
	
		<div id="httt">
			<ul id="hotro">
				<?php for($i=0,$countls=count($hotrott); $i <$countls; $i++){ ?>
				<li>
					<a class="yahoo" target="blank" href="ymsgr:sendIM?<?=$hotrott[$i]["yahoo"]?>"></a>
					<a class="skype" target="blank" href="Skype:<?=$hotrott[$i]["skype"]?>?chat"></a>
					<p><?=$hotrott[$i]["ten_vi"]?></p>
					<span><?=$hotrott[$i]["dienthoai"]?></span>
					<span class="email"><?=$hotrott[$i]["email"]?></span>
				</li>
				<?php }?>
			</ul>
		</div>
    </div>            	                                   
</div>-->
<div class="module_left" style="margin-top: 20px;">
    
    <div style="width: 100%;background: url('assets/images/xetai/aa1.png') no-repeat;height: 39px;line-height: 39px; padding-left: 60px;">        
    <span style="font-size: 17px;font-weight: bold;text-transform: uppercase;color:#fff;">Sản phẩm xe mới</span>
    </div>
        <div class="clear"></div>
    <div class="content list_news_index" style="border: 1px solid #ccc;"> 
		<?php if(!empty($rs_news)){?>
		<ul class="bxSlider list_news_index1">
			<?php foreach($rs_news as $v){?>
			<li class="box_news">
				<div class="images">
					<a href="san-pham/<?=$v["tenkhongdau"]?>-<?=$v["id"]?>.html">
						<img src="timthumb.php?src=<?=_upload_product_l.$v["photo"]?>&w=245&h=170&zc=1" alt="<?=$v["ten"]?>"  />
					</a>
				</div>
                <div class="clear"></div>
				<div class="name">
					<a href="san-pham/<?=$v["tenkhongdau"]?>-<?=$v["id"]?>.html">
						<?=$v["ten"]?>
					</a>
                   <!--  <div class="kichthuoc">Kích thước dài x rộng x cao:<?=$v["dai"]?> x <?=$v["rong"]?> x <?=$v["cao"]?></div>
                    <div class="kichthuoc">Chân máy:<?=$v["chanmay"]?></div> -->
					
				</div>
				<div class="clear"></div>
			</li>
			<?php }?>
		</ul>
		<?php }?>
    </div>            	                                   
</div>

<!-- <div class="module_left" >
    <div style="width: 100%;background: url('assets/images/bcom/x_line.png') bottom repeat-x;position: relative;height: 37px;">        
            <div style="float: left;border-top:2px solid #000;background: #fff200;position: relative;height: 36px;line-height: 36px;">
              <span style="font-size: 18px;font-weight: bold;text-transform: uppercase;padding: 10px;"><?=change_lang('Tổng truy cập','Online')?></span>
            </div>
            <img src="assets/images/bcom/cat_danhmuc.png"  style="float: left;height: 36px;">
        </div>
        <div class="clear"></div>
    <div class="content" >
        <div style="padding: 20px;" >
            <div class="ol" style="color:#000;font-size: 17px;font-weight: bold"><?=_dangonline?> <span> : &nbsp; &nbsp;<?= $count_user_online ?></span></div>
             <div class="tuan"><?=_homnay?> <span> : &nbsp;&nbsp;<?= $today_visitors ?></span></div>
            <div class="thang"><?=_trongthang?> <span> : &nbsp;&nbsp;<?= $month_visitors ?></span></div>
            <div class="tong" style="color:#000;font-size: 17px;font-weight: bold;margin-top: 15px;"><?=_tongtruycap?> <span> : &nbsp;&nbsp;<?= $all_visitors ?></span></div> 
        </div>            
    </div>
</div> -->

<script type="text/javascript">
    $(document).ready(function (e) {
        $('.list_news_index1').bxSlider({
            mode: 'vertical',
            slideMargin: 4,
            minSlides: 2,
            maxSlides: 2,
            moveSlides: 1,
            auto: true,
            autoStart: true,
            controls: false,
            pager:false
        });

    });

</script>
<!-- ************** code đăng kí nhận tin ************** -->
<script language="javascript">
    function validEmail(obj) {

     /*   emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;
    return emailRegExp.test(obj);*/
        /*var s = obj.value;
        for (var i = 0; i < s.length; i++)
            if (s.charAt(i) == " ") {
                return false;
            }
        var elem, elem1;
        elem = s.split("@");
        if (elem.length != 2)
            return false;

        if (elem[0].length == 0 || elem[1].length == 0)
            return false;

        if (elem[1].indexOf(".") == -1)
            return false;

        elem1 = elem[1].split(".");
        for (var i = 0; i < elem1.length; i++)
            if (elem1[i].length == 0)
                return false;
        return true;*/
    }//Kiem tra dang email


   /* function checkemail() {
        var frm = document.nhanemail;
        var email = document.getElementById("email").value;
        if (frm.email.value == '')
        {
            alert("Bạn chưa điền email.");
            frm.email.value = "";
            frm.email.focus();
            return false;
        }

        if (!validEmail(frm.email)) {
            alert('Vui lòng nhập đúng địa chỉ email');
            frm.email.value = "";
            frm.email.focus();
            return false;
        }
        document.nhanemail.command.value = 'dk';
        frm.submit();
    }

*/
</script>
<?php
/*if ($_POST['email']) {
    $d->query("select email from #_dknhantin where email='" . $_POST['email'] . "'");
    $email = $d->result_array();
    if (count($email) > 0) {
        alert("Email này đã được đăng kí. Bạn vui lòng chọn email khác");
    } else {
        $email1 = $_POST['email'];
        $ngaydangky = time();

        $sql = "INSERT INTO  table_dknhantin(email,ngaytao ) 
                  VALUES ('$email1','$ngaydangky')";

        mysql_query($sql) or die(mysql_error());
        alert("Đăng kí nhận thông báo thành công!");
    }
}*/
?>