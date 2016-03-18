@extends('home')
@section('title', '健康计算器')
@section('content')
<ul class="nav nav-tabs">
    <li class="active"><a href="#home" data-toggle="tab">BMI计算</a></li>
    <li><a href="#profile" data-toggle="tab">运动消耗计算</a></li>
    <li><a href="#food" data-toggle="tab">食物热量查询</a></li>
</ul>
<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade active in" id="home">
        <div class="well bs-component col-lg-6">
        <form method="post" name="Caculat_bmi" class="form-horizontal">
            <label class="col-lg-2 control-label">性别</label>
            <div class="col-lg-10">
                <div class="radio">
                    <label>
                        <input name="gender" id="optionsRadios1" value="MalePick" checked="" type="radio">
                        男
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input name="gender" id="optionsRadios2" value="FemPick" type="radio">
                        女
                    </label>
                </div>
            </div>

            <label class="col-lg-2 control-label" for="focusedInput">身高</label>
            <div class="col-lg-10">
            <input class="form-control" name="height_cm" size="6">公分
             </div>
            <br>
            <label class="col-lg-2 control-label" for="focusedInput">体重</label>
            <div class="col-lg-10">
            <input class="form-control" name="weight_kg" size="6">公斤
                </div>
            <br>
            <label class="col-lg-2 control-label" for="focusedInput">腰围</label>
            <div class="col-lg-10">
            <input class="form-control" name="waist_cm" size="6">公分
                </div>
            <br>
            <input onclick="caculat_body_fat(this.form)" type="button" value="计算" class="btn btn-primary btn-sm">
            <br>
            <br>
            您的体脂肪率为<input class="form-control" name="bodyfat" size="12">
            <br>
            体格指数[BMI]<input class="form-control" name="bmi" size="12">
            <br>
            您的理想体重为<input class="form-control" name="idelw" size="12">公斤
            <br>
            建议<INPUT class="form-control" TYPE=TEXT NAME=my_comment size=35>
        </form>
    </div>
    </div>
    <div class="tab-pane fade" id="food">
        <div class="well bs-component">
        <h1>食物热量查询</h1>
        <div class="jieshao"><div class="gj_tu food"></div>
            <p>不同的食物能够为人体提供大小不一的热量。由于热量摄取过多或过少都会对身体造成不良影响，那么了解每种食物的热量值就显得尤其重要。在这里，你可以轻松查询到你需要的食物热量值。</p></div>
        <div class="csnr"><span>请输入食物名称：</span><INPUT class="input_food" id="txtFood" onfocus="this.value='';" type="text" value="请输入食物名称"><INPUT name="Submit" class="btn btn-primary btn-sm" onclick="food(txtFood.value);" type="button" value="提交"></div>
        <div class="food_more"><b>家庭水果：</b><A href="javascript:food('香瓜');">香瓜</A>
            <A href="javascript:food('苹果');">苹果</A> <A href="javascript:food('草莓');">草莓</A>
            <A href="javascript:food('哈密瓜');">哈密瓜</A> <A href="javascript:food('花生');">花生</A>
            <A href="javascript:food('黄瓜');">黄瓜</A> <A href="javascript:food('黄桃');">黄桃</A>
            <A href="javascript:food('蜜橘');">蜜橘</A> <A href="javascript:food('柠檬');">柠檬</A>
            <A href="javascript:food('枇杷');">枇杷</A> <A href="javascript:food('葡萄');">葡萄</A>
            <A href="javascript:food('沙枣');">沙枣</A> <A href="javascript:food('石榴');">石榴</A>
            <A href="javascript:food('柿子');">柿子</A> <A href="javascript:food('香蕉');">香蕉</A>
            <A href="javascript:food('雪梨');">雪梨</A> <A href="javascript:food('杨梅');">杨梅</A>
            <A href="javascript:food('桃');">桃</A> <BR>    <b>日常零食：</b><A href="javascript:food('方便面');">方便面</A>
            <A href="javascript:food('冰淇淋');">冰淇淋</A> <A href="javascript:food('饼干');">饼干</A>
            <A href="javascript:food('臭豆腐');">臭豆腐</A> <A href="javascript:food('白薯干/红薯干/地瓜干');">地瓜干</A>
            <A href="javascript:food('桂圆干');">桂圆干</A> <A href="javascript:food('核桃');">核桃</A>
            <A href="javascript:food('花生');">花生</A> <A href="javascript:food('江米条');">江米条</A>
            <A href="javascript:food('肯德基炸鸡');">肯德基炸鸡</A> <A href="javascript:food('葵花子');">葵花子</A>
            <A href="javascript:food('绿豆糕');">绿豆糕</A> <A href="javascript:food('江米条');">江米条</A><BR>
            <b>饮料酒水：</b><A href="javascript:food('红葡萄酒/红酒');">红</A>/<A href="javascript:food('白葡萄酒');">白葡萄酒</A>
            <A href="javascript:food('啤酒');">啤酒</A> <A href="javascript:food('白酒');">白酒</A>
            <A href="javascript:food('豆浆');">豆浆</A> <A href="javascript:food('豆奶');">豆奶</A>
            <A href="javascript:food('甘蔗汁');">甘蔗汁</A> <A href="javascript:food('果料酸奶');">果料酸奶</A>
            <A href="javascript:food('红茶');">红茶</A> <A href="javascript:food('橘子汁');">橘子汁</A>
            <A href="javascript:food('柠檬汁');">柠檬汁</A> <A href="javascript:food('牛奶');">牛奶</A>
            <A href="javascript:food('可乐');">可乐</A> <A href="javascript:food('油茶');">油茶</A><BR>
            <b>家常肉菜：</b><A href="javascript:food('鸡肉');">鸡肉</A> <A href="javascript:food('鲫鱼');">鲫鱼</A>
            <A href="javascript:food('肥猪肉');">猪肉</A> <A href="javascript:food('鳊鱼/武昌鱼');">武昌鱼</A>
            <A href="javascript:food('叉烧肉');">叉烧肉</A> <A href="javascript:food('春卷');">春卷</A>
            <A href="javascript:food('大腊肠');">大腊肠</A> <A href="javascript:food('带鱼');">带鱼</A>
            <A href="javascript:food('对虾');">对虾</A> <A href="javascript:food('河蟹');">河蟹</A>
            <A href="javascript:food('黄鳝');">黄鳝</A> <A href="javascript:food('河蚌');">河蚌</A>
            <A href="javascript:food('酱牛肉');">酱牛肉</A> <A href="javascript:food('酱羊肉');">酱羊肉</A>
            <A href="javascript:food('烤鸭');">烤鸭</A><BR>	<b>家常蔬菜：</b><A href="javascript:food('白萝卜');">白萝卜</A>
            <A href="javascript:food('菠菜');">菠菜</A> <A href="javascript:food('蚕豆');">蚕豆</A>
            <A href="javascript:food('长茄子');">茄子</A> <A href="javascript:food('大白菜');">白菜</A>
            <A href="javascript:food('大头菜');">大头菜</A> <A href="javascript:food('大叶芥菜/盖菜');">盖菜</A>
            <A href="javascript:food('冬瓜');">冬瓜</A> <A href="javascript:food('豆腐皮');">豆皮</A>
            <A href="javascript:food('豆角');">豆角</A> <A href="javascript:food('粉丝');">粉丝</A>
            <A href="javascript:food('腐竹');">腐竹</A> <A href="javascript:food('胡萝卜');">胡萝卜</A>
            <A href="javascript:food('鸡蛋');">鸡蛋</A> <A href="javascript:food('鸡血');">鸡血</A>
            <A href="javascript:food('煎饼');">煎饼</A></div>

        <div class="csjg">
            <b>您查询的食物热量如下所示：</b><br /><div id="showresult" class="tarea">答案显示区域</div><span>热量单位换算：1大卡=1千卡=1000卡路里=4.184千焦=4184焦耳热量</span>
        </div>
            </div>
    </div>
    <div class="tab-pane fade" id="profile">
        <div class="well bs-component col-lg-6">
        <h1>运动能量消耗查询</h1>

        <div class="jieshao"><div class="gj_tu sport"></div>
            <p>不同的运动项目所产生的热量各不相同,并且与运动时间成正比。如果您想通过运动来达到减肥的目的,每项运动的时间尽量保持在20分钟以上,这样才能够真正地起到运动减肥的效果。在这里您可以轻松地查询到您运动产生的热量...</p></div>
        <div class="csnr"><span>计算结果显示如下：</span><SELECT id="selectExercise"><OPTION
                    value="150">散步</OPTION> <OPTION
                    value="555">快走</OPTION> <OPTION
                    value="655">慢跑</OPTION> <OPTION
                    value="700">快跑</OPTION> <OPTION
                    value="245">单车</OPTION> <OPTION
                    value="275">有氧运动(轻度)</OPTION> <OPTION
                    value="350">有氧运动(中度)</OPTION> <OPTION
                    value="300">体能训练</OPTION> <OPTION
                    value="432">仰卧起坐</OPTION> <OPTION
                    value="345">走步机</OPTION> <OPTION
                    value="680">爬楼梯</OPTION> <OPTION
                    value="550">游泳</OPTION> <OPTION
                    value="425">网球</OPTION> <OPTION
                    value="600">手球</OPTION> <OPTION
                    value="300">桌球</OPTION> <OPTION
                    value="270">高尔夫球</OPTION> <OPTION
                    value="350">轮式溜冰</OPTION> <OPTION
                    value="600">郊外滑雪</OPTION> <OPTION
                    value="500">呼拉圈</OPTION> <OPTION
                    value="800">跳绳</OPTION> <OPTION
                    value="360">乒乓球</OPTION> <OPTION
                    value="350">排球</OPTION> <OPTION value="82">开车</OPTION>
                <OPTION value="76">工作</OPTION> <OPTION
                    value="88">读书</OPTION> <OPTION value="48">午睡</OPTION>
                <OPTION value="72">看电视</OPTION> <OPTION
                    value="66">看电影</OPTION> <OPTION
                    value="432">跳舞</OPTION> <OPTION
                    value="300">健身操</OPTION> <OPTION
                    value="450">打拳</OPTION> <OPTION
                    value="168">泡澡</OPTION> <OPTION
                    value="110">逛街</OPTION> <OPTION
                    value="180">购物</OPTION> <OPTION
                    value="228">打扫</OPTION> <OPTION
                    value="114">洗衣服</OPTION> <OPTION
                    value="120">烫衣服</OPTION> <OPTION
                    value="136">洗碗</OPTION> <OPTION
                    value="114">插花</OPTION> <OPTION
                    value="400">锯木</OPTION> <OPTION
                    value="350">骑马</OPTION> <OPTION
                    value="130">溜狗</OPTION> <OPTION
                    value="240">郊游</OPTION> </SELECT> 进行了 <INPUT class="input_tx" id="txtTime" onfocus="this.value='';" type="text" value="1">小时
            <INPUT class="btn btn-primary btn-sm" onclick="exercise();" type="submit" value="提交"></div>

        <div class="csjg">
            <b>您的正常体重范围如下所示：</b><br /><div id="showresult1" class="tarea">答案显示区域</div><span>热量单位换算：1大卡=1千卡=1000卡路里=4.184千焦=4184焦耳热量</span>
        </div>
        </div>
    </div>
</div>



@endsection
@section('scripts')
<script src="/js/my.js"></script>
<script type="text/javascript">
function food(txt){if (txt == "饼干"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为5720大卡/千克";
}

else if (txt == "艾窝窝"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为1900大卡/千克";
}

else if (txt == "鹌鹑"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为1896.6大卡/千克";
}
else if (txt == "螯虾"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为3000大卡/千克";
}

else if (txt == "八爪鱼"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为1730.8大卡/千克";
}
else if (txt == "雪梨"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为582.3大卡/千克";
}

else if (txt == "芭蕉"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为1602.9大卡/千克";
}
else if (txt == "鲅鱼"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为1525大卡/千克";
}

else if (txt == "白菜苔"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为297.6大卡/千克";
}
else if (txt == "白豆角"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为309.3大卡/千克";
}

else if (txt == "白姑鱼"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为2238.8大卡/千克";
}
else if (txt == "白果"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为3550大卡/千克";
}

else if (txt == "白兰瓜"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为381.8大卡/千克";
}
else if (txt == "白木耳"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为2083.3大卡/千克";
}

else if (txt == "白萝卜"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为210.5大卡/千克";
}
else if (txt == "白葡萄酒"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为620大卡/千克";
}

else if (txt == "白薯"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为1209.3大卡/千克";
}
else if (txt == "白薯干/红薯干/地瓜干"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为6120大卡/千克";
}

else if (txt == "叉叉"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为10000大卡/千克";
}
else if (txt == "白水羊头"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为1930大卡/千克";
}

else if (txt == "白芸豆"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为2960大卡/千克";
}
else if (txt == "白芝麻"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为5170大卡/千克";
}

else if (txt == "蚌肉"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为1127大卡/千克";
}
else if (txt == "鲍鱼"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为1292.3大卡/千克";
}

else if (txt == "北豆腐"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为980大卡/千克";
}
else if (txt == "啤酒"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为350大卡/千克";
}

else if (txt == "荸荠"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为756大卡/千克";
}

else if (txt == "比目鱼"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为1486.1大卡/千克";
}
else if (txt == "边鱼"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为1771.4大卡/千克";
}

else if (txt == "鳊鱼/武昌鱼"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为2288.1大卡/千克";
}
else if (txt == "扁豆"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为406.6大卡/千克";
}

else if (txt == "标准粉"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为3440大卡/千克";
}
else if (txt == "冰棍"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为470大卡/千克";
}

else if (txt == "冰淇淋"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为1260大卡/千克";
}
else if (txt == "冰糖"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为3970大卡/千克";
}

else if (txt == "冰砖"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为1530大卡/千克";
}
else if (txt == "奶油饼干"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为4290大卡/千克";
}

else if (txt == "白兰瓜"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为381.8大卡/千克";
}
else if (txt == "菠菜"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为269.7大卡/千克";
}

else if (txt == "菠萝"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为602.9大卡/千克";
}
else if (txt == "菠萝豆"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为3920大卡/千克";
}

else if (txt == "菜干"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为1360大卡/千克";
}
else if (txt == "菜瓜"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为204.5大卡/千克";
}

else if (txt == "菜花"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为292.70大卡/千克";
}
else if (txt == "菜籽油"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为8990大卡/千克";
}

else if (txt == "蚕豆干"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为3040大卡/千克";
}
else if (txt == "蚕豆"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为3354.8大卡/千克";
}

else if (txt == "草菇"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为230大卡/千克";
}
else if (txt == "草莓"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为309.3大卡/千克";
}

else if (txt == "草莓酱"){
    document.getElementById("showresult").innerHTML=txt + "所含热量为2690大卡/千克";
}
    if (txt == "草鱼"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为1391大卡/千克";
    }

    else if (txt == "叉烧肉"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为2970大卡/千克";
    }

    else if (txt == "茶肠"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为3290大卡/千克";
    }
    else if (txt == "茶油"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为8990大卡/千克";
    }

    else if (txt == "长茄子"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为197.9大卡/千克";
    }
    else if (txt == "炒肝"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为960大卡/千克";
    }

    else if (txt == "蛏子"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为701.8大卡/千克";
    }
    else if (txt == "橙子"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为635.1大卡/千克";
    }

    else if (txt == "臭豆腐"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为1300大卡/千克";
    }
    else if (txt == "春卷"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为4630大卡/千克";
    }

    else if (txt == "慈姑"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为4630大卡/千克";
    }
    else if (txt == "醋"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为1300大卡/千克";
    }

    else if (txt == "大白菜"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为180.7大卡/千克";
    }
    else if (txt == "大葱"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为365.9大卡/千克";
    }

    else if (txt == "大红菇"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为20005大卡/千克";
    }
    else if (txt == "大黄米"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为3490大卡/千克";
    }

    else if (txt == "大黄鱼"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为1454.5大卡/千克";
    }
    else if (txt == "白薯干/红薯干/地瓜干"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为6120大卡/千克";
    }

    else if (txt == "大腊肠"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为2670大卡/千克";
    }
    else if (txt == "大麻哈鱼"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为1986.1大卡/千克";
    }

    else if (txt == "大麻油"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为8970大卡/千克";
    }
    else if (txt == "大麦"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为3070大卡/千克";
    }

    else if (txt == "大肉肠"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为2720大卡/千克";
    }
    else if (txt == "大蒜"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为1482.4大卡/千克";
    }

    else if (txt == "大头菜"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为510大卡/千克";
    }
    if (txt == "大叶芥菜/盖菜"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为197.2大卡/千克";
    }

    else if (txt == "大枣"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为3386.4大卡/千克";
    }

    else if (txt == "带鱼"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为1671.1大卡/千克";
    }
    else if (txt == "淡菜"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为1632.4大卡/千克";
    }

    else if (txt == "蛋糕"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为3470大卡/千克";
    }
    else if (txt == "蛋黄酥"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为3860大卡/千克";
    }

    else if (txt == "蛋麻脆"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为4520大卡/千克";
    }
    else if (txt == "蛋清肠"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为2780大卡/千克";
    }

    else if (txt == "刀豆"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为380.4大卡/千克";
    }
    else if (txt == "白豆角"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为309.3大卡/千克";
    }

    else if (txt == "堤鱼"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为2984.4大卡/千克";
    }
    else if (txt == "地瓜粉/白薯粉/红薯粉"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为3360大卡/千克";
    }

    else if (txt == "土豆粉"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为3370大卡/千克";
    }
    else if (txt == "冬菜"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为460大卡/千克";
    }

    else if (txt == "冬菇"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为2465.1大卡/千克";
    }
    else if (txt == "冬瓜"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为137.5大卡/千克";
    }

    else if (txt == "冬果梨"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为425.3大卡/千克";
    }
    else if (txt == "冬寒菜"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为517.2大卡/千克";
    }

    else if (txt == "豆瓣酱"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为1780大卡/千克";
    }
    else if (txt == "豆瓣辣酱"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为590大卡/千克";
    }

    else if (txt == "豆腐干"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为1400大卡/千克";
    }
    else if (txt == "豆腐脑"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为100大卡/千克";
    }

    else if (txt == "豆腐皮"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为4090大卡/千克";
    }
    else if (txt == "豆腐丝"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为2010大卡/千克";
    }

    else if (txt == "豆鼓"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为2440大卡/千克";
    }
    else if (txt == "豆浆"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为130大卡/千克";
    }
    else if (txt == "豆浆粉"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为2010大卡/千克";
    }

    else if (txt == "豆角"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为312.5大卡/千克";
    }
    else if (txt == "豆奶"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为300大卡/千克";
    }
    else if (txt == "豆沙"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为2430大卡/千克";
    }
    else if (txt == "豆油"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为8990大卡/千克";
    }
    else if (txt == "豆汁"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为100大卡/千克";
    }
    else if (txt == "对虾"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为1524.6大卡/千克";
    }
    else if (txt == "鹅"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为3888.9大卡/千克";
    }
    else if (txt == "鹅蛋白	"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为480大卡/千克";
    }
    else if (txt == "鹅肝"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为1290大卡/千克";
    }
    else if (txt == "鹅油卷	"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为4610大卡/千克";
    }
    else if (txt == "鹅肫"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为1000大卡/千克";
    }
    else if (txt == "腭针鱼"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为2400大卡/千克";
    }
    else if (txt == "白酒"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为3520大卡/千克";
    }
    else if (txt == "豆沙"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为2430大卡/千克";
    }
    else if (txt == "豆油"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为8990大卡/千克";
    }
    else if (txt == "豆汁"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为100大卡/千克";
    }
    else if (txt == "对虾"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为1524.6大卡/千克";
    }
    else if (txt == "鹅"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为3888.9大卡/千克";
    }
    else if (txt == "鹅蛋白"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为480大卡/千克";
    }
    else if (txt == "鹅肝"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为1290大卡/千克";
    }
    else if (txt == "鹅油卷"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为4610大卡/千克";
    }
    else if (txt == "鹅肫"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为1000大卡/千克";
    }
    else if (txt == "腭针鱼"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为2400大卡/千克";
    }
    else if (txt == "二锅头"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为3520大卡/千克";
    }
    else if (txt == "发菜"){
        document.getElementById("showresult").innerHTML=txt + "所含热量为2460.0 大卡/千克";}
    else if (txt == "番茄酱"){document.getElementById("showresult").innerHTML=txt + "所含热量为810.0 大卡/千克";}
    else if (txt == "番石榴"){document.getElementById("showresult").innerHTML=txt + "所含热量为422.7 大卡/千克";}
    else if (txt == "方便面"){document.getElementById("showresult").innerHTML=txt + "所含热量为4720.0 大卡/千克";}
    else if (txt == "方腿"){document.getElementById("showresult").innerHTML=txt + "所含热量为1170.0 大卡/千克";}
    else if (txt == "非洲黑鲫鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1452.8 大卡/千克";}
    else if (txt == "肥猪肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为8160.0 大卡/千克";}
    else if (txt == "粉皮"){document.getElementById("showresult").innerHTML=txt + "所含热量为640.0 大卡/千克";}
    else if (txt == "粉丝"){document.getElementById("showresult").innerHTML=txt + "所含热量为3350.0 大卡/千克";}
    else if (txt == "粉条"){document.getElementById("showresult").innerHTML=txt + "所含热量为3370.0 大卡/千克";}
    else if (txt == "风干肠"){document.getElementById("showresult").innerHTML=txt + "所含热量为2830.0 大卡/千克";}
    else if (txt == "蜂蜜"){document.getElementById("showresult").innerHTML=txt + "所含热量为3210.0 大卡/千克";}
    else if (txt == "凤尾酥"){document.getElementById("showresult").innerHTML=txt + "所含热量为5110.0 大卡/千克";}
    else if (txt == "麸皮"){document.getElementById("showresult").innerHTML=txt + "所含热量为2200.0 大卡/千克";}
    else if (txt == "茯苓夹饼"){document.getElementById("showresult").innerHTML=txt + "所含热量为3320.0 大卡/千克";}
    else if (txt == "福橘"){document.getElementById("showresult").innerHTML=txt + "所含热量为671.6 大卡/千克";}
    else if (txt == "福来酥"){document.getElementById("showresult").innerHTML=txt + "所含热量为4650.0 大卡/千克";}
    else if (txt == "腐乳"){document.getElementById("showresult").innerHTML=txt + "所含热量为1330.0 大卡/千克";}
    else if (txt == "腐竹"){document.getElementById("showresult").innerHTML=txt + "所含热量为4590.0 大卡/千克";}
    else if (txt == "腐竹皮"){document.getElementById("showresult").innerHTML=txt + "所含热量为4890.0 大卡/千克";}
    else if (txt == "富强粉"){document.getElementById("showresult").innerHTML=txt + "所含热量为3500.0 大卡/千克";}
    else if (txt == "钙奶饼干"){document.getElementById("showresult").innerHTML=txt + "所含热量为4440.0 大卡/千克";}
    else if (txt == "干蚕豆"){document.getElementById("showresult").innerHTML=txt + "所含热量为3677.4 大卡/千克";}
    else if (txt == "干红果"){document.getElementById("showresult").innerHTML=txt + "所含热量为1520.0 大卡/千克";}
    else if (txt == "干姜"){document.getElementById("showresult").innerHTML=txt + "所含热量为2873.7 大卡/千克";}
    else if (txt == "干豌豆"){document.getElementById("showresult").innerHTML=txt + "所含热量为3130.0 大卡/千克";}
    else if (txt == "干枣"){document.getElementById("showresult").innerHTML=txt + "所含热量为3300.0 大卡/千克";}
    else if (txt == "甘蔗汁"){document.getElementById("showresult").innerHTML=txt + "所含热量为640.0 大卡/千克";}
    else if (txt == "橄榄"){document.getElementById("showresult").innerHTML=txt + "所含热量为612.5 大卡/千克";}
    else if (txt == "高粱米"){document.getElementById("showresult").innerHTML=txt + "所含热量为3510.0 大卡/千克";}
    else if (txt == "鸽"){document.getElementById("showresult").innerHTML=txt + "所含热量为4785.7 大卡/千克";}
    else if (txt == "公麻鸭"){document.getElementById("showresult").innerHTML=txt + "所含热量为5714.3 大卡/千克";}
    else if (txt == "狗母鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1492.5 大卡/千克";}
    else if (txt == "狗肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为1450.0 大卡/千克";}
    else if (txt == "枸杞菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为898.0 大卡/千克";}
    else if (txt == "挂面"){document.getElementById("showresult").innerHTML=txt + "所含热量为3470.0 大卡/千克";}
    else if (txt == "灌肠"){document.getElementById("showresult").innerHTML=txt + "所含热量为1340.0 大卡/千克";}
    else if (txt == "桂花藕粉"){document.getElementById("showresult").innerHTML=txt + "所含热量为3440.0 大卡/千克";}
    else if (txt == "桂林腐乳"){document.getElementById("showresult").innerHTML=txt + "所含热量为2040.0 大卡/千克";}
    else if (txt == "桂鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1918.0 大卡/千克";}
    else if (txt == "桂圆"){document.getElementById("showresult").innerHTML=txt + "所含热量为1400.0 大卡/千克";}
    else if (txt == "桂圆干"){document.getElementById("showresult").innerHTML=txt + "所含热量为7378.4 大卡/千克";}
    else if (txt == "桂圆肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为3130.0 大卡/千克";}
    else if (txt == "果丹皮"){document.getElementById("showresult").innerHTML=txt + "所含热量为3210.0 大卡/千克";}
    else if (txt == "果料酸奶"){document.getElementById("showresult").innerHTML=txt + "所含热量为670.0 大卡/千克";}
    else if (txt == "果味奶"){document.getElementById("showresult").innerHTML=txt + "所含热量为200.0 大卡/千克";}
    else if (txt == "哈密瓜"){document.getElementById("showresult").innerHTML=txt + "所含热量为478.9 大卡/千克";}
    else if (txt == "海参"){document.getElementById("showresult").innerHTML=txt + "所含热量为2817.2 大卡/千克";}
    else if (txt == "海参"){document.getElementById("showresult").innerHTML=txt + "所含热量为710.0 大卡/千克";}
    else if (txt == "海带"){document.getElementById("showresult").innerHTML=txt + "所含热量为785.7 大卡/千克";}
    else if (txt == "海鲫鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为3433.3 大卡/千克";}
    else if (txt == "海蛎肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为660.0 大卡/千克";}
    else if (txt == "海鳗"){document.getElementById("showresult").innerHTML=txt + "所含热量为1820.9 大卡/千克";}
    else if (txt == "海米"){document.getElementById("showresult").innerHTML=txt + "所含热量为1950.0 大卡/千克";}
    else if (txt == "海棠"){document.getElementById("showresult").innerHTML=txt + "所含热量为848.8 大卡/千克";}
    else if (txt == "海棠脯"){document.getElementById("showresult").innerHTML=txt + "所含热量为2860.0 大卡/千克";}
    else if (txt == "海虾"){document.getElementById("showresult").innerHTML=txt + "所含热量为1549.0 大卡/千克";}
    else if (txt == "海蟹"){document.getElementById("showresult").innerHTML=txt + "所含热量为1727.3 大卡/千克";}
    else if (txt == "海蛰皮"){document.getElementById("showresult").innerHTML=txt + "所含热量为330.0 大卡/千克";}
    else if (txt == "蚶子"){document.getElementById("showresult").innerHTML=txt + "所含热量为2629.6 大卡/千克";}
    else if (txt == "旱芹"){document.getElementById("showresult").innerHTML=txt + "所含热量为212.1 大卡/千克";}
    else if (txt == "合锦菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为750.0 大卡/千克";}
    else if (txt == "河蚌"){document.getElementById("showresult").innerHTML=txt + "所含热量为1565.2 大卡/千克";}
    else if (txt == "河鳗"){document.getElementById("showresult").innerHTML=txt + "所含热量为2154.8 大卡/千克";}
    else if (txt == "河虾"){document.getElementById("showresult").innerHTML=txt + "所含热量为976.7 大卡/千克";}
    else if (txt == "河蚬"){document.getElementById("showresult").innerHTML=txt + "所含热量为1342.9 大卡/千克";}
    else if (txt == "河蟹"){document.getElementById("showresult").innerHTML=txt + "所含热量为2452.4 大卡/千克";}
    else if (txt == "核桃"){document.getElementById("showresult").innerHTML=txt + "所含热量为14581.4 大卡/千克";}
    else if (txt == "核桃薄脆"){document.getElementById("showresult").innerHTML=txt + "所含热量为4800.0 大卡/千克";}
    else if (txt == "荷兰豆"){document.getElementById("showresult").innerHTML=txt + "所含热量为306.8 大卡/千克";}
    else if (txt == "黑豆"){document.getElementById("showresult").innerHTML=txt + "所含热量为3810.0 大卡/千克";}
    else if (txt == "黑麻香酥"){document.getElementById("showresult").innerHTML=txt + "所含热量为4360.0 大卡/千克";}
    else if (txt == "黑米"){document.getElementById("showresult").innerHTML=txt + "所含热量为3330.0 大卡/千克";}
    else if (txt == "黑木耳"){document.getElementById("showresult").innerHTML=txt + "所含热量为2050.0 大卡/千克";}
    else if (txt == "黑洋酥"){document.getElementById("showresult").innerHTML=txt + "所含热量为4170.0 大卡/千克";}
    else if (txt == "黑枣"){document.getElementById("showresult").innerHTML=txt + "所含热量为2326.5 大卡/千克";}
    else if (txt == "黑芝麻"){document.getElementById("showresult").innerHTML=txt + "所含热量为5310.0 大卡/千克";}
    else if (txt == "红菜苔"){document.getElementById("showresult").innerHTML=txt + "所含热量为557.7 大卡/千克";}
    else if (txt == "红茶"){document.getElementById("showresult").innerHTML=txt + "所含热量为2940.0 大卡/千克";}
    else if (txt == "红豆馅"){document.getElementById("showresult").innerHTML=txt + "所含热量为2400.0 大卡/千克";}
    else if (txt == "红果"){document.getElementById("showresult").innerHTML=txt + "所含热量为1250.0 大卡/千克";}
    else if (txt == "红果肠"){document.getElementById("showresult").innerHTML=txt + "所含热量为2600.0 大卡/千克";}
    else if (txt == "红橘"){document.getElementById("showresult").innerHTML=txt + "所含热量为512.8 大卡/千克";}
    else if (txt == "红螺"){document.getElementById("showresult").innerHTML=txt + "所含热量为2163.6 大卡/千克";}
    else if (txt == "红葡萄酒/红酒"){document.getElementById("showresult").innerHTML=txt + "所含热量为910.0 大卡/千克";}
    else if (txt == "红薯"){document.getElementById("showresult").innerHTML=txt + "所含热量为1100.0 大卡/千克";}
    else if (txt == "红糖"){document.getElementById("showresult").innerHTML=txt + "所含热量为3890.0 大卡/千克";}
    else if (txt == "红小豆"){document.getElementById("showresult").innerHTML=txt + "所含热量为3090.0 大卡/千克";}
    else if (txt == "红肖梨"){document.getElementById("showresult").innerHTML=txt + "所含热量为344.8 大卡/千克";}
    else if (txt == "红芸豆"){document.getElementById("showresult").innerHTML=txt + "所含热量为3140.0 大卡/千克";}
    else if (txt == "红鳟鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1736.8 大卡/千克";}
    else if (txt == "胡椒粉"){document.getElementById("showresult").innerHTML=txt + "所含热量为3570.0 大卡/千克";}
    else if (txt == "胡萝卜"){document.getElementById("showresult").innerHTML=txt + "所含热量为443.3 大卡/千克";}
    else if (txt == "胡麻油"){document.getElementById("showresult").innerHTML=txt + "所含热量为4500.0 大卡/千克";}
    else if (txt == "胡子鲇"){document.getElementById("showresult").innerHTML=txt + "所含热量为2920.0 大卡/千克";}
    else if (txt == "葫芦"){document.getElementById("showresult").innerHTML=txt + "所含热量为160.9 大卡/千克";}
    else if (txt == "虎皮芸豆"){document.getElementById("showresult").innerHTML=txt + "所含热量为3340.0 大卡/千克";}
    else if (txt == "花茶"){document.getElementById("showresult").innerHTML=txt + "所含热量为2810.0 大卡/千克";}
    else if (txt == "花卷"){document.getElementById("showresult").innerHTML=txt + "所含热量为2170.0 大卡/千克";}
    else if (txt == "花生"){document.getElementById("showresult").innerHTML=txt + "所含热量为8295.8 大卡/千克";}
    else if (txt == "花生酱"){document.getElementById("showresult").innerHTML=txt + "所含热量为5940.0 大卡/千克";}
    else if (txt == "花生油"){document.getElementById("showresult").innerHTML=txt + "所含热量为8990.0 大卡/千克";}
    else if (txt == "黄豆"){document.getElementById("showresult").innerHTML=txt + "所含热量为3590.0 大卡/千克";}
    else if (txt == "黄豆粉"){document.getElementById("showresult").innerHTML=txt + "所含热量为4180.0 大卡/千克";}
    else if (txt == "黄豆芽"){document.getElementById("showresult").innerHTML=txt + "所含热量为440.0 大卡/千克";}
    else if (txt == "黄姑鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为2111.1 大卡/千克";}
    else if (txt == "黄瓜"){document.getElementById("showresult").innerHTML=txt + "所含热量为163.0 大卡/千克";}
    else if (txt == "黄花菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为2030.6 大卡/千克";}
    else if (txt == "黄酱"){document.getElementById("showresult").innerHTML=txt + "所含热量为1310.0 大卡/千克";}
    else if (txt == "黄米"){document.getElementById("showresult").innerHTML=txt + "所含热量为3420.0 大卡/千克";}
    else if (txt == "黄蘑"){document.getElementById("showresult").innerHTML=txt + "所含热量为1865.2 大卡/千克";}
    else if (txt == "黄鳍鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为2384.6 大卡/千克";}
    else if (txt == "黄鳝"){document.getElementById("showresult").innerHTML=txt + "所含热量为693.2 大卡/千克";}
    else if (txt == "黄桃"){document.getElementById("showresult").innerHTML=txt + "所含热量为580.6 大卡/千克";}
    else if (txt == "黄油"){document.getElementById("showresult").innerHTML=txt + "所含热量为8920.0 大卡/千克";}
    else if (txt == "黄油渣"){document.getElementById("showresult").innerHTML=txt + "所含热量为5990.0 大卡/千克";}
    else if (txt == "茴香"){document.getElementById("showresult").innerHTML=txt + "所含热量为279.1 大卡/千克";}
    else if (txt == "混糖糕点"){document.getElementById("showresult").innerHTML=txt + "所含热量为4530.0 大卡/千克";}
    else if (txt == "火鸡肝"){document.getElementById("showresult").innerHTML=txt + "所含热量为1430.0 大卡/千克";}
    else if (txt == "火鸡腿"){document.getElementById("showresult").innerHTML=txt + "所含热量为900.0 大卡/千克";}
    else if (txt == "火鸡肫"){document.getElementById("showresult").innerHTML=txt + "所含热量为910.0 大卡/千克";}
    else if (txt == "火腿"){document.getElementById("showresult").innerHTML=txt + "所含热量为3180.0 大卡/千克";}
    else if (txt == "火腿肠"){document.getElementById("showresult").innerHTML=txt + "所含热量为2120.0 大卡/千克";}
    else if (txt == "机米"){document.getElementById("showresult").innerHTML=txt + "所含热量为3470.0 大卡/千克";}
    else if (txt == "鸡翅"){document.getElementById("showresult").innerHTML=txt + "所含热量为2811.6 大卡/千克";}
    else if (txt == "鸡蛋"){document.getElementById("showresult").innerHTML=txt + "所含热量为1586.2 大卡/千克";}
    else if (txt == "鸡蛋白"){document.getElementById("showresult").innerHTML=txt + "所含热量为600.0 大卡/千克";}
    else if (txt == "鸡肝"){document.getElementById("showresult").innerHTML=txt + "所含热量为1210.0 大卡/千克";}
    else if (txt == "鸡肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为3878.8 大卡/千克";}
    else if (txt == "鸡肉松"){document.getElementById("showresult").innerHTML=txt + "所含热量为4400.0 大卡/千克";}
    else if (txt == "鸡汤"){document.getElementById("showresult").innerHTML=txt + "所含热量为4080.0 大卡/千克";}
    else if (txt == "鸡腿"){document.getElementById("showresult").innerHTML=txt + "所含热量为2623.2 大卡/千克";}
    else if (txt == "鸡腿酥"){document.getElementById("showresult").innerHTML=txt + "所含热量为4360.0 大卡/千克";}
    else if (txt == "鸡心"){document.getElementById("showresult").innerHTML=txt + "所含热量为1720.0 大卡/千克";}
    else if (txt == "鸡胸脯肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为1330.0 大卡/千克";}
    else if (txt == "鸡血"){document.getElementById("showresult").innerHTML=txt + "所含热量为490.0 大卡/千克";}
    else if (txt == "鸡胗"){document.getElementById("showresult").innerHTML=txt + "所含热量为1180.0 大卡/千克";}
    else if (txt == "鸡爪"){document.getElementById("showresult").innerHTML=txt + "所含热量为4233.3 大卡/千克";}
    else if (txt == "基围虾"){document.getElementById("showresult").innerHTML=txt + "所含热量为1683.3 大卡/千克";}
    else if (txt == "蓟菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为306.8 大卡/千克";}
    else if (txt == "鲫鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为2000.0 大卡/千克";}
    else if (txt == "甲级龙井"){document.getElementById("showresult").innerHTML=txt + "所含热量为3090.0 大卡/千克";}
    else if (txt == "尖嘴白"){document.getElementById("showresult").innerHTML=txt + "所含热量为1712.5 大卡/千克";}
    else if (txt == "煎饼"){document.getElementById("showresult").innerHTML=txt + "所含热量为3330.0 大卡/千克";}
    else if (txt == "减肥笋瓜"){document.getElementById("showresult").innerHTML=txt + "所含热量为131.9 大卡/千克";}
    else if (txt == "江米"){document.getElementById("showresult").innerHTML=txt + "所含热量为3480.0 大卡/千克";}
    else if (txt == "江米条"){document.getElementById("showresult").innerHTML=txt + "所含热量为4390.0 大卡/千克";}
    else if (txt == "豇豆"){document.getElementById("showresult").innerHTML=txt + "所含热量为299.0 大卡/千克";}
    else if (txt == "酱豆腐"){document.getElementById("showresult").innerHTML=txt + "所含热量为1510.0 大卡/千克";}
    else if (txt == "酱黄瓜"){document.getElementById("showresult").innerHTML=txt + "所含热量为240.0 大卡/千克";}
    else if (txt == "酱驴肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为1600.0 大卡/千克";}
    else if (txt == "酱萝卜"){document.getElementById("showresult").innerHTML=txt + "所含热量为300.0 大卡/千克";}
    else if (txt == "酱牛肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为2460.0 大卡/千克";}
    else if (txt == "酱苤蓝丝"){document.getElementById("showresult").innerHTML=txt + "所含热量为390.0 大卡/千克";}
    else if (txt == "酱鸭"){document.getElementById("showresult").innerHTML=txt + "所含热量为3325.0 大卡/千克";}
    else if (txt == "酱鸭"){document.getElementById("showresult").innerHTML=txt + "所含热量为2666.7 大卡/千克";}
    else if (txt == "酱羊肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为2720.0 大卡/千克";}
    else if (txt == "酱油"){document.getElementById("showresult").innerHTML=txt + "所含热量为710.0 大卡/千克";}
    else if (txt == "酱汁肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为5718.8 大卡/千克";}
    else if (txt == "茭白"){document.getElementById("showresult").innerHTML=txt + "所含热量为310.8 大卡/千克";}
    else if (txt == "茭笋"){document.getElementById("showresult").innerHTML=txt + "所含热量为324.7 大卡/千克";}
    else if (txt == "焦圈"){document.getElementById("showresult").innerHTML=txt + "所含热量为5440.0 大卡/千克";}
    else if (txt == "芥蓝"){document.getElementById("showresult").innerHTML=txt + "所含热量为243.6 大卡/千克";}
    else if (txt == "芥末"){document.getElementById("showresult").innerHTML=txt + "所含热量为4760.0 大卡/千克";}
    else if (txt == "金橘"){document.getElementById("showresult").innerHTML=txt + "所含热量为550.0 大卡/千克";}
    else if (txt == "金丝小枣"){document.getElementById("showresult").innerHTML=txt + "所含热量为3975.3 大卡/千克";}
    else if (txt == "金线鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为2500.0 大卡/千克";}
    else if (txt == "金针菇"){document.getElementById("showresult").innerHTML=txt + "所含热量为260.0 大卡/千克";}
    else if (txt == "京八件"){document.getElementById("showresult").innerHTML=txt + "所含热量为4350.0 大卡/千克";}
    else if (txt == "京白梨"){document.getElementById("showresult").innerHTML=txt + "所含热量为683.5 大卡/千克";}
    else if (txt == "京式黄酥"){document.getElementById("showresult").innerHTML=txt + "所含热量为4900.0 大卡/千克";}
    else if (txt == "粳米"){document.getElementById("showresult").innerHTML=txt + "所含热量为3480.0 大卡/千克";}
    else if (txt == "粳米"){document.getElementById("showresult").innerHTML=txt + "所含热量为3430.0 大卡/千克";}
    else if (txt == "韭菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为288.9 大卡/千克";}
    else if (txt == "韭黄"){document.getElementById("showresult").innerHTML=txt + "所含热量为250.0 大卡/千克";}
    else if (txt == "酒枣"){document.getElementById("showresult").innerHTML=txt + "所含热量为1593.4 大卡/千克";}
    else if (txt == "橘子汁"){document.getElementById("showresult").innerHTML=txt + "所含热量为1190.0 大卡/千克";}
    else if (txt == "蕨菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为2510.0 大卡/千克";}
    else if (txt == "开花豆"){document.getElementById("showresult").innerHTML=txt + "所含热量为4460.0 大卡/千克";}
    else if (txt == "开口笑"){document.getElementById("showresult").innerHTML=txt + "所含热量为5120.0 大卡/千克";}
    else if (txt == "烤麸"){document.getElementById("showresult").innerHTML=txt + "所含热量为1210.0 大卡/千克";}
    else if (txt == "烤鸡"){document.getElementById("showresult").innerHTML=txt + "所含热量为3287.7 大卡/千克";}
    else if (txt == "烤鸭"){document.getElementById("showresult").innerHTML=txt + "所含热量为5450.0 大卡/千克";}
    else if (txt == "可可粉"){document.getElementById("showresult").innerHTML=txt + "所含热量为3200.0 大卡/千克";}
    else if (txt == "肯德基炸鸡"){document.getElementById("showresult").innerHTML=txt + "所含热量为3985.7 大卡/千克";}
    else if (txt == "空心菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为263.2 大卡/千克";}
    else if (txt == "口蘑"){document.getElementById("showresult").innerHTML=txt + "所含热量为2420.0 大卡/千克";}
    else if (txt == "口头鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为2392.9 大卡/千克";}
    else if (txt == "苦菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为350.0 大卡/千克";}
    else if (txt == "苦瓜"){document.getElementById("showresult").innerHTML=txt + "所含热量为234.6 大卡/千克";}
    else if (txt == "快鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为2239.4 大卡/千克";}
    else if (txt == "葵花籽油"){document.getElementById("showresult").innerHTML=txt + "所含热量为8990.0 大卡/千克";}
    else if (txt == "葵花子"){document.getElementById("showresult").innerHTML=txt + "所含热量为11846.2 大卡/千克";}
    else if (txt == "葵花子仁"){document.getElementById("showresult").innerHTML=txt + "所含热量为6060.0 大卡/千克";}
    else if (txt == "腊肠"){document.getElementById("showresult").innerHTML=txt + "所含热量为5840.0 大卡/千克";}
    else if (txt == "腊肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为1810.0 大卡/千克";}
    else if (txt == "腊羊肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为2460.0 大卡/千克";}
    else if (txt == "辣酱(麻)"){document.getElementById("showresult").innerHTML=txt + "所含热量为1350.0 大卡/千克";}
    else if (txt == "辣椒"){document.getElementById("showresult").innerHTML=txt + "所含热量为2409.1 大卡/千克";}
    else if (txt == "辣椒糊"){document.getElementById("showresult").innerHTML=txt + "所含热量为310.0 大卡/千克";}
    else if (txt == "辣椒油"){document.getElementById("showresult").innerHTML=txt + "所含热量为4500.0 大卡/千克";}
    else if (txt == "辣萝卜条"){document.getElementById("showresult").innerHTML=txt + "所含热量为370.0 大卡/千克";}
    else if (txt == "辣油豆瓣酱"){document.getElementById("showresult").innerHTML=txt + "所含热量为1840.0 大卡/千克";}
    else if (txt == "烙饼"){document.getElementById("showresult").innerHTML=txt + "所含热量为2550.0 大卡/千克";}
    else if (txt == "李子"){document.getElementById("showresult").innerHTML=txt + "所含热量为395.6 大卡/千克";}
    else if (txt == "李子杏"){document.getElementById("showresult").innerHTML=txt + "所含热量为380.4 大卡/千克";}
    else if (txt == "鲤鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为2018.5 大卡/千克";}
    else if (txt == "荔枝"){document.getElementById("showresult").innerHTML=txt + "所含热量为958.9 大卡/千克";}
    else if (txt == "栗羊羹"){document.getElementById("showresult").innerHTML=txt + "所含热量为3010.0 大卡/千克";}
    else if (txt == "栗子"){document.getElementById("showresult").innerHTML=txt + "所含热量为4726.0 大卡/千克";}
    else if (txt == "莲子"){document.getElementById("showresult").innerHTML=txt + "所含热量为3440.0 大卡/千克";}
    else if (txt == "莲子糖水"){document.getElementById("showresult").innerHTML=txt + "所含热量为2010.0 大卡/千克";}
    else if (txt == "鲢鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1672.1 大卡/千克";}
    else if (txt == "炼乳"){document.getElementById("showresult").innerHTML=txt + "所含热量为3320.0 大卡/千克";}
    else if (txt == "凉粉"){document.getElementById("showresult").innerHTML=txt + "所含热量为370.0 大卡/千克";}
    else if (txt == "鲮鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1666.7 大卡/千克";}
    else if (txt == "龙虾"){document.getElementById("showresult").innerHTML=txt + "所含热量为1956.5 大卡/千克";}
    else if (txt == "芦柑"){document.getElementById("showresult").innerHTML=txt + "所含热量为558.4 大卡/千克";}
    else if (txt == "芦笋"){document.getElementById("showresult").innerHTML=txt + "所含热量为200.0 大卡/千克";}
    else if (txt == "鲈鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1724.1 大卡/千克";}
    else if (txt == "卤干"){document.getElementById("showresult").innerHTML=txt + "所含热量为3360.0 大卡/千克";}
    else if (txt == "卤猪杂"){document.getElementById("showresult").innerHTML=txt + "所含热量为1860.0 大卡/千克";}
    else if (txt == "卤煮鸡"){document.getElementById("showresult").innerHTML=txt + "所含热量为3028.6 大卡/千克";}
    else if (txt == "驴打滚"){document.getElementById("showresult").innerHTML=txt + "所含热量为1940.0 大卡/千克";}
    else if (txt == "驴肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为2510.0 大卡/千克";}
    else if (txt == "绿茶"){document.getElementById("showresult").innerHTML=txt + "所含热量为2960.0 大卡/千克";}
    else if (txt == "绿豆"){document.getElementById("showresult").innerHTML=txt + "所含热量为3160.0 大卡/千克";}
    else if (txt == "绿豆糕"){document.getElementById("showresult").innerHTML=txt + "所含热量为3490.0 大卡/千克";}
    else if (txt == "绿豆面"){document.getElementById("showresult").innerHTML=txt + "所含热量为3300.0 大卡/千克";}
    else if (txt == "绿豆芽"){document.getElementById("showresult").innerHTML=txt + "所含热量为180.0 大卡/千克";}
    else if (txt == "罗非鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1781.8 大卡/千克";}
    else if (txt == "萝卜干"){document.getElementById("showresult").innerHTML=txt + "所含热量为600.0 大卡/千克";}
    else if (txt == "麻烘糕"){document.getElementById("showresult").innerHTML=txt + "所含热量为3970.0 大卡/千克";}
    else if (txt == "麻花"){document.getElementById("showresult").innerHTML=txt + "所含热量为5240.0 大卡/千克";}
    else if (txt == "麻香糕"){document.getElementById("showresult").innerHTML=txt + "所含热量为4010.0 大卡/千克";}
    else if (txt == "马肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为1220.0 大卡/千克";}
    else if (txt == "麦乳精"){document.getElementById("showresult").innerHTML=txt + "所含热量为4290.0 大卡/千克";}
    else if (txt == "麦穗鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1333.3 大卡/千克";}
    else if (txt == "馒头"){document.getElementById("showresult").innerHTML=txt + "所含热量为2330.0 大卡/千克";}
    else if (txt == "芒果"){document.getElementById("showresult").innerHTML=txt + "所含热量为533.3 大卡/千克";}
    else if (txt == "毛豆"){document.getElementById("showresult").innerHTML=txt + "所含热量为2320.8 大卡/千克";}
    else if (txt == "毛竹笋"){document.getElementById("showresult").innerHTML=txt + "所含热量为313.4 大卡/千克";}
    else if (txt == "梅童鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1793.7 大卡/千克";}
    else if (txt == "美味香酥卷"){document.getElementById("showresult").innerHTML=txt + "所含热量为3680.0 大卡/千克";}
    else if (txt == "猕猴桃"){document.getElementById("showresult").innerHTML=txt + "所含热量为674.7 大卡/千克";}
    else if (txt == "米粉"){document.getElementById("showresult").innerHTML=txt + "所含热量为3460.0 大卡/千克";}
    else if (txt == "米花糖"){document.getElementById("showresult").innerHTML=txt + "所含热量为3840.0 大卡/千克";}
    else if (txt == "米粥"){document.getElementById("showresult").innerHTML=txt + "所含热量为460.0 大卡/千克";}
    else if (txt == "密云小枣"){document.getElementById("showresult").innerHTML=txt + "所含热量为2326.1 大卡/千克";}
    else if (txt == "蜜橘"){document.getElementById("showresult").innerHTML=txt + "所含热量为552.6 大卡/千克";}
    else if (txt == "蜜麻花"){document.getElementById("showresult").innerHTML=txt + "所含热量为3670.0 大卡/千克";}
    else if (txt == "蜜桃"){document.getElementById("showresult").innerHTML=txt + "所含热量为465.9 大卡/千克";}
    else if (txt == "绵白糖"){document.getElementById("showresult").innerHTML=txt + "所含热量为3960.0 大卡/千克";}
    else if (txt == "棉籽油"){document.getElementById("showresult").innerHTML=txt + "所含热量为8990.0 大卡/千克";}
    else if (txt == "面包"){document.getElementById("showresult").innerHTML=txt + "所含热量为3120.0 大卡/千克";}
    else if (txt == "面包"){document.getElementById("showresult").innerHTML=txt + "所含热量为3180.0 大卡/千克";}
    else if (txt == "全麦面包"){document.getElementById("showresult").innerHTML=txt + "所含热量为2460.0 大卡/千克";}
    else if (txt == "面包鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1596.2 大卡/千克";}
    else if (txt == "面西胡瓜"){document.getElementById("showresult").innerHTML=txt + "所含热量为113.6 大卡/千克";}
    else if (txt == "明太鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1955.6 大卡/千克";}
    else if (txt == "明虾"){document.getElementById("showresult").innerHTML=txt + "所含热量为1491.2 大卡/千克";}
    else if (txt == "墨鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1188.4 大卡/千克";}
    else if (txt == "母麻鸭"){document.getElementById("showresult").innerHTML=txt + "所含热量为6146.7 大卡/千克";}
    else if (txt == "母乳"){document.getElementById("showresult").innerHTML=txt + "所含热量为650.0 大卡/千克";}
    else if (txt == "牡蛎"){document.getElementById("showresult").innerHTML=txt + "所含热量为730.0 大卡/千克";}
    else if (txt == "木耳菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为263.2 大卡/千克";}
    else if (txt == "木瓜"){document.getElementById("showresult").innerHTML=txt + "所含热量为314.0 大卡/千克";}
    else if (txt == "苜蓿"){document.getElementById("showresult").innerHTML=txt + "所含热量为600.0 大卡/千克";}
    else if (txt == "奶豆腐"){document.getElementById("showresult").innerHTML=txt + "所含热量为3050.0 大卡/千克";}
    else if (txt == "奶疙瘩"){document.getElementById("showresult").innerHTML=txt + "所含热量为4260.0 大卡/千克";}
    else if (txt == "奶酪"){document.getElementById("showresult").innerHTML=txt + "所含热量为3280.0 大卡/千克";}
    else if (txt == "奶皮子"){document.getElementById("showresult").innerHTML=txt + "所含热量为4600.0 大卡/千克";}
    else if (txt == "奶片"){document.getElementById("showresult").innerHTML=txt + "所含热量为4720.0 大卡/千克";}
    else if (txt == "奶糖"){document.getElementById("showresult").innerHTML=txt + "所含热量为4070.0 大卡/千克";}
    else if (txt == "奶油"){document.getElementById("showresult").innerHTML=txt + "所含热量为7200.0 大卡/千克";}
    else if (txt == "奶油饼干"){document.getElementById("showresult").innerHTML=txt + "所含热量为4290.0 大卡/千克";}
    else if (txt == "南豆腐"){document.getElementById("showresult").innerHTML=txt + "所含热量为570.0 大卡/千克";}
    else if (txt == "南瓜"){document.getElementById("showresult").innerHTML=txt + "所含热量为258.8 大卡/千克";}
    else if (txt == "南瓜子"){document.getElementById("showresult").innerHTML=txt + "所含热量为8441.2 大卡/千克";}
    else if (txt == "泥鳅"){document.getElementById("showresult").innerHTML=txt + "所含热量为1600.0 大卡/千克";}
    else if (txt == "年糕"){document.getElementById("showresult").innerHTML=txt + "所含热量为1540.0 大卡/千克";}
    else if (txt == "鲇鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1569.2 大卡/千克";}
    else if (txt == "柠檬"){document.getElementById("showresult").innerHTML=txt + "所含热量为530.3 大卡/千克";}
    else if (txt == "可乐"){document.getElementById("showresult").innerHTML=txt + "所含热量为380.0 大卡/千克";}
    else if (txt == "柠檬汁"){document.getElementById("showresult").innerHTML=txt + "所含热量为260.0 大卡/千克";}
    else if (txt == "牛肚"){document.getElementById("showresult").innerHTML=txt + "所含热量为720.0 大卡/千克";}
    else if (txt == "牛肺"){document.getElementById("showresult").innerHTML=txt + "所含热量为940.0 大卡/千克";}
    else if (txt == "牛肝"){document.getElementById("showresult").innerHTML=txt + "所含热量为1390.0 大卡/千克";}
    else if (txt == "牛俐生菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为185.2 大卡/千克";}
    else if (txt == "牛奶"){document.getElementById("showresult").innerHTML=txt + "所含热量为540.0 大卡/千克";}
    else if (txt == "强化牛奶"){document.getElementById("showresult").innerHTML=txt + "所含热量为510.0 大卡/千克";}
    else if (txt == "牛奶粉"){document.getElementById("showresult").innerHTML=txt + "所含热量为5100.0 大卡/千克";}
    else if (txt == "全脂牛奶粉"){document.getElementById("showresult").innerHTML=txt + "所含热量为4780.0 大卡/千克";}
    else if (txt == "牛肉干"){document.getElementById("showresult").innerHTML=txt + "所含热量为5500.0 大卡/千克";}
    else if (txt == "牛肉辣瓣酱"){document.getElementById("showresult").innerHTML=txt + "所含热量为1270.0 大卡/千克";}
    else if (txt == "牛肉松"){document.getElementById("showresult").innerHTML=txt + "所含热量为4450.0 大卡/千克";}
    else if (txt == "牛舌"){document.getElementById("showresult").innerHTML=txt + "所含热量为1960.0 大卡/千克";}
    else if (txt == "牛蹄筋"){document.getElementById("showresult").innerHTML=txt + "所含热量为1510.0 大卡/千克";}
    else if (txt == "牛油"){document.getElementById("showresult").innerHTML=txt + "所含热量为8350.0 大卡/千克";}
    else if (txt == "藕"){document.getElementById("showresult").innerHTML=txt + "所含热量为795.5 大卡/千克";}
    else if (txt == "藕粉"){document.getElementById("showresult").innerHTML=txt + "所含热量为3720.0 大卡/千克";}
    else if (txt == "泡泡糖"){document.getElementById("showresult").innerHTML=txt + "所含热量为5294.1 大卡/千克";}
    else if (txt == "枇杷"){document.getElementById("showresult").innerHTML=txt + "所含热量为629.0 大卡/千克";}
    else if (txt == "郫县辣酱"){document.getElementById("showresult").innerHTML=txt + "所含热量为890.0 大卡/千克";}
    else if (txt == "琵琶虾"){document.getElementById("showresult").innerHTML=txt + "所含热量为2531.3 大卡/千克";}
    else if (txt == "片口鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1544.1 大卡/千克";}
    else if (txt == "苤蓝"){document.getElementById("showresult").innerHTML=txt + "所含热量为384.6 大卡/千克";}
    else if (txt == "平菇"){document.getElementById("showresult").innerHTML=txt + "所含热量为215.1 大卡/千克";}
    else if (txt == "平鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为2028.6 大卡/千克";}
    else if (txt == "苹果"){document.getElementById("showresult").innerHTML=txt + "所含热量为702.4 大卡/千克";}
    else if (txt == "苹果脯"){document.getElementById("showresult").innerHTML=txt + "所含热量为3360.0 大卡/千克";}
    else if (txt == "苹果酱"){document.getElementById("showresult").innerHTML=txt + "所含热量为2770.0 大卡/千克";}
    else if (txt == "苹果梨"){document.getElementById("showresult").innerHTML=txt + "所含热量为510.6 大卡/千克";}
    else if (txt == "葡萄"){document.getElementById("showresult").innerHTML=txt + "所含热量为595.2 大卡/千克";}
    else if (txt == "葡萄干"){document.getElementById("showresult").innerHTML=txt + "所含热量为3410.0 大卡/千克";}
    else if (txt == "普中红蘑"){document.getElementById("showresult").innerHTML=txt + "所含热量为2140.0 大卡/千克";}
    else if (txt == "起酥"){document.getElementById("showresult").innerHTML=txt + "所含热量为4990.0 大卡/千克";}
    else if (txt == "汽水(特制)"){document.getElementById("showresult").innerHTML=txt + "所含热量为420.0 大卡/千克";}
    else if (txt == "荞麦粉"){document.getElementById("showresult").innerHTML=txt + "所含热量为3040.0 大卡/千克";}
    else if (txt == "巧克力"){document.getElementById("showresult").innerHTML=txt + "所含热量为5860.0 大卡/千克";}
    else if (txt == "巧克力豆奶"){document.getElementById("showresult").innerHTML=txt + "所含热量为390.0 大卡/千克";}
    else if (txt == "茄子"){document.getElementById("showresult").innerHTML=txt + "所含热量为277.8 大卡/千克";}
    else if (txt == "茄子"){document.getElementById("showresult").innerHTML=txt + "所含热量为225.8 大卡/千克";}
    else if (txt == "芹菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为298.5 大卡/千克";}
    else if (txt == "芹菜叶"){document.getElementById("showresult").innerHTML=txt + "所含热量为310.0 大卡/千克";}
    else if (txt == "青萝卜"){document.getElementById("showresult").innerHTML=txt + "所含热量为326.3 大卡/千克";}
    else if (txt == "青蒜"){document.getElementById("showresult").innerHTML=txt + "所含热量为357.1 大卡/千克";}
    else if (txt == "青鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1841.3 大卡/千克";}
    else if (txt == "琼脂"){document.getElementById("showresult").innerHTML=txt + "所含热量为3110.0 大卡/千克";}
    else if (txt == "曲奇饼"){document.getElementById("showresult").innerHTML=txt + "所含热量为5460.0 大卡/千克";}
    else if (txt == "人参果"){document.getElementById("showresult").innerHTML=txt + "所含热量为909.1 大卡/千克";}
    else if (txt == "肉鸡"){document.getElementById("showresult").innerHTML=txt + "所含热量为5256.8 大卡/千克";}
    else if (txt == "三鲜豆皮"){document.getElementById("showresult").innerHTML=txt + "所含热量为2400.0 大卡/千克";}
    else if (txt == "桑葚"){document.getElementById("showresult").innerHTML=txt + "所含热量为490.0 大卡/千克";}
    else if (txt == "色拉油"){document.getElementById("showresult").innerHTML=txt + "所含热量为8980.0 大卡/千克";}
    else if (txt == "沙丁鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1313.4 大卡/千克";}
    else if (txt == "沙鸡"){document.getElementById("showresult").innerHTML=txt + "所含热量为3585.4 大卡/千克";}
    else if (txt == "沙梭鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1694.4 大卡/千克";}
    else if (txt == "沙枣"){document.getElementById("showresult").innerHTML=txt + "所含热量为4878.0 大卡/千克";}
    else if (txt == "鲨鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1964.3 大卡/千克";}
    else if (txt == "山药"){document.getElementById("showresult").innerHTML=txt + "所含热量为674.7 大卡/千克";}
    else if (txt == "山楂精"){document.getElementById("showresult").innerHTML=txt + "所含热量为3860.0 大卡/千克";}
    else if (txt == "南乳"){document.getElementById("showresult").innerHTML=txt + "所含热量为1380.0 大卡/千克";}
    else if (txt == "烧饼"){document.getElementById("showresult").innerHTML=txt + "所含热量为3260.0 大卡/千克";}
    else if (txt == "烧鹅"){document.getElementById("showresult").innerHTML=txt + "所含热量为3958.9 大卡/千克";}
    else if (txt == "烧麦"){document.getElementById("showresult").innerHTML=txt + "所含热量为2380.0 大卡/千克";}
    else if (txt == "生菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为138.3 大卡/千克";}
    else if (txt == "生蚝"){document.getElementById("showresult").innerHTML=txt + "所含热量为570.0 大卡/千克";}
    else if (txt == "石斑鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1491.2 大卡/千克";}
    else if (txt == "石花菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为3140.0 大卡/千克";}
    else if (txt == "石榴"){document.getElementById("showresult").innerHTML=txt + "所含热量为1105.3 大卡/千克";}
    else if (txt == "柿饼"){document.getElementById("showresult").innerHTML=txt + "所含热量为2577.3 大卡/千克";}
    else if (txt == "柿子"){document.getElementById("showresult").innerHTML=txt + "所含热量为816.1 大卡/千克";}
    else if (txt == "柿子椒"){document.getElementById("showresult").innerHTML=txt + "所含热量为268.3 大卡/千克";}
    else if (txt == "双孢蘑菇"){document.getElementById("showresult").innerHTML=txt + "所含热量为226.8 大卡/千克";}
    else if (txt == "水发木耳"){document.getElementById("showresult").innerHTML=txt + "所含热量为210.0 大卡/千克";}
    else if (txt == "水面筋"){document.getElementById("showresult").innerHTML=txt + "所含热量为1400.0 大卡/千克";}
    else if (txt == "水芹"){document.getElementById("showresult").innerHTML=txt + "所含热量为216.7 大卡/千克";}
    else if (txt == "丝瓜"){document.getElementById("showresult").innerHTML=txt + "所含热量为241.0 大卡/千克";}
    else if (txt == "四季豆"){document.getElementById("showresult").innerHTML=txt + "所含热量为291.7 大卡/千克";}
    else if (txt == "松花蛋(鸭)"){document.getElementById("showresult").innerHTML=txt + "所含热量为1900.0 大卡/千克";}
    else if (txt == "松蘑"){document.getElementById("showresult").innerHTML=txt + "所含热量为1120.0 大卡/千克";}
    else if (txt == "松子"){document.getElementById("showresult").innerHTML=txt + "所含热量为19967.7 大卡/千克";}
    else if (txt == "松子仁"){document.getElementById("showresult").innerHTML=txt + "所含热量为6980.0 大卡/千克";}
    else if (txt == "苏打饼干"){document.getElementById("showresult").innerHTML=txt + "所含热量为4080.0 大卡/千克";}
    else if (txt == "酥梨"){document.getElementById("showresult").innerHTML=txt + "所含热量为597.2 大卡/千克";}
    else if (txt == "酥皮糕点"){document.getElementById("showresult").innerHTML=txt + "所含热量为4260.0 大卡/千克";}
    else if (txt == "酥糖"){document.getElementById("showresult").innerHTML=txt + "所含热量为4360.0 大卡/千克";}
    else if (txt == "素大肠"){document.getElementById("showresult").innerHTML=txt + "所含热量为1530.0 大卡/千克";}
    else if (txt == "素火腿"){document.getElementById("showresult").innerHTML=txt + "所含热量为2110.0 大卡/千克";}
    else if (txt == "素鸡"){document.getElementById("showresult").innerHTML=txt + "所含热量为1920.0 大卡/千克";}
    else if (txt == "素什锦"){document.getElementById("showresult").innerHTML=txt + "所含热量为1730.0 大卡/千克";}
    else if (txt == "素虾"){document.getElementById("showresult").innerHTML=txt + "所含热量为5760.0 大卡/千克";}
    else if (txt == "酸菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为140.0 大卡/千克";}
    else if (txt == "酸豆乳"){document.getElementById("showresult").innerHTML=txt + "所含热量为670.0 大卡/千克";}
    else if (txt == "酸梅精"){document.getElementById("showresult").innerHTML=txt + "所含热量为3940.0 大卡/千克";}
    else if (txt == "酸奶"){document.getElementById("showresult").innerHTML=txt + "所含热量为720.0 大卡/千克";}
    else if (txt == "酸三色糖"){document.getElementById("showresult").innerHTML=txt + "所含热量为3970.0 大卡/千克";}
    else if (txt == "蒜肠"){document.getElementById("showresult").innerHTML=txt + "所含热量为2970.0 大卡/千克";}
    else if (txt == "蒜黄"){document.getElementById("showresult").innerHTML=txt + "所含热量为216.5 大卡/千克";}
    else if (txt == "蒜苗"){document.getElementById("showresult").innerHTML=txt + "所含热量为451.2 大卡/千克";}
    else if (txt == "梭子蟹"){document.getElementById("showresult").innerHTML=txt + "所含热量为1938.8 大卡/千克";}
    else if (txt == "苔菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为1480.0 大卡/千克";}
    else if (txt == "鲐鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为2348.5 大卡/千克";}
    else if (txt == "汤包"){document.getElementById("showresult").innerHTML=txt + "所含热量为2380.0 大卡/千克";}
    else if (txt == "糖蒜"){document.getElementById("showresult").innerHTML=txt + "所含热量为1540.5 大卡/千克";}
    else if (txt == "桃"){document.getElementById("showresult").innerHTML=txt + "所含热量为516.9 大卡/千克";}
    else if (txt == "桃脯"){document.getElementById("showresult").innerHTML=txt + "所含热量为3100.0 大卡/千克";}
    else if (txt == "桃酱"){document.getElementById("showresult").innerHTML=txt + "所含热量为2730.0 大卡/千克";}
    else if (txt == "桃酥"){document.getElementById("showresult").innerHTML=txt + "所含热量为4810.0 大卡/千克";}
    else if (txt == "田螺"){document.getElementById("showresult").innerHTML=txt + "所含热量为2307.7 大卡/千克";}
    else if (txt == "甜菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为833.3 大卡/千克";}
    else if (txt == "甜辣黄瓜"){document.getElementById("showresult").innerHTML=txt + "所含热量为990.0 大卡/千克";}
    else if (txt == "甜面酱"){document.getElementById("showresult").innerHTML=txt + "所含热量为1360.0 大卡/千克";}
    else if (txt == "填鸭"){document.getElementById("showresult").innerHTML=txt + "所含热量为5653.3 大卡/千克";}
    else if (txt == "铁观音"){document.getElementById("showresult").innerHTML=txt + "所含热量为3040.0 大卡/千克";}
    else if (txt == "通心粉"){document.getElementById("showresult").innerHTML=txt + "所含热量为3500.0 大卡/千克";}
    else if (txt == "茼蒿"){document.getElementById("showresult").innerHTML=txt + "所含热量为256.1 大卡/千克";}
    else if (txt == "土豆"){document.getElementById("showresult").innerHTML=txt + "所含热量为808.5 大卡/千克";}
    else if (txt == "土豆粉"){document.getElementById("showresult").innerHTML=txt + "所含热量为3370.0 大卡/千克";}
    else if (txt == "土鸡"){document.getElementById("showresult").innerHTML=txt + "所含热量为2137.9 大卡/千克";}
    else if (txt == "兔肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为1020.0 大卡/千克";}
    else if (txt == "脱脂酸奶"){document.getElementById("showresult").innerHTML=txt + "所含热量为570.0 大卡/千克";}
    else if (txt == "瓦罐鸡汤(肉)"){document.getElementById("showresult").innerHTML=txt + "所含热量为1900.0 大卡/千克";}
    else if (txt == "豌豆"){document.getElementById("showresult").innerHTML=txt + "所含热量为2500.0 大卡/千克";}
    else if (txt == "豌豆黄"){document.getElementById("showresult").innerHTML=txt + "所含热量为1330.0 大卡/千克";}
    else if (txt == "豌豆苗"){document.getElementById("showresult").innerHTML=txt + "所含热量为295.9 大卡/千克";}
    else if (txt == "碗糕"){document.getElementById("showresult").innerHTML=txt + "所含热量为3320.0 大卡/千克";}
    else if (txt == "维夫饼干"){document.getElementById("showresult").innerHTML=txt + "所含热量为5280.0 大卡/千克";}
    else if (txt == "味精"){document.getElementById("showresult").innerHTML=txt + "所含热量为2680.0 大卡/千克";}
    else if (txt == "莴笋"){document.getElementById("showresult").innerHTML=txt + "所含热量为225.8 大卡/千克";}
    else if (txt == "莴笋叶"){document.getElementById("showresult").innerHTML=txt + "所含热量为202.2 大卡/千克";}
    else if (txt == "乌骨鸡"){document.getElementById("showresult").innerHTML=txt + "所含热量为2312.5 大卡/千克";}
    else if (txt == "乌鸦肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为1360.0 大卡/千克";}
    else if (txt == "乌鱼蛋"){document.getElementById("showresult").innerHTML=txt + "所含热量为904.1 大卡/千克";}
    else if (txt == "乌枣"){document.getElementById("showresult").innerHTML=txt + "所含热量为3864.4 大卡/千克";}
    else if (txt == "乌贼"){document.getElementById("showresult").innerHTML=txt + "所含热量为866.0 大卡/千克";}
    else if (txt == "无核蜜枣"){document.getElementById("showresult").innerHTML=txt + "所含热量为3200.0 大卡/千克";}
    else if (txt == "无花果"){document.getElementById("showresult").innerHTML=txt + "所含热量为590.0 大卡/千克";}
    else if (txt == "午餐肠"){document.getElementById("showresult").innerHTML=txt + "所含热量为2610.0 大卡/千克";}
    else if (txt == "午餐肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为2290.0 大卡/千克";}
    else if (txt == "西瓜"){document.getElementById("showresult").innerHTML=txt + "所含热量为576.3 大卡/千克";}
    else if (txt == "西瓜脯"){document.getElementById("showresult").innerHTML=txt + "所含热量为3050.0 大卡/千克";}
    else if (txt == "西瓜子"){document.getElementById("showresult").innerHTML=txt + "所含热量为13325.6 大卡/千克";}
    else if (txt == "西红柿"){document.getElementById("showresult").innerHTML=txt + "所含热量为195.9 大卡/千克";}
    else if (txt == "西葫芦"){document.getElementById("showresult").innerHTML=txt + "所含热量为246.6 大卡/千克";}
    else if (txt == "西兰花/绿菜花"){document.getElementById("showresult").innerHTML=txt + "所含热量为397.6 大卡/千克";}
    else if (txt == "西洋菜/豆瓣菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为232.9 大卡/千克";}
    else if (txt == "喜乐"){document.getElementById("showresult").innerHTML=txt + "所含热量为530.0 大卡/千克";}
    else if (txt == "喜鹊肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为1280.0 大卡/千克";}
    else if (txt == "虾皮"){document.getElementById("showresult").innerHTML=txt + "所含热量为1530.0 大卡/千克";}
    else if (txt == "籼米"){document.getElementById("showresult").innerHTML=txt + "所含热量为3480.0 大卡/千克";}
    else if (txt == "鲜贝"){document.getElementById("showresult").innerHTML=txt + "所含热量为770.0 大卡/千克";}
    else if (txt == "鲜赤贝"){document.getElementById("showresult").innerHTML=txt + "所含热量为1794.1 大卡/千克";}
    else if (txt == "鲜姜"){document.getElementById("showresult").innerHTML=txt + "所含热量为431.6 大卡/千克";}
    else if (txt == "鲜蘑"){document.getElementById("showresult").innerHTML=txt + "所含热量为202.0 大卡/千克";}
    else if (txt == "鲜扇贝"){document.getElementById("showresult").innerHTML=txt + "所含热量为1714.3 大卡/千克";}
    else if (txt == "鲜玉米"){document.getElementById("showresult").innerHTML=txt + "所含热量为2304.3 大卡/千克";}
    else if (txt == "鲜枣"){document.getElementById("showresult").innerHTML=txt + "所含热量为1402.3 大卡/千克";}
    else if (txt == "咸肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为3850.0 大卡/千克";}
    else if (txt == "苋菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为424.7 大卡/千克";}
    else if (txt == "香菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为382.7 大卡/千克";}
    else if (txt == "香肠"){document.getElementById("showresult").innerHTML=txt + "所含热量为5080.0 大卡/千克";}
    else if (txt == "香肠"){document.getElementById("showresult").innerHTML=txt + "所含热量为4330.0 大卡/千克";}
    else if (txt == "香椿"){document.getElementById("showresult").innerHTML=txt + "所含热量为618.4 大卡/千克";}
    else if (txt == "香干"){document.getElementById("showresult").innerHTML=txt + "所含热量为1470.0 大卡/千克";}
    else if (txt == "香菇"){document.getElementById("showresult").innerHTML=txt + "所含热量为2221.1 大卡/千克";}
    else if (txt == "香瓜"){document.getElementById("showresult").innerHTML=txt + "所含热量为333.3 大卡/千克";}
    else if (txt == "香海螺"){document.getElementById("showresult").innerHTML=txt + "所含热量为2762.7 大卡/千克";}
    else if (txt == "香蕉"){document.getElementById("showresult").innerHTML=txt + "所含热量为1542.4 大卡/千克";}
    else if (txt == "香米"){document.getElementById("showresult").innerHTML=txt + "所含热量为3460.0 大卡/千克";}
    else if (txt == "香油"){document.getElementById("showresult").innerHTML=txt + "所含热量为8980.0 大卡/千克";}
    else if (txt == "香油炒面"){document.getElementById("showresult").innerHTML=txt + "所含热量为4070.0 大卡/千克";}
    else if (txt == "小白菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为185.2 大卡/千克";}
    else if (txt == "小葱"){document.getElementById("showresult").innerHTML=txt + "所含热量为328.8 大卡/千克";}
    else if (txt == "小豆粥"){document.getElementById("showresult").innerHTML=txt + "所含热量为610.0 大卡/千克";}
    else if (txt == "小肚"){document.getElementById("showresult").innerHTML=txt + "所含热量为2250.0 大卡/千克";}
    else if (txt == "小红肠"){document.getElementById("showresult").innerHTML=txt + "所含热量为2800.0 大卡/千克";}
    else if (txt == "小黄花鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1571.4 大卡/千克";}
    else if (txt == "小米"){document.getElementById("showresult").innerHTML=txt + "所含热量为3580.0 大卡/千克";}
    else if (txt == "小泥肠"){document.getElementById("showresult").innerHTML=txt + "所含热量为2950.0 大卡/千克";}
    else if (txt == "小水萝卜"){document.getElementById("showresult").innerHTML=txt + "所含热量为287.9 大卡/千克";}
    else if (txt == "小叶芥菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为272.7 大卡/千克";}
    else if (txt == "小叶橘"){document.getElementById("showresult").innerHTML=txt + "所含热量为469.1 大卡/千克";}
    else if (txt == "蟹肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为620.0 大卡/千克";}
    else if (txt == "心里美萝卜"){document.getElementById("showresult").innerHTML=txt + "所含热量为238.6 大卡/千克";}
    else if (txt == "杏"){document.getElementById("showresult").innerHTML=txt + "所含热量为395.6 大卡/千克";}
    else if (txt == "杏丁蘑"){document.getElementById("showresult").innerHTML=txt + "所含热量为2070.0 大卡/千克";}
    else if (txt == "杏脯"){document.getElementById("showresult").innerHTML=txt + "所含热量为3290.0 大卡/千克";}
    else if (txt == "杏酱"){document.getElementById("showresult").innerHTML=txt + "所含热量为2860.0 大卡/千克";}
    else if (txt == "杏仁"){document.getElementById("showresult").innerHTML=txt + "所含热量为5140.0 大卡/千克";}
    else if (txt == "杏仁露"){document.getElementById("showresult").innerHTML=txt + "所含热量为460.0 大卡/千克";}
    else if (txt == "雪花梨"){document.getElementById("showresult").innerHTML=txt + "所含热量为476.7 大卡/千克";}
    else if (txt == "雪里红"){document.getElementById("showresult").innerHTML=txt + "所含热量为255.3 大卡/千克";}
    else if (txt == "血糯米"){document.getElementById("showresult").innerHTML=txt + "所含热量为3430.0 大卡/千克";}
    else if (txt == "薰干"){document.getElementById("showresult").innerHTML=txt + "所含热量为1530.0 大卡/千克";}
    else if (txt == "鸭"){document.getElementById("showresult").innerHTML=txt + "所含热量为3529.4 大卡/千克";}
    else if (txt == "鸭翅"){document.getElementById("showresult").innerHTML=txt + "所含热量为2179.1 大卡/千克";}
    else if (txt == "鸭蛋白"){document.getElementById("showresult").innerHTML=txt + "所含热量为470.0 大卡/千克";}
    else if (txt == "鸭肝"){document.getElementById("showresult").innerHTML=txt + "所含热量为1280.0 大卡/千克";}
    else if (txt == "鸭广梨"){document.getElementById("showresult").innerHTML=txt + "所含热量为657.9 大卡/千克";}
    else if (txt == "鸭梨"){document.getElementById("showresult").innerHTML=txt + "所含热量为524.4 大卡/千克";}
    else if (txt == "鸭皮"){document.getElementById("showresult").innerHTML=txt + "所含热量为5380.0 大卡/千克";}
    else if (txt == "鸭舌"){document.getElementById("showresult").innerHTML=txt + "所含热量为4016.4 大卡/千克";}
    else if (txt == "鸭心"){document.getElementById("showresult").innerHTML=txt + "所含热量为1430.0 大卡/千克";}
    else if (txt == "鸭胸脯肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为900.0 大卡/千克";}
    else if (txt == "鸭血"){document.getElementById("showresult").innerHTML=txt + "所含热量为580.0 大卡/千克";}
    else if (txt == "鸭油"){document.getElementById("showresult").innerHTML=txt + "所含热量为8970.0 大卡/千克";}
    else if (txt == "鸭掌"){document.getElementById("showresult").innerHTML=txt + "所含热量为2542.4 大卡/千克";}
    else if (txt == "鸭肫"){document.getElementById("showresult").innerHTML=txt + "所含热量为989.2 大卡/千克";}
    else if (txt == "腌雪里红"){document.getElementById("showresult").innerHTML=txt + "所含热量为250.0 大卡/千克";}
    else if (txt == "盐水鸭"){document.getElementById("showresult").innerHTML=txt + "所含热量为3851.9 大卡/千克";}
    else if (txt == "燕麦片"){document.getElementById("showresult").innerHTML=txt + "所含热量为3670.0 大卡/千克";}
    else if (txt == "羊大肠"){document.getElementById("showresult").innerHTML=txt + "所含热量为700.0 大卡/千克";}
    else if (txt == "羊肚"){document.getElementById("showresult").innerHTML=txt + "所含热量为870.0 大卡/千克";}
    else if (txt == "羊肝"){document.getElementById("showresult").innerHTML=txt + "所含热量为1340.0 大卡/千克";}
    else if (txt == "羊角豆"){document.getElementById("showresult").innerHTML=txt + "所含热量为420.5 大卡/千克";}
    else if (txt == "羊奶"){document.getElementById("showresult").innerHTML=txt + "所含热量为590.0 大卡/千克";}
    else if (txt == "全脂羊奶粉"){document.getElementById("showresult").innerHTML=txt + "所含热量为4980.0 大卡/千克";}
    else if (txt == "羊脑"){document.getElementById("showresult").innerHTML=txt + "所含热量为1420.0 大卡/千克";}
    else if (txt == "羊肉串"){document.getElementById("showresult").innerHTML=txt + "所含热量为2340.0 大卡/千克";}
    else if (txt == "羊肉干"){document.getElementById("showresult").innerHTML=txt + "所含热量为5880.0 大卡/千克";}
    else if (txt == "羊舌"){document.getElementById("showresult").innerHTML=txt + "所含热量为2250.0 大卡/千克";}
    else if (txt == "羊肾"){document.getElementById("showresult").innerHTML=txt + "所含热量为900.0 大卡/千克";}
    else if (txt == "羊心"){document.getElementById("showresult").innerHTML=txt + "所含热量为1130.0 大卡/千克";}
    else if (txt == "羊血"){document.getElementById("showresult").innerHTML=txt + "所含热量为570.0 大卡/千克";}
    else if (txt == "羊油"){document.getElementById("showresult").innerHTML=txt + "所含热量为8240.0 大卡/千克";}
    else if (txt == "羊油"){document.getElementById("showresult").innerHTML=txt + "所含热量为8950.0 大卡/千克";}
    else if (txt == "杨梅"){document.getElementById("showresult").innerHTML=txt + "所含热量为341.5 大卡/千克";}
    else if (txt == "杨桃"){document.getElementById("showresult").innerHTML=txt + "所含热量为329.5 大卡/千克";}
    else if (txt == "洋葱"){document.getElementById("showresult").innerHTML=txt + "所含热量为433.3 大卡/千克";}
    else if (txt == "椰子"){document.getElementById("showresult").innerHTML=txt + "所含热量为7000.0 大卡/千克";}
    else if (txt == "野兔肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为840.0 大卡/千克";}
    else if (txt == "薏米"){document.getElementById("showresult").innerHTML=txt + "所含热量为3570.0 大卡/千克";}
    else if (txt == "银鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为1190.0 大卡/千克";}
    else if (txt == "樱桃"){document.getElementById("showresult").innerHTML=txt + "所含热量为575.0 大卡/千克";}
    else if (txt == "硬皮糕点"){document.getElementById("showresult").innerHTML=txt + "所含热量为4630.0 大卡/千克";}
    else if (txt == "油饼"){document.getElementById("showresult").innerHTML=txt + "所含热量为3990.0 大卡/千克";}
    else if (txt == "油菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为264.4 大卡/千克";}
    else if (txt == "油菜苔"){document.getElementById("showresult").innerHTML=txt + "所含热量为215.1 大卡/千克";}
    else if (txt == "油茶"){document.getElementById("showresult").innerHTML=txt + "所含热量为940.0 大卡/千克";}
    else if (txt == "油豆腐"){document.getElementById("showresult").innerHTML=txt + "所含热量为2440.0 大卡/千克";}
    else if (txt == "油豆角"){document.getElementById("showresult").innerHTML=txt + "所含热量为222.2 大卡/千克";}
    else if (txt == "油面筋"){document.getElementById("showresult").innerHTML=txt + "所含热量为4900.0 大卡/千克";}
    else if (txt == "油条"){document.getElementById("showresult").innerHTML=txt + "所含热量为3860.0 大卡/千克";}
    else if (txt == "油炸豆瓣"){document.getElementById("showresult").innerHTML=txt + "所含热量为4050.0 大卡/千克";}
    else if (txt == "油炸豆花"){document.getElementById("showresult").innerHTML=txt + "所含热量为4000.0 大卡/千克";}
    else if (txt == "油炸土豆片/薯片"){document.getElementById("showresult").innerHTML=txt + "所含热量为6120.0 大卡/千克";}
    else if (txt == "柚子"){document.getElementById("showresult").innerHTML=txt + "所含热量为594.2 大卡/千克";}
    else if (txt == "莜麦面"){document.getElementById("showresult").innerHTML=txt + "所含热量为3850.0 大卡/千克";}
    else if (txt == "鱿鱼(水浸)"){document.getElementById("showresult").innerHTML=txt + "所含热量为765.3 大卡/千克";}
    else if (txt == "鱼子酱(大麻哈)"){document.getElementById("showresult").innerHTML=txt + "所含热量为2520.0 大卡/千克";}
    else if (txt == "榆钱"){document.getElementById("showresult").innerHTML=txt + "所含热量为360.0 大卡/千克";}
    else if (txt == "玉兰片"){document.getElementById("showresult").innerHTML=txt + "所含热量为430.0 大卡/千克";}
    else if (txt == "玉米"){document.getElementById("showresult").innerHTML=txt + "所含热量为3360.0 大卡/千克";}
    else if (txt == "玉米面"){document.getElementById("showresult").innerHTML=txt + "所含热量为3400.0 大卡/千克";}
    else if (txt == "玉米糁"){document.getElementById("showresult").innerHTML=txt + "所含热量为3470.0 大卡/千克";}
    else if (txt == "玉米油"){document.getElementById("showresult").innerHTML=txt + "所含热量为8950.0 大卡/千克";}
    else if (txt == "芋头"){document.getElementById("showresult").innerHTML=txt + "所含热量为940.5 大卡/千克";}
    else if (txt == "圆白菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为255.8 大卡/千克";}
    else if (txt == "月饼"){document.getElementById("showresult").innerHTML=txt + "所含热量为4280.0 大卡/千克";}
    else if (txt == "芸豆"){document.getElementById("showresult").innerHTML=txt + "所含热量为260.4 大卡/千克";}
    else if (txt == "杂豆"){document.getElementById("showresult").innerHTML=txt + "所含热量为3160.0 大卡/千克";}
    else if (txt == "杂芸豆"){document.getElementById("showresult").innerHTML=txt + "所含热量为3060.0 大卡/千克";}
    else if (txt == "炸糕"){document.getElementById("showresult").innerHTML=txt + "所含热量为2800.0 大卡/千克";}
    else if (txt == "榨菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为290.0 大卡/千克";}
    else if (txt == "章鱼"){document.getElementById("showresult").innerHTML=txt + "所含热量为520.0 大卡/千克";}
    else if (txt == "珍珠白蘑"){document.getElementById("showresult").innerHTML=txt + "所含热量为2120.0 大卡/千克";}
    else if (txt == "榛蘑"){document.getElementById("showresult").innerHTML=txt + "所含热量为2039.0 大卡/千克";}
    else if (txt == "榛子"){document.getElementById("showresult").innerHTML=txt + "所含热量为28285.7 大卡/千克";}
    else if (txt == "芝麻酱"){document.getElementById("showresult").innerHTML=txt + "所含热量为6180.0 大卡/千克";}
    else if (txt == "芝麻南糖"){document.getElementById("showresult").innerHTML=txt + "所含热量为5380.0 大卡/千克";}
    else if (txt == "猪大肠"){document.getElementById("showresult").innerHTML=txt + "所含热量为1910.0 大卡/千克";}
    else if (txt == "猪大排"){document.getElementById("showresult").innerHTML=txt + "所含热量为3882.4 大卡/千克";}
    else if (txt == "猪肚"){document.getElementById("showresult").innerHTML=txt + "所含热量为1145.8 大卡/千克";}
    else if (txt == "猪耳"){document.getElementById("showresult").innerHTML=txt + "所含热量为1900.0 大卡/千克";}
    else if (txt == "猪肺"){document.getElementById("showresult").innerHTML=txt + "所含热量为866.0 大卡/千克";}
    else if (txt == "猪肝"){document.getElementById("showresult").innerHTML=txt + "所含热量为2030.0 大卡/千克";}
    else if (txt == "猪口条"){document.getElementById("showresult").innerHTML=txt + "所含热量为2478.7 大卡/千克";}
    else if (txt == "猪脑"){document.getElementById("showresult").innerHTML=txt + "所含热量为1310.0 大卡/千克";}
    else if (txt == "猪排骨"){document.getElementById("showresult").innerHTML=txt + "所含热量为3861.1 大卡/千克";}
    else if (txt == "猪肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为6400.0 大卡/千克";}
    else if (txt == "猪肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为3950.0 大卡/千克";}
    else if (txt == "猪肉松"){document.getElementById("showresult").innerHTML=txt + "所含热量为3960.0 大卡/千克";}
    else if (txt == "猪瘦肉"){document.getElementById("showresult").innerHTML=txt + "所含热量为5916.7 大卡/千克";}
    else if (txt == "猪蹄"){document.getElementById("showresult").innerHTML=txt + "所含热量为4433.3 大卡/千克";}
    else if (txt == "猪蹄筋"){document.getElementById("showresult").innerHTML=txt + "所含热量为1560.0 大卡/千克";}
    else if (txt == "猪小肠"){document.getElementById("showresult").innerHTML=txt + "所含热量为650.0 大卡/千克";}
    else if (txt == "猪心"){document.getElementById("showresult").innerHTML=txt + "所含热量为1226.8 大卡/千克";}
    else if (txt == "猪血"){document.getElementById("showresult").innerHTML=txt + "所含热量为550.0 大卡/千克";}
    else if (txt == "猪腰子"){document.getElementById("showresult").innerHTML=txt + "所含热量为1032.3 大卡/千克";}
    else if (txt == "猪油"){document.getElementById("showresult").innerHTML=txt + "所含热量为8970.0 大卡/千克";}
    else if (txt == "猪肘棒"){document.getElementById("showresult").innerHTML=txt + "所含热量为3701.5 大卡/千克";}
    else if (txt == "竹笋"){document.getElementById("showresult").innerHTML=txt + "所含热量为2802.6 大卡/千克";}
    else if (txt == "竹笋"){document.getElementById("showresult").innerHTML=txt + "所含热量为301.6 大卡/千克";}
    else if (txt == "竹笋/鞭笋"){document.getElementById("showresult").innerHTML=txt + "所含热量为244.4 大卡/千克";}
    else if (txt == "竹笋/春笋"){document.getElementById("showresult").innerHTML=txt + "所含热量为303.0 大卡/千克";}
    else if (txt == "砖茶"){document.getElementById("showresult").innerHTML=txt + "所含热量为2060.0 大卡/千克";}
    else if (txt == "状元饼"){document.getElementById("showresult").innerHTML=txt + "所含热量为4350.0 大卡/千克";}
    else if (txt == "紫菜"){document.getElementById("showresult").innerHTML=txt + "所含热量为2070.0 大卡/千克";}
    else if (txt == "紫皮大蒜"){document.getElementById("showresult").innerHTML=txt + "所含热量为1528.1 大卡/千克";}
    else if (txt == "紫雪糕"){document.getElementById("showresult").innerHTML=txt + "所含热量为2280.0 大卡/千克";}
    else if (txt == "棕榈油"){document.getElementById("showresult").innerHTML=txt + "所含热量为9000.0 大卡/千克";}
    else if (txt == "雪梨"){document.getElementById("showresult").innerHTML=txt + "所含热量为476.7 大卡/千克";}
}
    function exercise(){
        var sel = document.getElementById("selectExercise");
        var txt = document.getElementById("txtTime");
        var val = sel.value * txt.value;
        document.getElementById("showresult1").innerHTML="你" + sel.options[sel.selectedIndex].text  + "了" + txt.value + "小时"+ '<br />'+"消耗了" +val + '千焦的热量，加油，再接再厉！';
    }
</script>
@endsection