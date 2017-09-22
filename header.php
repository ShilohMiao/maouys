<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <?php
        if (is_home()){ 
            $description = "阿喵/shilohmiao的个人原创博客。交互设计师，浙江-宁波人，毕业于浙江工商大学平面设计专业，现居杭州，就职于恒生电子研发部。 三年博客写作，深度游戏文化爱好者，伪电影点评家，业余摄影爱好者，匍匐在成为“筋肉人”的道路上。";
            $keywords = "sjfan,shilohmiao,猫屋羊舍,苗先洋,阿喵,苗小洋,设计师";
        } elseif (is_single()){
            if ($post->post_excerpt) {
                $description = $post->post_excerpt;
            } else {
                $description = substr(strip_tags($post->post_content),0,220);
            }

            $keywords = ""; 
            $tags = wp_get_post_tags($post->ID);
            foreach ($tags as $tag ) {
            $keywords = $keywords . $tag->name . ", ";
            }
        }
    ?>

        <meta name="keywords" content="<?=$keywords?>" />
        <meta name="description" content="<?=$description?>" />

        <meta <?php bloginfo( 'charset' ); ?>>

        <!-- 移动端支持 -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <!-- 微博验证 -->
        <meta property="wb:webmaster" content="b3e6a7946b1f49da" />

        <title>
            <?php wp_title('&#124;',ture,'right'); ?>
        </title>

        <!--     Bootstrap程序代码-->
        <!-- 新 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
        <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <!-- <script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script> -->
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <!-- iconfont字体样式 -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
        <!-- 搜索JS -->
        <script src="http://qiniu.maouys.com/js/modernizr.custom.js"></script>

        <!--自定义样式-->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">

        <?php wp_head(); ?>

</head>

<body>

    <!--   导航栏-->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="返回首页"></a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <?php
                
                wp_nav_menu( array(   
                'theme_location' => 'primary',   
                'depth' => 2,   
                'container' => false,   
                'menu_class' => 'nav navbar-nav',   
                'fallback_cb' => 'wp_page_menu',   
                //添加或更改walker参数   
                'walker' => new wp_bootstrap_navwalker())   
                );   

                get_search_form(); 
                
                ?>

            </div>

        </div>
    </nav>
