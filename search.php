<?php get_header(); ?>

    <div class="container container-content">
        <div class="row">
            <div id="content" class="col-md-12 project ">

                <!--面包削-->
                <?php if( function_exists( 'bcn_display' ) ): ?>
                    <ol class="breadcrumb">
                        <?php bcn_display(); ?>
                    </ol>
                <?php endif; ?>
                <!--面包削结束-->
                
                <!--内容-->
                <!--循环-->
                <?php   
                    if ( have_posts() ): 
                    while ( have_posts() ) : the_post();
                ?>
                <!--循环end-->
                
                <div class="row mt-50 search-content">
                    <!--标题-->
                    <div class="col-sm-12 ">
                        <div class="search-title">
                            <h2><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title()); ?></a></h2>
                        </div>
                    </div>
                    <!--标题结束-->
                    <div class="col-sm-3">
                        <div id="post-bar" class="post-search">
                            <div class="post-bar-2 post-date"><a href=""><?php echo get_the_date( 'F d , Y' ); ?></a></div>
                            <div class="post-bar-2"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                        <?php
                                if( has_category() ){
                                    the_category(' / ');
                                }else{
                                    echo '<ul>';
                                    maouys_genre();
                                    echo '</ul>';
                                }		                        
                           ?>
                        </div>
                            <div class="post-bar-2 post-tags">
                                <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                                <div class="tags-box">
                                <?php
                                    if(has_tag()) {
                                    the_tags('',' '); 	
                                    }else{
                                    maouys_genre_tags();
                                    }
                                ?>
                                </div>
                            </div>  
                        
                        </div>
                    </div>
                    <div class="col-sm-5">
                        
                        
                        <p class="search-p">
                            <?php
                                if(has_excerpt()){
                                    echo wp_trim_words( get_the_excerpt(), '160');
                                }else{
                                    echo wp_trim_words( get_the_content(), '160');
                                }
                            ?>
                        </p>

                    </div>
                    <!--图片-->
                    <div class="col-sm-4 search-img">
                    <?php 
                        if( has_post_thumbnail()){
                            the_post_thumbnail(); 
                        }else{
                            $content = $post->post_content;
                            preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
                            $n = count($strResult[1]);
                            if($n > 0){
                                echo '<img src="'.$strResult[1][0].'" />';
                            }else {
                                echo '<img src="http://qiniu.sjfan.net/maouys/img.jpg" />';
                            }
                        }   
                    ?>  

                    </div>
                    <!--图片结束-->
                    
                </div>
                <!--循环结束-->
                <?php 
                    endwhile;
                    else :
                ?>
                <div class="row mt-50 mb-200">
                    <div class="col-sm-2 search-img">
                        <img src="http://qiniu.sjfan.net/wp-content/uploads/2016/07/404-error.jpg" alt="">
                    </div>
                    <div class="col-sm-10">
                        <h1>未找到相关信息</h1>
                    <p>似乎还没有相关的文章或作品，请尝试其他关键词检索或 <a href="<?php echo esc_url( home_url( '/' ) ); ?>">返回首页</a> 。</p>
                    </div>  
                </div>            
                <?php
                    endif; 
                ?>
                <!--循环结束end-->
                <!--内容结束-->
                
                <!--翻页-->
                <div class="search-pager">
                    <nav>
                        <ul class="pager">
                            <li class="previous">
                                <?php previous_posts_link( __( '<span aria-hidden="true">&larr;</span> 往后翻页' ) ); ?>
                            </li>
                            <li class="next">
                                <?php next_posts_link( __( '往前翻页<span aria-hidden="true">&rarr;</span>' ) ); ?>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!--翻页结束-->
            </div>
            
        </div>
    </div>

<?php get_footer(); ?>
