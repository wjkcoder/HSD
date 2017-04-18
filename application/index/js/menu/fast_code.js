var ad=null;
var flag=[{Id:"Y",Name:"Y"},{Id:"N",Name:"N"}];
$(document).ready(function() {
    //var ad= $.ajax({
    //    type:"GET",
    //    url:"http://localhost/hsd/public/Index.php/index/action/fastCodeGroupQuery",
    //    dataType:"text"
    //});
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

            $.when(
                $.ajax({
                    type:'GET',
                    url:'http://localhost/hsd/public/Index.php/index/action/fastCodeGroupQuery',
                    dataType:'json'
                })
            ).done(function(data){
                 ad=data;
            //var ad=[{"id":1,"value":"value1"},{"id":2,"value":"value2"}];
            //var ad1=[{"Name":"\u542f\u7528\/\u7981\u7528","Id":1},{"Name":"\u754c\u9762\u6253\u5f00\u65b9\u5f0f","Id":2},{"Name":"\u6587\u4ef6\u7ea7\u522b","Id":3},{"Name":"\u670d\u52a1\u7ea7\u522b","Id":4},{"Name":"\u6570\u636e\u7ea7\u522b","Id":5}]
            //alert(fastCodeGroup[0].fastcode_group_id);
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
                deleteConfirm: "Do you really want to delete the client?",
                controller: {
                    loadData: function(filter){
                        return $.ajax({
                            type:"GET",
                            url:"http://localhost/hsd/public/Index.php/index/action/fastCodeQuery",
                            dataType:"json"
                        });
                    },
                    insertItem: function(item){
                        return $.ajax({
                            type: "POST",
                            url: "http://localhost/hsd/public/Index.php/index/action/fastCodeInsert",
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
                            url: "http://localhost/hsd/public/Index.php/index/action/fastCodeUpdate",
                            data: {data:item},
                            dataType:"text",
                            success:function(data){
                                if(data=='y'){alert("Save Successfully");}else if(data=='e'){alert('主键已存在');}else if(data=='n') alert("123");
                            }
                        });
                    },
                    deleteItem: function(item){
                        return $.ajax({
                            type: "POST",
                            url: "http://localhost/hsd/public/Index.php/index/action/fastCodeDelete",
                            data: {data:item},
                            dataType:"text",
                            success:function(data){
                                if(data=='y'){alert("Delete Successfully");}else if(data=='e'){alert('主键已存在');}else if(data=='n') alert("123");
                            }
                        });
                    }
                },
                fields: [
                    { name: "fastcode_id",title:"快码ID", type: "text" ,visible:false},
                    { name: "fastcode_group_id",title:"快码组描述", type: "select" ,items:ad, valueField: "Id",
                        textField: "Name",width:120},
                    //{ name: "fastcode_group_des",title:"描述",type:"select",items:ad,valueField:""},
                    { name: "fastcode_des", type: "text", title: "快码", sorting: true ,validate: "required",width:100},
                    { name: "enable_flag", type: "select", title: "FLAG", sorting: true,validate: "required",items:flag,valueField:"Id",textField:"Name",width:80},
                    { type: "control",width:50,editButton: false}
                ]
            });
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
$('#btnHide').click(function(){
    $('#addDialog').hide(500);
});
$('#btnShow').click(function(){
    $('#addDialog').show(800);
});