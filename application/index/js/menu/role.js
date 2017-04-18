/**
 * Created by Administrator on 2017/3/28.
 */
var flag=[{id:"Y","value":"Y"},{id:"N","value":"N"}];
var yn=false;
var module=null;
var prjRole=null;

var options=$("#prjRole option:selected");

prjRole=options.val();
//var demo1 = $('select[name="duallist"]').bootstrapDualListbox(
//    {
//        nonSelectedListLabel: '功能集',
//
//        selectedListLabel: '已选择分配',
//        moveOnSelect: false,
//
//        //preserveSelectionOnMove: 'moved',
//        //nonSelectedListLabel: 'Non-selected',
//
//        //selectedListLabel: 'Selected',
//
//        preserveSelectionOnMove: 'moved',
//
//        //moveOnSelect: false,
//
//        nonSelectedFilter: 'ion ([7-9]|[1][0-2])'
//
//    }
//);
    $.when($.ajax({
            url: 'http://localhost/hsd/public/Index.php/index/customer/getPrjRole',
            dataType: 'json',
            type: 'get'
        }))
        .done(function (data) {

            $('#prjRole').empty();
            for (var i = 0; i <= eval(data).length - 1; i++) {
                $('#prjRole').append("<option value='" + eval(data)[i].prj_role_id + "'>" + eval(data)[i].role_des + "</option>");
            }
            prjRole = $("#prjRole option:first").val();

            //alert(prjRole);
            getMenu();
        });


$("#demoform").submit(function() {

    alert($('[name="duallist"]').val());

    return false;

});
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
                                url: "http://localhost/hsd/public/Index.php/index/Customer/roleQuery",
                                dataType: "json"
                            });
                        },
                        insertItem: function (item) {
                            return $.ajax({
                                type: "POST",
                                url: "http://localhost/hsd/public/Index.php/index/Customer/roleInsert",
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
                                url: "http://localhost/hsd/public/Index.php/index/Customer/roleUpdate",
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
                                url: "http://localhost/hsd/public/Index.php/index/Customer/roleDelete",
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
                        {name: "prj_role_id", title: "角色ID", type: "text", visible: false},
                        {name: "prj_id", title: "项目ID", type: "text", visible: false},
                        {
                            name: "role_code",
                            title: "品牌",
                            type: "text",
                            validate: "required",
                            editing:false,width:100
                        },
                        {name: "role_des", type: "text", title: "系列", validate: "required",editing:false,width:100},
                        {name: "enable_flag", type: "select", items:flag,valueField:"id",textField:"value",title: "FLAG", validate: "required",editing:true,width:70},
                        //{name: "ctr_module_id", title: "控制器字段ID", type: "text", width:"auto"},
                        {type: "control",width:"auto"}
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
}
function getPrjRole(){
    $.ajax({
        type:"POST",
        url:"http://localhost/hsd/public/Index.php/index/customer/getPrjRole",
        dataType:"json",
        //data:{data:prjRole},
        success:function(data){
            $('#prjRole').empty();
            for(var i=0;i<=eval(data).length-1;i++){
                //$('#prjRole').append("<li id=' "+eval(data)[i].menu_id+"'>"+eval(data)[i].menu_des);
                $('#prjRole').append("<option value='"+eval(data)[i].prj_role_id+"'>"+eval(data)[i].role_des+"</option>");
            }
            prjRole=$("#prjRole option:first").val();
            //alert(prjRole);
            getMenu();
        }
    });
}
function select(data){
    var options=$("#prjRole option:selected");
    prjRole=options.val();
    alert(prjRole);

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
