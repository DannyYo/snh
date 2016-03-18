<span class="emotion"><i class="fa fa-smile-o"></i></span>
<script type="text/javascript" src="/js/emojione.js"></script>
<script type="text/javascript" src="/js/jquery.qqFace.js"></script>
<script type="text/javascript">
    $(function(){
        $('.emotion').qqFace({
            id : 'facebox',
            assign:'saytext',
            path: "{{asset('img/emoji')}}/" 	//表情存放的路径
        });
        $(".sub_btn").click(function(){
            var str = $("#saytext").val();
            $("#show").html(replace_em(str));
        });
    });
</script>
<link rel="stylesheet" href="/css/emojione.css">
<style>
    .comment{width:680px; margin:20px auto; position:relative; background:#fff; padding:20px 50px 50px; border:1px solid #DDD; border-radius:5px;}
    .comment h3{height:28px; line-height:28px}
    .com_form{width:100%; position:relative}
    .input{width:99%; height:60px; border:1px solid #ccc}
    .com_form p{height:28px; line-height:28px; position:relative; margin-top:10px;}
    span.emotion{width:42px; height:20px; padding-left:20px; cursor:pointer}
    span.emotion:hover{background-position:2px -28px}
    .qqFace{margin-top:4px;background:#fff;padding:2px;border:1px #dfe6f6 solid;}
    .qqFace table td{padding:0px;}
    .qqFace table td img{cursor:pointer;border:1px #fff solid;}
    .qqFace table td img:hover{border:1px #0066cc solid;}
    #show{width:770px; margin:20px auto; background:#fff; padding:5px; border:1px solid #DDD; vertical-align:top;}

    .sub_btn {
        position:absolute; right:0px; top:0;
        display: inline-block;
        zoom: 1; /* zoom and *display = ie7 hack for display:inline-block */
        *display: inline;
        vertical-align: baseline;
        margin: 0 2px;
        outline: none;
        cursor: pointer;
        text-align: center;
        font: 14px/100% Arial, Helvetica, sans-serif;
        padding: .5em 2em .55em;
        text-shadow: 0 1px 1px rgba(0,0,0,.6);
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
        -moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
        box-shadow: 0 1px 2px rgba(0,0,0,.2);
        color: #e8f0de;
        border: solid 1px #538312;
        background: #64991e;
        background: -webkit-gradient(linear, left top, left bottom, from(#7db72f), to(#4e7d0e));
        background: -moz-linear-gradient(top,  #7db72f,  #4e7d0e);
        filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#7db72f', endColorstr='#4e7d0e');
    }
    .sub_btn:hover {
        background: #538018;
        background: -webkit-gradient(linear, left top, left bottom, from(#6b9d28), to(#436b0c));
        background: -moz-linear-gradient(top,  #6b9d28,  #436b0c);
        filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#6b9d28', endColorstr='#436b0c');
    }
</style>