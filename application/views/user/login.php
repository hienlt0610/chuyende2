
<form method="post">
<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title">Đăng nhập</div>
            <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Quên mật khẩu?</a></div>
        </div>

        <div style="padding-top:30px" class="panel-body" >

           <?php
                if(isset($error)){
                    echo '<div id="login-alert" class="alert alert-danger col-sm-12">'.$error.'</div>';
                }
            ?>

            <form id="loginform" class="form-horizontal" role="form">

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="login-username" type="text" class="form-control" name="username" value="<?php echo $this->input->post('username') ? $this->input->post('username'):'' ?>" placeholder="Tài khoản">
                </div>

                <div style="margin-bottom: 15px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="login-password" type="password" class="form-control" name="password" placeholder="Mật khẩu">
                </div>



                <div class="input-group">
                    <div class="checkbox">
                        <label>
                            <input id="login-remember" type="checkbox" name="remember" value="1"> Ghi nhớ
                        </label>
                    </div>
                </div>


                <div style="margin-top:10px" class="form-group">
                    <!-- Button -->

                    <div class="col-sm-12 controls">
                        <input type="submit" value="Dang Nhap" id="btn-login" name="btn-login" class="btn btn-success">
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-12 control">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                            Không có tài khoản!
                            <a href="<?php echo site_url("user/register")?>">
                                Đăng ký
                            </a>
                            ngay
                        </div>
                    </div>
                </div>
            </form>



        </div>
    </div>
</div>
</form>