<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta <?php bloginfo( 'charset' ); ?>>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- 微博验证 -->
    <meta property="wb:webmaster" content="b3e6a7946b1f49da" />
    <title>
        <?php wp_title('&#124;',ture,'right'); ?>
    </title>
    <?php wp_head(); ?>
        <!--     Bootstrap程序代码-->
        <!-- 新 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
        <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
        <script src="http://qiniu.sjfan.net/js/modernizr.custom.js"></script>
        <!--自定义样式-->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
        <?php wp_head(); ?>
</head>

<body>
    <!--   header-->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="返回首页"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
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
                    <!-- /.col-lg-6 -->
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>
    <!--    header END-->
    <!--    content-->
    
    <?php
        if(is_page('home')){

        }elseif(is_single()){
    ?>
    <div class="page-header single-header"> 
        <div class="header-img">
            <?php
                if( has_post_thumbnail() ){
                    echo the_post_thumbnail();
                }else{
                    echo '<img src="http://qiniu.sjfan.net/image/sjfan-bg-01.svg" alt="">';
                }
            ?>            
        </div>        
        <div class="header-title container">
            <h1><?php echo the_title(); ?></h1>
        </div>
    </div>
    <?php
        }else{
    ?>
    <div class="page-header">
        <div class="header-img">
            <img src="http://qiniu.sjfan.net/image/sjfan-bg-01.svg" alt="">
        </div>
    </div>
    <?php
        }
    ?>      
               
    
    
