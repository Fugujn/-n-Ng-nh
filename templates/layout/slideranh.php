<?php 
$d->reset();
$sql_slider = "select * from #_icon where type = 'slider' and hienthi = 1 order by stt,id asc";
$d->query($sql_slider);
$result_slider = $d->result_array();
?>

<script>
    $(document).ready(function () {

        $("#owl-demo").owlCarousel({
            items: 1,
            slideSpeed : 1500,
            itemsDesktop : [1259, 1],
            itemsDesktopSmall : [999, 1],
            itemsTablet : [770, 1],
            itemsTabletSmall : false,
            itemsMobile : [600, 1],
            lazyLoad: true,
            navigation: true,
            autoPlay: 10000,
            autoHeight:false
        });
    });
</script>

<div style="width:100%;float: left;position: relative;">
    <div id="owl-demo" class="owl-carousel owl-theme">
        <?php foreach ($result_slider as $v) { ?>
            <div class="item">
                <div class="anhslider1">
                    <a href="<?=$v['url']?>">
                        <img class="img-res" src="<?= _upload_thumb_l.$v['thumb'] ?>" alt="<?= $v['ten_vi'] ?>"  />
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>