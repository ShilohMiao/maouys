<!--内容-->
<div id="content" class="row mt-20 project">
   
    <!-- 文章信息 -->
    <div class="col-sm-3 hidden-xs info-bar">
        <div class="info-box">
           
            <!-- 时间 -->
            <div class="date">           
                <?php the_time(  ); ?>
            </div>

            <!-- 分类 -->
            <div class="category">

                <?php
                    if( has_category() ){
                        the_category(' / ');
                    }else{

                        maouys_genre_resources();

                    }		                        
                ?>
            </div>

            <!-- 标签 -->
            <?php if( has_tag() ){ ?>
                <div class="tags">

                    <?php the_tags('',' '); ?>
                </div>
            <?php } ?>
            
        </div>
    </div>
    
    
    <div class="col-sm-9">
        <div class="content-mian">
          
           <?php
                //内容页时：
                if( is_single() ){
                    
                    the_content(); ?>
                    <div class="end-box">—— END ——</div>

                    <!--前一篇文章-->
                    <?php
                        $prev_post = get_previous_post( );   //与当前文章同分类的前一篇文章
                        //$next_post = get_next_post( );     //与当前文章同分类的后一篇文章

                        if (!empty( $prev_post )){
                    ?>

                    <div class="post-PrevNext">
                        <div class="previous_post_link_bag"></div>
                        <div class="previous_post_link_img">
                            <?php echo get_the_post_thumbnail( $prev_post->ID, '', '' ); ?>
                        </div>
                        <div class="previous_post_link">                     
                            <em>继续阅读前一篇文章</em>
                            <h2>
                                <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
                                    <?php echo $prev_post->post_title; ?>
                                </a>
                            </h2> 
                        </div>
                    </div>
                    <?php }else{ ?>
                    <div class="post-PrevNext">
                        <div class="previous_post_link_bag"></div>
                        <div class="previous_post_link_img"></div>
                        <div class="previous_post_link">                     
                            <h2>这已经是最后一篇文章了～</h2> 
                        </div>
                    </div>
                    <?php }
                //否则：
                }else{ ?>
                    <h2>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <?php the_content("继续阅读");   
                }
            ?>
            
        </div>
                
    </div>
</div>
<!--内容结束-->