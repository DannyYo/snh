<style>

    /* Smartphones (portrait and landscape) ———– */
    @media only screen
    and (min-device-width : 320px)
    and (max-device-width : 480px) {
        .carousel{
            display: none;
        }
    }
    /* iPads (portrait) ———– */

    @media only screen
    and (min-device-width : 768px)
    and (max-device-width : 1024px)
    and (orientation : portrait) {
        /* Styles */
    }
    body{
        padding-top: 0;
    }
    .roll-button:hover{
        background-color:#D65050;
        color:#FFFFFF;
        text-decoration: none;
        border: 1px solid #D65050;
    }
    .roll-button {
        margin: 0 auto;
        text-align: center;
        background-color: transparent;
        width: 250px;
        height: 50px;
        border: 1px solid #FFFFFF;
        z-index: 300;
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
        color: #FFFFFF;
        text-transform: uppercase;
        border-radius: 3px;
    }
</style>
<div style="overflow:hidden;">
    <div id="myCarousel" class="carousel slide" style="height: 500px">
        <!-- 轮播（Carousel）指标 -->
        <a  id="go" href="#top"><div class="roll-button">Click to begin</div></a>

        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0"
                class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner">

            <div class="item active">
                <img src="img/L1.jpg" alt="First slide" class="carousel-inner img-responsive img-rounded" alt="Responsive image">

<!--                            <a href="#primary" class="roll-button button-slider">Click to begin</a>-->
            </div>
            <div class="item">
                <img src="img/L2.jpg" alt="Second slide" class="carousel-inner img-responsive img-rounded" alt="Responsive image">
            </div>
            <div class="item">
                <img src="img/L3.jpg" alt="Third slide" class="carousel-inner img-responsive img-rounded" alt="Responsive image">
            </div>
        </div>
        <!-- 轮播（Carousel）导航 -->
        <a class="carousel-control left" href="#myCarousel"
           data-slide="prev"></a>
        <a class="carousel-control right" href="#myCarousel"
           data-slide="next"></a>
    </div>
</div>
@section('styles')
<script>
    $('document').ready(function(){

        $('#go').click(function(event){
//            alert("dd");
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
//        $('#myCarousel').carousel({
//            interval: 3000
//        });
//        $("#myCarousel").carousel('cycle');
    });
</script>
@endsection