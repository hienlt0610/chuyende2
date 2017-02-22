<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $this->template->title ?></title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
    <!-- custom CSS here -->
    <link href="<?php echo base_url("assets/css/style.css")?>" rel="stylesheet" />
    <?php echo $this->template->stylesheet; ?>
</head>
<body>
<?php echo $this->template->partial->view('widgets/nav');?>
<div class="container">

    <div class="row">
        <?php echo $this->template->partial->view('widgets/sidebar')?>
        <!-- /.col -->
        <div class="col-md-9">
            <?php echo $this->template->content;?>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->


<!--Footer -->

<?php echo $this->template->partial->view('widgets/footer')?>
<!-- /.col -->
<!--Footer end -->
<!--SCRIPTS AT THE BOOTOM TO DECREASE LOAD TIME-->
<!--jQUERY FILES-->
<script src="<?php echo base_url("assets/js/jquery-1.10.2.js")?>"></script>
<!--BOOTSTRAP  FILES-->
<script src="<?php echo base_url("assets/js/bootstrap.min.js")?>"></script>
<script src="<?php echo base_url("assets/js/script.js")?>"></script>
<?php echo $this->template->javascript; ?>
</body>
</html>
