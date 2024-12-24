<?php if($_REQUEST['type'] == 'gia') { ?>
    <?php
    if ($_FILES['filethongso']['tmp_name']) {
        $file_name = explode('.',$_FILES['filethongso']['name']);
        if ($file = upload_image("filethongso", 'pdf|doc|docx|xls|xlsx|rar|zip|PDF|DOC|DOCX|XLS|XLSX|RAR|ZIP', _upload_excel, $file_name[0])) {
            //Include thư viện PHPExcel_IOFactory vào
            include 'classes/PHPExcel/IOFactory.php';
             
            $inputFileName = 'exel/import/'.$_FILES['filethongso']['name'];
             
            //  Tiến hành đọc file excel
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Lỗi không thể đọc file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
             
            //  Lấy thông tin cơ bản của file excel
             
            // Lấy sheet hiện tại
            $sheet = $objPHPExcel->getSheet(0); 
             
            // Lấy tổng số dòng của file, trong trường hợp này là 6 dòng
            $highestRow = $sheet->getHighestRow(); 
             
            // Lấy tổng số cột của file, trong trường hợp này là 4 dòng
            $highestColumn = $sheet->getHighestColumn();
             
            // Khai báo mảng $rowData chứa dữ liệu
             
            //  Thực hiện việc lặp qua từng dòng của file, để lấy thông tin
            for ($row = 2; $row <= $highestRow; $row++){ 
                // Lấy dữ liệu từng dòng và đưa vào mảng $rowData
                $rowData[] = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE,FALSE);
            }

            //In dữ liệu của mảng

            foreach ($rowData as $key => $value) {
                // print_r($key);
                foreach ($value as $k => $v) {

                    if($v[0] == ''){
                        $data_import['masp'] = '';
                    } else {
                        $data_import['masp'] = addslashes($v[0]);
                    }

                    if($v[1] == ''){
                        $data_import['gia'] = '';
                    } else {
                        $data_import['gia'] = addslashes($v[1]);
                    }

                    if($v[2] == ''){
                        $data_import['giakm'] = '';
                    } else {
                        $data_import['giakm'] = addslashes($v[2]);
                    }

                    $ma_sp = $v[0];
                    $d->reset();
                    $sql = "select * from #_product where hienthi = 1 and type = 'san-pham' and masp = '".$ma_sp."'";
                    $d->query($sql);
                    $checktrungsp = $d->result_array();
                    if($v[0] != ''){
                        if(count($checktrungsp) > 0){

                            $data_update['gia'] = addslashes($v[1]);
                            $data_update['giakm'] = addslashes($v[2]);

                            $d->setTable('product');
                            $d->setWhere('masp', $ma_sp);
                            $d->update($data_update);
                        } else {
                            alert('Mã sản phẩm chưa tồn tại');
                        }
                    }
                }
            }   
            alert('Import dữ liệu thành công');
            redirect("index.php?com=icon&act=man&type=gia");    
        }
    }
    ?>
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8" style="margin-top: 20px;margin-bottom: 20px;background: #f2f2f2;padding-top: 20px;">
        <form name="frm" method="post" enctype="multipart/form-data" class="nhaplieu" id="mediaprintan">
            <table class="bordered" style="float:left">
                <tbody>
                    <tr class="them">
                        <td>
                            <b style="margin-left:10px;height: auto;width: auto;">Update Giá (upload .xlsx)</b>
                            <input type="file" name="filethongso" value="" placeholder="Nhập file xml">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style="float:right;margin-top:-5px">
                <input type="submit"  value="Tải lên" class="btn btn-success" id="printbutton" />
            </div>
        </form>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="margin-top: 20px;margin-bottom: 20px;background: #f2f2f2;padding-top: 20px;">
        <p style="float:left;">
            <a href="exel/import/dataorder.xlsx" style="padding:10px 30px;background: #37BC9B;color:white;font-size: 14px;border-radius: 5px;">Tải file mẫu</a>
        </p>
    </div>
<?php } else { ?>

    <div class="content-header row">
      <div class="content-header-left col-md-6 col-xs-12 mb-1">
        <h2 class="content-header-title">Quản lý thông tin</h2>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                   
                    <a href="index.php?com=icon&act=add&type=<?= $_REQUEST["type"] ?>" class="btn btn-success "><i class="icon-pencil3"></i> &nbsp;Thêm mới</a>

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
                                    <th>
                                        <input type="checkbox" name="chonhet" id="chonhet" class="css-checkbox med"/>
                                        <label for="chonhet" name="chonhet_lbl" class="css-label med elegant"></label>
                                    </th>
                                    <th>Stt</th>
                                    <?php if($_REQUEST['type'] != 'chinhanh'){?>
                                    <th>Hình ảnh</th>
                                    <?php } ?>
                                    <th>Tên</th>
                                    <?php if($_REQUEST['type'] != 'chinhanh'){?>
                                    <th>Link</th>
                                    <?php } ?>
                                    <!-- <th>Nổi bật</th> -->
                                    <th>Hiển thị</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
                                <tr>
                                    <td style="width:5%;">
                                        <input type="checkbox" class="css-checkbox med chon" name="chon" id="chon_<?= $items[$i]['id'] ?>" value="<?= $items[$i]['id'] ?>" />
                                        <label for="chon_<?= $items[$i]['id'] ?>" name="chon" class="css-label med elegant"></label>
                                    </td>
                                    <td style="width:5%;"><?= $items[$i]['stt'] ?></td>
                                    <?php if($_REQUEST['type'] != 'chinhanh'){?>
                                    <td style="width:20%;"><img src="<?= _upload_icon . $items[$i]['photo'] ?>" alt="image" style="max-height:  70px;max-width: 100px;"></td>
                                    <?php } ?>
                                    <td style="width:15%;"><?= $items[$i]['ten_vi'] ?></td>
                                    <?php if($_REQUEST['type'] != 'chinhanh'){?>
                                    <td style="width:20%;"><?= $items[$i]['url'] ?>
                                        <?php if($_REQUEST['type'] =='slider'){?>
                                          <!--  <br>Link video : <?= $items[$i]['urlvideo'] ?> -->
                                        <?php } ?>
                                    </td>
                                    <?php } ?>
                                    <!-- <td style="width:7%;">
                                    <?php if ($items[$i]['noibat'] == 1){?>
                                        <button id="noibat<?= $items[$i]['id'] ?>" type="button" class="btn btn-sm btn-success switch-input" onclick="initSwitch('noibat','icon',<?= $items[$i]['id'] ?>)">ON</button>
                                    <?php }else{ ?>
                                        <button id="noibat<?= $items[$i]['id'] ?>" type="button" class="btn btn-sm btn-danger switch-input" onclick="initSwitch('noibat','icon',<?= $items[$i]['id'] ?>)">OFF</button>
                                    <?php } ?>
                                        
                                    </td> -->
                                    <td style="width:15%;">
                                    <?php if ($items[$i]['hienthi'] == 1){?>
                                        <button id="hienthi<?= $items[$i]['id'] ?>" type="button" class="btn btn-sm btn-success switch-input" onclick="initSwitch('hienthi','icon',<?= $items[$i]['id'] ?>)">ON</button>
                                    <?php }else{ ?>
                                        <button id="hienthi<?= $items[$i]['id'] ?>" type="button" class="btn btn-sm btn-danger switch-input" onclick="initSwitch('hienthi','icon',<?= $items[$i]['id'] ?>)">OFF</button>
                                    <?php } ?>    
                                        <!-- <input class="switch-input spkm" data-com="spkm" data-table="product"  data-id="<?= $items[$i]['id'] ?>" type="checkbox" <?php if ($items[$i]['spkm'] == 1) echo "checked"; ?> data-off-color="warning" data-size="mini"> -->    
                                    </td>
                                    <td style="width:10%;"><a href="index.php?com=icon&act=edit&id=<?= $items[$i]['id'] ?>&type=<?= $_REQUEST["type"] ?>"><i class="icon-sliders" style='font-size: 1.4rem;color:#55595c'></i></a></td>
                                    <td style="width:10%;">
                                        <a style="cursor:pointer;" href="index.php?com=icon&act=delete&id=<?= $items[$i]['id'] ?>&type=<?= $_REQUEST["type"] ?>" onClick="if (!confirm('Xác nhận xóa'))
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
    <!-- <a href="index.php?com=icon&act=add&type=<?= $_REQUEST["type"] ?>" class="btn btn-success "><i class="icon-pencil3"></i> &nbsp;Thêm mới</a> -->

    <a class="btn btn-danger" href="#" id="xoahet_icon"><i class="icon-trash-o"></i> &nbsp;Xóa tất cả</a>

    <div class="clearfix"></div>
    <!-- Striped rows end -->
    <nav aria-label="Page navigation" style="text-align: center;">
        <ul class="pagination pagination-sm">
        <?= $paging['paging'] ?>
        </ul>
    </nav>
<?php } ?>
