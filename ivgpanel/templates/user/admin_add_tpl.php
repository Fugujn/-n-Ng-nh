<script language="javascript" src="media/scripts/my_script.js"></script>
<script language="javascript">
    function js_submit() {
        if (isEmpty(document.frm.username, "Chưa nhập tên đăng nhập.")) {
            return false;
        }

        if (isEmpty(document.frm.oldpassword, "Chưa nhập mật khẩu cũ.")) {
            return false;
        }

        if (!isEmpty(document.frm.new_pass) && document.frm.new_pass.value.length < 5) {
            alert("Mật khẩu phải nhiều hơn 4 ký tự.");
            document.frm.new_pass.focus();
            return false;
        }

        if (!isEmpty(document.frm.new_pass) && document.frm.new_pass.value != document.frm.renew_pass.value) {
            alert("Nhập lại mật khẩu mới không chính xác.");
            document.frm.renew_pass.focus();
            return false;
        }

        if (!isEmpty(document.frm.email) && !check_email(document.frm.email.value)) {
            alert('Email không hợp lệ.');
            document.frm.email.focus();
            return false;
        }
    }
</script>

<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Quản lý tài khoản</h2>
  </div>
</div>

<form name="frm" method="post" action="index.php?com=user&act=admin_edit" enctype="multipart/form-data" class="form" onSubmit="return js_submit();">
	<input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    
    <button type="submit" class="btn btn-success mr-1">
        <i class="icon-check2"></i> Lưu
    </button>
    <button type="button" class="btn btn-warning " onclick="javascript:window.location = 'index.php'">
        <i class="icon-cross2"></i> Thoát
    </button>
<div class="clearfix"></div>    
<div class="row mt-1">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-success " href="#"><i class="icon-pencil3"></i> &nbsp;Profile</a>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in px-1 py-1">

                <b class="mb-1 display-block">Tên đăng nhập</b> <input type="text" name="username" id="username" value="<?= $item['username'] ?>" class="form-control input" /><br />
                <b class="mb-1 display-block">Mật khẩu</b> <input type="password" name="oldpassword" id="oldpassword" value="" class="form-control input" /><br />
                <b class="mb-1 display-block">Nhập mật khẩu mới</b> <input type="password" name="new_pass" id="new_pass" value="" class="form-control input" /><br />
                <b class="mb-1 display-block">Nhập lại mật khẩu</b> <input type="password" name="renew_pass" value="" class="form-control input" /><br />
                <b class="mb-1 display-block">Họ tên</b> <input type="text" name="ten" id="ten" value="<?= $item['ten'] ?>" class="form-control input" /><br />
                <b class="mb-1 display-block">Email</b> <input type="text" name="email" id="email" value="<?= $item['email'] ?>" class="form-control input" /><br />
            </div>
        </div>  
    </div>
</div>  
</form>
<div class="clearfix"></div>  
	