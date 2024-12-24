<div class="col-md-4 col-sm-4 col-xs-4">
    <div class="title_s">
        <span>Giờ mở cửa</span>
    </div>
    <div class="noidung">
        <?php
        $d->query("select noidung_$lang as noidung from #_time");
        $rs_vct = $d->fetch_array();
        echo $rs_vct['noidung'];
        ?>
    </div>
</div>
<div class="col-md-4 col-sm-4 col-xs-4">
    <div class="title_s">
        <span>Bảo hành</span>
    </div>
    <div class="noidung">
        <?php
        $d->query("select noidung_$lang as noidung from #_tambao");
        $rs_vct = $d->fetch_array();
        echo $rs_vct['noidung'];
        ?>
    </div>
</div>
<div class="col-md-4 col-sm-4 col-xs-4">
    <div class="title_s">
        <span>Đại lý buôn bán</span>
    </div>
    <div class="noidung">
        <?php
        $d->query("select ten_vi as ten, dienthoai from #_daily where hienthi=1 order by stt");
        $rs_sp = $d->result_array();
        foreach ($rs_sp as $v) {
            ?>
            <div class="item"><?= $v['ten'] ?> <?= $v['dienthoai'] ?></div>
        <?php } ?>
    </div>
</div>
<div class="clear"></div>