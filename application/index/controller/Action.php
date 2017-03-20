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

class Action extends Controller
{

    public function index(){
        echo '测试成功';
    }
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

//        var_dump($arr);
//        $prj=new HsdPrj();
//
//
//
//        $id=$prj->get(2);
//         var_dump($id);
    }
}