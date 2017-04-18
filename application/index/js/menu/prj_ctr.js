/**
 * Created by Administrator on 2017/3/28.
 */
//var flag=[{id:"Y","value":"Y"},{id:"N","value":"N"}];



//var prjSvr=null;
/**
 * Created by Administrator on 2017/3/28.
 */
var flag=[{id:"Y","value":"Y"},{id:"N","value":"N"}];
var prjSvr=null;
var block=null;
var dataType=null;
var dataChange=null;
var openCode=null;
var svrId=null;
var field=null;
var groupId=1;
var cellId=null;
var lineId=null;
var moduleField=null;
var brandId=null;
var seriesId=null;
var csmId=null;
var linkId=null;
var attr=null;
svrId=1;
//groupId=1;
$('#gdf').hide();
$('#gmf').hide();
//$('#gd').hide();
//获取所有的服务器并显示在select中
$.when($.ajax({
    url: '../../index/customer/getPrjAllSvr',
    dataType: 'json',
    type: 'get'
})).done(function(data)
 {
    $('#server').empty();
    for (var i = 0; i <= eval(data).length - 1; i++) {
        $('#server').append("<option value='" + eval(data)[i].id + "'>" + eval(data)[i].value + "</option>");
    }
    svrId=$('#server option:first').val();
    showTree();
  });
function grid(){
    $.when($.ajax({
            url: '../../index/customer/getGroupDataNeeds',
            dataType: 'json',
            type: 'post',
            data:{groupId:groupId}
        }))
        .done(function (data) {
            //prjSvr=data;
            block=data.block;
            dataType=data.dataType;
            dataChange=data.dataChange;
            openCode=data.openCode;
            field=data.field;
            moduleField=data.moduleField;
            var w=$(document).ready(function(){
                var s=window.setTimeout(function(){
                    jsGrid.setDefaults({
                        tableClass: "jsgrid-table table table-striped table-hover"
                    }),
                        jsGrid.setDefaults("text", {
                            _createTextBox: function () {
                                return $("<input>").attr("type", "text").attr("class", "form-control input-sm")
                            }
                        }),
                        jsGrid.setDefaults("number", {
                            _createTextBox: function () {
                                return $("<input>").attr("type", "number").attr("class", "form-control input-sm")
                            }
                        }),
                        jsGrid.setDefaults("textarea", {
                            _createTextBox: function () {
                                return $("<input>").attr("type", "textarea").attr("class", "form-control")
                            }
                        }),
                        jsGrid.setDefaults("control", {
                            _createGridButton: function (cls, tooltip, clickHandler) {
                                var grid = this._grid;
                                return $("<button>").addClass(this.buttonClass).addClass(cls).attr({
                                    type: "button",
                                    title: tooltip
                                }).on("click", function (e) {
                                    clickHandler(grid, e)
                                })
                            }
                        }),
                        jsGrid.setDefaults("select", {
                            _createSelect: function () {
                                var $result = $("<select>").attr("class", "form-control form-control-sm"),
                                    valueField = this.valueField,
                                    textField = this.textField,
                                    selectedIndex = this.selectedIndex;
                                return $.each(this.items, function (index, item) {
                                    var value = valueField ? item[valueField] : index,
                                        text = textField ? item[textField] : item,
                                        $option = $("<option>").attr("value", value).text(text).appendTo($result);
                                    $option.prop("selected", selectedIndex === index)
                                }), $result
                            }
                        }),
                        function () {
                            $("#module2").jsGrid({
                                height: "400px",
                                width: "98%",
                                filtering: true,
                                editing: true,
                                inserting: true,
                                sorting: true,
                                paging: true,
                                autoload: true,
                                pageSize: 5,
                                pageButtonCount: 5,
                                controller: {
                                    loadData: function (filter) {
                                        return $.ajax({
                                            type: "POST",
                                            url: "../../index/customer/getGroupData",
                                            dataType: "json",
                                            data:{groupId:groupId}
                                        });
                                    },
                                    insertItem: function (item) {
                                        return $.ajax({
                                            type: "POST",
                                            url: "../../index/customer/groupDataInsert",
                                            data: {data:item,groupId:groupId},
                                            dataType: "text",
                                            success: function (data) {
                                                if (data == 'y') {
                                                    //alert("");
                                                    alert("Success", "Date Added!", function () {
                                                    }, {type: 'success', confirmButtonText: 'OK'});

                                                    $('#module2').jsGrid("refresh");
                                                } else alert("Failed to Update!");
                                            }
                                        });
                                    },
                                    updateItem: function (item) {
                                        return $.ajax({
                                            type: "POST",
                                            url: "../../index/customer/groupDataUpdate",
                                            data: {data: item,groupId:groupId},
                                            dataType: "text",
                                            success: function (data) {
                                                if (data == 'y') {
                                                    //alert("");
                                                    alert("Success", "Date updated!", function () {
                                                    }, {type: 'success', confirmButtonText: 'OK'});
                                                    $('#module2').jsGrid("refresh");
                                                } else alert("Failed to Update!");
                                            }
                                        });
                                    },
                                    deleteItem: function (item) {
                                        return $.ajax({
                                            type: "POST",
                                            url: "../../index/Customer/serverDel",
                                            data: {data: item},
                                            dataType: "text",
                                            success: function (data) {
                                                if (data == 'y') {
                                                    alert("Delete Successfully");
                                                }
                                            }
                                        });
                                    }
                                },
                                fields: [
                                    {type: "control",width:"80"},

                                    {name: "tag_id", title: "角色ID", type: "text", visible: false},
                                    //{name: "cell_group_id", title: "角色ID", type: "text", visible: false},
                                    {name: "data_code", title: "编码", type: "text",validate: "required", visible: true,width:65},
                                    {name: "data_des", title: "描述", type: "text", validate: "required",width:80,visible: true},
                                    {name: "ctr_series_block_id", title: "数据段", type: "select",items:block,valueField:"ctr_series_block_id",textField:"block_des", width:180,visible: true},
                                    {name: "block_location", title: "定位", type: "text", visible: true,width:70},


                                    {name: "start_address", title: "起始地址", type: "text", validate: "required",visible: true,width:55},
                                    {name: "datatype_id", title: "数据类型", type: "select",items:dataType,valueField:"datatype_id",textField:"datatype_des", visible: true,width:80},
                                    {name: "datachange_type_id", title: "类型转换", type: "select", items:dataChange,valueField:"datachange_type_id",textField:"datachange_des",visible: true,width:100},


                                    //{name: "prj_user_id", title: "项目ID", type: "text", visible: false},
                                    //{name: "prj_user_role_id", title: "项目ID", type: "text", visible: false},
                                    //{name: "client_server_id", title: "所属服务器", type: "text", visible: true},
                                    {name: "oper_code", type: "select", items:openCode,valueField:"fastcode_id",textField:"fastcode_des",title: "打开方式", validate: "required",editing:true,width:90},

                                    {name: "enable_flag", type: "select", items:flag,valueField:"id",textField:"value",title: "FLAG", validate: "required",editing:true,width:70}

                                    //{name: "ctr_module_id", title: "控制器字段ID", type: "text", width:"auto"},
                                ]
                            });
                        }();
                },100);
                var s1=window.setTimeout(function(){
                    jsGrid.setDefaults({
                        tableClass: "jsgrid-table table table-striped table-hover"
                    }),
                        jsGrid.setDefaults("text", {
                            _createTextBox: function () {
                                return $("<input>").attr("type", "text").attr("class", "form-control input-sm")
                            }
                        }),
                        jsGrid.setDefaults("number", {
                            _createTextBox: function () {
                                return $("<input>").attr("type", "number").attr("class", "form-control input-sm")
                            }
                        }),
                        jsGrid.setDefaults("textarea", {
                            _createTextBox: function () {
                                return $("<input>").attr("type", "textarea").attr("class", "form-control")
                            }
                        }),
                        jsGrid.setDefaults("control", {
                            _createGridButton: function (cls, tooltip, clickHandler) {
                                var grid = this._grid;
                                return $("<button>").addClass(this.buttonClass).addClass(cls).attr({
                                    type: "button",
                                    title: tooltip
                                }).on("click", function (e) {
                                    clickHandler(grid, e)
                                })
                            }
                        }),
                        jsGrid.setDefaults("select", {
                            _createSelect: function () {
                                var $result = $("<select>").attr("class", "form-control form-control-sm"),
                                    valueField = this.valueField,
                                    textField = this.textField,
                                    selectedIndex = this.selectedIndex;
                                return $.each(this.items, function (index, item) {
                                    var value = valueField ? item[valueField] : index,
                                        text = textField ? item[textField] : item,
                                        $option = $("<option>").attr("value", value).text(text).appendTo($result);
                                    $option.prop("selected", selectedIndex === index)
                                }), $result
                            }
                        }),
                        function () {
                            $("#gdf_grid").jsGrid({
                                height: "400px",
                                width: "98%",
                                filtering: true,
                                editing: true,
                                inserting: true,
                                sorting: true,
                                paging: true,
                                autoload: true,
                                pageSize: 5,
                                pageButtonCount: 5,
                                controller: {
                                    loadData: function (filter) {
                                        return $.ajax({
                                            type: "POST",
                                            url: "../../index/customer/getGroupDriverField",
                                            dataType: "json",
                                            data:{groupId:groupId}
                                        });
                                    },
                                    insertItem: function (item) {
                                        return $.ajax({
                                            type: "POST",
                                            url: "../../index/customer/groupDriverFieldInsert",
                                            data: {data:item,groupId:groupId},
                                            dataType: "text",
                                            success: function (data) {
                                                if (data == 'y') {
                                                    //alert("");
                                                    alert("Success", "Date Added!", function () {
                                                    }, {type: 'success', confirmButtonText: 'OK'});

                                                    $('#gdf_grid').jsGrid("refresh");
                                                } else alert("Failed to Insert!");
                                            }
                                        });
                                    },
                                    updateItem: function (item) {
                                        return $.ajax({
                                            type: "POST",
                                            url: "../../index/customer/groupDriverFieldUpdate",
                                            data: {data: item,groupId:groupId},
                                            dataType: "text",
                                            success: function (data) {
                                                if (data == 'y') {
                                                    //alert("");
                                                    alert("Success", "Date updated!", function () {
                                                    }, {type: 'success', confirmButtonText: 'OK'});
                                                    $('#gdf_grid').jsGrid("refresh");
                                                } else alert("Failed to Update!");
                                            }
                                        });
                                    },
                                    deleteItem: function (item) {
                                        return $.ajax({
                                            type: "POST",
                                            url: "../../index/Customer/groupDriverFieldDelete",
                                            data: {data: item},
                                            dataType: "text",
                                            success: function (data) {
                                                if (data == 'y') {
                                                    alert("Delete Successfully");
                                                }
                                            }
                                        });
                                    }
                                },
                                fields: [
                                    {type: "control",width:"100"},

                                    {name: "cell_group_driver_field_id", title: "角色ID", type: "text", visible: false},
                                    //{name: "cell_group_id", title: "角色ID", type: "text", visible: false},
                                    //{name: "cell_group_id", title: "编码", type: "text",validate: "required", visible: true,width:65},
                                    {name: "link_driver_field_id", title: "驱动字段", type: "select",items:field,valueField:"link_driver_field_id",textField:"des", validate: "required",width:300,visible: true},
                                    {name: "driver_field_value", title: "对应值", type: "text", width:120,visible: true},
                                    {name: "enable_flag", title: "Flag", type: "select",items:flag,valueField:"id",textField:"value", visible: true,width:"auto"},



                                    //{name: "prj_user_id", title: "项目ID", type: "text", visible: false},
                                    //{name: "prj_user_role_id", title: "项目ID", type: "text", visible: false},
                                    //{name: "client_server_id", title: "所属服务器", type: "text", visible: true},


                                    //{name: "ctr_module_id", title: "控制器字段ID", type: "text", width:"auto"},
                                ]
                            });
                        }();
                },100);
                var s2=window.setTimeout(function(){
                    jsGrid.setDefaults({
                        tableClass: "jsgrid-table table table-striped table-hover"
                    }),
                        jsGrid.setDefaults("text", {
                            _createTextBox: function () {
                                return $("<input>").attr("type", "text").attr("class", "form-control input-sm")
                            }
                        }),
                        jsGrid.setDefaults("number", {
                            _createTextBox: function () {
                                return $("<input>").attr("type", "number").attr("class", "form-control input-sm")
                            }
                        }),
                        jsGrid.setDefaults("textarea", {
                            _createTextBox: function () {
                                return $("<input>").attr("type", "textarea").attr("class", "form-control")
                            }
                        }),
                        jsGrid.setDefaults("control", {
                            _createGridButton: function (cls, tooltip, clickHandler) {
                                var grid = this._grid;
                                return $("<button>").addClass(this.buttonClass).addClass(cls).attr({
                                    type: "button",
                                    title: tooltip
                                }).on("click", function (e) {
                                    clickHandler(grid, e)
                                })
                            }
                        }),
                        jsGrid.setDefaults("select", {
                            _createSelect: function () {
                                var $result = $("<select>").attr("class", "form-control form-control-sm"),
                                    valueField = this.valueField,
                                    textField = this.textField,
                                    selectedIndex = this.selectedIndex;
                                return $.each(this.items, function (index, item) {
                                    var value = valueField ? item[valueField] : index,
                                        text = textField ? item[textField] : item,
                                        $option = $("<option>").attr("value", value).text(text).appendTo($result);
                                    $option.prop("selected", selectedIndex === index)
                                }), $result
                            }
                        }),
                        function () {
                            $("#gmf_grid").jsGrid({
                                height: "400px",
                                width: "98%",
                                filtering: true,
                                editing: true,
                                inserting: true,
                                sorting: true,
                                paging: true,
                                autoload: true,
                                pageSize: 5,
                                pageButtonCount: 5,
                                controller: {
                                    loadData: function (filter) {
                                        return $.ajax({
                                            type: "POST",
                                            url: "../../index/customer/getGroupModuleField",
                                            dataType: "json",
                                            data:{groupId:groupId}
                                        });
                                    },
                                    insertItem: function (item) {
                                        return $.ajax({
                                            type: "POST",
                                            url: "../../index/customer/groupModuleFieldInsert",
                                            data: {data:item,groupId:groupId},
                                            dataType: "text",
                                            success: function (data) {
                                                if (data == 'y') {
                                                    //alert("");
                                                    alert("Success", "Date Added!", function () {
                                                    }, {type: 'success', confirmButtonText: 'OK'});

                                                    $('#gmf_grid').jsGrid("refresh");
                                                } else alert("Failed to Insert!");
                                            }
                                        });
                                    },
                                    updateItem: function (item) {
                                        return $.ajax({
                                            type: "POST",
                                            url: "../../index/customer/groupModuleFieldUpdate",
                                            data: {data: item,groupId:groupId},
                                            dataType: "text",
                                            success: function (data) {
                                                if (data == 'y') {
                                                    //alert("");
                                                    alert("Success", "Date updated!", function () {
                                                    }, {type: 'success', confirmButtonText: 'OK'});
                                                    $('#gmf_grid').jsGrid("refresh");
                                                } else alert("Failed to Update!");
                                            }
                                        });
                                    },
                                    deleteItem: function (item) {
                                        return $.ajax({
                                            type: "POST",
                                            url: "../../index/Customer/groupModuleFieldDelete",
                                            data: {data: item},
                                            dataType: "text",
                                            success: function (data) {
                                                if (data == 'y') {
                                                    alert("Delete Successfully");
                                                }
                                            }
                                        });
                                    }
                                },
                                fields: [
                                    {type: "control",width:"100"},

                                    {name: "cell_group_module_field_id", title: "角色ID", type: "text", visible: false},
                                    //{name: "cell_group_id", title: "角色ID", type: "text", visible: false},
                                    //{name: "cell_group_id", title: "编码", type: "text",validate: "required", visible: true,width:65},
                                    {name: "ctr_series_module_field_id", title: "通讯字段", type: "select",items:moduleField,valueField:"ctr_series_module_field_id",textField:"ctr_field_des", validate: "required",width:300,visible: true},
                                    {name: "cell_module_field_value", title: "对应值", type: "text", width:120,visible: true},
                                    {name: "enable_flag", title: "Flag", type: "select",items:flag,valueField:"id",textField:"value", visible: true,width:"auto"},



                                    //{name: "prj_user_id", title: "项目ID", type: "text", visible: false},
                                    //{name: "prj_user_role_id", title: "项目ID", type: "text", visible: false},
                                    //{name: "client_server_id", title: "所属服务器", type: "text", visible: true},


                                    //{name: "ctr_module_id", title: "控制器字段ID", type: "text", width:"auto"},
                                ]
                            });
                        }();
                },100);
            });
})}
function select(data){
    var options=$("#server option:selected");
    svrId=options.val();
    //alert(svrId);
    showTree();
}
function getBrand(){
    brandId=$('#brand option:selected').val();
    showSeries();
}
function getSeries(){
    seriesId=$('#series option:selected').val();
    showModule();
}
function getModule(){
    csmId=$('#module option:selected').val();
    showDriver();
}
function getlink(){
    linkId=$('#driver option:selected').val();
}
$('#testFunc').click(function(){
    alert(groupId)
});
function showTree(){
    $.when(
        $.ajax({
            url: '../../index/customer/getGroup',
            dataType: 'json',
            type: 'post',
            data:{svrId:svrId}
        })
    ).then(function(data){
        $('#treeList').empty();
        var level1=data[0].prj_svr_line_id;
        //alert(level1);
        var level2=data[0].cell_id;
        $('#treeList').append("<li  value='" + eval(data)[0].prj_svr_line_id + "'>" + eval(data)[0].svr_line_des+"<ul><li value=' "+eval(data)[0].cell_id+"'>"+"<button style='text-align:right' data-toggle='modal' data-target='#attr' class='btn btn-rounded btn-sm btn-black'>属性</button>"+eval(data)[0].cell_des+"<ul><li value='" +
            eval(data)[0].cell_group_id +"'>"+eval(data)[0].cell_group_des+"</li></ul></li></ul></li>");
        for (var i = 1; i <= eval(data).length - 1; i++) {
            //level1=eval(data)[i].prj_svr_line_id;
            //alert();
            if(eval(data)[i].prj_svr_line_id!==level1){
                //alert(i);
                //alert(level1);
                $('#treeList').append("<li value='" + eval(data)[i].prj_svr_line_id + "'>" + eval(data)[i].svr_line_des+"<ul><li value=' "+eval(data)[i].cell_id+"'>"+"<button data-toggle='modal' data-target='#attr' class='btn btn-rounded btn-sm btn-black'>属性</button>"+eval(data)[i].cell_des+"<ul><li value='" +
                    eval(data)[i].cell_group_id +"'>"+eval(data)[i].cell_group_des+"</li></ul></li></ul></li>");
                level1=eval(data)[i].prj_svr_line_id;
                //alert(level1);
            }else {
                if(eval(data)[i].cell_id!==level2)
                {
                    //alert(i);
                    $("#treeList>li:last>ul").append("<li value=' "+eval(data)[i].cell_id+"'>"
                  + "<button data-toggle='modal' data-target='#attr' class='btn btn-rounded btn-sm btn-black'>属性</button>"+eval(data)[i].cell_des+"<ul><li value='"+ eval(data)[i].cell_group_id+"'>"+eval(data)[i].cell_group_des+"</li></ul></li>");
                level2=eval(data)[i].cell_id;
                }else {
                    //$("#t2 ul>li[value='"+level1+"']:first>ul>li[value='"+level2+"']:first>ul").append("<li>hhh</li>");
                    $("#treeList>li:last>ul>li:last>ul ").append("<li value='"+eval(data)[i].cell_group_id +"'>"+eval(data)[i].cell_group_des+"</li>");
                }
            }
        }
        //双击切换不同的group下data数据
        $('#treeList>li>ul>li>ul>li').click(function() {
            groupId = $(this).val();
            $('#module2').empty();
            $('#gdf_grid').empty();
            $('#gmf_grid').empty();
            grid();

        });
        $('#treeList>li>ul>li>ul>li').dblclick(function() {
            groupId = $(this).val();
            confirm("Are you sure?", "确定删除数据", function (isConfirm) {
                if (isConfirm) {
                    $.when(
                        $.ajax({
                            url: '../../index/customer/deleteSvrLineCellGroup',
                            dataType: 'text',
                            type: 'post',
                            data:{groupId:groupId}
                        })
                    ).done(function(data){
                        if(data==='y'){
                            alert("Success", "Date delete!", function () {
                            }, {type: 'success', confirmButtonText: 'OK'});
                            $(this).empty();
                        }else alert("Failed,constraint");
                    })
                } else {
                    //after click the cancel
                }
            }, {confirmButtonText: 'Yes', cancelButtonText: 'No', width: 300});

        });

        $('#treeList>li>ul>li').dblclick(function() {
            //cellId = $(this).val();
            //alert(cellId);
        });
        $('#treeList').append('<button class="btn-block btn-danger" data-toggle="modal" data-target="#myModal">添加产线</button>');
        $('#treeList>li>ul').append('<button class="btn-block btn-info" data-toggle="modal" data-target="#cell">添加设备</button>');

        $('#treeList>li>ul>li>ul').append('<button class="btn-block btn-success" data-toggle="modal" data-target="#group">添加group</button>');
        //$('#treeList>button').click(function(){
        //    alert('12345')});
        $('#treeList>li>ul>button').click(function(){
             lineId=$(this).parent().parent().val();
            $.when($.ajax({
                url: '../../index/customer/selectBrand',
                dataType: 'json',
                type: 'get'
            })).done(function (data) {
                $('#brand').empty();
                $('#brand').append("<option style='text-align: center'><<---请选择控制器品牌--->></option>");

                for (var i = 0; i <= eval(data).length - 1; i++) {
                    $('#brand').append("<option value='" + eval(data)[i].ctr_brand_id + "'>" + eval(data)[i].ctr_brand_des + "</option>");
                }
                //brandId=$('#brand option:first').val();
                //showSeries();
            });
            });
        $('#treeList>li>ul>li>ul>button').click(function(){
            cellId=$(this).parent().parent().val();


            });
        $('#treeList>li>ul>li>button').click(function(){
            cellId=$(this).parent().val();
            //alert(cellId);
            $('#cell_attr').empty();

            gridCell();

        });
        $(function(){
            $(".tree").treemenu({delay:150}).openActive();
        });
        grid();
        //alert(groupId);
    });
}
$('#change1').click(function(){
    $('#gdf').hide();
    $('#gmf').hide();
    $('#gd').show();
});
$('#change2').click(function(){
    $('#gdf').show();
    $('#gmf').hide();
    $('#gd').hide();
});
$('#change3').click(function(){
    $('#gdf').hide();
    $('#gmf').show();
    $('#gd').hide();
});
function addLine(){
    var lineCode=$('#lineCode').val();
    var lineDes=$('#lineDes').val();

    if(lineCode&&lineDes){
        $.when($.ajax({
            url: '../../index/customer/addSvrLine',
            dataType: 'text',
            type: 'post',
            data:{svrId:svrId,lineCode:lineCode,lineDes:lineDes}
        })).done(function(data){
            alert(data);
            if(data=='y')
            {alert('Add success!')}
              else if(data=='e'){
                alert('重复，已存在');
            } else {alert('Failed to Add')}
        });
    }else alert('字段不为空');

}
function addCell(){
    var cellCode=$('#cellCode').val();
    var cellDes=$('#cellDes').val();
    //var linkId=linkId;
    //var lineId=lineId;

    if(cellCode&&cellDes&&linkId&&lineId){
        $.when($.ajax({
            url: '../../index/customer/addSvrLineCell',
            dataType: 'text',
            type: 'post',
            data:{cellCode:cellCode,cellDes:cellDes,linkId:linkId,lineId:lineId}
        })).done(function(data){
            alert(data);
            if(data=='y')
            {alert('Add success!');
                showTree();}
            else if(data=='e'){
                alert('重复，已存在');
            } else {alert('Failed to Add')}
        });
    }else alert('字段不为空');

}
function addGroup(){
    var groupCode=$('#groupCode').val();
    var groupDes=$('#groupDes').val();

    if(groupCode&&groupDes){
        $.when($.ajax({
            url: '../../index/customer/addSvrLineCellGroup',
            dataType: 'text',
            type: 'post',
            data:{cellId:cellId,groupCode:groupCode,groupDes:groupDes}
        })).done(function(data){
            alert(data);
            if(data=='y')
            {alert('Add success!');
                refreshTree();}
            else if(data=='e'){
                alert('重复，已存在');
            } else {alert('Failed to Add')}
        });
    }else alert('字段不为空');

}
function showSeries(){
    if(brandId.length>0){
        $.when($.ajax({
            url: '../../index/customer/selectSeries',
            dataType: 'json',
            type: 'post',
            data:{brandId:brandId}
        })).done(function (data) {
            $('#series').empty();
            $('#series').append("<option style='text-align: center'><<----请选择系列---->></option>");
            for (var i = 0; i <= eval(data).length - 1; i++) {
                $('#series').append("<option value='" + eval(data)[i].ctr_series_id + "'>" + eval(data)[i].ctr_series_des + "</option>");
            }
            //seriesId=$('#series option:first').val();
            //showModule();
        });
    }else alert("Sorry", "品牌不为空", function () {
    }, {type: 'error', confirmButtonText: 'OK'});

}
function showModule(){

    if(seriesId){
        $.when($.ajax({
            url: '../../index/customer/selectModule',
            dataType: 'json',
            type: 'post',
            data:{seriesId:seriesId}
        })).done(function (data) {
            $('#module').empty();
            $('#module').append("<option style='text-align: center'><<----请选择通讯方式---->></option>");

            for (var i = 0; i <= eval(data).length - 1; i++) {
                $('#module').append("<option value='" + eval(data)[i].ctr_series_module_id + "'>" + eval(data)[i].ctr_module_des + "</option>");
            }
            //csmId=$('#module option:first').val();
            //showDriver();
        });
    }else alert("Sorry", "系列不为空", function () {
    }, {type: 'error', confirmButtonText: 'OK'});

}
function showDriver(){
    if(csmId){
        $.when($.ajax({
            url: '../../index/customer/selectDriver',
            dataType: 'json',
            type: 'post',
            data:{csmId:csmId}
        })).done(function (data) {
            $('#driver').empty();
            $('#driver').append("<option style='text-align: center'><<----请选择驱动---->></option>");
            for (var i = 0; i <= eval(data).length - 1; i++) {
                $('#driver').append("<option value='" + eval(data)[i].link_id + "'>" + eval(data)[i].driver_des + "</option>");
            }
            //csmId=$('#driver option:first').val();
        });
    }else alert('驱动为空！')

}
function gridCell(){
    $.when($.ajax({
            url: '../../index/customer/selectCellAttr',
            dataType: 'json',
            type: 'post',
            data:{cellId:cellId}
        }))
        .done(function (data) {
            attr=data;
            alert(attr[0].ctr_series_module_attr_id);

                var s=window.setTimeout(function(){
                    jsGrid.setDefaults({
                        tableClass: "jsgrid-table table table-striped table-hover"
                    }),
                        jsGrid.setDefaults("text", {
                            _createTextBox: function () {
                                return $("<input>").attr("type", "text").attr("class", "form-control input-sm")
                            }
                        }),
                        jsGrid.setDefaults("number", {
                            _createTextBox: function () {
                                return $("<input>").attr("type", "number").attr("class", "form-control input-sm")
                            }
                        }),
                        jsGrid.setDefaults("textarea", {
                            _createTextBox: function () {
                                return $("<input>").attr("type", "textarea").attr("class", "form-control")
                            }
                        }),
                        jsGrid.setDefaults("control", {
                            _createGridButton: function (cls, tooltip, clickHandler) {
                                var grid = this._grid;
                                return $("<button>").addClass(this.buttonClass).addClass(cls).attr({
                                    type: "button",
                                    title: tooltip
                                }).on("click", function (e) {
                                    clickHandler(grid, e)
                                })
                            }
                        }),
                        jsGrid.setDefaults("select", {
                            _createSelect: function () {
                                var $result = $("<select>").attr("class", "form-control form-control-sm"),
                                    valueField = this.valueField,
                                    textField = this.textField,
                                    selectedIndex = this.selectedIndex;
                                return $.each(this.items, function (index, item) {
                                    var value = valueField ? item[valueField] : index,
                                        text = textField ? item[textField] : item,
                                        $option = $("<option>").attr("value", value).text(text).appendTo($result);
                                    $option.prop("selected", selectedIndex === index)
                                }), $result
                            }
                        }),
                        function () {
                            $("#cell_attr").jsGrid({
                                height: "350px",
                                width: "98%",
                                filtering: true,
                                editing: true,
                                inserting: true,
                                sorting: true,
                                paging: true,
                                autoload: true,
                                pageSize: 5,
                                pageButtonCount: 5,
                                controller: {
                                    loadData: function (filter) {
                                        return $.ajax({
                                            type: "POST",
                                            url: "../../index/customer/cellAttrQuery",
                                            dataType: "json",
                                            data:{cellId:cellId}
                                        });
                                    },
                                    insertItem: function (item) {
                                        return $.ajax({
                                            type: "POST",
                                            url: "../../index/customer/cellAttrInsert",
                                            data: {data:item,cellId:cellId},
                                            dataType: "text",
                                            success: function (data) {
                                                if (data == 'y') {
                                                    //alert("");
                                                    alert("Success", "Date Added!", function () {
                                                    }, {type: 'success', confirmButtonText: 'OK'});

                                                    $('#cell_attr').jsGrid("refresh");
                                                } else alert("Failed to Update!");
                                            }
                                        });
                                    },
                                    updateItem: function (item) {
                                        return $.ajax({
                                            type: "POST",
                                            url: "../../index/customer/cellAttrUpdate",
                                            data: {data: item,cellId:cellId},
                                            dataType: "text",
                                            success: function (data) {
                                                if (data == 'y') {
                                                    //alert("");
                                                    alert("Success", "Date updated!", function () {
                                                    }, {type: 'success', confirmButtonText: 'OK'});
                                                    $('#cell_attr').jsGrid("refresh");
                                                } else alert("Failed to Update!");
                                            }
                                        });
                                    },
                                    deleteItem: function (item) {
                                        return $.ajax({
                                            type: "POST",
                                            url: "../../index/Customer/cellAttrDelete",
                                            data: {data: item},
                                            dataType: "text",
                                            success: function (data) {
                                                if (data == 'y') {
                                                    alert("Delete Successfully");
                                                }
                                            }
                                        });
                                    }
                                },
                                fields: [
                                    {type: "control",deleteButton: false,modeSwitchButton:true,clearFilterButton: false},

                                    {name: "cell_module_attr_id", title: "角色ID", type: "text", visible: false},
                                    {name: "ctr_series_module_attr_id", title: "编码",editing: false, type: "select",items:attr,valueField:"ctr_series_module_attr_id",textField:"ctr_module_attr_des", validate: "required", visible: true,width:65},
                                    {name: "cell_module_attr_value", title: "描述", type: "text", validate: "required",width:80,visible: true},
                                    {name: "enable_flag", type: "select", items:flag,valueField:"id",textField:"value",title: "FLAG", validate: "required",editing:true,width:70}

                                ]
                            });
                        }();
                },10);

        })}
function refreshTree(){
    showTree();
}






