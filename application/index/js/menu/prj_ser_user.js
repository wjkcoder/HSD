/**
 * Created by Administrator on 2017/3/28.
 */
var flag=[{id:"Y","value":"Y"},{id:"N","value":"N"}];
var yn=false;
var module=null;
var role=null;
var prjSvr=null;

//$('#addUser').hide();
$.when($.ajax({
        url: 'http://localhost/hsd/public/Index.php/index/customer/getPrjAllSvr',
        dataType: 'json',
        type: 'get'
    })).done(function (data) {
    $('#server').empty();
    for (var i = 0; i <= eval(data).length - 1; i++) {
        $('#server').append("<option value='" + eval(data)[i].id + "'>" + eval(data)[i].value + "</option>");
    }
        prjSvr=$('#server option:first').val();
    //alert(prjSvr);
   retUser();
    });

//$('#serverLevel').append('<option>123</option>');
function add(){
    var code=$('#code').val();
    var des=$('#des').val();

    $.ajax({
        type:"POST",
        url:"http://localhost/hsd/public/Index.php/index/SysCtrAction/ctrModuleInsert",
        data:{code:code,des:des},
        dataType:'text',
        success:function(data){
            if(data=='y'){
                alert('Save Successfully!');
            }else alert('Failed');
        }
    });

}
function select(data){
    var options=$("#server option:selected");
    prjSvr=options.val();
    alert(prjSvr);
    $('#br').empty();
    retUser();
}
function retUser(){
    $.when(
        $.ajax({
            url: 'http://localhost/hsd/public/Index.php/index/customer/getPrjUser1',
            dataType: 'json',
            type: 'post',
            data:{prjSvr:prjSvr}
        })
    ).then(function(data1){
        $('#bl').empty();
        for (var i = 0; i <= eval(data1).length - 1; i++) {
            $('#bl').append("<li id='" + eval(data1)[i].prj_user_id + "'>" + eval(data1)[i].user_name + "</li>");
        }
    });
    $.when(
        $.ajax({
            url: 'http://localhost/hsd/public/Index.php/index/customer/getPrjUser2',
            dataType: 'json',
            type: 'post',
            data:{prjSvr:prjSvr}
        })
    ).done(function(data1){
        //alert('真是醉啦！');

        $('#br').empty();
        if(data1.length<0){alert('该服务器未分配用户');}
        else {
            for (var i = 0; i <= eval(data1).length - 1; i++) {
                $('#br').append("<li id='" + eval(data1)[i].prj_user_id + "'>" + eval(data1)[i].user_name + "</li>");
            }
        }
    });
}
function getMenu(){
    $.ajax({
        type:"POST",
        url:"http://localhost/hsd/public/Index.php/index/customer/getPrjMenu",
        dataType:"json",
        data:{data:prjRole}
    }).done(function(data){
        $('#menuop').empty();
        for(var i=0;i<=eval(data).length-1;i++){
            //$('#prjRole').append("<li id=' "+eval(data)[i].menu_id+"'>"+eval(data)[i].menu_des);
            $('#menuop').append("<option value='"+eval(data)[i].prj_menu_id+"'>"+eval(data)[i].menu_des+"</option>");
        }
        var demo1 = $('select[name="duallist"]').bootstrapDualListbox(
            {
                nonSelectedListLabel: '功能集',

                selectedListLabel: '已选择分配',
                moveOnSelect: false,

                preserveSelectionOnMove: 'moved',

            }
        );
    })
}
$('#btnAddUser').click(function(){
    $('#addUser').show(500);
});
$('#btnHide').click(function(){
    $('#addUser').hide(500);
});
$("#save").on("click",function(){
    var rli=$("#br").find("li");
    var lli=$("#bl").find("li");
    var Id=[];
    var delId=[];
    if(rli.length>0){
        for(var i=0;i<rli.length;i++){
            Id[i]=rli[i].id;
        }
    }else{
        Id[0]='n';
    }
    if(lli.length>0){
        for(var j=0;j<lli.length;j++){
            delId[j]=lli[j].id;
        }
    }else {
        delId[0]='n';
    }

    //alert(delId);
    //alert(Id);
    $.ajax({
        type: 'POST',
        url: 'http://localhost/hsd/public/Index.php/index/customer/savePrjSvrUser',
        data: {svrId:prjSvr,Id:Id,delId:delId},
        dataType:'text',
        success: function(data){
            if(data==='y'){
                $("#bl").empty();
                $("#br").empty();
                alert('Save Successfully');
            }else if(data==='unselected') alert('Nothing to Add',"please select menu",{type: 'success', confirmButtonText: 'OK'});

        }
    });

    //alert("添加成功");
});

