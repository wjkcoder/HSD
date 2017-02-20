<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller
{
    //登入界面
    public function index()
    {
        return $this->fetch('index2');
    }
}