<?php

if (!defined('_source'))
    die("Error");




if($_SESSION['sapxep']['sapxepstt'] == ''){
    $sapxeppro = 'order by stt, ngaytao desc';
}
if($_SESSION['sapxep']['sapxepstt'] == 'sx1'){
    $sapxeppro = 'order by noibat desc';
}
if($_SESSION['sapxep']['sapxepstt'] == 'sx2'){
    $sapxeppro = 'order by ngaytao desc';
}
if($_SESSION['sapxep']['sapxepstt'] == 'sx3'){
    $sapxeppro = 'order by gia';
}
if($_SESSION['sapxep']['sapxepstt'] == 'sx4'){
    $sapxeppro = 'order by gia desc';
}



if ($tenkhongdau_p != '') {
    $typedetail = 'yes';
    $d->reset();
    $sql_detail = "select title_$lang as title,keywords_$lang as keywords,description_$lang as description,id_list,id,photo,photo_phu,thumb,thumb1,ten_$lang as ten,loai,tenkhongdau,spmuakem,noibat,spbc,gia,giakm,noidung_$lang as noidung,luotxem, list_id,mota_$lang as mota,masp,id_item, h1, h2, h3,chanmay,sdt,rong,rate,luot_rate,trongluong,cao,chietkhau,thuonghieu,trangthai,phantramgiam,point,type,id_size,id_topping,ten_video from #_product where hienthi=1 and tenkhongdau='" . $tenkhongdau_p . "'";
    $d->query($sql_detail);
    $row_detail = $d->fetch_array();

    $d->query("select * from #_product_list where id='" . $row_detail['id_list'] . "' and type = '".$type."'");
    $rs_menu_photo = $d->fetch_array();

    $d->query("select * from #_product_list where id='" . $row_detail['id_item'] . "' and type = '".$type."'");
    $rs_menu2_photo = $d->fetch_array();

    $anhquangcao = 'upload/product/'.$rs_menu_photo['avata'];
    $linkquangcao = $rs_menu_photo['link'];
    $kieu_sanpham = $rs_menu_photo['loai'];
    $tendanhmuc_cap1 = $rs_menu_photo['id'];
    $tenkhongdau_check = $rs_menu2_photo['tenkhongdau'];

    $id = $row_detail['id'];
    # Cap nhat so lan xem
    $sql_lanxem = "UPDATE #_product SET luotxem=luotxem+1  WHERE id ='" . $id . "'";
    $d->query($sql_lanxem);

    $title_bar = $row_detail['ten'] . ' - ';
    $title_custom = $row_detail['title'];
    $keywords_custom = $row_detail['keywords'];
    $description_custom = $row_detail['description'];

    // break crumb
   
    $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>".change_lang('Trang chủ','Home','Casa')." </a> <span style='padding:0px 5px;color:#fff'><i class='fa fa-angle-right'></i></span>";

    $arrsp = explode(",", $row_detail["list_id"]);
    $d->query("select tenkhongdau, ten_vi,ten_en, id from #_product_list where id='" . $row_detail["id_item"] . "'");
    $rsnew = $d->fetch_array();
    $danhmuc = $rsnew["id"];
    foreach ($arrsp as $k => $v) {
        $d->query("select tenkhongdau, ten_vi,ten_en, id from #_product_list where id='" . $v . "'");
        $rs = $d->fetch_array();
        
        if ($k == 0) {
            $dmc1 = $rs['ten_vi'];
        } else {
            $dmc1 .= ' - ' . $rs['ten_vi'];
        }
        if($type == 'san-pham'){
            $breakcrumb.='<a style="color:#fff;text-decoration:none" href="' . $rs["tenkhongdau"].'" </span> ' . $rs["ten_" . $lang] . '</a> <span style="padding:0px 5px;color:#fff"> <i class="fa fa-angle-right"></i> </span>';
        }elseif($type == 'news'){
            $breakcrumb.='<a style="color:#fff;text-decoration:none" href="tin-tuc.html" </span> Tin tức</a> <span style="padding:0px 5px;color:#fff"> <i class="fa fa-angle-right"></i> </span>';
        }elseif($type == 'sales'){
            $breakcrumb.='<a style="color:#fff;text-decoration:none" href="khuyen-mai.html" </span> Khuyến mãi</a> <span style="padding:0px 5px;color:#fff"> <i class="fa fa-angle-right"></i> </span>';
        }else{
            $breakcrumb.='<a style="color:#fff;text-decoration:none"> </span> ' . $rs["ten_" . $lang] . '</a> <span style="padding:0px 5px;color:#fff;"> <i class="fa fa-angle-right"></i> </span>';
        }
    }
    $breakcrumb.= "<a style='color:#fff'>".$row_detail["ten"]."</a>";

    $h1_custom = $row_detail['h1'];
    $h2_custom = $row_detail['h2'];
    $h3_custom = $row_detail['h3'];
    //share
    if ($row_detail["photo"] == '') {
        $image_share = 'http://' . $config_url .'/'. _upload_hinhanh_l . $row_photo["logo"];
    } else {
        $image_share = 'http://' . $config_url . '/' . _upload_product_l . $row_detail["photo"];
    }
    $sql_hinhanh = "select photo,thumb,thumb1,id from #_product_hinhanh where hienthi=1 and id_photo = '" . $row_detail['id'] . "' order by stt,id desc";
    $d->query($sql_hinhanh);
    $row_hinhanhsp11 = $d->result_array();

    $sql_tab = "select * from #_product_tab where hienthi=1 and id_photo = '" . $row_detail['id'] . "' order by stt,id asc";
    $d->query($sql_tab);
    $row_tab = $d->result_array();

    $d->reset();
    $sql_sanphamkhac = "select id,thumb,ten_$lang as ten,photo,tenkhongdau,gia,giakm,masp,spbc,spkm,ngaytao,giakm,noibat,mota_$lang as mota, chietkhau,luot_rate,rate,phantramgiam from #_product where hienthi=1  and type ='".$row_detail['type'] ."' and id<>'" . $row_detail['id'] . "' and list_id = '" . $row_detail['list_id'] . "' order by RAND() limit 0,8";
    $d->query($sql_sanphamkhac);
    $sanpham_khac = $d->result_array();


    
    //sản phẩm đã xem
    $flag = 0;

    if (is_array($_SESSION['spxem'])) {
        $max = count($_SESSION['spxem']);

        for ($i = 0; $i < $max; $i++) {
            if ($id == $_SESSION['spxem'][$i]['id']) {
                $flag = 1;
                break;
            }
        }
        if ($flag == 1) {
            
        } else {
            $_SESSION['spxem'][$max]['id'] = $id;
            $_SESSION['spxem'][$max]['ten'] = $row_detail['ten'];
            $_SESSION['spxem'][$max]['tenkhongdau'] = $row_detail['tenkhongdau'];
            $_SESSION['spxem'][$max]['photo'] = $row_detail['photo'];
            $_SESSION['spxem'][$max]['thumb'] = $row_detail['thumb'];
            $_SESSION['spxem'][$max]['gia'] = $row_detail['gia'];
            $_SESSION['spxem'][$max]['giakm'] = $row_detail['giakm'];
        }
    } else {
        $_SESSION['spxem'] = array();
        $_SESSION['spxem'][0]['id'] = $id;
        $_SESSION['spxem'][0]['ten'] = $row_detail['ten'];
        $_SESSION['spxem'][0]['tenkhongdau'] = $row_detail['tenkhongdau'];
        $_SESSION['spxem'][0]['photo'] = $row_detail['photo'];
        $_SESSION['spxem'][0]['thumb'] = $row_detail['thumb'];
        $_SESSION['spxem'][0]['gia'] = $row_detail['gia'];
        $_SESSION['spxem'][0]['giakm'] = $row_detail['giakm'];
    }

    function spxem_exists($id) {
        $id = intval($id);
        $max = count($_SESSION['spxem']);
        $flag = 0;
        for ($i = 0; $i < $max; $i++) {
            if ($id == $_SESSION['spxem'][$i]['id']) {
                $flag = 1;
                break;
            }
        }
        return $flag;
    }

} else if ($tenkhongdau != '') {
 
    $d->query("select ten_$lang as ten,keywords_$lang as keywords,description_$lang as description,id, id_parent, set_level,avata, photo, h1, h2, h3, tenkhongdau, noidung_$lang as noidung,mota_$lang as mota,com from #_product_list where tenkhongdau='" . $tenkhongdau . "' and type = '".$type."'");
    $rs_menu = $d->fetch_array();

    // break crumb
    $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>".change_lang('Trang chủ','Home','Casa')." </a> <span style='padding:0px 5px;color:#fff;'><i class='fa fa-angle-right'></i></span>";

    $d->reset();
    $sql = "select ten_$lang as ten,tenkhongdau,id from #_product_list where com = 1 and id = '".$rs_menu['id_parent']."'";
    $d->query($sql);
    $cap1_remenu = $d->fetch_array();


    $tenkhongdau_fix = $cap1_remenu["tenkhongdau"];
    $tenkhongdau_fix1 = $tenkhongdau;
    $title_fix = $cap1_remenu["ten_vi"];
    $title_fix1 = $rs_menu["ten"];

    $arr = explode("|", $rs_menu["set_level"]);
    foreach ($arr as $v) {
        $d->query("select tenkhongdau, ten_vi, id from #_product_list where id='" . $v . "'");
        $rs = $d->fetch_array();
        if ($rs['id'] != '') {
            $breakcrumb.='<a style="color:#fff" href="' . $rs["tenkhongdau"] . '">' . $rs["ten_vi"] . '</a> <span style="padding:0px 5px"><i class="fa fa-angle-right" style="color:#fff"></i></span>';
        }
    }
    $breakcrumb.= "<a style='color:#fff' href='".$rs_menu["tenkhongdau"]."'>".$rs_menu["ten"]."</a>";
    $keywords_custom = $rs_menu['keywords'];
    $id_product = $rs_menu['id'];
    $description_custom = $rs_menu['description'];
    $h1_custom = $rs_menu['h1'];
    $h2_custom = $rs_menu['h2'];
    $h3_custom = $rs_menu['h3'];
    //share
    if ($row_detail["photo"] == '') {
        $image_share = 'http://' . $config_url .'/'. _upload_hinhanh_l . $row_photo["logo"];
    } else {
        $image_share = 'http://' . $config_url . '/' . _upload_product_l . $rs_menu["photo"];
    }
    //Lấy danh mục cấp con nổi bật

    $d->reset();
    $sql = "select * from #_product_list where find_in_set('" . $rs_menu['id'] . "',set_level)>0 and hienthi=1 and noibat>0 order by stt, id desc";
    $d->query($sql);
    $rs_danhmuc_child = $d->result_array();

    if ($rs_menu["set_level"] != '') {
        $arr = explode("|", $rs_menu["set_level"]);
        $id_list = $arr[0];
    } else {
        $id_list = $rs_menu["id"];
    }

    $title_bar = $rs_menu['ten'] . ' - ';
    $title_tcat = $rs_menu['ten'];

    $maxR = 28;
    $maxP = 4;
    if($_REQUEST['p'] == '' || $_REQUEST['p'] == 1) {
        $idlimit = 0;
        $limit_start = 0;
        $limit_end = $maxR;
    } else {
        $idlimit = $_REQUEST['p'];
        $limit_start = ($idlimit - 1) * $maxR;
        $limit_end = $maxR;
    }

    if($rs_menu['com'] == 1){
        unset($_SESSION['searchf']);
    } 
    
    $search = " ";
    $checkbrands = explode(',',$_SESSION['searchf']['brands']);


    if($checkbrands != ''){
        $checkcount = count($checkbrands) - 1;
        // alert($checkcount);
        if($checkcount == 1){
          $search .= " and thuonghieu = '".$checkbrands[0]."'  ";
        }
        if($checkcount > 1){
          for ($i=0; $i < $checkcount ; $i++) { 
            if($i==0){
              $search .= " and ( thuonghieu = '".$checkbrands[$i]."' ";
            }elseif($i == (count($checkbrands)-1)){
              $search .= " or thuonghieu = '".$checkbrands[$i]."' ";
            }else{
              $search .= " or thuonghieu = '".$checkbrands[$i]."' ";
            }

          }
          $search .= " )"; 
        }
    }
    
    $sql = "select ten_$lang as ten,id,tenkhongdau,thumb,photo,gia,giakm,ngaytao,spbc,spkm,noibat,mota_$lang as mota,giakm,sdt,id_list,id_item,phantramgiam,luot_rate,rate,luotxem,masp from #_product where hienthi=1 and type ='".$type."' and find_in_set('" . $rs_menu['id'] . "',list_id)>0 ".$search." ".$sapxeppro." limit " . $limit_start . "," . $limit_end . "";

    $d->query($sql);
    $product = $d->result_array();

    $sql = "select id from #_product where hienthi=1 and find_in_set('" . $rs_menu['id'] . "',list_id)>0 ".$search." order by id desc";
    $d->query($sql);
    $product_count = $d->result_array();

    $curPage = isset($_GET['p']) ? $_GET['p'] : 1; 
    $url = getCurrentPageURL();
    $paging = paging_home($product_count, $url, $curPage, $maxR, $maxP);
    // $product = $paging['source'];

    
} else {
    if($com == 'san-pham'){

        $title_bar = change_lang('Danh mục','Product','Categorias').' - ';
        $title_tcat = change_lang('Danh mục','Product','Categorias');
        // break crumb
        $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>".change_lang('Home','Home','Casa')."</a> <span style='padding:0px 5px;color:#fff'><i class='fa fa-angle-right'></i></span> <a style='color:#fff'>".change_lang('Danh mục','Product','Categorias')."</a>";
        #share
        $image_share = 'http://' . $config_url .'/'. _upload_hinhanh_l . $row_photo["logo"];

        $sql = "select ten_$lang as ten,id,tenkhongdau,ngaytao,thumb,photo,thumb1,photo1,thumb2 from #_product_list where hienthi=1 and type ='san-pham' and com = 1 order by stt,id desc";
        $d->query($sql);
        $product_list = $d->result_array();
        $sql = "select ten_$lang as ten,mota_$lang as mota,id,tenkhongdau,ngaytao,thumb,photo,gia,giakm from #_product where hienthi=1 and type ='san-pham' order by stt,id desc";
        $d->query($sql);
        $product = $d->result_array();
    }
    /*if($com == 'san-pham'){
        // break crumb
        $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>".change_lang('Trang chủ','Home','Casa')."</a> <span style='padding:0px 5px;color:#fff;'><i class='fa fa-angle-right'></i></span> <a style='color:#fff'>Sản phẩm</a>";
        #share
        $image_share = 'http://' . $config_url . _upload_hinhanh_l . $row_photo["logo"];

        $sql = "select ten_$lang as ten,mota_$lang as mota,id,tenkhongdau,ngaytao,thumb,photo,giakm,gia,phantramgiam from #_product where hienthi=1 and type ='san-pham' order by stt,id desc";
        $d->query($sql);
        $product = $d->result_array();
    }*/
    if($com == 'san-pham-noi-bat'){
        // break crumb
        $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>".change_lang('Trang chủ','Home','Casa')."</a> <span style='padding:0px 5px;color:#fff;'><i class='fa fa-angle-right'></i></span> <a style='color:#fff'>Sản phẩm nổi bật</a>";
        #share
        $image_share = 'http://' . $config_url .'/'. _upload_hinhanh_l . $row_photo["logo"];

        $sql = "select ten_$lang as ten,mota_$lang as mota,id,tenkhongdau,ngaytao,thumb,photo,giakm,gia,phantramgiam from #_product where hienthi=1 and type ='san-pham' and spkm = 1 order by stt,id desc";
        $d->query($sql);
        $product = $d->result_array();
    }

    /*if($com == 'hot-product'){
        // break crumb
        $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>".change_lang('Home','Home','Casa')."</a> <span style='padding:0px 5px;color:#fff'><i class='fa fa-angle-right'></i></span> <a style='color:#fff'>Hot product</a>";
        #share
        $image_share = 'http://' . $config_url . _upload_hinhanh_l . $row_photo["logo"];

        $sql = "select ten_$lang as ten,mota_$lang as mota,id,tenkhongdau,ngaytao,thumb,photo from #_product where hienthi=1 and type ='san-pham' and noibat = 1 order by stt,id desc";
        $d->query($sql);
        $product = $d->result_array();
    }*/

    if($com == 'thong-tin'){
        $title_bar = change_lang('Thông tin','Infomation').' - ';
        $title_tcat = change_lang('Thông tin','Infomation');
        $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>".change_lang('Trang chủ','Home','Casa')."</a> <span style='padding:0px 5px;color:#fff'><i class='fa fa-angle-right'></i></span> <a style='color:#fff'>Thông tin</a>";
        #share
        $image_share = 'http://' . $config_url .'/'. _upload_hinhanh_l . $row_photo["logo"];

        $sql = "select ten_$lang as ten,mota_$lang as mota,id,tenkhongdau,ngaytao,thumb,photo from #_product where hienthi=1 and type ='news' order by stt,id desc";
        $d->query($sql);
        $product = $d->result_array();
    }

    if($com == 'thong-tin-tuyen-dung'){
        $title_bar = change_lang('Thông tin tuyển dụng','News').' - ';
        $title_tcat = change_lang('Thông tin tuyển dụng','News');
        $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>".change_lang('Trang chủ','Home','Casa')."</a> <span style='padding:0px 5px;color:#fff'><i class='fa fa-angle-right'></i></span> <a style='color:#fff'>Thông tin tuyển dụng</a>";
        #share
        $image_share = 'http://' . $config_url .'/'. _upload_hinhanh_l . $row_photo["logo"];

        $sql = "select ten_$lang as ten,mota_$lang as mota,id,tenkhongdau,ngaytao,thumb,photo from #_product where hienthi=1 and type ='tuyendung' order by stt,id desc";
        $d->query($sql);
        $product = $d->result_array();
    }

    if($com == 'du-an-da-thi-cong'){
        $title_bar = change_lang('Dự án đã thi công','News').' - ';
        $title_tcat = change_lang('Dự án đã thi công','News');
        $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>".change_lang('Trang chủ','Home','Casa')."</a> <span style='padding:0px 5px;color:#fff'><i class='fa fa-angle-right'></i></span> <a style='color:#fff'>Dự án đã thi công</a>";
        #share
        $image_share = 'http://' . $config_url .'/'. _upload_hinhanh_l . $row_photo["logo"];

        $sql = "select ten_$lang as ten,mota_$lang as mota,id,tenkhongdau,ngaytao,thumb,photo from #_product where hienthi=1 and type ='thicong' order by stt,id desc";
        $d->query($sql);
        $product = $d->result_array();
    }

    if($com == 'hoi-dap'){
        $title_bar = change_lang('Hỏi đáp','Documents').' - ';
        $title_tcat = change_lang('Hỏi đáp','Documents');
        $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>".change_lang('Trang chủ','Home','Casa')."</a> <span style='padding:0px 5px;color:#fff'><i class='fa fa-angle-right'></i></span> <a style='color:#fff'>Hỏi đáp</a>";
        #share
        $image_share = 'http://' . $config_url .'/'. _upload_hinhanh_l . $row_photo["logo"];

        $sql = "select ten_$lang as ten,mota_$lang as mota,noidung_$lang as noidung,id,tenkhongdau,ngaytao,thumb,photo from #_product where hienthi=1 and type ='hoidap' order by stt,id desc";
        $d->query($sql);
        $product = $d->result_array();
    }

    if($com == 'dich-vu'){
        $title_bar = change_lang('Dịch vụ','Documents').' - ';
        $title_tcat = change_lang('Dịch vụ','Documents');
        $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>".change_lang('Trang chủ','Home','Casa')."</a> <span style='padding:0px 5px;color:#fff'><i class='fa fa-angle-right'></i></span> <a style='color:#fff'>Dịch vụ</a>";
        #share
        $image_share = 'http://' . $config_url .'/'. _upload_hinhanh_l . $row_photo["logo"];

        $sql = "select ten_$lang as ten,mota_$lang as mota,id,tenkhongdau,ngaytao,thumb,photo from #_product where hienthi=1 and type ='dich-vu' order by stt,id desc";
        $d->query($sql);
        $product = $d->result_array();
    }

    if($com == 'bao-gia'){
        $title_bar = change_lang('Báo giá','Documents').' - ';
        $title_tcat = change_lang('Báo giá','Documents');
        $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>".change_lang('Trang chủ','Home','Casa')."</a> <span style='padding:0px 5px;color:#fff'><i class='fa fa-angle-right'></i></span> <a style='color:#fff'>Báo giá</a>";
        #share
        $image_share = 'http://' . $config_url .'/'. _upload_hinhanh_l . $row_photo["logo"];

        $sql = "select ten_$lang as ten,mota_$lang as mota,id,tenkhongdau,ngaytao,thumb,photo from #_product where hienthi=1 and type ='baogia' order by stt,id desc";
        $d->query($sql);
        $product = $d->result_array();
    }

    if($com == 'goc-tu-van1'){
        $title_bar = change_lang('Góc tư vấn','Documents').' - ';
        $title_tcat = change_lang('Góc tư vấn','Documents');
        $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>".change_lang('Trang chủ','Home','Casa')."</a> <span style='padding:0px 5px;color:#fff'><i class='fa fa-angle-right'></i></span> <a style='color:#fff'>Góc tư vấn</a>";
        #share
        $image_share = 'http://' . $config_url .'/'. _upload_hinhanh_l . $row_photo["logo"];

        $sql = "select ten_$lang as ten,mota_$lang as mota,id,tenkhongdau,ngaytao,thumb,photo from #_product where hienthi=1 and type ='goctuvan' order by stt,id desc";
        $d->query($sql);
        $product = $d->result_array();
    }

    if($com == 'san-pham-moi'){
        $title_bar = change_lang('Sản phẩm mới','Documents').' - ';
        $title_tcat = change_lang('Sản phẩm mới','Documents');
        $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>".change_lang('Trang chủ','Home','Casa')."</a> <span style='padding:0px 5px;color:#fff'><i class='fa fa-angle-right'></i></span> <a style='color:#fff'>Sản phẩm mới</a>";
        #share
        $image_share = 'http://' . $config_url .'/'. _upload_hinhanh_l . $row_photo["logo"];

        $sql = "select ten_$lang as ten,mota_$lang as mota,id,tenkhongdau,ngaytao,thumb,photo,phantramgiam,gia,giakm from #_product where hienthi=1 and type ='san-pham' and noibat = 1 order by stt,id desc";
        $d->query($sql);
        $product = $d->result_array();
    }
    if($com == 'chinh-sach'){
        $title_bar = change_lang('Chính sách','Documents').' - ';
        $title_tcat = change_lang('Chính sách','Documents');
        $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>".change_lang('Trang chủ','Home','Casa')."</a> <span style='padding:0px 5px;color:#fff'><i class='fa fa-angle-right'></i></span> <a style='color:#fff'>Chính sách</a>";
        #share
        $image_share = 'http://' . $config_url .'/'. _upload_hinhanh_l . $row_photo["logo"];

        $sql = "select ten_$lang as ten,mota_$lang as mota,id,tenkhongdau,ngaytao,thumb,photo from #_product where hienthi=1 and type ='chinhsach' order by stt,id desc";
        $d->query($sql);
        $product = $d->result_array();
    }

    $anhquangcao = 'upload/product/'.$row_photo['photo_vi'];

    $tongsanpham = count($product);

    $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    $url = getCurrentPageURL();
    $maxR = 24;
    $maxP = 4;
    $paging = paging_home($product_list, $url, $curPage, $maxR, $maxP);
    $product_list = $paging['source'];
}
?>