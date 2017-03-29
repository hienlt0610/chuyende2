<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="title-section">
                <h3>Tìm kiếm</h3>
            </div>
            <hr>
            <p style="font-size: 20px;">"<?php echo $keyword ?>" có <?php echo count($list_result) ?> kết quả</p>
            <table class="table table-hover list-singer-song table-striped">
                <tbody>
                <?php foreach ($list_result as $result): ?>
                    <?php
                    $list_singer = $this->Singer_Model->get_list_singer_by_media($result->m_id);
                    ?>
                    <tr>
                        <td width="60%">
                            <a href="<?php echo song_url($result->m_id, $result->m_title) ?>"
                               class="song-name"><?php echo $result->m_title; ?></a> -
                            <?php foreach ($list_singer as $key => $singer):
                                if($key != 0){
                                    echo ",";
                                }
                                ?>
                                <a href="" class="singer-name"><?php echo $singer->singer_name ?></a>
                            <?php endforeach; ?>
                            <?php echo count($list_singer) == 0 ? "<span class='singer-name'>Không xác định</span>" : ""; ?>
                        </td>
                        <td width="20%"><span class="glyphicon glyphicon-headphones"> <?php echo $result->m_viewed?></span></td>
                        <td width="20%" align="right">
                            <a class="btn btn-info btn-xs" title="Thêm playlist"><i
                                        class="glyphicon glyphicon-plus"></i></a>
                            <a class="btn btn-danger btn-xs" title="Tải xuống"><i
                                        class="glyphicon glyphicon-download"></i></a>
                            <a href="<?php echo facebook_share(song_url($result->m_id, $result->m_title))?>" class="btn btn-success btn-xs" title="Chia sẻ"><i class="glyphicon glyphicon-share"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php
                if (count($list_result) == 0) {
                    echo '<tr><td>Không có bài hát nào</td></tr>';
                }
                ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation" class="pull-right" style="margin-top: -30px">
                <ul class="pagination">
                </ul>
            </nav>
        </div>


    </div>
</div>