<div class="page-header" style="margin-top: 5px;">
    <h1><?php echo $singer->singer_name ?></h1>
</div>

<div class="row" >
    <div class="col-md-2">
        <img class="thumbnail img-responsive" src="<?php echo ($singer->singer_img) ? $singer->singer_img : NO_PICTURE;?>">
    </div>
    <div class="col-md-10">
        <h2 style="font-size:22px;margin-top: 5px;">Tiểu sử</h2>
        <p class="info" style="margin-top: 10px;"><?php echo $singer->singer_info ?></p>
    </div>
</div>

<div class="row" style="margin-top: -10px;">
    <div class="singer-top-menu">
        <div class="wrap">
            <div class="content-wrap">
                <ul>
                    <li><a href="<?=singer_url($singer->singer_id, $singer->singer_name)?>"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li><a href="<?=singer_song_url($singer->singer_id, $singer->singer_name)?>" class="" title="Bài Hát" class="">Bài Hát</a></li>
                    <li><a href="<?=singer_album_url($singer->singer_id, $singer->singer_name)?>" title="Album" class="active">Album</a></li>
                    <li><a href="<?=singer_video_url($singer->singer_id, $singer->singer_name)?>" title="Video" class="">Video</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 20px;">

    <div class="col-md-8">
        <!-- List Album -->
        <div class="row row-section">
            <div class="title-section">
                <h3><a href="<?=singer_song_url($singer->singer_id, $singer->singer_name)?>">Album của <?php echo $singer->singer_name ?> <i class="glyphicon glyphicon-menu-right"></i></a></h3>
            </div>
            <?php if(count($list_album) > 0):?>
                <ul class="thumbnails list-unstyled list-music">
                    <?php foreach($list_album as $album):?>
                        <li class="col-md-3 col-sm-6">
                            <div class="thumbnail" style="padding: 4px">
                                <div class="img-overlay">
                                    <img alt="<?=$album->album_name?>" title="<?=$album->album_name?>" class="img-responsive" src="<?=!empty($album->album_img) ?$album->album_img: NO_PICTURE ?>">
                                    <a href="<?=album_url($album->album_id, $album->album_name)?>" class="overlay"></a>
                                </div>
                                <div class="caption text-center">
                                    <h4><a href="<?=album_url($album->album_id, $album->album_name)?>"><?=$album->album_name?></a></h4>
                                    <p><a href="<?=singer_url($singer->singer_id, $singer->singer_name)?>"><?=$singer->singer_name?></a></p>
                                </div>
                            </div>
                        </li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>

            <?php
            if(count($list_album) == 0){
                echo "<small>Không có album nào</small>";
            }
            ?>
        </div>
        <nav aria-label="Page navigation" class="pull-right" style="margin-top: -30px">
            <ul class="pagination">
                <?=$paging;?>
            </ul>
        </nav>
    </div>


    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Ca sĩ tương tự</div>
            <ul class="list-group list-singer">
                <?php
                foreach($other_singer as $key => $singer):
                    ?>
                    <li class="list-group-item">
                        <div>
                            <a href="<?=singer_url($singer->singer_id,$singer->singer_name)?>">
                                <img width="50px" style="vertical-align:middle" src="<?=(!empty($singer->singer_img)) ? $singer->singer_img : NO_PICTURE?>">
                            </a>
                            <a href="<?=singer_url($singer->singer_id,$singer->singer_name)?>"><?=$singer->singer_name?></a>
                        </div>
                    </li>
                    <?php
                endforeach;
                ?>
            </ul>
        </div>
    </div>

</div>

