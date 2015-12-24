<style>
    body{
        padding-top: 0;
    }
    .roll-button:hover{
        background-color:#D65050;
        color:#FFFFFF;
        text-decoration: none;
    }
    .roll-button {
        background-color:  rgba(255, 255, 255, 0);
        border: 1px solid #D65050;
    }
    .roll-button {
        position: absolute;
        left: 35%;
        right: 35%;
        bottom: 100px;
        display: inline-block;
        font-family: "Raleway",sans-serif;
        font-size: 13px;
        line-height: 24px;
        font-weight: 700;
        padding: 12px 35px;
        color: #D65050;
        text-transform: uppercase;
        border-radius: 3px;
    }

</style>
<script>
    $('document').ready(function(){

        $('#go').bind('click',function(event){
            var $anchor = $(this);

            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 102
            }, 1500,'easeInOutExpo');
            /*
             if you don't want to use the easing effects:
             $('html, body').stop().animate({
             scrollTop: $($anchor.attr('href')).offset().top
             }, 1000);
             */
            event.preventDefault();
        });
        // 初始化轮播
        $('#myCarousel').carousel({
            interval: 3000
        });
        $("#myCarousel").carousel('cycle');
    });
</script>
<div style="overflow:hidden;">

    <div id="myCarousel" class="carousel slide">
        <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">
            <!--        div的active类属性有问题-->
            <div ><h2><a href="#top" class="roll-button" id="go">Click to begin</a></h2></div>
            <li data-target="#myCarousel" data-slide-to="0"
                class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>

        </ol>
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner">

            <div class="item active">
                <img src="img/L1.jpg" alt="First slide">

                <!--            <a href="#primary" class="roll-button button-slider">Click to begin</a>-->
            </div>
            <div class="item">
                <img src="img/L2.jpg" alt="Second slide">
            </div>
            <div class="item">
                <img src="img/L3.jpg" alt="Third slide">
            </div>
        </div>
        <!-- 轮播（Carousel）导航 -->
        <a class="carousel-control left" href="#myCarousel"
           data-slide="prev"></a>
        <a class="carousel-control right" href="#myCarousel"
           data-slide="next"></a>
    </div>
</div>
<br/>
<br/>
