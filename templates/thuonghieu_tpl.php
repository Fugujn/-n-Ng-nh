<?php
$d->reset();
$sql = "select * from #_time where hienthi=1 and type = 'gioi-thieu' ";
$d->query($sql);
$gioithieu = $d->fetch_array();
?>
<style>
    .baogioithieu{width:1000px;margin:0 auto;min-height: 450px;}
    .noidunggioithieu{width:100%;float:left;margin-top:20px;font-size: 17px}
    .noidunggioithieu p{text-align: justify;line-height:25px;color:#3f3f3f;font-size: 17px}
    .noidunggioithieu img{max-width: 100%;height:auto !important;}
    .noidunggioithieu a{text-decoration: none;color:#3f3f3f;}

    .leftmid2{display: none}
    .rightmid2{width: 100%;float:left;}
</style>
<div class="baogioithieu">
    <div class="titleindex">
        <p><a>THƯƠNG HIỆU</a></p>
        <img src="assets/images/line_title.png" style="margin:0 auto;margin-top:5px">
    </div>
    <div style="clear:both"></div>
    <div class="noidunggioithieu">
        <p><?= $gioithieu['noidung_'.$lang] ?></p>
    </div>
</div>