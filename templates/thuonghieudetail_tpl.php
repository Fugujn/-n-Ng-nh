<?php
$d->reset();
$sql = "select * from #_icon where com = 'thuong-hieu' ";
$d->query($sql);
$thuonghieu = $d->result_array();
?>
<?php if($_SESSION['thuonghieu'] != '') { ?>
    <style>
        .baogioithieu{width:100%;float:left;min-height: 450px;}
        .leftmid2{display: none}
        .rightmid2{width: 100%;float:left;}

        .khungthuonghieu{width: 100%;float:left;margin-top: 40px}
        .thuonghieucon{width: 21%;float:left;margin-right: 2%;margin-bottom: 20px;text-align: center;transition: all 0.5s;padding:1%;cursor: pointer;}
        .thuonghieucon:hover{box-shadow: 0px 0px 1px 0px #cccccc;transition: all 0.5s}
        .thuonghieucon:nth-child(4n){margin-right: 0%}
        .thuonghieucon img{width: 100%;}
        .thuonghieucon p{line-height: 40px;font-size: 17px;text-transform: uppercase;margin-top:20px;}
    </style>
    <div class="baogioithieu">
        <div class="titleindex">
            <p><a>THƯƠNG HIỆU</a></p>
            <img src="assets/images/line_title.png" style="margin:0 auto;margin-top:5px">
        </div>
        <div style="clear:both"></div>
        <div class="khungthuonghieu">
            <?php for($i = 0; $i < count($thuonghieu);$i++) { ?>
                <div class="thuonghieucon" onclick="showthuonghieu(<?= $thuonghieu[$i]['id'] ?>)">
                    <img src="upload/thumb/<?= $thuonghieu[$i]['thumb'] ?>">
                    <p><?= $thuonghieu[$i]['ten_vi'] ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>