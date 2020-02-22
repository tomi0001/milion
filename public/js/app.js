/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function setColorSelected(number) {
    $("#kal_" +  number).css("background-color","#59B635");
}
function setColorUnSelected(number) {
    $("#kal_" +  number).css("background-color","#E2DC07");
}
function changeSugar() {
    //alert("ss");
    var div_val = jQuery("#volume").val();
    jQuery("input[name='sugarVal']").val(div_val);
    //$("#sugarValue").text($("#volume").val());
}

function changeSugarText() {
    
    var div_val = jQuery("input[name='sugarVal']").val();
    if (div_val >= 0 && div_val <= 999 ) {
        jQuery("#volume").val(div_val);
    }
    else {
        alert("za duża wartośc");
    }
}