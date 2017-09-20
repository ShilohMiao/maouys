<!--内容-->
<div class="col-sm-4 design-box">
    <div class="design-box-2">
        <a href="<?php the_permalink(); ?>">
            <?php
                if( has_post_thumbnail() ){
                    the_post_thumbnail(); 
                }else{
                    echo '<img src="http://qiniu.maouys.com/maouys/img.jpg" />';
                }   
            ?>
        </a>
        <a class="shiloh-over" href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
            <p>
                <?php echo wp_trim_words( get_the_excerpt(), 60 ,' ...' ); ?>
            </p>

            <div class="design-info">
                <div class="info-box">
                    <?php
                    echo '发表于：';
                    the_time( );
                    echo '<br>分&#8195;类：';
                    maouys_genre_onname();                   
                ?>
                </div>
                <div class="info-author">
                    <img src="http://qiniu.maouys.com/image/headportrait-72.png" alt="">
                </div>
            </div>
        </a>
    </div>
</div>
<!--内容结束-->
