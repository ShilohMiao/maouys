<!--内容-->
<div class="row mt-20 project">

    <!-- 文章信息 -->
    <div class="col-sm-3 hidden-xs info-bar">
        <div class="info-box">

            <!-- 时间 -->
            <div class="date">
                <?php the_time(  ); ?>
            </div>

            <!-- 分类 -->
            <div class="category">

                <?php
                    if( has_category() ){
                        the_category(' / ');
                    }else{

                        maouys_genre_resources();

                    }		                        
                ?>
            </div>

            <!-- 标签 -->
            <?php if( has_tag() ){ ?>
                <div class="tags">

                    <?php the_tags('',' '); ?>
                </div>
                <?php } ?>

        </div>
    </div>


    <div class="col-sm-9">

        <?php
                //内容页时：
                if( is_single() ){
                    
                    echo '<div class="content-mian content-mian-single">';
                    the_content(); ?>
            <div class="end-box">- END -</div>
            <div class="end-tag-box">标签 :
                <?php
                    if( has_tag() ){
                      the_tags('',' ');
                    }
                ?>
            </div>
            <div id="qrcode" class="end-QRcode-box"></div>
            <div class="end-QRcode-box-em"><em>扫描二维码,分享此文章</em></div>

            <!--前一篇文章-->
            <?php
                        $prev_post = get_previous_post( );   //与当前文章同分类的前一篇文章
                        $next_post = get_next_post( );     //与当前文章同分类的后一篇文章

                        if (!empty( $prev_post )){
                    ?>

                <div class="post-PrevNext" style="margin-top: 60px;">
                    <a href="<?php echo get_permalink( $prev_post->ID ); ?>">

                        <div class="previous_post_link_img">
                            <?php
                                if( has_post_thumbnail($prev_post->ID) ){
                                    echo get_the_post_thumbnail( $prev_post->ID, '', '' ); 
                                }else{
                                    echo '<img src="http://qiniu.maouys.com/image/maouys-%E9%BB%98%E8%AE%A4%E5%9B%BE%E7%89%87.svg">';
                                }     
                            ?>
                        </div>
                        <div class="previous_post_link_bag"></div>
                        <div class="previous_post_link">
                            <em>前一篇文章</em>
                            <h2><?php echo $prev_post->post_title; ?></h2>
                        </div>
                    </a>

                </div>
                <?php }else{ ?>
                    <div class="post-PrevNext">
                        <div class="previous_post_link_bag"></div>
                        <div class="previous_post_link_img"></div>
                        <div class="previous_post_link">
                            <h2>这已经是最后一篇文章了～</h2>
                        </div>
                    </div>

                    <?php } ?>

                        <div class="mine-bigbox">
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





                        <!-- 评论组件 -->
                        <div id="disqus_thread"></div>
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

                        <!--                        不是文章正文页面时：-->
                        <?php }else{ ?>
                            <div class="content-mian">
                                <h2>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                                <?php the_content("继续阅读");   
                }
            ?>

                            </div>
    </div>
</div>
<!--内容结束-->
