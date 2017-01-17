<!--内容-->
<div class="col-sm-4 design-box">
    <div class="design-box-2"> 
        <a href="<?php the_permalink(); ?>">
            <?php
                if( has_post_thumbnail() ){
                    the_post_thumbnail(); 
                }else{
                    echo '<img src="http://qiniu.sjfan.net/maouys/img.jpg" />';
                }   
            ?>
        </a>
        <a class="shiloh-over" href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
            <p><?php echo wp_trim_words( get_the_excerpt(), 60 ,' ...' ); ?></p>
            <em class="timestamp"><?php echo get_the_date( 'F d , Y' ); ?></em>
        </a> 
    </div>
</div>
<!--内容结束-->