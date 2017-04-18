<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/27
 * Time: 16:43
 */

namespace app\index\controller;

use  app\common\model\HsdPrjUser;
use app\common\model\HsdSysCtrBrand;
use app\common\model\HsdSysCtrField;
use app\common\model\HsdSysCtrModule;
use app\common\model\HsdSysCtrModuleAttr;
use app\common\model\HsdSysCtrSeries;
use app\common\model\HsdSysCtrSeriesBlock;
use app\common\model\HsdSysCtrSeriesModule;
use app\common\model\HsdSysCtrSeriesModuleAttr;
use app\common\model\HsdSysCtrSeriesModuleField;
use app\common\model\HsdSysDatatype;
use think\Controller;
use think\Db;
use think\Model;
use app\common\model\HsdSysDatachangeType;
class Sysctraction extends Controller
{
    public function index(){
        echo '12345';
    }

    //数据转换定义
    public function dataChangeQuery(){
        $sql='select datachange_type_id,datachange_code,datachange_des,enable_flag from hsd_sys_datachange_type';
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function dataChangeInsert(){
        $arr=$_POST['data'];
        $datachange=new HsdSysDatachangeType();

        Db::startTrans();
        try{
            if($datachange->where("datachange_code","=",$arr['datachange_code'])->find()){
                echo 'e';
            }else{
//                $event->event_type_id='';
                $datachange->datachange_code=$arr['datachange_code'];
                $datachange->datachange_des=$arr['datachange_des'];
                $datachange->enable_flag=$arr['enable_flag'];

                $datachange->create_by=session('userId');
                $datachange->last_updated_by=session('userId');

                $datachange->save();
                Db::commit();
                echo 'y';
            }

        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public function dataChangeUpdate(){
        $arr=$_POST['data'];
        $datachange=new HsdSysDatachangeType();
        Db::startTrans();
        try{
            $datachange->save(
                [
                    'datachange_code'=>$arr['datachange_code'],
                    'datachange_des'=>$arr['datachange_des'],
                    'enable_flag' => $arr['enable_flag'],

                    'create_by'=>session('userId'),
                    'last_updated_by'=>session('userId')
                ],['datachange_type_id'=>$arr['datachange_type_id']]);
            Db::commit();
            echo 'y';
        }catch(\Exception $e ){
            Db::rollback();
            echo 'n';
        };
    }
    public function dataChangeDelete(){
        $arr=$_POST['data'];
        $id=$arr['datachange_type_id'];

        $datachange=new HsdSysDatachangeType();
        Db::startTrans();
        try{
            $del=$datachange->get($id);
            $del->delete();
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }

    //数据类型维护

    public function dataTypeQuery(){
        $sql="select * from hsd_sys_datatype";
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function dataTypeInsert(){

        $arr=$_POST['data'];
        $dataType=new HsdSysDatatype();
        Db::startTrans();
        try{
            if($dataType->where("datatype_code","=",$arr['datatype_code'])->find()){
                echo 'e';
            }else{
//                $event->event_type_id='';
                $dataType->datatype_code=$arr['datatype_code'];
                $dataType->datatype_des=$arr['datatype_des'];
                $dataType->enable_flag=$arr['enable_flag'];


                $dataType->save();
                Db::commit();
                echo 'y';
            }

        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }

    }
    public function dataTypeUpdate(){
        $arr=$_POST['data'];
        $dataType=new HsdSysDatatype();
        Db::startTrans();
        try{
            $dataType->save(
                [
                    'datatype_code'=>$arr['datatype_code'],
                    'datatype_des'=>$arr['datatype_des'],
                    'enable_flag' => $arr['enable_flag']
                ],['datatype_id'=>$arr['datatype_id']]);
            Db::commit();
            echo 'y';
        }catch(\Exception $e ){
            Db::rollback();
            echo 'n';
        };
    }
    public function dataTypeDelete(){
        $arr=$_POST['data'];
        $id=$arr['datatype_id'];

        $dataType=new HsdSysDatatype();
        Db::startTrans();
        try{
            $del=$dataType->get($id);
            $del->delete();
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }


    //控制器字段维护
    public  function ctrFieldQuery(){
        $sql='select ctr_field_id,ctr_field_code,ctr_field_des,enable_flag from hsd_sys_ctr_field';
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public  function ctrFieldInsert(){
        $arr=$_POST['data'];
        $ctrField= new HsdSysCtrField();
        Db::startTrans();
        try{
            if($ctrField->where("ctr_field_code","=",$arr['ctr_field_code'])->find()){
                //主键约束
                echo 'e';
            }else{
                $ctrField->ctr_field_code=$arr['ctr_field_code'];
                $ctrField->ctr_field_des=$arr['ctr_field_des'];
                $ctrField->enable_flag=$arr['enable_flag'];

                $ctrField->create_by=session('userId');
                $ctrField->last_updated_by=session('userId');

                $ctrField->save();
                Db::commit();
                echo 'y';
            }
        }catch(\Exception $e){
            Db::rollback();echo 'n';}
    }
    public  function ctrFieldUpdate(){
        $arr=$_POST['data'];
        $ctrField=new HsdSysCtrField();
        Db::startTrans();
        try{
            $ctrField->save([
               'ctr_field_code'=>$arr['ctr_field_code'],
                'ctr_field_des'=>$arr['ctr_field_des'],
                'enable_flag'=>$arr['enable_flag']
            ],['ctr_field_id'=>$arr['ctr_field_id']]);

            Db::commit();
            echo 'y';

        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public  function ctrFieldDelete(){
        $arr=$_POST['data'];
        $id=$arr['ctr_field_id'];
        Db::startTrans();
        $ctrField=new HsdSysCtrField();
        try{
            $del=$ctrField->get($id);
            if($del){
                $del->delete();
                Db::commit();
                echo 'y';
            }else echo 'ne';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }

    //通讯模块
    public function ctrModuleQuery(){
        $sql='select ctr_module_id id,ctr_module_des value from hsd_sys_ctr_module';
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function ctrModuleInsert(){
        $code=$_POST['code'];
        $des=$_POST['des'];

        Db::startTrans();
        $ctrModule=new HsdSysCtrModule();
        try{
            if($ctrModule->where("ctr_module_code","=",$code)->find()){
                    echo 'e';
            }else{
                $ctrModule->ctr_module_code=$code;
                $ctrModule->ctr_module_des=$des;

                $ctrModule->create_by=session('userId');
                $ctrModule->last_updated_by=session('userId');
                $ctrModule->save();
                Db::commit();
                echo 'y';
            }
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }

    }

    //通讯模块属性维护
    public function moduleAttrQuery(){
        $sql='select ctr_module_attr_id,ctr_module_id,ctr_module_attr_code,ctr_module_attr_des,enable_flag from hsd_sys_ctr_module_attr';
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function moduleAttrInsert(){
        $arr=$_POST['data'];
        $moduleAttr= new HsdSysCtrModuleAttr();
        try{
            if($moduleAttr->where("ctr_module_attr_code","=",$arr['ctr_module_attr_code'])->find()){
                //主键约束
                echo 'e';
            }else{
                $moduleAttr->ctr_module_id=$arr['ctr_module_id'];
                $moduleAttr->ctr_module_attr_code=$arr['ctr_module_attr_code'];
                $moduleAttr->ctr_module_attr_des=$arr['ctr_module_attr_des'];
                $moduleAttr->enable_flag=$arr['enable_flag'];

                $moduleAttr->create_by=session('userId');
                $moduleAttr->last_updated_by=session('userId');

                $moduleAttr->save();
                Db::commit();
                echo 'y';
            }
        }catch(\Exception $e){
            Db::rollback();echo 'n';}
    }
    public function moduleAttrUpdate(){
        $arr=$_POST['data'];
        $moduleAttr=new HsdSysCtrModuleAttr();

        try{
            $moduleAttr->save([
                'ctr_module_id'=>$arr['ctr_module_id'],
                'ctr_module_attr_code'=>$arr['ctr_module_attr_code'],
                'ctr_module_attr_des'=>$arr['ctr_module_attr_des'],
                'enable_flag'=>$arr['enable_flag']
            ],['ctr_module_attr_id'=>$arr['ctr_module_attr_id']]);
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public function moduleAttrDelete(){
        $arr=$_POST['data'];
        $id=$arr['ctr_module_attr_id'];

        $moduleAttr=new HsdSysCtrModuleAttr();
        try{
            $del=$moduleAttr->get($id);
            if($del){
                $del->delete();
                Db::commit();
                echo 'y';
            }else echo 'ne';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }

   //控制器品牌维护
    public function ctrBrandQuery(){
        $sql='select ctr_brand_id as id,ctr_brand_des as value from hsd_sys_ctr_brand';
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function ctrBrandInsert(){
        $code=$_POST['code'];
        $des=$_POST['des'];

        $ctrBrand=new HsdSysCtrBrand();
        try{
            if($ctrBrand->where("ctr_brand_code","=",$code)->find()){
                echo 'e';
            }else{
                $ctrBrand->ctr_brand_code=$code;
                $ctrBrand->ctr_brand_des=$des;

                $ctrBrand->create_by=session('userId');
                $ctrBrand->last_updated_by=session('userId');
                $ctrBrand->save();
                Db::commit();
                echo 'y';
            }
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }

    //控制器系列维护
    public function getSeries(){
        $sql='select ctr_series_id as id,ctr_series_des as value from hsd_sys_ctr_series';
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function ctrSeriesQuery(){
        $sql='select ctr_series_id,ctr_brand_id,ctr_series_code,ctr_series_des,enable_flag from hsd_sys_ctr_series';
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function ctrSeriesInsert(){
        $arr=$_POST['data'];
        $ctrSeries=new HsdSysCtrSeries();

        try{
            $ctrSeries->ctr_brand_id=$arr['ctr_brand_id'];
            $ctrSeries->ctr_series_code=$arr['ctr_series_code'];
            $ctrSeries->ctr_series_des=$arr['ctr_series_des'];
            $ctrSeries->enable_flag=$arr['enable_flag'];

            $ctrSeries->create_by=session('userId');
            $ctrSeries->last_updated_by=session('userId');

            $ctrSeries->save();
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public function ctrSeriesUpdate(){
        $arr=$_POST['data'];
        $ctrSeries=new HsdSysCtrSeries();

        try{
            $ctrSeries->save([
                'ctr_brand_id'=>$arr['ctr_brand_id'],
                'ctr_series_code'=>$arr['ctr_series_code'],
                'ctr_series_des'=>$arr['ctr_series_des'],
                'enable_flag'=>$arr['enable_flag']
            ],['ctr_series_id'=>$arr['ctr_series_id']]);
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public function ctrSeiresDelete(){
        $arr=$_POST['data'];
        $id=$arr['ctr_series_id'];

        $ctrSeries=new HsdSysCtrSeries();
        try{
            $del=$ctrSeries->get($id);
            if($del){
                $del->delete();
                Db::commit();
                echo 'y';
            }else echo 'ne';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }

  //控制器读写区域维护
    public function rwQuery(){
        $sql='select * from hsd_sys_ctr_series_block';
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function rwInsert(){
        $arr=$_POST['data'];
        $rw=new HsdSysCtrSeriesBlock();

        try{
            if($rw->where("block_code","=",$arr['block_code'])->find())
            {echo 'e';}else{
                $rw->ctr_series_id=$arr['ctr_series_id'];
                $rw->block_code=$arr['block_code'];
                $rw->block_des=$arr['block_des'];
                $rw->enable_flag=$arr['enable_flag'];

                $rw->create_by=session('userId');
                $rw->last_updated_by=session('userId');

                $rw->save();
                Db::commit();
                echo 'y' ;
            }
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }
    public function rwDelete(){
        $arr=$_POST['data'];
        $id=$arr['ctr_series_block_id'];

        $rw=new HsdSysCtrSeriesBlock();
        Db::startTrans();
        try{
            $del=$rw->get($id);
            $del->delete();
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }

    }
    public function rwUpdate(){
        $arr=$_POST['data'];
        $rw=new HsdSysCtrSeriesBlock();

        try{
            $rw->save([
                'ctr_series_id'=>$arr['ctr_series_id'],
                'block_code'=>$arr['block_code'],
                'block_des'=>$arr['block_des'],
                'enable_flag'=>$arr['enable_flag']
            ],['ctr_series_block_id'=>$arr['ctr_series_block_id']]);
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }

  //控制系默认字段维护
    public function ctrDefaulQuery(){
        $sql='SELECT
  hscsmf.ctr_series_module_field_id,
  hscsmf.ctr_series_module_id,
  hscsmf.ctr_field_id,
	hscb.ctr_brand_des,
	hscs.ctr_series_des,
	hscm.ctr_module_des,
	hscf.ctr_field_des,
	hscsmf.ctr_field_default_val,
  hscsmf.enable_flag
FROM
	hsd_sys_ctr_brand hscb,
	hsd_sys_ctr_series hscs,
	hsd_sys_ctr_module hscm,
	hsd_sys_ctr_series_module hscsm,
	hsd_sys_ctr_field hscf,
	hsd_sys_ctr_series_module_field hscsmf
WHERE
	hscb.ctr_brand_id = hscs.ctr_brand_id
AND hscs.ctr_series_id = hscsm.ctr_series_id
AND hscm.ctr_module_id = hscsm.ctr_module_id
AND hscf.ctr_field_id = hscsmf.ctr_field_id
AND hscsm.ctr_series_module_id = hscsmf.ctr_series_module_id';
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function ctrDefaultSave(){
        $arr=$_POST['data'];
        $ctrDefault=new HsdSysCtrSeriesModuleField();

        Db::startTrans();
        try{
            $ctrDefault->save(["ctr_field_default_val"=>$arr['ctr_field_default_val'],
            "enable_flag"=>$arr['enable_flag'],
            "create_by"=>session('userId'),
            "last_updated_by"=>session('userId')],["ctr_series_module_field_id"=>$arr['ctr_series_module_field_id']]);

            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }

    //控制器通讯模块维护
    public function ctrComModuleQuery(){
        $sql='SELECT
	hscb.ctr_brand_des,
	hscs.ctr_series_des,
	hscm.ctr_module_des,
	hscma.ctr_module_attr_des,
	hscsma.attr_default_value,
	hscsma.ctr_module_attr_id,
	hscsma.ctr_series_module_attr_id,
	hscsma.ctr_series_module_id,
	hscsma.enable_flag
FROM
	hsd_sys_ctr_brand hscb,
	hsd_sys_ctr_series hscs,
	hsd_sys_ctr_module hscm,
	hsd_sys_ctr_series_module hscsm,
	hsd_sys_ctr_module_attr hscma,
	hsd_sys_ctr_series_module_attr hscsma
WHERE
	hscb.ctr_brand_id = hscs.ctr_brand_id
AND hscs.ctr_series_id = hscsm.ctr_series_id
AND hscm.ctr_module_id = hscsm.ctr_module_id
AND hscsm.ctr_series_module_id = hscsma.ctr_series_module_id
AND hscsma.ctr_module_attr_id = hscma.ctr_module_attr_id';
        $res=Db::query($sql);
        echo  json_encode($res);
    }
    public function ctrComModuleSave(){
        $arr=$_POST['data'];
        $ctrComModule=new HsdSysCtrSeriesModuleAttr();

        Db::startTrans();
        try{
            $ctrComModule->save(["attr_default_value"=>$arr['attr_default_value'],
                "enable_flag"=>$arr['enable_flag'],
                "create_by"=>session('userId'),
                "last_updated_by"=>session('userId')],["ctr_series_module_attr_id"=>$arr['ctr_series_module_attr_id']]);

            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }

    //选择通讯方式
    public function getModule(){
        $sql='select ctr_module_id as id,ctr_module_des as value from hsd_sys_ctr_module';
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function ctrSeriesModuleQuery(){
        $sql='select hscb.ctr_brand_des,
hscs.ctr_series_des,
hscsm.ctr_series_module_id ,
hscs.ctr_series_id,
hscm.ctr_module_id
from
hsd_sys_ctr_brand hscb
,hsd_sys_ctr_series hscs
,hsd_sys_ctr_series_module hscsm
,hsd_sys_ctr_module hscm
WHERE
hscb.ctr_brand_id=hscs.ctr_brand_id
and hscs.ctr_series_id=hscsm.ctr_series_id
and hscsm.ctr_module_id=hscm.ctr_module_id';
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function ctrSeriesModuleSave(){
        $arr=$_POST['data'];
        $cSM=new HsdSysCtrSeriesModule();

        Db::startTrans();
        try{
            $cSM->save(["ctr_module_id"=>$arr['ctr_module_id'],
//                "enable_flag"=>$arr['enable_flag'],
                "create_by"=>session('userId'),
                "last_updated_by"=>session('userId')],["ctr_series_module_id"=>$arr['ctr_series_module_id']]);

            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
    }

    //获得加密后的密码
    public function getMM(){
        echo HsdPrjUser::encryptPassword(123456);
    }
}