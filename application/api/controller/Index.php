<?php
namespace app\api\controller;
use think\Controller;
use think\Db;

class Index extends Common
{
    public function index()
    {
        //幻灯片(不涉及token验证，可对外公开)
        $banner = Db::name('ad')->where('type',0)->order('sort desc')->limit(6)->cache(7200)->select();
        //广告
        $ad = Db::name('ad')->where('type',1)->order('sort desc')->limit(4)->cache(7200)->select();

        exit(json_encode(['code'=>200, 'msg'=>'首页数据获取成功', 'banner'=>$banner, 'ad'=>$ad]));
    }
}
