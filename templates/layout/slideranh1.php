<?php 
$d->reset();
$sql_slider = "select * from #_icon where type = 'slider' and hienthi = 1 order by stt,id asc";
$d->query($sql_slider);
$result_slider = $d->result_array();
?>

<script type="text/javascript">
$(document).ready(function() {
    $('.owl-demotab-slider').owlCarousel({
        loop:true,
        //margin:10,
        autoplay:true,
        items: 1,
        animateOut: 'fadeOut',
        dots: false,
        autoplayTimeout:5000,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:false
            },
            600:{
                items:1,
                nav:false
            },
            1000:{
                items:1,
                nav:false,
            }
          
        }
    })
  });
</script>

<div style="width:100%;float: left;">

    <div class="owl-demotab-slider owl-carousel owl-theme">
    
        <?php foreach ($result_slider as $v) { ?>
            <div class="item" style="text-align: center;position: relative;">
                <a target="new" href="<?=$v['url']?>">
                    <img class="img-res" src="<?= _upload_thumb_l.$v['thumb'] ?>" alt="<?= $v['ten_vi'] ?>"  />
                </a>
                <?php if($v['ten_vi'] != ''){?>
                <!-- <div class="content_home" style="width:740px;position: absolute;transform: translate(-50%,-50%);top:50%;left:50%;">
                    <span class="textslider" style="display: block;color:#fff;font-family:'opensans-bold';font-size: 45px;text-transform: uppercase;"><?=$v['ten_vi']?></span>
                    <div class="clear"></div>
                    <a href="<?=$v['url']?>" class="viewdetail" >View detail</a>
                </div> -->
                <?php } ?>
            </div>
        <?php } ?>

    </div>
</div>