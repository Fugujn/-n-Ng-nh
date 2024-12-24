<?php 

$type = $_REQUEST['type'];
?>

<script type="text/javascript">
    function doEnter(evt) {
        // IE					// Netscape/Firefox/Opera
        var key;
        if (evt.keyCode == 13 || evt.which == 13) {
            onSearch(evt);
        }
    }
    function onSearch(evt) {
        var keyword = document.getElementById("keyword").value;
        //var encoded = Base64.encode(keyword);
        location.href = "index.php?com=product&type=<?= $_REQUEST["type"] ?>&act=man&keyword=" + keyword;
        loadPage(document.location);

    }

</script>
<script language="javascript">
    function select_onchange($obj)
    {
        var a = $obj.data("id");
        window.location = "index.php?com=product&type=<?= $_REQUEST["type"] ?>&act=man&id_list=" + a;
        return true;
    }

    function select_onchange1()
    {
        var a = document.getElementById("id_list");
        var b = document.getElementById("id_cat");
        window.location = "index.php?com=product&type=<?= $_REQUEST["type"] ?>&act=man&id_list=" + a.value + "&id_cat=" + b.value;
        return true;
    }

   
    function deletesp(id) {
        $.ajax({
            type: "POST",
            url: "ajax/xulysp.php",
            data: {id: id, act: "delete", table: 'product'},
            success: function (data) {
                //alert(data);
                $("#" + data).fadeOut(500);
                setTimeout(function () {
                    $("#" + $data).remove();
                }, 1000)
            }
        })
    }

function fixgiale(id){      
    var val =$("#giale_"+id).val(); 
    var total = parseFloat(val.replace(/,/g, ''));
    $.ajax({
        url: "ajax/ajax.php",
        type:"POST",
        data: {id:id,val:total,act:"giale"},
        success: function(data){
            //alert(data);
            $(".thongbao").fadeIn(600).html("<div style='position:fixed;top:50%;left:40%;background: green;height: 30px;line-height: 30px;color:#fff;width:30%' align='center'>Cập nhật thành công!</div>");
            $(".thongbao").fadeOut(1500);
        }
    })
}

function fixgiakm(id){      
    var val =$("#giakm_"+id).val(); 
    var total = parseFloat(val.replace(/,/g, ''));
    $.ajax({
        url: "ajax/ajax.php",
        type:"POST",
        data: {id:id,val:total,act:"giakm"},
        success: function(data){
            //alert(data);
            $(".thongbao").fadeIn(600).html("<div style='position:fixed;top:50%;left:40%;background: green;height: 30px;line-height: 30px;color:#fff;width:30%' align='center'>Cập nhật thành công!</div>");
            $(".thongbao").fadeOut(1500);
        }
    })
}
$(document).on('keyup', '.gia', function() {
    var x = $(this).val();
    $(this).val(x.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
});
$(document).on('keyup', '.giakm', function() {
    var x = $(this).val();
    $(this).val(x.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
});
</script>

<?php

$d->query("select id,ten_vi,parent_id,ten_vi from #_product_list where com=1 and type = '".$type."' order by stt asc");
$list = $d->result_array();

?>

<div class="thongbao"></div>

<div style="clear:both;"></div>

<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Quản lý bài viết</h2>
  </div>
</div>

<div class="col-md-3 col-sm-5 col-xs-12" style="padding: 0px;margin-bottom: 10px;">
    <input name="keyword" class="form-control input" id="keyword" placeholder="Tìm kiếm" type="text" /> 
</div>
<div class="col-md-2 col-sm-3 col-xs-12" style="padding: 0px;margin-bottom: 10px;">
    <input type="button" value="Tìm kiếm" class="btn btn-success" onclick="onSearch(event)"/>
</div>
<?php if ($_REQUEST["type"] == 'news' || $_REQUEST["type"] == 'san-pham' || $_REQUEST["type"] == 'dich-vu') { ?>
<div class="col-md-3 col-sm-4 col-xs-12" style="padding: 0px;margin-bottom: 10px;">
    <div class="btn-group mr-1 mb-1">
        <?php if($_REQUEST['id_list'] != '' && $_REQUEST['id_list'] != '0' && isset($_REQUEST['id_list'])){
            $d->query("select id,ten_vi,parent_id from #_product_list where id='" . $_REQUEST['id_list'] . "' ");
            $listselect = $d->fetch_array();
        ?>
            <button type="button" class="btn btn-success"><i class="icon-align-right"></i> &nbsp;&nbsp;<?=$listselect['ten_vi']?></button>
        <?php }else{?>
            <button type="button" class="btn btn-success"><i class="icon-align-right"></i> &nbsp;&nbsp;Chọn danh mục</button>
        <?php } ?>
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" data-id="0" onclick="select_onchange($(this));">--Tất cả danh mục--</a>
            <?php foreach ($list as $v) { ?>
                <a class="dropdown-item" data-id="<?= $v["id"] ?>" onclick="select_onchange($(this));"><?=$v['ten_vi']?></a>
                <?php
                    $d->query("select id,ten_vi,parent_id from #_product_list where id_parent='" . $v["id"] . "' and com=2 order by stt asc");
                    $list2 = $d->result_array();
                ?>
                <?php foreach ($list2 as $k) { ?>
                    <a class="dropdown-item" data-id="<?= $k["id"] ?>" onclick="select_onchange($(this));">---- <?=$k['ten_vi']?></a>
                    <?php
                        $d->query("select id,ten_vi,parent_id from #_product_list where id_parent='" . $k["id"] . "' and com=3 order by stt asc");
                        $list3 = $d->result_array();
                        foreach ($list3 as $h) {
                    ?>
                    <a class="dropdown-item" data-id="<?= $h["id"] ?>" onclick="select_onchange($(this));">-------- <?=$h['ten_vi']?></a>
                    <?php } ?>
                <?php } ?>
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
               
                <a href="index.php?com=product&type=<?= $_REQUEST["type"] ?>&act=add&back=2" class="btn btn-success "><i class="icon-pencil3"></i> &nbsp;Thêm mới</a>

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
                                <th style="width:5%">
                                    <input type="checkbox" name="chonhet" id="chonhet" class="css-checkbox med"/>
                                    <label for="chonhet" name="chonhet_lbl" class="css-label med elegant"></label>
                                </th>
                                <th style="width:5%">Stt</th>
                                <?php if ($_REQUEST["type"] != 'hoidap' && $_REQUEST["type"] != 'chinhsach' && $_REQUEST["type"] != 'duongdan') { ?>
                                <th style="width:10%">Hình ảnh</th>
                                <?php } ?>
                                <?php if ($_REQUEST["type"] == 'san-pham' || $_REQUEST["type"] == 'dich-vu') { ?>
                                <th style="width:25%">Danh mục</th>
                                <?php } ?>
                                <?php if ($_REQUEST["type"] != 'news' && $_REQUEST["type"] != 'chinhsach' && $_REQUEST["type"] != 'duongdan' && $_REQUEST["type"] != 'thicong') { ?>
                                <th style="width:5%">Mã Sp</th>
                                <?php } ?>
                                <th style="width:25%">Tên</th>
                                <?php if ($_REQUEST["type"] == 'san-pham' || $_REQUEST["type"] == 'news' || $_REQUEST["type"] == 'thicong') { ?>
                                    <!-- <th style="width:10%">Mới</th> -->
                                    <th style="width:10%">Nổi bật</th>
                                <?php } ?>
                                <th style="width:10%">Hiển thị</th>
                                <th style="width:5%">Sửa</th>
                                <th style="width:5%">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
                            <tr id="<?= $items[$i]['id'] ?>" <?php if ($items[$i]['id'] == $_SESSION['key']) { ?> style="box-shadow: 2px 2px 15px silver" <?php } ?>>
                                <td style="width:5%">
                                    <input type="checkbox" class="css-checkbox med chon" name="chon" id="chon_<?= $items[$i]['id'] ?>" value="<?= $items[$i]['id'] ?>" />
                                    <label for="chon_<?= $items[$i]['id'] ?>" name="chon" class="css-label med elegant"></label>
                                </td>
                                <td style="width:5%"><?= $items[$i]['stt'] ?></td>
                                <?php if ($_REQUEST["type"] == 'san-pham') { ?>
                                    <td style="width:10%"><img src="<?= _upload_product1 . $items[$i]['photo'] ?>" alt="image" style="height:  70px;"></td>
                                <?php } elseif($_REQUEST["type"] != 'hoidap' && $_REQUEST["type"] != 'chinhsach' && $_REQUEST["type"] != 'duongdan') { ?>
                                    <td style="width:10%"><img src="<?= _upload_thumb . $items[$i]['thumb'] ?>" alt="image" style="height:  70px;"></td>
                                 <?php } ?>
                                <?php if ($_REQUEST["type"] == 'san-pham' || $_REQUEST["type"] == 'dich-vu') { ?>
                                <td style="width:20%">
                                    <!-- <span style='font-weight:bold;'>Danh mục:</span> -->
                                    <?php
                                    if ($items[$i]['list_id'] != 'Danh mục cấp 1') {
                                        $arrlist = explode(',', $items[$i]['list_id']);
                                        for ($il = 0; $il < count($arrlist); $il++) {
                                            if ($arrlist[$il] != '') {
                                                $d->query("select id,ten_vi,ten_vi from #_product_list where id =" . $arrlist[$il] . "");
                                                $ttid = $d->fetch_array();
                                                //echo "<span style='display:block;'>- " . $ttid['ten_vi'] . "</span>";
                                                    echo "<span style='font-weight:bold;'> " ."Cấp " .($il + 1) . ": </span>" . $ttid['ten_vi'] . "<br>";
                                                
                                            }
                                        }
                                    }
                                    ?>      
                                </td>
                                <?php } ?>
                                <?php if ($_REQUEST["type"] != 'news' && $_REQUEST["type"] != 'chinhsach' && $_REQUEST["type"] != 'duongdan' && $_REQUEST["type"] != 'thicong') { ?>
                                <td style="width:5%"><?= $items[$i]['masp'] ?></td>
                                <?php } ?>
                                <td style="width:20%"><a href="http://<?=$config_url.'/'.$items[$i]['tenkhongdau'] ?>" target="_blank"><?= $items[$i]['ten_vi'] ?></a></td>
                                <?php if ($_REQUEST["type"] == 'san-pham' || $_REQUEST["type"] == 'news' || $_REQUEST["type"] == 'thicong') { ?>
                                <td style="width:10%;">
                                <?php if ($items[$i]['noibat'] == 1){?>
                                    <button id="noibat<?= $items[$i]['id'] ?>" type="button" class="btn btn-sm btn-success switch-input" onclick="initSwitch('noibat','product',<?= $items[$i]['id'] ?>)">ON</button>
                                <?php }else{ ?>
                                    <button id="noibat<?= $items[$i]['id'] ?>" type="button" class="btn btn-sm btn-danger switch-input" onclick="initSwitch('noibat','product',<?= $items[$i]['id'] ?>)">OFF</button>
                                <?php } ?> 
                                </td>
                                <!-- <td style="width:10%;">
                                <?php if ($items[$i]['spkm'] == 1){?>
                                    <button id="spkm<?= $items[$i]['id'] ?>" type="button" class="btn btn-sm btn-success switch-input" onclick="initSwitch('spkm','product',<?= $items[$i]['id'] ?>)">ON</button>
                                <?php }else{ ?>
                                    <button id="spkm<?= $items[$i]['id'] ?>" type="button" class="btn btn-sm btn-danger switch-input" onclick="initSwitch('spkm','product',<?= $items[$i]['id'] ?>)">OFF</button>
                                <?php } ?> 
                                </td> -->
                                <?php } ?>
                                <td class="anl1" style="width:10%;">
                                <?php if ($items[$i]['hienthi'] == 1){?>
                                    <button id="hienthi<?= $items[$i]['id'] ?>" type="button" class="btn btn-sm btn-success switch-input" onclick="initSwitch('hienthi','product',<?= $items[$i]['id'] ?>)">ON</button>
                                <?php }else{ ?>
                                    <button id="hienthi<?= $items[$i]['id'] ?>" type="button" class="btn btn-sm btn-danger switch-input" onclick="initSwitch('hienthi','product',<?= $items[$i]['id'] ?>)">OFF</button>
                                <?php } ?>    
                                    <!-- <input class="switch-input spkm" data-com="spkm" data-table="product"  data-id="<?= $items[$i]['id'] ?>" type="checkbox" <?php if ($items[$i]['spkm'] == 1) echo "checked"; ?> data-off-color="warning" data-size="mini"> -->    
                                </td>
                                <td style="width:5%;"><a href="index.php?com=product&type=<?= $_REQUEST["type"] ?>&amp;act=edit&amp;id_list=<?= $items[$i]['id_list'] ?>&amp;id_brand=<?= $items[$i]['id_brand'] ?>&amp;id_parent=<?= $items[$i]['list_id'] ?>&amp;id=<?= $items[$i]['id'] ?>&amp;curPage=<?= $_REQUEST["curPage"] ?>&amp;back=2&amp;key=<?= $items[$i]['id'] ?>"><i class="icon-sliders" style='font-size: 1.4rem;color:#55595c'></i></a></td>
                                <td style="width:5%;">
                                    <a style="cursor:pointer;" onClick="if (!confirm('Xác nhận xóa'))
                                    return false;
                                else
                                    deletesp(<?= $items[$i]['id'] ?>);"><i class="icon-trash-o" style='font-size: 1.4rem;color:#55595c'></i></a>
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
<a href="index.php?com=product&type=<?= $_REQUEST["type"] ?>&act=add&back=2" class="btn btn-success "><i class="icon-pencil3"></i> &nbsp;Thêm mới</a>

<a class="btn btn-danger" href="#" id="xoahet"><i class="icon-trash-o"></i> &nbsp;Xóa tất cả</a>

<div class="clearfix"></div>
<!-- Striped rows end -->
<nav aria-label="Page navigation" style="text-align: center;">
    <ul class="pagination pagination-sm">
    <?= $paging['paging'] ?>
    </ul>
</nav>