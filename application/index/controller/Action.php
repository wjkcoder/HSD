<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/10
 * Time: 11:46
 */

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Model;
use think\Request;
use app\common\model\HsdPrj;
use app\common\model\HsdPrjMenu;
use app\common\model\HsdSysFastcode;
use app\common\model\HsdSysFastcodeGroup;
use app\common\model\HsdSysObjectEventType;
use app\common\model\HsdPrjSvrLevelField;
class Action extends Controller
{

    public function index(){
        echo '测试成功';
    }
   static function callMysql($sql){

   }
    //项目维护
    public  function prjDelete(){
        $prjId=$_POST['id'];
        $sql="delete  from hsd_prj  where prj_id=".$prjId;
        Db::startTrans();
        try{
            Db::execute($sql);
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public  function insert(){
       //准备数据
        $prj=[];
        $prj['prj_id']=$_POST['prj_id'];
        $prj['prj_code']=$_POST['prj_code'];
        $prj['prj_des']=$_POST['prj_des'];
        $prj['create_by']=session('userId');
        $prj['last_updated_by']=session('userId');
        var_dump($prj);

        $test=new HsdPrj();

        Db::startTrans();
        try{
            $state=$test->data($prj)->save();
            if($state){
                echo 'y';
            } else echo 'n';

        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }

    }
    public function  prjInsert(){
        //准备数据
        $prj=[];
        $prj['prj_id']=$_POST['prj_id'];
        $prj['prj_code']=$_POST['prj_code'];
        $prj['prj_des']=$_POST['prj_des'];
        $prj['create_by']=session('userId');
        $prj['last_updated_by']=session('userId');


//        var_dump($prj);

        Db::startTrans();

        $test=new HsdPrj();

        try{
            $state=$test->isUpdate()->data($prj)->save();
            Db::commit();
            echo 'y';

        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }

    }
    public function  prjUpdate(){

        //准备数据
        $prj=[];
        $prj['prj_id']=$_POST['prj_id'];
        $prj['prj_code']=$_POST['prj_code'];
        $prj['prj_des']=$_POST['prj_des'];
        $prj['create_by']=session('userId');
        $prj['last_updated_by']=session('userId');


//        var_dump($prj);

        Db::startTrans();

        $test=new HsdPrj();

        try{
            $state=$test->isUpdate(true)->data($prj)->save();
            Db::commit();
            echo 'y';

        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }

    }
    public function test(){

        $prj=new HsdPrj();
        $arr=$_POST['data'];
        Db::startTrans();
        try{
            foreach($arr as $i){
                if($prj->get($i['prj_id'])){
                    $prj->data($i,true)->isUpdate(true)->save();
                }else{

                    $prj->prj_id=$i['prj_id'];
                    $prj->prj_code=$i['prj_code'];
                    $prj->prj_des=$i['prj_des'];
                    $prj->create_by=session('userId');
                    $prj->last_updated_by=session('userId');

                    $prj->isUpdate(false)->save();
                    Db::commit();
                }
            }
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }

    }
    public function getPrj(){
        $sql='select prj_id,prj_des from hsd_prj';
        $res=Db::query($sql);
        echo json_encode($res);
    }


    //菜单分配
    public function retModule(){

        $prjId=$_POST['prjId'];
        $sql="select DISTINCT hsm.module_id,hsm.module_des from hsd_prj_menu hpm ,hsd_sys_module_menu hsmm,hsd_sys_module hsm
where hpm.menu_id=hsmm.menu_id and hsmm.module_id=hsm.module_id and hpm.prj_id=".$prjId;

        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function retmenu(){
        $prjId=$_POST['prjId'];
        $moduleId=$_POST['moduleId'];
        $sql="select DISTINCT hpm.prj_id,hsmm.menu_id,hsmm.menu_des from hsd_prj_menu hpm ,hsd_sys_module_menu hsmm,hsd_sys_module hsm
where hpm.menu_id=hsmm.menu_id and hsmm.module_id=hsm.module_id and hpm.prj_id=".$prjId." and hsm.module_id=".$moduleId;

        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function retUnMenu(){
        $prjId=$_POST['prjId'];
        $moduleId=$_POST['moduleId'];
        $sql="SELECT
                hsmm.menu_id,
                hsmm.menu_des
            FROM
                hsd_sys_module_menu hsmm
            WHERE
                hsmm.module_id =". $moduleId."
            AND hsmm.menu_id NOT IN (
                SELECT
                    hpm.menu_id
                FROM
                    hsd_prj_menu hpm,
                    hsd_sys_module_menu hsmm
                WHERE
                    hpm.prj_id = ".$prjId."
                AND hsmm.module_id = ".$moduleId."
                AND hsmm.menu_id = hpm.menu_id
            )";

        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function saveMenu(){

        //获取post数据

//        var_dump($arr);

        $prjId=$_POST['prjId'];
        $insert=$_POST['Id'];
        $delete=$_POST['delId'];

        $data=array();
        for($k=0;$k<count($insert);$k++)
        {
            $data[$k]=array(
                'prj_id'=>$prjId,
                'menu_id'=>$insert[$k],
                'create_by'=>session('userId'),
                'last_updated_by'=>session('userId')
            );
        }

        $prjMenu=new  HsdPrjMenu();

            Db::startTrans();
            try{
                if($insert[0]!=='n'){
                //遍历新增
                 foreach($data as $i){
                    if($prjMenu->get(['menu_id'=>$i['menu_id'],'prj_id'=>$prjId])){
                        continue;
                    }else{
//                        $prjMenu->prj_id=$prjId;
//                        $prjMenu->menu_id=$i;
//                        $prjMenu->create_by=session('userId');
//                        $prjMenu->last_updated_by=session('userId');
//                        $prjMenu->isUpdate(false)->save();

//                        $prjMenu->prj_id=$i['prj_id'];
//                        $prjMenu->menu_id=$i['menu_id'];
//                        $prjMenu->create_by=session('userId');
//                        $prjMenu->last_updated_by=session('userId');
                        HsdPrjMenu::create([
                        'prj_id'=>$i['prj_id'],
                        'menu_id'=>$i['menu_id'],
                        'create_by'=>session('userId'),
                        'last_updated_by'=>session('userId')]);
//                        $prjMenu->isUpdate(false)->save();
                        Db::commit();
                    }
                }
                }else{
                    echo 'unselected';}
                //遍历删除
                if($delete[0]!=='n'){
                    foreach($delete as $i){
                        if($prjMenu->where('menu_id',$i)->where('prj_id',$prjId)->find()){
                            HsdPrjMenu::destroy(['menu_id'=>$i,'prj_id'=>$prjId]);
                            Db::commit();
                        }else{ continue;}
                    }
                }

                Db::commit();
                echo 'y';
            }catch(\Exception $e){
                Db::rollback();
                echo 'n';
            }

        //对应字段赋值
        //事务操作
    }

    //快速编码维护
    public function fastCodeQuery(){
        $sql="select  hsf.fastcode_id,hsf.fastcode_group_id,hsfg.fastcode_group_des,hsf.fastcode_des,hsf.enable_flag  from hsd_sys_fastcode hsf,hsd_sys_fastcode_group hsfg
where hsf.fastcode_group_id=hsfg.fastcode_group_id";
        echo json_encode(Db::query($sql));
    }
    public function fastCodeGroupQuery(){
        $sql="select hsfg.fastcode_group_des as Name,hsfg.fastcode_group_id as Id from hsd_sys_fastcode_group hsfg";
//        echo json_encode(Db::query($sql));
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function fastCodeInsert(){
        $arr=$_POST['data'];
        $fastcode=new HsdSysFastcode();

        Db::startTrans();
        try{

//            $fastcode->fastcode_id =$arr['fastcode_id'];
            $fastcode->fastcode_group_id=$arr['fastcode_group_id'];
            $fastcode->fastcode_des=$arr['fastcode_des'];
            $fastcode->enable_flag=$arr['enable_flag'];
            $fastcode->create_by=session('userId');
            $fastcode->last_updated_by=session('userId');

            $fastcode->save();
            Db::commit();
            echo 'y';
        }catch(\Exception $e ){
            Db::rollback();
            echo 'n';
        };
    }
    public function fastCodeUpdate(){
        $arr=$_POST['data'];
        $fastcode=new HsdSysFastcode();
        Db::startTrans();
        try{
                $fastcode->save(
                    ['fastcode_group_id'=>$arr['fastcode_group_id'],
                      'fastcode_des'=>$arr['fastcode_des'],
                      'enable_flag' => $arr['enable_flag'],
                        'create_by'=>session('userId'),
                        'last_updated_by'=>session('userId')
                ],['fastcode_id'=>$arr['fastcode_id']]);
                Db::commit();
                echo 'y';
        }catch(\Exception $e ){
            Db::rollback();
            echo 'n';
        };
    }
    public function fastCodeDelete(){
        $arr=$_POST['data'];
        $id=$arr['fastcode_id'];

        $fastcode=new HsdSysFastcode();
        Db::startTrans();
        try{
            $del=$fastcode->get($id);
            $del->delete();
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }

    //新增快码组
    public function fgAdd(){
        $fg_code=$_POST['fg_code'];
        $fg_des=$_POST['fg_des'];
        $fg=new HsdSysFastcodeGroup();

        Db::startTrans();
        try{
            $fg->fastcode_group_code=$fg_code;
            $fg->fastcode_group_des=$fg_des;
            $fg->create_by=session('userId');
            $fg->last_updated_by=session('userId');
            $fg->save();
            Db::commit();
            echo 'y' ;
        }catch(\Exception $e){
            echo 'n' ;
        }

    }

    //事件类型维护
    public function eventTypeQuery(){

        $sql="select  hsoet.event_type_id,hsoet.event_type_code,hsoet.event_type_des,enable_flag from  hsd_sys_object_event_type hsoet";
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function eventTypeInsert(){
        $arr=$_POST['data'];
        $event=new HsdSysObjectEventType();

        Db::startTrans();
        try{
            if($event->where("event_type_code","=",$arr['event_type_code'])->find()){
                echo 'e';
            }else{
//                $event->event_type_id='';
                $event->event_type_code=$arr['event_type_code'];
                $event->event_type_des=$arr['event_type_des'];
                $event->enable_flag=$arr['enable_flag'];
                $event->create_by=session('userId');
                $event->last_updated_by=session('userId');

                $event->save();
                Db::commit();
                echo 'y';
            }

        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }

    }
    public function eventTypeUpdate(){
        $arr=$_POST['data'];
        $event=new HsdSysObjectEventType();
        Db::startTrans();
        try{
            $event->save(
                [
                    'event_type_code'=>$arr['event_type_code'],
                    'event_type_des'=>$arr['event_type_des'],
                    'enable_flag' => $arr['enable_flag'],
                    'create_by'=>session('userId'),
                    'last_updated_by'=>session('userId')
                ],['event_type_id'=>$arr['event_type_id']]);
            Db::commit();
            echo 'y';
        }catch(\Exception $e ){
            Db::rollback();
            echo 'n';
        };
    }
    public function eventTypeDelete(){
        $arr=$_POST['data'];
        $id=$arr['event_type_id'];

        $event=new HsdSysObjectEventType();
        Db::startTrans();
        try{
            $del=$event->get($id);
            $del->delete();
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }

    //服务器字段维护
    public function serverFieldQuery(){
        $sql='select hpslf.svr_field_id,hpslf.svr_level,hpslf.field_code,hpslf.field_des,hpslf.field_default_value,hpslf.enable_flag from hsd_prj_svr_level_field hpslf';
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function serverFieldInsert(){
        $arr=$_POST['data'];
        $svr=new HsdPrjSvrLevelField();

        Db::startTrans();
        try{
            if($svr->where("field_code","=",$arr['field_code'])->find()){
                echo 'e';
            }else{
//                $event->event_type_id='';
                $svr->svr_level=$arr['svr_level'];
                $svr->field_code=$arr['field_code'];
                $svr->field_des=$arr['field_des'];
                $svr->field_default_value=$arr['field_default_value'];
                $svr->enable_flag=$arr['enable_flag'];

                $svr->create_by=session('userId');
                $svr->last_updated_by=session('userId');

                $svr->save();
                Db::commit();
                echo 'y';
            }

        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public function serverFieldUpdate(){
        $arr=$_POST['data'];
        $event=new HsdPrjSvrLevelField();
        Db::startTrans();
        try{
            $event->save(
                [
                    'svr_level'=>$arr['svr_level'],
                    'field_code'=>$arr['field_code'],
                    'field_des' => $arr['field_des'],
                    'field_default_value'=>$arr['field_default_value'],
                    'enable_flag'=>$arr['enable_flag'],
                    'create_by'=>session('userId'),
                    'last_updated_by'=>session('userId')
                ],['svr_field_id'=>$arr['svr_field_id']]);
            Db::commit();
            echo 'y';
        }catch(\Exception $e ){
            Db::rollback();
            echo 'n';
        };
    }
    public function serverFieldDelete(){
        $arr=$_POST['data'];
        $id=$arr['svr_field_id'];

        $svr=new HsdPrjSvrLevelField();
        Db::startTrans();
        try{
            $del=$svr->get($id);
            $del->delete();
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }


}