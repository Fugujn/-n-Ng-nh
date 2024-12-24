<?php
$set_level = $level;
$id_list = $_REQUEST["id_list"];
$type = $_REQUEST["type"];

if ($set_level > 0) {
    /*function get_main_list() {
        global $rs_menu, $set_level, $d, $id_list;
        $d->reset();
        $sql = "select * from #_product_list where type = '".$_REQUEST['type']."' and com = 1 order by stt, id asc";
        $d->query($sql);
        $rs_menu = $d->result_array();

        $str.='<b class="mb-1 display-block">Chọn danh mục:</b> <select name="id_parent[]" multiple="multiple" class="form-control input level" data-level="1" id="level1" style="height:300px;overflow:auto;" >';
        $str.="<option>--Chọn danh mục--</option>";
        
        foreach($rs_menu as $v){

            $d->reset();
            $sql = "select * from #_product_list where type = '".$_REQUEST['type']."' and com = 2 and id_parent = ".$v['id']." order by stt, id asc";
            $d->query($sql);
            $rs_menu1 = $d->result_array();
            $pos = strpos($_REQUEST["id_parent"], $v['id']);
            if($pos !== false){ 
                $str.='<option value="'.$v["id"].'" selected >'.$v["ten_vi"].'</option>';
            }else{
                $str.='<option value="'.$v["id"].'" >'.$v["ten_vi"].'</option>';
            }
            foreach($rs_menu1 as $v){
                $d->reset();
                $sql = "select * from #_product_list where type = '".$_REQUEST['type']."' and com = 3 and id_parent = ".$v['id']." order by stt, id asc";
                $d->query($sql);
                $rs_menu2 = $d->result_array();
                $pos = strpos($_REQUEST["id_parent"], $v['id']);

                if($pos !== false){ 
                    $str.='<option value="'.$v["id"].'" selected > +___'.$v["ten_vi"].'</option>';
                }else{
                    $str.='<option value="'.$v["id"].'" > +___'.$v["ten_vi"].'</option>';
                }
                
                //$str.='> +___'.$v["ten_vi"].'</option>';
                foreach($rs_menu2 as $v){
                    $pos = strpos($_REQUEST["id_parent"], $v['id']);
                    if($pos !== false){ 
                        $str.='<option value="'.$v["id"].'" selected > +_____'.$v["ten_vi"].'</option>';
                    }else{
                        $str.='<option value="'.$v["id"].'" > +_____'.$v["ten_vi"].'</option>';
                    }
                    //$str.='> +______'.$v["ten_vi"].'</option>';
                }
            }
        }
        $str.='</select></br>';
        $str.='<div id="level2"></div>';

        return $str;
    }*/
    function get_main_list() {
        global $rs_menu, $set_level, $d, $id_list,$type;
        $d->reset();
        $sql = "select * from #_product_list where com='1' and type = '".$type."' order by stt, id desc";
        $d->query($sql);
        $rs_menu = $d->result_array();

        $str.='<b class="mb-1 display-block">Danh mục cấp 1:</b> <select name="id_parent[]" class="form-control input level" data-level="1" id="level1" onchange="load_level($(this))" >';
        $str.="<option>Danh mục cấp 1</option>";
        foreach ($rs_menu as $v) {
            $str.='<option value="' . $v["id"] . '" ';
            if ($v["id"] == $id_list)
                $str.='selected';
            $str.='>' . $v["ten_vi"] . '</option>';
        }
        $str.='</select></br>';
        $str.='<div id="level2"></div>';

        return $str;
    }

}
?>
<script type="text/javascript">

    function select_onchange()
    {
        var a = document.getElementById("id_list");
        window.location = "index.php?com=product&type=<?= $_REQUEST["type"] ?>&act=<?php
if ($_REQUEST['act'] == 'edit')
    echo 'edit';
else
    echo 'add';
?><?php if ($_REQUEST['id'] != '') echo"&id=" . $_REQUEST['id']; ?>&id_list=" + a.value;
        return true;
    }

    function select_onchange1()
    {
        var a = document.getElementById("id_list");
        var b = document.getElementById("id_cat");
        window.location = "index.php?com=product&type=<?= $_REQUEST["type"] ?>&act=<?php
if ($_REQUEST['act'] == 'edit')
    echo 'edit';
else
    echo 'add';
?><?php if ($_REQUEST['id'] != '') echo"&id=" . $_REQUEST['id']; ?>&id_list=" + a.value + "&id_cat=" + b.value;
        return true;
    }
</script>
<style type="text/css">
    .showimage{width: 50%;float: left;position: relative;padding:0px 3px;box-sizing: border-box;margin-bottom: 5px;}
    .icon-remove{position: absolute;top:5px;right: 5px;font-size: 30px;color:red;cursor: pointer;}
</style>

<style type="text/css">input[type='file'] {opacity:0 }</style>

<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Thiết lập</h2>
  </div>
</div>
<form name="frm" method="post" id="frm_config" action="index.php?com=product&type=<?= $_REQUEST["type"] ?>&act=save&curPage=<?= $_REQUEST['curPage'] ?>&back=<?= $_REQUEST['back'] ?>&key=<?= $_REQUEST['key'] ?>" enctype="multipart/form-data" class="form">
    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    

    <button type="submit" class="btn btn-success mr-1">
        <i class="icon-check2"></i> Lưu
    </button>
    <button type="button" class="btn btn-warning " onclick="javascript: window.history.go(1 - <?= $_REQUEST['back'] ?>)">
        <i class="icon-cross2"></i> Thoát
    </button>

<section id="basic-form-layouts" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-4 push-md-8">
            <div class="card mb-0">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-colored-form-control">Thông tin cơ bản</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                
                        </ul>
                    </div>
                </div>
            
                <div class="card-body collapse in">
                    <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
                        <div class="card mb-0">
                            <?php if ($_REQUEST["type"] != 'hoidap') { ?>
                            <div id="heading1" class="card-footer" style="background:#38BD9C">
                                <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#accordion1" aria-expanded="true" aria-controls="accordion1" class="card-title lead display-block" style="margin-bottom: 0px;font-size: 16px;color:#fff;">Hình ảnh <i class="icon-angle-down" style="float: right;"></i></a>
                            </div>
                            <div id="accordion1" role="tabpanel" aria-labelledby="heading1" class="card-collapse collapse in" aria-expanded="true">
                                <div class="card-body">
                                    <div class="card-block">
                                       <div class="" style="padding:5px;border:1px dashed #8C949A;box-sizing: border-box;position: relative;border-radius: 5px;text-align: center">
                                        <?php if ($_REQUEST["type"] == 'san-pham') { ?>
                                            <img id="imageview" style="max-width: 200px;height: auto;" src="<?= _upload_product1 . $item['photo'] ?>" onerror="this.src='media/images/no-image.jpg';"/>
                                            
                                        <?php } else { ?>
                                            <img id="imageview" style="max-width: 200px;height: auto;" src="<?= _upload_product . $item['photo'] ?>" onerror="this.src='media/images/no-image.jpg';"/>
                                        <?php } ?>
                                            
                                            <input style="padding:5px;position: absolute;bottom:0px;left:0px;width: 100%;height: 100%;cursor: pointer;" type="file" name="file" id="i_img" onchange="loadFile(event)" />
                                        </div>
                                        <div class="alert alert-warning no-border mb-2 mt-2" role="alert">
                                            <strong>Loại file  : </strong> .png / .jpg /.gif <br>
                                            <?php if ($_REQUEST["type"] == 'san-pham') { ?>
                                                <strong>Kích thước : </strong> width: 700px - height: 700px
                                            <?php }else{ ?>
                                                <strong>Kích thước : </strong> width: 384px - height: 244px
                                            <?php } ?>
                                        </div>

                                    </div>

                                    <div class="card-block" style="position: relative;">
                                       

                                        <?php if ($_REQUEST["type"] == 'san-pham') { ?>
                                            <!-- <i class="icon-remove" data-id="<?= $item['id'] ?>" onclick="removeimg(<?= $item['id'] ?>)" style="top:-20px;right: 25px;"></i>
                                            <div class="" style="padding:5px;border:1px dashed #8C949A;box-sizing: border-box;position: relative;border-radius: 5px;text-align: center;position: relative;">
                                                    <img id="imageview_phu" style="max-width: 200px;height: auto;" src="<?= _upload_product1 . $item['photo_phu'] ?>" onerror="this.src='media/images/no-image.jpg';"/>
                                                    <input style="padding:5px;position: absolute;bottom:0px;left:0px;width: 100%;height: 100%;cursor: pointer;" type="file" name="file_phu" id="i_img_phu" onchange="loadFile_phu(event)" />
                                                    <div class="alert alert-warning no-border mb-2 mt-2" role="alert">
                                                    <strong>Loại file  : </strong> .png / .jpg /.gif <br>
                                                        <?php if ($_REQUEST["type"] == 'san-pham') { ?>
                                                            <strong>Kích thước : </strong> width: 700px - height: 700px
                                                        <?php }else{ ?>
                                                            <strong>Kích thước : </strong> width: 600px - height: 355px
                                                        <?php } ?>
                                                    </div>
                                            </div> -->
                                        <?php } else { ?>

                                        <?php } ?>
                                            
                                            
                                        
                                        

                                    </div>

                                </div>
                            </div>
                            <?php } ?>
                            <?php if ($_REQUEST["type"] == 'news' || $_REQUEST["type"] == 'san-pham' || $_REQUEST["type"] == 'dich-vu') { ?>
                            <div id="heading2"  class="card-footer" style="background:#38BD9C">
                                <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#accordion2" aria-expanded="false" aria-controls="accordion2" class="card-title lead collapsed display-block" style="margin-bottom: 0px;font-size: 16px;color:#fff;">Thêm danh mục <i class="icon-angle-down" style="float: right;"></i></a>
                            </div>
                            <div id="accordion2" role="tabpanel" aria-labelledby="heading2" class="card-collapse collapse" aria-expanded="false">
                                <div class="card-body">
                                    <div class="card-block">
                                        <?= get_main_list(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div id="heading4"  class="card-footer" style="background:#38BD9C">
                                <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#accordion4" aria-expanded="false" aria-controls="accordion4" class="card-title lead collapsed display-block" style="margin-bottom: 0px;font-size: 16px;color:#fff;">Thông tin chung<i class="icon-angle-down" style="float: right;"></i></a>
                            </div>
                            <div id="accordion4" role="tabpanel" aria-labelledby="heading4" class="card-collapse collapse" aria-expanded="false">
                                <div class="card-body">
                                    <div class="card-block">
                                        <?php if ($_REQUEST["type"] == 'san-pham') { ?>
                                        <b class="mb-1 display-block">Mã SP</b> <input type="text" name="masp" value="<?= $item['masp'] ?>" class="form-control input" /><br>

                                        <!-- <b class="mb-1 display-block">Brand:</b> 
                                        <select name="list_thuonghieu" class="form-control">
                                            <option>Chọn Thương hiệu</option>
                                            <?php 
                                            $d->reset();
                                            $sql = "select * from #_product_list where hienthi=1 and type='thuong-hieu' and com = 2 order by stt,id desc";
                                            $d->query($sql);
                                            $brandleft = $d->result_array();
                                            for($i = 0; $i < count($brandleft);$i++){
                                                $d->reset();
                                                $sql = "select * from #_product_list where hienthi=1 and type='san-pham' and com = 1 and id = '".$brandleft[$i]['id_parent']."' order by stt,id desc";
                                                $d->query($sql);
                                                $brand_toplist = $d->fetch_array();

                                                $malist = $brandleft[$i]['id'].','.$brand_toplist['id'];
                                            ?>
                                                <option value="<?= $malist ?>" <?php if($item['list_thuonghieu'] == $malist){?> selected <?php } ?>>
                                                    <?= $brandleft[$i]['ten_vi'] ?> - <?= $brand_toplist['ten_vi'] ?>
                                                </option>
                                            <?php } ?>
                                        </select><br> -->
                                        <b class="mb-1 display-block">Trạng thái:</b> 
                                        <select name="trangthai" class="form-control">
                                            <option>Chọn trạng thái</option>
                                            <option value="1" <?php if($item['trangthai'] == 1){?> selected <?php } ?>>Còn hàng</option>
                                            <option value="2" <?php if($item['trangthai'] == 2){?> selected <?php } ?>>Hết hàng</option>
                                            <option value="3" <?php if($item['trangthai'] == 3){?> selected <?php } ?>>Đang về</option>
                                            <option value="4" <?php if($item['trangthai'] == 4){?> selected <?php } ?>>Tạm ngưng</option>
                                        </select><br>
                                        <b class="mb-1 display-block">Giá hiển thị</b> <input type="text" name="gia" value="<?=number_format($item['gia'],0,'.',',')?>" class="form-control input gia"/> <br />
                                        <b class="mb-1 display-block">Giá gốc (vnđ)</b> <input type="text" name="giakm" value="<?=number_format($item['giakm'],0,'.',',')?>" class="form-control input giakm" /> <br />

                                        <!-- <b class="mb-1 display-block">% giảm giá</b> <input type="text" name="phantramgiam" value="<?=$item['phantramgiam']?>" class="form-control input" /> <br /> -->
                                        <?php } ?>
                                        <b class="mb-1 display-block">Link tùy chỉnh</b>
                                        <input type="text" name="tenkhongdau" value="<?= $item['tenkhongdau'] ?>" class="form-control input tenkhongdau"/><br />
                                        <b class="mr-1" style="float: left;">Số thứ tự</b> <input type="text" name="stt" value="<?= isset($item['stt']) ? $item['stt'] : 1 ?>" style="width:30px;float: left;" class="form-control"><br><br>
                                        <b class="mb-1 display-block">Thẻ H1</b> <input type="text" name="h1" value="<?= $item['h1'] ?>" class="form-control input txt" /><br />
                                        <b class="mb-1 display-block">Thẻ H2</b> <input type="text" name="h2" value="<?= $item['h2'] ?>" class="form-control input txt" /><br />
                                        <b class="mb-1 display-block">Thẻ H3</b> <input type="text" name="h3" value="<?= $item['h3'] ?>" class="form-control input txt" />
                                    </div>
                                </div>
                            </div>
                            <?php if ($_REQUEST["type"] == 'san-pham') { ?>
                                <!-- <div id="heading3"  class="card-footer" style="background:#38BD9C">
                                    <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#accordion3" aria-expanded="false" aria-controls="accordion3" class="card-title lead collapsed display-block" style="margin-bottom: 0px;font-size: 16px;color:#fff;">Quản lý File<i class="icon-angle-down" style="float: right;"></i></a>
                                </div>
                                <div id="accordion3" role="tabpanel" aria-labelledby="heading3" class="card-collapse collapse" aria-expanded="false">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <?php
                                            $d->reset();
                                            $sql = "select * from #_icon where id_product = '".$_REQUEST['id']."' and type = 'listfile' order by stt";
                                            $d->query($sql);
                                            $producttab_file = $d->result_array();
                                            ?>
                                            <?php for($i = 0; $i < 11; $i++) { ?>
                                                <div style="width:50%;float:left">
                                                    <b class="mb-1 display-block">Tên <?= $i+1 ?></b>
                                                    <input type="text" name="tenfilegia<?= $i ?>" value="<?= $producttab_file[$i]['ten_vi'] ?>" class="form-control input" style="width: 90%;"/><br />
                                                </div>
                                                <div style="width:50%;float:left">
                                                    <b class="mb-1 display-block">Link <?= $i+1 ?></b>
                                                    <input type="text" name="motafiledetail<?= $i ?>" value="<?= $producttab_file[$i]['url'] ?>" class="form-control input" style="width: 90%;"/><br />
                                                </div>
                                                <div style="clear: both;"></div>
                                                <div style="width:20%;float:left">
                                                    <b class="mb-1 display-block">Stt <?= $i+1 ?></b>
                                                    <input type="text" name="sttfiledetail<?= $i ?>" value="<?= $producttab_file[$i]['stt'] ?>" class="form-control input" style="width: 90%;"/><br />
                                                </div>
                                                <div style="clear: both;"></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div> -->
                                
                                <!-- <div id="heading6"  class="card-footer" style="background:#38BD9C">
                                    <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#accordion6" aria-expanded="false" aria-controls="accordion6" class="card-title lead collapsed display-block" style="margin-bottom: 0px;font-size: 16px;color:#fff;">Giá<i class="icon-angle-down" style="float: right;"></i></a>
                                </div>
                                <div id="accordion6" role="tabpanel" aria-labelledby="heading6" class="card-collapse collapse" aria-expanded="false">
                                    <div class="card-body">
                                        <div class="card-block">
                                            
                                            <?php
                                            $d->reset();
                                            $sql = "select * from #_product_tab where id_photo = '".$_REQUEST['id']."' and com = 'listgia' order by stt";
                                            $d->query($sql);
                                            $producttab = $d->result_array();
                                            ?>
                                            <?php for($i = 0; $i < 11; $i++) { ?>
                                                <div style="width:40%;float:left">
                                                    <b class="mb-1 display-block">Tên <?= $i+1 ?></b>
                                                    <input type="text" name="tengia<?= $i ?>" value="<?= $producttab[$i]['ten_vi'] ?>" class="form-control input" style="width: 90%;"/><br />
                                                </div>
                                                <div style="width:40%;float:left">
                                                    <b class="mb-1 display-block">Giá <?= $i+1 ?></b>
                                                    <input type="text" name="giadetail<?= $i ?>" value="<?=number_format($producttab[$i]['gia'],0,'.',',')?>" class="form-control input gia" style="width: 90%;"/><br />
                                                </div>
                                                <div style="width:20%;float:left">
                                                    <b class="mb-1 display-block">Stt <?= $i+1 ?></b>
                                                    <input type="text" name="sttdetail<?= $i ?>" value="<?= $producttab[$i]['stt'] ?>" class="form-control input" style="width: 90%;"/><br />
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div> -->
                                
                                <div id="heading5"  class="card-footer" style="background:#38BD9C">
                                    <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#accordion5" aria-expanded="false" aria-controls="accordion5" class="card-title lead collapsed display-block" style="margin-bottom: 0px;font-size: 16px;color:#fff;">Album hình<i class="icon-angle-down" style="float: right;"></i></a>
                                </div>
                                <div id="accordion5" role="tabpanel" aria-labelledby="heading5" class="card-collapse collapse" aria-expanded="false">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="alert alert-warning no-border mb-2" role="alert">
                                                <strong>Loại file  : </strong> .png / .jpg <br>
                                                <strong>Lưu ý : </strong> Upload 1 lần tối đa 10 hình, dung lượng mỗi hình < 1MB

                                            </div>    
                                            <?php
                                             if ($_REQUEST['act'] == "edit") {
                                                 foreach ($rs_img as $v) {
                                                     ?>
                                                    <div class="showimage" id="<?= md5($v['id']) ?>">
                                                     <a href="<?= _upload_product1 . $v['photo'] ?>">
                                                         <img src="<?= _upload_product1 . $v['photo'] ?>" alt="hình ảnh" style="max-width: 100%;max-height: 100px;" />
                                                     </a>
                                                     <i class="icon-remove" data-id="<?= $v['id'] ?>" onclick="removealbum(<?= $v['id'] ?>)"></i>
                                                    </div>                                                       
                                                     <?php
                                                 }
                                             }
                                             ?>
                                             <div class="clearfix"></div>
                                             <div id="dZUpload" class="dropzone mt-1">
                                             <div class="dz-default dz-message"><img src="media/images/no-image.jpg" alt="add photo" class="img-responsive" /></div>
                                             </div>   

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div> <!-- End class card -->
                   </div> <!-- End class accordionWrapa1 -->
                </div> <!-- End class card body -->
            </div>
        </div>
        <div class="col-md-8 pull-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-colored-form-control">Thông tin chi tiết</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                           
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <ul class="nav nav-tabs mt-1 pl-1">
                        <?php foreach ($config["lang"] as $k => $v) { ?>
                        <li class="nav-item">
                            <a class="nav-link <?php
                        if ($k == 0) {
                            echo 'active';
                        }
                        ?>" id="base-tab<?= $k + 1 ?>" data-toggle="tab" aria-controls="tab<?= $k + 1 ?>" href="#tab<?= $k + 1 ?>" aria-expanded="true"><?= $config["All_lang"][$v] ?></a>
                        </li>
                        <?php } ?>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="base-tab100" data-toggle="tab" aria-controls="tab100" href="#tab100" aria-expanded="false">Thông tin SEO</a>
                        </li> -->
                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <?php foreach ($config["lang"] as $k => $v) { ?>
                        <div role="tabpanel" class="tab-pane <?php
                        if ($k == 0) {
                            echo 'active';
                        }
                        ?>" id="tab<?= $k + 1 ?>" aria-expanded="true" aria-labelledby="base-tab<?= $k + 1 ?>">
                            <b class="mb-1 display-block">Tiêu đề</b> 
                            <input type="text" name="ten_<?= $v ?>" value="<?= $item['ten_' . $v] ?>" class="form-control input <?php if($v == 'vi') { ?> ten <?php } ?>"/><br />
                            
                            <?php if ($_REQUEST["type"] == 'san-pham') { ?>
                                <?php if($v == 'vi') { ?>
                                    <!-- <b class="mb-1 display-block">Sp Mua kèm (ms1,ms2,ms3)</b> 
                                    <input type="text" name="spmuakem" value="<?= $item['spmuakem'] ?>" class="form-control input"/><br />

                                    <b class="mb-1 display-block">Link Video</b> 
                                    <input type="text" name="ten_video" value="<?= $item['ten_video'] ?>" class="form-control input"/><br /> -->
                                <?php } ?>
                                <b class="mb-1 display-block">Thông tin tham khảo</b>  
                                <div>    
                                    <textarea name="mota_<?= $v ?>"  class="form-control editor" cols="50" rows="5" id="mota_<?= $v ?>"><?= @$item['mota_' . $v] ?></textarea>        
                                </div><br />
                            <?php } else { ?>
                                <?php if ($_REQUEST["type"] != 'thicong') { ?>
                                    <b class="mb-1 display-block">Mô tả ngắn</b>       
                                    <div>    
                                        <textarea name="mota_<?= $v ?>"  class="form-control" cols="50" rows="5" id="mota_<?= $v ?>"><?= @$item['mota_' . $v] ?></textarea>        
                                    </div><br />
                                <?php } ?>
                            <?php } ?>
                            <b class="mb-1 display-block">Mô tả chi tiết</b>   
                            <div>    
                                <textarea name="noidung_<?= $v ?>"  class="form-control editor" cols="50" rows="5" id="noidung_<?= $v ?>"><?= @$item['noidung_' . $v] ?></textarea>        
                            </div>
                            <br />
                            <b class="mb-1 display-block" style="color:red">Thông tin SEO</b>  
                            <b class="mb-1 display-block">Title</b> 
                            <input type="text" name="title_<?= $v ?>" value="<?= $item['title_' . $v] ?>" class="form-control input txt" /><br />

                            <b class="mb-1 display-block">Keywords</b>     
                            <div>    
                                <textarea name="keywords_<?= $v ?>"  class="form-control input1" cols="50" rows="3" id="keywords_<?= $v ?>"><?= @$item['keywords_' . $v] ?></textarea>        
                            </div><br>
                            <b class="mb-1 display-block">Description </b>     
                            <div>    
                                <textarea name="description_<?= $v ?>"  class="form-control input1" cols="50" rows="3" id="description_<?= $v ?>"><?= @$item['description_' . $v] ?></textarea>        
                            </div>
                            <br>
                        </div>
                        <?php  } /*--------End  lang----------*/ ?>
                        <!-- <div role="tabpanel" class="tab-pane" id="tab100" aria-expanded="true" aria-labelledby="base-tab100">
                            <b class="mb-1 display-block">Title</b> 
                            <input type="text" name="title_<?= $v ?>" value="<?= $item['title_' . $v] ?>" class="form-control input txt" /><br />
                        
                            <b class="mb-1 display-block">Keywords</b>     
                            <div>    
                                <textarea name="keywords_<?= $v ?>"  class="form-control input1" cols="50" rows="3" id="keywords_<?= $v ?>"><?= @$item['keywords_' . $v] ?></textarea>        
                            </div><br>
                            <b class="mb-1 display-block">Description </b>     
                            <div>    
                                <textarea name="description_<?= $v ?>"  class="form-control input1" cols="50" rows="3" id="description_<?= $v ?>"><?= @$item['description_' . $v] ?></textarea>        
                            </div>
                            <br>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
      

            <!-- <div class="form-group form-group-sm">
            <?php if ($_REQUEST['act'] == edit) {
                ?><b>Hình phụ:</b><img src="<?= _upload_product . $item['photo1'] ?>" class="img-responsive" style="max-width: 250px;"  alt="NO PHObr/>
            <?php } ?>
                    <b>Hình phụ:</b> <input type="file" name="file1" /> <?= _product_type ?><br /><b></b><strong>Tỉ lệ hình: width: 960px height: 430px;</strong><br />
            </div> -->

    <button type="submit" class="btn btn-success mr-1">
        <i class="icon-check2"></i> Lưu
    </button>
    <button type="button" class="btn btn-warning " onclick="javascript: window.history.go(1 - <?= $_REQUEST['back'] ?>)">
        <i class="icon-cross2"></i> Thoát
    </button>
</form>

<script type="text/javascript">
    function load_level($obj) {
        $level = $obj.data("level");
        $id = $obj.val();
        if ($id != 0) {
            $.ajax({type: "POST",
                url: "ajax/ajax.php",
                data: {max_level:<?= $level ?>, level: $level, id: $id, act: "load_level_sp", id_parent: "<?= $_REQUEST["id_parent"] ?>", type1: "<?= $_REQUEST["type"] ?>", id_sp: "<?= ($_REQUEST["id"] != '') ? $_REQUEST["id"] : '0' ?>"},
                success: function (data) {

                    $("#level" + ($level + 1)).html(data);
                }
            })
        }
    }

    function removealbum(id){
        //alert('aaa');
        //var id = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "ajax/xuly_admin_dn.php", data: {id: id, act: 'remove_image'},
            success: function (data) {
                $jdata = $.parseJSON(data);
                $("#" + $jdata.md5).fadeOut(500);
                setTimeout(function () {
                    $("#" + $jdata.md5).remove();
                }, 1000)
            }
        })
    }

    function removeimg(id){
        $.ajax({
            type: "POST",
            url: "ajax/xuly_admin_dn.php", data: {id: id, act: 'remove_image1'},
            success: function (data) {
                $jdata = $.parseJSON(data);
                alert('Ảnh đã được xóa');
                location.reload();
                // $("#" + $jdata.md5).fadeOut(500);
                // setTimeout(function () {
                //     $("#" + $jdata.md5).remove();
                // }, 1000)
            }
        })
    }
</script>