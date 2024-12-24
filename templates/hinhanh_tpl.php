<div class="box_content">
<div class="tcat"><div class="icon"><?= $title_tcat ?></div></div>

    <div class="content">           
     
            <?php foreach ($result_image as $v) { ?>
           
          
				<a href="dich-vu/<?=$v["tenkhongdau"]?>-<?=$v["id"]?>/">

					<div class="ablum"><a href="su-kien-to-chuc/<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>.html"><img src="<?= _upload_hinhanh_l . $v['photo'] ?>" alt="<?= $v['ten'] ?>"></a>
                  
				
            <div class="name" style="text-align:center"><a href="su-kien-to-chuc/<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>.html"><?=$v['ten']?></a></div>
                </div>
               
           		
			
               
            <?php } ?>
    </div> 
   
</div>
