<?php get_header(); ?>

<div class="container container-content">
    <div class="row">
       
        <!--主内容区域-->
        <!--面包屑 -->
        <?php get_template_part( 'article/breadcrumb'); ?>
        
        <div class="col-md-10">
            
            <?php  
                //查询
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    // 不包含ID = 9 （技术代码）的文章分类
                    'category__not_in'   => array(9),
                    'paged' => $paged
                );
                query_posts($args);
                //循环
                if ( have_posts() ): 
                while ( have_posts() ) : the_post();
            
                //内容
                get_template_part( 'article/content'); 
            
                endwhile;
                endif;
            
                //翻页
                get_template_part( 'article/next'); 

                wp_reset_query();
            ?>
            
        </div>
        <!--主内容区结束-->
        
        <!--边栏列表-->
        <?php get_template_part( 'article/project-sidebar'); ?>
        
    </div>
</div>

<?php get_footer(); ?>