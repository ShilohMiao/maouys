<!--翻页-->
<div class="row">
    <div class="col-sm-9 col-sm-offset-3">
        <nav class="page-link">
            <ul class="pager row">
                <li class="previous col-sm-6">
                    <?php previous_posts_link( __( '<span aria-hidden="true">&larr;</span> 往后翻页' ) ); ?> </li>
                <li class="next col-sm-6">
                    <?php next_posts_link( __( '往前翻页<span aria-hidden="true">&rarr;</span>' ) ); ?> </li>
            </ul>
        </nav>
    </div>
</div>
<!--翻页结束-->
