<?php get_header(); ?>
    <div class="page-header" style="height: 140px;display: none;"></div>
    <div class="container container-content" style="margin-top: 80px;">
        <div class="row">

            <!--主内容区域-->
            <!--面包屑 -->
            <?php get_template_part( 'article/breadcrumb'); ?>
                <!--面包屑結束 -->
                <h1 class="page-h1"><?php echo the_title(); ?></h1>
                <div id="content" class="col-md-10">
                    <div class="row mt-20 project">
                        <div class="col-sm-4 hidden-xs">
                            <div class="page-bar">
                                <?php dynamic_sidebar( 'sidebar-left' ); ?>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="content-mian content-mian-single">
                                <!--循环-->
                                <?php 
                            while ( have_posts() ) : the_post();

                            the_content();
                            echo '<div class="end-box">- END -</div>';

                            endwhile; 
                        ?>
                                    <!--循环结束-->

                                    <div id="qrcode" class="end-QRcode-box"></div>
                                    <div class="end-QRcode-box-em"><em>扫描二维码,分享此文章</em></div>


                                    <div class="mine-bigbox" style="margin-bottom: -60px;">
                                        <div class="mine-header-img">
                                            <img src="http://qiniu.maouys.com/image/mine-header.jpg" alt="">
                                        </div>
                                        <div class="mine-about-box">
                                            <p>交互设计师，浙江-宁波人，毕业于浙江工商大学平面设计专业，现居杭州，就职于恒生电子研发部。
                                                <br> 三年博客写作，深度游戏文化爱好者，伪电影点评家，业余摄影爱好者，匍匐在成为“筋肉人”的道路上。
                                            </p>
                                        </div>
                                        <div class="info-footer">
                                            <div class="box">
                                                <a href="https://www.behance.net/miaoxiaoyang" target="_blank" title="Behance"><span class="icon-behance"></span></a>
                                                <a href="http://www.zcool.com.cn/u/13188789" target="_blank" title="站酷"><span class="icon-zcool"></span></a>
                                                <a href="http://i.ui.cn/ucenter/122507.html" target="_blank" title="UI中国"><span class="icon-ui-china"></span></a>
                                                <a href="https://www.facebook.com/shilohmiao" target="_blank" title="Facebook"><span class="icon-facebook"></span></a>
                                                <a href="https://www.instagram.com/shilohmiao/" target="_blank" title="Instagram"><span class="icon-instegranme"></span></a>
                                                <a href="http://weibo.com/shilohmiao" target="_blank" title="微博"><span class="icon-weibo"></span></a>
                                                <a href="https://www.zhihu.com/people/shilohmiao" target="_blank" title="知乎"><span class="icon-zhihu"></span></a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!--边栏列表-->
                <?php get_template_part( 'article/project-sidebar'); ?>

        </div>
    </div>
    <div class="contentfooterbottom" style="height: 210px;display: none;"></div>
    <?php get_footer(); ?>
