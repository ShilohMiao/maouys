<?php get_header(); ?>

<div class="container container-content">
    <div class="row">
       
        <!--主内容区域-->
        <!--面包屑 -->
        <?php get_template_part( 'article/breadcrumb'); ?>
        
        <div class="col-md-10">
           
            <?php 
                //循环
                while ( have_posts() ) : the_post();
               
                //内容
                get_template_part( 'article/content');
                
                endwhile;
            ?>
            
        </div>
        
        <!--边栏列表-->
        <?php get_template_part( 'article/project-sidebar'); ?>
        
    </div>
</div>

<?php get_footer(); ?>
