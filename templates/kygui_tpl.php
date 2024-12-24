<?php
$d->reset();
$sql = "select * from #_time where hienthi=1 and type = 'gioi-thieu' ";
$d->query($sql);
$gioithieu = $d->fetch_array();

$d->reset();
$sql = "select * from #_time where hienthi=1 and type = 'ky-gui' ";
$d->query($sql);
$kygui = $d->fetch_array();
?>
<style>
    .baogioithieu{width:82%;margin:0 auto;margin-top:20px;background: white;padding:2%;}
    .noidunggioithieu{width:100%;float:left;margin-top:20px;font-family: Arial}
    .noidunggioithieu p{text-align: justify;line-height:20px;color:#3f3f3f;font-family: Arial}
    .noidunggioithieu img{max-width: 100%;height:auto !important;margin: 10px 0px;font-family: Arial}
    .noidunggioithieu a{text-decoration: none;color:#3f3f3f;font-family: Arial}
    .title_kygui{width: 100%;float:left;border-bottom: 1px solid silver;padding-bottom: 20px}
    .title_kygui p{line-height: 25px}
    .title_kygui a{font-size: 20px;color: #434a54;font-weight: bold;}

    .formlienhe{width: 150px;background: #ffd800;text-align: center;border-radius: 10px;margin:20px auto;}
    .formlienhe p{line-height: 45px;}
    .formlienhe a{color:#3f3f3f;font-size: 15px}

    .formkygui{float:left;width:100%;margin-top: 20px;border-top:1px solid silver;padding-top:10px;text-align: center}
    .formkygui input{width:100%;height:32px;margin-bottom:10px;padding-left:5px;border:1px solid #c4c4c4;float:left;}
    .formkygui textarea{width:100%;height:100px;margin-bottom:10px;padding-left:5px;border:1px solid #c4c4c4}

    .btn-success{background: #f64d03;color:white;padding: 10px 55px;border:none}
    .btn-primary{background: #f64d03;color:white;border:none !important;width:100px !important;border:none;padding-left:0px !important}

    .ghinoidung p{line-height:25px;font-size: 13px}
    .pad-contact{margin-bottom: 10px;width: 31%;float:left;margin-right:2%;}
</style>
<div class="baogioithieu">
    <div class="title_kygui">
        <p><a>Ký gửi</a></p>
    </div>
    <div style="clear:both"></div>
    <div class="noidunggioithieu">
        <p><?= $kygui['noidung_vi'] ?></p>
    </div>
    <div style="clear:both"></div>
    <div class="formkygui">
        <p style="font-size: 18px;margin-bottom: 20px;text-transform: uppercase;font-weight: bold;color: #f64d03;">Liên hệ ký gửi</p>
        <form method="post" name="frm" class="forms" action="lien-he">    
            <div class="tbl-contacts">
                <div class="pad-contact">
                    <input type="text" class="form-control" name="ten" id="ten" placeholder="<?= change_lang('Họ và tên', 'Full name') ?>" required oninvalid="this.setCustomValidity('Vui lòng nhập họ và tên')" oninput="setCustomValidity('')">
                    <input type="hidden" name="tieude" id="tieude" value="lien-he"/>
                </div>                        
                <div class="pad-contact">
                    <input class="form-control" name="dienthoai" id="dienthoai" placeholder="<?= change_lang('Điện thoại', 'Phone') ?>" type="tel" required oninvalid="this.setCustomValidity('Vui lòng nhập SĐT')" oninput="setCustomValidity('')"></div>
                <div class="pad-contact">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required oninvalid="this.setCustomValidity('Vui lòng nhập Email')" oninput="setCustomValidity('')"></div>
                <div style="clear:both"></div>
                <div class="pad-contact" style="width: 96.8%;float:left">
                    <textarea name="noidung" id="noidung" class="form-control" rows="3" required oninvalid="this.setCustomValidity('Vui lòng nhập nội dung')" oninput="setCustomValidity('')" placeholder="<?= change_lang('Nội dung', 'Content') ?>"></textarea>
                </div>
                <div style="clear:both"></div>
                <div class="pad-contact" style="width: 100%;float:left;text-align: center">
                    <button type="submit" class="btn btn-success" onclick="" style="cursor: pointer;">
                        <?= change_lang('Gửi', 'Send') ?>
                    </button>
                </div>

            </div>
        </form>
    </div>
    <div style="clear:both"></div>
</div>