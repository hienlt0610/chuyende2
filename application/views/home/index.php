<div class="row">
    <!-- side bar -->
    <div class="col-md-3">
        <div>
            <a href="#" class="list-group-item active">BXH Bài hát
				</a>
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
        <!-- /.div -->

    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="row">
            <img class="img-responsive" src="http://avatar.nct.nixcdn.com/slideshow/2017/03/07/c/6/c/c/1488855574418_org.jpg">
        </div>

        <div class="row list-music">
            <div class="tile_box_key">
                <h3><a title="Music Video" href="http://www.nhaccuatui.com/video-giai-tri-funny-clip.html">Phim | Hài Kịch</a></h3>
            </div>
			<div class="row">
				<?php for($i=1;$i<=20;$i++): ?>
				<div class="col-md-3 text-center col-sm-6 col-xs-6">
					<div class="thumbnail">
						<a href="<?php echo song_url(1,"Im lặng và ra đi - Khánh Phương");?>"><img src="http://avatar.nct.nixcdn.com/mv/2017/03/07/c/4/e/a/1488853651019_268.jpg" alt="" /></a>
						<div class="caption">
							<h4><a href="<?php echo song_url(1,"Im lặng và ra đi - Khánh Phương");?>">Im lặng và ra đi</a></h4>
							<span><a href="<?php echo song_url(1,"Im lặng và ra đi - Khánh Phương");?>">Khánh Phương</a></span>
						</div>
					</div>
				</div>
				<?php endfor; ?>
			</div>
        </div>
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