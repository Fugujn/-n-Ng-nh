<?php
$d->reset();
$sql = "select * from #_news where hienthi = 1";
$d->query($sql);
$gallery = $d->result_array();
?>
<div class="magazine">
    <?php for($i = 0; $i < count($gallery);$i++) { ?>
        <img src="upload/news/<?= $gallery[$i]['photo'] ?>" style="width: 100%;float:left;margin-top: 10px">
    <?php } ?>
</div>
            