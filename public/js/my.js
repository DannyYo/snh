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
    form.idelw.value = IDELPercent;

//
    BMIPercent=TestWeight_kg/(TestHeight*TestHeight);
    BMIPercent = BMIPercent * 10000;
    BMIPercent = Math.round(BMIPercent);
    form.bmi.value = BMIPercent;

    var yourbmi = BMIPercent;
    if (yourbmi >40) {
        form.my_comment.value= "你是严重肥胖，请向医生咨询！";
    }

    else if (yourbmi >30 && yourbmi <=40) {
        form.my_comment.value="你很胖，减肥已是你的头等大事";
    }

    else if (yourbmi >27 && yourbmi <=30) {
        form.my_comment.value="你很胖，赶快制定好锻炼和节食计划";
    }

    else if (yourbmi >22 && yourbmi <=27) {
        form.my_comment.value="你有点胖了，需要注意饮食和锻炼";
    }

    else if (yourbmi >=18 && yourbmi <=22) {
        form.my_comment.value="恭喜！你是标准身材,注意保持";
    }

    else if (yourbmi >=16 && yourbmi <18) {
        form.my_comment.value="你过度苗条，应增加营养和锻炼";
    }

    else if (yourbmi <16) {
        form.my_comment.value="你太瘦，应去做个体检，增加营养";
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