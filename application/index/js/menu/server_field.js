/**
 * Created by Administrator on 2017/3/27.
 */
$(document).ready(function() {
    var ad= $.ajax({
        type:"GET",
        url:"http://localhost/hsd/public/Index.php/index/action/fastCodeGroupQuery",
        dataType:"text"
    });
    var flag=[{"id":"Y","value":"Y"},{"id":"N","value":"N"}];
    jsGrid.setDefaults({
        tableClass: "jsgrid-table table table-striped table-hover"
    }), jsGrid.setDefaults("text", {
        _createTextBox: function() {
            return $("<input>").attr("type", "text").attr("class", "form-control input-sm")
        }
    }), jsGrid.setDefaults("number", {
        _createTextBox: function() {
            return $("<input>").attr("type", "number").attr("class", "form-control input-sm")
        }
    }), jsGrid.setDefaults("textarea", {
        _createTextBox: function() {
            return $("<input>").attr("type", "textarea").attr("class", "form-control")
        }
    }), jsGrid.setDefaults("control", {
        _createGridButton: function(cls, tooltip, clickHandler) {
            var grid = this._grid;
            return $("<button>").addClass(this.buttonClass).addClass(cls).attr({
                type: "button",
                title: tooltip
            }).on("click", function(e) {
                clickHandler(grid, e)
            })
        }
    }), jsGrid.setDefaults("select", {
        _createSelect: function() {
            var $result = $("<select>").attr("class", "form-control form-control-sm"),
                valueField = this.valueField,
                textField = this.textField,
                selectedIndex = this.selectedIndex;
            return $.each(this.items, function(index, item) {
                var value = valueField ? item[valueField] : index,
                    text = textField ? item[textField] : item,
                    $option = $("<option>").attr("value", value).text(text).appendTo($result);
                $option.prop("selected", selectedIndex === index)
            }), $result
        }
    }),

        function() {
            $("#jsGrid-basic").jsGrid({
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
                deleteConfirm: function(){alert('Are u sure?')},
                controller: {
                    loadData: function(filter){
                        return $.ajax({
                            type:"GET",
                            url:"http://localhost/hsd/public/Index.php/index/action/serverFieldQuery",
                            dataType:"json"
                        });
                    },
                    insertItem: function(item){
                        return $.ajax({
                            type: "POST",
                            url: "http://localhost/hsd/public/Index.php/index/action/serverFieldInsert",
                            data: {data:item},
                            dataType:"text",
                            success:function(data){
                                if(data=='y'){alert("新增成功");}else if(data=='e'){alert('主键已存在');}else alert("123");
                            }
                        });
                    },
                    updateItem: function(item){
                        return $.ajax({
                            type: "POST",
                            url: "http://localhost/hsd/public/Index.php/index/action/serverFieldUpdate",
                            data: {data:item},
                            dataType:"text",
                            success:function(data){
                                if(data=='y'){alert("Update Successfully");}else if(data=='e'){alert('主键已存在');}else if(data=='n') alert("Failed to Update!");
                            }
                        });
                    },
                    deleteItem: function(item){
                        return $.ajax({
                            type: "POST",
                            url: "http://localhost/hsd/public/Index.php/index/action/serverFieldDelete",
                            data: {data:item},
                            dataType:"text",
                            success:function(data){
                                if(data=='y'){alert("Delete Successfully");}
                            }
                        });
                    }
                },
                fields: [
                    { name: "svr_field_id",title:"事件类型ID", type: "text" ,visible:false},
                    { name: "svr_level",title:"类型编码", type: "text",validate: "required"},
                    //{ name: "fastcode_group_des",title:"描述",type:"select",items:ad,valueField:""},
                    { name: "field_code", type: "text", title: "类型描述", sorting: false ,validate: "required"},
                    { name: "field_des", type: "text", title: "enable_flag", sorting: false,validate: "required" },
                    { name:"field_default_value",type:"text",title:"缺省值"},
                    { name:"enable_flag",type:"select",items:flag,textField:"id",valueField:"value",validate:"required"},
                    { type: "control" }
                ]
            });
        }();

});

function addGp(){
    var fg_code=$('#fg_code').val();
    var fg_des=$('#fg_des').val();

    $.ajax({
        type:"POST",
        url:"http://localhost/hsd/public/Index.php/index/action/fgAdd",
        data:{fg_code:fg_code,fg_des:fg_des},
        dataType:'text',
        success:function(data){
            if(data=='y'){
                alert('Save Successfully!');
            }else alert('Failed');
        }
    });

}