<?php 
  session_start();
?>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row"></div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                  <div class="card-header no-border">
                      <div class="card-title text-xs-center">
                          <!-- <div class="p-1"><img src="media/images/logo.png" alt="logo"></div> -->
                      </div>
                      <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Đăng nhập</span></h6>
                  </div>
                  <div class="card-body collapse in">
                      <div class="card-block">
                          <form class="form-horizontal form-simple" action="index.php?com=user&act=login" method="post" novalidate>
                              <fieldset class="form-group position-relative has-icon-left">
                                  <input type="text" class="form-control form-control-lg input-lg" id="user-name" name="username" placeholder="Your Username" required>
                                  <div class="form-control-position">
                                      <i class="icon-head"></i>
                                  </div>
                              </fieldset>
                              <fieldset class="form-group position-relative has-icon-left">
                                  <input type="password" name="password" class="form-control form-control-lg input-lg" id="user-password" placeholder="Enter Password" required>
                                  <div class="form-control-position">
                                      <i class="icon-key3"></i>
                                  </div>
                              </fieldset>
                              <?php 

                                if(isset($_SESSION['errorlog'])){
                                    echo '<p style="margin-bottom:10px;">'.$_SESSION['errorlog'].'</p>';
                                    $_SESSION['errorflag'] = 1;
                                  }
                                if($_SESSION['errorflag'] == 1){
                                    unset($_SESSION['errorlog']);
                                    $_SESSION['errorflag'] = 0; 
                                }
                              ?>
                              <fieldset class="form-group row">
                                  <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                      <fieldset>
                                          <input type="checkbox" id="remember-me" class="chk-remember">
                                          <label for="remember-me"> Remember Me</label>
                                      </fieldset>
                                  </div>
                                 <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="" class="card-link">Forgot Password?</a></div>
                              </fieldset>
                              <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Đăng nhập</button>
                          </form>
                      </div>
                  </div>
                  <!-- <div class="card-footer">
                      <div class="">
                          <p class="float-sm-left text-xs-center m-0"><a href="recover-password.html" class="card-link">Recover password</a></p>
                          <p class="float-sm-right text-xs-center m-0">New to Robust? <a href="register-simple.html" class="card-link">Sign Up</a></p>
                      </div>
                  </div> -->
              </div>
          </div>
      </section>
    </div>
  </div>
</div>