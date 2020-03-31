var urlSend;
var audio;
var audio2;
var nrSend;
var type;
var lenght;
var idCategories = '';
var idSubCategories = '';
var type;
var bool = false;
var bool2 = false;
function addCategorie(url) {

    $("#showAddCategorie").load(url + "?" + $('form').serialize());
    //alert($("input[name='categories']").val());
}
function addSubCategorie(url) {
    //alert("dd");
    //$("#showAddSubCategorie").load(url + "?nameCategorie=" + $("input[name='subCategories']").val() + "&idCategories=" + $("select[name='idCategories']").val());
    $("#showAddSubCategorie").load(url + "?" + $('form').serialize());
    //alert("dd");
}
function loadSubCategories(url) {
    //var option = "";
    if ($("select[name='categories']").val() == "") {
        $("select[name='subCategories']").html("");
    }
    else {
        $("select[name='subCategories']").load(url + "?idCategorie=" + $("select[name='categories']").val());
    }
    //$("select[name='subCategories']").html("<option value=''>asdsd</option>");
}
function loadSubCategories2(url) {
    //var option = "";
    //alert("asdsd");
    if ($("select[name='Categories']").val() == "") {
        $("select[name='subCategories']").html("");
    }
    else {
        $("select[name='subCategories']").load(url + "?idCategorie=" + $("select[name='Categories']").val());
    }

    //$("select[name='subCategories']").html("<option value=''>asdsd</option>");
}
function hideSucces() {
    //alert("zsdsd");
    $(".succes").hide(5000);
    
}

function addquestion(url) {
    //alert($('form').serialize());
    $("#showAddQuestion").load(url + "?" +  $('form').serialize());
}

function loadAmbient() {
    audio = new Audio('./muzyka/ambient.wav');
    audio.preload = 'auto';
    audio.loop = true;
    audio.play();

    //alert(url);

}
function setType() {
    if (idCategories == "" && idSubCategories == "") {
        type=1;
    }
    else if (idCategories != "" && idSubCategories == "") {
        type = 2;
    }
    else {
        type = 3;
    }
    
}
function loadPrice(url) {
    //location.reload();
    idCategories = $("select[name='Categories']").val();
    idSubCategories = $("select[name='subCategories']").val();
    setType();

    clearData();
    //type = $("select[name='type']").val();
    //type= 3;
    $("#topMain").load(url + "?" + $("form").serialize() + "&type=" + type);
    nrSend = 0;
    $("#newGame").html("");
    $("#lifebuoys").css("visibility","visible");




}

function halfToHalf(url) {
    if (bool == false) {
     var data;
     
        $.ajax({
            url: url,
            async: false
        }).done(function(response) {
            data = response
        })
        audio2 = new Audio('./muzyka/fifti_1.wav');
    audio2.preload = 'auto';
    //audio2.loop = true;
    audio2.play();
    bool = true;
        var data2 = JSON.parse(data);
        $("#question" + data2.one).text("");
        $("#question" + data2.two).text("");
        $("#halfToHalf").css("background-color","silver");
    }
}
function questionToAudience(url) {
        //if (bool == false) {
     var data;
     
      //  $.ajax({
    //        url: url,
  //          async: false
//        }).done(function(response) {
//            data = response
        //})
        audio.pause();
        audio2 = new Audio('./muzyka/odwazniki_1.wav');
    audio2.preload = 'auto';
    //audio2.loop = true;
    audio2.play();
    setTimeout(function(){
        audio.play();
        $("#questionToAudience2").load(url);
    //        $("#question").text(data2.questions).show(3500);
      //      var font = heightFontQuestion(data2.questions);
        //    $("#question").css("font-size",font[0]);
          //  $("#question").css("padding",font[1]);
        },5100);
    bool2 = true;
//        var data2 = JSON.parse(data);
  //      $("#question" + data2.one).text("");
    //    $("#question" + data2.two).text("");
      //  $("#halfToHalf").css("background-color","silver");
      
    //}
}
function loadtlo1(url,nr = nrSend) {
    //alert("ss");
    audio.pause();
    //alert(nrSend);
    //alert(idCategories);
    audio.currentTime = 0;
    /*
    if (nr >= 0 && nr <1) {
        audio = new Audio('./muzyka/tlo_pyt_1_2.wav');
    }
    else if (nr >= 1 && nr < 3) {
        audio = new Audio('./muzyka/tlo_pyt_3.wav');
    }
     *
     */
    //alert($("#price_" + (lenght - nrSend)).text());
    if (type == 1) {

        if (nrSend > 3 ) {
            audio = new Audio('./muzyka/tlo_pyt_3.wav');
        }
        else {
            audio = new Audio('./muzyka/tlo_pyt_1_2.wav');
        }

    }
    else if (type == 2) {
         if (nrSend > 1 ) {
            audio = new Audio('./muzyka/tlo_pyt_3.wav');
        }
        else {
            audio = new Audio('./muzyka/tlo_pyt_1_2.wav');
        }
    }
    else {
           if (nrSend > 1 ) {
            audio = new Audio('./muzyka/tlo_pyt_3.wav');
        }
        else {
            audio = new Audio('./muzyka/tlo_pyt_1_2.wav');
        }
    }
    audio.preload = 'auto';
    audio.loop = true;
    audio.play();
    urlSend = url;
    //if ()
    //alert(type);
    nrSend = nr;
    readQuestion(url);
}
function readQuestion(url) {

        var data;
//alert(idCategories);
        $.ajax({
            url: url + "/" + nrSend + "/" + idCategories + "/" + idSubCategories,
            async: false
        }).done(function(response) {
            data = response
        })
        var data2 = JSON.parse(data);
        setTimeout(function(){
            $("#question").text(data2.questions).show(3500);
            var font = heightFontQuestion(data2.questions);
            $("#question").css("font-size",font[0]);
            $("#question").css("padding",font[1]);
        },800);
        setTimeout(function(){
            $("#questionA").text(data2.reply1).show(6600);
            //heightFontReply
            var font = heightFontReply(data2.reply1);
            $("#questionA").css("font-size",font[0]);
            $("#questionA").css("padding",font[1]);
        }, 1500);
        setTimeout(function(){
            $("#questionB").text(data2.reply2).show(8800);
            var font = heightFontReply(data2.reply2);
            $("#questionB").css("font-size",font[0]);
            $("#questionB").css("padding",font[1]);
        }, 2300);
        setTimeout(function(){
            $("#questionC").text(data2.reply3).show(11100);
            var font = heightFontReply(data2.reply3);
            $("#questionC").css("font-size",font[0]);
            $("#questionC").css("padding",font[1]);
        }, 3100);
        setTimeout(function(){
            $("#questionD").text(data2.reply4).show(14400);
            var font = heightFontReply(data2.reply4);
            $("#questionD").css("font-size",font[0]);
            $("#questionD").css("padding",font[1]);
        }, 4000);


}

function heightFontQuestion(string) {
    if (string.length > 0 && string.length <= 60) {
        return ["25px","34px"];
        //alert(string.length);
    }
    else if (string.length > 60 && string.length <= 120) {
        return ["20px","27px"];
    }
    else if (string.length > 120 && string.length <= 200) {
        return ["18px","20px"];
    }
    else if (string.length > 200 && string.length <= 300) {
        return ["15px","17px"];
    }
    else if (string.length > 300 && string.length <= 500) {
        return ["13px","8px"];
    }
    else {
        return ["11px","4px"];
    }
    //alert(string.length);
    //return ["21px","50px"];
}
function heightFontReply(string) {
    if (string.length > 0 && string.length <= 40) {
        return ["25px","21px"];
        //alert(string.length);
    }
    else if (string.length > 40 && string.length <= 80) {
        return ["20px","10px"];
    }
    else if (string.length > 80 && string.length <= 150) {
        return ["18px","6px"];
    }
    else if (string.length > 150 && string.length <= 200) {
        return ["15px","3px"];
    }
    //else if (string.length > 200 && string.length <= 255) {
      //  return ["13px","8px"];
    //}
    else {
        return ["11px","0px"];
    }
}


function linkOver(ABCD) {
    if ($("#" + ABCD).css("background-color") != "rgb(255, 165, 0)") {
        $("#" + ABCD).css("background-color","#9181C0");
    }
}
function linkOut(ABCD) {
    //alert(($("#" + ABCD).css("background-color")));
    if ($("#" + ABCD).css("background-color") != "rgb(255, 165, 0)") {
        $("#" + ABCD).css("background-color","");
    }
}

function win(ABCD) {
        var sec;
            //audio = new Audio('./muzyka/win_2_7_12_1.wav');
            if (nrSend == "undefined" || nrSend < 5) {
                sec = 3000;
                audio = new Audio('./muzyka/ffordnung_1.wav');
            }
            //if ($("#price_" + nrSend).text() >= 300) {
              //  sec = 3000;
                //audio = new Audio('./muzyka/ffordnung_1.wav');
            //}

            //alert(sec);

    setTimeout(function(){


            $("#" + ABCD).css("background-color","green");
             selectPrice();
        }, 2000);
    setTimeout(function(){


            audio.preload = 'auto';
            audio.play();

            setTimeout(function(){
                audio = new Audio('./muzyka/q_start_1_2_3_1.wav');
                audio.preload = 'auto';
                audio.play();
                //$("#" + ABCD).css("background-color","green");
             }, sec);
             clearData();

        }, sec);
        setTimeout(function(){
                  nrSend++;
                  //alert(nrSend);
                  loadtlo1(urlSend);
           //     audio = new Audio('./muzyka/q_start_1_2_3_1.wav');
         //       audio.preload = 'auto';
       //         audio.play();
                //$("#" + ABCD).css("background-color","green");
              },sec+7000);

        //alert(urlSend);
        //loadtlo1(urlSend,nr+3);



}
function clearData() {
    //alert("sadasd");
    $("#a").css("background-color","");
    $("#b").css("background-color","");
    $("#c").css("background-color","");
    $("#d").css("background-color","");

    $("#questionA").text("");
    $("#questionB").text("");
    $("#questionC").text("");
    $("#questionD").text("");
    $("#question").text("");
    //alert("sadasd");
}

function lost(ABCD) {
    setTimeout(function(){
            audio = new Audio('./muzyka/lost_1_2_1.wav');
            audio.preload = 'auto';
            audio.play();
            $("#" + ABCD).css("background-color","red");
        }, 2500);
}
function replyAction(ABCD,url) {
    //alert("ss");
    $("#" + ABCD).css("background-color","orange");
    audio.pause();
    audio.currentTime = 0;
    audio = new Audio('./muzyka/sel_3_4_1.wav');
    audio.preload = 'auto';
    //audio.loop = true;
    audio.play();
    var bool = win_if_lost(url);
    if (ABCD == bool) {
        win(bool);
    }
    else {
        lost(bool);
    }


}
function selectPrice() {

    if (type == 1) {
        lenght = 10;
    }
    else if (type == 2){
        lenght = 15;
    }
    else {
        lenght = 23;
    }
    var wynik = lenght - nrSend;
    $("#price_" + wynik).css("background-color","green");
    //$("#price_" + wynik-1).css("background-color","");
}
function win_if_lost(url) {
        var data;

        $.ajax({
            url: url,
            async: false
        }).done(function(response) {
            data = response
        })
        var data2 = JSON.parse(data);
        return data2.correct_answer;

}
