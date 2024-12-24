<style type="text/css">input[type='file'] {opacity:0 }</style>
<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Thiết lập website</h2>
  </div>
</div>

<form name="frm" method="post" action="index.php?com=setting&act=save" enctype="multipart/form-data" class="form">
    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    <button type="submit" class="btn btn-success mr-1">
        <i class="icon-check2"></i> Lưu
    </button>
    <!-- <button type="button" class="btn btn-warning " onclick="javascript:window.location = 'index.php?com=setting&act=capnhat'">
        <i class="icon-cross2"></i> Thoát
    </button> -->
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
                            <div id="heading1" class="card-footer" style="background:#38BD9C">
                                <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#accordion1" aria-expanded="true" aria-controls="accordion1" class="card-title lead display-block" style="margin-bottom: 0px;font-size: 16px;color:#fff;">Favicon <i class="icon-angle-down" style="float: right;"></i></a>
                            </div>
                            <div id="accordion1" role="tabpanel" aria-labelledby="heading1" class="card-collapse collapse in" aria-expanded="true">
                                <div class="card-body">
                                    <div class="card-block">
                                       <div class="" style="padding:5px;border:1px dashed #8C949A;box-sizing: border-box;position: relative;border-radius: 5px;text-align: center">
                                            <img id="imageview" style="max-width: 200px;height: auto;" src="<?= _upload_hinhanh . $item['fav'] ?>" onerror="this.src='media/images/no-image.jpg';"/>
                                            <input style="padding:5px;position: absolute;bottom:0px;left:0px;width: 100%;height: 100%;cursor: pointer;" type="file" name="file" id="i_img" onchange="loadFile(event)" />
                                        </div>
                                        <div class="alert alert-warning no-border mb-2 mt-2" role="alert">
                                            <strong>Loại file  : </strong> .png <br>
                                            <strong>Kích thước : </strong> width: 50px - height: 50px
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="heading4"  class="card-footer" style="background:#38BD9C">
                                <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#accordion4" aria-expanded="false" aria-controls="accordion4" class="card-title lead collapsed display-block" style="margin-bottom: 0px;font-size: 16px;color:#fff;">Thông tin chung<i class="icon-angle-down" style="float: right;"></i></a>
                            </div>
                            <div id="accordion4" role="tabpanel" aria-labelledby="heading4" class="card-collapse collapse" aria-expanded="false">
                                <div class="card-body">
                                    <div class="card-block">
                                
                                        <b class="mb-1 display-block">Điên thoại</b> <input type="text" name="dienthoai_vi" value="<?= $item['dienthoai_vi'] ?>" class="form-control input txt" /><br />
                                        <b class="mb-1 display-block">Hotline:</b> <input type="text" name="hotline" value="<?= @$item['hotline'] ?>" class="form-control input" /><br /><br>
                                        <b class="mb-1 display-block">Website:</b> <input type="text" name="website" value="<?= @$item['website'] ?>" class="form-control input" /><br /><br>  
                                        <b class="mb-1 display-block">Email công ty:</b> <input type="text" name="google" value="<?= @$item['google'] ?>" class="form-control input" /><br /><br>
                                        <b class="mb-1 display-block">Email nhận tin:</b> <input type="text" name="email" value="<?= @$item['email'] ?>" class="form-control input" /><br /><br>
                                        
                                        <b class="mb-1 display-block">Facebook:</b> <input type="text" name="facebook" value="<?= @$item['facebook'] ?>" class="form-control input" /><br /><br>
                                        <b class="mb-1 display-block">Link Fanpage:</b> <input type="text" name="video" value="<?= @$item['video'] ?>" class="form-control input" /><br /><br>
                                    </div>
                                </div>
                            </div>
                            <div id="heading2"  class="card-footer" style="background:#38BD9C">
                                <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#accordion2" aria-expanded="false" aria-controls="accordion2" class="card-title lead collapsed display-block" style="margin-bottom: 0px;font-size: 16px;color:#fff;">Mã nhúng <i class="icon-angle-down" style="float: right;"></i></a>
                            </div>
                            <div id="accordion2" role="tabpanel" aria-labelledby="heading2" class="card-collapse collapse" aria-expanded="false">
                                <div class="card-body">
                                    <div class="card-block">
                                        <b class="mb-1 display-block">Nhúng thẻ < head >  </b>
                                        <div>    
                                            <textarea name="livechat"  class="form-control " cols="50" rows="5" id="livechat"><?= @$item['livechat'] ?></textarea>        
                                        </div><br />
                                        <b class="mb-1 display-block">Nhúng thẻ < body >  </b>
                                        <div>    
                                            <textarea name="gg"  class="form-control " cols="50" rows="5" id="gg"><?= @$item['gg'] ?></textarea>        
                                        </div><br />
                                        <b class="mb-1 display-block">Nhúng bản đồ  </b>
                                        <div>    
                                            <textarea name="map"  class="form-control " cols="50" rows="5" id="map"><?= @$item['map'] ?></textarea>        
                                        </div><br />
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
                            <b class="mb-1 display-block">Tên công ty</b> 
                            <input type="text" name="ten_<?= $v ?>" value="<?= $item['ten_' . $v] ?>" class="form-control input"/><br />
                            <b class="mb-1 display-block">Địa chỉ </b> 
                            <input type="text" name="diachi_<?= $v ?>" value="<?= $item['diachi_' . $v] ?>" class="form-control input"/><br />
                            <!-- <b class="mb-1 display-block">Thời gian mở cửa </b> 
                            <input type="text" name="fax_<?= $v ?>" value="<?= $item['fax_' . $v] ?>" class="form-control input"/><br /> -->

                            <!-- <b class="mb-1 display-block">Địa chỉ 2</b> 
                            <input type="text" name="diachi1_<?= $v ?>" value="<?= $item['diachi1_' . $v] ?>" class="form-control input"/><br /> -->
                            
                            <b class="mb-1 display-block" style="color:red">Thông tin SEO</b>  
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <b class="mb-1 display-block">Thẻ H1</b> 
                                <input type="text" name="h1_<?= $v ?>" value="<?= $item['h1_' . $v] ?>" class="form-control input txt" /><br />

                                <b class="mb-1 display-block">Thẻ H2</b> 
                                <input type="text" name="h2_<?= $v ?>" value="<?= $item['h2_' . $v] ?>" class="form-control input txt" /><br />

                                <b class="mb-1 display-block">Thẻ H3</b> 
                                <input type="text" name="h3_<?= $v ?>" value="<?= $item['h3_' . $v] ?>" class="form-control input txt" /><br />
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <b class="mb-1 display-block">Thẻ H4</b> 
                                <input type="text" name="h4_<?= $v ?>" value="<?= $item['h4_' . $v] ?>" class="form-control input txt" /><br />

                                <b class="mb-1 display-block">Thẻ H5</b> 
                                <input type="text" name="h5_<?= $v ?>" value="<?= $item['h5_' . $v] ?>" class="form-control input txt" /><br />

                                <b class="mb-1 display-block">Thẻ H6</b> 
                                <input type="text" name="h6_<?= $v ?>" value="<?= $item['h6_' . $v] ?>" class="form-control input txt" /><br />
                            </div>
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
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>

</form>