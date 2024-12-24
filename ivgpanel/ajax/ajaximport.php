<?php
session_start();
@define('_source', '../sources/');
@define('_lib', '../lib/');


$lang = $_SESSION['lang']; //Lấy ngỗn ngữ
include_once _lib . "config.php";
include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "functions_giohang.php";
include_once _lib . "class.database.php";
include_once _lib . "paging_ajax.php";
$d = new database($config['database']);

$lang = $_SESSION['ad_language'];
if($lang != ''){
    include _source ."adminlang_".$lang.".php";
    
}else{
    include _source ."adminlang_vi.php";
    
}

$bien = $_POST['duan'];
$d->reset();
$sql = 'select * from table_dknhantin where type = 2 order by stt';
$d->query($sql);
$items = $d->result_array();
$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
$url = "index.php?com=dkkhachhang&act=man_cat";
$maxR = 10;
$maxP = 4;
$paging = paging($items, $url, $curPage, $maxR, $maxP);
$items = $paging['source'];
?>
<div class="table-responsive">
        <table class="table table-bordered blue_table">
            <tr>
                <!-- <th style="width:10%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th> -->
                <th style="width:10%;"><?= _stt ?></th>
                <th style="width:20%;"><?= _ten ?></th>
                <th style="width:20%;"><?= _dienthoai ?></th>
                <th style="width:20%;">Email  </th>
                <th style="width:20%;"><?= _diachi ?></th>
                <!--<th style="width:10%;">Đã xem</th>-->
                <th style="width:8%;"><?= _chitiet ?></th>
                <th style="width:8%;"><?= _xoa ?></th>
            </tr>
            <?php for ($i = 0, $count = count($items); $i < $count; $i++) { 
                if($items[$i]['ten_en'] == ' '){
                    $d->reset();
                    $sql = "delete from #_dknhantin where id='" . $items[$i]['id'] . "' and type = 2";
                    $d->query($sql);
                }
                if($items[$i]['ten_en'] != ' '){
                ?>
                <tr>
                    <!-- <td style="width:10%;" align="center"><input type="checkbox" name="chon[]" class="chon" value="<?= $items[$i]['id'] ?>" /></td> -->
                    <td style="width:10%;"><?= $i + 1 ?></td>
                    <td style="width:20%;">
                        <a href="index.php?com=dkkhachhang&act=edit_cat&id=<?= $items[$i]['id'] ?>&curPage=<?= $_REQUEST['curPage'] ?>" style="text-decoration:none;">
                            <?= $items[$i]['ten_en'] ?> 
                        </a>
                    </td>
                    <td style="width:20%;">
                        <a style="text-decoration:none;"><?= $items[$i]['dienthoai'] ?> </a>
                    </td>
                    <td style="width:20%;">
                        <a style="text-decoration:none;"><?= $items[$i]['email'] ?> </a>
                    </td>
                    <td style="width:20%;">
                        <a style="text-decoration:none;"><?= $items[$i]['diachi'] ?> </a>
                    </td>
                    
                    <td style="width:8%;">
                        <a href="index.php?com=dkkhachhang&act=edit_cat&id=<?= $items[$i]['id'] ?>">
                            <img src="media/images/edit.png" border="0" />
                        </a>
                    </td>
                    <td style="width:8%;"><a href="index.php?com=dkkhachhang&act=delete_cat&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
                                    return false;"><img src="media/images/delete.png" border="0" /></a></td>
                </tr>
            <?php } } ?>
        </table>
        <!--<a href="index.php?com=dkkhachhang&act=add_cat"><img src="media/images/add.jpg" border="0"  /></a>-->

        <div class="paging"><?= $paging['paging'] ?></div>

        <!-- 
            <strong>Gửi Mail:</strong>
        -->




    <!-- <table width="100%" cellpadding="5" cellspacing="0" border="0" class="tablelienhe">
        <tr>
            <td>Chủ đề<span>*</span></td>
            <td>
                <input name="tieude1" type="text" class="form-control input1" id="tieude1" size="50"  />
            </td>
        </tr>                         
        <tr>
            <td>Nội dung<span>*</span></td>
            <td>
                <textarea name="noidung" cols="50" rows="5" class="ta_noidung editor" id="noidung" style="background-color:#FFFFFF; color:#666666;"></textarea>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td> 
                <input class="btn btn-success" type="button" value="Gửi" id="guitin" onclick="js_submit();" />
                <input class="btn btn-danger" type="button" value="Nhập lại" onclick="document.frm.reset();" />

            </td>
        </tr>
    </table> -->
    </div>	