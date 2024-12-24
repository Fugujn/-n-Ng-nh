<?php
session_start();
if ($_SESSION['mem_login']['email'] != '') {
    $d->reset();
    $sql = "select * from #_member where user = '" . $_SESSION['mem_login']['email'] . "' order by id desc ";
    $d->query($sql);
    $taikhoan = $d->fetch_array();

    $d->reset();
    $sql = "select * from #_donhang where iduser = '" . $taikhoan['id'] . "' order by ngaytao desc ";
    $d->query($sql);
    $showorder = $d->result_array();

    $tongdon = count($showorder);
    ?>
<style type="text/css">
    .comment-one{
        margin-bottom: 10px;min-height:10px;overflow:hidden;
    }
    .comment-one label{width:200px;text-align:left;font-weight:normal;float:left;padding-top: 5px;}
    .re_input{
        padding:0px 10px;width:300px;float:left;height: 40px;border:none;
    }
    .error-mess-comment p{color:#ff0000;margin-bottom: 10px;}

    .chinhsuatk {border:none;color:#fff; padding:8px 25px;background: linear-gradient(#EED472, #C59A3E);font-size: 15px;cursor: pointer;transition: all .3s;border-radius: 3px;}
    @media (max-width:770px){
        .chinhsuatk{margin-left: 0px !important;}
        .comment-one{padding-left: 0px !important;}
        .re_input{width: 93% !important;}
        label{width: 100% !important;margin-bottom: 10px;}
    }
</style>
        
<script language="JavaScript" type="text/javascript">
    function CheckRegisterForm4(t)
    {
        // if (t.email.value == "")
        // {
        //     alert("Vui lòng nhập email - Please enter your email!");
        //     t.email.focus();
        //     return false;
        // }


        if (t.ten.value == "")
        {
            alert("Vui lòng nhập tên  - Please enter your last name!");
            t.ten.focus();
            return false;
        }
        if (t.dienthoai.value == "")
        {
            alert("Vui lòng nhập số điện thoại! - Please enter your phone number");
            t.dienthoai.focus();
            return false;
        }
        if (isNaN(t.dienthoai.value))
        {
            alert("Số điện thoại không là chữ ! - Phone number is not the word!");
            t.dienthoai.focus();
            return false;
        }

        return true;

    }
</script>		
    

<div class="boxcontent" style="padding:30px;background:#f8f8f8;width: 100%;float: left;box-sizing: border-box;">
    <div class="titleaccount" style="margin-bottom: 35px;">
        <p style="font-size: 16px;color:#CDA53D;">
            <i class="fa fa-pencil" aria-hidden="true" style="margin-right: 5px"></i>
            <?=change_lang('Thông tin tài khoản','Account Information')?>
        </p>
    </div>
    <div class="clear"></div>
    <form method="post" action="user.html&act=update" enctype="multipart/form-data" onSubmit="return CheckRegisterForm4(this)">
        
        <div class="comment-one" style="margin-top:20px;">
            <label>Email<font color="#FF3300"> (*) </font></label>
            <span><input disabled class="re_input" name="email"  value="<?= $taikhoan['user'] ?>" type="text"></span>
        </div>
        <?php
        if ($error_email <> "") {
            ?>
            <div class="comment-error" >
                <div class="arrow"></div>
                <div class="error-mess-comment">
                    <p><?= $error_email ?></p>
                </div>
            </div>
        <?php } ?>


        <div class="comment-one">
            <label><?= change_lang('Họ Tên', 'Name') ?><font color="#FF3300"> (*) </font></label>
            <span><input class="re_input" name="ten" type="text" value="<?= $taikhoan['name'] ?>" ></span>
        </div>
        <?php
        if ($error_lastname <> "") {
            ?>
            <div class="comment-error" >
                <div class="arrow"></div>
                <div class="error-mess-comment">
                    <p><?= $error_lastname ?></p>
                </div>
            </div>
        <?php } ?>							

        <div class="comment-one">
            <label><?= change_lang('Địện thoại', 'Phone') ?><font color="#FF3300"> (*) </font></label>
            <span><input class="re_input" name="dienthoai"  value="<?= $taikhoan['dienthoai'] ?>" type="text"></span>
        </div>
        <?php
        if ($error_dienthoai <> "") {
            ?>
            <div class="comment-error" >
                <div class="arrow"></div>
                <div class="error-mess-comment">
                    <p><?= $error_dienthoai ?></p>
                </div>
            </div>
        <?php } ?>

        <div class="comment-one">
            <label><?= change_lang('Địa chỉ', 'Address') ?><font color="#FF3300"> (*) </font></label>
            <span><input class="re_input"  type="text"  value="<?= $taikhoan['diachi'] ?>" name="diachi"></span>
        </div>
        <div class="clear"></div>

        <div class="comment-one" style="margin-top:15px">
            <label><font color="white"> </font></label>
            <span>
                <input class="chinhsuatk" type="submit" value="<?= change_lang('Cập nhật', 'Update') ?>">
            </span>

        </div>				
    </form>  
</div>

    <?php
} else {
    transfer("Bạn chưa đăng nhập !", "./");
}
?>