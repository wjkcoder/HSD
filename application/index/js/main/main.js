/**
 * Created by Administrator on 2017/2/20.
 */

//初始化表格数据和操作
//new gnMenu( document.getElementById( 'gn-menu' ) );


    $('#prjGrid').tabulator({
        height:"400px",
        fitColumns:true,
        pagination:"local",
        paginationSize:10,
        index:"prj_id",
        responsiveLayout:true,
        tooltips:true,
        movableCols:true,
        movableRows: true,
        selectable:true,
        rowUpdated:function(){alert('changed!');},
        rowClick:function(e,id,data,row){
            //alert(id);
        },
        ajaxURL:'http://localhost/hsd/public/Index.php/Index/index/ajaxprj',
        columns:[
            {title:"项目编号",field:"prj_id", headerFilter:true,editable:true},
            {title:"项目代码",field:"prj_code",headerFilter:true,editable:true},
            {title:"项目描述",field:"prj_des",headerFilter:true,editable:true},
            {title:"时效性",field:"enable_flag",headerFilter:true,editable:true},

        ],

        cellEdit:function(e,id,data,row){
            alert("这是第"+this.index+"!");
        }
    });
    $("#prjGrid").tabulator("setData");
    $("#prjGrid").tabulator("setPage", 1);
//动态生成用户菜单(点击ul>a隐藏展示)
//表格按钮事件响应
function btnAdd(){
    $("#prjGrid").tabulator("addRow","",true);
}
function selectAll(){

    var getSelectedRows=$('#prjGrid').tabulator('getSelectedData');
    var del=array();
    $.each(getSelectedRows,function(getSelectedRows,value){
        del[index]=getSelectedRows[index].prj_des;
        alert(getSelectedRows.prj_des);
    });
    alert(getSelectedRows[1].prj_des);
    $('#prjGrid').tabulator();

}
function btnRefresh(){
    $("#prjGrid").tabulator("setData");
    $(window).resize(function(){
        $("#prjGrid").tabulator("redraw", true);
    });
}
function btnDel(){
    var data;
    var id;
    data=$('#prjGrid').tabulator('getSelectedData');
    id=data[0].prj_id;
    if(data.length<0){
        alert('未选中记录！');
    }
    else {
        confirm("Are you sure?", "确认删除？", function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/hsd/public/Index.php/index/action/prjdelete',
                    data: {id:id},
                    success: function(res){
                        if(res==='y'){
                            alert('所选记录已删除');
                            $("#prjGrid").tabulator("deleteRow", id);
                        }
                    },
                    dataType: 'text'
                });
            } else {
                //after click the cancel
            }
        }, {confirmButtonText: 'Yes, delete！', cancelButtonText: 'No, cancel!', width: 500});
    }
}
function btnSave(){

    var data;
    //var id;
    data=$('#prjGrid').tabulator('getSelectedData');
    $.ajax({
        type: 'POST',
        url: 'http://localhost/hsd/public/Index.php/index/action/test',
        data: {data:data},
        success: function(res){
            if(res==='y'){
               alert("Succeed to Save!");
            }else alert('Failed to Save @~@');
        },
        dataType: 'text'
    });
    
}
//测试函数
function btnTest(){
    //alert('test123456');



    var prj_id=10;
    var prj_code='123';
    var prj_des='456';
    //alert(prj_code);

    //var data=$('#prjGrid').tabulator('getSelectedData');
    //prj_id=data[0].prj_id;
    //prj_code=data[0].prj_code;
    //prj_des=data[0].prj_des;

    $.ajax({
        type: 'POST',
        url: 'http://localhost/hsd/public/Index.php/index/action/prjinsert',
        data: {prj_id:prj_id,prj_code:prj_code,prj_des:prj_des},
        success: function(res){
            if(res==='y'){
                alert("嘿嘿嘿！！！");
            }
            else if(res==='n'){
                alert('新增失败！')
            }
        }

    })
}
