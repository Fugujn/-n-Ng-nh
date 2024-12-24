<style type="text/css">input[type='file'] {opacity:0 }</style>
<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Quản lý trang chủ</h2>
  </div>
</div>
<form name="frm" method="post" action="index.php?com=bannerqc&act=save" enctype="multipart/form-data" class="form"> 
   
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

                        <div class="card-block">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <b class="mb-1 display-block">Logo</b> 
                                    <div class="" style="padding:5px;border:1px dashed #8C949A;box-sizing: border-box;position: relative;border-radius: 5px;text-align: center">
                                        <img id="imageview" style="max-width: 200px;height: auto;" src="<?= _upload_hinhanh . $item['logo'] ?>" onerror="this.src='media/images/no-image.jpg';"/>
                                        <input style="padding:5px;position: absolute;bottom:0px;left:0px;width: 100%;height: 100%;cursor: pointer;" type="file" name="file" id="i_img" onchange="loadFile(event)" />
                                    </div>
                                    <div class="alert alert-warning no-border mb-2 mt-2" role="alert">
                                        <strong>Loại file  : </strong> .png / .jpg /.gif <br>
                                        <!-- <strong>Kích thước : </strong> width: 155px - height: 110px -->
                                    </div>

                                </div>
                                <div class="clearfix"></div>
                                <b class="mb-1 display-block">Mô tả chữ chạy</b>   
                              
                                <input type="text" name="text1_vi" value="<?= @$item['text1_vi'] ?>" class="form-control input" />
                                <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <b class="mb-1 display-block">Background trang trong</b> 
                                    <div class="" style="padding:5px;border:1px dashed #8C949A;box-sizing: border-box;position: relative;border-radius: 5px;text-align: center;background: #f2f2f2;">
                                        <img id="imageview1" style="max-width: 200px;height: auto;" src="<?= _upload_hinhanh . $item['photo1'] ?>" onerror="this.src='media/images/no-image.jpg';"/>
                                        <input style="padding:5px;position: absolute;bottom:0px;left:0px;width: 100%;height: 100%;cursor: pointer;" type="file" name="file1" id="i_img" onchange="loadFile1(event)" />
                                    </div>
                                    <div class="alert alert-warning no-border mb-2 mt-2" role="alert">
                                        <strong>Loại file  : </strong> .png / .jpg /.gif <br>
                                        <strong>Kích thước : </strong> width: 580px - height: 160px <br>
                                        <strong>Link : </strong><input type="text" name="link1" value="<?= $item['link1'] ?>" class="form-control input">
                                    </div>
                                    
                                </div> -->
                            <div class="clearfix"></div>
                                <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <b class="mb-1 display-block">Quảng cáo 1</b> 
                                    <div class="" style="padding:5px;border:1px dashed #8C949A;box-sizing: border-box;position: relative;border-radius: 5px;text-align: center">
                                        <img id="imageview2" style="max-width: 200px;height: auto;" src="<?= _upload_hinhanh . $item['photo2'] ?>" onerror="this.src='media/images/no-image.jpg';"/>
                                        <input style="padding:5px;position: absolute;bottom:0px;left:0px;width: 100%;height: 100%;cursor: pointer;" type="file" name="file2" id="i_img" onchange="loadFile2(event)" />
                                    </div>
                                    <div class="alert alert-warning no-border mb-2 mt-2" role="alert">
                                        <strong>Loại file  : </strong> .png / .jpg /.gif <br>
                                        <strong>Kích thước : </strong> width: 580px - height: 160px <br>
                                        <strong>Link: </strong><input type="text" name="link2" value="<?= $item['link2'] ?>" class="form-control input">
                                    </div>
                                </div> -->

                                <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <b class="mb-1 display-block">Quảng cáo 2</b> 
                                    <div class="" style="padding:5px;border:1px dashed #8C949A;box-sizing: border-box;position: relative;border-radius: 5px;text-align: center">
                                        <img id="imageview3" style="max-width: 200px;height: auto;" src="<?= _upload_hinhanh . $item['photo3'] ?>" onerror="this.src='media/images/no-image.jpg';"/>
                                        <input style="padding:5px;position: absolute;bottom:0px;left:0px;width: 100%;height: 100%;cursor: pointer;" type="file" name="file3" id="i_img" onchange="loadFile3(event)" />
                                    </div>
                                    <div class="alert alert-warning no-border mb-2 mt-2" role="alert">
                                        <strong>Loại file  : </strong> .png / .jpg /.gif <br>
                                        <strong>Kích thước : </strong> width:365px - height: 160px <br>
                                        <strong>Link : </strong><input type="text" name="link3" value="<?= $item['link3'] ?>" class="form-control input">
                                    </div>
                                </div> -->

                                <div class="clearfix"></div>
                                
                                <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <b class="mb-1 display-block">Quảng cáo 3</b> 
                                    <div class="" style="padding:5px;border:1px dashed #8C949A;box-sizing: border-box;position: relative;border-radius: 5px;text-align: center">
                                        <img id="imageview4" style="max-width: 200px;height: auto;" src="<?= _upload_hinhanh . $item['photo4'] ?>" onerror="this.src='media/images/no-image.jpg';"/>
                                        <input style="padding:5px;position: absolute;bottom:0px;left:0px;width: 100%;height: 100%;cursor: pointer;" type="file" name="file4" id="i_img" onchange="loadFile4(event)" />
                                    </div>
                                    <div class="alert alert-warning no-border mb-2 mt-2" role="alert">
                                        <strong>Loại file  : </strong> .png / .jpg /.gif <br>
                                        <strong>Kích thước : </strong> width: 180px - height: 180px <br>
                                        <strong>Link: </strong><input type="text" name="link4" value="<?= $item['link4'] ?>" class="form-control input">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <b class="mb-1 display-block">Quảng cáo 4</b> 
                                    <div class="" style="padding:5px;border:1px dashed #8C949A;box-sizing: border-box;position: relative;border-radius: 5px;text-align: center">
                                        <img id="imageview5" style="max-width: 200px;height: auto;" src="<?= _upload_hinhanh . $item['photo5'] ?>" onerror="this.src='media/images/no-image.jpg';"/>
                                        <input style="padding:5px;position: absolute;bottom:0px;left:0px;width: 100%;height: 100%;cursor: pointer;" type="file" name="file5" id="i_img" onchange="loadFile5(event)" />
                                    </div>
                                    <div class="alert alert-warning no-border mb-2 mt-2" role="alert">
                                        <strong>Loại file  : </strong> .png / .jpg /.gif <br>
                                        <strong>Kích thước : </strong> width:180px - height: 180px <br>
                                        <strong>Link : </strong><input type="text" name="link5" value="<?= $item['link5'] ?>" class="form-control input">
                                    </div>
                                </div> -->

                                <div class="clearfix"></div>
                                
                                <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <b class="mb-1 display-block">Quảng cáo 5</b> 
                                    <div class="" style="padding:5px;border:1px dashed #8C949A;box-sizing: border-box;position: relative;border-radius: 5px;text-align: center">
                                        <img id="imageview6" style="max-width: 200px;height: auto;" src="<?= _upload_hinhanh . $item['photo6'] ?>" onerror="this.src='media/images/no-image.jpg';"/>
                                        <input style="padding:5px;position: absolute;bottom:0px;left:0px;width: 100%;height: 100%;cursor: pointer;" type="file" name="file6" id="i_img" onchange="loadFile6(event)" />
                                    </div>
                                    <div class="alert alert-warning no-border mb-2 mt-2" role="alert">
                                        <strong>Loại file  : </strong> .png / .jpg /.gif <br>
                                        <strong>Kích thước : </strong> width: 180px - height: 180px <br>
                                        <strong>Link: </strong><input type="text" name="link6" value="<?= $item['link6'] ?>" class="form-control input">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <b class="mb-1 display-block">Quảng cáo 6</b> 
                                    <div class="" style="padding:5px;border:1px dashed #8C949A;box-sizing: border-box;position: relative;border-radius: 5px;text-align: center">
                                        <img id="imageview7" style="max-width: 200px;height: auto;" src="<?= _upload_hinhanh . $item['photo7'] ?>" onerror="this.src='media/images/no-image.jpg';"/>
                                        <input style="padding:5px;position: absolute;bottom:0px;left:0px;width: 100%;height: 100%;cursor: pointer;" type="file" name="file7" id="i_img" onchange="loadFile7(event)" />
                                    </div>
                                    <div class="alert alert-warning no-border mb-2 mt-2" role="alert">
                                        <strong>Loại file  : </strong> .png / .jpg /.gif <br>
                                        <strong>Kích thước : </strong> width:180px - height: 180px <br>
                                        <strong>Link : </strong><input type="text" name="link7" value="<?= $item['link7'] ?>" class="form-control input">
                                    </div>
                                </div> -->

                            </div>
                        </div>

                        <!-- <ul class="nav nav-tabs mt-1 pl-1">
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
                                <b class="mb-1 display-block">Mô tả 1</b>   
                              
                                <input type="text" name="text1_<?= $v ?>" value="<?= @$item['text1_' . $v] ?>" class="form-control input" />    
                                <br>
                                <b class="mb-1 display-block">Mô tả 2</b>   
                                   
                                <input type="text" name="text2_<?= $v ?>" value="<?= @$item['text2_' . $v] ?>" class="form-control input" /> <br>
                                <b class="mb-1 display-block">Mô tả 3</b>   
                                   
                                <input type="text" name="text3_<?= $v ?>" value="<?= @$item['text3_' . $v] ?>" class="form-control input" />
                                <br>
                            </div>
                            <?php  } ?>
                        </div> -->
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