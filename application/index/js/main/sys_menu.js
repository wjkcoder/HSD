/**
 * Created by Administrator on 2017/3/17.
 */

$('#sys_menu_grid').tabulator({
    height:"400px",
    fitColumns:true,
    pagination:"local",
    paginationSize:10,
    index:"menu_id",
    responsiveLayout:true,
    tooltips:true,
    movableCols:true,
    movableRows: true,
    selectable:true,
    rowUpdated:function(){alert('changed!');},
    rowClick:function(e,id,data,row){
        //alert(id);
    },
    ajaxURL:'http://localhost/hsd/public/Index.php/index/sysmenu/query',
    columns:[
        {title:"menu_id",field:"menu_id", headerFilter:true,editable:true,visible :false

        },
        {title:"module_id",field:"module_id",headerFilter:true,editable:true},
        {title:"module_des",field:"module_des",headerFilter:true},
        {title:"menu_code",field:"menu_code",headerFilter:true,editable:true},
        {title:"menu_des",field:"menu_des",headerFilter:true,editable:true},
        {title:"enable_flag",field:"enable_flag",headerFilter:true,editable:true},
        {title:"menu_url",field:"menu_url",headerFilter:true,editable:true},

    ],

    cellEdit:function(e,id,data,row){
        alert("这是第"+this.index+"!");
    }
});
$("#sys_menu_grid").tabulator("setData");
$("#sys_menu_grid").tabulator("setPage", 1);

function btnAdd(){
    $("#sys_menu_grid").tabulator("addRow","",true);
}
function btnRefresh(){
    $("#sys_menu_grid").tabulator("setData");
    $(window).resize(function(){
        $("#sys_menu_grid").tabulator("redraw", true);
    });
}
function btnDel(){
    var data;
    var id;
    data=$('#sys_menu_grid').tabulator('getSelectedData');
    id=data[0].menu_id;
    //alert(id);
    if(data.length<0){
        alert('未选中记录！');
    }
    else {
        confirm("Are you sure?", "确认删除？", function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/hsd/public/Index.php/index/sysmenu/delete',
                    data: {id:id},
                    success: function(res){
                        if(res==='y'){
                            alert('所选记录已删除');
                            $("#sys_menu_grid").tabulator("deleteRow", id);
                        }else alert('删除失败@~@ 违反约束');
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
    data=$('#sys_menu_grid').tabulator('getSelectedData');

    $.ajax({
        type: 'POST',
        url: 'http://localhost/hsd/public/Index.php/index/sysmenu/save',
        //data: {prj_id:prj_id,prj_code:prj_code,prj_des:prj_des},
        data: {data:data},

        success: function(res){
            if(res==='y'){
                alert("Succeed to Save!");
            }else alert('Failed to Save @~@');
        },
        dataType: 'text'
    });

}
