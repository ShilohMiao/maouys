<?php get_header(); ?>

    <div class="page-header" style="height: 40px;display: none;"></div>
    <div class="container design-content">
        <div class="row">


            <!--循环-->
            <?php while ( have_posts() ) : the_post(); ?>

                <!--边栏-->
                <div class="design-sidbar">
                    <div class="design-title">
                        <h4><?php echo the_title(); ?></h4>
                    </div>
                    <!-- 简介 -->
                    <?php if( has_excerpt() ){ ?>
                        <div class="design-sidbar-content">
                            <div class="design-art"><strong>简介</strong> </div>
                            <?php the_excerpt(); ?>
                        </div>
                        <?php } ?>

                            <!-- 信息 -->
                            <div id="project-sidebar" class="design-sidbar-content">
                                <div class="design-title">
                                    <h4><?php echo the_title(); ?></h4>
                                </div>
                                <!-- 时间 -->
                                <div class="design-deta">
                                    创作于 :
                                    <?php the_field('design_time'); ?>
                                </div>

                                <!-- 工具 -->

                                <div class="design-tool">
                                    <?php the_field('design_tool'); ?>
                                </div>

                                <!-- 标签 -->

                                <div class="design-tags">
                                    <strong>标签</strong>
                                    <div class="design-tags-box">
                                        <?php maouys_genre_tags(); ?>
                                    </div>
                                </div>

                                <!-- 版权 -->
                                <div class="design-banquan">
                                    <div class="banquan-img">
                                        <a href="https://creativecommons.org/licenses/by-nc-nd/4.0" target="_blank">
                                            <img src="http://qiniu.maouys.com/image/by-nc-nd.svg" title="Creative Commons「署名 - 非商业性使用 - 禁止演绎 4.0」许可协议">
                                        </a>
                                    </div>
                                    版权声明：本作品为原创内容，遵循 Creative Commons「署名 - 非商业性使用 - 禁止演绎 4.0」许可协议，转载请告知。
                                </div>

                            </div>

                </div>
                <!--边栏结束-->

                <!--内容区域-->
                <div id="content" class="content-box-x">
                    <div class="design-content-inbox">
                        <?php the_content(); ?>

                    </div>
                    <div class="end-box" style="margin-top: 60px;">- END -</div>
                    
                    
                    <div class="design-end-box">
                        <div class="row">
                            <div class="col-sm-4">
                                <div id="qrcode" class="end-QRcode-box"></div>
                                <div class="end-QRcode-box-em"><em>扫描二维码,分享此文章</em></div>
                            </div>
                            <div class="col-sm-8 netx-box-x">
                                <div class="row">
                                    <?php      
                                        $prev_post = get_previous_post($current_category,'');                   //与当前文章同分类的上一篇文章
                                        if (!empty( $prev_post )):
                                    ?>
                                    <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
                                        <div class="col-sm-5">
                                            <?php echo get_the_post_thumbnail( $prev_post->ID, '', '' ); ?>
                                        </div>
                                        <div class="col-sm-7">
                                            <h3><?php echo $prev_post->post_title; ?></h3>
                                            <p><?php echo $prev_post->post_excerpt; ?></p>
                                        </div>
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="mine-bigbox" style="    padding: 40px 60px;">
                        <div class="mine-header-img">
                            <img src="http://qiniu.maouys.com/image/mine-header.jpg" alt=""     width="100%";>
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

                    <!-- 评论组件 -->
                    <div id="disqus_thread"style="    padding: 0 60px;"></div>
                    <script>
                        /**
                            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                        /*
                        var disqus_config = function () {
                        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        */
                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document,
                                s = d.createElement('script');
                            s.src = 'https://maouys.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();

                    </script>

                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    <!-- 评论结束 -->
                    

                </div>

            <?php endwhile; ?>
            <!--循环结束-->

        </div>
    </div>
    <!-- <div class="contentfooterbottom" style="height: 110px;display: none;"></div> -->
    <!-- 前一篇文章 -->
    <!-- <div class="container" style="margin-bottom: 80px;">
        <div class="row">
            <div class="design-sidbar" style="height:1px;"> </div>
            <div class="nex-post">
                <div class="post-PrevNext">
                    <?php      
                $prev_post = get_previous_post($current_category,'');//与当前文章同分类的上一篇文章
                if (!empty( $prev_post )):
            ?>
                        <a href="<?php echo get_permalink( $prev_post->ID ); ?>">

                            <div class="previous_post_link_img">
                                <?php echo get_the_post_thumbnail( $prev_post->ID, '', '' ); ?>
                            </div>
                            <div class="previous_post_link_bag"></div>
                            <div class="previous_post_link">
                                <em>继续阅读前一篇文章</em>
                                <h1><?php echo $prev_post->post_title; ?></h1>
                            </div>
                        </a>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </div> -->


    <?php get_footer(); ?>
