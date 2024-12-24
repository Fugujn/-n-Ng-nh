<style>
    #top{color:#FFF;font-weight:500;text-align:center;width:42px;position:fixed;bottom:20px;right:20px; z-index:999; display:none;cursor:pointer;}
    #top:hover{}
    .backphone{position: fixed;bottom: 20px;left:20px;}
</style>
<style>
    #top{color:#FFF;font-weight:500;text-align:center;width:42px;position:fixed;bottom:20px;right:25px; z-index:999; display:none;cursor:pointer;}
    #top:hover{}
    .backphone{position: fixed;bottom: 20px;left:20px;}
    .iconmobile{display: none;}
    .callnowone_num{padding: 10px 20px 10px 55px;background: var(--theme);color: #fff;position: fixed;left: 42px;bottom: 41px;border-radius: 20px;z-index: 999;}
    .zalochat{position: fixed;bottom: 90px;right:25px;display:block;width: 45px;z-index: 999}
    .zalochat img {width: 45px;}
    .zalochat .tooltip {visibility: hidden;width: auto;background-color: #fff;color: var(--theme);text-align: center;border-radius: 5px;padding: 5px 15px;position: absolute;    z-index: 1;bottom: 25%;left: -25%;transform: translateX(-100%);opacity: 0;transition: opacity 0.3s; box-shadow: 2px 2px 7px #d5d5d5;}
    .zalochat .tooltip::after {content: "";position: absolute;top: 50%;right: -10px;margin-top: -5px;border-width: 5px;border-style: solid;border-color: transparent transparent transparent #fff;}
    .zalochat:hover .tooltip {visibility: visible;opacity: 1;}

    .facemes{position: fixed;bottom: 32px;right:25px;display:block;width: 45px;border-radius: 50%;z-index: 999;}
    .facemes img {width: 45px;}
    .facemes .tooltip {visibility: hidden;width: auto;background-color: #fff;color: var(--theme);text-align: center;border-radius: 5px;padding: 5px 15px;position: absolute;    z-index: 1;bottom: 25%;left: -25%;transform: translateX(-100%);opacity: 0;transition: opacity 0.3s; box-shadow: 2px 2px 7px #d5d5d5;}
    .facemes .tooltip::after {content: "";position: absolute;top: 50%;right: -10px;margin-top: -5px;border-width: 5px;border-style: solid;border-color: transparent transparent transparent #fff;}
    .facemes:hover .tooltip {visibility: visible;opacity: 1;}

    .whatsapp {position: fixed;bottom: 148px;right:25px;display:block;width: 45px;z-index: 999;border-radius: 50%;}
    .whatsapp img {width: 45px;}
    .whatsapp .tooltip {visibility: hidden;width: auto;background-color: #fff;color: var(--theme);text-align: center;border-radius: 5px;padding: 5px 15px;position: absolute;    z-index: 1;bottom: 25%;left: -25%;transform: translateX(-100%);opacity: 0;transition: opacity 0.3s; box-shadow: 2px 2px 7px #d5d5d5;}
    .whatsapp .tooltip::after {content: "";position: absolute;top: 50%;right: -10px;margin-top: -5px;border-width: 5px;border-style: solid;border-color: transparent transparent transparent #fff;}
    .whatsapp:hover .tooltip {visibility: visible;opacity: 1;}
    
    .viber {position: fixed;bottom: 205px;right:25px;display:block;width: 45px;z-index: 999;border-radius: 50%;}
    .viber img {width: 45px;}
    .viber .tooltip {visibility: hidden;width: auto;background-color: #fff;color: var(--theme);text-align: center;border-radius: 5px;padding: 5px 15px;position: absolute;    z-index: 1;bottom: 25%;left: -25%;transform: translateX(-100%);opacity: 0;transition: opacity 0.3s; box-shadow: 2px 2px 7px #d5d5d5;}
    .viber .tooltip::after {content: "";position: absolute;top: 50%;right: -10px;margin-top: -5px;border-width: 5px;border-style: solid;border-color: transparent transparent transparent #fff;}
    .viber:hover .tooltip {visibility: visible;opacity: 1;}

    @media(max-width:850px){
        .iconmobile{text-align: center;width: 100%;background: var(--theme);color: #fff;padding: 10px 0px;display: grid;grid-template-columns: 1fr 1fr 1fr 1fr 1fr; align-items: center;justify-content: center;position: fixed;bottom: 0px; opacity: .9; z-index: 999;}
        .iconmobile i{font-size: 1.5rem}
        .iconmobile a{color: #fff; font-size: .8rem}
        .cover_icon{display: flex;flex-direction: column;row-gap: 8px;}
/*        .callnowone, .callnowone_num, .facemes, .zalochat, .whatsapp, .viber {display:none;}*/
    }
}
</style>
<script type="text/javascript">
    // $(document).ready(function () {

    //     $('body').append('<img id="top" src="assets/images/clicktop1.png" />');
    //     $(window).scroll(function () {
    //         if ($(window).scrollTop() > 100) {
    //             $('#top').fadeIn();
    //         } else {
    //             $('#top').fadeOut();
    //         }
    //     });
    //     $('#top').click(function () {
    //         $('html, body').animate({scrollTop: 0}, 300);
    //     });

    // });
</script>
<!-- <a class="hovimgface" target="_blank" href="https://www.messenger.com/t/<?= $row_setting['facebook'] ?>" style="display: inline-block;position: fixed;right: 20px; bottom: 75px;"><img src="images/mes.png" alt="icon" style="transition: all .3s;"></a>

<a class="hovimgface" href="https://zalo.me/<?= $row_setting['hotline'] ?>" style="display: inline-block;position: fixed;right: 20px; bottom: 130px;"><img src="images/zalo.png" alt="icon" style="transition: all .3s;"></a> -->

<link href="assets/css/callnow.css" type="text/css" rel="stylesheet" media="screen" />
<link href="assets/css/animate2.css" type="text/css" rel="stylesheet" media="screen" />
<a href="tel:<?= $row_setting['hotline'] ?>" mypage="" rel="nofollow">
    <div class="callnowone">
        <div class="animated infinite zoomIn callnow-circle"></div>
        <div class="animated infinite pulse callnow-circle-fill"></div>
        <div class="animated infinite tada callnow-img-circle"></div>
    </div>
</a>
<a class="zalochat" href="https://zalo.me/<?= str_replace(' ','',$row_setting['hotline']) ?>" target="_blank">
    <img src="images/icon-zalo.png" alt="icon">
    <span class="tooltip">Zalo</span>
</a>

<!-- <a class="whatsapp" href="https://api.whatsapp.com/send?phone=<?= str_replace(' ','',substr_replace($row_setting['hotline'], '840', 0, 1)) ?>" target="_blank">
    <img src="images/whatsapp.png" alt="icon" >
    <span class="tooltip">Whatsapp</span>
</a>

<a class="viber" href="viber://chat?number=%2B<?= str_replace(' ','',substr_replace($row_setting['hotline'], '84', 0, 1)) ?>" target="_blank">
    <img src="images/viber.png" alt="icon" >
    <span class="tooltip">Viber</span>
</a> -->

<a class="facemes" href="https://www.messenger.com/t/<?= $row_setting['facebook'] ?>" target="_blank">
    <img src="images/facemes.png" alt="icon">
    <span class="tooltip">Messenger</span>
</a>
