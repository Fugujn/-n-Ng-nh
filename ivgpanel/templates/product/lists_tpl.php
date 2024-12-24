<?php
$type = $_REQUEST['type1'];
$d->query("select id,ten_vi,parent_id from #_product_list where com=1 and type = '".$type."' order by stt asc");
$list = $d->result_array();
?>
<script language="javascript">
    function select_onchange($obj)
    {
        var a = $obj.data("id");
        window.location = "index.php?com=product&type=<?= $_REQUEST["type"] ?>&type1=<?= $_REQUEST["type1"] ?>&act=man_list&id_parents=" + a;
        return true;
    }
</script>
<?php 
    if($_REQUEST['type'] == 1){
        $lev = 1;
    }elseif($_REQUEST['type'] == 2){
        $lev = 2;
    }elseif($_REQUEST['type'] == 3){
        $lev = 3;
    }
?>
<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Danh mục cấp <?=$lev?></h2>
  </div>
</div>

<?php if ($_REQUEST["type"] != 1) { ?>
<div class="col-md-3 col-sm-4 col-xs-12" style="padding: 0px;margin-bottom: 10px;">
    <div class="btn-group mr-1 mb-1">
        <?php if($_REQUEST['id_parents'] != '' && $_REQUEST['id_parents'] != '0' && isset($_REQUEST['id_parents'])){
            $d->query("select id,ten_vi,parent_id from #_product_list where id='" . $_REQUEST['id_parents'] . "' ");
            $listselect = $d->fetch_array();
        ?>
            <button type="button" class="btn btn-success"><i class="icon-align-right"></i> &nbsp;&nbsp;<?=$listselect['ten_vi']?></button>
        <?php }else{?>
            <button type="button" class="btn btn-success"><i class="icon-align-right"></i> &nbsp;&nbsp;Chọn danh mục</button>
        <?php } ?>
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" data-id="" onclick="select_onchange($(this));">Tất cả danh mục</a>
            <?php foreach ($list as $v) { ?>
                <a class="dropdown-item" data-id="<?= $v["id"] ?>" onclick="select_onchange($(this));"><?=$v['ten_vi']?></a>
                <?php
                if ($_REQUEST["type"] - 1 > 1) {
                    $d->query("select id,ten_vi,parent_id from #_product_list where id_parent='" . $v["id"] . "' and com='" . ($_REQUEST["type"] - 1) . "' order by stt asc");
                        $list2 = $d->result_array();
                ?>
                <?php foreach ($list2 as $k) { ?>
                    <a class="dropdown-item" data-id="<?= $k["id"] ?>" onclick="select_onchange($(this));">---- <?=$k['ten_vi']?></a>
                    
                <?php } }?>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>

<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
               
                <a href="index.php?com=product&type=<?= $_REQUEST["type"] ?>&type1=<?= $_REQUEST["type1"] ?>&act=add_list" class="btn btn-success "><i class="icon-pencil3"></i> &nbsp;Thêm mới</a>

                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
              
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <?php if (($_REQUEST["type1"] == 'san-pham' && $_REQUEST["type"] != '3') || $_REQUEST["type1"]=='thuong-hieu') { ?>
                                <th>Hình ảnh</th>
                                <?php } ?>
                                <?php if ($_REQUEST["type"] != 1) { ?>
                                <th>Danh mục</th>
                                <?php } ?>
                                <th>Tên</th>
                                <?php if (($_REQUEST["type"] == 1 || $_REQUEST["type"] == 2) && $_REQUEST["type1"]=='san-pham') { ?>
                                <th>Nổi bật</th>
                                <?php } ?>
                                <th>Hiển thị</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
                            <tr>
                                
                                <td><?= $items[$i]['stt'] ?></td>
                                <?php if ($_REQUEST["type1"] == 'san-pham' && $_REQUEST["type"] != '3') { ?>
                                    <td><img src="<?= _upload_thumb . $items[$i]['thumb'] ?>" alt="image" style="max-height:  70px;"></td>
                                <?php } elseif($_REQUEST["type1"]=='thuong-hieu') { ?>
                                    <td><img src="<?= _upload_product . $items[$i]['photo'] ?>" alt="image" style="max-height:  70px;"></td>
                                <?php } ?>
                                <?php if ($_REQUEST["type"] != 1) { ?>
                                <td >
                                    <?php if($_REQUEST['type'] == 2){
                                        $d->reset();
                                        $sql_danhmuc = "select ten_vi from table_product_list where id='" . $items[$i]['id_parent'] . "'";
                                        $d->query($sql_danhmuc);
                                        $item_danhmuc = $d->fetch_array();
                                        echo '<b>Cấp 1 : </b>'.@$item_danhmuc['ten_vi'];
                                    } ?>

                                    <?php if($_REQUEST['type'] == 3){
                                        $parent_cha = explode('|', $items[$i]['set_level']);

                                        $d->reset();
                                        $sql_danhmuc = "select ten_vi from table_product_list where id='" . $parent_cha[0] . "'";
                                        $d->query($sql_danhmuc);
                                        $item_danhmuc = $d->fetch_array();
                                        echo '<b>Cấp 1 : </b>'.@$item_danhmuc['ten_vi'].'<br>';
                                        $d->reset();
                                        $sql_danhmuc = "select ten_vi from table_product_list where id='" . $items[$i]['id_parent'] . "'";
                                        $d->query($sql_danhmuc);
                                        $item_danhmuc = $d->fetch_array();
                                        echo '<b>Cấp 2 : </b>'.@$item_danhmuc['ten_vi'];


                                        
                                    } ?>
                                </td>
                                <?php } ?>
                                <td><?= $items[$i]['ten_vi'] ?></td>
                                <?php if (($_REQUEST["type"] == 1 || $_REQUEST["type"] == 2) && $_REQUEST["type1"]=='san-pham') { ?>
                                    <td class="anl1" style="width:7%;">
                                    <?php if ($items[$i]['noibat'] == 1){?>
                                        <button id="noibat<?= $items[$i]['id'] ?>" type="button" class="btn btn-sm btn-success switch-input" onclick="initSwitch('noibat','product_list',<?= $items[$i]['id'] ?>)">ON</button>
                                    <?php }else{ ?>
                                        <button id="noibat<?= $items[$i]['id'] ?>" type="button" class="btn btn-sm btn-danger switch-input" onclick="initSwitch('noibat','product_list',<?= $items[$i]['id'] ?>)">OFF</button>
                                    <?php } ?>
                                    </td>
                                <?php } ?>
                                <td class="anl1" style="width:7%;">
                                <?php if ($items[$i]['hienthi'] == 1){?>
                                    <button id="hienthi<?= $items[$i]['id'] ?>" type="button" class="btn btn-sm btn-success switch-input" onclick="initSwitch('hienthi','product_list',<?= $items[$i]['id'] ?>)">ON</button>
                                <?php }else{ ?>
                                    <button id="hienthi<?= $items[$i]['id'] ?>" type="button" class="btn btn-sm btn-danger switch-input" onclick="initSwitch('hienthi','product_list',<?= $items[$i]['id'] ?>)">OFF</button>
                                <?php } ?>    
                                      
                                </td>
                                <td style="width:5%;"><a href="index.php?com=product&type=<?= $_REQUEST["type"] ?>&type1=<?= $_REQUEST["type1"] ?>&act=edit_list&id=<?= $items[$i]['id'] ?>&id_list=<?= $items[$i]['id_parent'] ?>&id_parent=<?= $items[$i]["set_level"] ?>"><i class="icon-sliders" style='font-size: 1.4rem;color:#55595c'></i></a></td>
                                <td style="width:5%;">
                                    <a href="index.php?com=product&type=<?= $_REQUEST["type"] ?>&type1=<?= $_REQUEST["type1"] ?>&act=delete_list&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
                            return false;"><i class="icon-trash-o" style='font-size: 1.4rem;color:#55595c'></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>
<a href="index.php?com=product&type=<?= $_REQUEST["type"] ?>&type1=<?= $_REQUEST["type1"] ?>&act=add_list" class="btn btn-success "><i class="icon-pencil3"></i> &nbsp;Thêm mới</a>

<div class="clearfix"></div>
<!-- Striped rows end -->
<nav aria-label="Page navigation" style="text-align: center;">
    <ul class="pagination pagination-sm">
    <?= $paging['paging'] ?>
    </ul>
</nav>

