<?php get_header(); ?>
<div class="page-header" style="height: 140px;display: none;"></div>
<div class="container container-content" style="margin-top: 80px;">
    <div class="row">
       
        <!--主内容区域-->
        
        <!--面包屑 -->
        <?php get_template_part( 'article/breadcrumb'); ?>
        <h1 class="single-h1"><?php echo the_title(); ?></h1>
        <div id="content" class="col-md-10">
           
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
<div class="contentfooterbottom" style="height: 430px;display: none;"></div>
<?php get_footer(); ?>
