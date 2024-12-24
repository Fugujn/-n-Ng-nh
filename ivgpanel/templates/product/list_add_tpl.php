<?php
$set_level = $level;
$id_list = $_REQUEST["id_parent"];
$arr = explode("|", $id_list);
$type = $_REQUEST['type1'];

if ($set_level > 0) {

    function get_main_list() {
        global $rs_menu, $set_level, $d, $arr,$type;
        $d->reset();
        if($_REQUEST['type1'] == 'thuong-hieu' || $_REQUEST['type1'] == 'san-pham') {
            $sql = "select * from #_product_list where com='1' and type = 'san-pham' order by stt, id desc";
        } else {
            $sql = "select * from #_product_list where com='1' and type = '".$type."' order by stt, id desc";
        }
        
        $d->query($sql);
        $rs_menu = $d->result_array();

        $str.='<b class="mb-1 display-block">Danh mục cấp 1:</b> <select name="id_parent[]" class="form-control input level" data-level="1" id="level1" onchange="load_level($(this))" >';
        $str.="<option>Chọn danh mục cấp 1</option>";
        foreach ($rs_menu as $v) {
            $str.='<option value="' . $v["id"] . '" ';
            if ($v["id"] == $arr[0])
                $str.='selected';
            $str.='>' . $v["ten_vi"] . '</option>';
        }
        $str.='</select></br>';
        $str.='<div id="level2"></div>';

        return $str;
    }

}
?>
<style type="text/css">input[type='file'] {opacity:0 }</style>

<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Thiết lập</h2>
  </div>
</div>

<form name="frm" method="post" id="frm_config" action="index.php?com=product&type=<?= $_REQUEST["type"] ?>&type1=<?= $_REQUEST["type1"] ?>&act=save_list" enctype="multipart/form-data" class="form">
    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    

    <button type="submit" class="btn btn-success mr-1">
        <i class="icon-check2"></i> Lưu
    </button>
    <button type="button" class="btn btn-warning " onclick="javascript: window.history.go(-1)">
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
                            <?php if (($_REQUEST["type1"]=='san-pham' && $_REQUEST["type"] != 3) || $_REQUEST['type1'] == 'thuong-hieu') { ?>
                                <div id="heading1" class="card-footer" style="background:#38BD9C">
                                    <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#accordion1" aria-expanded="true" aria-controls="accordion1" class="card-title lead display-block" style="margin-bottom: 0px;font-size: 16px;color:#fff;">Hình ảnh <i class="icon-angle-down" style="float: right;"></i></a>
                                </div>
                                <div id="accordion1" role="tabpanel" aria-labelledby="heading1" class="card-collapse collapse in" aria-expanded="true">
                                    <div class="card-body">
                                        <div class="card-block">
                                        <b class="mb-1 display-block">Hình quảng cáo</b>
                                           <div class="" style="background: #f2f2f2;padding:5px;border:1px dashed #8C949A;box-sizing: border-box;position: relative;border-radius: 5px;text-align: center">
                                                <img id="imageview" style="max-width: 200px;height: auto;" src="<?= _upload_product . $item['photo'] ?>" onerror="this.src='media/images/no-image.jpg';"/>
                                                <input style="padding:5px;position: absolute;bottom:0px;left:0px;width: 100%;height: 100%;cursor: pointer;" type="file" name="file" id="i_img" onchange="loadFile(event)" />
                                            </div>
                                            <div class="alert alert-warning no-border mb-2 mt-2" role="alert">
                                                <strong>Loại file  : </strong> .png / .jpg /.gif <br>
                                                <?php if ($_REQUEST["type"] == 1) { ?>
                                                <strong>Kích thước : </strong> width:282px - height:758px,
                                                <?php } ?>
                                                <?php if ($_REQUEST["type"] == 2) { ?>
                                                <strong>Kích thước : </strong> width: 210px - height: 250px
                                                <?php } ?>
                                                
                                            </div>
                                            <!-- <b class="mb-1 display-block">Hình Banner</b>
                                            <div class="" style="background: #f2f2f2;padding:5px;border:1px dashed #8C949A;box-sizing: border-box;position: relative;border-radius: 5px;text-align: center">
                                                <img id="imageview1" style="max-width: 200px;height: auto;" src="<?= _upload_product . $item['photo1'] ?>" onerror="this.src='media/images/no-image.jpg';"/>
                                                <input style="padding:5px;position: absolute;bottom:0px;left:0px;width: 100%;height: 100%;cursor: pointer;" type="file" name="file1" id="i_img1" onchange="loadFile1(event)" />
                                            </div>
                                            <div class="alert alert-warning no-border mb-2 mt-2" role="alert">
                                                <strong>Loại file  : </strong> .png <br>
                                                <?php if ($_REQUEST["type"] == 1) { ?>
                                                <strong>Kích thước : </strong> width:1200px - height: 150px
                                                <?php } ?>
                                        
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if($_REQUEST['type'] != 1){?>
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
                            <div id="heading3"  class="card-footer" style="background:#38BD9C">
                                <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#accordion3" aria-expanded="false" aria-controls="accordion3" class="card-title lead collapsed display-block" style="margin-bottom: 0px;font-size: 16px;color:#fff;">Link & STT<i class="icon-angle-down" style="float: right;"></i></a>
                            </div>
                            <div id="accordion3" role="tabpanel" aria-labelledby="heading3" class="card-collapse collapse" aria-expanded="false">
                                <div class="card-body">
                                    <div class="card-block">
                                        <b class="mb-1 display-block">Link tùy chỉnh</b>
                                        <input type="text" name="tenkhongdau" value="<?= $item['tenkhongdau'] ?>" class="form-control input tenkhongdau"/><br />
                                        <b class="mr-1" style="float: left;">Số thứ tự</b> <input type="text" name="stt" value="<?= isset($item['stt']) ? $item['stt'] : 1 ?>" style="width:30px;float: left;" class="form-control"><br>
                                    </div>
                                </div>
                            </div>
                            <div id="heading4"  class="card-footer" style="background:#38BD9C">
                                <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#accordion4" aria-expanded="false" aria-controls="accordion4" class="card-title lead collapsed display-block" style="margin-bottom: 0px;font-size: 16px;color:#fff;">Thông tin chung<i class="icon-angle-down" style="float: right;"></i></a>
                            </div>
                            <div id="accordion4" role="tabpanel" aria-labelledby="heading4" class="card-collapse collapse" aria-expanded="false">
                                <div class="card-body">
                                    <div class="card-block">
                                        
                                        <b class="mb-1 display-block">Thẻ H1</b> <input type="text" name="h1" value="<?= $item['h1'] ?>" class="form-control input txt" /><br />
                                        <b class="mb-1 display-block">Thẻ H2</b> <input type="text" name="h2" value="<?= $item['h2'] ?>" class="form-control input txt" /><br />
                                        <b class="mb-1 display-block">Thẻ H3</b> <input type="text" name="h3" value="<?= $item['h3'] ?>" class="form-control input txt" />
                                    </div>
                                </div>
                            </div>

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
                            <?php if ($_REQUEST["type"] == 111) { ?>
                            <b class="mb-1 display-block">Mô tả ngắn</b>       
                            <div>    
                                <textarea name="mota_<?= $v ?>"  class="form-control " cols="50" rows="5" id="mota_<?= $v ?>"><?= @$item['mota_' . $v] ?></textarea>        
                            </div><br />
                            <?php } ?>
                            <?php if ($_REQUEST["type1"] != 'san-pham' && $_REQUEST["type1"] != 'thuong-hieu') { ?>
                            <b class="mb-1 display-block">Mô tả chi tiết</b>   
                            <div>    
                                <textarea name="noidung_<?= $v ?>"  class="form-control editor" cols="50" rows="5" id="noidung_<?= $v ?>"><?= @$item['noidung_' . $v] ?></textarea>        
                            </div>
                            <br />
                            <?php } ?>
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


    <button type="submit" class="btn btn-success mr-1">
        <i class="icon-check2"></i> Lưu
    </button>
    <button type="button" class="btn btn-warning " onclick="javascript: window.history.go(-1)">
        <i class="icon-cross2"></i> Thoát
    </button>
</form>



<script type="text/javascript">
    /*$(document).ready(function () {
        load_level($(".level"));
    })*/
    function load_level($obj) {
        $level = $obj.data("level");
        $id = $obj.val();
        if ($id != 0) {
            $.ajax({
                type: "POST",
                url: "ajax/ajax.php",
                data: {level: $level, id: $id, act: "load_level", id_parent: "<?= $_REQUEST["id_parent"] ?>", type: "<?= $_REQUEST["type"] ?>", checktype: "<?= $_REQUEST["type1"] ?>"},
                success: function (data) {
                    // alert(data);
                    $("#level" + ($level + 1)).html(data);
                }
            })
        }
    }
   
</script>
