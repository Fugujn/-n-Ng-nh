<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Quản lý thành viên</h2>
  </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="card ">
            <div class="card-header">
               
                <a href="" class="btn btn-success "><i class="icon-pencil3"></i> &nbsp;Thành viên</a>

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
                            <th style="width:10%;">Stt</th>
                            <th style="width:15%;">Họ tên</th>
                            <th style="width:20%;">Email</th>
                            <th style="width:15%;">Ngày đăng kí</th>
                            <th style="width:15%;">Kích hoạt</th>
                            <th style="width:10%;">Chi tiết</th>
                            <th style="width:10%;">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        for ($i = 0, $count = count($items); $i < $count; $i++) {?>
                            <tr>
                                <td style="width:10%;"><?= $i+1?></td>
                                <td style="width:15%;"><a><?=$items[$i]['name'] ?></a></td>
                                <td style="width:20%;"><?= $items[$i]['user'] ?></td>
                                <td style="width:15%;"><?= make_date($items[$i]['ngaytao']) ?></td>

                                <td style="width:10%;">
                                    <?php if ($items[$i]['hienthi'] == 1){?>
                                    <button id="hienthi<?= $items[$i]['id'] ?>" type="button" class="btn btn-sm btn-success switch-input" onclick="initSwitch('hienthi','member',<?= $items[$i]['id'] ?>)">ON</button>
                                    <?php }else{ ?>
                                        <button id="hienthi<?= $items[$i]['id'] ?>" type="button" class="btn btn-sm btn-danger switch-input" onclick="initSwitch('hienthi','member',<?= $items[$i]['id'] ?>)">OFF</button>
                                    <?php } ?> 
                                </td> 
                               
                                <td style="width:10%;"><a href="index.php?com=thanhvien&act=edit&id=<?= $items[$i]['id'] ?>"><i class="icon-sliders" style='font-size: 1.4rem;color:#55595c'></i></a></td>

                                <td style="width:10%;"><a href="index.php?com=thanhvien&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
                                                return false;"><i class="icon-trash-o" style='font-size: 1.4rem;color:#55595c'></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="clearfix"></div>
<!-- Striped rows end -->
<nav aria-label="Page navigation" style="text-align: center;">
    <ul class="pagination pagination-sm">
    <?= $paging['paging'] ?>
    </ul>
</nav>
