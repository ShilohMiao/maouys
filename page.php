<?php get_header(); ?>
    <div class="container container-content">
        <div class="row">
          
           <div  class="col-md-3 col-sm-4 hidden-xs"> 
               
                
                
                
            </div>
            
            <div class="col-md-7 col-sm-8">
               
                <!--内容-->
                <div class="content-mian mt-20" style="overflow:hidden;">
                    <!--循环-->
                    <?php 
                        while ( have_posts() ) : the_post();
                    
                        the_content();
                    
                        echo '<div class="end-box">—— END ——</div>';
                            
                        endwhile; 
                    ?>
                    <!--循环结束-->
                </div>
                <!--内容结束-->
                
            </div>
            
            <!--边栏列表-->
            <div class="col-md-2 hidden-sm hidden-xs"></div>

        </div>
    </div>
    <?php get_footer(); ?>