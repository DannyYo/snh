@extends('home')
@section('title', '健康计算器')
@section('content')
<form method="post" name="Caculat_bmi">
    性别
    男<input align="left" name="gender" type="radio" value="MalePick">
    女<input align="left" name="gender" type="radio" value="FemPick">
    身高<input name="height_cm" size="6">公分
    <br>
    体重<input name="weight_kg" size="6">公斤
    <br>
    腰围
    <input name="waist_cm" size="6">公分
    <br>
    <input onclick="caculat_body_fat(this.form)" type="button" value="计算">
    <br>
    您的体脂肪率为<input name="bodyfat" size="12">
    <br>
    体格指数[BMI]<input name="bmi" size="12">
    <br>
    您的理想体重为<input name="idelw" size="12">
    <br>
    建议<INPUT TYPE=TEXT NAME=my_comment size=35>
</form>
@endsection
@section('scripts')
<script type="text/javascript">
    function caculat_body_fat(form) {

        var TestWeight;
        var TestWaist;
        var TestWeight_kg;
        var TestHeight;

        var FormWeight;
        var FormWaist;
        var FormHeight;


        TestWeight = (parseFloat(form.weight_kg.value)*2.2);
        TestWaist = (parseFloat(form.waist_cm.value)/2.54);
        TestWeight_kg = parseFloat(form.weight_kg.value);
        TestHeight =  parseFloat(form.height_cm.value);

        var BF;
        var BFPercent;
        var BMIPercent;
        var IDELPercent;
        var IDELWeight;


//                IDELWeight=(TestHeight*TestHeight*22)/10000 ;
        if (form.gender[0].checked) {
            IDELWeight=62+(TestHeight-167)*0.6 ;
        }
        else  {
            IDELWeight=52+(TestHeight-156)*0.5 ;
        }
        IDELPercent = Math.round(IDELWeight);
        form.idelw.value = IDELPercent+"公斤";

//
        BMIPercent=TestWeight_kg/(TestHeight*TestHeight);
        BMIPercent = BMIPercent * 10000;
        BMIPercent = Math.round(BMIPercent);
        form.bmi.value = BMIPercent;

        var yourbmi = BMIPercent;
        if (yourbmi >40) {
            form.my_comment.value="胖是没得治的，你放弃吧";//"你是严重肥胖，请向医生咨询！";
        }

        else if (yourbmi >30 && yourbmi <=40) {
            form.my_comment.value="嗯......你是标准肥胖，来点吸脂？";
        }

        else if (yourbmi >27 && yourbmi <=30) {
            form.my_comment.value="你很胖，赶快制定好锻炼和节食计划";
        }

        else if (yourbmi >22 && yourbmi <=27) {
            form.my_comment.value="你有点重，需要注意饮食和锻炼";
        }

        else if (yourbmi >=21 && yourbmi <=22) {
            form.my_comment.value="魔鬼身材。 加油！！";
        }

        else if (yourbmi >=18 && yourbmi <21) {
            form.my_comment.value="你有点瘦，吃多点。";
        }

        else if (yourbmi >=16 && yourbmi <18) {
            form.my_comment.value="您没有吃饭吧？快去找一些食物！";
        }

        else if (yourbmi <16) {
            form.my_comment.value="你那么瘦为什么不上天";//"你是严重营养不良，需要住院治疗";
        }


        //--- caculater for body fat. -------

        if (form.gender[0].checked) {
            BF = -98.42 + 4.15*TestWaist - .082*TestWeight;
        }

        else {
            BF = -76.76 + (4.15*TestWaist) - (.082*TestWeight);
        }

        BFPercent = BF / TestWeight;
        BFPercent = BFPercent * 100;
        BFPercent = Math.round(BFPercent);
        form.bodyfat.value = BFPercent + "%";

    }

</script>
@endsection