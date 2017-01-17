<footer id="footer">
    <div class="container footer">
        
    </div>    
</footer>
<div class="footer-beian">
    <div class="container">
       <div class="row">
            <p><img src="http://www.beian.gov.cn/img/ghs.png" style="width: 16px;margin: 0;" /><a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=33010902001084">浙公网安备 33010902001084号</a> | <a target="_blank" href="http://www.miibeian.gov.cn"> 浙ICP备13036308</a></p>
            <p>Copyright © 2016 BY <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Shiloh Miao</a>.</p>
       </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-1 col-xs-offset-11 hidden-xs hidden-sm">
            <div id="goToTop"><a href="#"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></a></div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
    
<script src="http://qiniu.sjfan.net/js/jquery.min-1.10.2.js"></script>  
<script src="http://qiniu.sjfan.net/js/stickySidebar.js"></script>
<script src="http://qiniu.sjfan.net/js/main.js"></script>
<script src="http://qiniu.sjfan.net/js/typed.js"></script>
<script>
    
    //作品内容页面边栏判断
    $(document).ready(function () {
        $('#project-sidebar').stickySidebar({
            footerThreshold: 500
        });
    });
    
    //返回顶部
    //togotop
    $(document).ready(function () {
        $("#goToTop").hide() //隐藏go to top按钮
        $(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 1) { //当window的scrolltop距离大于1时，go to top按钮淡出，反之淡入
                    $("#goToTop").fadeIn();
                }
                else {
                    $("#goToTop").fadeOut();
                }
            });
        });
        // 给go to top按钮一个点击事件
        $("#goToTop a").click(function () {
            $("html,body").animate({
                scrollTop: 0
            }, 800); //点击go to top按钮时，以800的速度回到顶部，这里的800可以根据你的需求修改
            return false;
        });
    });


    //播放器
    //jQuery is required to run this code
    $(document).ready(function () {
        scaleVideoContainer();
        initBannerVideoSize('.video-container .poster img');
        initBannerVideoSize('.video-container .filter');
        initBannerVideoSize('.video-container video');
        $(window).on('resize', function () {
            scaleVideoContainer();
            scaleBannerVideoSize('.video-container .poster img');
            scaleBannerVideoSize('.video-container .filter');
            scaleBannerVideoSize('.video-container video');
        });
    });

    function scaleVideoContainer() {
        var height = $(window).height() + 5;
        var unitHeight = parseInt(height) + 'px';
        $('.homepage-hero-module').css('height', unitHeight);
    }

    function initBannerVideoSize(element) {
        $(element).each(function () {
            $(this).data('height', $(this).height());
            $(this).data('width', $(this).width());
        });
        scaleBannerVideoSize(element);
    }

    function scaleBannerVideoSize(element) {
        var windowWidth = $(window).width()
            , windowHeight = $(window).height() + 5
            , videoWidth
            , videoHeight;
        console.log(windowHeight);
        $(element).each(function () {
            var videoAspectRatio = $(this).data('height') / $(this).data('width');
            $(this).width(windowWidth);
            if (windowWidth < 1000) {
                videoHeight = windowHeight;
                videoWidth = videoHeight / videoAspectRatio;
                $(this).css({
                    'margin-top': 0
                    , 'margin-left': -(videoWidth - windowWidth) / 2 + 'px'
                });
                $(this).width(videoWidth).height(videoHeight);
            }
            $('.homepage-hero-module .video-container video').addClass('fadeIn animated');
        });
    }

    //橱窗首屏打字效果
    $(function () {
        $("#head-title").typed({
            strings: ["欢迎来到猫屋羊舍^1000", "我是 Shiloh Miao^1000", "一名GUI设计师^1000", "我的梦想是世界和平^5000"]
            , typeSpeed: 100
            , loop: true
            , startDelay: 100
        });
    });


    //搜索
    function searchToggle(obj, evt){
        
        var container = $(obj).closest('.search-wrapper');

        if(!container.hasClass('active')){
              container.addClass('active');
              evt.preventDefault();
        }
        else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
              container.removeClass('active');
              // clear input
              container.find('.search-input').val('');
              // clear and hide result container when we press close
              container.find('.result-container').fadeOut(100, function(){$(this).empty();});
        }
    }

    function submitFn(obj, evt){
        
        value = $(obj).find('.search-input').val().trim();

        _html = "Yup yup! Your search text sounds like this: ";
        if(!value.length){
            _html = "Yup yup! Add some text friend :D";
        }
        else{
            _html += "<b>" + value + "</b>";
        }

        $(obj).find('.result-container').html('<span>' + _html + '</span>');
        $(obj).find('.result-container').fadeIn(100);

        evt.preventDefault();
    }

    /*导航栏在顶部和下滚的不同呈现*/
    $(document).ready(function () {
        $(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 160) {
                    $("nav.navbar").addClass("navbar-default-notattop");
                }else{
                    $("nav.navbar").removeClass("navbar-default-notattop");
                }
            });
        });
    });


    /*判断Wordpress仪表盘，修改导航栏为之*/
    if ($("#wpadminbar").length > 0){   
        $('nav.navbar').addClass('wpadminbar-top');
    }



</script>

</html>
