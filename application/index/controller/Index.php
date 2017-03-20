<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\common\model\HsdPrjUser;
use app\common\model\HsdSysLogin;
class Index extends Controller
{


    public $menu1;
    //登入界面和一系列跳转
    public function index()
    {
        return $this->fetch('login');
    }
    public function prj(){
        return $this->fetch('index2');
    }
    public function sysMenu(){

        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('sys_menu');
    }
    public function prjMenuAllot(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('menu_allot');
    }
    public function prjDriverAllot(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('driver_allot');
    }
    public function fastCode(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('fast_code');
    }
    public function eventType(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('event_type');
    }
    public function serverField(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('server_field');
    }
    public function fileManage(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('file_manage');
    }
    public function fileUpload(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('file_upload');
    }
    public function driverManage(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('driver_manage');
    }
    public function driverUpload(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('driver_upload');
    }
    public function dataTransfer(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('data_transfer');
    }
    public function dataType(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('data_type');
    }
    public function ctrField(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('ctr_field');
    }
    public function comModule(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('com_module');
    }
    public function ctrSeries(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('ctr_series');
    }
    public function ctrRw(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('ctr_rw');
    }
    public function crlDefault(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('ctr_default');
    }
    public function ctrComModule(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('ctr_com_module');
    }
    public function ctrProtocol(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('ctr_protocol');
    }
    public function ctrMm(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('ctr_mm');
    }
    public function sysLog(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('sys_log');
    }
    public function eventQuery(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('event_query');
    }
    public function downloadQuery(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('download_query');
    }
    public function prjRole(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('prj_role');
    }
    public function prjRoleMenu(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('prj_role_menu');
    }
    public function prjUser(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('prj_user');
    }
    public function prjServer(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('ctr_server');
    }
    public function prjSerUser(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('prj_ser_user');
    }
    public function prjCtr(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('prj_ctr');
    }
    public function userAdvice(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('user_advice');
    }
    public function prjCtrAnaly(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('prj_ctr_analy');
    }
    public function prjUserLoginQuery(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('prj_user_login_query');
    }
    public function prjEventQuery(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('ctr_event_query');
    }
    public function downQuery(){
        //拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
        //模板渲染
        return $this->fetch('down_query');
    }






    public function showMenu(){

    }
    public function toIndex(){
        return $this->fetch('index');
    }
    public function login(){
//拼接sql
        $sql1="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=1
                        and   hpu.user_name='".session('userName')."'";
        $sql2="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=2
                        and   hpu.user_name='".session('userName')."'";
        $sql3="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=3
                        and   hpu.user_name='".session('userName')."'";
        $sql4="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=4
                        and   hpu.user_name='".session('userName')."'";
        $sql5="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=5
                        and   hpu.user_name='".session('userName')."'";
        $sql6="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des,hsmm.menu_url
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hsm.module_id=6
                        and   hpu.user_name='".session('userName')."'";
        $sqlModule="select hpu.prj_user_id,hpu.user_name,hsm.module_des,hsmm.menu_des
                         from hsd_prj_menu hpm,
                              hsd_prj_role hpr,
                              hsd_prj_role_menu hprm,
                              hsd_prj_user hpu,
                              hsd_prj_user_role hpur,
                              hsd_sys_module_menu hsmm,
                              hsd_sys_module hsm
                        where hpm.prj_menu_id=hprm.prj_menu_id
                        and   hpr.prj_role_id=hprm.prj_role_id
                        and   hpr.prj_role_id=hpur.prj_role_id
                        and   hpu.prj_user_id=hpur.prj_user_id
                        and   hpm.menu_id=hsmm.menu_id
                        and   hsm.module_id=hsmm.module_id
                        and   hpu.user_name='".session('userName')."'";
//执行查询
        $menu1=Db::query($sql1);
        $menu2=Db::query($sql2);
        $menu3=Db::query($sql3);
        $menu4=Db::query($sql4);
        $menu5=Db::query($sql5);
        $menu6=Db::query($sql6);

//向模板传值
        $this->assign('menu1',$menu1);
        $this->assign('menu2',$menu2);
        $this->assign('menu3',$menu3);
        $this->assign('menu4',$menu4);
        $this->assign('menu5',$menu5);
        $this->assign('menu6',$menu6);
  //模板渲染
       return $this->fetch('index');
    }
    public function logout(){
        session('userId',null);
        session('userName',null);
        return $this->fetch('login');
    }
    public function ajaxPrj(){
        $sql="select hp.prj_id,hp.prj_code,hp.prj_des,hp.enable_flag from hsd_prj hp";
        $res=Db::query($sql);
        echo json_encode($res);
    }
    public function recordLog(){

        static $ip=null;
        $ip=$this->request->ip();
        $login_by=session('userId');

        $loginRecord=new HsdSysLogin();
        $loginRecord->login_ip=$ip;
        $loginRecord->login_by=$login_by;
//        var_dump($loginRecord);
//        $loginRecord->save();
        Db::startTrans();
        try{
            $loginRecord->isUpdate(false)->save();
            Db::commit();
            echo 'y';
        }catch(\Exception $e){
            Db::rollback();
            echo 'n';
        }
//        echo $ip;
    }
    public function loginCheck(){

        $userName=$_POST['userName'];
        $passWord=$_POST['passWord'];

        if(HsdPrjUser::login($userName,$passWord)){



           if( $this->recordLog()){
               echo "y";
           }

        }else echo "n";
    }
    public function mm(){
        echo HsdPrjUser::encryptPassword('12345678');
    }
    public function ajax(){
        $sql="select *FROM hsd_prj hp";
        $hp=Db::query($sql);

        if(!empty($hp)){
//            var_dump($hp);
            echo json_encode($hp);
        }
        else echo 'n';
    }
    public function uid(){
        $sql="select * from config_info CI";
        $conf=Db::query($sql);
        if(!empty($sql)){
            echo json_encode($conf);
        }
        else echo "n";
    }
    public  function test2(){
        $sql="select hpu.prj_id,hpu.prj_user_id,hpu.user_name   from hsd_prj_user hpu";

        $res=Db::query($sql);

        if(!empty($res)){
            echo json_encode($res);
        }
        else echo"n";
    }
}