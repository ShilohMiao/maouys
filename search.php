<?php get_header(); ?>
    <?php get_template_part( 'headerimg-max'); ?>
        <div class="container container-content">
            <div class="row">

                <!--主内容区域-->
                <!--面包屑 -->
                <?php get_template_part( 'article/breadcrumb'); ?>

                    <div id="content" class="col-md-10">

                        <?php
                //循环
                if ( have_posts() ): 
                while ( have_posts() ) : the_post();
            ?>

                            <!--内容-->
                            <div id="content" class="row mt-20 project">

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
                                    maouys_genre();

                                }		                        
                            ?>
                                        </div>

                                        <!-- 标签 -->
                                        <div class="tags">
                                            <?php 
                            if( has_tag() ){         
                                the_tags('',' ');
                            }else{
                                maouys_genre_tags();
                            }
                        ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-9">
                                    <div class="content-mian">
                                        <h2>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                                        <div class="search-thumbnail">
                                            <?php 
                                if( has_post_thumbnail()){
                                    the_post_thumbnail(); 
                                }else{
                                    $content = $post->post_content;
                                    preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER); $n = count($strResult[1]); if($n > 0){ echo '<img src="'.$strResult[1][0].'" />'; }else { echo '<img src="http://qiniu.maouys.com/image/maouys-%E9%BB%98%E8%AE%A4%E5%9B%BE%E7%89%87.svg" />'; } } ?>
                                        </div>
                                        <p>
                                            <?php 
                            if(has_excerpt()){
                                echo wp_trim_words( get_the_excerpt(), '160');
                            }else{
                                echo wp_trim_words( get_the_content(), '160');
                            }
                        ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <?php
                endwhile;
            
                else:
            ?>
                                <div class="col-sm-9 col-sm-offset-3">
                                    <h1>未找到相关信息</h1>
                                    <p>似乎还没有相关的文章或作品，请尝试其他关键词检索或 <a href="<?php echo esc_url( home_url( '/' ) ); ?>">返回首页</a> 。</p>
                                </div>
                                <?php
                endif;
                //循环结束
                //翻页
                get_template_part( 'article/next');
            ?>

                    </div>
                    <!--主内容区结束-->

                    <!--边栏列表-->
                    <?php get_template_part( 'article/project-sidebar'); ?>

            </div>
        </div>

        <?php get_footer(); ?>
