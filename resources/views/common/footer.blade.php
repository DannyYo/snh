<style>
    .go-top.show {
        opacity: 1;
        visibility: visible;
        bottom: 11px;
    }
    .go-top:hover {
        background-color: #b0b0b0;
        color:#D65050;
        text-decoration: none;
    }
    .go-top {
        background-color: #D65050;
        position: fixed !important;
        right: 20px;
        bottom: -45px;
        color: #FFF;
        display: block;
        font-size: 22px;
        line-height: 35px;
        text-align: center;
        width: 40px;
        height: 40px;
        visibility: hidden;
        opacity: 0;
        z-index: 9999;
        cursor: pointer;
        border-radius: 2px;
    }
</style>

<!-- go-top button -->
<a class="go-top" href="#top"  id="go-top"><i class="fa fa-angle-up"></i></a>
<div class="container">
    <footer>
        <div class="row">
            <div class="col-lg-12">

                <ul class="list-unstyled">
                    <li><a href="http://git.oschina.net/dannyyo/SNH">Git@OSC</a></li>
                </ul>
                <p>Made by <a href="https://github.com/DannyYo" rel="nofollow"><i class="fa fa-github"> DannyYo</i></a>. Contact him at <a href="mailto:dannyyo@foxmail.com">dannyyo@foxmail.com</a>.</p>
                <p>Code released under the <a href="https://github.com/thomaspark/bootswatch/blob/gh-pages/LICENSE">MIT License</a>.</p>
                <p>Based on <a href="http://getbootstrap.com/" rel="nofollow">Bootstrap</a>. Icons from <a href="http://fortawesome.github.io/Font-Awesome/" rel="nofollow">Font Awesome</a>. Web fonts from <a href="http://www.google.com/webfonts" rel="nofollow">Google</a>.</p>

            </div>
        </div>

    </footer>
</div>
<script>
    window.onscroll = function () {
        if (document.documentElement.scrollTop + document.body.scrollTop > 1500) {
            $("#go-top").addClass('show');
        }
        else {
            $("#go-top").removeClass('show');
        }
    }
    $("#go-top").on("click",function(event){
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
</script>