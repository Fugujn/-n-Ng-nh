<?php
$d->reset();
$sql_doitac1 = "select * from #_icon where type='doitac' and hienthi = 1 order by stt,id asc";
$d->query($sql_doitac1);
$result_doitac = $d->result_array();

?>
<style type="text/css">
/* .imggrey{
  -webkit-filter: grayscale(100%); Safari 6.0 - 9.0
  filter: grayscale(100%);
  transition: all .3s;
}
.imggrey:hover{
  -webkit-filter: grayscale(0%); Safari 6.0 - 9.0
  filter: grayscale(0%);
} */
</style>
<script type="text/javascript">
 $(document).ready(function() {
 
  $('.owl-demotab-doitac').owlCarousel({
        loop:true,
        //margin:10,
        autoplay:true,
        items: 5,
        //animateOut: 'fadeOut',
        dots: false,
        autoplayTimeout:5000,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:false
            },
            450:{
                items:2,
                nav:false
            },
            770:{
                items:3,
                nav:false
            },
            1000:{
                items:5,
                nav:false,
            }
          
        }
    })
});
</script>
<div class="logodoitac1" style="width: 100%;float: left;position: relative;background: #fff;margin-top: 50px;">
  <div class="content_home" style="padding: 20px 0px;box-sizing: border-box;border-top :1px solid #f3f3f3;">
    <!-- <div style="text-align: center;color:#5e5e5e;font-family:kanit_b;font-size: 30px;text-transform: uppercase;width: 100%;float: left;">
            <?=change_lang('Đối tác & khách hàng','Partner & Customer')?>
            <div class="clear"></div>
            <span style="display:block;text-align: center;width: 100%;float: left;">
            <img src="images/line.png" alt="icon" style="max-width: 100%;height:auto;">
            </span>
          </div> -->
    <div class="owl-demotab-doitac owl-carousel owl-theme">
      
      <?php foreach ($result_doitac as $v) { ?>
        <div class="item" style="text-align: center;">
          <div style="padding: 0px 15px;">
            <a target="new" href="<?=$v['url']?>">
              <img style="max-width: 100%;" src="<?= _upload_thumb_l.$v['thumb'] ?>" alt="<?= $v['ten_vi'] ?>"  />
            </a>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</div>