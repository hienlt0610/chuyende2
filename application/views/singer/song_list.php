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
                    <li><a href="<?=singer_song_url($singer->singer_id, $singer->singer_name)?>" class="active" title="Bài Hát" class="">Bài Hát</a></li>
                    <li><a href="<?=singer_album_url($singer->singer_id, $singer->singer_name)?>" title="Album" class="">Album</a></li>
                    <li><a href="<?=singer_video_url($singer->singer_id, $singer->singer_name)?>" title="Video" class="">Video</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 20px;">

    <div class="col-md-8">
        <!-- List Song -->
        <div class="row">
            <div class="title-section">
                <h3><a href="<?=singer_song_url($singer->singer_id, $singer->singer_name)?>">Bài hát của <?php echo $singer->singer_name ?> <i class="glyphicon glyphicon-menu-right"></i></a></h3>
            </div>
            <?php if(count($list_song) > 0):?>
            <table class="table table-hover list-singer-song">
                <?php foreach($list_song as $song):?>
                    <tr>
                        <td width="60%">
                            <a href="<?php echo song_url($song->m_id, $song->m_title)?>" class="song-name"><?php echo $song->m_title?></a> - <a href="<?php echo singer_url($singer->singer_id, $singer->singer_name)?>" class="singer-name"><?php echo $singer->singer_name ?></a>
                        </td>
                        <td width="20%"><span class="glyphicon glyphicon-headphones"> <?=$song->m_viewed?></span></td>
                        <td width="20%" align="right">
                            <a class="btn btn-info btn-xs" title="Thêm playlist"><i class="glyphicon glyphicon-plus"></i></a>
                            <a class="btn btn-danger btn-xs" title="Tải xuống"><i class="glyphicon glyphicon-download"></i></a>
                            <a class="btn btn-success btn-xs" title="Chia sẻ"><i class="glyphicon glyphicon-share"></i></a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
            <?php endif;?>

            <?php
                if(count($list_song) == 0){
                    echo "<small>Không có bài hát nào</small>";
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

