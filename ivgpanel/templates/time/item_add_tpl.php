<style type="text/css">input[type='file'] {opacity:0 }</style>
<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Quản lý bài viết</h2>
  </div>
</div>
<form name="frm" method="post" action="index.php?com=time&act=save&type=<?= $_REQUEST["type"] ?>" enctype="multipart/form-data" class="form"> 
   
    <button type="submit" class="btn btn-success mr-1">
        <i class="icon-check2"></i> Lưu
    </button>
    <section id="basic-form-layouts" class="mt-1">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
                        <!-- <div class="card-block">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <b class="mb-1 display-block">Hình ảnh</b> 
                                    <div class="" style="padding:5px;border:1px dashed #8C949A;box-sizing: border-box;position: relative;border-radius: 5px;text-align: center">
                                        <img id="imageview" style="max-width: 200px;height: auto;" src="<?= _upload_hinhanh . $item['photo'] ?>" onerror="this.src='media/images/no-image.jpg';"/>
                                        <input style="padding:5px;position: absolute;bottom:0px;left:0px;width: 100%;height: 100%;cursor: pointer;" type="file" name="file" id="i_img" onchange="loadFile(event)" />
                                    </div>
                                    <div class="alert alert-warning no-border mb-2 mt-2" role="alert">
                                        <strong>Loại file  : </strong> .png / .jpg /.gif <br>
                                        <strong>Kích thước : </strong> width: 100px - height: 50px
                                    </div>
                                </div> 
                            </div>
                        </div> -->

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
                                <?php if($_REQUEST['type'] == 'gioi-thieu'){?>
                                    <b class="mb-1 display-block">Tiêu đề</b> 
                                    <input type="text" name="ten_<?= $v ?>" value="<?= $item['ten_' . $v] ?>" class="form-control input"/><br />
                                    <!-- <b class="mb-1 display-block">Mô tả ngắn</b>       
                                    <div>    
                                        <textarea name="mota_<?= $v ?>"  class="form-control " cols="50" rows="5" id="mota_<?= $v ?>"><?= @$item['mota_' . $v] ?></textarea>        
                                    </div><br /> -->
                                    
                                    <b class="mb-1 display-block">Mô tả ngắn</b>   
                                    <div>    
                                        <textarea name="mota_<?= $v ?>"  class="form-control editor" cols="50" rows="5" id="mota_<?= $v ?>"><?= @$item['mota_' . $v] ?></textarea>        
                                    </div>
                                    <br />
                                <?php } ?>
                                <b class="mb-1 display-block">Mô tả chi tiết</b>   
                                <div>    
                                    <textarea name="noidung_<?= $v ?>"  class="form-control editor" cols="50" rows="5" id="noidung_<?= $v ?>"><?= @$item['noidung_' . $v] ?></textarea>        
                                </div>
                                <br />
                                <?php if($_REQUEST['type'] == 'gioi-thieu'){?>
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
                                <?php } ?>
                            </div>
                            <?php  } ?>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </section>
    <button type="submit" class="btn btn-success mr-1">
        <i class="icon-check2"></i> Lưu
    </button>
</form>    
<div class="clearfix"></div>

