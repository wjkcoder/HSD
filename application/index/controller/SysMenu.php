<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/17
 * Time: 10:57
 */

namespace app\index\controller;

use think\Controller;
use think\Db;
use app\common\model\HsdSysModuleMenu;
class Sysmenu extends Controller
{
    public function index()
    {
        echo '测试成功';
    }

    //sysmenu 后台实现增删改查
    public function insert()
    {
    }

    public function query()
    {
        $sql = 'SELECT
                    hsmm.menu_id,
                    hsm.module_id,
                    hsm.module_des,
                    hsmm.menu_code,
                    hsmm.menu_des,
                  hsmm.enable_flag,
                    hsmm.menu_url
                FROM
                    hsd_sys_module_menu hsmm,
                    hsd_sys_module hsm
                WHERE
                    hsmm.module_id = hsm.module_id';
        $res = Db::query($sql);

        echo json_encode($res);
    }

    public function delete()
    {
        $prjId = $_POST['id'];
//        $prjId=35;

        $sql = " DELETE  from hsd_sys_module_menu where menu_id=" . $prjId;
        Db::startTrans();
        try {
            Db::execute($sql);
            Db::commit();
            echo 'y';
        } catch (\Exception $e) {
            Db::rollback();
            echo 'n';
        }
    }

    public function save()
    {
        $menu = new HsdSysModuleMenu();
        $arr = $_POST['data'];
        Db::startTrans();
        try {
            foreach ($arr as $i) {
                if ($menu->get($i['menu_id'])) {
                    $menu->data($i, true)->isUpdate(true)->save();
                } else {

                    $menu->menu_id = $i['prj_id'];
                    $menu->module_id = $i['module_id'];
                    $menu->menu_code = $i['menu_code'];
                    $menu->enable_flag = $i['enable_flag'];
                    $menu->menu_url = $i['menu_url'];

                    $menu->create_by = session('userId');
                    $menu->last_updated_by = session('userId');

                    $menu->isUpdate(false)->save();
//                    Db::commit();
                }
            }
            Db::commit();
            echo 'y';
        } catch (\Exception $e) {
            Db::rollback();
            echo 'n';
        }
    }
}