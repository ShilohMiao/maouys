<div class="col-sm-12">
    <div class="row">
        <div class="col-md-10">
            <!--面包削-->
            <?php if( function_exists( 'bcn_display' ) ): ?>
                <div class="row hidden-xs">
                    <?php if(is_page() && empty(is_page('blog'))){ ?>
                        <div class="col-sm-8 col-sm-offset-4">
                            <ol class="breadcrumb">
                                <?php bcn_display(); ?>
                            </ol>
                        </div>
                        <?php }else{ ?>
                            <div class="col-sm-9 col-sm-offset-3">
                                <ol class="breadcrumb">
                                    <?php bcn_display(); ?>
                                </ol>
                            </div>
                            <?php } ?>
                </div>
                <?php endif; ?>
                    <!--面包削结束-->
        </div>
    </div>
</div>
