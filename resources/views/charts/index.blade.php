@extends('home')
@section('title', '记录身体的变化')
@section('content')
<a data-toggle="modal" data-target="#abc" class="btn btn-primary" id="summit">记录</a>

<div class="modal fade" id="abc">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">你今日肿/重了么</h4>
            </div>
            <div class="modal-body">
                <p>请输入今天的数据<(￣︶￣)↗[GO!]…</p>
                <form role="form">
                    <div class="form-group">
                        <input name="data" type="text" class="form-control"
                               placeholder="PS.kg为单位哦ლ(╹◡╹ლ)" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary" id="save">提交</button>
            </div>
        </div>
    </div>
</div>
<div class="nothing"></div>
<div class="container" id="chart" >
        <div>
            <canvas id="canvas" height="450" width="600"></canvas>
        </div>
</div>
@endsection
@section('styles')
<style>
    .nothing{
    text-align: center;
    font-size: 20px;
    }
</style>
@endsection
@section('scripts')
<script src="/js/Chart.js"></script>
<script type="text/javascript">

    $("#save").click(function(){
        $("#abc").modal("hide");
       var data = $('input[name="data"]').val();
       if(!$.isNumeric(data) || data <= 0){
       	alert('请填写正确数据');
       	return;
       }
        var type = true; //true add false update
        //如果today已经录入数据则更新
        if($(".nothing").html().length > 0){
            alert("生成");
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myLine = new Chart(ctx).Line(getlineChartData([data],['today']), {
                responsive: true
            });

        }else{
            var aa = window.myLine.datasets[0]['points'];
            var len =aa.length;
            var aaa = aa[len-1].label;
            if(aaa == "today"){
                alert("更新");
                window.myLine.datasets[0]['points'][len-1].value = data;
                window.myLine.update();
                type = false;
            }else{
                alert("添加");
                window.myLine.addData([data], "today");
            }
        }
        addOrUpdate(data,type)
    });

    function addOrUpdate(data,type){
        $.ajax({
            type : 'GET',
            url : "{{ url('users/addWeightData')}}"+'?data='+data+'&type='+type,
            dataType : 'json',
            json : 'callback',
            success : function(msg) {
                var aa = window.myLine.datasets[0]['points'];
                var aaa = aa[aa.length-1].value;
                // alert(msg);
                if(msg == 'success')
                    alert("添加成功！"+aaa);
                else
                    alert("添加失败！");
            },
            error : function() {
                alert('信息读取失败提示!');
            }
        });
    }
    $('#canvas').click(function(evt){
         var aa = window.myLine.datasets[0]['points'];
                var aaa = aa[aa.length-1];
        // alert(JSON.stringify(aaa));
        if(aaa.label != 'today')
        {
            alert('以前的数据不能修改哦');
            return;
        }
        var $abc = $("#abc");
        $('input[name="data"]').val(aaa.value);
        $abc.modal("show");
    });

</script>
<script>
        // 在chart.js 配置 multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"
    function getlineChartData(data,days){
    	 var lineChartData = {
        labels : days,
        datasets : [
            // {
            //     label: "My First dataset",
            //     fillColor : "rgba(220,220,220,0.2)",
            //     strokeColor : "rgba(220,220,220,1)",
            //     pointColor : "rgba(220,220,220,1)",
            //     pointStrokeColor : "#fff",
            //     pointHighlightFill : "#fff",
            //     pointHighlightStroke : "rgba(220,220,220,1)",
            //    data : data
            // },
            {
                label: "My Second dataset",
                fillColor : "rgba(151,187,205,0.2)",
                strokeColor : "rgba(151,187,205,1)",
                pointColor : "rgba(151,187,205,1)",
                pointStrokeColor : "#fff",
                pointHighlightFill : "#fff",
                pointHighlightStroke : "rgba(151,187,205,1)",
                data : data
            }
          ]
    	}
    	return lineChartData;
    }


    function showLineChart(){

    	$.ajax({
            type : 'GET',
            url : "{{ url('users/getWeightData')}}", //'http://127.0.0.1/API/test/getData',
            dataType : 'json',
            json : 'callback',
            success : function(data) {
                var days = data['days'].reverse();
                data = data['data'].reverse();
               	var ctx = document.getElementById("canvas").getContext("2d");
                if(data.length == 0)
                {
                    console.log('no content');
                    $(".nothing").html('没有数据啊，赶快记录今天的数据吧 ');
                    return;
                }
			    window.myLine = new Chart(ctx).Line(getlineChartData(data,days), {
			            responsive: true
			        });
            },
            error : function() {
                alert('信息读取失败提示!');
            }
        });


    }

    $(document).ready(function () {
        showLineChart();
    });

</script>
@endsection