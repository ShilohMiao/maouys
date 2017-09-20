<div class="col-xs-12 hidden-xs">
    <div class="row design-nav">

        <!--面包削-->
        <?php if( function_exists( 'bcn_display' ) ): ?>
            <div class="col-sm-4">
                <ol class="breadcrumb">
                    <?php bcn_display(); ?>
                </ol>
            </div>
            <?php endif; ?>
                <!--面包削结束-->

                <!--分类导航-->
                <div class="col-sm-8">
                    <?php
            wp_nav_menu( array(   
            'theme_location' => 'primary_detag',
            'container' => false,
            ));
            ?>
                </div>
                <!--分类导航结束-->

    </div>
</div>
