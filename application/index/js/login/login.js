/**
 * Created by Administrator on 2017/2/7.
 */
function initSlider(){
    var pageCount=$("#showpages").turn("pages");
    $('#ex1').slider({
        min: 1,
        max: pageCount,
        formatter: function (value) {
            return value;
        }
    }).on('slide', function (slideEvt) {
        var oldPage=$("#showpages").turn("page");
        if(oldPage<slideEvt.value){
            $('#showpages').turn('next');
        }
        if(oldPage>slideEvt.value){
            $('#showpages').turn('previous');
        }
    }).on('change', function (e) {
    });
    //var val = $('#ex1').data('slider').getValue();
    //$('#ex1').slider('setValue', pageCount);
}
function turnIndex(){
    $('#showpages').turn("page",1);
}
function turnAbout(){
    $('#showpages').turn("page",2);
}
function turnService(){
    $('#showpages').turn("page",3);
}
function turnCase(){
    $('#showpages').turn("page",4);
}
$('#index').onclick=function(){
    $('#showpages').turn("page",2);
    alert('123');
    };