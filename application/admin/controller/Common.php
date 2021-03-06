<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;

class Common extends Controller
{
    // 单图片或文件异步上传
    public function upload_image(){
        $file = request()->file(input('name'));
        $info = $file->move(ROOT_PATH . 'public/uploads');
        if($info){
            $fileName = str_replace('\\', '/', $info->getSaveName());
            return json_encode($fileName); //文件名
        }
    }

    // 通用删除功能
    public function delete($id = 0){
        // 获取当前数据表名（控制器名）
        $table = request()->controller();
        if(Db::name($table)->where('id', $id)->delete()){
            return success('删除成功',url('index'));
        }else{
            return error('删除失败');
        }
    }

}
