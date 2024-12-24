<?php
$d->reset();
$sql = "select ten_$lang as ten,tenkhongdau,id from #_product_list where hienthi=1 and type='quanhuyen' and com = 1 order by ten";
$d->query($sql);
$listqh = $d->result_array();
$d->reset();
$sql = "select * from #_lienhe";
$d->query($sql);
$company_contact = $d->fetch_array();
?>
<style>
    .leftcontact{float:left;width:48%}
    .rightcontact{float:right;width:50%;text-align: right}
    .rightcontact input{width:100%;height:32px;margin-bottom:10px;padding-left:5px;border:1px solid #c4c4c4;box-sizing: border-box;}
    .rightcontact textarea{width:300px;height:60px;margin-bottom:10px;padding-left:5px;border:1px solid #c4c4c4}
    
    .btn-success{background: #713131;color:#fff;padding: 10px 25px;border:none;cursor: pointer;border-radius: 5px;font-family:'chakrapetch-regular'}
    .btn-primary{background: #713131;color:#fff;border:none !important;width:100px !important;border:none;padding-left:0px !important;cursor: pointer;border-radius: 5px;font-family:'chakrapetch-regular'}
    .btn-success:hover,.btn-primary:hover{background:#97CADF !important;}
    .ghinoidung p{line-height:25px;font-size: 15px}
    .pad-contact{margin-bottom: 10px;}
    .form-control{border:1px solid #f1f1f1;}
    .googlemap iframe{width:100%;height: 300px !important;}
    .col-nd-6{width: 50%;float: left;}
    .boxtt{width:100%;float: left;height: 200px;overflow: auto;border:1px solid #ddd;border-radius: 5px;}
    .tinhthanhstyle{cursor: pointer;display: block;padding:10px;box-sizing: border-box;border-bottom: 1px solid #ccc;transition: all .3s;}
    .tinhthanhstyle:last-child{border-bottom: none}
    .tinhthanhstyle:hover{color:#FCDF00;}
    @media (max-width: 770px){
        .col-nd-6{width: 100% !important;margin-bottom: 30px;}
    }
    .leftmid{display: none;}
    .rightmid{width:100%;float:left}
</style>
<script type="text/javascript">
    function calltt(id){
        $.ajax({
            url: 'ajax/xuly.php',
            type: 'POST',
            data: {id:id,act:'gettt'},
        })
        .done(function(data) {
            if(data != ''){
                $('.boxtt').html(data);
            }
        }) 
    }

    function getmap(id){
        $.ajax({
            url: 'ajax/xuly.php',
            type: 'POST',
            data: {id:id,act:'getmap'},
        })
        .done(function(data) {
            if(data != ''){
                //alert(data);
                $('.googlemap').html(data);
            }
        })
    }
</script>
<div class="box_content" style="margin-bottom: 40px;margin-top: 40px;width: 100%;float:left">
    <div style="padding: 0px 10px">
        <div class="section-heading"><h2><?=change_lang('Liên hệ','Contact')?></h2> </div>
    </div>
    
    <div class="clear"></div>            
            <!-- <div class="col-nd-6" style="margin-top:30px">
                <div class="col-content">
                    <?php 
                        $d->reset();
                        $sql = "select DISTINCT text3_vi from #_icon where type = 'diachi' order by stt,id asc";
                        $d->query($sql);
                        $tinhthanh = $d->result_array();

                        $d->reset();
                        $sql = "select * from #_icon where type = 'diachi' order by stt,id asc";
                        $d->query($sql);
                        $tinhthanhall = $d->result_array();
                    ?>
                    <select name="text3_vi" class="form-control" onchange="calltt(this.value)">
                        <option>Chọn tỉnh thành</option>
                        <?php for ($i=0; $i < count($tinhthanh) ; $i++) { 
                            $d->reset();
                            $sql = "select * from #_province where id = ".$tinhthanh[$i]['text3_vi']." ";
                            $d->query($sql);
                            $tentt = $d->fetch_array();
                            ?>
                            <option value="<?=$tentt['id']?>"><?=$tentt['ten_vi']?></option>
                        <?php } ?>      
                    </select><br>
                    <div class="boxtt">
                        <?php for ($i=0; $i < count($tinhthanhall) ; $i++) {?>
                            <a class="tinhthanhstyle" onclick="getmap(<?=$tinhthanhall[$i]['id']?>)"><?=$tinhthanhall[$i]['ten_vi']?></a>
                        <?php } ?>
                    </div>
                </div>
            </div> -->

            <div class="col-nd-61" style="margin-top:30px;width:100%;float: left">
                <div class="col-content">
                    <div class="googlemap">
                       <?=$row_setting['map']?>
                    </div>
                </div>
            </div>

            <div class="clear"></div>
            <div class="col-nd-6" style="margin-top:30px">
                <div class="col-content">
                    <p style="font-size: 25px;color:#713131;margin-bottom: 20px;text-transform: uppercase;"><?=$row_setting['title_vi']?></p>
                    <div style="margin-bottom: 20px;line-height: 30px;">
                        <?= $company_contact['noidung_'.$lang]; ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

            
            <div class="col-nd-6" style="margin-top:30px">
            <div class="col-content">
                <form method="post" name="frm" class="forms" action="">    
                    <div class="tbl-contacts">
                        <div class="pad-contact">
                            <input type="text" class="form-control" name="ten" id="ten" placeholder="<?= change_lang('Họ tên', 'Full name') ?>" required oninvalid="this.setCustomValidity('Vui lòng nhập họ và tên')" oninput="setCustomValidity('')" style="width: 100%;box-sizing: border-box;padding-left: 0px;border:none;border-bottom: 1px solid #ccc;box-shadow: none;outline: none;">
                        </div>                        

                        <div class="pad-contact">
                            <input class="form-control" name="dienthoai" id="dienthoai" placeholder="<?= change_lang('Điện thoại', 'Phone') ?>" type="tel" required oninvalid="this.setCustomValidity('Vui lòng nhập SĐT')" oninput="setCustomValidity('')" style="width: 100%;box-sizing: border-box;padding-left: 0px;border:none;border-bottom: 1px solid #ccc;box-shadow: none;outline: none;"></div>
                        <div class="pad-contact">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required oninvalid="this.setCustomValidity('Vui lòng nhập Email')" oninput="setCustomValidity('')" style="width: 100%;box-sizing: border-box;padding-left: 0px;border:none;border-bottom: 1px solid #ccc;box-shadow: none;outline: none;"></div>

                        <div class="pad-contact">
                            <textarea style="padding: 10px;width: 100%;font-family:'chakrapetch-regular';box-sizing: border-box;height:80px;box-sizing: border-box;padding-left: 0px;border:none;border-bottom: 1px solid #ccc;box-shadow: none;outline: none;resize: none;" name="noidung" id="noidung" class="form-control"  required oninvalid="this.setCustomValidity('Vui lòng nhập nội dung')" oninput="setCustomValidity('')" placeholder="<?= change_lang('Nội dung', 'Content') ?>"></textarea>
                        </div>
                        <div class="pad-contact">
                            <input style="width: 150px;box-sizing: border-box;padding-left: 0px;border:none;border-bottom: 1px solid #ccc;box-shadow: none;outline: none;float: left;" type="text" class="form-control" name="security" id="security" placeholder="<?= change_lang('Mã bảo mật', 'Security Code') ?>" required oninvalid="this.setCustomValidity('Vui lòng nhập mã bảo mật')" oninput="setCustomValidity('')">
                            <img style="vertical-align: middle;float: left;" src="captcha_image2.php" alt="security">
                        </div>
                        <div class="clear"></div>
                        <div class="pad-contact" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-success" onclick="">
                                <?= change_lang('GỬI', 'Send') ?>
                            </button>
                            <button class="btn btn-success" onclick="document.frm.reset();" /><?= change_lang('NHẬP LẠI', 'Reset') ?></button>
                        </div>

                    </div>
                </form>
                </div>
            </div> 
            
        <!-- <div class="clear"></div>    

        <div class="col-content" style="margin-top: 30px;">
            <div class="googlemap">
               <?=$row_setting['map']?>
           </div>
        </div> -->
                                          
    </div>
</div>