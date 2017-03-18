<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url("home")?>">NGHE NHẠC ONLINE</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav navbar-right">
               <?php
                    if(!isset($this->session->userdata['logged_in'])):
                ?>
                   <li><a href="<?php echo site_url("user/login")?>">Đăng nhập</a></li>
                    <li><a href="<?php echo site_url("user/register")?>">Đăng ký</a></li>
               <?php
                    else:
                ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Xin chao, <?php echo $this->session->userdata('username')?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Sua thong tin ca nhan</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('user/logout')?>">Thoat</a></li>
                    </ul>
                </li>
                <?php
                    endif;
                ?>
                

                
            </ul>
            <form method="get" action="<?php echo site_url("search")?>" class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input name="q" type="text" placeholder="Enter Keyword Here ..." class="form-control">
                </div>
                &nbsp;
                <button type="submit" class="btn btn-default">Search</button>
            </form>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>