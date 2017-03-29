<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="title-section">
                <h3>Thể loại: <?php echo $category->cate_name ?></h3>
            </div>
            <table class="table table-hover list-singer-song">
                <tbody>
                <?php foreach ($list_song as $song): ?>
                    <?php
                    $list_singer = $this->Singer_Model->get_list_singer_by_media($song->m_id);
                    ?>
                    <tr>
                        <td width="60%">
                            <a href="<?php echo song_url($song->m_id, $song->m_title) ?>"
                               class="song-name"><?php echo $song->m_title; ?></a> -
                            <?php foreach ($list_singer as $key => $singer):
                                if($key != 0){
                                    echo ",";
                                }
                            ?>
                                <a href="" class="singer-name"><?php echo $singer->singer_name ?></a>
                            <?php endforeach; ?>
                            <?php echo count($list_singer) == 0 ? "<span class='singer-name'>Không xác định</span>" : ""; ?>
                        </td>
                        <td width="20%"><span class="glyphicon glyphicon-headphones"> <?php echo $song->m_viewed?></span></td>
                        <td width="20%" align="right">
                            <a class="btn btn-info btn-xs" title="Thêm playlist"><i
                                        class="glyphicon glyphicon-plus"></i></a>
                            <a class="btn btn-danger btn-xs" title="Tải xuống"><i
                                        class="glyphicon glyphicon-download"></i></a>
                            <a href="<?php echo facebook_share(song_url($song->m_id, $song->m_title))?>" class="btn btn-success btn-xs" title="Chia sẻ"><i class="glyphicon glyphicon-share"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php
                if (count($list_song) == 0) {
                    echo '<tr><td>Không có bài hát nào</td></tr>';
                }
                ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation" class="pull-right" style="margin-top: -30px">
                <ul class="pagination">
                    <?= $paging; ?>
                </ul>
            </nav>
        </div>

        <div class="col-md-3">
            <div>
                <a href="#" class="list-group-item active">BXH Bài hát
                </a>
                <ul class="list-group list-chart">
                    <?php foreach ($top_10_song as $key => $song): ?>
                        <li class="list-group-item">
                            <span class="number special-2"><?php echo $key + 1 ?></span>
                            <div class="info_data">
                                <h3><a href="<?php echo song_url($song->m_id, $song->m_title) ?>"
                                       class="name_song"><?php echo $song->m_title ?></a></h3>
                                <h4>
                                    <?php
                                    $list_singer = $this->Singer_Model->get_list_singer_by_media($song->m_id);
                                    ?>
                                    <?php foreach ($list_singer as $singer): ?>
                                    <a href="<?php echo singer_url($singer->singer_id, $singer->singer_name) ?>"
                                       class="name_singer"><?php echo $singer->singer_name; ?></a></h4>
                                <?php endforeach; ?>
                                <?php echo count($list_singer) == 0 ? "<span class='name_singer'>Không xác định</span>" : "" ?>
                            </div>
                            <!--span id="NCTCounter_sg_4581213" class="icon_listen">0</span-->
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- /.div -->

        </div>
    </div>
</div>