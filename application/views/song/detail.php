<div class="row">
    <div class="col-md-9">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url("home")?>">Home</a></li>
            <li><a href="#">Library</a></li>
        </ol>
        <div style="margin-top:-10px" class="row">
            <div class="col-md-2 col-xs-12">
                <img class="img-responsive" src="<?php echo ($media->m_poster) ? $media->m_poster : NO_PICTURE;?>">
            </div>
            <div class="col-md-10 col-xs-12">
                <h1 id="song_name">Bài hát: <?php echo $media->m_title;?></h1>
                <h4 id="singer_name">Trình bày: <?php
                    foreach($list_singer as $key=> $singer){
                        if($key != 0)
                            echo ", ";
                        echo $singer->singer_name;
                    }
                    if(count($list_singer) == 0){
                        echo "Không xác định";
                    }
                ?></h4>

                <h4 id="album_name">Album</h4>
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
                <span class="glyphicon glyphicon-music" aria-hidden="true"></span> <label class="label label-primary">1000 lượt nghe</label>
            </div>
        </div>
        <div class="panel panel-default" style="margin-top:20px;">
            <div class="panel-heading">Lời bài hát</div>
            <div class="panel-body">
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
    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">Nhạc liên quan</div>
            <ul class="list-group list-chart">
                <?php
                for($i=1;$i<=10;$i++):
                    ?>
                    <li class="list-group-item">
                        <span class="number special-2"><?php echo $i;?></span>
                        <div class="info_data">
                            <h3><a href="#" class="name_song">I'm Losing You</a></h3>
                            <h4><a href="http://www.nhaccuatui.com/nghe-si-bui-anh-tuan.html" class="name_singer">Bùi Anh Tuấn</a></h4>
                        </div>
                        <!--span id="NCTCounter_sg_4581213" class="icon_listen">0</span-->
                    </li>
                    <?php
                endfor;
                ?>
            </ul>
        </div>
    </div>
</div>