<?php
    $com = $_REQUEST['com']; 
    $type = $_REQUEST['type'];
    $type1 = $_REQUEST['type1'];
?>
<!-- main menu-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-light menu-accordion menu-shadow">
      <!-- main menu header-->
      <!-- <div class="main-menu-header">
        <input type="text" placeholder="Search" class="menu-search form-control round"/>
      </div> -->
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content mt-2">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class=" nav-item"><a href="#"><i class="icon-product-hunt"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Quản lý Sản phẩm</span></a>
                <ul class="menu-content">
           
                <?php for ($i = 1; $i <= $level; $i++) { ?>    
                    <li <?php if($com == 'product' && $type1 == 'san-pham' && $type == $i){?> class="active" <?php } ?> >
                        <a href="index.php?com=product&act=man_list&type=<?= $i ?>&type1=san-pham" data-i18n="nav.menu_levels.second_level" class="menu-item">Danh mục cấp <?= $i ?></a>
                    </li>
                <?php } ?>  
                    <li <?php if($com == 'product' && $type == 'san-pham'){?> class="active" <?php } ?> ><a href="index.php?com=product&act=man&type=san-pham">Sản phẩm</a></li>
                <?php for ($i = 1; $i <= $level1; $i++) { ?>    
                   <!--  <li <?php if($com == 'product' && $type1 == 'thuong-hieu' && $type == $i){?> class="active" <?php } ?> >
                        <a href="index.php?com=product&act=man_list&type=2&type1=thuong-hieu" data-i18n="nav.menu_levels.second_level" class="menu-item">Thương hiệu</a>
                    </li> -->
                <?php } ?> 
                    <!-- <li <?php if($com == 'icon' && $type == 'thuonghieu'){?> class="active" <?php } ?> ><a href="index.php?com=icon&act=man&type=thuonghieu">Thương hiệu sản phẩm</a></li> -->
                    <!-- <li <?php if($com == 'icon' && $type == 'gia'){?> class="active" <?php } ?> ><a href="index.php?com=icon&act=man&type=gia">Update Giá</a></li> -->
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="icon-shopping-bag"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Quản lý Đơn hàng</span></a>
                <ul class="menu-content">
                 
                    <li <?php if($com == 'order'){?> class="active" <?php } ?>><a href="index.php?com=order&act=man">Thống kê đơn hàng</a></li>
                    <li><a <?php if($com == 'time' && $_REQUEST['type'] == 'nhan-hang'){?> class="active" <?php } ?> href="index.php?com=time&act=capnhat&type=nhan-hang">TT Đơn hàng</a></li>
                    <li><a <?php if($com == 'time' && $_REQUEST['type'] == 'noi-dia'){?> class="active" <?php } ?> href="index.php?com=time&act=capnhat&type=noi-dia">TT Đặt hàng</a></li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="icon-book2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Dự án đã thi công</span></a>
                <ul class="menu-content">
                    <li <?php if($com == 'product' && $type == 'thicong'){?> class="active" <?php } ?> ><a href="index.php?com=product&act=man&type=thicong">Bài viết dự án</a></li>
                </ul>
            </li>
            <!-- <li class=" nav-item"><a href="#"><i class="icon-book2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Chi nhánh</span></a>
                <ul class="menu-content">
                    <li <?php if($com == 'icon' && $type == 'chinhanh'){?> class="active" <?php } ?> ><a href="index.php?com=icon&act=man&type=chinhanh">Quản lý chi nhánh</a></li>
                </ul>
            </li> -->
            <li class=" nav-item"><a href="#"><i class="icon-paste2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Quản lý Bài viết</span></a>
                <ul class="menu-content">
                    <li <?php if($com == 'time' && $type == 'gioi-thieu'){?> class="active" <?php } ?> ><a href="index.php?com=time&act=capnhat&type=gioi-thieu">Bài viết giới thiệu</a></li>
                    <li><a <?php if($com == 'time' && $_REQUEST['type'] == 'noi-dia'){?> class="active" <?php } ?> href="index.php?com=time&act=capnhat&type=trang-chu">Bài viết trang chủ</a></li>
                    <li <?php if($com == 'product' && $type == 'chinhsach'){?> class="active" <?php } ?> ><a href="index.php?com=product&act=man&type=chinhsach">Bài viết chính sách</a></li>
                    <li <?php if($com == 'product' && $type == 'duongdan'){?> class="active" <?php } ?> ><a href="index.php?com=product&act=man&type=duongdan">Bài viết hướng dẫn</a></li>
                    <?php for ($i = 1; $i <= $level1; $i++) { ?>    
                        <!-- <li <?php if($com == 'product' && $type1 == 'news' && $type == $i){?> class="active" <?php } ?> >
                            <a href="index.php?com=product&act=man_list&type=<?= $i ?>&type1=news" data-i18n="nav.menu_levels.second_level" class="menu-item">Danh mục cấp <?= $i ?></a>
                        </li> -->
                    <?php } ?>
                    <li <?php if($com == 'product' && $type == 'news'){?> class="active" <?php } ?> ><a href="index.php?com=product&act=man&type=news">Bài viết chia sẻ</a></li>
                    <!-- <li <?php if($com == 'product' && $type == 'tuyendung'){?> class="active" <?php } ?> ><a href="index.php?com=product&act=man&type=tuyendung">Thông tin tuyển dụng</a></li> -->
                </ul>
            </li>
            
            <!-- <li class=" nav-item"><a href="#"><i class="icon-book2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Quản lý Bài viết</span></a>
                <ul class="menu-content">
                    
                    <li <?php if($com == 'product' && $type == 'hoidap'){?> class="active" <?php } ?> ><a href="index.php?com=product&act=man&type=hoidap">Bài viết hỏi đáp</a></li>
                    
                    
                </ul>
            </li> -->
           
           <!--  <li class=" nav-item"><a href="#"><i class="icon-paste2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Quản lý Dịch vụ</span></a>
                <ul class="menu-content">
                    <?php for ($i = 1; $i <= $level1; $i++) { ?>    
                        <li <?php if($com == 'product' && $type1 == 'dich-vu' && $type == $i){?> class="active" <?php } ?> ><a href="index.php?com=product&act=man_list&type=<?= $i ?>&type1=dich-vu" data-i18n="nav.menu_levels.second_level" class="menu-item">Danh mục cấp <?= $i ?></a>
                                              </li>
                    <?php } ?>  
                    <li <?php if($com == 'product' && $type == 'dich-vu'){?> class="active" <?php } ?> ><a href="index.php?com=product&act=man&type=dich-vu">Bài viết</a></li>
                </ul>
            </li> -->
            

            
            
            <!-- <li class=" nav-item"><a href="#"><i class="icon-user-plus2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Quản lý thành viên</span></a>
                <ul class="menu-content">
                    <li <?php if($com == 'thanhvien'){?> class="active" <?php } ?>><a href="index.php?com=thanhvien&act=man&type=user">Quản lý user</a></li>
                </ul>
            </li> -->

            <li class=" nav-item"><a href="#"><i class="icon-folder-open-o"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Quản lý hình ảnh</span></a>
                <ul class="menu-content">
                    <li <?php if($com == 'bannerqc'){?> class="active" <?php } ?> ><a href="index.php?com=bannerqc&act=capnhat">Hình ảnh Trang chủ</a></li>
                    <li <?php if($com == 'icon' && $type == 'hotro'){?> class="active" <?php } ?> ><a href="index.php?com=icon&act=man&type=hotro">Hình ảnh Hỗ trợ</a></li>
                    <li <?php if($com == 'icon' && $type == 'header'){?> class="active" <?php } ?> ><a href="index.php?com=icon&act=man&type=header">MXH Header</a></li>
                    <!--  -->
                    <li <?php if($com == 'icon' && $type == 'footer'){?> class="active" <?php } ?> ><a href="index.php?com=icon&act=man&type=footer">MXH Footer</a></li>
                    <!-- <li <?php if($com == 'icon' && $type == 'doitac'){?> class="active" <?php } ?> ><a href="index.php?com=icon&act=man&type=doitac">Hình ảnh Đối tác</a></li> -->
                    <li <?php if($com == 'icon' && $type == 'slider'){?> class="active" <?php } ?> ><a href="index.php?com=icon&act=man&type=slider">Hình ảnh Slider</a></li>
                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="icon-cog2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Quản lý thiết lập</span></a>
                <ul class="menu-content">
                 
                    <li <?php if($com == 'lienhe'){?> class="active" <?php } ?>><a href="index.php?com=lienhe&act=capnhat">Thông tin liên hệ</a></li>
                    <!-- <li <?php if($com == 'icon' && $type == 'diachi'){?> class="active" <?php } ?> ><a href="index.php?com=icon&act=man&type=diachi">Quản lý địa chỉ</a></li> -->
                    <li <?php if($com == 'footer'){?> class="active" <?php } ?>><a href="index.php?com=footer&act=capnhat">Thông tin footer</a></li>
                    <li <?php if($com == 'setting'){?> class="active" <?php } ?>><a href="index.php?com=setting&act=capnhat">Thiết lập website</a></li>
                </ul>
            </li>
        </ul>
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->