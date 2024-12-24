<script type="text/javascript">
$(document).ready(function(){
        initSwitch();
    })
    function initSwitch(){
            $(".switch-input").bootstrapSwitch({onColor:'info',size:'mini',offColor:'danger',onSwitchChange:function(event, state){
                $id=$(this).data('id');
                //$act=$(this).data('com');
                //$table=$(this).data('table');
                $.ajax({
                    type:"POST",
                    url:"ajax/xulysp.php",
                    data:{id:$id,act:"capnhattab", fiel: 'hienthi',table:'product_tab'},
                    success: function(data){
                    }
                })
            }
        });
    }
</script>
<h3><a href="index.php?com=product&act=add_tab&idc=<?= $_REQUEST['idc'] ?>&type=<?= $_REQUEST['type'] ?>">Thêm màu</a></h3>

<table class="blue_table">
    <tr>
        <th style="width:10%;">Stt</th>
        <th style="width:10%;">Hình ảnh</th>
        <th style="width:50%;">Tên màu</th>
        <th style="width:10%;">Hiển thị</th>
        <th style="width:10%;">Sửa</th>
		<th style="width:10%;">Xóa</th>
    </tr>
    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
            <td style="width:10%;"><?= $items[$i]['stt'] ?></td>
            <td style="width:10%;">      
                <img src="<?=_upload_product.$items[$i]['photo'] ?>" alt="<?= $items[$i]['ten'] ?>">
            </td>
            <td style="width:50%;">      
                <?=$items[$i]['ten'] ?>
            </td>
            <!-- <td style="width:10%;">
                <?php
                if (@$items[$i]['hienthi'] == 1) {
                    ?>

                    <a href="index.php?com=product&act=man_tab&hienthi=<?= $items[$i]['id'] ?><?php if ($_REQUEST['idc'] != '') echo'&idc=' . $_REQUEST['idc']; ?><?php if ($_REQUEST['curPage'] != '') echo'&curPage=' . $_REQUEST['curPage']; ?>"><img src="media/images/active_1.png" border="0" /></a>
                    <? 
                    }
                    else
                    {
                    ?>
                    <a href="index.php?com=product&act=man_tab&hienthi=<?= $items[$i]['id'] ?><?php if ($_REQUEST['idc'] != '') echo'&idc=' . $_REQUEST['idc']; ?><?php if ($_REQUEST['curPage'] != '') echo'&curPage=' . $_REQUEST['curPage']; ?>"><img src="media/images/active_0.png"  border="0"/></a>
                <?php }
                ?>   
            </td> -->
            <td style="width:5%;">
                <input class="switch-input hienthi" data-com="hienthi" data-table="product_tab" data-id="<?=$items[$i]['id']?>" type="checkbox" <?php if($items[$i]['hienthi']==1) echo "checked";?> data-off-color="warning" data-size="mini">    
            </td>
            <td style="width:10%;"><a href="index.php?com=product&act=edit_tab&idc=<?= $_REQUEST['idc'] ?>&id=<?= $items[$i]['id'] ?>&type=<?=$_REQUEST["type"]?>"><img src="media/images/edit.png" border="0" /></a></td>
			<td style="width:10%;"><a href="index.php?com=product&act=delete_tab&idc=<?= $_REQUEST['idc'] ?>&id=<?= $items[$i]['id'] ?>&type=<?=$_REQUEST["type"]?>" onClick="if (!confirm('Xác nhận xóa'))
                        return false;"><img src="media/images/delete.png" border="0" /></a></td>
        </tr>
    <?php } ?>
</table>
<a href="index.php?com=product&act=add_tab&idc=<?= $_REQUEST['idc']; ?>"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?= $paging['paging'] ?></div>