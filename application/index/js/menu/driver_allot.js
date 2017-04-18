/**
 * Created by Administrator on 2017/3/20.
 */
    $(function(){
        var lList = $("#lList");
        var llList = document.getElementById("lList");
        var rList = $("#rList");
        var items = $(".data-list li");
        for(var i = 0;i<items.length;i++){
            //items[i].onclick = itemsclick;
            items[i].on('click',itemsclick);
            items[i].ondblclick = itemsdblclick;
        }
        function itemsdblclick(){
            if (this.parentNode === llList) {
                rList.append(this);
            }else{
                lList.append(this);
            }
        }
        function itemsclick(){
            var classname = this.className;
            if(classname === "selected"){
                this.className = "";
            }else{
                this.className="selected";
            }
        }
        function itemsMove(){
            var items = $(".data-list li.selected");
            for(var i = 0;i<items.length;i++){
                if(this.id === "add"){
                    rList.append(items[i]);
                }else{
                    lList.append(items[i]);
                }
            }
        }
        $("#add").on("click",itemsMove);
        $("#remove").on("click",itemsMove);
        var prjId=$('#prj').val();
        prjId=prjId.charAt(0);
        //alert(prjId);
        $.ajax({
                type: 'POST',
                url: 'http://localhost/hsd/public/Index.php/index/action/retmodule',
                data: {prjId:prjId},
                success: function(data){
                    $("#mList").empty();
                    //$("#FruitLists").append("<ul></ul>");
                    for (var i = 0; i <= eval(data).length - 1; i++) {
                        $("#mList").append("<li>" +eval(data)[i].module_id +eval(data)[i].module_des + "</li>")
                    }
                }
            });
    });
    var moduleId;
    var prjId=$('#prj').val();
    prjId=prjId.charAt(0);
    function select(data){
       var options=$("#prj option:selected");
       prjId=options.val();
   }
$.when(
    $.ajax({
        type:'GET',
        url:'http://localhost/hsd/public/Index.php/index/action/getPrj',
        dataType:'json'
    })
).done(function(data){
    alert('12345');
    $('#prj').empty();
    for (var i = 0; i <= eval(data).length - 1; i++) {
        $('#prj').append("<option value='" + eval(data)[i].prj_id + "'>" + eval(data)[i].prj_des + "</option>");
    }
    //$('#prj').append();
});
    function test(){
        $.ajax({
            type: 'POST',
            url: 'http://localhost/hsd/public/Index.php/index/action/retmodule',
            data: {prjId:prjId},
            success: function(data){
                $("#mList").empty();
                //$("#FruitLists").append("<ul></ul>");
                for (var i = 0; i <= eval(data).length - 1; i++) {
                    $("#mList").append("<li>" +eval(data)[i].module_id +eval(data)[i].module_des + "</li>")
                }
            }
        })
    }
    $("#mList").on("click","li", function() {

        moduleId=this.innerHTML;
        moduleId=moduleId.charAt(0);
       //alert(moduleId);
       // this.addClass('selected');
        $.ajax({
            type:'POST',
            url:'http://localhost/hsd/public/Index.php/index/action/retmenu',
            data:{prjId:prjId,moduleId:moduleId},
            success:function(data){
                $('#rList').empty();
                for(var i=0;i<=eval(data).length-1;i++){
                    $('#rList').append("<li id=' "+eval(data)[i].menu_id+"'>"+eval(data)[i].menu_des);
                }
            },
            error:function(){}
        });
        $.ajax({
            type:'POST',
            url:'http://localhost/hsd/public/Index.php/index/action/retunmenu',
            data:{prjId:prjId,moduleId:moduleId},
            success:function(data){
                $('#lList').empty();
                for(var i=0;i<=eval(data).length-1;i++){
                    $('#lList').append("<li id=' "+eval(data)[i].menu_id+"'>"+eval(data)[i].menu_des);
                }
            },
            error:function(){}
        });


    });
    $("#rList").on("click","li", function(){
      //alert(this.innerHTML);
    if(this.className==="selected"){
        this.className=" ";
    }else {
        this.className+=" ";
        this.className+="selected";
    }

});
    $("#lList").on("click","li", function(){
        //alert(this.innerHTML);
        if(this.className==="selected"){
            this.className=" ";
        }else {
            this.className+=" ";
            this.className+="selected";
        }
    });
    $("#save").on("click",function(){
        var rli=$("#rList").find("li");
        var lli=$("#lList").find("li");
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
            delId[0]='n'
        }

        //alert(delId);
        //alert(Id);
        $.ajax({
            type: 'POST',
            url: 'http://localhost/hsd/public/Index.php/index/action/savemenu',
            data: {Id:Id,prjId:prjId,delId:delId},
            dataType:'text',
            success: function(data){
                if(data==='y'){
                    $("#lList").empty();
                    $("#rList").empty();
                    alert('Save Successfully');
                }else if(data==='unselected') alert('Nothing to Add',"please select menu",{type: 'success', confirmButtonText: 'OK'});

            }
        });

        //alert("添加成功");
    });





