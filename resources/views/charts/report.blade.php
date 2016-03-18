@extends('home')
@section('title', '身体报告')
@section('content')
<div class="bs-docs-section">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-12" style="text-align: center">
                <h1>一周身体报告</h1>
            </div>
        </div>
    </div>
</div>
<div class="bs-docs-section">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-12">
                <h4>体重数据</h4>
            </div>
        </div>
    </div>
</div>
<div class="bs-docs-section">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-12">
                <h4>理想体重为<span class="label label-default" id="idelw"></span></h4>
            </div>
        </div>
    </div>
</div>
<div class="progress progress-striped active">
    <div class="progress-bar" id="wBar">还差一点加油</div>
</div>
<div class="nothing"></div>
    <div class="chart-container">
        <div id="js-carousel" class="canvas-holder hover-highlight carousel position-1"><canvas id="carousel-radar"></canvas><canvas id="carousel-bar"></canvas><canvas id="carousel-line"></canvas></div>
    </div>
    <div class="bs-docs-section">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-12">
                    <h4>你的体格指数【BMI】为<span class="label label-default" id="bmi"></span></h4>
                    <h4>理想体格指数【BMI】为<span class="label label-default">22</span></h4>
                </div>
            </div>
        </div>
    </div>
        <canvas id="polar-area"></canvas>

<div class="bs-docs-section">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-12">
                <h4>你的体脂肪率为<span class="label label-default" id="bodyfat"></span></h4>
                <h4>体脂肪率判定基准参考</h4>
            </div>
        </div>
    </div>
</div>
        <table class="table table-striped table-hover">
            <tbody>
            <tr >
                <td rowspan="2">Male</td>
                <td class="info">age 18~30</td>
                <td class="info">14~20%</td>
            </tr>

            <tr >
                <td class="danger">age 30~69</td>
                <td class="danger">17~23%</td>
            </tr>
            <tr >
                <td rowspan="2">Female</td>
                <td class="success">age 18~30</td>
                <td class="success">17~24%</td>
            </tr>
            <tr >
                <td class="warning">age 30~69</td>
                <td class="warning">20~27%</td>
            </tr>
            </tbody>
        </table>
<div class="bs-docs-section">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-12">
                <h4>建议 :<br></h4>
                <blockquote id="my_comment"></blockquote>
            </div>
        </div>
    </div>
</div>
<!--log form-->
<div class="modal fade" id="log-form">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title">登记</h4>
            </div>
            <div class="modal-body">
                <p>看报告前，请输入今天的数据…</p>
                <form id="form" onSubmit="return false">
                    <div class="form-group">
                        <label class="control-label" for="focusedInput">身高</label>
                        <input name="height_cm" type="text" class="form-control"
                               placeholder="PS.cm为单位哦ლ(╹◡╹ლ)" />
                        <label class="control-label" for="focusedInput">体重</label>
                        <input name="weight_kg" type="text" class="form-control"
                               placeholder="PS.kg为单位哦ლ(╹◡╹ლ)" />
                        <label class="control-label" for="focusedInput">腰围</label>
                        <input name="waist_cm" type="text" class="form-control"
                               placeholder="PS.cm为单位哦ლ(╹◡╹ლ)" />
                        <input name="gender" value="MalePick" type="hidden" @if($profile->sex == 0) checked="checked" @endIf>
                        <input name="gender" value="FemPick"  type="hidden" @if($profile->sex == 1) checked="checked" @endIf>
                        <input name="bodyfat" type="hidden">
                        <input name="bmi" type="hidden">
                        <input name="idelw" type="hidden">
                        <input  type="hidden" name="my_comment">
                        <br>
                        <button id="save" class="btn btn-primary">提交<(￣︶￣)↗[GO!]</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endSection
@section('styles')
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
            color: inherit;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        *,
        *:before,
        *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        body {
            position: relative;
            font-family: "proxima-nova", 'Helvetica Neue', 'Helvetica', 'sans-serif';
            /*  color: #232830;*/
        }
        header {
            position: absolute;
            left: 0;
            width: 100%;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            text-align: center;
            color: #dfe1e8;
            z-index: 3;
        }
        header h1 {
            margin-bottom: 30px;
        }
        header h2 {
            margin-bottom: 30px;
        }
        @media only screen and (max-width: 600px) {
            header {
                color: #232830;
                top: 100%;
                margin-top: 10px;
                padding: 40px 10px;
                background-color: #fafafa;
                border-bottom: 1px solid #e1e1e1;
                -webkit-transform: translateY(0%);
                -moz-transform: translateY(0%);
                -o-transform: translateY(0%);
                -ms-transform: translateY(0%);
                transform: translateY(0%);
            }
            header h1 {
                font-size: 38px;
                margin-bottom: 10px;
            }
            header h2 {
                font-size: 16px;
                margin-bottom: 20px;
            }
            header .btn {
                min-width: 136px;
                font-size: 14px;
                padding: 18px 20px;
                margin: 0 5px;
            }
        }


        .canvas-holder {
            padding: 4px 0;
            margin: 20px 0;
            position: relative;
        }

        .carousel {
            white-space: nowrap;
            overflow: hidden;
        }
        .carousel canvas {
            display: inline-block;
            -webkit-transition: -webkit-transform 400ms ease-out;
            -moz-transition: -moz-transform 400ms ease-out;
            -o-transition: -o-transform 400ms ease-out;
            transition: -webkit-transform 400ms ease-out,-moz-transform 400ms ease-out,-o-transform 400ms ease-out,transform 400ms ease-out;
        }
        .position-6 canvas {
            -webkit-transform: translateX(-500%);
            -moz-transform: translateX(-500%);
            -o-transform: translateX(-500%);
            -ms-transform: translateX(-500%);
            transform: translateX(-500%);
        }
        .position-5 canvas {
            -webkit-transform: translateX(-400%);
            -moz-transform: translateX(-400%);
            -o-transform: translateX(-400%);
            -ms-transform: translateX(-400%);
            transform: translateX(-400%);
        }
        .position-4 canvas {
            -webkit-transform: translateX(-300%);
            -moz-transform: translateX(-300%);
            -o-transform: translateX(-300%);
            -ms-transform: translateX(-300%);
            transform: translateX(-300%);
        }
        .position-3 canvas {
            -webkit-transform: translateX(-200%);
            -moz-transform: translateX(-200%);
            -o-transform: translateX(-200%);
            -ms-transform: translateX(-200%);
            transform: translateX(-200%);
        }
        .position-2 canvas {
            -webkit-transform: translateX(-100%);
            -moz-transform: translateX(-100%);
            -o-transform: translateX(-100%);
            -ms-transform: translateX(-100%);
            transform: translateX(-100%);
        }
        .position-1 canvas {
            -webkit-transform: translateX(0%);
            -moz-transform: translateX(0%);
            -o-transform: translateX(0%);
            -ms-transform: translateX(0%);
            transform: translateX(0%);
        }
        .hover-highlight {
            border-radius: 10px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-transition: background-color 200ms ease-in-out;
            -moz-transition: background-color 200ms ease-in-out;
            -o-transition: background-color 200ms ease-in-out;
            transition: background-color 200ms ease-in-out;
        }
        .hover-highlight:hover {
            background-color: rgba(239, 241, 245, 0.3);
            border-radius: 10px;
        }
        .hover-highlight canvas {
            cursor: pointer;
        }
        .chart-container {

        }

    </style>
@endSection
@section('scripts')
<script src="/js/Chart.js"></script>
<script src="/js/my.js"></script>
<script>
    $("document").ready(function(){
        var $logF = $('#log-form');
            $logF.modal({backdrop: 'static', keyboard: false});
        $logF.modal('show');
        $("#save").click(function(){
            caculat_body_fat(this.form);
//            alert('ddd');
            $logF.modal('hide');
                var $f = $('#form')[0];
                $("#bmi").text($f.bmi.value);
            $("#bodyfat").text($f.bodyfat.value);
            $("#idelw").text($f.idelw.value+"公斤");
            $("#my_comment").text($f.my_comment.value);
            var a = Math.abs($f.weight_kg.value - $f.idelw.value)/$f.weight_kg.value;
            a = (a*100).toFixed(2)+"%";
            console.log($f.weight_kg.value - $f.idelw.value);
            $("#wBar").css("width", a);
        });
    })
</script>
    <script>
        (function(){
            function $id(id, context) {
                return $((context || document).getElementById(id))[0];
            }
            // Colour variables
            var red = "#bf616a",
                blue = "#5B90BF",
                orange = "#d08770",
                yellow = "#ebcb8b",
                green = "#a3be8c",
                teal = "#96b5b4",
                pale_blue = "#8fa1b3",
                purple = "#b48ead",
                brown = "#ab7967";


            var baseDataset = {
                    fill: 'rgba(222,225,232,0.4)',
                    stroke: 'rgba(222,225,232,1)',
                    highlight: 'rgba(222,225,232,0.8)',
                    highlightStroke: 'rgba(222,225,232,1)'
                },
                overlayDataset = {
                    fill: 'rgba(91,144,191,0.4)',
                    stroke: 'rgba(91,144,191,1)',
                    highlight: 'rgba(91,144,191,0.8)',
                    highlightStroke: 'rgba(91,144,191,1)'
                };

            Chart.defaults.global.responsive = true;



            //Run any of the smaller demo charts here.

            // Six up carousel
            (function(){
                var contexts = {
                        // polar : $id('carousel-polar-area').getContext('2d'),
                        radar : $id('carousel-radar').getContext('2d'),
                        line : $id('carousel-line').getContext('2d'),
                        bar : $id('carousel-bar').getContext('2d')
                        // doughnut : $id('carousel-doughnut').getContext('2d'),
                        // pie : $id('carousel-pie').getContext('2d')
                    },
                    chartInstances = [];




                var config = {
                    animation: false,
                    onAnimationComplete: function(){
                        this.options.animation = true;
                    }
                };
                $.ajax({
                    type : 'GET',
                    url : "{{ url('users/getWeightData')}}", //'http://127.0.0.1/API/test/getData',
                    dataType : 'json',
                    json : 'callback',
                    success : function(weights) {
                        var days = weights['days'].reverse();
                        weights = weights['data'].reverse();
                        if(weights.length == 0)
                        {
                            console.log('no content');
                            $(".nothing").html('没有数据啊，赶快记录今天的数据吧 ');
                            return;
                        }
                        //-------
                        var data = {
                            multiSets: {
                                labels: days,
                                datasets: [
                                    {
                                        label: "My First dataset",
                                        fillColor: overlayDataset.fill,
                                        strokeColor: overlayDataset.stroke,
                                        pointColor: overlayDataset.stroke,
                                        pointStrokeColor: "#fff",
                                        pointHighlightFill: "#fff",
                                        pointHighlightStroke: overlayDataset.highlightStroke,
                                        highlightFill: overlayDataset.highlight.highlightStroke,
                                        data: weights
                                    },
//                            {
//                                label: "My Second dataset",
//                                    fillColor: baseDataset.fill,
//                                    strokeColor: baseDataset.stroke,
//                                    pointColor: baseDataset.stroke,
//                                    pointStrokeColor: "#fff",
//                                    pointHighlightFill: "#fff",
//                                    highlightFill: baseDataset.highlight,
//                                    pointHighlightStroke: baseDataset.highlightStroke,
//                                data: [28, 48, 40, 19, 96, 27, 100]
//                            }
                                ]
                            },
                            segments : [
                                {
                                    value : 20,
                                    color: blue,
                                    highlight : Colour(blue, 10),
                                    label : "体重不足 (<20)"
                                },
                                {
                                    value: 25,
                                    color : teal,
                                    highlight: Colour(teal, 10),
                                    label : "理想范围 (20~25)"
                                },
                                {
                                    value: 29,
                                    color: yellow,
                                    highlight : Colour(yellow, 10),
                                    label : "危险范围 (26~29)"
                                },
                                {
                                    value : 30,
                                    color: orange,
                                    highlight : Colour(orange, 10),
                                    label : "进入高危险范围 (>30)"
                                }
                            ]
                        }
                        chartInstances.push(new Chart(contexts.radar).Radar(data.multiSets, config));
                        chartInstances.push(new Chart(contexts.bar).Bar(data.multiSets, config));
                        chartInstances.push(new Chart(contexts.line).Line(data.multiSets, config));

                        var ctx = document.getElementById("polar-area").getContext("2d");
                        window.myPolarArea = new Chart(ctx).PolarArea(data.segments, {responsive : true});

                        var iteratePosition = (function(){
                            var position = 1;

                            return function(){
                                position++;
                                return (position > chartInstances.length) ? position = 1 : position;
                            };
                        })();

                        var carousel = $id('js-carousel');

                        helpers = Chart.helpers;

                        helpers.addEvent(carousel, 'click', function(){
                            var positionPrefix = 'position-',
                                carouselPosition = iteratePosition(),
                                chartToScrollTo = chartInstances[carouselPosition-1];

                            this.className = this.className.replace(new RegExp(positionPrefix+'[1-6]'), positionPrefix+carouselPosition);

                            chartToScrollTo.clear();
                            chartToScrollTo.render();
                        });

                        //------
                    },
                    error : function() {
                        alert('信息读取失败提示!');
                    }
                });



            })();



            function Colour(col, amt) {

                var usePound = false;

                if (col[0] == "#") {
                    col = col.slice(1);
                    usePound = true;
                }

                var num = parseInt(col,16);

                var r = (num >> 16) + amt;

                if (r > 255) r = 255;
                else if  (r < 0) r = 0;

                var b = ((num >> 8) & 0x00FF) + amt;

                if (b > 255) b = 255;
                else if  (b < 0) b = 0;

                var g = (num & 0x0000FF) + amt;

                if (g > 255) g = 255;
                else if (g < 0) g = 0;

                return (usePound?"#":"") + (g | (b << 8) | (r << 16)).toString(16);

            }

        })();
    </script>
@endsection