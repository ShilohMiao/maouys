<!--边栏列表-->
<div class="col-md-2 hidden-sm hidden-xs">

<style>
    .sticky {
        margin-top: 160px;
    }
</style>
   
    <?php
        wp_nav_menu( array(   
            'theme_location' => 'primary_sid',
            'container' => false,
            'menu_class' => 'blog-menu',
            'menu_id' => 'project-sidebar',
        ));
    ?>
</div>
<!--边栏列表结束-->