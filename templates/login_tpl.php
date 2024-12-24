<?php if ($_SESSION['mem_login']['email'] == '') { ?>
<script type="text/javascript">
function CheckLoginForm5()
    {
        var email = document.getElementById('emaillogin');
        var matkhau = document.getElementById('passwordlogin');
        var $err = false;
        if (email.value == "")
        {
            alert("Vui lòng nhập email - Please enter your email!");
            email.focus();
            $err = true;
            return false;
        }else{
            if(validateEmail(email.value) == false){
                alert("Sai định dạng Email - Please enter your email!");
                email.focus();
                $err = true;
                return false;
            }
        }    
        if (matkhau.value == "")
        {
            alert("Vui lòng nhập mật khẩu - Please enter your password!");
            matkhau.focus();
            $err = true;
            return false;
        }
        
        if($err == false){
            $('.checklogin').css({"opacity":"0.5","cursor":"not-allowed"});
            $('.checklogin').html("Đang xử lý...");
            setTimeout(function(){
            $.ajax({
                type:'POST',
                url:'ajax/login.php',
                data:{act:'login',emaillogin:email.value,passlogin:matkhau.value},
                success: function(data){
                    
                    $jdata = $.parseJSON(data);
                    if($jdata.loai=='1'){
                        window.location = "user.html&act=profile";
                    }else{
                        $('.checklogin').css({"opacity":"1","cursor":"pointer"});
                        $('.checklogin').html('<i class="fa fa-paper-plane-o" aria-hidden="true"></i>&nbsp;Đăng nhập');
                        $('.errorlogin').html($jdata.giaodien);
                    } 
                }
            })

        },3000); /*set time out*/
            return true;
        } /* kiem tra err*/
    }
</script>
  <style type="text/css">
    .login_content{width: 500px;margin:0 auto;margin-top:20px;}
    .leftmid{display: none}
    .rightmid{width: 100%;float:left}
    .khung_slider{display: none}
  </style>
  <div class="login_content">
      <span style="padding: 10px;border-bottom: 1px solid #eaeaea;background: #fff;text-transform: uppercase;font-size: 17px;color: #515151;text-align: left;display: block;">Đăng nhập tài khoản</span>
    
      <div style="padding: 10px;float: left;">
        <p style="margin:0px 0px 15px;padding:10px 0px;border-bottom: 1px solid #e5e5e5;">Bạn chưa có tài khoản. <a href="#small-dialog1" class="dk1" style="font-weight: bold;color:#179fd5"> Đăng ký </a></p>
        <div class="clear"></div>
       <p class="errorlogin" style="margin-bottom:10px;"></p> 
       <div class="col-inp">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
              <input type="text" placeholder="Nhập Email" name="emaillogin" id="emaillogin"  class="form-control">
            </div>
        </div>

        <div class="col-inp">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
              <input type="password" placeholder="Nhập mật khẩu" name="passwordlogin" id="passwordlogin"  class="form-control">
            </div>
        </div>
        <div class="clear"></div>
            <p style="float: right;"><a href="#small-dialog2" class="dk2" style="color:red;">Quên mật khẩu &raquo;</a></p>

        <div class="clear"></div>
            <a class="checklogin" onclick="CheckLoginForm5()" style="padding: 10px 15px;background: #179fd5;color:#fff;font-size: 16px;cursor: pointer;display: block;text-align: center;margin-top: 20px;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>&nbsp;Đăng nhập</a>
       
      </div> 
  </div>
<?php } else { ?>
  
<?php } ?>