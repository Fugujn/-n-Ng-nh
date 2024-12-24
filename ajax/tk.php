<?php
include ("configajax.php"); 



    $key = $_POST["keyword"];

    $d->reset();
    $sql="select * from #_product where hienthi=1 and (ten_vi LIKE '%" . $key . "%' or tenkhongdau LIKE '%" . $key . "%') order by stt,ngaytao desc limit 10";
    $d->query($sql);
    $results=$d->result_array();        
    
if(!empty($results)) {
?>
<table style="width: 100%;">
<?php
foreach($results as $vn) { ?>
<tr class="tkhover">
    <td>
        <a href="<?=$vn["tenkhongdau"]?>">
            <img onerror="this.src='assets/images/no-image-fastbuy247.jpg'" src="<?=_upload_product_l.$vn["photo"]?>" style="width: 50px;height: 50px;margin-right: 10px;">    
        </a>
    </td>
    <td>
        <a style="color:#434a54;font-size: 12px;" href="<?=$vn["tenkhongdau"]?>"><?php echo $vn["ten_vi"]; ?></a>
    </td>
</tr>
<?php } ?>
</table>
<?php }else{ echo "Không tìm thấy thông tin...";}  ?>
