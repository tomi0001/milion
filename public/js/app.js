function addCategorie(url) {
    
    $("#showAddCategorie").load(url + "?nameCategorie=" + $("input[name='categories']").val());
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

function hideSucces() {
    //alert("zsdsd");
    $(".succes").hide(5000);
}

function addquestion(url) {
    //alert($('form').serialize());
    $("#showAddQuestion").load(url + "?" +  $('form').serialize());
}
var audio;
function loadAmbient() {
    audio = new Audio('./muzyka/ambient.wav');
    audio.preload = 'auto';
    audio.loop = true;
    audio.play();
}
function loadtlo1() {
    //alert("ss");
    audio.pause();
    audio.currentTime = 0;
    audio = new Audio('./muzyka/tlo_pyt_1_2.wav');
    audio.preload = 'auto';
    audio.loop = true;
    audio.play();
}