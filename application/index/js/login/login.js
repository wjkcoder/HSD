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
//翻页跳转
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
//登录验证
function loginCheck(){
    var userName=$('#userName').val();
    var passWord=$('#passWord').val();

    $.ajax({
        type:"post",
        url:"http://localhost/hsd/public/Index.php/index/index/logincheck",
        data:{userName:userName,passWord:passWord},
        success:function(responseData){
            if(responseData=='y') {
                //alert(responseData);
                alert('登陆成功');
                window.location.href = "http://localhost/hsd/public/Index.php/index/index/login";
            } else if(responseData=='王吉坤'){
                alert('这是我男神！！！');
            }
            else {
                alert(responseData);
                alert('这用户是你的？？？');
            }
        }
});
}
