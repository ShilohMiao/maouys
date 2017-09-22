<!-- 备案 -->
<div class="footer-beian">
    <div class="container">
        <div class="row">
            <p>猫屋羊舍 | MAOUYS.COM | Shiloh Miao's Blog</p>
            <p>Copyright © 2015-2017 by <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Shiloh Miao</a>.All Rights Reserved. |
                <a href="https://creativecommons.org/licenses/by-nc-nd/4.0" target="_blank">
                    <img src="http://qiniu.maouys.com/image/by-nc-nd.svg" width="76" height="13" title="Creative Commons「署名 - 非商业性使用 - 禁止演绎 4.0」许可协议">
                </a>
            </p>
            <p>Powered by <a href="https://cn.wordpress.org/">WordPress</a>. Designed by <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Shiloh Miao</a>.</p>
            <p><img src="http://www.beian.gov.cn/img/ghs.png" style="width: 16px;margin: 0;" /><a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=33010902001084">浙公网安备 33010902001084号</a> | <a target="_blank" href="http://www.miibeian.gov.cn"> 浙ICP备13036308</a></p>
        </div>
    </div>
</div>

<!-- gototop -->
<div class="container">
    <div class="row">
        <div class="col-xs-1 col-xs-offset-11 hidden-xs hidden-sm">
            <div id="goToTop"><a href="#"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></a></div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

    </body>




    <!-- <script src="http://qiniu.maouys.com/js/jquery.min-1.10.2.js"></script> -->
    <!-- 边栏固定 -->
    <!-- <script src="http://qiniu.maouys.com/js/stickySidebar.js"></script> -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/stickySidebar.js"></script>

    <script>
        //作品内容页面边栏判断
        $(document).ready(function() {
            $('#project-sidebar').stickySidebar({
                footerThreshold: 500
            });
        });

        //返回顶部
        //togotop
        $(document).ready(function() {
            $("#goToTop").hide() //隐藏go to top按钮
            $(function() {
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 1) { //当window的scrolltop距离大于1时，go to top按钮淡出，反之淡入
                        $("#goToTop").fadeIn();
                    } else {
                        $("#goToTop").fadeOut();
                    }
                });
            });
            // 给go to top按钮一个点击事件
            $("#goToTop a").click(function() {
                $("html,body").animate({
                    scrollTop: 0
                }, 800); //点击go to top按钮时，以800的速度回到顶部，这里的800可以根据你的需求修改
                return false;
            });
        });


        //搜索
        function searchToggle(obj, evt) {

            var container = $(obj).closest('.search-wrapper');

            if (!container.hasClass('active')) {
                container.addClass('active');
                evt.preventDefault();
            } else if (container.hasClass('active') && $(obj).closest('.input-holder').length == 0) {
                container.removeClass('active');
                // clear input
                container.find('.search-input').val('');
                // clear and hide result container when we press close
                container.find('.result-container').fadeOut(100, function() {
                    $(this).empty();
                });
            }
        }

        function submitFn(obj, evt) {

            value = $(obj).find('.search-input').val().trim();

            _html = "Yup yup! Your search text sounds like this: ";
            if (!value.length) {
                _html = "Yup yup! Add some text friend :D";
            } else {
                _html += "<b>" + value + "</b>";
            }

            $(obj).find('.result-container').html('<span>' + _html + '</span>');
            $(obj).find('.result-container').fadeIn(100);

            evt.preventDefault();
        }

        /*导航栏在顶部和下滚的不同呈现*/
        $(document).ready(function() {
            $(function() {
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 160) {
                        $("nav.navbar").addClass("navbar-default-notattop");
                    } else {
                        $("nav.navbar").removeClass("navbar-default-notattop");
                    }
                });
            });
        });


        /*判断Wordpress仪表盘，修改导航栏为之*/
        if ($("#wpadminbar").length > 0) {
            $('nav.navbar').addClass('wpadminbar-top');
        }



        /*修改导航栏下拉框鼠标经过弹出*/
        $(document).ready(function() {
            $("li.dropdown").hover(
                function() {
                    $(this).addClass("open");
                },
                function() {
                    $(this).removeClass("open");
                }
            );
        });

    </script>

    <!-- 生成页面二维码 -->
    <script src="http://cdn.bootcss.com/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>
    <script>
        hCount = 0;

        $(document).ready(function() {
            if (hCount == 0) {
                $("#qrcode").qrcode({
                    text: window.location.href,
                    width: 120,
                    height: 120
                });
                hCount = 1;
            }
        });

    </script>


    <!-- <script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script> -->



    </html>
