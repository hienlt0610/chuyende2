<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="signupbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Đăng ký</div>
            <div style="float:right; font-size: 85%; position: relative; top:-10px">
                <a id="signinlink" href="<?php echo site_url("user/login") ?>"">Đăng nhập</a></div>
        </div>
        <div class="panel-body">
            <?php
            if (!empty($this->session->flashdata('success_message'))) {
                echo "<div class=\"alert alert-success\">{$this->session->flashdata('success_message')}</div>";
            }
            ?>
            <form id="signupform" class="form-horizontal" role="form" method="post">

                <div class="form-group">
                    <label for="email" class="col-md-3 control-label">Tài khoản:</label>
                    <div class="col-md-9">
                        <input type="text" value="<?php echo set_value('username') ?>" class="form-control"
                               name="username" placeholder="Tài khoản">
                        <div class="error"><?php echo form_error('username') ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="firstname" class="col-md-3 control-label">Mật khẩu:</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                        <div class="error"><?php echo form_error('password') ?></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstname" class="col-md-3 control-label">Xác nhận mật khẩu:</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="confirm_password"
                               placeholder="Xác nhận mật khẩu">
                        <div class="error"><?php echo form_error('confirm_password') ?></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-md-3 control-label">Email:</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email" placeholder="Địa chỉ e-mail"
                               value="<?php echo set_value('email') ?>">
                        <div class="error"><?php echo form_error('email') ?></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-3 control-label">Giới tính:</label>
                    <div class="col-md-9">
                        <select class="col-md-3 form-control" name="gender">
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <!-- Button -->
                    <div class="col-md-offset-3 col-md-9">
                        <input value="Đăng ký" name="signup" id="btn-signup" type="submit" class="btn btn-info"/>
                    </div>
                </div>

            </form>
        </div>
    </div>


</div>