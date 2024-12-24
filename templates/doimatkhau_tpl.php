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
    <script language="JavaScript" type="text/javascript">
        function CheckchangepassForm(t)
        {
            if (t.matkhaucu.value == "")
            {
                alert("Vui lòng nhập mật khẩu cũ - Please enter your old password!");
                t.matkhaucu.focus();
                return false;
            }


            if (t.matkhaumoi.value == "")
            {
                alert("Vui lòng nhập mật khẩu mới  - Please enter your new password!");
                t.matkhaumoi.focus();
                return false;
            }
            if (t.golaimatkhaumoi.value == "")
            {
                alert("Vui lòng nhập lại mật khẩu mới! - Please enter your re-new password");
                t.golaimatkhaumoi.focus();
                return false;
            }
            
            return true;

        }
    </script>
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

<div class="boxcontent" style="padding:30px;background:#f8f8f8;width: 100%;float: left;box-sizing: border-box;">     
    <div class="titleaccount" style="margin-bottom: 35px;">
        <p style="font-size: 16px;color:#CDA53D;">
            <i class="fa fa-unlock-alt" aria-hidden="true" style="margin-right: 5px"></i>
            <?=change_lang('Đổi mật khẩu','Change Password')?>
        </p>
    </div>
    <div class="clear"></div>

        <?php
        $d->reset();
        $sql = "select * from table_member where user='" . $_SESSION['mem_login']['mem_mail'] . "'";
        $d->query($sql);
        $result_info_mem = $d->fetch_array();
        ?>
        <form method="post" action="user.html&act=changepassword"  onSubmit="return CheckchangepassForm(this)">
            <div class="comment-one">
                <label><?= change_lang('Mật khẩu cũ', 'Old PassWord') ?><font color="#FF3300"> (*) </font></label>
                <span><input class="re_input" name="matkhaucu" type="password" class="dk-input" value=""></span>
            </div>
            
            <div class="comment-one">
                <label><?= change_lang('Mật khẩu mới', 'New PassWord') ?><font color="#FF3300"> (*) </font></label>
                <span><input class="re_input" name="matkhaumoi" type="password" class="dk-input" value=""></span>
            </div>
           
            <div class="comment-one">
                <label><?= change_lang('Xác nhận mật khẩu mới', 'Re_New PassWord') ?><font color="#FF3300"> (*) </font></label>
                <span><input class="re_input" name="golaimatkhaumoi" type="password" class="dk-input" value=""></span>
            </div>      
            <?php
            if ($error_password <> "") {
                ?>
                <div class="comment-error" >
                    <div class="arrow"></div>
                    <div class="error-mess-comment">
                        <p><?= $error_password ?></p>
                    </div>
                </div>
            <?php } ?>                    
            <div class="comment-one" style="margin-top:15px">
                <label><font color="white">  </font></label>
                <span>
                    <input class="chinhsuatk"  type="submit" value="<?= change_lang('Cập nhật', 'Update') ?>">
                </span>
            </div>              
        </form>  
</div>
    
<?php } else {
    transfer("Bạn chưa đăng nhập !", "./");
}
?>