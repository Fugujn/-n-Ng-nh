<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Liên hệ từ khách hàng</h2>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
               
                <a href="#" class="btn btn-success "><i class="icon-pencil3"></i> &nbsp;Danh sách</a>

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
                                <th>Tên</th>
                                <th>Điện thoại</th>
                                <th>Email</th>
                                <th>Tiêu đề</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php for ($i = 0, $count = count($items); $i < $count; $i++){ ?>
                        <tr>   
                            <td>
                                <input type="checkbox" class="css-checkbox med chon" name="chon" id="chon_<?= $items[$i]['id'] ?>" value="<?= $items[$i]['id'] ?>" />
                                <label for="chon_<?= $items[$i]['id'] ?>" name="chon" class="css-label med elegant"></label>
                            </td>
                            <td><?= $i + 1 ?></td>
                            <td>
                                <a href="index.php?com=dknhantin&act=edit_cat&id=<?= $items[$i]['id'] ?>&curPage=<?= $_REQUEST['curPage'] ?>" style="color:#515151;">
                                <?= $items[$i]['ten_en'] ?> 
                                </a>
                                <?php if ($items[$i]['hienthi'] == 0 && $items[$i]['type'] == 1) { ?>
                                    <span class="tag tag-pill tag-default tag-info tag-default">New</span>
                                <?php } ?>
                            </td>
                            <td> <?= $items[$i]['dienthoai'] ?></td>
                            <td>
                            <?= $items[$i]['email'] ?>
                            </td>
                            <td>
                                <a><?= $items[$i]['tieude'] ?></a>    
                            </td>
                            <td style="width:5%;"><a href="index.php?com=dknhantin&act=edit_cat&id=<?= $items[$i]['id'] ?>&curPage=<?= $_REQUEST['curPage'] ?>"><i class="icon-sliders" style='font-size: 1.4rem;color:#55595c'></i></a></td>
                            <td style="width:5%;">
                               <a href="index.php?com=dknhantin&act=delete_cat&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
                                    return false;"><i class="icon-trash-o" style='font-size: 1.4rem;color:#55595c'></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    <!---------End class card----------->
    </div>
</div>
<div class="clearfix"></div>
<a class="btn btn-danger" href="#" id="xoahet_lhkh"><i class="icon-trash-o"></i> &nbsp;Xóa tất cả</a>

<div class="clearfix"></div>
<!-- Striped rows end -->
<nav aria-label="Page navigation" style="text-align: center;">
    <ul class="pagination pagination-sm">
    <?= $paging['paging'] ?>
    </ul>
</nav>