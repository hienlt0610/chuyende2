<div class="row">
    <div class="col-md-9">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url("home")?>">Trang chủ</a></li>
            <li><a href="<?php echo site_url("bai-hat")?>">Bài hát</a></li>
            <li><?php echo (!empty($media->cate_name)) ? "<a href='".album_url($media->cate_id, $media->cate_name)."'>".$media->cate_name."</a>" : "Không có";?></li>
        </ol>
        <div style="margin-top:-10px" class="row">
            <div class="col-md-2 col-xs-12">
                <img class="img-responsive" src="<?php echo ($media->m_poster) ? $media->m_poster : NO_PICTURE;?>">
            </div>
            <div class="col-md-10 col-xs-12">
                <h1 id="song_name" style="font-size:16px;font-weight: 700; color:#333;">Bài hát: <?php echo $media->m_title;?></h1>
                <?php
                    $singer_name = "";
                    foreach($list_singer as $key => $singer){
                        if($key != 0)
                            $singer_name.= ", ";
                        $singer_name.= "<a href='".singer_url($singer->singer_id, $singer->singer_name)."'>".$singer->singer_name."</a>";
                    }
                    if(count($list_singer) == 0)
                        $singer_name = "Không xác định";
                ?>
                <div class="song-info" style="margin-top: 10px;">
                    <p>Trình bày: <span><?php echo $singer_name;?></span>
                        <br>Album: <?php echo (!empty($media->album_name)) ? "<a href='".album_url($media->album_id, $media->album_name)."'>".$media->album_name."</a>" : "Không có";?>
                        <br>Thể loại: <?php echo (!empty($media->cate_name)) ? "<a href='".category_url($media->cate_id, $media->cate_name)."'>".$media->cate_name."</a>" : "Không có";?>
                    </p>
                </div>
            </div>
        </div>
        <div>
            <div id="player">Loading the player...</div>
            <script src="http://jwpsrv.com/library/PXWW0oQgEeOOWyIACi0I_Q.js"></script>
            <script>
                jwplayer('player').setup({
                    file: '<?php echo $media->m_url;?>',
                    width: '100%',
                    height: 200,
                    stretching: 'uniform',
                    image: '<?php echo $media->m_poster;?>',
                    autostart: true
                });
            </script>
        </div>
        <div style="margin-top: 20px;">
            <a class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> Thêm vào</a>
            <a href="<?php echo site_url("song/download/".$media->m_id)?>" class="btn btn-danger"><i class="glyphicon glyphicon-download"></i> Tải xuống</a>
            <a class="btn btn-success"><i class="glyphicon glyphicon-share"></i> Chia sẽ</a>

            <div class="pull-right">
                <span class="glyphicon glyphicon-music" aria-hidden="true"></span> <label class="label label-primary"><?php echo $media->m_viewed?> lượt nghe</label>
            </div>
        </div>
        <div class="panel panel-info" style="margin-top:20px;">
            <div class="panel-heading" data-toggle="collapse" href="#lyric">
                <h4 class="panel-title">
                    Lời bài hát
                </h4>
            </div>
            <div class="panel-body panel-collapse collapse" id="lyric">
                <p id="divLyric" class="pd_lyric trans" style="height:auto;max-height:none;">
                    Bài hát: Phía Sau Một Cô Gái - Soobin Hoàng Sơn
                    <br>
                    <br>Nhiều khi anh mong được một lần nói ra hết tất cả thay vì,
                    <br>Ngồi lặng im nghe em kể về anh ta bằng đôi mắt lấp lánh
                    <br>Đôi lúc em tránh ánh mắt của anh
                    <br>Vì dường như lúc nào em cũng hiểu thấu lòng anh.
                    <br>Không thể ngắt lời, càng không thể để giọt lệ nào được rơi
                    <br>
                    <br>[Chorus]
                    <br>Nên anh lùi bước về sau, để thấy em rõ hơn
                    <br>Để có thể ngắm em từ xa âu yếm hơn
                    <br>Cả nguồn sống bỗng chốc thu bé lại vừa bằng một cô gái (bằng một cô gái anh đã từng yêu)
                    <br>Hay anh vẫn sẽ lặng lẽ kế bên
                    <br>Dù không nắm tay nhưng đường chung mãi mãi
                    <br>Và từ ấy ánh mắt anh hồn nhiên, đến lạ.
                    <br>
                    <br>[Verse 2]
                    <br>
                    <br>Chẳng một ai có thể cản đường trái tim khi đã lỡ yêu rồi
                    <br>Đừng ai can ngăn tôi khuyên tôi buông xuôi vì yêu không có lỗi
                    <br>Ai cũng ước muốn, khao khát được yêu,
                    <br>Được chờ mong tới giờ ai nhắc đưa đón buổi chiều
                    <br>Mỗi sáng thức dậy, được ngắm một người nằm cạnh ngủ say
                    <br>Vì sao anh không thể gặp được em sớm hơn.

                </p>
            </div>
        </div>

        <!-- Comment -->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-comments" data-href="<?php echo base_url(uri_string());?>" data-width="100%" data-numposts="5"></div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">Bài hát khác</div>
            <ul class="list-group list-chart">
                <?php
                foreach($top10_song as $key => $song):
                    ?>
                    <li class="list-group-item">
                        <span class="number special-2"><?php echo ($key+1);?></span>
                        <div class="info_data">
                            <h3><a href="<?php echo song_url($song->m_id, $song->m_title)?>" class="name_song"><?php echo $song->m_title?></a></h3>
                            <h4 class="name_singer">
                                <?php
                                    foreach($song->singer as $key => $singer){
                                        if($key!=0)
                                            echo ", ";
                                        echo "<a href='".singer_url($singer->singer_id, $singer->singer_name)."'>".$singer->singer_name."</a>";
                                    }
                                    if(count($song->singer) == 0)
                                        echo "Không xác định";
                                ?>
                            </h4>
                        </div>
                        <!--span id="NCTCounter_sg_4581213" class="icon_listen">0</span-->
                    </li>
                    <?php
                endforeach;
                ?>
            </ul>
        </div>
    </div>
</div>