<?php get_header(); ?>

<div class="container container-content">
    <div class="row">
       
        <!--主内容区域-->
        <!--面包屑 -->
        <?php get_template_part( 'article/breadcrumb'); ?>
        
        <div class="col-md-10">
            
            <?php  
                //循环
                if ( have_posts() ): 
                while ( have_posts() ) : the_post();
                //内容
                get_template_part( 'article/content'); 

                endwhile;
                endif;
                //循环结束
                //翻页
                get_template_part( 'article/next');
            ?>
            
        </div>
        <!--主内容区结束-->
        
        <!--边栏列表-->
        <?php get_template_part( 'article/project-sidebar'); ?>
        
    </div>
</div>

<?php get_footer(); ?>