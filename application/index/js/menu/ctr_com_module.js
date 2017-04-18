/**
 * Created by Administrator on 2017/3/28.
 */
var flag=[{id:"Y","value":"Y"},{id:"N","value":"N"}];
var yn=false;
var module=null;
getModule();
//window.setTimeout(w,2000);
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
                $("#jsGrid-basic").jsGrid({
                    height: "390px",
                    width: "98%",
                    filtering: true,
                    editing: true,
                    inserting: true,
                    sorting: true,
                    paging: true,
                    autoload: true,
                    pageSize: 5,
                    pageButtonCount: 5,
                    deleteConfirm: function () {
                        alert('Are u sure?')
                    },
                    //onItemInserted:function(item){$('#jsGrid-basic').jsGrid("insertItem",{datachange_type_id:432,datachange_code:432})},
                    controller: {
                        loadData: function (filter) {
                            return $.ajax({
                                type: "GET",
                                url: "http://localhost/hsd/public/Index.php/index/SysCtrAction/ctrComModuleQuery",
                                dataType: "json"
                            });
                        },
                        insertItem: function (item) {
                            return $.ajax({
                                type: "POST",
                                url: "http://localhost/hsd/public/Index.php/index/SysCtrAction/rwInsert",
                                data: {data: item},
                                dataType: "text",
                                success: function (data) {
                                    if (data == 'y') {
                                        alert("新增成功");
                                        $('#jsGrid-basic').jsGrid("refresh");
                                    } else if (data == 'e') {
                                        alert('主键已存在');
                                    } else if (data == 'n') alert("123");
                                }
                            });
                        },
                        updateItem: function (item) {
                            return $.ajax({
                                type: "POST",
                                url: "http://localhost/hsd/public/Index.php/index/SysCtrAction/ctrComModuleSave",
                                data: {data: item},
                                dataType: "text",
                                success: function (data) {
                                    if (data == 'y') {
                                        alert("Update Successfully");

                                    } else alert("Failed to Update!");
                                }
                            });
                        },
                        deleteItem: function (item) {
                            return $.ajax({
                                type: "POST",
                                url: "http://localhost/hsd/public/Index.php/index/SysCtrAction/rwDelete",
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
                        {name: "ctr_series_module_attr_id", title: "控制器字段ID", type: "text", visible: false},
                        {name: "ctr_module_attr_id", title: "控制器字段ID", type: "text", visible: false},
                        {name: "ctr_series_module_id", title: "控制器字段ID", type: "text", visible: false,width:"auto"},
                        {
                            name: "ctr_brand_des",
                            title: "品牌",
                            type: "text",
                            validate: "required",
                            editing:false,width:70
                        },
                        {name: "ctr_series_des", type: "text", title: "系列", validate: "required",editing:false,width:"auto"},
                        {name: "ctr_module_des", type: "text", title: "通讯方式", validate: "required",editing:false,width:"auto"},
                        {name: "ctr_module_attr_des", type: "text", title: "参数",css: "filtercss", validate: "required",editing:false,width:70},
                        {name: "attr_default_value", type: "text", title: "缺省值",editing:true,width:70},
                        {
                            name: "enable_flag",
                            type: "select",
                            title: "FLAG",
                            items: flag,
                            textField: "id",
                            valueField: "value",
                            sorting: false,width:70
                        },
                        {type: "control",width:"auto",deleteButton: false}
                    ]
                });
                $("#module").jsGrid({
                    height: "320px",
                    width: "98%",
                    filtering: true,
                    editing: true,
                    inserting: true,
                    sorting: true,
                    paging: true,
                    autoload: true,
                    pageSize: 5,
                    pageButtonCount: 5,
                    deleteConfirm: function () {
                        alert('Are u sure?')
                    },
                    //onItemInserted:function(item){$('#jsGrid-basic').jsGrid("insertItem",{datachange_type_id:432,datachange_code:432})},
                    controller: {
                        loadData: function (filter) {
                            return $.ajax({
                                type: "GET",
                                url: "http://localhost/hsd/public/Index.php/index/SysCtrAction/ctrSeriesModuleQuery",
                                dataType: "json"
                            });
                        },
                        insertItem: function (item) {
                            return $.ajax({
                                type: "POST",
                                url: "http://localhost/hsd/public/Index.php/index/SysCtrAction/rwInsert",
                                data: {data: item},
                                dataType: "text",
                                success: function (data) {
                                    if (data == 'y') {
                                        alert("新增成功");
                                        $('#jsGrid-basic').jsGrid("refresh");
                                    } else if (data == 'e') {
                                        alert('主键已存在');
                                    } else if (data == 'n') alert("123");
                                }
                            });
                        },
                        updateItem: function (item) {
                            return $.ajax({
                                type: "POST",
                                url: "http://localhost/hsd/public/Index.php/index/SysCtrAction/ctrSeriesModuleSave",
                                data: {data: item},
                                dataType: "text",
                                success: function (data) {
                                    if (data == 'y') {
                                        alert("Update Successfully");

                                    } else alert("Failed to Update!");
                                }
                            });
                        },
                        deleteItem: function (item) {
                            return $.ajax({
                                type: "POST",
                                url: "http://localhost/hsd/public/Index.php/index/SysCtrAction/rwDelete",
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
                        {name: "ctr_series_module_id", title: "控制器字段ID", type: "text", visible: false},
                        {name: "ctr_series_id", title: "控制器字段ID", type: "text", visible: false},
                        {
                            name: "ctr_brand_des",
                            title: "品牌",
                            type: "text",
                            validate: "required",
                            editing:false,width:70
                        },
                        {name: "ctr_series_des", type: "text", title: "系列", validate: "required",editing:false,width:100},
                        {name: "ctr_module_id", type: "select", items:module,valueField:"id",textField:"value",title: "通讯方式", validate: "required",editing:true,width:130},
                        //{name: "ctr_module_id", title: "控制器字段ID", type: "text", width:"auto"},
                        {type: "control",width:"auto",deleteButton: false}
                    ]
                });
            }();


    },100);
});
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
function getModule(){
    //var module;
    $.ajax({
        type:"POST",
        url:"http://localhost/hsd/public/Index.php/index/SysCtrAction/getModule",
        dataType:"json",
        success:function(data){module=data;yn=true}
    });
    //alert(module[0].id);
    //return module;
    //alert(module[0].id);
}