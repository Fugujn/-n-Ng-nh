<h3>Thêm màu</h3>

<form name="frm" method="post" action="index.php?com=product&act=save_tab&idc=<?= $_REQUEST['idc'] ?>&type=<?=$_REQUEST["type"]?>" enctype="multipart/form-data" class="nhaplieu">
    <b>Hình ảnh:</b> <input type="file" name="file" /> <?= _product_type ?><br /><br />
    <?php if ($_REQUEST['act'] == edit) {?>
        <b>Hình đã up:</b><img src="<?= _upload_product . $item['photo'] ?>" class="img-responsive" style="max-width: 100px;"  alt="NO PHOTO" /><br />
    <?php } ?>
    <b>Tên màu</b> <input type="text" name="ten" value="<?= $item['ten'] ?>" class="input" /><br /> 
	<!-- <b>Nội dung </b><br/>
	<div>
		<textarea name="noidung" cols="50" rows="5" id="noidung"><?= @$item['noidung'] ?></textarea>
	</div> -->
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?= isset($item['stt']) ? $item['stt'] : 1 ?>" style="width:30px"><br>

    <b>Hiển thị</b> <input type="checkbox" name="hienthi" <?= (!isset($item['hienthi']) || $item['hienthi'] == 1) ? 'checked="checked"' : '' ?>><br />
	<input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=product&act=man_tab&idc=<?= $_REQUEST['idc'] ?>&type=<?=$_REQUEST["type"]?>'" class="btn" />
</form>
