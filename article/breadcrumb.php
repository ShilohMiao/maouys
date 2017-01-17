<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-10">
        <!--面包削-->
        <?php if( function_exists( 'bcn_display' ) ): ?>
            <div class="row hidden-xs">
                <div class="col-sm-9 col-sm-offset-3">
                    <ol class="breadcrumb">
                        <?php bcn_display(); ?>
                    </ol>
                </div>
            </div>
        <?php endif; ?>
        <!--面包削结束-->
        </div>
    </div>
</div>