<div class="box_content">
<div class="content-index " id="dangnhap" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title title" id="myModalLabel">Đăng nhập</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" enctype="multipart/form-data" name="dangnhap" id="dangnhap" onsubmit="return login_check();">
                    <div class="form-group clear">
                        <label for="recipient-name" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Tên đăng nhập</label>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="username" id="login_username" placeholder="Tên đăng nhập">

                        </div>
                    </div>
                    <div class="form-group clear">
                        <label for="recipient-name" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Mật khẩu</label>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <input type="password" class="form-control" name="matkhau" id="login_matkhau" placeholder="Mật khẩu" onkeypress="dologin(event);">
                        </div>

                    </div>
					<div class="form-group clear">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><img src="images/login_f" onclick="loginFb(); return false;" class="img-responsive" alt="đăng nhập bằng facebook" /></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <img src="images/login_g" class="img-responsive" onclick="login(); return false;" alt="đăng nhập bằng Google Plus" />
                        </div>
                    </div>
                    <div class="clear"></div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                    <span id="LoginLoading" style="display: none;"><img src="images/ajax-loader.gif" width="16"></span>
                    <span id="LoginResult"></span>	
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <a href='quen-mat-khau.html'>Quên mật khẩu</a>
                    <button type="button" class="btn btn-primary" onclick="return login_check();">Đăng nhập</button>
                </div>
            </div>  
        </div>
    </div>
</div>
</div>