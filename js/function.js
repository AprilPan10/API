function refreshPage(){
    window.location.reload();
}
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