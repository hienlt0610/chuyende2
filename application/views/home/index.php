<div class="row">
    <!-- side bar -->
    <div class="col-md-3">
        <div>
            <a href="#" class="list-group-item active">BXH Bài hát
				</a>
            <ul class="list-group list-chart">
                <?php
						foreach($list_top_song as $key=> $song):
                        $list_singer = $this->Singer_Model->get_list_singer_by_media($song->m_id);
                ?>
                <li class="list-group-item">
                    <span class="number special-2"><?php echo ($key+1);?></span>
                    <div class="info_data">
                        <h3><a href="<?=song_url($song->m_id, $song->m_title)?>" class="name_song"><?=$song->m_title?></a></h3>
                        <h4>
                            <?php
                                foreach ($list_singer as $singer){
                                    echo "<a href=\"".singer_url($singer->singer_id, $singer->singer_name)."\" class=\"name_singer\">".$singer->singer_name."</a>";
                                }
                                if(count($list_singer) == 0){
                                    echo "<a href=\"#\" class=\"name_singer\">Không xác định</a>";
                                }
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
        <!-- /.div -->

    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="row">
            <img class="img-responsive" src="http://avatar.nct.nixcdn.com/slideshow/2017/03/07/c/6/c/c/1488855574418_org.jpg">
        </div>

        <?php foreach($list_category as $category): ?>
            <div class="row list-music">
                <div class="tile_box_key">
                    <h3><a href="<?=category_url($category->cate_id, $category->cate_name)?>"><?php echo $category->cate_name?></a></h3>
                </div>
                <div class="row">
                    <?php foreach($category->songs as $song): ?>
                        <div class="col-md-3 text-center col-sm-6 col-xs-6">
                            <div class="thumbnail">
                                <a href="<?php echo song_url($song->m_id, $song->m_title);?>"><img src="<?php echo !empty($song->m_poster) ? $song->m_poster: NO_PICTURE?>" alt="" /></a>
                                <div class="caption">
                                    <h4><a href="<?php echo song_url($song->m_id, $song->m_title);?>"><?php echo $song->m_title?></a></h4>
                                    <span>
                                        <?php
                                            foreach ($song->singer as $singer){
                                                echo "<a href='".singer_url($singer->singer_id, $singer->singer_name)."'>".$singer->singer_name."</a>";
                                            }
                                            if(count($song->singer) == 0){
                                                echo 'Không xác định';
                                            }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach;?>
        <div class="row">
            <ul class="pagination alg-right-pad">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
</div>