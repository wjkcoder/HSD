<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/31
 * Time: 16:01
 */

namespace app\index\controller;

use app\common\model\HsdPrjSvrLine;
use app\common\model\HsdPrjSvrLineCell;
use app\common\model\HsdPrjSvrLineCellGroup;
use app\common\model\HsdPrjSvrLineCellGroupData;
use app\common\model\HsdPrjSvrLineCellGroupDriverField;
use app\common\model\HsdPrjSvrLineCellGroupModuleField;
use app\common\model\HsdPrjSvrLineCellModuleAttr;
use app\common\model\HsdPrjSvrUser;
use app\common\model\HsdPrjSvr;
use app\common\model\HsdPrjSvrClient;
use app\common\model\HsdPrjUser;
use app\common\model\HsdPrjUserRole;
use think\Controller;
use think\Db;
use think\Model;
use app\common\model\HsdPrjRole;
class Customer extends Controller
{
  public function index(){return '1234';}

    //项目角色维护
    public function roleQuery(){
        $sql='select * from hsd_prj_role where prj_id='.session('prjId');
        $res=Db::query($sql);
//        var_dump($res) ;
        echo json_encode($res);
    }
    public function roleInsert(){
        $arr=$_POST['data'];
        $role=new HsdPrjRole();
         Db::startTrans();
        try{
            if($role->where("role_code","=",$arr['role_code'])->find()){echo 'e';}else{
            $role->prj_id=session('prjId');
            $role->role_code=$arr['role_code'];
            $role->role_des=$arr['role_des'];
            $role->enable_flag=$arr['enable_flag'];

            $role->create_by=session('userId');
            $role->last_updated_by=session('userId');

            $role->save();
            Db::commit();
            echo 'y';}
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public function roleUpdate(){
        $arr=$_POST['data'];
        $role=new HsdPrjRole();
        Db::startTrans();
        try{
            $role->save([
                "prj_id"=>session('prjId'),
                "role_code"=>$arr['role_code'],
                "role_des"=>$arr['role_des'],
                "enable_flag"=>$arr['enable_flag'],
                "last_updated_by"=>session('userId')
            ],["prj_role_id"=>$arr['prj_role_id']]);
                Db::commit();
                echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public function roleDelete(){
        $arr=$_POST['data'];
        $id=$arr['prj_role_id'];
        $role=new HsdPrjRole();
        Db::startTrans();
        try{
            $del=$role->get($id);
            $del->delete();
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }


    //项目角色菜单维护

    public function getPrjRole(){
        $sql='select hpr.prj_role_id,hpr.role_des from hsd_prj_role hpr where hpr.prj_id='.session('prjId');
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function getPrjMenu(){
        $prjRole=$_POST['data'];
        $sql='select DISTINCT hprm.prj_role_menu_id,
			 hprm.prj_menu_id,
			hprm.prj_role_id,hprm.open_code,hsmm.menu_des	from hsd_prj_role hpr,
hsd_sys_module_menu hsmm,
hsd_prj_menu hpm,
hsd_prj_role_menu hprm,
hsd_prj_menu
where hpr.prj_role_id=hprm.prj_role_id
and  	hpm.prj_menu_id=hprm.prj_menu_id
and 	hpm.menu_id=hsmm.menu_id
and 	hpr.prj_role_id='.$prjRole;
        $res=Db::query($sql);
        echo json_encode($res);
    }
    //项目用户和角色分配
    public function getPrjUser(){
        $sql='select hpur.prj_user_role_id,hpu.prj_user_id,hpu.user_code,hpu.user_name,hpur.prj_role_id,hpu.enable_flag from hsd_prj_user hpu LEFT JOIN hsd_prj_user_role hpur ON hpu.prj_user_id=hpur.prj_user_id
where hpu.prj_id='.session('prjId');
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function userAdd(){

        $code=$_POST['code'];
        $des=$_POST['des'];
        $mm=$_POST['mm'];
        $iphone=$_POST['iphone'];

        $nn=HsdPrjUser::encryptPassword($mm);

        $user=new HsdPrjUser();
        Db::startTrans();
        try{
            $user->prj_id=session('prjId');
            $user->user_code=$code;
            $user->user_name=$des;
            $user->user_password=$nn;
            $user->user_phone=$iphone;

            $user->save();
            Db::commit();
            echo 'y';

        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }

    }
    public function userRoleSave(){
        $arr=$_POST['data'];
        $userRole=new HsdPrjUserRole();
        Db::startTrans();
        try{
            if($arr['prj_user_role_id']){
                $userRole->save([
                    'prj_role_id'  => $arr['prj_role_id'],
                    'enable_flag' => $arr['enable_flag']
                ],['prj_user_role_id' => $arr['prj_user_role_id']]);

                Db::commit();
                echo 'y';
            }else{
             $userRole->prj_role_id=$arr['prj_role_id'];
                $userRole->prj_user_id=$arr['prj_user_id'];
                $userRole->enable_flag=$arr['enable_flag'];
                $userRole->save();
                Db::commit();
                echo 'y';
            }
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public function userDelete(){
        $arr=$_POST['data'];
        $id=$arr['prj_user_id'];
        $user=new HsdPrjUser();
        Db::startTrans();
        try{
            $del=$user->get($id);
            $del->delete();
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }

    //项目服务器维护
    public function getSerLevel(){
        $sql='select fastcode_code as id,fastcode_des as level from hsd_sys_fastcode where fastcode_group_id=4';
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function serverAdd(){
        $code=$_POST['code'];
        $des=$_POST['des'];
        $serverLevel=$_POST['serverLevel'];

        $ser=new HsdPrjSvr();
        Db::startTrans();
        try{
            $ser->prj_id=session('prjId');
            $ser->svr_code=$code;
            $ser->svr_des=$des;
            $ser->svr_level=$serverLevel;

            $ser->create_by=session('userId');
            $ser->last_updated_by=session('userId');

            $ser->save();
            Db::commit();
            echo 'y';

        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public function serverDel(){
        $arr=$_POST['data'];
        $id=$arr['prj_svr_id'];
        $svr=new HsdPrjSvr();
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
    public function getPrjSvr(){
        $sql='select prj_svr_id,svr_des,enable_flag from hsd_prj_svr where svr_level=\'SERVER\' and prj_id='.session('prjId');
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function getPrjClient(){
        $sql='select prj_svr_id,svr_des,hpsc.enable_flag,hpsc.server_id,hpsc.client_server_id from hsd_prj_svr hps LEFT JOIN hsd_prj_svr_client hpsc ON hps.prj_svr_id=hpsc.client_id
 where svr_level=\'CLIENT\' and prj_id= '.session('prjId').' and hps.enable_flag=\'Y\'';
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function svrSave(){
        $arr=$_POST['data'];
        $svr=new HsdPrjSvr();
        Db::startTrans();
        try{
            $svr->save(['enable_flag'=>$arr['enable_flag']],['prj_svr_id'=>$arr['prj_svr_id']]);
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public function clientSvrSave(){
        $arr=$_POST['data'];
        $clientSvr=new HsdPrjSvrClient();
        Db::startTrans();
        try{
            if($arr['client_server_id']){
                $clientSvr->save([
                    'client_id'  => $arr['prj_svr_id'],
                    'server_id' => $arr['server_id'],
                    'enable_flag' => $arr['enable_flag']

                ],['client_server_id' => $arr['client_server_id']]);

                Db::commit();
                echo 'y';
            }else{
                $clientSvr->client_id=$arr['prj_svr_id'];
                $clientSvr->server_id=$arr['server_id'];
                $clientSvr->enable_flag=$arr['enable_flag'];
                $clientSvr->save();
                Db::commit();
                echo 'y';
            }
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }

   //项目服务器用户分配
    public function getPrjAllSvr(){
       $sql='select prj_svr_id as id,svr_des as value from hsd_prj_svr where  prj_id='.session('prjId');
       $res=Db::query($sql);
       echo json_encode($res);
   }
    public function getPrjUser1(){
        $svr=$_POST['prjSvr'];
        $sql=' select hpu.prj_user_id,hpu.user_name from hsd_prj_user hpu where hpu.prj_id='.session('prjId').' and hpu.prj_user_id not in(select hpu.prj_user_id from hsd_prj_svr_user hpsu,hsd_prj_user hpu
where hpu.prj_user_id=hpsu.prj_user_id
and hpsu.prj_svr_id='.$svr.'
and hpu.prj_id='.session('prjId').');';
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function getPrjUser2(){
        $svr=$_POST['prjSvr'];
        $sql='select hpu.prj_user_id,hpu.user_name from hsd_prj_svr_user hpsu,hsd_prj_user hpu
where hpu.prj_user_id=hpsu.prj_user_id
and hpsu.prj_svr_id='.$svr.'
and hpu.prj_id='.session('prjId');
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function savePrjSvrUser(){

        //获取post数据
        $svrId=$_POST['svrId'];
        $insert=$_POST['Id'];
        $delete=$_POST['delId'];

//        $data=array();
//        for($k=0;$k<count($insert);$k++)
//        {
//            $data[$k]=array(
//                'menu_id'=>$insert[$k],
//            );
//        }

        $svrUser=new HsdPrjSvrUser();

        Db::startTrans();
        try{
            if($insert[0]!=='n'){
                //遍历新增
                foreach($insert as $i){
                    if($svrUser->get(['prj_svr_id'=>$svrId,'prj_user_id'=>$i])){
                        continue;
                    }else{
                        HsdPrjSvrUser::create([
                            'prj_svr_id'=>$svrId,
                            'prj_user_id'=>$i,
                            'create_by'=>session('userId'),
                            'last_updated_by'=>session('userId')]);
                        Db::commit();
                    }
                }
            }else{
                echo 'unselected';}
            //遍历删除
            if($delete[0]!=='n'){
                foreach($delete as $i){
                    if($svrUser->where('prj_svr_id',$svrId)->where('prj_user_id',$i)->find()){
                        HsdPrjSvrUser::destroy(['prj_svr_id'=>$svrId,'prj_user_id'=>$i]);
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

    //项目控制器维护
    public function getGroup(){
        $svrId=$_POST['svrId'];
//        $svrId=1;
        $sql='SELECT
	h1.prj_svr_line_id,
	h1.svr_line_des,
	h2.cell_id,
	h2.cell_des,
	h3.cell_group_id,
	h3.cell_group_des
FROM
	(
		hsd_prj_svr_line h1
		LEFT JOIN hsd_prj_svr_line_cell h2 ON h1.prj_svr_line_id = h2.prj_svr_line_id
	)
LEFT JOIN hsd_prj_svr_line_cell_group h3 ON h2.cell_id = h3.cell_id
WHERE
	h1.prj_svr_id = '.$svrId.'
ORDER BY
	h1.prj_svr_line_id,
	h2.cell_id,
	h3.cell_group_id';
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function getGroupData(){
        $groupId=$_POST['groupId'];
//        $groupId=1;
        $sql='select * from hsd_prj_svr_line_cell_group_data where cell_group_id='.$groupId;
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function getGroupDataNeeds(){
        $groupId=$_POST['groupId'];
        $sql1='select hscsb.ctr_series_block_id,CONCAT(hscb.ctr_brand_des,hscs.ctr_series_des,hscsb.block_des) as block_des from hsd_sys_ctr_series_block hscsb,
              hsd_sys_ctr_series hscs,
							hsd_sys_ctr_brand hscb
where hscsb.ctr_series_id=hscs.ctr_series_id and hscb.ctr_brand_id=hscs.ctr_brand_id';
        $res1=Db::query($sql1);
        $sql2='select datatype_id,datatype_des from hsd_sys_datatype';
        $res2=Db::query($sql2);
        $sql3='select datachange_type_id,datachange_des from hsd_sys_datachange_type ';
        $res3=Db::query($sql3);
        $sql4='select fastcode_id,fastcode_des from hsd_sys_fastcode hsf where hsf.fastcode_group_id=2 ';
        $res4=Db::query($sql4);
        $sql5='select t2.link_driver_field_id,t3.driver_field_des as des from
hsd_sys_ctr_series_module_driver_field t2,
hsd_sys_driver_field t3,
hsd_sys_driver t4,
hsd_prj_svr_line_cell_group_driver_field t5,
hsd_prj_svr_line_cell_group t6,
hsd_prj_svr_line_cell t7,
hsd_sys_ctr_series_module_driver t8
where
  t2.driver_field_id=t3.driver_field_id
and  t3.driver_id=t4.driver_id
and  t5.link_driver_field_id=t2.link_driver_field_id
and  t5.cell_group_id=t6.cell_group_id
and  t6.cell_id=t7.cell_id
and  t7.link_id=t8.link_id
and  t8.driver_id=t3.driver_id
and  t6.cell_group_id= '.$groupId;
        $res5=Db::query($sql5);
        $sql6='SELECT
	t2.ctr_series_module_field_id,
	t3.ctr_field_des
FROM
	hsd_sys_ctr_series_module_field t2,
	hsd_sys_ctr_field t3,
	hsd_sys_ctr_series_module t4
WHERE
	t4.ctr_series_module_id IN (
		SELECT DISTINCT
			ctr_series_module_id
		FROM
			hsd_sys_ctr_series_module_field
		WHERE
			ctr_series_module_field_id IN (
				SELECT DISTINCT
					ctr_series_module_field_id
				FROM
					hsd_prj_svr_line_cell_group_module_field
				WHERE
					cell_group_id = '.$groupId.'
			)
	)
AND t2.ctr_field_id = t3.ctr_field_id';
        $res6=Db::query($sql6);
        $res=array(
            "block"=>$res1,
            "dataType"=>$res2,
            "dataChange"=>$res3,
            "openCode"=>$res4,
            "field"=>$res5,
            "moduleField"=>$res6
        );
        $a=json_encode($res);
        echo $a;
    }
    public function groupDataInsert(){
        $arr=$_POST['data'];
        $svrId=$_POST['groupId'];


        $gData=new HsdPrjSvrLineCellGroupData();
        Db::startTrans();
        try{
            if($gData->where("data_code","=",$arr['data_code'])->find()){echo 'e';}else{
                $gData->cell_group_id=$svrId;
                $gData->data_code=$arr['data_code'];
                $gData->data_des=$arr['data_des'];
                $gData->ctr_series_block_id=$arr['ctr_series_block_id'];
                $gData->block_location=$arr['block_location'];
                $gData->start_address=$arr['start_address'];
                $gData->datatype_id=$arr['datatype_id'];
                $gData->datachange_type_id=$arr['datachange_type_id'];
                $gData->enable_flag=$arr['enable_flag'];
                $gData->oper_code=$arr['oper_code'];



                $gData->create_by=session('userId');
                $gData->last_updated_by=session('userId');

                $gData->save();
                Db::commit();
                echo 'y';}
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public function groupDataUpdate(){
        $arr=$_POST['data'];
        $groupId=$_POST['groupId'];
        $gData=new HsdPrjSvrLineCellGroupData();
        Db::startTrans();
        try{
            $gData->save([
                "cell_group_id"=>$groupId,
                "data_code"=>$arr['data_code'],
                "data_des"=>$arr['data_des'],
                "ctr_series_block_id"=>$arr['ctr_series_block_id'],
                "block_location"=>$arr['block_location'],
                "start_address"=>$arr['start_address'],

                "datatype_id"=>$arr['datatype_id'],
                "datachange_type_id"=>$arr['datachange_type_id'],
                "enable_flag"=>$arr['enable_flag'],
                "last_updated_by"=>session('userId'),
                "oper_code"=>$arr['oper_code']

            ],["tag_id"=>$arr['tag_id']]);
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public function groupDataDelete(){
        $arr=$_POST['data'];
        $id=$arr['tag_id'];
        $gData=new HsdPrjSvrLineCellGroupData();
        Db::startTrans();
        try{
            $del=$gData->get($id);
            $del->delete();
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }

    public function getGroupDriverField(){
        $groupId=$_POST['groupId'];
//        $groupId=1;
        $sql='select * from hsd_prj_svr_line_cell_group_driver_field where cell_group_id='.$groupId;
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function getAllDriverField(){
        $sql='select t1.cell_group_driver_field_id,CONCAT(t4.driver_des,t3.driver_field_des) as des from hsd_prj_svr_line_cell_group_driver_field t1,
hsd_sys_ctr_series_module_driver_field t2,hsd_sys_driver_field t3,hsd_sys_driver t4
where t1.link_driver_field_id=t2.link_driver_field_id
 and t2.driver_field_id=t3.driver_field_id
and  t3.driver_id=t4.driver_id';
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function groupDriverFieldInsert(){
        $arr=$_POST['data'];
        $groupId=$_POST['groupId'];

        $df=new HsdPrjSvrLineCellGroupDriverField();
        Db::startTrans();
        try{
            if($df->where("link_driver_field_id","=",$arr['link_driver_field_id'])->find()){echo 'e';}else{
                $df->cell_group_id=$groupId;
                $df->link_driver_field_id=$arr['link_driver_field_id'];
                $df->driver_field_value=$arr['driver_field_value'];
                $df->enable_flag=$arr['enable_flag'];


                $df->create_by=session('userId');
                $df->last_updated_by=session('userId');

                $df->save();
                Db::commit();
                echo 'y';}
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }

    }
    public function groupDriverFieldUpdate(){
        $arr=$_POST['data'];
        $groupId=$_POST['groupId'];
        $gData=new HsdPrjSvrLineCellGroupDriverField();
        Db::startTrans();
        try{
            $gData->save([
                "cell_group_id"=>$groupId,
                "link_driver_field_id"=>$arr['link_driver_field_id'],
                "driver_field_value"=>$arr['driver_field_value'],
                "enable_flag"=>$arr['enable_flag'],
                "last_updated_by"=>session('userId')

            ],["cell_group_driver_field_id"=>$arr['cell_group_driver_field_id']]);
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public function groupDriverFieldDelete(){
        $arr=$_POST['data'];
        $id=$arr['cell_group_driver_field_id'];
        $gData=new HsdPrjSvrLineCellGroupDriverField();
        Db::startTrans();
        try{
            $del=$gData->get($id);
            $del->delete();
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }

    //group 下通讯字段维护
    public function getGroupModuleField(){
//        $groupId=$_POST['groupId'];
        $groupId=1;
        $sql='select * from hsd_prj_svr_line_cell_group_module_field where cell_group_id='.$groupId;
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function groupModuleFieldInsert(){
        $arr=$_POST['data'];
        $groupId=$_POST['groupId'];

        $df=new HsdPrjSvrLineCellGroupModuleField();
        Db::startTrans();
        try{
            if($df->where("ctr_series_module_field_id","=",$arr['ctr_series_module_field_id'])->find()){echo 'e';}else{
                $df->cell_group_id=$groupId;
                $df->ctr_series_module_field_id=$arr['ctr_series_module_field_id'];
                $df->cell_module_field_value=$arr['cell_module_field_value'];
                $df->enable_flag=$arr['enable_flag'];


                $df->create_by=session('userId');
                $df->last_updated_by=session('userId');

                $df->save();
                Db::commit();
                echo 'y';}
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public function groupModuleFieldUpdate(){

        $arr=$_POST['data'];
        $groupId=$_POST['groupId'];
        $gData=new HsdPrjSvrLineCellGroupModuleField();
        Db::startTrans();
        try{
            $gData->save([
                "cell_group_id"=>$groupId,
                "ctr_series_module_field_id"=>$arr['ctr_series_module_field_id'],
                "cell_module_field_value"=>$arr['cell_module_field_value'],
                "enable_flag"=>$arr['enable_flag'],
                "last_updated_by"=>session('userId')

            ],["cell_group_module_field_id"=>$arr['cell_group_module_field_id']]);
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public function groupModuleFieldDelete(){
        $arr=$_POST['data'];
        $id=$arr['cell_group_module_field_id'];
        $gData=new HsdPrjSvrLineCellGroupModuleField();
        Db::startTrans();
        try{
            $del=$gData->get($id);
            $del->delete();
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }

    //测试函数
    public function doubleList(){}
    public function addSvrLine(){
        $svrId=$_POST['svrId'];
        $lineCode=$_POST['lineCode'];
        $lineDes=$_POST['lineDes'];

        $line=new HsdPrjSvrLine();
        Db::startTrans();
        try{
            $line->prj_svr_id=$svrId;
            $line->svr_line_code=$lineCode;
            $line->svr_line_des=$lineDes;
            $line->create_by=session('userId');
            $line->last_updated_by=session('userId');
            if($line->where('svr_line_code','=',$lineCode)->find())
            {echo 'e';}else{
            $line->save();
            Db::commit();
            echo 'y';}
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }

    }
    public function addSvrLineCell(){
        $lineId=$_POST['lineId'];
        $linkId=$_POST['linkId'];

        $cellCode=$_POST['cellCode'];
        $cellDes=$_POST['cellDes'];

        $cell=new HsdPrjSvrLineCell();

        Db::startTrans();
        try{
            if($cell->where('cell_code','=',$cellCode)->where('prj_svr_line_id','=',$lineId)->find()){echo 'e';}
            else{
            $cell->prj_svr_line_id=$lineId;
            $cell->link_id=$linkId;
            $cell->cell_code=$cellCode;
            $cell->cell_des=$cellDes;

            $cell->save();
            Db::commit();
            echo 'y';}
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }

    }
    public function addSvrLineCellGroup(){
        $cellId=$_POST['cellId'];
        $groupCode=$_POST['groupCode'];
        $groupDes=$_POST['groupDes'];
        Db::startTrans();
        $group=new HsdPrjSvrLineCellGroup();
        try{
            $group->cell_id=$cellId;
            $group->cell_group_code=$groupCode;
            $group->cell_group_des=$groupDes;
            $group->create_by=session('userId');
            $group->last_updated_by=session('userId');
            if($group->where('cell_group_code','=',$groupCode)->where('cell_id','=',$cellId)->find())
            {echo 'e';}else{
                $group->save();
                Db::commit();
                echo 'y';}
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public function deleteSvrLineCellGroup(){
        $groupId=$_POST['groupId'];
        $group=new HsdPrjSvrLineCellGroup();
        Db::startTrans();
        try{
            $del=$group->get($groupId);
            $del->delete();
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }

    }

    //新增cell对应级联
    public function selectBrand(){
        $sql='SELECT DISTINCT
	t1.ctr_brand_id,
	t1.ctr_brand_des
FROM
	hsd_sys_ctr_brand t1
LEFT JOIN hsd_sys_ctr_series t2 ON t1.ctr_brand_id = t2.ctr_brand_id,
 hsd_sys_ctr_series r2
LEFT JOIN hsd_sys_ctr_series_module t3 ON r2.ctr_series_id = t3.ctr_series_id,
 hsd_sys_ctr_series_module r3
LEFT JOIN hsd_sys_ctr_series_module_driver t4 ON r3.ctr_series_module_id = t4.ctr_series_module_id
WHERE
	t4.link_id IN (
		SELECT
			link_id
		FROM
			hsd_prj_link
		WHERE
			prj_id = '.session('prjId').'
	)
AND t1.ctr_brand_id = t2.ctr_brand_id
AND t3.ctr_series_module_id = t4.ctr_series_module_id;';
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function selectSeries(){
        $brandId=$_POST['brandId'];
        $sql='SELECT DISTINCT
	t2.ctr_series_id,
	t2.ctr_series_des
FROM
	hsd_sys_ctr_brand t1
LEFT JOIN hsd_sys_ctr_series t2 ON t1.ctr_brand_id = t2.ctr_brand_id,
 hsd_sys_ctr_series r2
LEFT JOIN hsd_sys_ctr_series_module t3 ON r2.ctr_series_id = t3.ctr_series_id,
 hsd_sys_ctr_series_module r3
LEFT JOIN hsd_sys_ctr_series_module_driver t4 ON r3.ctr_series_module_id = t4.ctr_series_module_id
WHERE
	t4.link_id IN (
		SELECT
			link_id
		FROM
			hsd_prj_link
		WHERE
			prj_id = '.session('prjId').'
	)
AND t1.ctr_brand_id = t2.ctr_brand_id
AND t2.ctr_series_id = t3.ctr_series_id
AND t3.ctr_series_module_id = t4.ctr_series_module_id
AND t2.ctr_brand_id = '.$brandId;
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function selectModule(){
        $seriesId=$_POST['seriesId'];
        $sql='SELECT DISTINCT
	t3.ctr_series_module_id,
	t5.ctr_module_des
FROM
	hsd_sys_ctr_series_module t3
LEFT JOIN hsd_sys_ctr_series_module_driver t4 ON t3.ctr_series_module_id = t4.ctr_series_module_id,
 hsd_sys_ctr_module t5
WHERE
	t4.link_id IN (
		SELECT
			link_id
		FROM
			hsd_prj_link
		WHERE
			prj_id = '.session('prjId').'
	)
AND t3.ctr_series_module_id = t4.ctr_series_module_id
AND t5.ctr_module_id = t3.ctr_module_id
AND t3.ctr_series_id = '.$seriesId;
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function selectDriver(){
        $csmId=$_POST['csmId'];
        $sql='SELECT DISTINCT
	t4.link_id,
	t6.driver_des
FROM
	hsd_sys_ctr_series_module t3
LEFT JOIN hsd_sys_ctr_series_module_driver t4 ON t3.ctr_series_module_id = t4.ctr_series_module_id,
 hsd_sys_driver t6
WHERE
	t4.link_id IN (
		SELECT
			link_id
		FROM
			hsd_prj_link
		WHERE
			prj_id = '.session('prjId').'
	)
AND t3.ctr_series_module_id = t4.ctr_series_module_id
AND t4.driver_id = t6.driver_id
AND t4.ctr_series_module_id = '.$csmId;
        $res=Db::query($sql);
        echo json_encode($res);
    }

    //cell属性操作
    public function selectCellAttr(){
        $cellId=$_POST['cellId'];
//        $cellId=1;
        $sql='SELECT
	t3.ctr_series_module_attr_id,t4.ctr_module_attr_des
FROM
	hsd_sys_ctr_series_module_attr t3,hsd_sys_ctr_module_attr t4
WHERE
  t3.ctr_module_attr_id=t4.ctr_module_attr_id
and
	ctr_series_module_id IN (select t2.ctr_series_module_id from hsd_prj_svr_line_cell t1,hsd_sys_ctr_series_module_driver t2
where t1.link_id=t2.link_id
and cell_id='.$cellId.')';
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function cellAttrQuery(){
        $cellId=$_POST['cellId'];
//        $cellId=1;
        $sql='select * from hsd_prj_svr_line_cell_module_attr where cell_id='.$cellId;
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function cellAttrInsert(){
        $arr=$_POST['data'];
        $cellId=$_POST['cellId'];

        $cellAttr=new HsdPrjSvrLineCellModuleAttr();
        Db::startTrans();
        try{
            if($cellAttr->where("ctr_series_module_attr_id","=",$arr['ctr_series_module_attr_id'])->find()){echo 'e';}else{
                $cellAttr->cell_id=$cellId;
                $cellAttr->ctr_series_module_attr_id=$arr['ctr_series_module_attr_id'];
                $cellAttr->cell_module_attr_value=$arr['cell_module_attr_value'];
                $cellAttr->enable_flag=$arr['enable_flag'];
                $cellAttr->create_by=session('userId');
                $cellAttr->last_updated_by=session('userId');

                $cellAttr->save();
                Db::commit();
                echo 'y';}
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }

    }
    public function cellAttrUpdate(){
        $arr=$_POST['data'];
        $cellId=$_POST['cellId'];
        $gData=new HsdPrjSvrLineCellModuleAttr();
        Db::startTrans();
        try{
            $gData->save([
                "cell_id"=>$cellId,
                "ctr_series_module_attr_id"=>$arr['ctr_series_module_attr_id'],
                "cell_module_attr_value"=>$arr['cell_module_attr_value'],
                "enable_flag"=>$arr['enable_flag'],
                "last_updated_by"=>session('userId'),


            ],["cell_module_attr_id"=>$arr['cell_module_attr_id']]);
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public function cellAttrDelete(){
        $arr=$_POST['data'];
        $id=$arr['cell_module_attr_id'];
        $gData=new HsdPrjSvrLineCellModuleAttr();
        Db::startTrans();
        try{
            $del=$gData->get($id);
            $del->delete();
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }

}