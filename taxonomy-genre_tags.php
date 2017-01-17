<?php get_header(); ?>

<div class="container container-content design">
    <div class="row">
        <div class="content-mian-design">
           
            <?php 
                //面包屑
                get_template_part( 'design/breadcrumb');

                //循环
                if ( have_posts() ) :
                while ( have_posts() ) : the_post();

                //内容
                get_template_part( 'design/content');

                endwhile;
                endif;
            ?>
            
        </div> 
        
        <!--翻页-->
        <?php get_template_part( 'design/next'); ?>  
            
    </div>
</div>
    
<?php get_footer(); ?>