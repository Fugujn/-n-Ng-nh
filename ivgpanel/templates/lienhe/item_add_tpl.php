<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Thông tin liên hệ</h2>
  </div>
</div>
<form name="frm" method="post" action="index.php?com=lienhe&act=save" enctype="multipart/form-data" class="form"> 
    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    <button type="submit" class="btn btn-success mr-1">
        <i class="icon-check2"></i> Lưu
    </button>
    <!-- <input type="button" value="<?= _thoat ?>" onclick="javascript:window.location = 'index.php?com=footer&act=capnhat'" class="btn btn-danger" /> -->
<section id="basic-form-layouts" style="margin-top: 20px;">
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
                            <b class="mb-1 display-block">Mô tả chi tiết</b>   
                            <div>    
                                <textarea name="noidung_<?= $v ?>"  class="form-control editor" cols="50" rows="5" id="noidung_<?= $v ?>"><?= @$item['noidung_' . $v] ?></textarea>        
                            </div>
                            <br />
                            
                        </div>
                        <?php  } /*--------End  lang----------*/ ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>    
</section>

</form>
