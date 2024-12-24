<style type="text/css">input[type='file'] {opacity:0 }</style>
<form name="frm" method="post" id="frm_config" action="index.php?com=icon&act=save&type=<?= $_REQUEST["type"] ?>" enctype="multipart/form-data" class="form">
    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    

    <button type="submit" class="btn btn-success mr-1">
        <i class="icon-check2"></i> Lưu
    </button>
    <button type="button" class="btn btn-warning " onclick="javascript:window.location = 'index.php?com=icon&act=man&type=<?= $_REQUEST["type"] ?>'">
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
                            <?php if($_REQUEST['type'] != 'chinhanh'){?>
                            <div id="heading1" class="card-footer" style="background:#38BD9C">
                                <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#accordion1" aria-expanded="true" aria-controls="accordion1" class="card-title lead display-block" style="margin-bottom: 0px;font-size: 16px;color:#fff;">Hình ảnh <i class="icon-angle-down" style="float: right;"></i></a>
                            </div>
                            <div id="accordion1" role="tabpanel" aria-labelledby="heading1" class="card-collapse collapse in" aria-expanded="true">
                                <div class="card-body">
                                    <div class="card-block">
                                       <div class="" style="padding:5px;border:1px dashed #8C949A;box-sizing: border-box;position: relative;border-radius: 5px;text-align: center;background:#f7f7f7;">
                                            <img id="imageview" style="max-width: 200px;height: auto;" src="<?= _upload_icon . $item['photo'] ?>" onerror="this.src='media/images/no-image.jpg';"/>
                                            <input style="padding:5px;position: absolute;bottom:0px;left:0px;width: 100%;height: 100%;cursor: pointer;" type="file" name="file" id="i_img" onchange="loadFile(event)" />
                                        </div>
                                        <div class="alert alert-warning no-border mb-2 mt-2" role="alert">
                                            <strong>Loại file  : </strong> .png / .jpg /.gif <br>
                                            <?php if($_REQUEST['type'] =='slider'){?>
                                                <strong>Kích thước : </strong> width: 688px - height: 358px
                                            <?php }elseif($_REQUEST['type'] =='header'){?>
                                                <strong>Kích thước : </strong> width: 40px - height: 40px
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if ($_REQUEST["type"] == 'diachi') { ?>
                            <div id="heading4"  class="card-footer" style="background:#38BD9C">
                                <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#accordion4" aria-expanded="false" aria-controls="accordion4" class="card-title lead collapsed display-block" style="margin-bottom: 0px;font-size: 16px;color:#fff;">Khu vực<i class="icon-angle-down" style="float: right;"></i></a>
                            </div>
                            <div id="accordion4" role="tabpanel" aria-labelledby="heading4" class="card-collapse collapse" aria-expanded="false">
                                <div class="card-body">
                                    <div class="card-block">
                                        <b class="mb-1 display-block">Tỉnh thành:</b> 
                                        <?php 
                                            $d->reset();
                                            $sql = "select * from #_province order by type,id asc";
                                            $d->query($sql);
                                            $tinhthanh = $d->result_array();
                                        ?>
                                        <select name="text3_vi" class="form-control">
                                            <option>Chọn tỉnh thành</option>
                                            <?php for ($i=0; $i < count($tinhthanh) ; $i++) { ?>
                                                <option value="<?=$tinhthanh[$i]['id']?>" <?php if($tinhthanh[$i]['id'] == $item['text3_vi']){?> selected <?php } ?>><?=$tinhthanh[$i]['ten_vi']?></option>
                                            <?php } ?>      
                                        </select><br>
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
                                        <?php if($_REQUEST['type'] != 'diachi'){?>
                                            <b class="mb-1 display-block">Link tùy chỉnh</b>
                                            <input type="text" name="url" value="<?= $item['url'] ?>" class="form-control input"/><br />
                                        <?php } ?>
                                        <?php if($_REQUEST['type'] =='slider'){?>
                                        <!-- <b class="mb-1 display-block">Link video</b>
                                        <input type="text" name="urlvideo" value="<?= $item['urlvideo'] ?>" class="form-control input"/><br /> -->
                                        <?php } ?>
                                        <b class="mr-1" style="float: left;">Số thứ tự</b> <input type="text" name="stt" value="<?= isset($item['stt']) ? $item['stt'] : 1 ?>" style="width:30px;float: left;" class="form-control"><br>
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
                       
                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <?php foreach ($config["lang"] as $k => $v) { ?>
                        <div role="tabpanel" class="tab-pane <?php
                        if ($k == 0) {
                            echo 'active';
                        }
                        ?>" id="tab<?= $k + 1 ?>" aria-expanded="true" aria-labelledby="base-tab<?= $k + 1 ?>">
                            <b class="mb-1 display-block">Tiêu đề</b> 
                            <input type="text" name="ten_<?= $v ?>" value="<?= $item['ten_' . $v] ?>" class="form-control input"/><br />
                            <?php if($_REQUEST['type'] == 'chinhanh'){?>
                                <b class="mb-1 display-block">Map</b>       
                                <div>    
                                    <textarea name="mota1_<?= $v ?>"  class="form-control" cols="50" rows="5" id="mota1_<?= $v ?>"><?= @$item['mota1_' . $v] ?></textarea>        
                                </div><br />
                                <b class="mb-1 display-block">Mô tả ngắn</b>       
                                <div>    
                                    <textarea name="mota_<?= $v ?>"  class="form-control editor" cols="50" rows="5" id="mota_<?= $v ?>"><?= @$item['mota_' . $v] ?></textarea>        
                                </div><br />
                            <?php  } ?>
                            <?php if($_REQUEST['type'] == 'chinhsach' || $_REQUEST['type'] == 'hotro'){?>
                            <b class="mb-1 display-block">Mô tả ngắn</b>       
                            <div>    
                                <textarea name="mota_<?= $v ?>"  class="form-control " cols="50" rows="5" id="mota_<?= $v ?>"><?= @$item['mota_' . $v] ?></textarea>        
                            </div><br />
                            <?php  } ?>
                            <?php if($_REQUEST['type'] == 'diachi'){?>
                            <b class="mb-1 display-block">Bản đồ (Nhúng iframe)</b>       
                            <div>    
                                <textarea name="mota_<?= $v ?>"  class="form-control " cols="50" rows="5" id="mota_<?= $v ?>"><?= @$item['mota_' . $v] ?></textarea>        
                            </div><br />
                            <?php  } ?>
                         
                        </div>
                        <?php  } /*--------End  lang----------*/ ?>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
      

    <button type="submit" class="btn btn-success mr-1">
        <i class="icon-check2"></i> Lưu
    </button>
    <button type="button" class="btn btn-warning " onclick="javascript:window.location = 'index.php?com=icon&act=man&type=<?= $_REQUEST["type"] ?>'">
        <i class="icon-cross2"></i> Thoát
    </button>
</form>