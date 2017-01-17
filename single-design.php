<?php get_header(); ?>

<div class="container design-content">
    <div class="row">

        <!--循环-->
        <?php while ( have_posts() ) : the_post(); ?>

            <!--内容区域-->
            <div id="content" class="col-md-9">
               
                <?php the_content(); ?>
                <div class="end-box">—— END ——</div>
              
                <!-- 前一篇文章 -->
                <div class="post-PrevNext">
                    <?php      
                        $prev_post = get_previous_post($current_category,'');//与当前文章同分类的上一篇文章
                        if (!empty( $prev_post )):
                    ?>
                    <div class="previous_post_link_bag"></div>
                    <div class="previous_post_link_img">
                        <?php echo get_the_post_thumbnail( $prev_post->ID, '', '' ); ?>
                    </div>

                    <div class="previous_post_link">                     
                        <em>继续阅读前一篇文章</em>
                        <h2><a href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo $prev_post->post_title; ?></a></h2> 
                    </div>
                    <?php endif; ?>
                </div>
            </div>


            <!--边栏-->
            <div class="col-md-3 hidden-sm hidden-xs design-sidbar">
              
               <!-- 简介 -->
               <?php if( has_excerpt() ){ ?>
               <div class="design-sidbar-content">               
                    <?php the_excerpt(); ?>
                </div>
                <?php } ?>
                
                <!-- 信息 -->
                <div id="project-sidebar" class="design-sidbar-content">
                   
                    <!-- 时间 -->
                    <div class="design-deta">
                        发布于 : <?php echo get_the_date( 'F d , Y' ); ?>
                    </div>
                    
                    <!-- 工具 -->
                    <div class="design-tool">
                        
                            <?php the_field('design_tool'); ?>
                        
                    </div>
                    
                    <!-- 标签 -->
                    <div class="design-tags">
                        <strong>标签</strong>
                        <div class="design-tags-box">
                            <?php maouys_genre_tags(); ?>
                        </div>
                    </div>
                    
                    <!-- 版权 -->
                    <div class="design-banquan">
                        
                    </div>
                    
                </div>
                
            </div>
            <!--边栏结束-->

        <?php endwhile; ?>
        <!--循环结束-->

    </div>
</div>

<?php get_footer(); ?>
