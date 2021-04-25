function refreshPage(){
    window.location.reload();

}
var text_to_copy = document.getElementById("para").innerHTML;
var copy_button = document.getElementById("copy_button");


function copy(copyId){
    var $inp=$("<input>");
    $("body").append($inp);
    $inp.val($(""+copyId).text()).select();
    document.execCommand("copy");
    $inp.remove();

}
$(document).ready(function(){
    $("#copyButton1").click(function(){
        copy('#para');
    });

});