<div class="box_content">
    <div class="tcat"><div class="icon"><?= $title_tcat ?></div></div>
    <div class="content container"> 
        <div class="hinhanh">  
        <?php foreach($row_detail as $v){?>
            <img src="<?= _upload_hinhanh_l . $v['photo'] ?>" alt="<?= $v['ten'] ?>" class="img-responsive" />
            <div class="name"><?= $v['ten'] ?></div>
        <?php }?>
        </div>
      
    </div>
</div>
